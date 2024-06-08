<?php
namespace Models;
use Models\Base\BaseModel;
use Models\Classes\Contact;
use PDO;
use PDOStatement;

class ContactModel extends BaseModel
{
    private string $table;
    private string $identifier;

    public function __construct() 
    {
        parent::__construct();
        $this->table      = 'contacts';
        $this->identifier = 'id_contact';
    }

    public function getCategoriesByIdContact(int $id): array|bool
    {
        $this->setQuery('');
        $query = $this->db->prepare(
            $this->select(['label', 'categories.id_category'])
                 ->from('affiliations')
                 ->join('categories', 'id_category')
                 ->join($this->table, $this->identifier)
                 ->where("{$this->table}.{$this->identifier}", $id)
                 ->getQuery());
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getAllContacts(): array|bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->select()->from($this->table)->getQuery());
        $query->execute();
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);

        if(! $contacts) return false;

        $data = [];

        foreach($contacts as $contact)
        {
            $data[] = new Contact($contact['id_contact'], $contact['name'], $contact['phone'], $contact['email'], $contact['age'], $contact['created_at'], $this->getCategoriesByIdContact($contact['id_contact']));
        }

        return $data;
    }

    public function getContactById(int $id): bool|Contact
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->select()->from($this->table)->where($this->identifier, $id)->getQuery());
        $query->execute();
        $contact = $query->fetch(PDO::FETCH_ASSOC);

        if(! $contact) return false;

        $data = new Contact($contact['id_contact'], $contact['name'], $contact['phone'], $contact['email'], $contact['age'], $contact['created_at'], $this->getCategoriesByIdContact($contact['id_contact']));

        return $data;
    }

    public function insertContact(array $data): bool|int
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->insert($this->table, $data)->getQuery());
        
        return $query->execute() ? $this->db->lastInsertId() : false;
    }
    
    public function insertContactCategories(array $data): bool|PDOStatement
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->insert('affiliations', $data)->getQuery());
        
        return $query->execute();
    }
    
    public function updateContact(array $data, int $id): bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->update($this->table, $data)->where($this->identifier, $id)->getQuery());

        return $query->execute();
    }

    public function deleteContact(int $id): bool
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->delete($this->table)->where($this->identifier, $id)->getQuery());
        
        return $query->execute();
    }

    public function deleteContactCategories(int $idContact, int $idCategory): bool|PDOStatement
    {
        $this->setQuery('');
        $query = $this->db->prepare($this->delete('affiliations')
                                         ->where($this->identifier, $idContact)
                                         ->and('id_category', $idCategory)
                                         ->getQuery());

        return $query->execute();
    }
}