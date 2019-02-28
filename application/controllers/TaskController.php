<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller
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
		require_once APPPATH . "/models/dao/TaskDao.php";
        $this->em = $this->doctrine->em;
	}
 
    public function index($projectId)
    {
        $taskDao = new TaskDao($this->em);
        $value = $projectId;
        $key = 'projectId';
        $taskList = $taskDao->readAll($value, $key);

        $data['taskArrays'] = array();
        foreach ($taskList as $task) {
            $taskData = array(
                'id' => $task->getId(),
                'name' => $task->getName(),
                'status' => $task->getStatus(),
                'startDate' => $task->getStartDate()->format("d-m-Y"),
                'endDate' => $task->getEndDate()->format("d-m-Y"),
                'managerTask' => $this->getNameEmployee($task->getEmployeeId())
            );
            $data['taskArrays'][] = $taskData;
        }

        $data['projectId'] = $projectId;
        $projectDao = new ProjectDao($this->em);
        $project = $projectDao->read($projectId);
        $data['projectName'] = $project->getName();
		
        $this->load->view('include/header');
        $this->load->view('task/index', $data);
		$this->load->view('include/footer');
    }

    private function getNameEmployee($cpf)
    {
        $employeeDao = new EmployeeDao($this->em);
        $employee = $employeeDao->read($cpf);
        return $employee->getName();
    }
	
	public function createTask($projectId)
    {
        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('startDate','Data início','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('endDate','Data fim','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('managerTask','Atribuido','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('description','Descrição','required',array('required' => 'Você deve preencher o campo %s.'));
        
        $sucess = $this->form_validation->run();
        if ($sucess) {
            $task = new Task();
            $task->setName($this->input->post('name'));
            $task->setStatus(1);
            $task->setDescription($this->input->post('description'));
            $startDate = new DateTime($this->input->post('startDate'));
            $task->setStartDate($startDate);
            $endDate = new DateTime($this->input->post('endDate'));
            $task->setEndDate($endDate);
            $task->setProjectId($projectId);
            $task->setEmployeeId($this->input->post('managerTask'));
            $taskDao = new TaskDao($this->em);
            $taskDao->create($task);
            redirect('projeto/'.$projectId.'/tarefa');
        }

        // Busca os funcionarios cadastrados
        $employeeDao = new EmployeeDao($this->em);
        $employeeList = $employeeDao->readAll();
        $optionsManager = array();
        foreach ($employeeList as $employee) {
            $optionsManager[$employee->getCpf()] = $employee->getName();
        }
        $data['optionsManager'] = $optionsManager;

        $data['projectId'] = $projectId;
        $projectDao = new ProjectDao($this->em);
        $project = $projectDao->read($projectId);
        $data['projectName'] = $project->getName();

        $this->load->view('include/header');
        $this->load->view('task/createTask', $data);
        $this->load->view('include/footer');
    }

    public function updateTask($projectId, $taskId)
    {
        $taskDao = new TaskDao($this->em);
        $task = $taskDao->read($taskId);
        $data['task'] = array(
            'id' => $task->getId(),
            'name' => $task->getName(),
            'status' => $task->getStatus(),
            'description' => $task->getDescription(),
            'startDate' => $task->getStartDate()->format("Y-m-d"),
            'endDate' => $task->getEndDate()->format("Y-m-d"),
            'managerTask' => $task->getEmployeeId()
        );

        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('startDate','Data início','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('endDate','Data fim','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('managerTask','Atribuido','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('description','Descrição','required',array('required' => 'Você deve preencher o campo %s.'));
        
        $sucess = $this->form_validation->run();
        if ($sucess) {
            $task->setName($this->input->post('name'));
            $task->setStatus(1);
            $task->setDescription($this->input->post('description'));
            $startDate = new DateTime($this->input->post('startDate'));
            $task->setStartDate($startDate);
            $endDate = new DateTime($this->input->post('endDate'));
            $task->setEndDate($endDate);
            $task->setProjectId($projectId);
            $task->setEmployeeId($this->input->post('managerTask'));
            $taskDao = new TaskDao($this->em);
            $taskDao->update($task);
            redirect('projeto/'.$projectId.'/tarefa');
        }

        // Busca os funcionarios cadastrados
        $employeeDao = new EmployeeDao($this->em);
        $employeeList = $employeeDao->readAll();
        $optionsManager = array();
        foreach ($employeeList as $employee) {
            $optionsManager[$employee->getCpf()] = $employee->getName();
        }
        $data['optionsManager'] = $optionsManager;

        $data['projectId'] = $projectId;
        $projectDao = new ProjectDao($this->em);
        $project = $projectDao->read($projectId);
        $data['projectName'] = $project->getName();

        $this->load->view('include/header');
        $this->load->view('task/updateTask', $data);
        $this->load->view('include/footer');
    }

    public function deleteTask($projectId, $taskId)
    {
        $taskDao = new TaskDao($this->em);
        $task = $taskDao->read($taskId);
        $taskDao->delete($task);
        redirect('projeto/'.$projectId.'/tarefa');
    }
}