<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Historypesanan extends CI_Controller {

     var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API=base_url();
        $this->load->model('HistoryPesanan_model');
    }
    

    function index(){
    	$id_u = $this->session->userdata('id');
    	$data['pesanan'] = $this->db->query("SELECT * FROM pesanan WHERE status='tidak_aktif'")->result();
    	$data['pesanan2'] = $this->db->query("SELECT * FROM pesanan WHERE id_user='$id_u' AND status='tidak_aktif'")->result();
		$data['konten'] = "historypesanan/crud";
        $this->load->view('index',$data);
    }


}
