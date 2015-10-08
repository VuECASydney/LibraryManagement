<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 8 October 2015
 * Date Modified : 
 */

class Category
{
	private $id;
	private $subject;
	private $parentId;
	private $sectionId;
	private $parentSubject;
	private $sectionName;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function setParentId($parentId)
	{
		$this->parentId = $parentId;
	}

	public function setSectionId($sectionId)
	{
		$this->sectionId = $sectionId;
	}

	public function setParentSubject($parentSubject)
	{
		$this->parentSubject = $parentSubject;
	}

	public function setSectionName($sectionName)
	{
		$this->sectionName = $sectionName;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getSubject()
	{
		return $this->subject;
	}

	public function getParentId()
	{
		return $this->parentId;
	}

	public function getSectionId()
	{
		return $this->sectionId;
	}

	public function getParentSubject()
	{
		return $this->parentSubject;
	}

	public function getSectionName()
	{
		return $this->sectionName;
	}
}
?>