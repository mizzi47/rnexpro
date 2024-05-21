<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function getLatestDailylog()
    {
        $this->db->limit(10);
        $this->db->from('dailylog');
        $this->db->join('job', 'job.job_id = dailylog.job_id');
        $this->db->where('group_id', (int) $_SESSION['group_id']);
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
        $query = $this->db->where('group_id', (int) $_SESSION['group_id'])->get('user')->result_array();
        foreach ($query as  $value) {
            $type[$value['id']] = $value['name'];
        }
        return $type;
    }

    function countJobIncoming()
    {
        $query = $this->db->select('COUNT(*) as total')->where('group_id', (int) $_SESSION['group_id'])->where('status', 'Incoming')->get('job')->result_array();
        // var_dump($query);
        // die();
        return $query[0]['total'];
    }

    function countJobInprogress()
    {
        $query = $this->db->select('COUNT(*) as total')->where('group_id', (int) $_SESSION['group_id'])->where('status', 'Ongoing')->get('job')->result_array();
        // var_dump($query);
        // die();
        return $query[0]['total'];
    }

    function countJobCompleted()
    {
        $query = $this->db->select('COUNT(*) as total')->where('group_id', (int) $_SESSION['group_id'])->where('status', 'Completed')->get('job')->result_array();
        // var_dump($query);
        // die();
        return $query[0]['total'];
    }
}
