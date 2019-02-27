<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectController extends CI_Controller
{

    /**
	 * Construtor da classe.
	 * 
	 */
	public function __construct()
	{
        parent::__construct();
		require_once APPPATH . "/models/dao/ProjectDao.php";
		require_once APPPATH . "/models/dao/ClientDao.php";
		require_once APPPATH . "/models/dao/EmployeeDao.php";
        $this->em = $this->doctrine->em;
	}
 
    public function index()
    {
		$projectDao = new ProjectDao($this->em);
        $projectList = $projectDao->readAll();
        $data['projectArrays'] = array();
        foreach ($projectList as $project) {
            $projectData = array(
                'id' => $project->getId(),
                'name' => $project->getName(),
                'nameClient' => $this->getNameClient($project->getClientId()),
                'nameManager' => $this->getNameEmployee($project->getEmployeeId())
            );
            $data['projectArrays'][] = $projectData;
        }
		
        $this->load->view('include/header');
        $this->load->view('project/index', $data);
		$this->load->view('include/footer');
    }
    
    private function getNameClient($cpf)
    {
        $clientDao = new ClientDao($this->em);
        $client = $clientDao->read($cpf);
        return $client->getName();
    }

    private function getNameEmployee($cpf)
    {
        $employeeDao = new EmployeeDao($this->em);
        $employee = $employeeDao->read($cpf);
        return $employee->getName();
    }
	
	public function createProject()
    {
        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('client','Cliente','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('manager','Gerente','required',array('required' => 'Você deve preencher o campo %s.'));
        
        $sucess = $this->form_validation->run();
        if ($sucess) {
            $Project = new Project();
            $Project->setName($this->input->post('name'));
            $Project->setClientId($this->input->post('client'));
            $Project->setEmployeeId($this->input->post('manager'));
            $projectDao = new ProjectDao($this->em);
            $projectDao->create($Project);
            redirect('projeto');
        }

        // Busca os clientes cadastrados
        $clientDao = new ClientDao($this->em);
        $clientList = $clientDao->readAll();
        $optionsClient = array();
        foreach ($clientList as $client) {
            $optionsClient[$client->getCpf()] = $client->getName();
        }
        $data['optionsClient'] = $optionsClient;

        // Busca os funcionarios cadastrados
        $employeeDao = new EmployeeDao($this->em);
        $employeeList = $employeeDao->readAll();
        $optionsManager = array();
        foreach ($employeeList as $employee) {
            $optionsManager[$employee->getCpf()] = $employee->getName();
        }
        $data['optionsManager'] = $optionsManager;

        $this->load->view('include/header');
        $this->load->view('project/createProject', $data);
        $this->load->view('include/footer');
    }

    public function updateProject($id)
    {
        $projectDao = new ProjectDao($this->em);
        $data['project'] = $projectDao->read($id);

        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('client','Cliente','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('manager','Gerente','required',array('required' => 'Você deve preencher o campo %s.'));
        
        $sucess = $this->form_validation->run();
        if ($sucess) {
            $data['project']->setName($this->input->post('name'));
            $data['project']->setClientId($this->input->post('client'));
            $data['project']->setEmployeeId($this->input->post('manager'));
            $projectDao = new ProjectDao($this->em);
            $projectDao->create($data['project']);
            redirect('projeto');
        }

        // Busca os clientes cadastrados
        $clientDao = new ClientDao($this->em);
        $clientList = $clientDao->readAll();
        $optionsClient = array();
        foreach ($clientList as $client) {
            $optionsClient[$client->getCpf()] = $client->getName();
        }
        $data['optionsClient'] = $optionsClient;

        // Busca os funcionarios cadastrados
        $employeeDao = new EmployeeDao($this->em);
        $employeeList = $employeeDao->readAll();
        $optionsManager = array();
        foreach ($employeeList as $employee) {
            $optionsManager[$employee->getCpf()] = $employee->getName();
        }
        $data['optionsManager'] = $optionsManager;

        $this->load->view('include/header');
        $this->load->view('project/updateProject', $data);
        $this->load->view('include/footer');
    }

    public function deleteProject($id)
    {
        $projectDao = new ProjectDao($this->em);
        $project = $projectDao->read($id);
        $projectDao->delete($project);
        redirect('projeto');
    }
}