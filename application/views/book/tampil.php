
<?php echo $this->session->flashdata('hasil'); ?>
<table>
    <tr><th>NIM</th><th>NAMA</th><th>ID JURUSAN</th><th>ALAMAT</th><th></th></tr>
    <?php
	
    foreach ($book as $m){
        echo "<tr>
              <td>$m->isbn</td>
              <td>$m->title</td>
              <td>$m->writer</td>
              <td>$m->description</td>
              <td>".anchor('tampil/edit/'.$m->isbn,'Edit')."
                  ".anchor('tampil/delete/'.$m->isbn,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
