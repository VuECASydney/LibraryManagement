<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 7 October 2015
 * Date Modified : 
 */

class Section
{
	private $id;
	private $name;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
}
?>