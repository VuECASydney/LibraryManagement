<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 8 October 2015
 * Date Modified : 
 */

class Publisher
{
	private $id;
	private $name;
	private $address;
	private $phone;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function getPhone()
	{
		return $this->phone;
	}
}
?>