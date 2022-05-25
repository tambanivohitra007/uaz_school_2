<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('student_model', 'admin_model', 'departement_model'));
  }

  function index()
  {
    if ($this->session->userdata('admin_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('admin_login') == 1)
          redirect(base_url() . 'index.php/admin/dashboard', 'refresh');
  }

  function dashboard(){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['list'] = $this->student_model->getStd();
    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));

    //count all student who has profile public
    $data['countAllStd'] = $this->departement_model->count('etat', 1, 'etudiant');

    //count all male
    $array = array('sex' => 0, 'etat' => 1);
    $data['countMale'] = $this->departement_model->countC($array, 'etudiant');

    //count all female
    $array = array('sex' => 1, 'etat' => 1);
    $data['countFemale'] = $this->departement_model->countC($array, 'etudiant');

    //count all subscripbed
    $data['countDep'] = $this->departement_model->countC('student_session = 1', 'studentaccount');

    $data['rows'] = $this->admin_model->getChart('count(student_id) as c, year', 'year', 'student_list');
    $data['rows2'] = $this->admin_model->getChartWhere('count(student_id) as count, sex', 'sex', 'etudiant', 'etat = 1');
    $data['faculte'] = $this->admin_model->getChartWhere('count(student_id) as value, etude_envisage as label', 'etude_envisage', 'etudiant', 'etat = 1');
    $data['religion'] = $this->admin_model->getChartWhere('count(student_id) as value, religion as label', 'religion', 'etudiant', 'etat = 1');

    $data['link'] = base_url() . 'index.php/admin/detail/';
    $this->load->view('admin/static/header', $data);
    $this->load->view('admin/static/menu', $data);
    $this->load->view('admin/static/top', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/static/footer', $data);

  }

  public function liste(){
    //get list of student
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['list'] = $this->student_model->getStd();
    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));

    $data['link'] = base_url() . 'index.php/admin/detail/';
		$this->load->view('admin/static/header', $data);
		$this->load->view('admin/static/menu', $data);
		$this->load->view('admin/static/top', $data);
		$this->load->view('admin/liste_etudiant', $data);
		$this->load->view('admin/static/footer', $data);
  }

  public function edit($student_id){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student'] = $this->student_model->getStdWhere($student_id);
    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));
    $data['path'] = base_url() . 'assets/images/id_card/' . $student_id . '.jpg';

    $this->load->view('admin/static/header', $data);
		$this->load->view('admin/static/menu', $data);
		$this->load->view('admin/static/top', $data);
		$this->load->view('admin/edit_etudiant', $data);
		$this->load->view('admin/static/footer', $data);

  }

  public function insert(){
    //get list of student
    //$data['list'] = $this->student_model->getStd();
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));
    $data['last_insert_id'] = $this->admin_model->getLastInsertId();

    // print_r($data['last_insert_id']);
		$this->load->view('admin/static/header', $data);
		$this->load->view('admin/static/menu', $data);
		$this->load->view('admin/static/top', $data);
		$this->load->view('admin/insert_etudiant', $data);
		$this->load->view('admin/static/footer', $data);
  }

  public function detail($student_id = ''){

    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student'] = $this->student_model->getStdWhere($student_id);
    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));

    $this->load->view('admin/static/header', $data);
		$this->load->view('admin/static/menu', $data);
		$this->load->view('admin/static/top', $data);
		$this->load->view('admin/detail_etudiant', $data);
		$this->load->view('admin/static/footer', $data);
  }

  public function insert_etudiant(){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data = array(
      'id' => NULL,
      'student_id'        => $this->input->post('student_id'),
      'student_nom'       => $this->input->post('student_prenom'),
      'student_prenom'    => $this->input->post('student_prenom'),
      'dateNaissance'     => $this->input->post('dateNaissance'),
      'lieuNaissance'     => $this->input->post('lieuNaissance'),
      'student_tel'       => $this->input->post('student_tel'),
      'religion'          => $this->input->post('religion'),
      'etat_civil'        => $this->input->post('etat_civil'),
      'nom_conjoint'      => $this->input->post('nom_conjoint'),
      'nb_enfant'         => $this->input->post('nb_enfant'),
      'father_name'       => $this->input->post('father_name'),
      'father_prof'       => $this->input->post('father_prof'),
      'mother_name'       => $this->input->post('mother_name'),
      'mother_prof'       => $this->input->post('mother_prof'),
      'parent_adresse'    => $this->input->post('parent_adresse'),
      'parent_tel'        => $this->input->post('parent_tel'),
      'nationalite'       => $this->input->post('nationalite'),
      'num_cin'           => $this->input->post('num_cin'),
      'pays_origine'      => $this->input->post('pays_origine'),
      'cin_date_delivre'  => $this->input->post('cin_date_delivre'),
      'cin_region'        => $this->input->post('cin_region'),
      'num_visa'          => $this->input->post('num_visa'),
      'pers_contact_name' => $this->input->post('pers_contact_name'),
      'pers_adresse'      => $this->input->post('pers_adresse'),
      'pers_tel'          => $this->input->post('pers_tel'),
      'etude_envisage'    => $this->input->post('etude_envisage'),
      'etude_option'      => $this->input->post('etude_option'),
      'sponsor_nom'       => $this->input->post('sponsor_nom'),
      'sponsor_prenom'    => $this->input->post('sponsor_prenom'),
      'sponsor_tel'       => $this->input->post('sponsor_tel'),
      'sponsor_adresse'   => $this->input->post('sponsor_adresse'),
      'sponsor_dure_f'    => $this->input->post('sponsor_dure_f'),
      'externe'           => $this->input->post('endroit')
    );

    $this->student_model->insertStd($data);

    //If succeeded
    redirect(base_url(). 'index.php/admin/insert', 'refresh');
    // $this->load->view('admin/static/header', $data);
    // $this->load->view('admin/insert', $data);
    // $this->load->view('admin/static/footer', $data);
  }

  function system(){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');
    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));
		$this->load->view('admin/static/header', $data);
		$this->load->view('admin/static/menu', $data);
		$this->load->view('admin/static/top', $data);
		$this->load->view('admin/system_settings', $data);
		$this->load->view('admin/static/footer', $data);
  }

