<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */

class Academic extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('academic_model', 'student_model', 'departement_model', 'admin_model'));
    $this->lang->load(array('departement/dashboard', 'academic/dashboard', 'departement/inscription',
    'departement/liste','departement/detail', 'departement/profile', 'departement/cours'));
  }

  function index()
  {
    if ($this->session->userdata('academic_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('academic_login') == 1)
          redirect(base_url() . 'index.php/academic/dashboard', 'refresh');
  }

  function dashboard(){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

      $id                   = $this->departement_model->getSelectedSession();
      $id                   = $id->session_id - 1;

      $get_session          = $this->departement_model->getSession($id);
      $data['semester']     = $get_session->semester . ' ' . $get_session->year;
      //last $semester

      $data['user']         = $this->session->userdata('academic_id');
      $resultat             = $this->departement_model->getDep($data['user']);

      $data['countAllStd']  = $this->departement_model->count('session_id', $id , 'std_sub_session');
      $data['countMale']    = $this->departement_model->countGender($id , 'sex', 1);
      $data['countFemale']  =$this->departement_model->countGender($id , 'sex', 0);


      // POUR CHAQUE DEPARTEMENT
      $data['countDepTheo'] = $this->departement_model->countGender($id , 'etude_envisage', 'Théologie');
      $data['countDepGest'] = $this->departement_model->countGender($id , 'etude_envisage', 'Gestion');
      $data['countDepInfo'] = $this->departement_model->countGender($id , 'etude_envisage', 'Informatique');
      $data['countDepNurs'] = $this->departement_model->countGender($id , 'etude_envisage', 'Sciences infirmières');
      $data['countDepEduc'] = $this->departement_model->countGender($id , 'etude_envisage', 'Education');
      $data['countDepLang'] = $this->departement_model->countGender($id , 'etude_envisage', 'Communication');
      $data['countDepComm'] = $this->departement_model->countGender($id , 'etude_envisage', 'Langue anglaise');

      // morris
      $data['rows']         = $this->admin_model->getChart('count(student_id) as c, year', 'year', 'student_list');
      $data['rows2']        = $this->admin_model->getChartWhere('count(student_id) as count, sex', 'sex', 'etudiant', 'etat = 1');
      $data['faculte']      = $this->admin_model->getChartWhere('count(student_id) as value, etude_envisage as label', 'etude_envisage', 'etudiant', 'etat = 1');
      $data['religion']     = $this->admin_model->getChartWhere('count(student_id) as value, religion as label', 'religion', 'etudiant', 'etat = 1');


      $departement = '60';
      // $data['list'] = $this->departement_model->getStd('etudiant', $where);
      $data['list'] = $this->academic_model->getStdJoin();

      $this->loadView($data, $resultat, 'dashboard');
  }


  function detail($student_id = ''){

    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student']      = $this->student_model->getStdWhere($student_id);
    $data['info']         = $this->admin_model->get_info($this->session->userdata('academic_id'));

    $resultat = '';
    $this->loadView($data, $resultat, 'detail_etudiant');
  }

  function inscription()
  {
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');
    //get selected session
    $id                     = $this->departement_model->getSelectedSession();
    $data['semester']       = $id->semester . ' ' . $id->year;
    $data['user']           = $this->session->userdata('academic_id');

    //get information from last semester
    $get_session            = $this->departement_model->getSession($id->session_id - 1);
    $data['last_semester']  = $get_session->semester . ' ' . $get_session->year;

    $resultat               = $this->departement_model->getDep($data['user']);

    $data['lastID']         = $this->departement_model->getLastSessionId();
    $data['countStd']       = $this->departement_model->count('session_id', $id->session_id - 1 , 'std_sub_session');
    $data['countInscrit']   = $this->departement_model->countC(array('step' => 5, 'session_id' => $id->session_id), 'std_sub_session');
    $data['countApp']       = $this->departement_model->countC('app_dean = 1 and app_academic = 1 and session_id = ' . $id->session_id, 'std_sub_session');
    $data['countNApp']      = $this->departement_model->countC('app_dean = 1 and app_academic = 0 and session_id = ' . $id->session_id, 'std_sub_session');
    $data['countAllStd']    = $this->departement_model->count('etat', 1, 'etudiant');
    $array = array('sex' => 0, 'etat' => 1);
    $data['countMale']      = $this->departement_model->countC($array, 'etudiant');
    $array = array('sex' => 1, 'etat' => 1);
    $data['countFemale']    = $this->departement_model->countC($array, 'etudiant');
    $data['countDep']       = $this->departement_model->countC($array, 'etudiant');

    //$data['list'] = $this->departement_model->getStd('etudiant', $where);
    $data['list']           = $this->academic_model->getStdJoin();

    $this->loadView($data, $resultat, 'inscription');
  }

  // liste des etudiants
  public function list_etudiant(){

    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    // $data['user']   = $this->session->userdata('academic_id');
    // $resultat       = $this->departement_model->getDep($data['user']);
    // $where          = 'etat = 1';
    // $data['list']   = $this->departement_model->getStd('etudiant', $where);
    //
    // $this->loadView($data, $resultat, 'liste_etudiant');

    $data['lastID'] = $this->departement_model->getLastSessionId();
    $data['user']   = $this->session->userdata('academic_id');
    $resultat       = $this->departement_model->getDep($data['user']);

    // $data['dep'] = $this->departement_model->getFiliere($resultat->permission)->filiere_description;
    $where = 'type_retrait < 1 and graduated = 0';

    $data['list'] = $this->departement_model->getStd('etudiant', $where);

    $this->loadView($data, $resultat, 'liste_etudiant');

  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['edit_data']  = $this->db->get_where('head_account', array(
            'head_id' => $this->session->userdata('academic_id')
        ))->result_array();

    $resultat = $this->departement_model->getDep($this->session->userdata('academic_id'));

    $this->loadView($data, $resultat, 'profile');
  }

//update profile utilisateur
  function update_profile(){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

      $resultat = $this->departement_model->getDep($this->session->userdata('academic_id'));
      if (isset($_POST['enregistrer'])) {

          $config = array(
            'upload_path'       => "./assets/uploads/head/",
            'allowed_types'     => "jpg|png",
            'overwrite'         => TRUE,
            'max_size'          => "2048000",
            'max_height'        => "4000",
            'max_width'         => "4000",
            'file_name'         => $this->input->post('id')
            );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
              $result_data = array('upload_data' => $this->upload->data());

              $data = array(
                'head_name'     => $this->input->post('head_name'),
                'email'         => $this->input->post('email'),
                'position'      => $this->input->post('position'),
                'departement'   => $this->input->post('departement')
              );

              $this->departement_model->do_update($this->session->userdata('academic_id'), $data);
              redirect(base_url() . 'index.php/academic/profile', 'refresh');
            }
            else
            {
              $error = array('error' => $this->upload->display_errors());
              //redirect(base_url() . 'index/admin/profile', 'refresh');
              //print_r($error);

              $data = array(
                'head_name'     => $this->input->post('head_name'),
                'email'         => $this->input->post('email'),
                'position'      => $this->input->post('position'),
                'departement'   => $this->input->post('departement')
                // 'permission' => $this->input->post('permission')
              );

              $this->departement_model->do_update($this->session->userdata('academic_id'), $data);
              redirect(base_url() . 'index.php/academic/profile', 'refresh');
            }
        }
        else if(isset($_POST['update'])){
          $current_password     = md5($this->input->post('current_password'));
          $new_password         = $this->input->post('new_password');
          $confirm_password     = $this->input->post('confirm_password');

          if ($current_password == $resultat->head_password && $new_password == $confirm_password)
          {
            $data = array(
              'head_password'   => md5($confirm_password)
            );

            $this->departement_model->do_update($this->session->userdata('academic_id'), $data);
            redirect(base_url() . 'index.php/academic/profile', 'refresh');
          }
          else {
            redirect(base_url() . 'index.php/academic/profile', 'refresh');
          }
        }
  }

  function finalized($id){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data = array(
      'app_academic' => $this->input->post('approuved')
    );

    //update the status after subscribing
    $this->departement_model->updateDepInfo($data, $id);

  }

  public function cours(){
    //get list of student
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user']     = $this->session->userdata('academic_id');
    $resultat = $this->departement_model->getDep($data['user']);

    $data['list']     = $this->departement_model->getCours();
    $data['link']     = base_url() . 'index.php/departement';

    $this->loadView($data, $resultat, 'cours');
  }

  function popup($id){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student']  = $this->departement_model->getOneStd($id);
    //
    $data['lastID']   = $this->departement_model->getLastSessionId();
    $data['list']     = $this->departement_model->getStdCourse($id, $data['lastID'][0]['session_id']);
    $data['finance']  = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
    // echo 'bonjour';

    $this->load->view('academic/modal_student', $data);
  }

  function popupEdit($id){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student']    = $this->departement_model->getOneStd($id);
    $data['lastID']     = $this->departement_model->getLastSessionId();
    $data['finance']    = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
    $data['std_course'] = $this->departement_model->getStdCourse($id, $data['lastID'][0]['session_id']);
    $data['cours']      = $this->departement_model->getCours();

    $this->load->view('academic/modal_edit', $data);
  }

  public function checkCourse(){
    if ($this->session->userdata('academic_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');


      $data['lastID'] = $this->departement_model->getLastSessionId();

      $this->departement_model->deleteStdCrs($this->input->post('student_id'), $data['lastID'][0]['session_id']);

      //divide the information to get the course id and its credit
      if ($this->input->post('cours') != null){
        $cours['cours'] = $this->input->post('cours');
        $test = explode(':', $cours['cours'], -1);
        // $cours['cours'] = getCours($cours['cours']);

        $count = count($test);

        $totalCredit = 0;
        for ($x = 0; $x < $count; $x++) {
          $final = explode(',', $test[$x]);

          // $cours = $this->departement_model->getCourseInfo($final[0]);
          $cours = $this->db->get_where('cours', array(
                  'id_cours' => $final[0]
              ))->row($x);
          $teacher = $this->db->get_where('teacher', array(
                  'uid' => $cours->id_teacher
              ))->row($x);

          $_name =  $teacher->name . ' ' . $teacher->lastName;
          // $teacher = $this->departement_model->getTeacherInfo($cours['id_teacher']);
          //
          $sub_data = array(
            'id_cours'        => $cours->id_cours,
            'Sigle'           => $cours->Sigle,
            'title_cours'     => $cours->title,
            'cours_category'  => $cours->category,
            'teacher_id'      => $teacher->uid,
            'teacher_name'    => $_name,
            'student_id'      => $this->input->post('student_id'),
            'session_id'      => $data['lastID'][0]['session_id'],
            'credit'          => $cours->nb_crd,
            'grade'           => 0
          );

          $totalCredit = $totalCredit + $final[1];
          // print_r($sub_data);
          // insert all information about the subjects taken
          $this->student_model->insertStdSub('std_inscription', $sub_data);
        }

        $data2 = array(
          'total_credit'  => $totalCredit,
          'lab_info'      => $this->input->post('lab_info'),
          'lab_langue'    => $this->input->post('lab_langue'),
          'amount_pay_1'  => $this->input->post('amount_pay_1'),
          'amount_pay_2'  => $this->input->post('amount_pay_2'),
          'amount_pay_3'  => $this->input->post('amount_pay_3'),
          'amount_pay_4'  => $this->input->post('amount_pay_4'),
          'graduated'     => $this->input->post('graduated'),
          'total_payment' => $this->input->post('total_payment')
        );

        $get['lastID']    = $this->departement_model->getLastSessionId();
        $this->db->update('finance', $data2, array('student_id' => $this->input->post('student_id'),
         'session_id'     => $get['lastID'][0]['session_id']));
      }
  }

  //function to load view
  function loadView($param, $param2, $page){
    $this->load->view('academic/static/header', $param2);
    $this->load->view('academic/static/menu', $param2);
    $this->load->view('academic/static/top', $param2);
    $this->load->view('academic/' . $page, $param);
    $this->load->view('academic/static/footer', $param);
  }

  function list_detail($id){
    if ($this->session->userdata('academic_login') != 1)
      redirect(site_url(), 'refresh');

      $data['student']          = $this->departement_model->getOneStd($id);
      $data['lastID']           = $this->departement_model->getLastSessionId();
      $data['list']             = $this->departement_model->getStdCourse($id, $data['lastID'][0]['session_id']);
      $data['finance']          = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
      $data['student_course']   = $this->departement_model->getStdAllCourse($id);
      $data['summary']          = $this->departement_model->getSummaryStd($id);


      $data['lastID']           = $this->departement_model->getLastSessionId();
      $data['user']             = $this->session->userdata('academic_id');
      $resultat                 = $this->departement_model->getDep($data['user']);

      // $data['dep'] = $this->departement_model->getFiliere($resultat->permission)->filiere_description;
      // $where = 'etat = ' . $data['lastID'][0]['session_id']   - 1 . ' and type_retrait = 0 and graduated = 0 and student_id like "' . $resultat->permission . '0%"';
      //
      // $data['list'] = $this->departement_model->getStd('etudiant', $where);
    $this->loadView($data, $resultat, 'detail_etudiant');
  }

  function logout(){
    $this->session->unset_userdata('academic_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }


}
