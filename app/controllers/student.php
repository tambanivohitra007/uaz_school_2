<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */

class Student extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model(array('student_model', 'admin_model'));
  }

	public function index()
	{
    if ($this->session->userdata('student_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('student_login') == 1)
          redirect(base_url() . 'index.php/student/inscription', 'refresh');

	}


  function inscription($student_id = ''){
    if ($this->session->userdata('student_login') != 1 || $this->session->userdata('student_id') != $student_id)
      redirect(base_url() . 'index.php/login', 'refresh');

      $data['list']     = $this->student_model->getCours('1');
      $data['student']  = $this->student_model->getStdWhere($student_id);
      $data['path']     = base_url() . 'assets/images/id_card/' . $student_id . '.jpg';
      $getID['id']      = $this->student_model->getLastID();
      $data['semesterIDFromSession']   = $getID['id'][0]['sem'];


      $this->load->view('student/inscription/static/header', $data);
      $this->load->view('student/inscription/static/top', $data);
      $this->load->view('student/inscription/stepTitle', $data);
      $this->load->view('student/inscription/step1', $data);
      $this->load->view('student/inscription/step2', $data);
      $this->load->view('student/inscription/step3', $data);
      $this->load->view('student/inscription/step4', $data);
      $this->load->view('student/inscription/static/footer', $data);
  }

  function checkSolde($student_id){
    if ($this->session->userdata('student_login') != 1 || $this->session->userdata('student_id') != $student_id)
      redirect(base_url() . 'index.php/login', 'refresh');

      $data['balance']  = $this->db->where('student_id', $student_id)->get('studentaccount')->row();
      $data['user']     = $this->db->where('student_id', $student_id)->get('etudiant')->row();

      $this->load->view('student/balance', $data);
  }

  function finalized(){
    if ($this->session->userdata('student_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data = array(
      'student_id'          => $this->input->post('student_id'),
      'student_nom'         => $this->input->post('student_prenom'),
      'student_prenom'      => $this->input->post('student_prenom'),
      'dateNaissance'       => $this->input->post('dateNaissance'),
      'lieuNaissance'       => $this->input->post('lieuNaissance'),
      'student_tel'         => $this->input->post('student_tel'),
      'religion'            => $this->input->post('religion'),
      'etat_civil'          => $this->input->post('etat_civil'),
      'nom_conjoint'        => $this->input->post('nom_conjoint'),
      'nb_enfant'           => $this->input->post('nb_enfant'),
      'father_name'         => $this->input->post('father_name'),
      'father_prof'         => $this->input->post('father_prof'),
      'mother_name'         => $this->input->post('mother_name'),
      'mother_prof'         => $this->input->post('mother_prof'),
      'parent_adresse'      => $this->input->post('parent_adresse'),
      'parent_tel'          => $this->input->post('parent_tel'),
      'nationalite'         => $this->input->post('nationalite'),
      'num_cin'             => $this->input->post('num_cin'),
      'pays_origine'        => $this->input->post('pays_origine'),
      'cin_date_delivre'    => $this->input->post('cin_date_delivre'),
      'cin_region'          => $this->input->post('cin_region'),
      'num_visa'            => $this->input->post('num_visa'),
      'pers_contact_name'   => $this->input->post('pers_contact_name'),
      'pers_adresse'        => $this->input->post('pers_adresse'),
      'pers_tel'            => $this->input->post('pers_tel'),
      'etude_envisage'      => $this->input->post('etude_envisage'),
      'etude_option'        => $this->input->post('etude_option'),
      'sponsor_nom'         => $this->input->post('sponsor_nom'),
      'sponsor_prenom'      => $this->input->post('sponsor_prenom'),
      'sponsor_tel'         => $this->input->post('sponsor_tel'),
      'sponsor_adresse'     => $this->input->post('sponsor_adresse'),
      'sponsor_dure_f'      => $this->input->post('sponsor_dure_f'),
      'externe'             => $this->input->post('endroit')
    );

    //divide the information to get the course id and its credit
    if ($this->input->post('cours') != null){
      $cours['cours'] = $this->input->post('cours');
      $test           = explode(':', $cours['cours'], -1);
      $count          = count($test);
      //get last session id
      $data['lastID'] = $this->student_model->getLastSessionId();

      $total_credit   = 0;

      for ($x = 0; $x < $count; $x++) {
        $final        = explode(',', $test[$x]);
        $total_credit = $total_credit + $final[1];
        $data['sigleID'] = $this->student_model->getSigleFromId($final[0]);

        $sub_data     = array(
          'id_cours'    => $final[0],
          'Sigle'       => $data['sigleID'][0]['Sigle'],
          'student_id'  => $this->input->post('student_id'),
          'session_id'  => $data['lastID'][0]['session_id'],
          'credit'      => $final[1],
          'lab'         => $data['sigleID'][0]['lab']
        );

        $std_inscripiton = array(
          'session_id'      => $data['lastID'][0]['session_id'],
          'student_id'      => $this->input->post('student_id'),
          'study_yearlevel' => $this->input->post('year_level')
        );

        $std_finance = array(
          'total_payment'   => $this->input->post('totalPayment'),
          'plan'            => $this->input->post('modePayment'),
          'student_id'      => $this->input->post('student_id'),
          'std_etude'       => $this->input->post('etude_envisage'),
          'std_yearlevel'   => $this->input->post('year_level'),
          'semester'        => $this->input->post('sem'),
          'new_student'     => $this->input->post('new_student'),
          'session_id'      => $data['lastID'][0]['session_id'],
          'total_credit'    => $total_credit,
          'graduated'       => $this->input->post('graduated'),
          'lab_info'        => $this->input->post('lab_info'),
          'lab_langue'      => $this->input->post('lab_langue'),
          'amount_pay_1'    => $this->input->post('amount_pay_1'),
          'amount_pay_2'    => $this->input->post('amount_pay_2'),
          'amount_pay_3'    => $this->input->post('amount_pay_3'),
          'amount_pay_4'    => $this->input->post('amount_pay_4'),
          'date_payment_1'  => $this->input->post('date_payment_1'),
          'date_payment_2'  => $this->input->post('date_payment_2'),
          'date_payment_3'  => $this->input->post('date_payment_3'),
          'date_payment_4'  => $this->input->post('date_payment_4'),
          'residence'       => $this->input->post('endroit'),
          'retard'          => $this->input->post('retard')
        );
        //insert all information about the subjects taken

        // print_r($data);
        // print_r($std_finance);
        $this->student_model->insertStdSub('std_inscription', $sub_data);

        // //update the status after subscribing
        $this->student_model->updateStdSession($this->input->post('student_id'));
      }
      // print_r($data);
      // print_r($std_finance);
      //insert information about the subscription steps
      // $this->student_model->insertStdSub('std_sub_session', $std_inscripiton);
      // $this->student_model->insertStdSub('finance', $std_finance);

    }
    //update personal information
    // $this->student_model->updateStdInfo($data,  $this->input->post('student_id'));

  }


  function logout(){
    $update['logged_in'] = 0;
    $this->db->where('student_id', $this->session->userdata('student_id'))->update('studentaccount', $update);

    $this->session->unset_userdata('student_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
