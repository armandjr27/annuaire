<?php
namespace Models\Classes;

class Contact
{
	private $id_contact;
	private $name;
	private $phone;
	private $email;
	private $age;
	private $created_at;
	private $categories;
	
	public function __construct($id_contact, $name, $phone, $email, $age, $created_at, $categories)
	{
		$this->id_contact = $id_contact;
		$this->name = $name;
		$this->phone = $phone;
		$this->email = $email;
		$this->age = $age;
		$this->created_at = $created_at;
		$this->categories = $categories;
    }


	/**
	 * Get the value of id_contact
	 */
	public function getIdContact()
	{
		return $this->id_contact;
	}

	/**
	 * Set the value of id_contact
	 */
	public function setIdContact($id_contact): self
	{
		$this->id_contact = $id_contact;

		return $this;
	}

	/**
	 * Get the value of name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 */
	public function setName($name): self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of phone
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Set the value of phone
	 */
	public function setPhone($phone): self
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * Get the value of email
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 */
	public function setEmail($email): self
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of age
	 */
	public function getAge()
	{
		return $this->age;
	}

	/**
	 * Set the value of age
	 */
	public function setAge($age): self
	{
		$this->age = $age;

		return $this;
	}

	/**
	 * Get the value of created_at
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}

	/**
	 * Set the value of created_at
	 */
	public function setCreatedAt($created_at): self
	{
		$this->created_at = $created_at;

		return $this;
	}

	/**
	 * Get the value of categories
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * Set the value of categories
	 */
	public function setCategories($categories): self
	{
		$this->categories = $categories;

		return $this;
	}
}