//SYSTEM SETTINGS
  function system_settings(){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['description'] = $this->input->post('system_name');
    $this->db->where('type' , 'system_name');
    $this->db->update('settings' , $data);

    $data['description'] = $this->input->post('system_title');
    $this->db->where('type' , 'system_title');
    $this->db->update('settings' , $data);

    $data['description'] = $this->input->post('adresse');
    $this->db->where('type' , 'adresse');
    $this->db->update('settings' , $data);

    $data['description'] = $this->input->post('phone_office');
    $this->db->where('type' , 'phone_office');
    $this->db->update('settings' , $data);

    $data['description'] = $this->input->post('phone_mobile');
    $this->db->where('type' , 'phone_mobile');
    $this->db->update('settings' , $data);

    $data['description'] = $this->input->post('email');
    $this->db->where('type' , 'email');
    $this->db->update('settings' , $data);

    $this->session->set_flashdata('flash_message' , 'Information du système a été enregistré avec succès');
    redirect(base_url() . 'index.php/admin/system', 'refresh');
  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['edit_data']  = $this->db->get_where('user', array(
            'id' => $this->session->userdata('admin_id')
        ))->result_array();
    $data['info'] = $this->admin_model->get_info($this->session->userdata('admin_id'));
    $this->load->view('admin/static/header', $data);
		$this->load->view('admin/static/menu', $data);
		$this->load->view('admin/static/top', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/static/footer', $data);
  }

  function update_profile($param){
    if ($this->session->userdata('admin_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    if ($param == 'admin'){
      $config = array(
        'upload_path'     => "./assets/uploads/",
        'allowed_types'   => "jpg|png",
        'overwrite'       => TRUE,
        'max_size'        => "2048000",
        'max_height'      => "4000",
        'max_width'       => "4000",
        'file_name'       => $this->input->post('username')
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
          $result_data = array('upload_data' => $this->upload->data());

          $data = array(
            'username'    => $this->input->post('username'),
            'email'       => $this->input->post('email'),
            'fullName'    => $this->input->post('fullName')
          );

          $this->admin_model->do_update($this->session->userdata('admin_id'), $data, 'user');
          redirect(base_url() . 'index.php/admin/profile', 'refresh');
        }
        else
        {
          $error = array('error' => $this->upload->display_errors());
          //redirect(base_url() . 'index/admin/profile', 'refresh');
          //print_r($error);

          $data = array(
            'username'    => $this->input->post('username'),
            'email'       => $this->input->post('email'),
            'fullName'    => $this->input->post('fullName')
          );

          $this->admin_model->do_update($this->session->userdata('admin_id'), $data, 'user');
          redirect(base_url() . 'index.php/admin/profile', 'refresh');
        }
    }
    else if ($param == 'student') {
      $config = array(
        'upload_path'     => "./assets/images/id_card/",
        'allowed_types'   => "jpg",
        'overwrite'       => TRUE,
        'max_size'        => "2048000",
        'max_height'      => "4000",
        'max_width'       => "4000",
        'file_name'       => $this->input->post('student_id')
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
          $result_data = array('upload_data' => $this->upload->data());
        }
        else
        {
          $error = array('error' => $this->upload->display_errors());
        }

        $data = array(
          'student_id'        => $this->input->post('student_id'),
          'student_nom'       => $this->input->post('student_nom'),
          'student_prenom'    => $this->input->post('student_prenom'),
          'dateNaissance'     => $this->input->post('dateNaissance'),
          'lieuNaissance'     => $this->input->post('lieuNaissance'),
          'student_tel'       => $this->input->post('student_tel'),
          'religion'          => $this->input->post('religion'),
          'etat_civil'        => $this->input->post('etat_civil'),
          'nom_conjoint'      => $this->input->post('nom_conjoint'),
          'nb_enfant'         => $this->input->post('nb_enfant'),
          'father_name'       => $this->input->post('father_name'),
          'father_prof'       => $this->input->post('father_prof'),
          'mother_name'       => $this->input->post('mother_name'),
          'mother_prof'       => $this->input->post('mother_prof'),
          'parent_adresse'    => $this->input->post('parent_adresse'),
          'parent_tel'        => $this->input->post('parent_tel'),
          'nationalite'       => $this->input->post('nationalite'),
          'num_cin'           => $this->input->post('num_cin'),
          'pays_origine'      => $this->input->post('pays_origine'),
          'cin_date_delivre'  => $this->input->post('cin_date_delivre'),
          'cin_region'        => $this->input->post('cin_region'),
          'num_visa'          => $this->input->post('num_visa'),
          'pers_contact_name' => $this->input->post('pers_contact_name'),
          'pers_adresse'      => $this->input->post('pers_adresse'),
          'pers_tel'          => $this->input->post('pers_tel'),
          'etude_envisage'    => $this->input->post('etude_envisage'),
          'etude_option'      => $this->input->post('etude_option'),
          'sponsor_nom'       => $this->input->post('sponsor_nom'),
          'sponsor_prenom'    => $this->input->post('sponsor_prenom'),
          'sponsor_tel'       => $this->input->post('sponsor_tel'),
          'sponsor_adresse'   => $this->input->post('sponsor_adresse'),
          'sponsor_dure_f'    => $this->input->post('sponsor_dure_f'),
          'externe'           => $this->input->post('endroit')
        );

        $resultat = $this->admin_model->do_update($this->input->post('student_id'), $data, 'etudiant');
        // print_r($data);
        redirect(base_url() . 'index.php/admin/edit/' . $this->input->post('student_id'), 'refresh');
    }

  }


  //function used to test if dynamic table is working or nom_conjoint

  function export(){
    $this->load->view('admin/export');
  }

  function logout(){
    $this->session->unset_userdata('admin_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
