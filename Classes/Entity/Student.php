<?php

namespace LibraryManagement\Entity;

class Student{
	 /**
     * @var string $Student_id
     */
    private $Student_id;
    
     /**
     * @var string $Name
     */
    private $Name;
    
    
      /**
     * @var string $Address
     */
    private $Address;
    
    
     /**
     * @var string $Phone
     */
    private $Phone
    
    
     /**
     * @var string $Email
     */
    private $Email;
    
    
   

     /**
     * Set Student_id
     *
     * @param string $Student_id
     */
    public function setStudentid($Student_id)
    {
        $this->Student_id = $Student_id;
    }
    /**
     /**
     * Set Name
     *
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

     /**
     * Set Address
     *
     * @param string $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }
    
      /**
     * Set Phone
     *
     * @param string $Phone
     */
    public function setPhone($Phone)
    {
        $this->Name = $Phone;
    }
    
     /**
     * Set Email
     *
     * @param string $Email
     */
    public function setEmail($Email)
    {
        $this->Name = $Email;
    }
    
    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
     /**
     * Get Student_id
     *
     * @return string $Student_id
     */
    public function getStudentid()
    {
          return $this->Student_id;
    }
    /**
     /**
     * Get Name
     *
     * @return string $Name
     */
    public function GetName()
    {
        return $this->Name;
    }

     /**
     * Get Address
     *
     * @return string $Address
     */
    public function getAddress()
    {
        return $this->Address;
    }
    
      /**
     * get Phone
     *
     * @return string $Phone
     */
    public function getPhone()
    {
        return $this->Phone;
    }
    
     /**
     * Get Email
     *
     *  @return string $Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

	}

?>
