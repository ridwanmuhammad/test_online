<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Apipesanan Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
	

    
    // untuk menampilkan data
    function index_get(){
		$id = $this->get('id_pesanan');
        if ($id == '') {
            $data = $this->db->query('SELECT * FROM pesanan WHERE status="aktif"')->result();
        } else {
            $this->db->where('id_pesanan', $id);
            $data = $this->db->get('pesanan')->result();
        }
		
        //$data = $this->db->get('books')->result();
        return $this->response($data,200);
    }

    
    // untuk mengirim data
    function index_post(){
		
		$cek = $this->db->query("SELECT substr(id_pesanan,13,15) as cek FROM pesanan ORDER BY id_pesanan DESC")->row();
		$c = $cek->cek + 1;
        $id_pesanan    = "ERP".date("dmY")."-".sprintf("%03d", $c);
        $id_user  = $this->session->userdata('id');
        $nama_pelanggan  = $this->post('nama_pelanggan');
        $nomor_meja         = $this->post('nomor_meja');
        $status         = 'aktif';
        
        $pesanan = array (
                    'id_pesanan'	=>  $id_pesanan,
                    'id_user'	=>  $id_user,
                    'nama_pelanggan'	=>  $nama_pelanggan,
                    'nomor_meja'			=>  $nomor_meja,
                    'status'			=>  $status);

        $insert = $this->db->insert('pesanan',$pesanan);
        
        if($insert){
            $this->response($pesanan,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_put(){
        // parameter yang dikirimkan oleh client
        $id_pesanan           = $this->put('id_pesanan');
        $id_user          = '1';
        $nama_pelanggan          = $this->put('nama_pelanggan');
        $nomor_meja        			= $this->put('nomor_meja');
        $status       			= 'aktif';
        // menyimpan data dalam bentuk array
        $pesanan	= array(
						'id_user'	=>  $id_user,
						'nama_pelanggan'	=>  $nama_pelanggan,
						'nomor_meja'			=>  $nomor_meja,
						'status'			=>  $status);
        // update berdasarkan sibn sebagai parameter
        $this->db->where('id_pesanan',$id_pesanan);
        $update = $this->db->update('pesanan',$pesanan); 
        // chek apakah update nya berhasil atau gagal
        if($update){
            $this->response($pesanan,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_delete(){
        $id_pesanan= $this->delete('id_pesanan');
        $pesanan = $this->db->get_where('pesanan',array('id_pesanan'=>$id_pesanan));
        if($pesanan->num_rows()>0){
            // delete data
            $this->db->where('id_pesanan',$id_pesanan);
            $this->db->delete('pesanan');
            $data = array('status'=>'Berhasil Hapus pesanan Dengan ID : '.$id_pesanan);
            $this->response($data,200);
        }else{
            $data = $data = array('status'=>'pesanan dengan ID: '.$id_pesanan.' Tidak Ditemukan');
            $this->response($data,200);
        }
    }
}
?>
