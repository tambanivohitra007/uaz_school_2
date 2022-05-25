<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */


class admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_info($id){
    $query = $this->db->get_where('user', array('id' => $id));
    return $query->row();
  }

  public function do_update($id, $data, $table)
  {
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  public function getChart($arraySelect, $groupby, $table){
    $this->db->select($arraySelect);
    $this->db->group_by($groupby);
    $query = $this->db->get($table);

    return $query->result_array();
  }

  public function getChartWhere($arraySelect, $groupby, $table, $where){
    $this->db->select($arraySelect);
    $this->db->where($where);
    $this->db->group_by($groupby);
    $query = $this->db->get($table);

    return $query->result_array();
  }

  public function getLastInsertID(){
    $this->db->select('etude_envisage');
    $this->db->select_max('student_id');
    $this->db->group_by("etude_envisage");
    $this->db->order_by('student_id');
    $query = $this->db->get('etudiant');

    return $query->result_array();
  }

}
