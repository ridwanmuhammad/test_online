	<!-- Page Heading -->

<?php echo $this->session->flashdata('hasil'); ?>

<div class="col-md-6">
<div class="box box-primary">

            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
                <center><h3>SEMUA PESANAN</h3></center><br>
		<div id="reload">
		<table id="example2" class="table table-bordered table-striped" id="mydata">
			<thead>
				<tr>
					<th>ID PESANAN</th>
					<th>MAKANAN</th>
                    <th>MINUMAN</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pesanan as $p){?>
				<tr>
				<td><?php echo $p->id_pesanan;?></td>
				
				<td>
				<?php 
					$p1 = $p->id_pesanan;
                    $total = $this->HistoryPesanan_model->total_makanan($p1);
                    $p1_query = $this->HistoryPesanan_model->makanan($p1);
					foreach($p1_query as $makanan){
						echo "*".$makanan->nama_makanan." <br> x ".$makanan->qty."<br>";
					}
                        echo "<br><strong>Rp.".$total->total."</strong>";
				?>
				</td>
				
				<td><?php 
					$p2 = $p->id_pesanan;
                    $total2 = $this->HistoryPesanan_model->total_minuman($p1);
                    $p2_query = $this->HistoryPesanan_model->minuman($p1); 
					foreach($p2_query as $minuman){
						echo "*".$minuman->nama_minuman." <br> x ".$minuman->qty."<br>";
					}
                    echo "<br><strong>Rp.".$total2->total."</strong>";
				?></td>
				<td>
        
                <?php $hasil = $total->total + $total2->total;
                    echo "<strong>Rp.".$hasil."</strong>";
                 ?>            
                </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
	</div>
</div>
</div>
	
		
		
<div class="col-md-6">
<div class="box box-primary">

            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
                <center><h3>PESANAN YANG SAYA LAYANI</h3></center><br>
        <div id="reload">
        <table id="example2" class="table table-bordered table-striped" id="mydata">
            <thead>
                <tr>
                    <th>ID PESANAN</th>
                    <th>MAKANAN</th>
                    <th>MINUMAN</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pesanan2 as $p){?>
                <tr>
                <td><?php echo $p->id_pesanan;?></td>
                
                <td>
                <?php 
                    $p1 = $p->id_pesanan;
                    $total = $this->db->query("SELECT SUM(harga*qty) as total, makanan.*,pesan_makanan.* FROM makanan,pesan_makanan WHERE pesan_makanan.id_pesanan='$p1' AND makanan.id_makanan=pesan_makanan.id_makanan ")->row();
                    $p1_query = $this->db->query("SELECT makanan.*,pesan_makanan.* FROM makanan,pesan_makanan WHERE id_pesanan='$p1' AND makanan.id_makanan=pesan_makanan.id_makanan")->result();
                    foreach($p1_query as $makanan){
                        echo "*".$makanan->nama_makanan." <br> x ".$makanan->qty."<br>";
                    }
                    echo "<br><strong>Rp.".$total->total."</strong>";
                ?>
                </td>
                
                <td><?php 
                    $p2 = $p->id_pesanan;
                    $total = $this->db->query("SELECT SUM(harga*qty) as total, makanan.*,pesan_makanan.* FROM makanan,pesan_makanan WHERE pesan_makanan.id_pesanan='$p2' AND makanan.id_makanan=pesan_makanan.id_makanan ")->row();
                    $p2_query = $this->db->query("SELECT minuman.*,pesan_minuman.* FROM minuman,pesan_minuman WHERE id_pesanan='$p2' AND minuman.id_minuman=pesan_minuman.id_minuman")->result();
                    foreach($p2_query as $minuman){
                        echo "*".$minuman->nama_minuman." <br> x ".$minuman->qty."<br>";
                        
                    }
                    echo "<br><strong>Rp.".$total2->total."</strong>";
                ?></td>
                <td>
                     <?php $hasil = $total->total + $total2->total;
                    echo "<strong>Rp.".$hasil."</strong>";
                 ?> 
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
</div>

		
		
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
									'<a href="javascript:;" class="btn btn-primary item_lihat" data="'+data[i].id_pesanan+'"><span class=" fa fa-list"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-success item_edit" data="'+data[i].id_pesanan+'"><span class=" fa fa-pencil"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger item_hapus" data="'+data[i].id_pesanan+'"><span class=" fa fa-trash-o"></span></a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}
		
</script>