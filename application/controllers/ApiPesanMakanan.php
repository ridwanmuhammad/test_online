<?php

require APPPATH . '/libraries/REST_Controller.php';
Class ApiPesanMakanan Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
	

    
    // untuk menampilkan data
    function index_get(){
		$id = $this->get('id_pesan_makanan');
        if ($id == '') {
            $data = $this->db->get('pesan_makanan')->result();
        } else {
            $this->db->where('id_pesan_makanan', $id);
            $data = $this->db->get('pesan_makanan')->result();
        }
		
        //$data = $this->db->get('books')->result();
        return $this->response($data,200);
    }

    
    // untuk mengirim data
    function index_post(){
        $id_pesanan  = $this->post('id_pesanan');
        $id_makanan  = $this->post('id_makanan');
        $qty         = $this->post('qty');
        
        $pesan_makanan = array (
                    'id_pesanan'	=>  $id_pesanan,
                    'id_makanan'	=>  $id_makanan,
                    'qty'			=>  $qty);

        $insert = $this->db->insert('pesan_makanan',$pesan_makanan);
        
        if($insert){
            $this->response($pesan_makanan,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_put(){
        // parameter yang dikirimkan oleh client
        $id_pesan_makanan           = $this->put('id_pesan_makanan');
        $id_pesann           = $this->put('id_pesanan');
        $id_makanan          = $this->put('id_makanan');
        $qty        		= $this->put('qty');
        // menyimpan data dalam bentuk array
        $pesan_makanan	= array(
						'id_pesanan'	=>  $id_pesanan,
						'id_makanan'	=>  $id_makanan,
						'qty'			=>  $qty);
        // update berdasarkan sibn sebagai parameter
        $this->db->where('id_pesan_makanan',$id_pesan_makanan);
        $update = $this->db->update('pesan_makanan',$pesan_makanan); 
        // chek apakah update nya berhasil atau gagal
        if($update){
            $this->response($pesan_makanan,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_delete(){
        $id_pesan_makanan= $this->delete('id_pesan_makanan');
        $pesan_makanan = $this->db->get_where('pesan_makanan',array('id_pesan_makanan'=>$id_pesan_makanan));
        if($pesan_makanan->num_rows()>0){
            // delete data
            $this->db->where('id_pesan_makanan',$id_pesan_makanan);
            $this->db->delete('pesan_makanan');
            $data = array('status'=>'Berhasil Hapus pesan makanan Dengan ID : '.$id_pesan_makanan);
            $this->response($data,200);
        }else{
            $data = $data = array('status'=>'pesan makanan dengan ID: '.$id_pesan_makanan.' Tidak Ditemukan');
            $this->response($data,200);
        }
    }
}
?>
