<?php

namespace Controllers;

use Controllers\Base\BaseController;
use Models\CategoryModel;

class CategoryController extends BaseController
{
    private CategoryModel $categoryModel;

    private function _view(string $filename, array|null $data = NULL): void
    {
        if ($data)
        {
            $categories = (array_key_exists('categories', $data)) ? $data['categories'] : '';
            $category   = (array_key_exists('category', $data)) ? $data['category'] : '';
        }

        require_once dirname(__DIR__) . '/views/category/'. $filename . '.php';
    }

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index(): void
    {
        $this->_view('list', ['categories' => $this->categoryModel->getAllCategories()]);
    }

    public function view(int|string $id): void
    {
        $data['category'] = $this->categoryModel->getCategoryById((int) $id);

        if (! $data['category']) 
        {
            $this->error404();
        } 
        else 
        {
            $this->_view('detail', $data);
        }
    }

    public function add(): void
    {
        $this->_view('add_edit');
    }

    public function edit(int|string $id): void
    {
        $data['category'] = $this->categoryModel->getCategoryById((int) $id);

        if (! $data['category']) 
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
            'label'       => $this->verifyInput($_POST['label']),
            'description' => $this->verifyInput($_POST['description'])
        ];

        if (! $id)
        {
            $this->categoryModel->insertCategory($data);
        }
        else
        {
            $this->categoryModel->updateCategory($data, $id);
        }

        header('location: http://localhost/mon-annuaire/categories', 302);
    }

    public function delete(int $id): void
    {
        if ($this->categoryModel->deleteCategory((int) $id)) 
            header('location: http://localhost/mon-annuaire/categories', 302);
    }
}
