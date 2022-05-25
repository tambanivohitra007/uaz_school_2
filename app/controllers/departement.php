<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */

class Departement extends CI_Controller {

  private $lastID;
  public function __construct(){
    parent::__construct();

    $this->load->model(array('departement_model', 'student_model'));
    $this->lastID = $this->departement_model->getLastSessionId();
    $this->lang->load(array('departement/dashboard', 'departement/inscription', 'departement/liste','departement/detail', 'departement/profile', 'departement/cours'));
  }

	public function index()
	{
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

      $data['user']         = $this->session->userdata('dep_id');
      $resultat = $this->departement_model->getDep($data['user']);
      $data['countAllStd']  = $this->departement_model->count('etat', $this->lastID[0]['session_id'] - 1, 'etudiant');
      $array = array('sex' => 0, 'etat' => $this->lastID[0]['session_id'] - 1);
      $data['countMale']    = $this->departement_model->countC($array, 'etudiant');

      $array = array('sex'  => 1, 'etat' => $this->lastID[0]['session_id'] - 1);
      $data['countFemale']  = $this->departement_model->countC($array, 'etudiant');

      //Cette section est utilisée pour filtrer la liste des
      //étudiants enregistrés par département.
      // 1 - Théologie; 2 - Gestion; 3 - Informatique; 4 - Sciences Infirmières
      // 5 - Education; 6 - Communication; 7 - Langue Anglaise

      $departement =  array('Théologie', 'Gestion', 'Informatique', 'Sciences infirmières',
                            'Education', 'Communication', 'Langue Anglaise');

      $data['dep'] = $departement[$resultat->permission - 1];
      $array = array('etude_envisage' => $data['dep'], 'etat' => $this->lastID[0]['session_id'] - 1);

      $data['countInscrit']   = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and session_id = ' . $this->lastID[0]['session_id'], 'std_sub_session');
      $data['countNInscrit']  = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and session_id = ' . $this->lastID[0]['session_id'], 'std_sub_session');
      $dep = $resultat->permission . "0";

      $data['countDep'] = $this->departement_model->countC($array, 'etudiant');
      $data['list']     = $this->departement_model->getStdJoin($dep);

      $data['heading_title'] = $this->lang->line('welcome_message');
      //Ensuite la page dashboard sera chargée
      $this->loadView($data, $resultat, 'dashboard');
	}

  public function inscription()
  {
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data['user']         = $this->session->userdata('dep_id');
    $resultat             = $this->departement_model->getDep($data['user']);
    $data['countAllStd']  = $this->departement_model->count('etat', $this->lastID[0]['session_id'] - 1, 'etudiant');
    $array = array('sex'  => 0, 'etat' => $this->lastID[0]['session_id'] - 1);
    $data['countMale']    = $this->departement_model->countC($array, 'etudiant');
    $array = array('sex'  => 1, 'etat' => $this->lastID[0]['session_id'] - 1);
    $data['countFemale']  = $this->departement_model->countC($array, 'etudiant');

    $data['lastID']       = $this->departement_model->getLastSessionId();
    $before_id            = $data['beforeLastID'] = $this->departement_model->getIDBefore();
    //section pour filtrer la liste par département
    $departement =  array('Théologie', 'Gestion', 'Informatique', 'Sciences infirmières',
                          'Education', 'Communication', 'Langue Anglaise');

    $data['dep'] = $departement[$resultat->permission - 1];
    $dep  = $resultat->permission .'0';
    $array = array('etude_envisage' => $data['dep'], 'etat' => $this->lastID[0]['session_id'] - 1);

    //Statistique pour le semestre précédent
    $data['countInscrit']   = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and step = 5 and session_id = ' . $before_id->session_id, 'std_sub_session');
    $data['countNInscrit']  = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and step < 5 and session_id = ' . $before_id->session_id, 'std_sub_session');
    $data['countApp']       = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and app_dean = 1 and session_id = ' . $before_id->session_id, 'std_sub_session');
    $data['countNApp']      = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and app_dean = 0 and session_id = ' . $before_id->session_id, 'std_sub_session');

    $data['selectedId'] = $this->departement_model->getSelectedSession();
    //statistique pour le semestre courant
    $data['selectedCountInscrit']   = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and step = 5 and session_id = ' . $data['selectedId']->session_id, 'std_sub_session');
    $data['selectedCountNInscrit']  = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and step < 5 and session_id = ' . $data['selectedId']->session_id, 'std_sub_session');
    $data['selectedCountApp']       = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and app_dean = 1 and session_id = ' . $data['selectedId']->session_id, 'std_sub_session');
    $data['selectedCountNApp']      = $this->departement_model->countC('student_id like "' . $resultat->permission . '0%" and app_dean = 0 and session_id = ' . $data['selectedId']->session_id, 'std_sub_session');



    $data['countDep'] = $this->departement_model->countC($array, 'etudiant');

    //$data['list'] = $this->departement_model->getStd('etudiant', $where);
    $data['list'] = $this->departement_model->getStdJoin($dep);

    $this->loadView($data, $resultat, 'inscription');
  }

