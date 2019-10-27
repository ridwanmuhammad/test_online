<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function makanan($id)
    {
       return $this->db->query("SELECT makanan.*,pesan_makanan.* FROM makanan,pesan_makanan WHERE id_pesanan='$id' AND makanan.id_makanan=pesan_makanan.id_makanan")->result();

    }

    function minuman($id)
    {
       return $this->db->query("SELECT minuman.*,pesan_minuman.* FROM minuman,pesan_minuman WHERE id_pesanan='$id' AND minuman.id_minuman=pesan_minuman.id_minuman")->result();

    }

    function total_makanan($id)
    {
       return $this->db->query("SELECT SUM(harga*qty) as total, makanan.*,pesan_makanan.* FROM makanan,pesan_makanan WHERE pesan_makanan.id_pesanan='$id' AND makanan.id_makanan=pesan_makanan.id_makanan ")->row();

    }
    function total_minuman($id)
    {
       return $this->db->query("SELECT SUM(harga * qty) as total, minuman.*,pesan_minuman.* FROM minuman,pesan_minuman WHERE pesan_minuman.id_pesanan='$id' AND minuman.id_minuman=pesan_minuman.id_minuman")->row();
       
    }

}
