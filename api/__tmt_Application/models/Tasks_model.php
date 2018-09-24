<?php

class Tasks_model extends CI_Model
{


  public function get_tasks($id = null){

    if ($id >= 1) {
         $tasks = $this->db->select('tasks.*')->from('tasks')
         ->where('id', $id)->get()->result_array();
    }
    else{
        $this->db->select("tasks.*");
        $this->db->from('tasks');
        $this->db->order_by('tasks.status asc');
        $tasks = $this->db->get()->result();

    }
    return $tasks;
  }

  public function set_tasks($data = null){

      $title = $data['title'];
      $description = $data['description'];

      $data = array(
          'title'               => $title,
          'description'         => $description,
      );

      try {
          $this->db->insert('tasks', $data);
          return  $this->db->insert_id();
      } catch (\Exception $e) {
          // casso erro
      }
  }

  public function update_tasks($data = null){

      $id = $data['id'];
      $title = $data['title'];
      $description = $data['description'];
      $status = $data['status'];

      if ($id != null) {
          $data = array(
            'title'               => $title,
            'description'         => $description,
            'status'              => $status,
        );

          if ($id != null){
            if ($status == 1) {
              $data = array(
                'status'              => $status,
            );
              try {

                  return $this->db->set($data)->where('id', $id)->update('tasks');
              } catch (\Exception $e) {
                  echo "";
                  return null;
              }
            }
            else {
              try {
                  return $this->db->set($data)->where('id', $id)->update('tasks');
              } catch (\Exception $e) {
                  echo "";
                  return null;
              }
            }
          }
      }
  }

  public function delete_tasks($data){

    $id = $data['id'];
    if ($id != null) {
        $data = array(

          'title'               => $title,
          'description'         => $description,
          'status'              => $status,
      );

      try {
        return $this->db->set($data)->where('id', $id)->delete('tasks');
      } catch (\Exception $e) {
        echo "";
        return null;
      }
    }
  }

  public function get_status($status = null){
    if ($status == 10) {
      $status = 0;
      $tasks = $this->db->select('tasks.*')->from('tasks')
      ->where('status', $status)->get()->result_array();
    }
    if ($status == 1) {
         $tasks = $this->db->select('tasks.*')->from('tasks')
         ->where('status', $status)->get()->result_array();
    }
    return $tasks;
  }

}
?>
