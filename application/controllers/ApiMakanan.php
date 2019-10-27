<?php

require APPPATH . '/libraries/REST_Controller.php';
Class ApiMakanan Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
	

    
    // untuk menampilkan data
    function index_get(){
		$id = $this->get('id_makanan');
        if ($id == '') {
            $data = $this->db->get('makanan')->result();
        } else {
            $this->db->where('id_makanan', $id);
            $data = $this->db->get('makanan')->result();
        }
		
        //$data = $this->db->get('books')->result();
        return $this->response($data,200);
    }

    
    // untuk mengirim data
    function index_post(){
        $id_makanan    = $this->post('id_makanan');
        $nama_makanan  = $this->post('nama_makanan');
        $harga         = $this->post('harga');
        
        $makanan = array (
                    'id_makanan'	=>  $id_makanan,
                    'nama_makanan'	=>  $nama_makanan,
                    'harga'			=>  $harga);

        $insert = $this->db->insert('makanan',$makanan);
        
        if($insert){
            $this->response($makanan,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_put(){
        // parameter yang dikirimkan oleh client
        $id_makanan           = $this->put('id_makanan');
        $nama_makanan          = $this->put('nama_makanan');
        $harga         			= $this->put('harga');
        // menyimpan data dalam bentuk array
        $makanan	= array(
						'nama_makanan'	=>  $nama_makanan,
						'harga'			=>  $harga);
        // update berdasarkan sibn sebagai parameter
        $this->db->where('id_makanan',$id_makanan);
        $update = $this->db->update('makanan',$makanan); 
        // chek apakah update nya berhasil atau gagal
        if($update){
            $this->response($makanan,200);
        }else{
            $data = array ('status'=>'gagal insert');
            $this->response($data,502);
        }
    }
    
    function index_delete(){
        $id_makanan= $this->delete('id_makanan');
        $makanan = $this->db->get_where('makanan',array('id_makanan'=>$id_makanan));
        if($makanan->num_rows()>0){
            // delete data
            $this->db->where('id_makanan',$id_makanan);
            $this->db->delete('makanan');
            $data = array('status'=>'Berhasil Hapus Makanan Dengan ID : '.$id_makanan);
            $this->response($data,200);
        }else{
            $data = $data = array('status'=>'Makanan dengan ID: '.$id_makanan.' Tidak Ditemukan');
            $this->response($data,200);
        }
    }
}
?>
