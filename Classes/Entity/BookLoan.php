<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 8 October 2015
 * Date Modified : 
 */

class BookLoan
{
	private $logId;
	private $barcodeID;
    private $title ;
	private $publisherId;
	private $isbn;
    private $barrowerID;
    private $dateIssue;
    private $dateDue;
    private $dateReturn ;
	private $categoryId;
	private $publisherName;
	private $categoryName;

	public function setLogId($logId)
	{
		$this->logId = $logId;
	}

    public function setBarcodeId($logId)
	{
		$this->logId = $logId;
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

        public function setDateIssue($dateIssue)
    	{
    		$this->dateIssue = $dateIssue;
    	}

    	public function setDateDue($dateDue)
    	{
    		$this->dateDue = $dateDue;
    	}

    	public function setDateReturn($dateReturn)
    	{
    		$this->dateReturn = $dateReturn;
    	}
	public function getlogId()
	{
		return $this->logId;
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

    public function getDateIssue()
    {
    	 return	$this->dateIssue;
    }

    public function getDateDue()
    {
        return $this->dateDue;
    }

    public function getDateReturn()
    {
    	return	$this->dateReturn;

    }
}
?>