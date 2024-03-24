<div class="col-xl-9 col-lg-8 col-md-12">

	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0">Departments</h4>
				</div>
				<div class="card-body" style="height: 200px;">
					<p class="card-text" style="height: 100px;">They can see and do everything – best not to have many with this role.</p>
					<div class="mt-2">
						<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="assets/img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></span>
						<a href="/departments" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Departments</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0">Leave Types</h4>
				</div>
				<div class="card-body" style="height: 200px;">
					<p class="card-text" style="height: 100px;">Admin to help sort stuff, but have less access to confidential information like salaries.</p>
					<div class="mt-2">
						<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="assets/img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></span>
						<a href="/leave_types" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Leave Types</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0">Team Leader</h4>
				</div>
				<div class="card-body" style="height: 200px;">
					<p class="card-text" style="height: 100px;">Team Members have the most limited access – most people should have this role.</p>
					<div class="mt-2">
						<span class="avatar" data-toggle="tooltip" data-placement="top" title="Maria Cotton"><img src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid"></span>
						<a href="team-member.html" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Permissions</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0">Rejected Leave</h4>
				</div>
				<div class="card-body" style="height: 200px;">
					<p class="card-text" style="height: 100px;">Team Members have the most limited access – most people should have this role.</p>
					<div class="mt-2">
						<span class="avatar" data-toggle="tooltip" data-placement="top" title="Maria Cotton"><img src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid"></span>
						<a href="/rejected_leaves" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Rejected Leave</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!-- Add Working Weeks -->
<div class="modal fade" id="addWorkWeek">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<form>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Edit Working Week</h4>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Mon" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Mon">Mon</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Tue" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Tue">Tue</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Wed" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Wed">Wed</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Thu" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Thu">Thu
						</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Fri" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Fri">Fri</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Sat" class="custom-control-input">
						<label class="mb-0 custom-control-label" for="Sat">Sat</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Sun" class="custom-control-input">
						<label class="mb-0 custom-control-label" for="Sun">Sun</label>
					</div>
					<br>
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Add Working Weeks -->
<div class="modal fade" id="edit_timedefault">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Company Default</h4>
				<div class="form-group">
					<label>Time Off Allowance</label>
					<input type="text" class="form-control" placeholder="Name" value="25 Days">
				</div>
				<div class="form-group">
					<label>Year Start</label>
					<input type="text" class="form-control datetpicker" placeholder="Year Start" value="01-01-2019">
				</div>
				<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
			</div>
		</div>
	</div>
</div>