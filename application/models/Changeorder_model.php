<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Changeorder_model extends CI_Model
{
    function addCo($params)
    {
        $dataCo = [
            'code_id' => $params['code_id'],
            'issued_date' => $params['issued_date'],
            'created_date' => date('d/m/Y'),
            'job_id' => $params['job_id'],
        ];
        $dataItem = $params['arrItem'];

        $this->db->trans_start();
        $this->db->insert('changeorder', $dataCo);
        $idCo = $this->db->insert_id();

        foreach($dataItem as $item){
            $arrItem = [
                'item' => $item[1],
                'qty' => $item[2],
                'unit' => $item[3],
                'rate' => $item[4],
                'changeorder_id' => $idCo 
            ];
            $this->db->insert('changeorder_item', $arrItem);
        }
        $this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('msg-fail-add', 'Add Change/Variation Order failed.');
			echo $this->uri->segment(3);
			//redirect('dailylog/dailylog_index/' . $job_id);
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('msg-success-add', 'Add Change/Variation Order success.');
			echo $this->uri->segment(3);
			//redirect('dailylog/dailylog_index/' . $job_id);
		}
    }

    function getCo($job_id = null)
    {
        if ($job_id != null) {
            $this->db->where('job_id', $job_id);
        }
        return $this->db->get('changeorder')->result_array();
    }

    function getCoById($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('changeorder')->result_array();
    }

    function getCoItemById($id = null)
    {
        if ($id != null) {
            $this->db->where('changeorder_id', $id);
        }
        return $this->db->get('changeorder_item')->result_array();
    }

    function deleteCo($co_id = null)
    {
        $this->db->trans_start();
        $this->db->where('id', $co_id);
		$this->db->delete('changeorder');
        $this->db->where('changeorder_id', $co_id);
		$this->db->delete('changeorder_item');
        $this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('msg-fail-add', 'Delete Change/Variation Order failed.');
			redirect('changeorder/index/' . $this->uri->segment(3));
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('msg-success-add', 'Delete Change/Variation Order success.');
			redirect('changeorder/index/' . $this->uri->segment(3));
		}
    }
}
