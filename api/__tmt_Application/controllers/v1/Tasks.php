<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

/**
 * Controller das tarefas
 */
class Tasks extends REST_Controller {

    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('tasks_model', 'tasks');
    }

    public function tasks_get(){
        $id = $this->get('id');

        $tasks = $this->tasks->get_tasks($id);

        if ($id === NULL){
            // Verifique se o armazenamento de dados das tarefas contém alguma tarefa (caso o resultado do banco de dados retorne NULL)
            if ($tasks){
                // Definir a resposta e sair
                $this->response($tasks, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else{
                // Definir a resposta e sair
                $this->response([
                    'status' => FALSE,
                    'message' => 'No tasks were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) sendo o código de resposta HTTP
            }
        }
        // Encontre e retorne um único registro para uma tarefa específica.
        $id =  $id;
        // Valida o id.
        if ($id <= 0){
            // ID inválido, defina a resposta e saia.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        // Obter a tarefa da matriz, usando o id como chave para recuperação.
        // Normalmente, um modelo deve ser usado para isso.
        $task = NULL;
        if (!empty($tasks)){
            foreach ($tasks as $key => $value){
                if (isset($value['id']) && $value['id'] === $id){
                    $task = $value;
                }
            }
        }

        if (!empty($tasks)){
            $this->set_response($tasks, REST_Controller::HTTP_OK); // OK (200) sendo o código de resposta HTTP
        }
        else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'Task could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) sendo o código de resposta HTTP
        }
    }

    public function tasks_post(){

        $message = [
            'id'                 => $this->post('id'),
            'title'              => $this->post('title'),
            'description'        => $this->post('description'),
            'status'             => $this->post('status'),
        ];

        $message = $this->tasks->set_tasks($message); //teste funcionando o retorno

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) sendo o código de resposta HTTP
    }

    public function tasks_put(){

        $message = [
            'id'                 => $this->put('id'),
            'title'              => $this->put('title'),
            'description'        => $this->put('description'),
            'status'             => $this->put('status'),
        ];

        $message = $this->tasks->update_tasks($message); //teste funcionando o retorno
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) sendo o código de resposta HTTP
    }

    public function tasks_delete(){
      $id = (int) $this->get('id');

      // Valida o id.
      if ($id <= 0)
      {
          // Set the response and exit
          $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
      }
      // $this->some_model->delete_something($id);
      $message = [
          'id' => $id,
          'message' => 'Deleted the resource'
      ];
      $message = $this->tasks->delete_tasks($message); //teste funcionando o retorno
      $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

    public function status_get(){
      $status = $this->get('status');
      $tasks = $this->tasks->get_status($status);

      if ($status === NULL){
          // Verifique se o armazenamento de dados das tarefas contém alguma tarefa (caso o resultado do banco de dados retorne NULL)
          if ($tasks){
              // Definir a resposta e sair
              $this->response($tasks, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
          }
          else{
              // Definir a resposta e sair
              $this->response([
                  'status' => FALSE,
                  'message' => 'No tasks were found'
              ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) sendo o código de resposta HTTP
          }
      }
      // Encontre e retorne um único registro para uma tarefa específica.
      $status =  $status;
      // Valida o id.
      if ($status <= 0){
          // ID inválido, defina a resposta e saia.
          $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
      }
      // Obter a tarefa da matriz, usando o id como chave para recuperação.
      // Normalmente, um modelo deve ser usado para isso.
      $task = NULL;
      if (!empty($tasks)){
          foreach ($tasks as $key => $value){
              if (isset($value['id']) && $value['id'] === $status){
                  $task = $value;
              }
          }
      }

      if (!empty($tasks)){
          $this->set_response($tasks, REST_Controller::HTTP_OK); // OK (200) sendo o código de resposta HTTP
      }
      else{
          $this->set_response([
              'status' => FALSE,
              'message' => 'Task could not be found'
          ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) sendo o código de resposta HTTP
      }
    }
}
