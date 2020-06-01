<?php

class Mrekapan extends CI_Model {

	function get_data($id) {
		$this->db->select('penjualan.*, nozzel.nama as nozzel, tangki.nama as nama_tangki, jadwal_shift.nama as nama_jadwal_shift')
				 ->from("penjualan")
				 ->join("tangki", "tangki.id = penjualan.id_tangki")
				 ->join("nozzel", "nozzel.id = penjualan.id_nozzel")
				 ->join("admin", "admin.id = penjualan.id_admin")
				 ->join("jadwal_shift", "jadwal_shift.id = admin.id_jadwal_shift")
				 ->where('penjualan.id_jenis_bbm', $id)
				 ->order_by('penjualan.id', 'DDESC');
		return $this->db->get()->result();
	}

	function insert_data($data) {
		return $this->db->insert('penjualan ', $data);
	}

	function get_jenis_bbm(){
		$this->db->order_by('id', 'ASC');
		return $this->db->get('jenis_bbm')->result();
	}

	function get_tangki($id){
		$this->db->order_by('id', 'ASC');
		$this->db->where('id_jenis_bbm', $id);
		return $this->db->get('tangki')->result();
	}

	function get_nozzel($id){
		$this->db->order_by('id', 'ASC');
		$this->db->where('id_tangki', $id);
		return $this->db->get('nozzel')->result();
	}

	function get_jadwal_shift(){
		$this->db->order_by('id', 'ASC');
		return $this->db->get('jadwal_shift')->result();
	}

	function get_admin(){
		$this->db->order_by('id', 'ASC');
		$this->db->where('hak_akses !=', 0);
		return $this->db->get('admin')->result();
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('penjualan ')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('penjualan ', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('penjualan ');
	}

	function make_query()
	{
		$this->db->select('penjualan.*, nozzel.nama as nozzel, tangki.nama as nama_tangki, jadwal_shift.nama as nama_jadwal_shift')
				 ->from("penjualan")
				 ->join("tangki", "tangki.id = penjualan.id_tangki")
				 ->join("nozzel", "nozzel.id = penjualan.id_nozzel")
				 ->join("admin", "admin.id = penjualan.id_admin")
				 ->join("jadwal_shift", "jadwal_shift.id = admin.id_jadwal_shift");
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("nozzel.nama", $_POST["search"]["value"]);
						$this->db->or_like("tangki.nama", $_POST["search"]["value"]);
			 }
			 if(isset($_POST["order"]))
			 {
						$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
			 }
			 else
			 {
						$this->db->order_by('penjualan.id', 'DESC');
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
			 $this->db->from("penjualan ");
			 return $this->db->count_all_results();
	}


}
