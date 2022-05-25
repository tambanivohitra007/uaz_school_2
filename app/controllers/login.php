<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /*
   *	@author 	: Rindra RAZAFINJATOVO
   *	date		: 28 Fevrier, 2016
   *	UAZ System School
   *	http://www.zurcher.mg
   *	rindra.it@gmail.com
   */

  class Login extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More

      $this->load->model(array('student_model', 'login_model'));
      $this->load->library('form_validation');
      $this->lang->load('login');
    }

    function index()
    {
      if ($this->session->userdata('admin_login') != 1)
      {
        $data['error']  = false;
        $data['error2'] = false;
        $data['error3'] = false;
        $this->load->view('login', $data);
      }
      if ($this->session->userdata('admin_login') == 1)
            redirect(site_url('admin') , 'refresh');
    }

    function validate(){
      $permission   = $this->input->post('permission');
      $username     = $this->input->post('username');

      if ($permission == 1) {
        $password   = md5($this->input->post('password'));
        $query      = $this->login_model->check($username, $password);
      }
      else if ($permission == 2) {
        $password   = $this->input->post('password');
        $query      = $this->login_model->checkStd($username, $password);
      }
      else if ($permission == 3) {
        $password   = md5($this->input->post('password'));
        $query      = $this->login_model->checkDep($username, $password);
      }
      else {
        $password   = $this->input->post('password');
        $query      = $this->login_model->check($username, $password);
      }

      if ($query == NULL) {
        $data['error']  = true;
        $data['error2'] = false;
        $data['error3'] = false;
        $this->load->view('login', $data);
      }
      else {
        switch ($permission) {
          case '1': //administrateur
            # code...
            $data['error']  = false;
            $name           = $query->fullName;
            $pseudo         = $query->username;
            $id             = $query->id;

            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_name', $name);
            $this->session->set_userdata('admin_username', $pseudo);
            $this->session->set_userdata('admin_id', $id);

            redirect(site_url('admin'), 'refresh');
            break;

          case '2': //etudiant
            $data['error'] = false;

            $check = $this->login_model->checkPermission($username);

            if ($check->balance == null || $check->balance <= 80000) {
              if ($check->student_session == 0 && $check->logged_in == 0) {
                $update['logged_in'] = 1;
                $this->db->where('student_id', $username)->update('studentaccount', $update);

                $this->session->set_userdata('student_login', '1');
                $this->session->set_userdata('student_id', $username);
                redirect(site_url('student/inscription/'. $username), 'refresh');
              }
              else if($check->logged_in == 1){
                $data['error2'] = true;
                $data['error']  = false;
                $data['error3'] = false;
                $this->load->view('login', $data);
              }
              else {
                $data['error2'] = false;
                $data['error']  = false;
                $data['error3'] = true;
                $this->load->view('login', $data);
              }
            }
            else {
              if ($check->student_session == 0 && $check->logged_in == 0) {

                $this->session->set_userdata('student_login', '1');
                $this->session->set_userdata('student_id', $username);

                redirect(site_url('student/checkSolde/' . $username), 'refresh');

              }
              else if($check->logged_in == 1){
                $data['error2'] = true;
                $data['error']  = false;
                $data['error3'] = false;
                $this->load->view('login', $data);
              }
              else {
                $data['error2'] = false;
                $data['error']  = false;
                $data['error3'] = true;
                $this->load->view('login', $data);
              }
            }
            break;

          case '3':
                switch ($query->permission) {

                  case 1: //Département
                  case 2:
                  case 3:
                  case 4:
                  case 5:
                  case 6:
                  case 7:
                    $data['error'] = false;

                    $this->session->set_userdata('dep_login', '1');
                    $this->session->set_userdata('dep_id', $username);
                    redirect(site_url('/departement'), 'refresh');
                    break;

                  case 14: //Academic dean
                    $data['error'] = false;

                    $this->session->set_userdata('academic_login', '1');
                    $this->session->set_userdata('academic_id', $username);
                    redirect(site_url($this->uri->segment(1) . '/academic'), 'refresh');
                    break;

                  case 8: //Finance
                    $data['error'] = false;

                    $this->session->set_userdata('finance_login', '1');
                    $this->session->set_userdata('finance_id', $username);
                    redirect(site_url($this->uri->segment(1) . '/finance'), 'refresh');
                    break;

                  case 12: //Worked
                    $data['error'] = false;

                    $this->session->set_userdata('worked_login', '1');
                    $this->session->set_userdata('worked_id', $username);
                    redirect(site_url($this->uri->segment(1) . '/worked'), 'refresh');
                    break;

                  case 13: //Student affairs
                    $data['error'] = false;

                    $this->session->set_userdata('stdAffair_login', '1');
                    $this->session->set_userdata('stdAffair_id', $username);
                    redirect(site_url($this->uri->segment(1) . '/studentAffair'), 'refresh');
                    break;

                  default:
                    $data['error']  = true;
                    $data['error2'] = false;
                    break;
                }

          default:
            redirect(site_url());
            break;
        }

      }
    }

      function dashboard(){
        $data['list'] = $this->student_model->getStd();
        $data['link'] = site_url('admin/detail');

    		$this->load->view('Static/header');
    		$this->load->view('Static/menu');
    		$this->load->view('Static/top');
    		$this->load->view('admin/liste', $data);
    		$this->load->view('Static/footer');
      }
  }
 ?>
