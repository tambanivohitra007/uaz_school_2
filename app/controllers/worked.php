<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 15 Avril, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class Worked extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('departement_model', 'worked_model'));
  }

  function index()
  {
    if ($this->session->userdata('worked_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('worked_login') == 1)
          redirect(base_url() . 'index.php/worked/dashboard', 'refresh');
  }

  function dashboard(){
    if ($this->session->userdata('worked_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

      $data['user']         = $this->session->userdata('worked_id');
      $resultat             = $this->departement_model->getDep($data['user']);
      $data['countAllStd']  = $this->departement_model->count('session_id', 25, 'std_sub_session');
      $array                = array('sex' => 0, 'etat' => 25);
      $data['countMale']    = $this->departement_model->countC($array, 'etudiant');
      $array                = array('sex' => 1, 'etat' => 25);
      $data['countFemale']  = $this->departement_model->countC($array, 'etudiant');
      $data['countDep']     = $this->departement_model->countC($array, 'etudiant');
      $data['list']         = $this->worked_model->joinStdWorked();

      $this->load->view('worked/static/header', $resultat);
      $this->load->view('worked/static/menu', $resultat);
      $this->load->view('worked/static/top', $resultat);
      $this->load->view('worked/dashboard', $data);
      $this->load->view('worked/static/footer', $resultat);
  }

  function workEducation(){
    if ($this->session->userdata('worked_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user']       = $this->session->userdata('worked_id');
    $resultat           = $this->departement_model->getDep($data['user']);
    $data['listWorked'] = $this->worked_model->listFromTable('work_education');

    $this->load->view('worked/static/header', $resultat);
    $this->load->view('worked/static/menu', $resultat);
    $this->load->view('worked/static/top', $resultat);
    $this->load->view('worked/worked', $data);
    $this->load->view('worked/static/footer', $resultat);
  }

  function popup($id){
    if ($this->session->userdata('worked_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student']    = $this->departement_model->getOneStd($id);
    $get['lastID']      = $this->worked_model->getLastSessionId();
    $data['std_worked'] = $this->departement_model->getStd('std_sub_session', array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));
    $data['lastID']     = $this->departement_model->getLastSessionId();
    $data['listWorked'] = $this->worked_model->getWorkedList();

    $this->load->view('worked/modal_edit', $data);
  }

  function updateWorked(){
    if ($this->session->userdata('worked_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $id = $this->input->post('student_id');
    $data = array(
      'work_ed' => $this->input->post('worked')
    );
    // get last session id from session table
    $get['lastID']      = $this->worked_model->getLastSessionId();
    // get worked status from std_sub_session table
    $get['std_worked']  = $this->departement_model->getStd('std_sub_session', array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));

    //update worked and nb_left from work_education
    $this->db->update('std_sub_session', $data, array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));

    if ($get['std_worked'][0]['work_ed'] == null)
      $this->db->set('nb_left', 'nb_left+1', FALSE)->where('short_code', $this->input->post('worked'))->update('work_education');
    else if ($get['std_worked'][0]['work_ed'] != $this->input->post('worked')) {
      $this->db->set('nb_left', 'nb_left-1', FALSE)->where('short_code', $get['std_worked'][0]['work_ed'])->update('work_education');
      $this->db->set('nb_left', 'nb_left+1', FALSE)->where('short_code', $this->input->post('worked'))->update('work_education');
    }

    $data = array(
      'app_worked' => 1
    );
    //update the status after subscribing
    $this->departement_model->updateDepInfo($data, $id);
  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('worked_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['edit_data']  = $this->db->get_where('head_account', array(
            'head_id' => $this->session->userdata('worked_id')
        ))->result_array();

    $resultat = $this->departement_model->getDep($this->session->userdata('worked_id'));

    $this->load->view('worked/static/header', $resultat);
		$this->load->view('worked/static/menu', $resultat);
		$this->load->view('worked/static/top', $resultat);
		$this->load->view('worked/profile', $data);
		$this->load->view('worked/static/footer', $data);
  }

  //update profile utilisateur
    function update_profile(){
      if ($this->session->userdata('worked_login') != 1)
        redirect(base_url() . 'index.php/login', 'refresh');

        $resultat = $this->departement_model->getDep($this->session->userdata('worked_id'));
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
                redirect(base_url() . 'index.php/worked/profile', 'refresh');
              }
              else
              {
                $error = array('error' => $this->upload->display_errors());

                $data = array(
                  'head_name'   => $this->input->post('head_name'),
                  'email'       => $this->input->post('email'),
                  'position'    => $this->input->post('position'),
                  'departement' => $this->input->post('departement')
                );

                $this->departement_model->do_update($this->session->userdata('worked_id'), $data);
                redirect(base_url() . 'index.php/worked/profile', 'refresh');
              }
          }
          else if(isset($_POST['update'])){
            $current_password = md5($this->input->post('current_password'));
            $new_password     = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($current_password == $resultat->head_password && $new_password == $confirm_password)
            {
              $data = array(
                'head_password' => md5($confirm_password)
              );

              $this->departement_model->do_update($this->session->userdata('worked_id'), $data);
              redirect(base_url() . 'index.php/worked/profile', 'refresh');
            }
            else {
              redirect(base_url() . 'index.php/worked/profile', 'refresh');
            }
          }
    }

  function logout(){
    $this->session->unset_userdata('worked_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
