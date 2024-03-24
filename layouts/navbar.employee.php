 <!-- Offcanvas menu -->
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
     <div class="user-menu-items m-0 ">

         <a class="" href="/employees_dasboad">
             <span class="media align-items-center p-2 <?= checkActive("/employees_dasboad") ?>">
                 <span class="lnr lnr-home mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Dashboard</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/em_leave_request">
             <span class="media align-items-center p-2 <?= checkActive("/em_leave_request") ?>">
                 <span class="lnr lnr-users mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Apply</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/calendar">
             <span class="media align-items-center p-2 <?= checkActive("/calendar") ?>">
                 <span class="lnr lnr-calendar-full mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Calendar</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/leave_history">
             <span class="media align-items-center p-2 <?= checkActive("/leave_history") ?>">
                 <span class="lnr lnr-history mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">History</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/profiles_employee">
             <span class="media align-items-center p-2 <?= checkActive("/profiles_employee") ?>">
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
                                 <p>Employee Dashboard</p>
                             </div>
                         </div>
                     </div>
                     <!-- Sidebar -->
                     <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                         <div class="card ctm-border-radius shadow-sm border-none grow">
                             <div class="card-body">
                                 <div class="row no-gutters">
                                    
                                     <div class="col-6 align-items-center text-center">
                                         <a href="/employees_dasboad" class=" <?= checkActive("/employees_dasboad") ?> text-<?= colorCheck("/employees_dasboad") ?> p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                     </div>

                                     <div class="col-6 align-items-center text-center">
                                         <a href="/em_leave_request" class=" <?= checkActive("/em_leave_request") ?> text-<?= colorCheck("/em_leave_request") ?> p-4 second-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-file-add pr-0 pb-lg-2 font-23"></span><span class="">Apply</span></a>
                                     </div>

                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/calendar" class=" <?= checkActive("/calendar") ?> text-<?= colorCheck("/calendar") ?> p-4 ctm-border-left"><span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span></a>
                                     </div>


                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/leave_history" class=" <?= checkActive("/leave_history") ?> text-<?= colorCheck("/leave_history") ?> p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-history pr-0 pb-lg-2 font-23"></span><span class="">Leave History</span></a>
                                     </div>

                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/profiles_employee" class="<?= checkActive("/profiles_employee") ?> text-<?= colorCheck("/profiles_employee") ?> p-4 last-slider-btn ctm-border-right ctm-border-left"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </aside>
             </div>