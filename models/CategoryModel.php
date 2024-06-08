<?php
namespace Models;
use Models\Base\BaseModel;
use Models\Classes\Category;
use PDO;

class CategoryModel extends BaseModel
{
    private string $table;
    private string $identifier;

    public function __construct() 
    {
        parent::__construct();
        $this->table      = 'categories';
        $this->identifier = 'id_category';
    }

    public function getContactsByIdCategory(int $id): array|bool
    {
        $this->setQuery('');
        $query = $this->db->prepare(
            $this->select(['name', 'contacts.id_contact'])
                 ->from('affiliations')
                 ->join('contacts', 'id_contact')
                 ->join($this->table, $this->identifier)
                 ->where("{$this->table}.{$this->identifier}", $id)
                 ->getQuery());
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getAllCategories(): array|bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->select()->from($this->table)->getQuery());
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        
        if (! $categories) return false;

        $data = [];

        foreach ($categories as $category) {
            $data[] = new Category($category['id_category'], $category['label'], $category['description'], $category['created_at'], $this->getContactsByIdCategory($category['id_category']));
        }

        return $data;
    }

    public function getCategoryById(int $id): bool|Category
    {
        $this->setQuery('');
        $query = $this->db->query($this->select()->from($this->table)->where($this->identifier, $id)->getQuery());
        $query->execute();
        $category = $query->fetch(PDO::FETCH_ASSOC);

        if (! $category) return false;

        $data = new Category($category['id_category'], $category['label'], $category['description'], $category['created_at'], $this->getContactsByIdCategory($category['id_category']));

        return $data;
    }

    public function insertCategory(array $data): bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->insert($this->table, $data)->getQuery());

        return $query->execute();
    }

    public function updateCategory(array $data, int $id): bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->update($this->table, $data)->where($this->identifier, $id)->getQuery());

        return $query->execute();
    }

    public function deleteCategory(int $id): bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->delete($this->table)->where($this->identifier, $id)->getQuery());
        
        return $query->execute();
    }
}