<?php

class Mtangki extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tangki')->result();
	}

	function insert_data($data) {
		return $this->db->insert('tangki', $data);
	}

	function get_jenis_bbm(){
		$this->db->order_by('id', 'ASC');
		return $this->db->get('jenis_bbm')->result();
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('tangki')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('tangki', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('tangki');
	}

	function make_query()
	{
		$this->db->select('tangki.*, jenis_bbm.nama as jenis_bbm')
				 ->from("tangki")
				 ->join("jenis_bbm", "jenis_bbm.id=tangki.id_jenis_bbm");
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("tangki.nama", $_POST["search"]["value"]);
						// $this->db->or_like("date", $_POST["search"]["value"]);
			 }
			 if(isset($_POST["order"]))
			 {
						$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
			 }
			 else
			 {
						$this->db->order_by('tangki.id', 'DESC');
			 }
	}

	function make_datatables(){
			 $this->make_query();
			 if($_POST["length"] != -1)
			 {
						$this->db->limit($_POST['length'], $_POST['start']);
			 }
			 $query = $this->db->get();
			 return $query->result();
	}

	function get_filtered_data(){
			 $this->make_query();
			 $query = $this->db->get();
			 return $query->num_rows();
	}

	function get_all_data()
	{
			 $this->db->select("*");
			 $this->db->from("tangki");
			 return $this->db->count_all_results();
	}


}
