<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Apiminuman Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
	

    
    // untuk menampilkan data
    function index_get(){
		$id = $this->get('id_minuman');
        if ($id == '') {
            $data = $this->db->get('minuman')->result();
        } else {
            $this->db->where('id_minuman', $id);
            $data = $this->db->get('minuman')->result();
        }
		
        //$data = $this->db->get('books')->result();
        return $this->response($data,200);
    }

    
    // untuk mengirim data
    function index_post(){
        $id_minuman    = $this->post('id_minuman');
        $nama_minuman  = $this->post('nama_minuman');
        $harga         = $this->post('harga');
        
        $minuman = array (
                    'id_minuman'	=>  $id_minuman,
                    'nama_minuman'	=>  $nama_minuman,
                    'harga'			=>  $harga);

        $insert = $this->db->insert('minuman',$minuman);
        
        if($insert){
            $this->response($minuman,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_put(){
        // parameter yang dikirimkan oleh client
        $id_minuman           = $this->put('id_minuman');
        $nama_minuman          = $this->put('nama_minuman');
        $harga         			= $this->put('harga');
        // menyimpan data dalam bentuk array
        $minuman	= array(
						'nama_minuman'	=>  $nama_minuman,
						'harga'			=>  $harga);
        // update berdasarkan sibn sebagai parameter
        $this->db->where('id_minuman',$id_minuman);
        $update = $this->db->update('minuman',$minuman); 
        // chek apakah update nya berhasil atau gagal
        if($update){
            $this->response($minuman,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_delete(){
        $id_minuman= $this->delete('id_minuman');
        $minuman = $this->db->get_where('minuman',array('id_minuman'=>$id_minuman));
        if($minuman->num_rows()>0){
            // delete data
            $this->db->where('id_minuman',$id_minuman);
            $this->db->delete('minuman');
            $data = array('status'=>'Berhasil Hapus minuman Dengan ID : '.$id_minuman);
            $this->response($data,200);
        }else{
            $data = $data = array('status'=>'minuman dengan ID: '.$id_minuman.' Tidak Ditemukan');
            $this->response($data,200);
        }
    }
}
?>
