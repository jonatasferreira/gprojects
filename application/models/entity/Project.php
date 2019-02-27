<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="Project")
 * @author Jonatas Ferreira<jonatas402@gmail.com>
 */
class Project
{
    /**
     * @Id 
     * @Column(name="id", type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     * @var int
     */
	private $id;
    /**
     * @Column(name="name", type="string", length=200, nullable=false)
     * @var string
     */
	private $name;

    /**
     * @ManyToOne(targetEntity="Client")
     * @Column(nullable=false)
     * @JoinColumn(name="clientId", referencedColumnName="cpf")
     */
	private $clientId;
	
    /**
     * @ManyToOne(targetEntity="Employee")
     * @Column(nullable=false)
     * @JoinColumn(name="employeeId", referencedColumnName="cpf")
     */
    private $employeeId;

	/**
	 * Get the value of id
	 *
	 * @return  int
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of name
	 *
	 * @return  string
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @param  string  $name
	 *
	 * @return  self
	 */ 
	public function setName(string $name)
	{
		$this->name = strtoupper($name);

		return $this;
	}

    /**
     * Get the value of clientId
     */ 
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the value of clientId
     *
     * @return  self
     */ 
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get the value of employeeId
     */ 
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set the value of employeeId
     *
     * @return  self
     */ 
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }
}
