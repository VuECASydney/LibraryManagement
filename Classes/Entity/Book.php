<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 8 October 2015
 * Date Modified : 
 */

class Book
{
	private $bookId;
	private $title;
	private $publisherId;
	private $isbn;
	private $categoryId;
	private $publisherName;
	private $categoryName;

	public function setBookId($bookId)
	{
		$this->bookId = $bookId;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setPublisherId($publisherId)
	{
		$this->publisherId = $publisherId;
	}

	public function setIsbn($isbn)
	{
		$this->isbn = $isbn;
	}

	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;
	}

	public function setPublisherName($publisherName)
	{
		$this->publisherName = $publisherName;
	}

	public function setCategoryName($categoryName)
	{
		$this->categoryName = $categoryName;
	}

	public function getBookId()
	{
		return $this->bookId;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getPublisherId()
	{
		return $this->publisherId;
	}

	public function getIsbn()
	{
		return $this->isbn;
	}

	public function getCategoryId()
	{
		return $this->categoryId;
	}

	public function getPublisherName()
	{
		return $this->publisherName;
	}

	public function getCategoryName()
	{
		return $this->categoryName;
	}
}
?>