  public function list_etudiant(){

    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data['lastID'] = $this->departement_model->getLastSessionId();
    $data['user']   = $this->session->userdata('dep_id');
    $resultat       = $this->departement_model->getDep($data['user']);

    $data['dep'] = $this->departement_model->getFiliere($resultat->permission)->filiere_description;
    // $where = 'etat = ' . $data['lastID'][0]['session_id']   - 1 . ' and type_retrait < 1 and graduated = 0 and student_id like "' . $resultat->permission . '0%"';
    $where = 'type_retrait < 1 and graduated = 0 and student_id like "' . $resultat->permission . '0%"';

    $data['list'] = $this->departement_model->getStd('etudiant', $where);

    $this->loadView($data, $resultat, 'liste_etudiant');
  }

  public function cours(){
    //get list of student
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data['user'] = $this->session->userdata('dep_id');
    $resultat = $this->departement_model->getDep($data['user']);

    $filiere = $this->departement_model->getFiliere($resultat->permission)->filiere_sigle;
    $data['list'] = $this->departement_model->getCours($filiere);
    $data['link'] = site_url('departement');

    $data['data_json'] = array(
      'data' => json_encode($this->departement_model->getCoursSp($filiere))
    );

    $this->loadView($data, $resultat, 'cours');
  }

