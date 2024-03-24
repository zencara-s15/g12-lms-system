//function alert notification-----------------------------------------------------------------------------------------------
function alert_success(message) {
  $("#success_alert_message").text(message);
  $("#alert_success_modal")
    .modal("show")
    .addClass("animate__animated animate__fadeIn"); // Add fadeIn animation from Animate.css
  setTimeout(function () {
    $("#alert_success_modal")
      .modal("hide")
      .removeClass("animate__animated animate__fadeIn"); // Remove fadeIn animation
  }, 1100); // Hide the alert modal after 2 seconds
}

// ---------------------------------------------------------------------------------------------------------------------

// Function to show error notification------------------------------------------------------------------------------
function showErrorAlert(message) {
  $("#error_alert_message").text(message);
  $("#alert_error_modal")
    .modal("show")
    .addClass("animate__animated animate__fadeIn"); // Add fadeIn animation from Animate.css
  setTimeout(function () {
    $("#alert_error_modal")
      .modal("hide")
      .removeClass("animate__animated animate__fadeIn"); // Remove fadeIn animation
  }, 1100); // Hide the error alert modal after 2 seconds
}

// Function to fetch and display leave_types
$(document).ready(function () {
  // Function to fetch and display leave_types
  function display_leave_types() {
    $.ajax({
      url: ".../../controllers/leave_types/display.leave_type.controller.php",
      type: "GET",
      success: function (data) {
        $("#leave_type_data").html(data);
      },
      error: function (xhr, status, error) {
        alert("Error occured while retrieving data!");
      },
    });
  }
  // create new leave_types
  $("#add_leave_type_form").submit(function (e) {
    e.preventDefault();
    const leaveType = $("#leave_type").val().trim();
    if (leaveType === "") {
      alert("Please enter the leave type.");
      return;
    }
    const formData = $("#add_leave_type_form").serialize();
    $.ajax({
      type: "POST",
      url: "../../controllers/leave_types/form_save.controller.php",
      data: formData,
      success: function (response) {
        display_leave_types();
        $("#add_leave_type_modal").modal("hide");
        alert_success("Leave type added successfully!");
      },
      error: function (xhr, status, error) {
        $("#add_leave_type_modal").modal("hide");
        showErrorAlert("Failed to add leave type. Please try again.");
      },
    });
  });
//   ------------------------------------------------------------------------------

// delete a leave type

// Event listener for delete buttons
$(document).on("click", "#delete_leave_type", function () {
    const leaveTypeId = $(this).data("id");
    console.log('leaveTypeId', leaveTypeId)
    delete_leave_type(leaveTypeId);
});

// Function to delete a leave type
function delete_leave_type(leaveTypeId) {
    $('#delete_confirmation_modal').modal('show');
    $('#delete_confirmed').off().one('click', function() {
        $.ajax({
            type: "GET",
            url: "../../controllers/leave_types/form_delete.controller.php",
            data: { id: leaveTypeId },
            success: function (response) {
                display_leave_types();
                $('#delete_confirmation_modal').modal('hide');
                alert_success("Leave type deleted successfully!");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                display_leave_types();
                $('#delete_confirmation_modal').modal('hide');
                showErrorAlert("Failed to delete leave type. Please try again.");
            },
        });
    });
}
// --------------------------------------------------------------------------------------------

 // Event listener for edit button
// Function to update a leave type
function updateLeaveType(leaveTypeId, leaveTypeName) {
    $('#update_leave_type_id').val(leaveTypeId); 
    $('#update_leave_type_name').val(leaveTypeName); 
    $('#update_leave_type_modal').modal('show');
}

// Event listener for the edit leave type button
$(document).on('click', '#edit_leave_type', function() {
    const leaveTypeId = $(this).data('id'); 
    const leaveTypeName = $(this).closest('tr').find('td:eq(1)').text(); 
    updateLeaveType(leaveTypeId, leaveTypeName);
});

// Event listener for the update leave type form submission
$('#update_leave_type_modal form').submit(function(e) {
    e.preventDefault(); 
    const leaveTypeId = $('#update_leave_type_id').val(); 
    const updatedLeaveTypeName = $('#update_leave_type_name').val(); 
    if (!updatedLeaveTypeName.trim()) {
        alert('Please enter a leave type.');
        return; // Exit the function if the leave type name is empty
    }
    $.ajax({
        url: '../../controllers/leave_types/form_update.controller.php',
        type: 'POST',
        data: {
            id: leaveTypeId,
            leave_type: updatedLeaveTypeName
        },
        success: function(response) {
            $('#update_leave_type_modal').modal('hide');
            display_leave_types();
            alert_success('Leave type updated successfully!');

        },
        error: function(xhr, status, error) {
            $('#update_leave_type_modal').modal('hide');
            display_leave_types();
            showErrorAlert('Failed to update leave type. Please try again.');
        }
    });
});

// Search leave type---------------------------------------------------------------------------------------------------
$('#search_leave_type').on('input', function() {
  var searchText = $(this).val().toLowerCase();
  $('#leave_type_data tr').each(function() {
      var leaveType = $(this).find('td:eq(1)').text().toLowerCase();
      if (leaveType.includes(searchText)) {
          $(this).show(); // Show the row if the leave type matches the search text
      } else {
          $(this).hide(); // Hide the row if the leave type does not match the search text
      }
  });

  // Show "No leave type found" message if no matching leave types are found
  $('#notFoundRow').toggleClass('d-none', $('#leave_type_data tr:visible').length > 0);
});



  // clear input after hide
  $('#add_leave_type_modal').on('hidden.bs.modal', function (e) {
    $('#add_leave_type_form')[0].reset();
  });


  // call to display data
  display_leave_types();
});
