<!DOCTYPE html>

<?php
if($this->session->userdata('status') == "kasir" OR $this->session->userdata('status') == "pelayan"){
}else{
	redirect(base_url()."index.php/login");
}
	$id = $this->session->userdata('id');	
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. Erporate Solusi Global </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>dist/css/skins/skin-blue.min.css">




  <!-- Google Font -->
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">	
<!-- jQuery 3-->
<script src="<?php echo base_url();  ?>bower_components/jquery/dist/jquery.min.js"></script> 
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();  ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<!-- DataTables -->
<script src="<?php echo base_url();  ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();  ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();  ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();  ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();  ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes >-->
<script src="<?php echo base_url();  ?>dist/js/demo.js"></script>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini ">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>SG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PT. </b>ERP</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
        
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url(); ?>dist/image/21A.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>dist/image/21A.png" class="img-circle" alt="User Image">

                <p>
                  <small>PT Erporate Solusi Global. 2019</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/login/logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
<?php $this->load->view('menu');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><h3>

</h3>
		</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
		<?php 
		
		$this->load->view($konten);
		?>
		
		

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">PT. Erporate Solusi Global</a>.</strong> All rights reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


	<script>
	
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
  
  

	
</script> 
	 
</body>
</html>