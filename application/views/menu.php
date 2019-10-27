
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>dist/image/21A.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($this->cryptz->md5_decrypt($this->session->userdata('nama')));?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><center><strong><span style="color:white; font-size:15px;" id="clock"></span></strong> </center></li>
        <!-- Optionally, you can add icons to the links -->
		<li><a href="<?php echo base_url('pesanan');?>"><i class="fa fa-link"></i> <span>Pesanan</span></a></li>
    <li><a href="<?php echo base_url('historypesanan');?>"><i class="fa fa-link"></i> <span>History Pesanan</span></a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li><a href="<?php echo base_url('makanan');?>"><i class="fa fa-circle-o"></i> Menu Makanan</a></li>
            <li><a href="<?php echo base_url('minuman');?>"><i class="fa fa-circle-o"></i> Menu Minuman</a></li>
          </ul>
        </li>
		

        <li><a href="<?php echo base_url("login/logout"); ?>"><i class="fa fa-link"></i> <span>Logout</span></a></li>
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>