<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PesanMakanan extends CI_Controller {

     var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API=base_url();
    }
    

    function index(){
		$data['konten'] = "pesanmakanan/crud";
        $this->load->view('index',$data);
    }


}
