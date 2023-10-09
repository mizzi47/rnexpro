<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function getLatestDailylog()
    {
        $this->db->limit(10);
        $this->db->from('dailylog');
        $this->db->order_by("dailylog_id", "desc");
        $result = $this->db->get();
        return $result->result_array();
    }

    function getJobName()
    {
        $query = $this->db->get('job')->result_array();
        foreach ($query as  $value) {
            $type[$value['job_id']] = $value['job_name'];
        }
        return $type;
    }

    function getUserName()
    {
        $query = $this->db->get('user')->result_array();
        foreach ($query as  $value) {
            $type[$value['id']] = $value['name'];
        }
        return $type;
    }

    function countJobIncoming()
    {
        $query = $this->db->select('COUNT(*) as total')->where('status', 'Incoming')->get('job')->result_array();
        // var_dump($query);
        // die();
        return $query[0]['total'];
    }

    function countJobInprogress()
    {
        $query = $this->db->select('COUNT(*) as total')->where('status', 'In-progress')->get('job')->result_array();
        // var_dump($query);
        // die();
        return $query[0]['total'];
    }

    function countJobCompleted()
    {
        $query = $this->db->select('COUNT(*) as total')->where('status', 'Completed')->get('job')->result_array();
        // var_dump($query);
        // die();
        return $query[0]['total'];
    }
}
