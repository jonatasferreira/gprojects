<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller
{
    private $em;

    /**
	 * Construtor da classe.
	 * 
	 */
	public function __construct()
	{
        parent::__construct();
        require_once APPPATH . "/models/dao/EmployeeDao.php";
        $this->em = $this->doctrine->em;
	}
 
    public function index()
    {
        $employeeDao = new EmployeeDao($this->em);
        $data['employeeList'] = $employeeDao->readAll();
        $this->load->view('include/header');
        $this->load->view('employee/index', $data);
        $this->load->view('include/footer');
    }

    public function createEmployee()
    {
        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('cpf','Cpf','required',array('required' => 'Você deve preencher o campo %s.'));
        
        $sucess = $this->form_validation->run();
        if ($sucess) {
            $employee = new Employee();
            $employee->setCpf($this->input->post('cpf'));
            $employee->setName($this->input->post('name'));
            $employeeDao = new EmployeeDao($this->em);
            $employeeDao->create($employee);
            redirect('funcionario');
        }
        $this->load->view('include/header');
        $this->load->view('employee/createEmployee');
        $this->load->view('include/footer');
    }

    public function updateEmployee($cpf)
    {
        $employee = new Employee();
        $employee->setCpf($cpf);
        $employeeDao = new EmployeeDao($this->em);
        $data['employee'] = $employeeDao->read($employee);


        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));

        $sucess = $this->form_validation->run();
        if ($sucess) {
            $data['employee']->setName($this->input->post('name'));
            $employeeDao->update($data['employee']);
            redirect('funcionario');
        }
        $this->load->view('include/header');
        $this->load->view('employee/updateEmployee', $data);
        $this->load->view('include/footer');
    }

    public function deleteEmployee($cpf)
    {
        $employee = new Employee();
        $employee->setCpf($cpf);
        $employeeDao = new EmployeeDao($this->em);
        $employee = $employeeDao->read($employee);
        $employeeDao->delete($employee);
        redirect('funcionario');
    }
}