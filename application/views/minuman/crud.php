	<!-- Page Heading -->

<?php echo $this->session->flashdata('hasil'); ?>
<div class="box box-primary">
            <br><div class="pull-right"><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> TAMBAH</a></div><br><br>
            
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
		<div id="reload">
		<table id="example2" class="table table-bordered table-striped" id="mydata">
			<thead>
				<tr>
					<th>ID</th>
					<th>MINUMAN</th>
					<th>HARGA</th>
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


	
		<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">TAMBAH MINUMAN</h3>
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
                        <label class="control-label col-xs-3" >MINUMAN</label>
                        <div class="col-xs-9">
                            <input name="nama_minuman" id="nama_minuman" class="form-control" type="text" placeholder="NAMA MINUMAN" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >HARGA</label>
                        <div class="col-xs-9">
                            <input name="harga" id="harga" class="form-control" type="text" placeholder="HARGA" style="width:335px;" required>
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
                <h3 class="modal-title" id="myModalLabel">EDIT MINUMAN</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-9">
                            <input name="id_minuman_edit" id="id_minuman2" class="form-control" type="text" placeholder="ID MINUMAN" style="width:335px;" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >MINUMAN</label>
                        <div class="col-xs-9">
                            <input name="nama_minuman_edit" id="nama_minuman2" class="form-control" type="text" placeholder="NAMA MINUMAN" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >HARGA</label>
                        <div class="col-xs-9">
                            <input name="hargaa_edit" id="harga22" class="form-control" type="text" placeholder="HARGA" style="width:335px;" required>
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
                        <h4 class="modal-title" id="myModalLabel">HAPUS MINUMAN</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="id_minuman" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus minuman ini?</p></div>
                                        
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

<script type="text/javascript">
	$(document).ready(function(){
		tampil_data();	
		
		$('#mydata').dataTable();
		 
		//VIEW
		function tampil_data(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url("apiminuman")?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].id_minuman+'</td>'+
		                        '<td>'+data[i].nama_minuman+'</td>'+
		                        '<td>'+data[i].harga+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success item_edit" data="'+data[i].id_minuman+'"><span class=" fa fa-pencil"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger item_hapus" data="'+data[i].id_minuman+'"><span class=" fa fa-trash-o"></span></a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id_minuman = $(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url("apiminuman")?>",
                dataType : "JSON",
                data : {id_minuman:id_minuman},
                success: function(data){
                	$.each(data,function(id_minuman, nama_minuman, harga){
                    	$('#ModalaEdit').modal('show');
            			$('[name="id_minuman_edit"]').val(data[0].id_minuman);
            			$('[name="nama_minuman_edit"]').val(data[0].nama_minuman);
            			$('[name="hargaa_edit"]').val(data[0].harga);
            		});
                }
            });
            return false;
        });


		//GET HAPUS
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="id_minuman"]').val(id);
        });

		//INPUT
		$('#btn_simpan').on('click',function(){
            var id_minuman=$('#id_minuman').val();
            var nama_minuman=$('#nama_minuman').val();
            var harga=$('#harga').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url("apiminuman")?>",
                dataType : "JSON",
                data : {id_minuman:id_minuman , nama_minuman:nama_minuman, harga:harga},
                success: function(data){
                    $('[name="id_minuman"]').val("");
                    $('[name="nama_minuman"]').val("");
                    $('[name="harga"]').val("");
                    $('#ModalaAdd').modal('hide');
                    
                }
            });
            return tampil_data();
        });

        //UPDATE
		$('#btn_update').on('click',function(){
            var id_minuman=$('#id_minuman2').val();
            var nama_minuman=$('#nama_minuman2').val();
            var harga=$('#harga22').val();
            $.ajax({
                type : "PUT",
                url  : "<?php echo base_url("apiminuman")?>",
                dataType : "JSON",
                data : {id_minuman:id_minuman , nama_minuman:nama_minuman, harga:harga},
                success: function(data){
                    $('[name="id_minuman_edit"]').val("");
                    $('[name="nama_minuman_edit"]').val("");
                    $('[name="hargaa_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    
                }
            });
            return tampil_data();
        });

        //DELETE
        $('#btn_hapus').on('click',function(){
            var id_minuman=$('#textkode').val();
            $.ajax({
            type : "DELETE",
            url  : "<?php echo base_url("apiminuman")?>",
            dataType : "JSON",
                    data : {id_minuman: id_minuman},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                           
                    }
                });
                return tampil_data();
            });

	});

</script>