<?php

require APPPATH . '/libraries/REST_Controller.php';
Class ApiPesanminuman Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
	

    
    // untuk menampilkan data
    function index_get(){
		$id = $this->get('id_pesan_minuman');
        if ($id == '') {
            $data = $this->db->get('pesan_minuman')->result();
        } else {
            $this->db->where('id_pesan_minuman', $id);
            $data = $this->db->get('pesan_minuman')->result();
        }
		
        //$data = $this->db->get('books')->result();
        return $this->response($data,200);
    }

    
    // untuk mengirim data
    function index_post(){
        $id_pesanan  = $this->post('id_pesanan');
        $id_minuman  = $this->post('id_minuman');
        $qty         = $this->post('qty');
        
        $pesan_minuman = array (
                    'id_pesanan'	=>  $id_pesanan,
                    'id_minuman'	=>  $id_minuman,
                    'qty'			=>  $qty);

        $insert = $this->db->insert('pesan_minuman',$pesan_minuman);
        
        if($insert){
            $this->response($pesan_minuman,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_put(){
        // parameter yang dikirimkan oleh client
        $id_pesan_minuman           = $this->put('id_pesan_minuman');
        $id_pesann           = $this->put('id_pesanan');
        $id_minuman          = $this->put('id_minuman');
        $qty        		= $this->put('qty');
        // menyimpan data dalam bentuk array
        $pesan_minuman	= array(
						'id_pesanan'	=>  $id_pesanan,
						'id_minuman'	=>  $id_minuman,
						'qty'			=>  $qty);
        // update berdasarkan sibn sebagai parameter
        $this->db->where('id_pesan_minuman',$id_pesan_minuman);
        $update = $this->db->update('pesan_minuman',$pesan_minuman); 
        // chek apakah update nya berhasil atau gagal
        if($update){
            $this->response($pesan_minuman,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_delete(){
        $id_pesan_minuman= $this->delete('id_pesan_minuman');
        $pesan_minuman = $this->db->get_where('pesan_minuman',array('id_pesan_minuman'=>$id_pesan_minuman));
        if($pesan_minuman->num_rows()>0){
            // delete data
            $this->db->where('id_pesan_minuman',$id_pesan_minuman);
            $this->db->delete('pesan_minuman');
            $data = array('status'=>'Berhasil Hapus pesan minuman Dengan ID : '.$id_pesan_minuman);
            $this->response($data,200);
        }else{
            $data = $data = array('status'=>'pesan minuman dengan ID: '.$id_pesan_minuman.' Tidak Ditemukan');
            $this->response($data,200);
        }
    }
}
?>
