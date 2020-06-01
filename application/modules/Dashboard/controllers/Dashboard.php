<?php

class Dashboard extends Back_controller {

	function __construct() {

		parent::__construct();

		$cek = $this->session->userdata('logged_in');
		if(!($cek)) {
			redirect('Auth');
		}

	}

	function index() {

		$data_array = array();

		$title = "Dashboard";
		$subtitle = "Dashboard";
		$content = $this->load->view('dashboard.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

}
