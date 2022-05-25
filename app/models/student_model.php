<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class Student_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getStd()
  {
      $query = $this->db->get('etudiant');
      return $query->result_array();
  }

  public function getCours($semester){
    // $query = $this->db->get('cours');
    $query = $this->db->get_where('cours', array('semester' => $semester));
    return $query->result_array();
  }

  public function getStdWhere($student_id = ''){
    $query = $this->db->get_where('etudiant', array('student_id' => $student_id));
    return $query->row();
  }


  public function insertStd($data){
    $this->db->insert('etudiant', $data);
  }

  public function updateStdInfo($data, $id){
    $this->db->where('student_id', $id);
    $this->db->update('etudiant', $data);
  }

  public function insertStdSub($table, $data){
    $this->db->insert($table, $data);
  }


  public function updateStdSession($id){
    $this->load->helper('date');
    $dateTime = date('m/d/Y H:i:s');

    $this->db->set(array('student_session' => '1', 'last_change_datetime' => $dateTime));
    $this->db->where('student_id', $id);
    $this->db->update('studentaccount');
  }

  public function getLastSessionId(){
    $this->db->select_max('session_id');
    $query = $this->db->get('session');

    return $query->result_array();
  }

  public function getSigleFromId($id_cours){
    $query = $this->db->get_where('cours', array('id_cours' => $id_cours));
    return $query->result_array();
  }

  public function getLastID(){
    $query = $this->db->query('select * from session where session_id = (select max(session_id) from session)');
    // $query = $this->db->get('session');

    return $query->result_array();
  }

}
