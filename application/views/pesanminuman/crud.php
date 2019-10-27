	<!-- Page Heading -->

<?php echo $this->session->flashdata('hasil'); ?>
<div class="box box-primary">
            <br><div class="pull-right"><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalaAddmn"><span class="fa fa-plus"></span> TAMBAH</a></div><br><br>
            
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
		<div id="reload">
		<table id="example2" class="table table-bordered table-striped" id="mydata">
			<thead>
				<tr>
					<th>ID</th>
					<th>ID PESANAN</th>
					<th>minuman</th>
					<th>QTY</th>
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
                            <input name="id_pesanan" id="id_pesanan" class="form-control" type="text" placeholder="ID PESANAN" style="width:335px;" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" >ID minuman</label>
                        <div class="col-xs-9">
                            <input name="id_minuman" id="id_minuman" class="form-control" type="text" placeholder="ID minuman" style="width:335px;" required>
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
		        url   : '<?php echo base_url("apipesanminuman")?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].id_pesan_minuman+'</td>'+
		                        '<td>'+data[i].id_pesanan+'</td>'+
		                        '<td>'+data[i].id_minuman+'</td>'+
		                        '<td>'+data[i].qty+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-danger item_hapusmn" data="'+data[i].id_pesan_minuman+'"><span class=" fa fa-trash-o"></span></a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

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