<?php echo form_open('tampil/edit');

?>
<?php echo form_hidden('isbn',$book[0]->isbn);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$book[0]->isbn,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('title',$book[0]->title);?></td></tr>
    <tr><td>NOMOR</td><td><?php echo form_input('writer',$book[0]->writer);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('kontak','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>