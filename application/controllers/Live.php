<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('live_model');

  $this->load->library('session');

 }


  

 function load_data()
 {

          $user_id = $this->session->userdata('vendor_id');

          

  $data = $this->live_model->load_data($user_id);
  echo json_encode($data);
 }

 function insert()
 {
     $user_id = $this->session->userdata('vendor_id');

    $data = array('user_id'=>$user_id,
       'name' => $this->input->post('vendor_name'),
       );

  $this->live_model->insert($data);
 }

 function update()
 {
  $data = array(
   $this->input->post('table_column') => $this->input->post('value')
  );

  $this->live_model->update($data, $this->input->post('id'));
 }

 function delete()
 {
  $this->live_model->delete($this->input->post('id'));
 }
 

}

?>