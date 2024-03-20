<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="vendor/plugins/fullcalendar/fullcalendar.min.css">

<style>

</style>
<div class="col-xl-9 col-lg-8 col-md-12 position-relative grow">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Calendar</h3>
        </div>
        <div class="card-body">
            <!-- Alert Modal -->
            <div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center p-4">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <i class="material-icons text-success" style="font-size: 60px;">check_circle</i> <!-- Larger Success Icon -->
                            </div>
                            <h4 id="alert_message"></h4> <!-- Adjust font size and margin as needed -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- comfirm delete -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this event?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <!-- Select dropdown for view selection -->
                <div class="form-group">
                    <label for="view_selector">Select View:</label>
                    <select class="form-select" id="view_selector">
                        <option value="month">Month</option>
                        <option value="agendaWeek">Week</option>
                        <option value="agendaDay">Day</option>
                    </select>
                </div>
                <div id="calendar"></div>
            </div>
            <!-- Insert Modal -->
            <div class="modal fade" id="insert_modal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold text-primary" id="insertModalLabel">Request leave</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form to Request leave -->
                            <form id="insert_form" method="post">
                                <!-- hide data --------------------------------------->
                                <div class="row">
                                    <!-- get id user -->
                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>user_id</label>
                                            <input type="" class="form-control" name="user_id" value="<?= $user_info['id'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>Email</label>
                                            <input type="" class="form-control" name="email" value="<?= $user_info['email'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="full_name" value="<?= $user_info['first_name'] . ' ' . $user_info['last_name'] ?>">
                                        </div>
                                    </div>
                                    <!-- leave amount -->
                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>leave amount</label>
                                            <input type="" class="form-control" name="amount_leave" value="<?= $user_info['amount_leave']  ?>">
                                        </div>
                                    </div>
                                    <!-- status -->
                                    <div class="col-sm-6 leave-col" hidden>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="" class="form-control" name="status" value="Pending">
                                        </div>
                                    </div>
                                </div>
                                <!-- ----------------------------------------------- -->
                                <div class="form-group">
                                    <label for="leave_type_id">Leave types</label>
                                    <select class="custom form-select " id="leave_type" name="leave_type_id" title="Select type leave for request">
                                        <?php
                                        //call function from models/admin.model.php
                                        $leave_type = get_leave_types();
                                        ?>
                                        <option value="" selected disabled>Select type leave</option>
                                        <?php
                                        //loop to display
                                        foreach ($leave_type as $leave) :
                                        ?>
                                            <option value="<?= $leave['id'] ?>"><?= $leave['leave_type'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="start_date">Event start</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control " placeholder="Event start date " required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="end_date">Event end</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Event end date" required>
                                        </div>
                                    </div>
                                    <!-- <p id="totalDay">Total day: <span class="text-danger"></span></p> -->
                                    <br>
                                </div>
                                <div class="row">
                                    <!-- duration -->
                                    <div class="col-sm-6 leave-col">
                                        <div class="form-group">
                                            <label>Duration</label>
                                            <input id="duration" type="number" class="form-control" name="duration" disabled>
                                        </div>
                                    </div>

                                    <!-- leave amount left  -->
                                    <div class="col-sm-6 leave-col">
                                        <div class="form-group">
                                            <label>Remaining Leaves</label>
                                            <input type="text" class="form-control" disabled value="<?= $user_info['amount_leave']  ?>">
                                            <div class="text-danger"></div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Reason of leave</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group d-flex justify-content-end ">
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </form>
                            <!-- end of form -------------------------------------------------------------------------------------->
                        </div>
                    </div>

                </div>
            </div>
            <!-- Update/Delete Event Modal -->
            <div class="modal fade" id="update_delete_modal" tabindex="-1" role="dialog" aria-labelledby="updateDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold text-primary" id="updateDeleteModalLabel">Leave Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Title:</strong> <span id="event_title"></span></p>
                            <p><strong>Start Date:</strong> <span id="event_start_date"></span></p>
                            <p><strong>End Date:</strong> <span id="event_end_date"></span></p>
                            <p><strong>Description:</strong> <span id="event_description"></span></p>
                            <p><strong>Duration:</strong> <span id="event_duration"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-submit" id="update_event_button">Update</button>
                            <button type="button" class="btn btn-danger border-0 " id="delete_event_button">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Event Modal -->
            <div class="modal fade" id="update_event_modal" tabindex="-1" role="dialog" aria-labelledby="updateEventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold text-primary" id="updateEventModalLabel">Update Leave</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Update Event Form -->
                            <form id="update_event_form" method="post">
                                <!-- hide data --------------------------------------->
                                <div class="row">
                                    <!-- get id user -->
                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>user_id</label>
                                            <input type="" class="form-control" name="user_id" value="<?= $user_info['id'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>Email</label>
                                            <input type="" class="form-control" name="email" value="<?= $user_info['email'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="full_name" value="<?= $user_info['first_name'] . ' ' . $user_info['last_name'] ?>">
                                        </div>
                                    </div>
                                    <!-- leave amount -->
                                    <div class="col-sm-6">
                                        <div class="form-group" hidden>
                                            <label>leave amount</label>
                                            <input type="" class="form-control" name="amount_leave" value="<?= $user_info['amount_leave']  ?>">
                                        </div>
                                    </div>
                                    <!-- status -->
                                    <div class="col-sm-6 leave-col" hidden>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="" class="form-control" name="status" value="Pending">
                                        </div>
                                    </div>
                                </div>
                                <!-- ----------------------------------------------- -->
                                <div class="form-group">
                                    <label for="leave_type_id">Leave types</label>
                                    <select class="custom form-select " id="update_event_title" name="leave_type_id" title="Select type leave for request">
                                        <?php
                                        //call function from models/admin.model.php
                                        $leave_type = get_leave_types();
                                        ?>
                                        <option value="" selected disabled>Select a leave type to update</option>
                                        <?php
                                        //loop to display
                                        foreach ($leave_type as $leave) :
                                        ?>
                                            <option value="<?= $leave['id'] ?>"><?= $leave['leave_type'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="update_event_start_date">Start Date</label>
                                            <input type="date" class="form-control" id="update_event_start_date" name="start_date_update" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="update_event_end_date">End Date</label>
                                            <input type="date" class="form-control" id="update_event_end_date" name="end_date_update" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <!-- duration -->
                                    <div class="col-sm-6 leave-col">
                                        <div class="form-group">
                                            <label>Duration</label>
                                            <input id="duration_update" type="number" class="form-control" name="duration_update" disabled>
                                        </div>
                                    </div>

                                    <!-- leave amount left  -->
                                    <div class="col-sm-6 leave-col">
                                        <div class="form-group">
                                            <label>Remaining Leaves</label>
                                            <input type="text" class="form-control" disabled value="<?= $user_info['amount_leave']  ?>">
                                            <div class="text-danger"></div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="update_event_description">Reason of leave</label>
                                    <textarea class="form-control" id="update_event_description" name="description_update"></textarea>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <input type="hidden" id="update_event_id" name="id">
                                    <button type="submit" class="btn btn-primary btn-submit">Update</button>
                                </div>

                            </form>
                            <!-- End Update Event Form -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>