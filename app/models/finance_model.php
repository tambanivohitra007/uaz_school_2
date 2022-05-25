<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class finance_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getStdJoin(){
    //$this->db->select(array('etudiant.student_nom', 'etudiant.student_prenom', 'etudiant.student_id', 'std_inscription.app_dean'));
    $data['lastID'] = $this->getLastSessionId();


    // $this->db->select('*, finance.total_payment + (finance.total_credit * 13000) as total');
    $this->db->select('*');
    $this->db->from('etudiant');
    $this->db->join('std_sub_session', 'etudiant.student_id = std_sub_session.student_id');
    $this->db->join('finance', 'std_sub_session.student_id = finance.student_id');
    //$this->db->like('std_inscription.student_id', '10');
    $this->db->where(array(
      'std_sub_session.app_dean' => 1,
      'std_sub_session.app_academic' => 1,
      'std_sub_session.session_id' => $data['lastID'][0]['session_id'],
      'finance.session_id' => $data['lastID'][0]['session_id']
    ));

    $query = $this->db->get();

    return $query->result_array();
  }

  function getLastSessionId(){
    $this->db->select_max('session_id');
    $query = $this->db->get('session');

    return $query->result_array();
  }

}
