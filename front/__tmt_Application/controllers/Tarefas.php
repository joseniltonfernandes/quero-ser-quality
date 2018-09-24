<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas extends CI_Controller {

	public function __construct() {
	  	parent::__construct();
      $this->lang->load('general', 'pt-br');
	}

	public function index()
    {
        header('location:'.site_url('tarefas'));
    }


	public function tarefas(){
		$tarefas = $this->api->api_get_tarefas();
		$data = array(
			'tarefas'=>$tarefas,
		);
		// $this->load->view('/tasks/tarefas',$data);
		$this->load->view('tasks/header');
		$this->load->view('tasks/tarefas',$data);
		$this->load->view('tasks/footer');
	}

  public function tarefa($id = 0){
			$tarefas = $this->api->api_get_tarefas($id);
	}

	public function incluir_tarefa(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$data = array(
			'title' => $title,
			'description' => $description,
		);
		$tarefas = $this->api->api_post_tarefas($data);
	}

	public function editar_tarefa($id){
		$teste = $this->input->post('title');
		$data = array(
			'id'=>$id,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status'),
		);
		$tarefas = $this->api->api_put_tarefas($data);
	}



	public function create(){
		$this->load->view('tasks/header');
		$this->load->view('tasks/new');
		$this->load->view('tasks/footer');
	}

	public function done($id){
		$data = array(
			'id'=>$id,
			'status' => '1',
		);
		$tarefas = $this->api->api_done_tarefas($data);

	}

	public function edit($id){
		$tarefa = $this->api->api_get_tarefas($id);
		$data = array(
			'id'=> $tarefa[0]['id'],
			'title'=> $tarefa[0]['title'],
			'description'=> $tarefa[0]['description'],
			'status' => $tarefa[0]['status'],
		);
		$this->load->view('tasks/header');
		$this->load->view('tasks/edit',$data);
		$this->load->view('tasks/footer');
	}

	public function delete($id){
		$data = array(
			'id'=>$id,
		);
		$this->api->api_delete_tarefas($data);
	}

	public function completed($status = 1){
		$tarefas = $this->api->get_completed($status);
		$data = array(
			'tarefas'=>$tarefas,
		);
		$this->load->view('tasks/header');
		$this->load->view('tasks/completed',$data);
		$this->load->view('tasks/footer');

	}
	public function pending($status = 10){
		$tarefas = $this->api->get_pending($status);
		$data = array(
			'tarefas'=>$tarefas,
		);
		$this->load->view('tasks/header');
		$this->load->view('tasks/pending',$data);
		$this->load->view('tasks/footer');
	}

}
