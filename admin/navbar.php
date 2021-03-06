   <!-- Sidebar -->

   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-ad"></i>
           </div>
           <div class="sidebar-brand-text mx-3">
           <?php echo $_SESSION['username-admin'];  ?>
               </sup></div>
       </a>
 
       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="index.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Thống Kê</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           CHỨC NĂNG
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item ">
           <a class="nav-link" href="./product.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Sản Phẩm</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./loaisp.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Loại Sản Phẩm</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./hoadon.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Hoá Đơn Hàng</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./phieunhap.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Phiếu Nhập</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./khachhang.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Khách Hàng</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./nhanvien.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Nhân Viên</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./nhacungcap.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Nhà Cung Cấp</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="./donvi.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Quản Lý Đơn Vị</span></a>
       </li>
       <!--Nav-->


       <!-- Divider -->
       <hr class="sidebar-divider">



       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

           <!-- Topbar -->
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                   <i class="fa fa-bars"></i>
               </button>

               <!-- Topbar Search -->
               <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                   <div class="input-group">
                       <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                       <div class="input-group-append">
                           <button class="btn btn-primary" type="button">
                               <i class="fas fa-search fa-sm"></i>
                           </button>
                       </div>
                   </div>
               </form>


               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">
                   <div class="topbar-divider d-none d-sm-block"></div>

                   <!-- Nav Item - User Information -->
                   <li class="nav-item dropdown no-arrow">
                       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                               <?php echo $_SESSION['username-admin'];  ?>

                           </span>
                           <img src="https://bitly.com.vn/s9y1gq" alt="" class="img-profile rounded-circle">

                       </a>
                       <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <a class="dropdown-item" href="infouser-admin.php">
                               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                               Thông Tin
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                               Đăng Xuất
                           </a>
                       </div>
                   </li>

               </ul>

           </nav>
           <!-- End of Topbar -->


           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
               <i class="fas fa-angle-up"></i>
           </a>


           <!-- Logout Modal-->
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                           </button>
                       </div>
                       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                       <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                           <form action="logout.php" method="POST">

                               <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                           </form>


                       </div>
                   </div>
               </div>
           </div>