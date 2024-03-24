//function alert notification-----------------------------------------------------------------------------------------------
function alert_success(message) {
  $("#success_alert_message").text(message);
  $("#alert_success_modal").modal("show").addClass("animate__animated animate__fadeIn"); // Add fadeIn animation from Animate.css
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
// ---------------------------------------------------------------------------------------------------------------------

// Function to fetch and display departments---------------------------------------------
$(document).ready(function () {
  function display_departments() {
    $.ajax({
      url: ".../../controllers/departments/display.department.controller.php",
      type: "GET",
      success: function (data) {
        $("#department_data").html(data);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }
//   ------------------------------------------------------------------------------------------

  // Call the display_departments() function to fetch and display departments
  $("#add_department_modal").on("click", 'button[type="submit"]', function (e) {
    e.preventDefault();
    const department_name= $("#department_name").val().trim();

    // Check if any field is empty
    if (department_name === '') {
        // Show alert to the user
        alert('Please enter the department name');
        return; // Exit the function without proceeding further
    }
    const formData = $("#add_department_form").serialize();
    $.ajax({
      type: "POST",
      url: "../../controllers/departments/create.department.controller.php",
      data: formData,
      success: function (response) {
        // Clear input fields
        $("#input").val("");
        $("#add_department_modal").modal("hide");
        display_departments();
        alert_success("User created successfully!");
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#add_department_modal").modal("hide");
        display_departments();
        alert("Failed to create user. Please try again.");
      },
    });
  });
//   ------------------------------------------------------------------------------------------
  
// Variable to store the latest department ID requested for deletion
let lastDeletedDepartmentId = null;

function delete_department(departmentId) {
  // Store the current department ID as the last one requested for deletion
  lastDeletedDepartmentId = departmentId;
  $('#delete_confirmation_modal').modal('show');
  // Event listener for when the user confirms deletion
  $('#delete_confirmed').one('click', function() {
    if (departmentId === lastDeletedDepartmentId) {
      $.ajax({
        type: "GET",
        url: "../../controllers/departments/delete.department.controller.php",
        data: { id: departmentId },
        success: function (response) {
          display_departments(); 
          $('#delete_confirmation_modal').modal('hide'); // Hide confirmation modal
          alert_success("Department deleted successfully!");
        },
        error: function (jqXHR, textStatus, errorThrown) {
          $('#delete_confirmation_modal').modal('hide'); // Hide confirmation modal
          showErrorAlert("Failed to delete department. Please try again.");
        },
      });
    }
  });
}


//   ------------------------------------------------------------------------------------------

// Event listener for update department button
$(document).on('click', '#update_department', function (event) {
    event.preventDefault(); // Prevent default form submission
    $('#update_department_modal').modal('show');
    var departmentId = $(this).data('id');
    console.log('departmentId', departmentId)
    const department_name = $(this).closest('tr').find('td:eq(1)').text();
    $('#id').val(departmentId);
    $('#update_department_name').val(department_name);
});
// Event listener for update department button
$(document).on('click', '#update_department_btn', function (event) {
    event.preventDefault(); // Prevent default form submission
    var departmentId = $('#id').val();
    var department_update_name = $('#update_department_name').val();
      if (department_update_name.trim() === '') {
        alert('Please enter a department name.');
        return; // Exit the function without proceeding further
    }

    $.ajax({
        url: '../../controllers/departments/update.department.controller.php',
        type: 'POST',
        data: {
            id: departmentId,
            update_department_name: department_update_name
        },
        success: function (response) {
            display_departments();
            $('#update_department_modal').modal('hide');
            alert_success("department updated successfully")
        },
        error: function (xhr, status, error) {
            display_departments();
            $('#update_department_modal').modal('hide');
            showErrorAlert("Error updating department");
        }
    });
});


  // Event listener for delete buttons
  $(document).on("click", "#delete_department", function () {
    var department_id = $(this).data("id");
    delete_department(department_id);
  });

  // clear input after hide
  $('#add_department_modal').on('hidden.bs.modal', function (e) {
    $('#add_department_form')[0].reset();
  });

  display_departments();
});
