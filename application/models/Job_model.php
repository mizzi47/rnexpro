<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model
{

    function addJob($data)
    {
        $this->db->insert('job', $data);
        return $this->db->insert_id();
    }

    function getJobs($id = null)
    {
        if ($id != null) {
            $this->db->where('job_id', $id);
        }
        $this->db->where('group_id', (int) $_SESSION['group_id']);
        return $this->db->get('job')->result_array();
    }

    function getJobsInprogress($id = null)
    {
        if ($id != null) {
            $this->db->where('job_id', $id);
         
        }
        $this->db->where('group_id', (int) $_SESSION['group_id']);
        $this->db->where('status', 'Ongoing');
        return $this->db->get('job')->result_array();
    }

    function getUser($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->where('group_id', (int) $_SESSION['group_id']);
        return $this->db->get('user')->result_array();
    }

    function getInternal()
    {
        $query = $this->db->get('user')->result_array();
        foreach ($query as  $value) {
            $type[$value['id']] = $value['name'];
        }
        return $type;
    }

    function getJob($id = null)
    {
        if ($id != null) {
            $this->db->where('job_id', $id);
        }
        $this->db->where('group_id', (int) $_SESSION['group_id']);
        return $this->db->get('job')->result_array();
    }
}
