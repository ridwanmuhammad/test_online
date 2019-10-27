<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pesanan extends CI_Controller {

     var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API=base_url();
        $this->load->model('Pesanan_model');
    }


    function index(){
		$data['pesanan'] = $this->db->query("SELECT * FROM pesanan WHERE status='aktif'")->result();
		$data['konten'] = "pesanan/crud";
        $this->load->view('index',$data);
    }
	function lihat(){
        $this->load->view('pesan_makanan/crud',$data);
    }
	function selesai($id){
        $this->db->query("UPDATE pesanan SET status='tidak_aktif' WHERE id_pesanan='$id'");
		redirect(base_url("historypesanan"));
    }

}
