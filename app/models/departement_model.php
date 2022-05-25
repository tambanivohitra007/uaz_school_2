<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class Departement_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getDep($head_id = ''){
    $query = $this->db->get_where('head_account', array('head_id' => $head_id));
    return $query->row();
  }


  public function count($column, $value,  $table){
    $this->db->like($column, $value);
    $this->db->from($table);
    return $this->db->count_all_results();
  }

  public function countC($data, $table){
    $this->db->where($data);
    $this->db->from($table);
    return $this->db->count_all_results();
  }

  public function getStd($table, $where)
  {
    $query = $this->db->get_where($table, $where);
    return $query->result_array();
  }

  public function getStdJoin($dep){
    //$this->db->select(array('etudiant.student_nom', 'etudiant.student_prenom', 'etudiant.student_id', 'std_inscription.app_dean'));
    $data['lastID'] = $this->getLastSessionId();


    $this->db->select('*');
    $this->db->from('etudiant');
    $this->db->join('std_sub_session', 'etudiant.student_id = std_sub_session.student_id');
    //$this->db->like('std_inscription.student_id', '10');
    $this->db->like('std_sub_session.student_id', $dep, 'after');
    $this->db->where(array(
      // 'std_sub_session.app_dean' => 0,
      'std_sub_session.session_id' => $data['lastID'][0]['session_id']
    ));

    $query = $this->db->get();

    return $query->result_array();
  }

  //Calculer le total: masculin et féminin pour le semestre sélectionné
  public function countGender($session_id, $condition, $value){
    $this->db->from('etudiant');
    $this->db->join('std_sub_session', 'etudiant.student_id = std_sub_session.student_id');
    $this->db->where(array(
      'std_sub_session.session_id' => $session_id,
      'etudiant.' . $condition => $value
    ));
      return $this->db->count_all_results();
  }

  //calculer le nombre total des étudiants pour chaque département
  public function countDep(){
    $this->db->from('etudiant');
    $this->db->join('std_sub_session', 'etudiant.student_id = std_sub_session.student_id');
    $this->db->where(array(
      'std_sub_session.session_id' => $session_id,
      'etudiant.sex' => $sex
    ));
      return $this->db->count_all_results();
  }

  public function getCours($dep = "")
  {
    if (!empty($dep))
      $query = $this->db->get_where('cours', array(
        'dep_desc' => $dep,
        'active' => 1));
    else
    $query = $this->db->get_where('cours', array('active' => 1));
    return $query->result_array();
  }

  public function getCoursSp($dep){
    $this->db->select('concat(Sigle, " - ",  title) as cours, nb_crd, dep_desc, id_cours, active');
    $query = $this->db->get_where('cours', array('dep_desc' => $dep));
    return $query->result_array();
  }

  public function getOneStd($student_id){
    $query = $this->db->get_where('etudiant', array('student_id' => $student_id));
    return $query->row();
  }

  public function getStdCourse($student_id, $session){
    $query = $this->db->query('select a.id_cours, a.Sigle, a.title, a.nb_crd, a.dep_desc, a.lab, a.semester, a.yearlevel from cours a,
    std_inscription b where a.id_cours = b.id_cours and b.student_id = ' . $student_id . ' and b.session_id = ' . $session);
    // $this->db->from('cours');
    //$this->db->join('std_subscription', 'cours.id_cours = std_subscription.id_cours');
    // $this->db->where('b.student_id', $student_id);
    // $this->db->where('b.session', $session);
    // $query = $this->db->get();

    // $query = $this->db->get_where('std_subscription', array('student_id' => $student_id, 'session' => $session));
    return $query->result_array();
  }

  public function getStdAllCourse($student_id){
    $this->db->from('std_inscription');
    $this->db->join('session', 'std_inscription.session_id = session.session_id');
    $this->db->where('std_inscription.student_id', $student_id);
    $query = $this->db->get();

    return $query->result_array();
  }

  public function getSummaryStd($student_id){
    $query = $this->db->query('select count(a.id_cours) as nb_cours, sum(a.grade * a.credit) as total_note, sum(a.credit) as total_credit, sum(a.grade*a.credit)/sum(a.credit) as moyenne_sem, concat(b.year, ": ", b.semester) as session, a.session_id from std_inscription a, session b where a.session_id = b.session_id and a.student_id = ' . $student_id . ' and a.grade > 0 group by a.session_id;');

    return $query->result_array();
  }

  public function getFinanceInfo($student_id, $session_id){
    $query = $this->db->get_where('finance', array('student_id' => $student_id, 'session_id' => $session_id));
    return $query->row();
  }

  public function updateDepInfo($data, $id){
    $this->db->where('student_id', $id);
    $this->db->update('std_sub_session', $data);
  }

  public function deleteStdCrs($id, $session){
    $this->db->delete('std_inscription', array('student_id' => $id, 'session_id' =>$session));
  }

  public function getCountStd($id, $session_id){

    $this->db->select('SUM(std_inscription.credit) as credits, etudiant.student_id,
    CONCAT(etudiant.student_nom, " ", etudiant.student_prenom) as noms');
    $this->db->from('std_inscription');
    $this->db->join('etudiant', 'etudiant.student_id = std_inscription.student_id');
    $this->db->where(array(
      'std_inscription.student_id' => $id,
      'std_inscription.session_id' => $session_id
    ));

    $query = $this->db->get();

    return $query->row();
  }

  public function getTeacherInfo($id_teacher){
    $query = $this->db->get_where('teacher', array('uid' => $id_teacher));
    return $query->result_array();
  }

  public function do_update($id, $data)
  {
    $this->db->where('head_id', $id);
    $this->db->update('head_account', $data);
  }

  public function getLastSessionId(){
    $this->db->select_max('session_id');
    $query = $this->db->get('session');

    return $query->result_array();
  }

  public function getIDBefore(){
    // $query = $this->db->get_where('session', array('selected' => 0))->order_by('session_id', 'DESC')->limit(1)->get();
    $query = $query = $this->db->from('session')->where('selected', 0)->order_by('session_id', 'DESC')->limit(1)->get();
    return $query->row();
  }

  public function getSelectedSession(){
    $query = $this->db->get_where('session', array('selected' => 1));
    return $query->row();
  }

  //function to get session
  public function getSession($session_id){
    $query = $this->db->get_where('session', array('session_id' => $session_id));
    return $query->row();
  }

  public function getFiliere($id){
    $query = $this->db->get_where('filiere', array('filiere_id' => $id));

    return $query->row();
  }

}
