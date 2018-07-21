<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function get_history(&$out_array)
	{
		$out_array = $this->db->get('tbl_history')->result_array();
		return 200;
	}

	function add_history($filePath, $time)
	{
		$this->db->insert('tbl_history', array('path' => $filePath, 'time' => $time));
		return 200;
	}

	function clear_history()
	{
		$this->db->empty_table('tbl_history');
		array_map('unlink', glob("./uploads/*"));
		return 200;
	}
		
}