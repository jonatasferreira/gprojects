<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller
{
    private $em;

    /**
	 * Construtor da classe.
	 * 
	 */
	public function __construct()
	{
        parent::__construct();
        require_once APPPATH . "/models/dao/ClientDao.php";
        $this->em = $this->doctrine->em;
	}
 
    public function index()
    {
        $clientDao = new ClientDao($this->em);
        $data['clientList'] = $clientDao->readAll();
        $this->load->view('include/header');
        $this->load->view('client/index', $data);
        $this->load->view('include/footer');
    }

    public function createClient()
    {
        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));
        $this->form_validation->set_rules('cpf','Cpf','required',array('required' => 'Você deve preencher o campo %s.'));
        
        $sucess = $this->form_validation->run();
        if ($sucess) {
            $client = new Client();
            $client->setCpf($this->input->post('cpf'));
            $client->setName($this->input->post('name'));
            $clientDao = new ClientDao($this->em);
            $clientDao->create($client);
            redirect('cliente');
        }
        $this->load->view('include/header');
        $this->load->view('client/createClient');
        $this->load->view('include/footer');
    }

    public function updateClient($cpf)
    {
        $client = new Client();
        $client->setCpf($cpf);
        $clientDao = new ClientDao($this->em);
        $data['client'] = $clientDao->read($client);


        $this->form_validation->set_rules('name','Nome','required',array('required' => 'Você deve preencher o campo %s.'));

        $sucess = $this->form_validation->run();
        if ($sucess) {
            $data['client']->setName($this->input->post('name'));
            $clientDao->update($data['client']);
            redirect('cliente');
        }
        $this->load->view('include/header');
        $this->load->view('client/updateClient', $data);
        $this->load->view('include/footer');
    }

    public function deleteClient($cpf)
    {
        $client = new Client();
        $client->setCpf($cpf);
        $clientDao = new ClientDao($this->em);
        $client = $clientDao->read($client);
        $clientDao->delete($client);
        redirect('cliente');
    }
}