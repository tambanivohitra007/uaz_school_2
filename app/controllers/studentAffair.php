<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 13 Mai, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class StudentAffair extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('departement_model', 'worked_model', 'studentAffair_model'));
  }

  function index()
  {
    if ($this->session->userdata('stdAffair_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('stdAffair_login') == 1)
          redirect(base_url() . 'index.php/StudentAffair/dashboard', 'refresh');
  }

  function dashboard(){
    if ($this->session->userdata('stdAffair_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user']               = $this->session->userdata('stdAffair_id');
    $get['lastID']              = $this->worked_model->getLastSessionId();
    $data['countAllStd']        = $this->departement_model->count('session_id', $get['lastID'][0]['session_id'], 'std_sub_session');
    $array = array('session_id' => $get['lastID'][0]['session_id'], 'residence' => 1);
    $data['countOffCampus']     = $this->departement_model->countC($array, 'finance');
    $array = array('session_id' => $get['lastID'][0]['session_id'], 'residence' => 0);
    $data['countOnCampus']      = $this->departement_model->countC($array, 'finance');
    $data['resultat']           = $this->departement_model->getDep($data['user']);
    $data['list']               = $this->worked_model->joinStdWorked();

    $this->load->view('studentAffair/dashboard', $data);

  }

  function popup($id){
    if ($this->session->userdata('stdAffair_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student']    = $this->departement_model->getOneStd($id);
    $get['lastID']      = $this->worked_model->getLastSessionId();
    $data['std_worked'] = $this->departement_model->getStd('std_sub_session', array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));
    $data['lastID']     = $this->departement_model->getLastSessionId();
    $data['listWorked'] = $this->worked_model->getWorkedList();

    $this->load->view('studentAffair/modal_edit', $data);
  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('stdAffair_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['edit_data']  = $this->db->get_where('head_account', array(
            'head_id' => $this->session->userdata('stdAffair_id')
        ))->result_array();
    $resultat = $this->departement_model->getDep($this->session->userdata('worked_id'));

		$this->load->view('studentAffair/profile', $data);

  }

  //update profile utilisateur
  function update_profile(){
      if ($this->session->userdata('stdAffair_login') != 1)
        redirect(base_url() . 'index.php/login', 'refresh');

        $resultat = $this->departement_model->getDep($this->session->userdata('stdAffair_id'));
        if (isset($_POST['enregistrer'])) {

            $config = array(
              'upload_path'   => "./assets/uploads/head/",
              'allowed_types' => "jpg|png",
              'overwrite'     => TRUE,
              'max_size'      => "2048000",
              'max_height'    => "4000",
              'max_width'     => "4000",
              'file_name'     => $this->input->post('id')
              );

              $this->load->library('upload', $config);
              if($this->upload->do_upload())
              {
                $result_data = array('upload_data' => $this->upload->data());

                $data = array(
                  'head_name'   => $this->input->post('head_name'),
                  'email'       => $this->input->post('email'),
                  'position'    => $this->input->post('position'),
                  'departement' => $this->input->post('departement')
                );

                $this->departement_model->do_update($this->session->userdata('worked_id'), $data);
                redirect(base_url() . 'index.php/studentAffair/profile', 'refresh');
              }
              else
              {
                $error = array('error' => $this->upload->display_errors());
                //redirect(base_url() . 'index/admin/profile', 'refresh');
                //print_r($error);

                $data = array(
                  'head_name'   => $this->input->post('head_name'),
                  'email'       => $this->input->post('email'),
                  'position'    => $this->input->post('position'),
                  'departement' => $this->input->post('departement')
                );

                $this->departement_model->do_update($this->session->userdata('stdAffair_id'), $data);
                redirect(base_url() . 'index.php/studentAffair/profile', 'refresh');
              }
          }
          else if(isset($_POST['update'])){
            $current_password = md5($this->input->post('current_password'));
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($current_password == $resultat->head_password && $new_password == $confirm_password)
            {
              $data = array(
                'head_password' => md5($confirm_password)
              );

              $this->departement_model->do_update($this->session->userdata('stdAffair_id'), $data);
              $this->session->set_flashdata('flash_message' , 1);
              redirect(base_url() . 'index.php/studentAffair/profile', 'refresh');
            }
            else {
              $this->session->set_flashdata('flash_message' , 2);
              redirect(base_url() . 'index.php/studentAffair/profile', 'refresh');
            }
          }
    }

  function introduction(){
    $this->load->view('studentAffair/introduction');
  }
  function logout(){
    $this->session->unset_userdata('stdAffair_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
