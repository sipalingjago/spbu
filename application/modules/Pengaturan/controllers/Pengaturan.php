<?php

class Pengaturan extends Back_controller {

	public $judul = "Pengaturan";
	public $url = "Pengaturan";

	function __construct() {

		parent::__construct();
		$this->load->model('Mpengaturan', 'mdl');
		$cek = $this->session->userdata('logged_in');
		if(!($cek)) {
			redirect('Auth');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();
		$data_array['judul'] = $this->judul;
		$data_array['url'] = $this->url;

		$title = "Data ".$this->judul;
		$subtitle = $this->url;
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();
		$data_array['judul'] = $this->judul;
		$data_array['url'] = $this->url;
		$data_array['lokasi_pom'] = $this->mdl->get_lokasi_pom();
		$data_array['jadwal_shift'] = $this->mdl->get_jadwal_shift();

		$title = "Tambah Data ".$this->judul;
		$subtitle = $this->url;
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();
		$data_array['judul'] = $this->judul;
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['url'] = $this->url;

		$data_array['lokasi_pom'] = $this->mdl->get_lokasi_pom();
		$data_array['jadwal_shift'] = $this->mdl->get_jadwal_shift();
		$title = "Edit Data ".$this->judul;
		$subtitle = $this->url;
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}


	function insert() {

		$post = $this->input->post();
		$pass = $post['password'];
		unset($post['password']);
		$data = array(
			'password' => md5($pass)
		);

		$merge = array_merge($post, $data);

		$query = $this->mdl->insert_data($merge);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect($this->url.'/add');

	}

	function update() {

		$post = $this->input->post();
		$pass = $post['password'];
		if(!$pass) {
			unset($post['password']);
			$query = $this->mdl->update_data($post, $post['id']);
		} else {
			unset($post['password']);
			$data = array(
				'password' => md5($pass)
			);
			$merge = array_merge($post, $data);
			$query = $this->mdl->update_data($merge, $post['id']);
		}


		$query == true ? $this->alert_info('Berhasil Ubah Data') : $this->alert_error('Gagal Ubah Data');

		redirect($this->url);

	}

	function hapus($id) {

		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect($this->url);

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->nama_lokasi_pom;
				 $sub_array[] = $row->nama_jadwal_shift;
				 $sub_array[] = $row->nama;
				 $sub_array[] = $row->email;
				 $sub_array[] = "*******";
				 $sub_array[] = $row->hak_akses==1?"<span class='badge badge-success'>Admin</span>":"<span class='badge badge-primary'>User</span>";
				 $sub_array[] = $row->status==1?"<span class='badge badge-success'>Aktif</span>":"<span class='badge badge-danger'>Nonaktif</span>";
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

}
