<?php

class Rekapan extends Back_controller {

	public $judul = "Laporan Penerimaan Penjualan SPBU";
	public $url = "Rekapan";

	function __construct() {

		parent::__construct();
		$this->load->model('Mrekapan', 'mdl');
		$cek = $this->session->userdata('logged_in');
		if(!($cek)) {
			redirect('Auth');
		}

	}

	function index($id = NULL) {

		$data_array = array();
		$cek = $this->db->order_by('id', 'ASC')->get('jenis_bbm')->row();
		if($id == NULL) {
			$data_array['data'] = $this->mdl->get_data($cek->id);
			$data_array['tangki'] = $this->mdl->get_tangki($cek->id);
			$data_array['active'] = $cek->id;
		} else {
			$data_array['data'] = $this->mdl->get_data($id);
			$data_array['tangki'] = $this->mdl->get_tangki($id);
			$data_array['active'] = $id;
		}

		$data_array['bbm'] = $this->mdl->get_jenis_bbm();
		$data_array['judul'] = $this->judul;
		$data_array['url'] = $this->url;

		$data_array['jadwal_shift'] = $this->mdl->get_jadwal_shift();
		$data_array['user'] = $this->mdl->get_admin();
		$title = "Data ".$this->judul;
		$subtitle = $this->url;
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();
		$data_array['judul'] = $this->judul;
		$data_array['tangki'] = $this->mdl->get_tangki();
		$data_array['user'] = $this->mdl->get_admin();
		$data_array['url'] = $this->url;

		$title = "Tambah Data ".$this->judul;
		$subtitle = $this->url;
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();
		$data_array['judul'] = $this->judul;
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['tangki'] = $this->mdl->get_tangki();
		$data_array['nozzel'] = $this->mdl->get_nozzel($data_array['data']->id_tangki);
		$data_array['user'] = $this->mdl->get_admin();
		$data_array['url'] = $this->url;

		// echo json_encode($data_array['nozzel']);exit;

		$title = "Edit Data ".$this->judul;
		$subtitle = $this->url;
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect($this->url.'/index/'.$post['id_jenis_bbm']);

	}

	function update() {

		$post = $this->input->post();
		$query = $this->mdl->update_data($post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data') : $this->alert_error('Gagal Ubah Data');

		redirect($this->url.'/index/'.$post['id_jenis_bbm']);

	}

	function hapus($id, $id2) {

		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect($this->url.'/index/'.$id2);

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->nama_jadwal_shift;
				 $sub_array[] = $row->nama_tangki;
				 $sub_array[] = $row->nozzel;
				 $sub_array[] = $row->teller_akhir;
				 $sub_array[] = $row->teller_awal;
				 $sub_array[] = $row->teller_awal - $row->teller_akhir;
				 $sub_array[] = '<a href="'.site_url($this->url.'/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
				 <a href="'.site_url($this->url.'/hapus/'.$row->id).'" onclick="return confirm(\'Apakah Anda Yakin?\')" class="btn btn-danger btn-xs delete">Delete</a>';
				 $data[] = $sub_array;
		}
		$output = array(
				 "draw"                    =>     intval($_POST["draw"]),
				 "recordsTotal"          =>      $this->mdl->get_all_data(),
				 "recordsFiltered"     =>     $this->mdl->get_filtered_data(),
				 "data"                    =>     $data
		);
		echo json_encode($output);

	}

	function get_nozzel() {

		$id = $this->input->get('id');

		$nozzel = $this->mdl->get_nozzel($id);

		// echo $id;exit;

		echo "<option value=''>- Pilih Nozzel -</option>";
		foreach($nozzel as $row){
			echo "<option value='".$row->id."'>".$row->nama."</option>";
		}

	}

}
