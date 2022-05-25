<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

      $this->load->model(array('departement_model', 'student_model'));
      $this->lang->load(array('departement/dashboard', 'departement/inscription', 'departement/liste','departement/detail', 'departement/profile', 'departement/cours'));
  }

  function index()
  {
    $this->load->view('finance/check');
  }

  function detail(){
    $id_num = $this->input->post('id_num');
    $data['list'] = $this->departement_model->getCountStd($id_num, 51);

    $this->load->view('finance/check', $data);
  }

}
