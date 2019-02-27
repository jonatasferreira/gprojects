<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @Entity
 * @Table(name="Task")
 * @author Jonatas Ferreira<jonatas402@gmail.com>
 */
class Task
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
     * @Column(name="status", type="integer", nullable=false)
     * @var int
     */
	private $status;

    /**
     * @Column(name="description", type="string", length=1024, nullable=true)
     * @var string
     */
    private $description;

	/**
	* @Column(name="startDate", type="datetime", nullable=false)
	* @var datetime
	*/
    private $startDate;
    
	/**
	* @Column(name="endDate", type="datetime", nullable=false)
	* @var datetime
	*/
    private $endDate;
    
    /**
     * @ManyToOne(targetEntity="Project")
     * @Column(nullable=false)
     * @JoinColumn(name="projectId", referencedColumnName="id")
     */
    private $projectId;

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
	 * Get the value of status
	 *
	 * @return  int
	 */ 
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @param  int  $status
	 *
	 * @return  self
	 */ 
	public function setStatus(int $status)
	{
		$this->status = $status;

		return $this;
	}

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = strtoupper($description);

        return $this;
    }

    /**
     * Get 	* @Column(name="startDate", type="datetime", nullable=false)
     *
     * @return  datetime
     */ 
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set 	* @Column(name="startDate", type="datetime", nullable=false)
     *
     * @param  datetime  $startDate  	* @Column(name="startDate", type="datetime", nullable=false)
     *
     * @return  self
     */ 
    public function setStartDate(datetime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get 	* @Column(name="endDate", type="datetime", nullable=false)
     *
     * @return  datetime
     */ 
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set 	* @Column(name="endDate", type="datetime", nullable=false)
     *
     * @param  datetime  $endDate  	* @Column(name="endDate", type="datetime", nullable=false)
     *
     * @return  self
     */ 
    public function setEndDate(datetime $endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of projectId
     */ 
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set the value of projectId
     *
     * @return  self
     */ 
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

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
