<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 17 Mars, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class Finance extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('departement_model', 'worked_model', 'finance_model'));
  }

  function index()
  {
    if ($this->session->userdata('finance_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('finance_login') == 1)
          redirect(base_url() . 'index.php/finance/dashboard', 'refresh');
  }

  function dashboard(){
    if ($this->session->userdata('finance_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

      $data['user']           = $this->session->userdata('finance_id');
      $resultat               = $this->departement_model->getDep($data['user']);
      $data['totalEtudiant']  = $this->departement_model->count('etat', 1, 'etudiant');
      $array = array('sex' => 0, 'etat' => 1);
      $data['TotalMasculin']  = $this->departement_model->countC($array, 'etudiant');
      $array = array('sex' => 1, 'etat' => 1);
      $data['TotalFeminin']   = $this->departement_model->countC($array, 'etudiant');
      $data['lastID']         = $this->departement_model->getLastSessionId();
      $array = array('session_id' => $data['lastID'][0]['session_id']);
      $data['TotalInscrit']   = $this->departement_model->countC($array, 'std_sub_session');

      $data['list'] = $this->finance_model->getStdJoin();

      $this->loadView($data, $resultat, 'dashboard');
  }

  function feeStruct(){
    if ($this->session->userdata('finance_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user']       = $this->session->userdata('finance_id');
    $resultat           = $this->departement_model->getDep($data['user']);
    $data['listStd']    = $this->finance_model->getStdJoin();

    $this->loadView($data, $resultat, 'structure');
  }

  function popup($id){
    if ($this->session->userdata('finance_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student']    = $this->departement_model->getOneStd($id);
    $get['lastID']      = $this->worked_model->getLastSessionId();
    $data['std_worked'] = $this->departement_model->getStd('std_sub_session', array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));
    $data['lastID']     = $this->departement_model->getLastSessionId();
    $data['finance']    = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
    // $data['modePayment'] = $this->finance_model->getMode();

    $this->load->view('finance/modal_edit', $data);
  }

  function updateFinance(){
    if ($this->session->userdata('finance_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $id = $this->input->post('student_id');
    $data = array(
      'plan'            => $this->input->post('plan'),
      'date_payment_1'  => $this->input->post('date_payment_1'),
      'date_payment_2'  => $this->input->post('date_payment_2'),
      'date_payment_3'  => $this->input->post('date_payment_3'),
      'date_payment_4'  => $this->input->post('date_payment_4'),
      'date_payment_5'  => $this->input->post('date_payment_5'),
      'amount_pay_1'    => $this->input->post('amount_pay_1'),
      'amount_pay_2'    => $this->input->post('amount_pay_2'),
      'amount_pay_3'    => $this->input->post('amount_pay_3'),
      'amount_pay_4'    => $this->input->post('amount_pay_4'),
      'amount_pay_5'    => $this->input->post('amount_pay_5')
    );

    // get last session id from session table
    $get['lastID'] = $this->worked_model->getLastSessionId();

    // get worked status from std_sub_session table
    $get['std_finance'] = $this->departement_model->getStd('finance', array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));

    //update worked and nb_left from work_education
    $this->db->update('finance', $data, array('student_id' => $id, 'session_id' => $get['lastID'][0]['session_id']));


    $data = array(
      'app_finance' => 1
    );

    //update the status after subscribing
    $this->departement_model->updateDepInfo($data, $id);

  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('finance_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['edit_data']  = $this->db->get_where('head_account', array(
            'head_id'   => $this->session->userdata('finance_id')
        ))->result_array();

    $resultat = $this->departement_model->getDep($this->session->userdata('finance_id'));

    $this->loadView($data, $resultat, 'profile');
  }

  //update profile utilisateur
    function update_profile(){
      if ($this->session->userdata('finance_login') != 1)
        redirect(base_url() . 'index.php/login', 'refresh');

        $resultat = $this->departement_model->getDep($this->session->userdata('finance_id'));
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

                $this->departement_model->do_update($this->session->userdata('finance_id'), $data);
                redirect(base_url() . 'index.php/finance/profile', 'refresh');
              }
              else
              {
                $error = array('error' => $this->upload->display_errors());
                //redirect(base_url() . 'index/admin/profile', 'refresh');
                //print_r($error);

                $data = array(
                  'head_name'   => $this->input->post('head_name'),
                  'email'       => $this->input->post('email'),
                  'position'      => $this->input->post('position'),
                  'departement' => $this->input->post('departement')
                );

                $this->departement_model->do_update($this->session->userdata('finance_id'), $data);
                redirect(base_url() . 'index.php/finance/profile', 'refresh');
              }
          }
          else if(isset($_POST['update'])){
            $current_password   = md5($this->input->post('current_password'));
            $new_password       = $this->input->post('new_password');
            $confirm_password   = $this->input->post('confirm_password');

            if ($current_password == $resultat->head_password && $new_password == $confirm_password)
            {
              $data = array(
                'head_password' => md5($confirm_password)
              );

              $this->departement_model->do_update($this->session->userdata('finance_id'), $data);
              redirect(base_url() . 'index.php/finance/profile', 'refresh');
            }
            else {
              redirect(base_url() . 'index.php/finance/profile', 'refresh');
            }
          }
    }

    function finalized($id){
      if ($this->session->userdata('finance_login') != 1)
        redirect(base_url() . 'index.php/login', 'refresh');

      $data = array(
        'app_finance' => $this->input->post('approuved')
      );

      //update the status after subscribing
      $this->departement_model->updateDepInfo($data, $id);

      $this->db->query("UPDATE std_sub_session sss set step = (if (sss.app_academic IS TRUE, 1, 0 ) + if (sss.app_dean IS TRUE, 1, 0) + if (sss.app_finance IS TRUE, 1, 0) + if (sss.app_worked IS TRUE, 1, 0) + if (sss.app_yearbook IS TRUE, 1, 0))");
    }

    function undo($id){
      if ($this->session->userdata('finance_login') != 1)
        redirect(base_url() . 'index.php/login', 'refresh');

      $data = array(
        'app_academic' => $this->input->post('approuved')
      );

      //update the status after subscribing
      $this->departement_model->updateDepInfo($data, $id);

    }
    //function to load view
    function loadView($param, $param2, $page){
      $this->load->view('finance/static/header', $param2);
      $this->load->view('finance/static/menu', $param2);
      $this->load->view('finance/static/top', $param2);
      $this->load->view('finance/' . $page, $param);
      $this->load->view('finance/static/footer', $param);
    }

  function logout(){
    $this->session->unset_userdata('finance_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
