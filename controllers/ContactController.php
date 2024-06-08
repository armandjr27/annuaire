<?php

namespace Controllers;

use Controllers\Base\BaseController;
use Models\ContactModel;
use Models\CategoryModel;

class ContactController extends BaseController
{
    private ContactModel $contactModel;
    private CategoryModel $categoryModel;

    private function _view(string $filename, array|null $data = NULL): void
    {
        if ($data) {
            $contact    = (array_key_exists('contact', $data)) ? $data['contact'] : null;
            $category   = (array_key_exists('category', $data)) ? $data['category'] : null;
            $contacts   = (array_key_exists('contacts', $data)) ? $data['contacts'] : null;
            $categories = (array_key_exists('categories', $data)) ? $data['categories'] : null;
        }

        require_once dirname(__DIR__) . '/views/contact/' . $filename . '.php';
    }

    public function __construct()
    {
        $this->contactModel  = new ContactModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index(): void
    {
        $this->_view('list', ['contacts' => $this->contactModel->getAllContacts()]);
    }

    public function view(int|string $id): void
    {
        $data = ['contact' => $this->contactModel->getContactById((int) $id)];

        if (!$data['contact']) {
            $this->error404();
        } else {
            $this->_view('detail', $data);
        }
    }

    public function add(): void
    {
        $this->_view('add_edit', ['categories' => $this->categoryModel->getAllCategories()]);
    }

    public function edit(int|string $id): void
    {
        $data = [
            'contact'    => $this->contactModel->getContactById((int) $id),
            'categories' => $this->categoryModel->getAllCategories()
        ];

        if (!$data['contact']) 
        {
            $this->error404();
        } 
        else 
        {
            $this->_view('add_edit', $data);
        }
    }

    public function save(int $id = NULL): void
    {
        $data = [
            'name'  => $this->verifyInput($_POST['name']),
            'email' => $this->verifyInput($_POST['email']),
            'phone' => $this->verifyInput($_POST['phone']),
            'age'   => $this->verifyInput($_POST['age']),
        ];

        $categories = $_POST['categories'];

        if (!$id) 
        {
            $insertedId = $this->contactModel->insertContact($data);

            if ($insertedId) 
            {
                foreach ($categories as $category) 
                {
                    $affiliation = [
                        'id_contact'  => $insertedId,
                        'id_category' => $category
                    ];

                    $this->contactModel->insertContactCategories($affiliation);
                }
            }
        } 
        else 
        {
            $contact = $this->contactModel->getContactById((int) $id);
            $updated = $this->contactModel->updateContact($data, (int) $id);

            if ($updated) 
            {
                $deleted = false;

                foreach ($contact->getCategories() as $categoriesOfContact) 
                {
                    $deleted = $this->contactModel->deleteContactCategories($id, $categoriesOfContact['id_category']);
                }

                if ($deleted)
                {
                    foreach ($categories as $category) 
                    {
                        $affiliation = [
                            'id_contact'  => $id,
                            'id_category' => $category
                        ];

                        $this->contactModel->insertContactCategories($affiliation);
                    }
                }
            }
        }

        header('location: http://localhost/mon-annuaire/contacts', 302);
    }

    public function delete(int $id): void
    {
        $contact = $this->contactModel->getContactById((int) $id);
        $deleted = $this->contactModel->deleteContact((int) $id);
        
        if ($deleted)
        {
            foreach ($contact->getCategories() as $categoriesOfContact) 
            {
                $this->contactModel->deleteContactCategories($id, $categoriesOfContact['id_category']);
            }
        }

        header('location: http://localhost/mon-annuaire/contacts', 302);
    }
}
