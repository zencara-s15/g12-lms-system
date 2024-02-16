<div class="col-xl-9 col-lg-8  col-md-12">
							
								<div class="card shadow-sm ctm-border-radius grow">
									<div class="card-body align-center">
										<div class="row filter-row">
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<select class="form-control select">
														<option selected>Start Date</option>
														<option>Date Of Birth</option>
														<option>Created At</option>
														<option>Leaving Date</option>
														<option>Visa Expiry Date</option>
													</select>
	
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<input type="text" class="form-control datetimepicker" placeholder="From">
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
													<input type="text" class="form-control datetimepicker" placeholder="To">
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<a href="#" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </a>  
											</div>
										</div>
									</div>
								</div>
								<div class="card shadow-sm grow ctm-border-radius">
									<div class="card-body align-center">
										<ul class="nav flex-row nav-pills" id="pills-tab" role="tablist" >
											<li class="nav-item mr-2">
												<a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Official Reports</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Personal reports</a>
											</li>
										</ul>
									</div>
								</div>
							<div class="card shadow-sm grow ctm-border-radius">
								<div class="card-body align-center">
									<div class="tab-content" id="pills-tabContent">
									
										<!--Tab 1-->
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
											<div class="employee-office-table">
												<div class="table-responsive">
													<table class="table custom-table">
														<thead>
															<tr>
																<th>Name</th>
																<th>Active</th>
																<th>Employment</th>
																<th>Email</th>
																<th>Job title</th>
																<th>Line Manager</th>
																<th>Team name</th>
																<th>Start Date</th>
																<th>Company Name</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-8.jpg"></a>
																	<h2><a href="employment.html"> Stacey Linville</a></h2>
																</td>
																<td>
																	<div class="dropdown action-label drop-active">
																		<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																		<div class="dropdown-menu">
																			<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																			<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																			<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																		</div>
																	</div>
																</td>
																<td>Permanent</td>
																<td><a href="#" class="__cf_email__" data-cfemail="3a494e5b595f435653544c5356565f7a5f425b574a565f14595557">[email&#160;protected]</a></td>
																<td>Team Lead</td>
																<td>Richard Wilson</td>
																<td>Testing</td>
																<td>05 Jan 2019</td>
																<td>Focus Technologies</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!--/Tab 1-->
										
										<!-- Tab 2-->
										 <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
											<div class="employee-office-table">
												<div class="table-responsive">
													<table class="table custom-table">
														<thead>
															<tr>
																<th>Name</th>
																<th>Gender</th>
																<th>Salary Current</th>
																<th>Date Of Birth</th>
																<th>Phone Number</th>
																<th>Address</th>
																<th>Bank Name</th>
																<th>Account Number</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
																	<h2><a href="employment.html">Danny Ward</a></h2>
																</td>
																<td>
																	Male
																</td>
																<td>$3000</td>
																<td>25 Jun 1984</td>
																<td>9876543231</td>
																<td>201 Lunetta Street,Plant City,<br> Florida(FL), 33566</td>
																<td>Life Essence Banks, Inc.</td>
																<td>112300987652</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
					
										
									</div>
									<div class="text-center mt-3">
										<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
	
		<!-- Create Reports The Modal -->
		<div class="modal fade" id="add_report">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create Report</h4>
						<form>
							<p class="mb-2">Select Report Type</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">Team Member</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio2">Time Off</label>
							</div>
							
							<div class="form-group">
								<label class="mt-3">What data would you like to include?</label>
								<!-- Multiselect dropdown -->
								<select multiple class="select w-100 form-control">
									<option>Full Name</option>
									<option>Working Days Off</option>
									<option>Booked By</option>
									<option>Start Date</option>
									<option>End Date</option>
									<option>Team Name</option>
									<option>First Name</option>
									<option>Last Name</option>
									<option>Email</option>
									<option>Date Of Birth</option>
									<option>Phone Number</option>
								</select><!-- End -->
							</div>
						</form>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>