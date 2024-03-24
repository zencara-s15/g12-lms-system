 <?php
    function checkActive($path)
    {
        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        return $uri == $path ? "active" : "";
    }

    function colorCheck($path)
    {
        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        return $uri == $path ? "white" : "dark";
    }
    ?>

 <div class="offcanvas-menu" id="offcanvas_menu">
     <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>

     <div class="user-info align-center bg-theme text-center">
         <a href="javascript:void(0)" class="d-block menu-style text-white">
             <div class="user-avatar d-inline-block mr-3">
             <img src="<?= $imageSrc ?>" alt="User Avatar" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
             </div>
         </a>
     </div>
     <div class="user-notification-block align-center">
         <div class="top-nav-search">
             <form>
                 <input type="text" class="form-control" placeholder="Search here" />
                 <button class="btn" type="submit">
                     <i class="fa fa-search"></i>
                 </button>
             </form>
         </div>
     </div>
     <hr />
     <div class="user-menu-items m-0">
         <a class="" href="/admin">
             <span class="media align-items-center p-2 <?= checkActive("/admin") ?>">
                 <span class="lnr lnr-home mr-3" style="vertical-align: middle;"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Dashboard</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/employees">
             <span class="media align-items-center p-2 <?= checkActive("/employees") ?>">
                 <span class="lnr lnr-users mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Employees</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/leave_requests">
             <span class="media align-items-center p-2 <?= checkActive("/leave_requests") ?>">
                 <span class="lnr lnr-hourglass mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Reviews</span>
                 </span>
             </span>
         </a>

         <a class="p-2" href="/reports">
             <span class="media align-items-center p-2 <?= checkActive("/reports") ?>">
                 <span class="lnr lnr-license mr-3"></span>
                 <span class="media-body text-license text-left">
                     <span class="text-license text-left">Reports</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/manages">
             <span class="media align-items-center p-2 <?= checkActive("/manages") ?>">
                 <span class="lnr lnr-sync mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Manage</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/profiles">
             <span class="media align-items-center p-2 <?= checkActive("/profiles") ?>">
                 <span class="lnr lnr-user mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Profile</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="controllers/logout/logout_controller.php">
             <span class="media align-items-center p-2 <?= checkActive("/") ?>">
                 <span class="lnr lnr-power-switch mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Logout</span>
                 </span>
             </span>
         </a>
     </div>
 </div>
 <!-- /Offcanvas menu -->

 <!-- /Top Header Section -->
 </header>
 <!-- /Header -->
 <!-- Content -->
 <div class="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                 <aside class="sidebar sidebar-user">
                     <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                         <div class="user-info card-body">
                             <div class="user-avatar mb-4">
                                 <img src="<?= $imageSrc ?>" alt="User Avatar" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                             </div>
                             <div class="user-details">
                                 <h4><b>Welcome <?= $first_name ?></b></h4>
                                 <p>Admin Dashboard</p>
                             </div>
                         </div>
                     </div>
                     <!-- Sidebar -->
                     <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                         <div class="card ctm-border-radius shadow-sm border-none grow">
                             <div class="card-body">
                                 <div class="row no-gutters">

                                     <div class="col-6 align-items-center text-center">
                                         <a href="/admin" class=" <?= checkActive("/admin") ?> text-<?= colorCheck("/admin") ?> p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/employees" class=" <?= checkActive("/employees") ?> text-<?= colorCheck("/employees") ?>  p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Employees</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/leave_requests" class=" <?= checkActive("/leave_requests") ?> text-<?= colorCheck("/leave_requests") ?> p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-hourglass pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/reports" class="<?= checkActive("/reports") ?> text-<?= colorCheck("/reports") ?> p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-license pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/manages" class="<?= checkActive("/manages") ?> text-<?= colorCheck("/manages") ?> p-4 third-slider-btn ctm-border-left ctm-border-right"><span class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span class="">Manage</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/profiles" class="<?= checkActive("/profiles") ?> text-<?= colorCheck("/profiles") ?> p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>



                 </aside>
             </div>