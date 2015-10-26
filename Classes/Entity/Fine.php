<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 25 October 2015
 * Date Modified : 
 */

class Fine
{
	private $fineId;

	private $BookTitle;
	private $Amount;
	private $DueDate;
	private $ReturnDate;
	private $PaymentDate;


	public function setFineId($fineId)
	{
		$this->fineId = $fineId;
	}

	public function setBookTitle($BookTitle)
	{
		$this->BookTitle = $BookTitle;
	}

	public function setAmount($Amount)
	{
		$this->Amount = $Amount;
	}

	public function setDueDate($DueDate)
	{
		$this->DueDate = $DueDate;
	}

	public function setReturnDate($ReturnDate)
	{
		$this->ReturnDate = $ReturnDate;
	}

	public function setPaymentDate($PaymentDate)
	{
		$this->PaymentDate = $PaymentDate;
	}



  	public function getFineId()
	{
	   return	$this->fineId;
	}

	public function getBookTitle()
	{
        return 	$this->BookTitle ;
	}

	public function getAmount()
	{
	   return	$this->Amount ;
	}

	public function getDueDate()
	{
	  return	$this->DueDate;
	}

	public function getReturnDate()
	{
	    return	$this->ReturnDate;
	}

	public function getPaymentDate()
	{
	    return	$this->PaymentDate ;
	}


}
?>