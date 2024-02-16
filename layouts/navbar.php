 <!-- Offcanvas menu -->
 <div class="offcanvas-menu" id="offcanvas_menu">
     <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>

     <div class="user-info align-center bg-theme text-center">
         <a href="javascript:void(0)" class="d-block menu-style text-white">
             <div class="user-avatar d-inline-block mr-3">
                 <img src="assets/images/profiles/img-2.jpg" alt="user avatar" class="rounded-circle img-fluid" width="55" />
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
     <div class="user-menu-items px-3 m-0 ">
         <a class="px-0 pb-2 pt-0" href="index.html">
             <span class="media align-items-center">
                 <span class="lnr lnr-home mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Dashboard</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/employees">
             <span class="media align-items-center">
                 <span class="lnr lnr-users mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Employees</span>
                 </span>
             </span>
         </a>

         <a class="p-2" href="/calendars">
             <span class="media align-items-center">
                 <span class="lnr lnr-calendar-full mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Calendar</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/leaves">
             <span class="media align-items-center">
                 <span class="lnr lnr-briefcase mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Leave</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/reviews">
             <span class="media align-items-center">
                 <span class="lnr lnr-star mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Reviews</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/reports">
             <span class="media align-items-center">
                 <span class="lnr lnr-rocket mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Reports</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="/manages">
             <span class="media align-items-center">
                 <span class="lnr lnr-sync mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Manage</span>
                 </span>
             </span>
         </a>

         <a class="p-2" href="#">
             <span class="media align-items-center">
                 <span class="lnr lnr-cog mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Settings</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="employment.html">
             <span class="media align-items-center">
                 <span class="lnr lnr-user mr-3"></span>
                 <span class="media-body text-truncate text-left">
                     <span class="text-truncate text-left">Profile</span>
                 </span>
             </span>
         </a>
         <a class="p-2" href="login.html">
             <span class="media align-items-center">
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
                                 <img src="assets/images/profiles/img-2.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                             </div>
                             <div class="user-details">
                                 <h4><b>Welcome Admin</b></h4>
                                 <p>Sun, 29 Nov 2019</p>
                             </div>
                         </div>
                     </div>
                     <!-- Sidebar -->
                     <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                         <div class="card ctm-border-radius shadow-sm border-none grow">
                             <div class="card-body">
                                 <div class="row no-gutters">

                                     <!-- active class is for show color at nav-bar -->
                                     <?php
                                        function checkActive($path)
                                        {
                                            $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
                                            return $uri == $path ? "active" : "";
                                        }
                                        ?>
                                     <div class="col-6 align-items-center text-center">
                                         <a href="/" class=" <?= checkActive("/") ?> text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/employees" class=" <?= checkActive("/employees") ?> text-dark  p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Employees</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/departments" class=" <?= checkActive("/departments") ?> text-dark p-4 ctm-border-right"><span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Departments</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/leave_types" class=" <?= checkActive("/leave_types") ?> text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave Type</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/reviews" class=" <?= checkActive("/reviews") ?> text-dark p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/reports" class="<?= checkActive("/reports") ?> text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/manages" class="<?= checkActive("/manages") ?> text-dark p-4 ctm-border-right"><span class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span class="">Manage</span></a>
                                     </div>
                                     <div class="col-6 align-items-center shadow-none text-center">
                                         <a href="/profiles" class="<?= checkActive("/profiles") ?> text-dark p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- /Sidebar -->

                 </aside>
             </div>