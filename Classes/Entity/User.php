<?php
class User
{
	/**
     * @var string $Id
     */
    private $Id;

    /**
     * @var string $Name
     */
    private $Name;

    /**
     * @var string $Role
     */
    private $Role;

    /**
     * @var string $Address
     */
    private $Address;

    /**
     * @var string $Phone
     */
    private $Phone;

    /**
     * @var string $Email
     */
    private $Email;

    /**
     * @var string $Enroll_year
     */
    private $Enroll_year;

    /**
     * Set Id
     * 
     * @param string $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

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
     * Set Role
     * 
     * @param string $Role
     */
    public function setRole($Role)
    {
        $this->Role = $Role;
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
        $this->Phone = $Phone;
    }

    /**
     * Set Email
     * 
     * @param string $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * Set Enroll_year
     * 
     * @param string $Enroll_year
     */
    public function setEnrollYear($Enroll_year)
    {
        $this->Enroll_year = $Enroll_year;
    }

     /**
     * Get Id
     *
     * @return string $Id
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Get Name
     * 
     * @return string $Name
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get Role
     * 
     * @return string $Role
     */
    public function getRole()
    {
        return $this->Role;
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
     * Get Phone
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
     * @return string $Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Get Enroll_year
     * 
     * @return string $Enroll_year
     */
    public function getEnrollYear()
    {
        return $this->Enroll_year;
    }
}
?>