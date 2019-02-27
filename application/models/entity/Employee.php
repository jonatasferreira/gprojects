<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="Employee")
 * @author Jonatas Ferreira<jonatas402@gmail.com>
 */
class Employee
{
    /**
     * @Id 
     * @Column(name="cpf", type="string", length=11, nullable=false)
     * @var string
     */
    private $cpf;
    
    /**
     * @Column(name="name", type="string", length=255, nullable=false)
     * @var string
     */
	private $name;


    /**
     * Get the value of cpf
     *
     * @return  string
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @param  string  $cpf
     *
     * @return  self
     */ 
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;

        return $this;
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
}
