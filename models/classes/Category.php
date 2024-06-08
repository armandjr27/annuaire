<?php
namespace Models\Classes;

class Category
{
	private $id_category;
	private $label;
	private $description;
	private $created_at;
	private $contacts;
	
	public function __construct($id_category, $label, $description, $created_at, $contacts)
	{
		$this->id_category = $id_category;
		$this->label = $label;
		$this->description = $description;
		$this->created_at = $created_at;
		$this->contacts = $contacts;
    }


	/**
	 * Get the value of id_category
	 */
	public function getIdCategory()
	{
		return $this->id_category;
	}

	/**
	 * Set the value of id_category
	 */
	public function setIdCategory($id_category): self
	{
		$this->id_category = $id_category;

		return $this;
	}

	/**
	 * Get the value of label
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * Set the value of label
	 */
	public function setLabel($label): self
	{
		$this->label = $label;

		return $this;
	}

	/**
	 * Get the value of description
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 */
	public function setDescription($description): self
	{
		$this->description = $description;

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
	 * Get the value of contacts
	 */
	public function getContacts()
	{
		return $this->contacts;
	}

	/**
	 * Set the value of contacts
	 */
	public function setContacts($contacts): self
	{
		$this->contacts = $contacts;

		return $this;
	}
}
