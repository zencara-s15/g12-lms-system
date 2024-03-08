<?php
// var_dump($_SESSION['user']) // testing 
?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Permission</h4>
                    <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Leave Today</h4>
                    <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Today</h4>
                    <a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
                </div>
                <div class="card-body recent-activ">
                    <div class="recent-comment">
                        <a href="javascript:void(0)" class="dash-card text-dark">
                            <div class="dash-card-container">
                                <div class="dash-card-icon text-warning">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">
                                        Ralph Baker is off sick today
                                    </h6>
                                </div>
                                <div class="dash-card-avatars">
                                    <div class="e-avatar">
                                        <!-- <img class="img-fluid" src="assets/img/profiles/img-9.jpg" alt="Avatar" /> -->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Team Leads List -->
            <div class="card flex-fill team-lead shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Team Leads</h4>
                    <a href="employees-team.html" class="dash-card d-inline-block float-right mb-0 text-primary">Manage Team
                    </a>
                </div>
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                            <!-- <img src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid" /> -->
                        </div>
                        <div class="media-body">
                            <h6 class="m-0">Maria Cotton</h6>
                            <p class="mb-0 ctm-text-sm">PHP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-12 d-flex">
            <!-- Today -->
            <div class="card flex-fill today-list shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                        Your Upcoming Leave
                    </h4>
                    <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
                <div class="card-body recent-activ">
                    <div class="recent-comment">
                        <a href="javascript:void(0)" class="dash-card text-danger">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Mon, 16 Dec 2019</h6>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>