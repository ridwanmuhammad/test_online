	<!-- Page Heading -->

<?php echo $this->session->flashdata('hasil'); ?>
<div class="col-md-6">
<div class="box box-primary">
            <br><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> TAMBAH</a><br><br>
            
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
		<div id="reload">
		<table id="example2" class="table table-bordered table-striped" id="mydata">
			<thead>
				<tr>
					<th>ID PESANAN</th>
					<th>PELANGGAN</th>
					<th>NOMOR MEJA</th>
					<th style="text-align: right;">ACTION</th>
				</tr>
			</thead>
			<tbody id="show_data">
				
			</tbody>
		</table>
		</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-6">
<div class="box box-primary">
			<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalaAddmk"><span class="fa fa-plus"></span> TAMBAH MAKANAN</a>
			<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalaAddmn"><span class="fa fa-plus"></span> TAMBAH MINUMAN</a>
            
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
		<div id="reload">
		<table id="example2" class="table table-bordered table-striped" id="mydata">
			<thead>
				<tr>
					<th>ID PESANAN</th>
					<th>MAKANAN</th>
                    <th>MINUMAN</th>
					<th>TOTAL</th>
					<?php if($this->session->userdata('status')=="kasir"){?><th style="text-align;">STATUS</th><?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pesanan as $p){?>
				<tr>
				<td><?php echo $p->id_pesanan;?></td>
				
				<td>
				<?php 
					$p1 = $p->id_pesanan;
                    $total = $this->Pesanan_model->total_makanan($p1);
					$p1_query = $this->Pesanan_model->makanan($p1);
					foreach($p1_query as $makanan){
						echo "*".$makanan->nama_makanan." <br> x ".$makanan->qty."<br>";
						
					}
				?>
				</td>
				
				<td><?php 
                    $total2 = $this->Pesanan_model->total_minuman($p1);
					$p2_query = $this->Pesanan_model->minuman($p1);
					foreach($p2_query as $minuman){
						echo "*".$minuman->nama_minuman." <br> x ".$minuman->qty."<br>";
						
					}
				?></td>
                    <td>
                        <?php $hasil = $total->total + $total2->total;
                    echo "<strong>Rp.".$hasil."</strong>";
                 ?>

                    </td>
				
				<?php if($this->session->userdata('status')=="kasir"){?>
                    <td>
                    <a class="btn btn-success btn-xs" href="<?php echo base_url("pesanan/selesai/".$p->id_pesanan)?>">SELESAI</a>
                    </td>
                <?php } ?>
				
				
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
	</div>
</div>
</div>
	
		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">TAMBAH PESANAN</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					<!--
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="id_minuman" id="id_minuman" class="form-control" type="text" placeholder="ID MINUMAN" style="width:335px;" required>
                        </div>
                    </div>
					-->
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NAMA PELANGGAN</label>
                        <div class="col-xs-9">
                            <input name="nama_pelanggan" id="nama_pelanggan" class="form-control" type="text" placeholder="NAMA PELANGGAN" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NOMOR MEJA</label>
                        <div class="col-xs-9">
                            <select name="nomor_meja" id="nomor_meja" class="form-control" style="width:335px;" >
                                <?php for($a=1;$a<10;$a++){
                                    $b = $this->db->query("SELECT * FROM pesanan WHERE status='aktif' AND nomor_meja='$a'")->row();
                                    if($b->nomor_meja != NULL){

                                    }else{
                                        echo "<option value='".$a."'>".$a."</option>";
                                    }

                                    ?>
                                
                            <?php }?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">SIMPAN</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">EDIT PESANAN</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="id_pesanan_edit" id="id_pesanan2" class="form-control" type="text" placeholder="ID PESANAN" style="width:335px;" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NAMA PELANGGAN</label>
                        <div class="col-xs-9">
                            <input name="nama_pelanggan_edit" id="nama_pelanggan2" class="form-control" type="text" placeholder="NAMA PELANGGAN" style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NOMOR MEJA</label>
                        <div class="col-xs-9">
                            <input name="nomor_meja_edit" id="nomor_meja2" class="form-control" type="text" placeholder="NOMOR MEJA" style="width:335px;">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-info" id="btn_update">EDIT</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">HAPUS PESANAN</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="id_pesanan" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus pesanan ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

		
		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAddmk" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">TAMBAH MAKANAN</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID PESANAN </label>
                        <div class="col-xs-9">
                            <select name="id_pesanan" id="id_pesanan" class="form-control" style="width:335px;">
                                <?php
                                 $pa = $this->db->query("SELECT * FROM pesanan WHERE status='aktif'")->result();
                                 foreach($pa as $p){
                                 ?>
                                <option value="<?php echo $p->id_pesanan; ?>"><?php echo $p->id_pesanan?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" >ID MAKANAN</label>
                        <div class="col-xs-9">
                            <select name="id_makanan" id="id_makanan" class="form-control" style="width:335px;">
                                <?php
                                 $ma = $this->db->query("SELECT * FROM makanan")->result();
                                 foreach($ma as $m){
                                 ?>
                                <option value="<?php echo $m->id_makanan?>"><?php echo $m->nama_makanan?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >QTY</label>
                        <div class="col-xs-9">
                            <input name="qty" id="qty" class="form-control" type="text" placeholder="QTY" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpanmk">SIMPAN</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAddmn" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">TAMBAH minuman</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
					
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID PESANAN </label>
                        <div class="col-xs-9">
                            <select name="id_pesanan" id="id_pesanan" class="form-control" style="width:335px;">
                                <?php
                                 $pa = $this->db->query("SELECT * FROM pesanan WHERE status='aktif'")->result();
                                 foreach($pa as $p){
                                 ?>
                                <option value="<?php echo $p->id_pesanan; ?>"><?php echo $p->id_pesanan?></option>
                                <?php } ?>
                            </select>   
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" >ID minuman</label>
                        <div class="col-xs-9">
                            <select name="id_minuman" id="id_minuman" class="form-control" style="width:335px;">
                                <?php
                                 $mna = $this->db->query("SELECT * FROM minuman")->result();
                                 foreach($mna as $mn){
                                 ?>
                                <option value="<?php echo $mn->id_makanan?>"><?php echo $mn->nama_minuman?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >QTY</label>
                        <div class="col-xs-9">
                            <input name="qty" id="qty" class="form-control" type="text" placeholder="QTY" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpanmn">SIMPAN</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data();	
		
		$('#mydata').dataTable();
		 
		//VIEW
		function tampil_data(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url("apipesanan")?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].id_pesanan+'</td>'+
		                        '<td>'+data[i].nama_pelanggan+'</td>'+
		                        '<td>'+data[i].nomor_meja+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success item_edit" data="'+data[i].id_pesanan+'"><span class=" fa fa-pencil"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger item_hapus" data="'+data[i].id_pesanan+'"><span class=" fa fa-trash-o"></span></a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}
		$(function(){
            $(document).on('click','.item_lihat',function(e){
                e.preventDefault();
                $("#ModalaLihat").modal('show');
                $.post('<?php echo base_url("pesanan/lihat")?>',
                    {id:$(this).attr('data')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id_pesanan = $(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url("apipesanan")?>",
                dataType : "JSON",
                data : {id_pesanan:id_pesanan},
                success: function(data){
                	$.each(data,function(id_pesanan, nama_pelanggan, nomor_meja){
                    	$('#ModalaEdit').modal('show');
            			$('[name="id_pesanan_edit"]').val(data[0].id_pesanan);
            			$('[name="nama_pelanggan_edit"]').val(data[0].nama_pelanggan);
            			$('[name="nomor_meja_edit"]').val(data[0].nomor_meja);
            		});
                }
            });
            return false;
        });


		//GET HAPUS
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="id_pesanan"]').val(id);
        });

		//INPUT
		$('#btn_simpan').on('click',function(){
            var id_pesanan=$('#id_pesanan').val();
            var nama_pelanggan=$('#nama_pelanggan').val();
            var nomor_meja=$('#nomor_meja').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url("apipesanan")?>",
                dataType : "JSON",
                data : {id_pesanan:id_pesanan , nama_pelanggan:nama_pelanggan, nomor_meja:nomor_meja},
                success: function(data){
                    $('[name="id_pesanan"]').val("");
                    $('[name="nama_pelanggan"]').val("");
                    $('[name="nomor_meja"]').val("");
                    $('#ModalaAdd').modal('hide');
                    
                }
            });
            return tampil_data();
        });

        //UPDATE
		$('#btn_update').on('click',function(){
            var id_pesanan=$('#id_pesanan2').val();
            var nama_pelanggan=$('#nama_pelanggan2').val();
            var nomor_meja=$('#nomor_meja2').val();
            $.ajax({
                type : "PUT",
                url  : "<?php echo base_url("apipesanan")?>",
                dataType : "JSON",
                data : {id_pesanan:id_pesanan , nama_pelanggan:nama_pelanggan, nomor_meja:nomor_meja},
                success: function(data){
                    $('[name="id_pesanan_edit"]').val("");
                    $('[name="nama_pelanggan_edit"]').val("");
                    $('[name="nomor_meja_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    
                }
            });
            return tampil_data();
        });

        //DELETE
        $('#btn_hapus').on('click',function(){
            var id_pesanan=$('#textkode').val();
            $.ajax({
            type : "DELETE",
            url  : "<?php echo base_url("apipesanan")?>",
            dataType : "JSON",
                    data : {id_pesanan: id_pesanan},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                           
                    }
                });
                return tampil_data();
            });
			
			//INPUT
		$('#btn_simpanmk').on('click',function(){
            var id_pesan_makanan=$('#id_pesan_makanan').val();
            var id_pesanan=$('#id_pesanan').val();
            var id_makanan=$('#id_makanan').val();
            var qty=$('#qty').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url("apipesanmakanan")?>",
                dataType : "JSON",
                data : {id_pesanan:id_pesanan ,id_makanan:id_makanan, qty:qty},
                success: function(data){
                    $('[name="id_pesanan"]').val("");
                    $('[name="id_makanan"]').val("");
                    $('[name="qty"]').val("");
                    $('#ModalaAddmk').modal('hide');
                    
                }
            });
            return tampil_data();
        });
		//INPUT
		$('#btn_simpanmn').on('click',function(){
            var id_pesan_minuman=$('#id_pesan_minuman').val();
            var id_pesanan=$('#id_pesanan').val();
            var id_minuman=$('#id_minuman').val();
            var qty=$('#qty').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url("apipesanminuman")?>",
                dataType : "JSON",
                data : {id_pesanan:id_pesanan ,id_minuman:id_minuman, qty:qty},
                success: function(data){
                    $('[name="id_pesanan"]').val("");
                    $('[name="id_minuman"]').val("");
                    $('[name="qty"]').val("");
                    $('#ModalaAddmn').modal('hide');
                    
                }
            });
            return tampil_data();
        });

	});

</script>