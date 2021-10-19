<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RestModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function getDashboardData($rest_id)
    {
        $this_month_liked_by = $this->db->select("count(rest_ID) as count")->where(['rest_ID' => $rest_id, "status" => 1, "YEAR(createdAt)" => date('Y'), "MONTH(createdAt)" => date('m')])
         ->get('likee_info')->row()->count;
        $last_month_date = date("Y-n-j", strtotime("first day of previous month"));
        $time = strtotime($last_month_date);
        $month = date("m", $time);
        $year = date("Y", $time);
    
        $last_month_liked_by = $this->db->select("count(rest_ID) as count")->where(['rest_ID' => $rest_id, "status" => 1, "YEAR(createdAt)" => $year, "MONTH(createdAt)" =>$month])->get('likee_info')->row()->count;
        
      
    }
}