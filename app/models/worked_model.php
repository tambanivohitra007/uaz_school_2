<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class worked_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function joinStdWorked(){

    $data['lastID'] = $this->getLastSessionId();

    $this->db->select('*');
    $this->db->from('etudiant');
    $this->db->join('std_sub_session', 'etudiant.student_id = std_sub_session.student_id');
    $this->db->where(array(
      'std_sub_session.session_id' => $data['lastID'][0]['session_id']
    ));

    $query = $this->db->get();

    return $query->result_array();
  }

  public function getLastSessionId(){
    $this->db->select_max('session_id');
    $query = $this->db->get('session');

    return $query->result_array();
  }

  public function getWorkedList(){
    $this->db->select('*');
    $this->db->from('work_education');
    $this->db->where('nb_left != nb_std');

    $query = $this->db->get();

    return $query->result_array();
  }

  public function listFromTable($table)
  {
    $this->db->select('*');
    $this->db->from($table);

    $query = $this->db->get();

    return $query->result_array();
  }

}