  public function checkCourse(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');


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

  function popup($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data['student']    = $this->departement_model->getOneStd($id);
    $data['lastID']     = $this->departement_model->getLastSessionId();
    $data['list']       = $this->departement_model->getStdCourse($id, $data['lastID'][0]['session_id']);
    $data['finance']    = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
    // echo 'bonjour';

    $this->load->view('departement/modal_student', $data);
  }

  function popupEdit($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data['student']    = $this->departement_model->getOneStd($id);
    $data['lastID']     = $this->departement_model->getLastSessionId();
    $data['finance']    = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
    $data['std_course'] = $this->departement_model->getStdCourse($id, $data['lastID'][0]['session_id']);
    $data['cours']      = $this->departement_model->getCours();

    $this->load->view('departement/modal_edit', $data);
  }

  function saveCourse(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');
  }

  function finalized($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data = array(
      'app_dean' => $this->input->post('approuved'),
      'app_academic' => 0
    );

    //update the status after subscribing
    $this->departement_model->updateDepInfo($data, $id);

    //update the step to provide statistics
    $this->db->query("UPDATE std_sub_session sss set step = (if (sss.app_academic IS TRUE, 1, 0 ) + if (sss.app_dean IS TRUE, 1, 0) + if (sss.app_finance IS TRUE, 1, 0) + if (sss.app_worked IS TRUE, 1, 0) + if (sss.app_yearbook IS TRUE, 1, 0))");
  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $data['edit_data']  = $this->db->get_where('head_account', array(
            'head_id' => $this->session->userdata('dep_id')
        ))->result_array();

    $resultat = $this->departement_model->getDep($this->session->userdata('dep_id'));
    $this->loadView($data, $resultat, 'profile');
  }

//update profile utilisateur
  function update_profile(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

      $resultat = $this->departement_model->getDep($this->session->userdata('dep_id'));
      if (isset($_POST['enregistrer'])) {

          $config = array(
            'upload_path'   => "./assets/uploads/head/",
            'allowed_types' => "jpg",
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

              $this->departement_model->do_update($this->session->userdata('dep_id'), $data);
              redirect(site_url('departement/profile'), 'refresh');
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

              $this->departement_model->do_update($this->session->userdata('dep_id'), $data);
              redirect(site_url('departement/profile'), 'refresh');
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

            $this->departement_model->do_update($this->session->userdata('dep_id'), $data);
            redirect(site_url('departement/profile'), 'refresh');
            $this->output->delete_cache();
          }
          else {
            redirect(site_url('departement/profile'), 'refresh');
            $this->output->delete_cache();
          }
        }
  }

  //function to load view
  function loadView($param, $param2, $page){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    $this->load->view('departement/static/header', $param2);
    $this->load->view('departement/static/menu', $param2);
    $this->load->view('departement/static/top', $param2);
    $this->load->view('departement/' . $page, $param);
    $this->load->view('departement/static/footer', $param);
  }

  function updateCours($id_cours, $sem){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

    //update to activate or deactivate course
    $this->db->query("UPDATE cours SET active = $sem WHERE id_cours = $id_cours");
    return $this->data();
  }

  function getJson(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');


    $data['user'] = $this->session->userdata('dep_id');
    $resultat = $this->departement_model->getDep($data['user']);
    $filiere = $this->departement_model->getFiliere($resultat->permission)->filiere_sigle;
    $query = $this->departement_model->getCoursSp($filiere);
    $arr = json_encode($query);

   //add the header here
    header('Content-Type: application/json');
    echo json_encode( $arr );
  }

  public function data(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');


      $data['user'] = $this->session->userdata('dep_id');
      $resultat = $this->departement_model->getDep($data['user']);
      $filiere = $this->departement_model->getFiliere($resultat->permission)->filiere_sigle;
      $query = $this->departement_model->getCoursSp($filiere);

        $arr = array();
        $arr['data'] = array();
        if(!empty($query)):
            foreach($query as $row):
                if ($row['active'] == 1) {
                  $activate = 0;
                  $act = $this->lang->line("deactivate");
                  $btn = 'danger';
                }
                else {
                  $activate = 1;
                  $act = $this->lang->line("activate");
                  $btn = 'info';
                }
                $arr['data'][] = array(
                    $row['cours'],
                    $row['nb_crd'],
                    '<a class="btn btn-' . $btn . ' btn-xs" onclick="reload(' . $row["id_cours"] . ',' . $activate . ');" id="voir">' .  $act . '</a>'
                );
            endforeach;
        endif;
        $json = json_encode($arr);
        echo $json;
    }

  function data_course($id){
      $query  = $this->departement_model->getStdAllCourse($id);
      $arr = array();
      $arr['data'] = array();
      if(!empty($query)):
          foreach($query as $row):
              $label = $row['cours_category'] == 0 ? 'warning' : 'success';
              $category = $row['cours_category'] == 0 ? 'général' : 'majeur';

              $arr['data'][] = array(
                  'id_cours' => $row['id_cours'],
                  'title' => $row['Sigle'] . ' - ' . $row['title_cours'],
                  'credit' => $row['credit'],
                  'grade' => $row['grade'],
                  'category' => '<span class="label label-' . $label . '">' . $category . '</span>',
                  'session_name' => '(' . $row['session_id'] . ') # ' . $row['year'] . ' - ' . $row['semester']
              );
          endforeach;
      endif;
      $json = json_encode($arr);
      echo $json;
  }

  function list_detail($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(site_url(), 'refresh');

      $data['student']          = $this->departement_model->getOneStd($id);
      $data['lastID']           = $this->departement_model->getLastSessionId();
      $data['list']             = $this->departement_model->getStdCourse($id, $data['lastID'][0]['session_id']);
      $data['finance']          = $this->departement_model->getFinanceInfo($id, $data['lastID'][0]['session_id']);
      $data['student_course']  = $this->departement_model->getStdAllCourse($id);
      $data['summary']  = $this->departement_model->getSummaryStd($id);


      $data['lastID'] = $this->departement_model->getLastSessionId();
      $data['user']   = $this->session->userdata('dep_id');
      $resultat       = $this->departement_model->getDep($data['user']);

      // $data['dep'] = $this->departement_model->getFiliere($resultat->permission)->filiere_description;
      // $where = 'etat = ' . $data['lastID'][0]['session_id']   - 1 . ' and type_retrait = 0 and graduated = 0 and student_id like "' . $resultat->permission . '0%"';
      //
      // $data['list'] = $this->departement_model->getStd('etudiant', $where);
    $this->loadView($data, $resultat, 'detail_etudiant');
  }

  function logout(){
    $this->session->unset_userdata('dep_login');
    $this->session->sess_destroy();
    redirect(site_url(), 'refresh');
  }

}
