<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model
{

    function getSchedule($id = null)
    {
        if ($id != null) {
            $this->db->where('schedule_id', $id);
        }
        return $this->db->get('schedule')->result_array();
    }

    function getScheduleById($job_id)
    {
        $this->db->where('job_id', $job_id);
        return $this->db->get('schedule')->result_array();
    }

    function checkScheduleIfExist($job_id)
    {
        $this->db->select('schedule_id');
        $this->db->where('job_id', $job_id);
        return $this->db->get('schedule')->result_array();
    }

    function addSchedule($data, $selected_job_id)
    {
        $this->db->where('job_id', (int)$selected_job_id);
        $selected_job = $this->db->get('job')->result_array();
        $params = array(
			"title"=>$data['title'],
            "body"=>$data['body'],
            "job_name"=> $selected_job[0]['job_name'],
			"bgColor"=>$data['bgColor'],
			"start"=>$data['start'],
			"end"=>$data['end'],
            "job_id"=>(int)$selected_job_id
		);
        $this->db->insert('schedule', $params);
		$inserted_id = $this->db->insert_id();
        if($inserted_id){
            $this->session->set_flashdata('msg-success-add','Add new schedule success.');
            echo 'Success';
        }
        else{
            $this->session->set_flashdata('msg-fail-add','Add new schedule failed.');
            echo 'Fail';
        }      
    }

    function removeSchedule($schedule_id)
    {
        $this->db->where('schedule_id', $schedule_id);
        $this->db->delete('schedule');
        if($this->db->affected_rows()){
            $this->session->set_flashdata('msg-success-add','Schedule has been removed.');
            echo 'Success';
        }
        else{
            $this->session->set_flashdata('msg-fail-add','Add new schedule failed.');
            echo 'Fail';
        }       
    }

    function editSchedule($data, $schedule_id)
    {
        $this->db->where('schedule_id', $schedule_id);
        $this->db->update('schedule', $data);

        if($this->db->affected_rows()){
            $this->session->set_flashdata('msg-success-add','Schedule has been edited.');
        }
        else{
            $this->session->set_flashdata('msg-success-add','Schedule has been edited.');
        }       
        redirect('schedule');
    }

    function editScheduleInGanttChart($data, $schedule_id)
    {
        $this->db->where('schedule_id', $schedule_id);
        $this->db->update('schedule', $data);

        if($this->db->affected_rows()){
            return 'SUCCESS';
        }
        else{
            return 'FAIL';
        }       
    }
}