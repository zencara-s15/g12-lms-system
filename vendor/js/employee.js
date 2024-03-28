    // use to show image when choose image
    function preview_image_update(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('preview_image_update');
            output.src = reader.result;
            console.log("File selected. Image preview updated.");
        }
        reader.readAsDataURL(event.target.files[0]);
    }
      
      function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview-image');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
  
    //function add class to form for validation the inputs
    function validateForm() {
        let form = document.querySelector('#create_employee_form');
        form.classList.add('was-validated');
  
    }
  
    //function alert notification-----------------------------------------------------------------------------------------------
  function showAlert(message) {
    $('#alertMessage').text(message);
    $('#alertModal').modal('show').addClass('animate__animated animate__fadeIn'); // Add fadeIn animation from Animate.css
    setTimeout(function() {
        $('#alertModal').modal('hide').removeClass('animate__animated animate__fadeIn'); // Remove fadeIn animation
    }, 1100); // Hide the alert modal after 2 seconds
  }
  
  // ---------------------------------------------------------------------------------------------------------------------
  
  // Function to show error notification------------------------------------------------------------------------------
  function showErrorAlert(message) {
    $('#errorAlertMessage').text(message);
    $('#errorAlertModal').modal('show').addClass('animate__animated animate__fadeIn'); // Add fadeIn animation from Animate.css
    setTimeout(function() {
        $('#errorAlertModal').modal('hide').removeClass('animate__animated animate__fadeIn'); // Remove fadeIn animation
    }, 1100); // Hide the error alert modal after 2 seconds
  }
  // ---------------------------------------------------------------------------------------------------------------------
  
  
  
  
  $(document).ready(function () {
    // Function to fetch and display employees
    function displayEmployees() {
      $.ajax({
        url: "../controllers/employees/new code/display.employee.controller.php",
        type: "GET",
        success: function (data) {
          $("#employees_data").html(data);
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
        },
      });
    }
  
    // --------------------------------------------------------------------
// Function to handle form submission
$("#create_employee_form").submit(function (event) {
    event.preventDefault(); // Prevent default form submission
   
    // Serialize form data
    var formData = new FormData($(this)[0]);
   
    // Submit form data using AJAX
    $.ajax({
       url: "../controllers/employees/new code/insert.employee.controller.php",
       type: "POST",
       data: formData,
       processData: false,
       contentType: false,
       success: function (response) {
         // Handle success response
         $('#create_employee_modal').modal('hide'); // Corrected modal ID
         showAlert("Create the employee successfully");
         displayEmployees();
         console.log(response);
   
         // Clear the form fields and reset the form validation state
         $('#create_employee_form')[0].reset();
         $('#create_employee_form').removeClass('was-validated');
       },
       error: function (xhr, status, error) {
         showErrorAlert("An error occurred");
         // Handle error response
         console.error(xhr.responseText);
       },
    });
   });
   
  
        // Function to delete an employee
        function delete_employee(id) {
          $('#deleteConfirmationModal').modal('show'); // Show confirmation modal
          $('#deleteUserConfirmed').on('click', function() {
          $.ajax({
              url: "../controllers/employees/new code/remove.employee.controller.php?id=" + id,
              type: "GET",
              success: function (response) {
                  // Handle success response
                  console.log(response);
                  $('#deleteConfirmationModal').modal('hide'); 
                  displayEmployees(); // Refresh employee list
                  showAlert("Deleted employee successfully")
              },
              error: function (xhr, status, error) {
                showErrorAlert("An error occurred");
                  // Handle error response
                  console.error(xhr.responseText);
              },
              
          });
        });
      }
  
      // Event listener for delete buttons
  $(document).on('click', '#delete_employee', function () {
    var employeeId = $(this).data('id');
    console.log('employeeId', employeeId);
      delete_employee(employeeId);
  });
  
// update employee
   $('#update_employee_form').submit(function(e) {
    e.preventDefault();
    let form_data = $(this).serialize();
    console.log("Form data:", form_data); // Log form data for debugging
    $.ajax({
       url: '../controllers/employees/update.employee.controller.php',
       method: 'POST',
       data: form_data,
       success: function(response){
        displayEmployees();
        showAlert("Updated employee successfully")
       },
       error: function (xhr, status, error) {
        displayEmployees();
         showErrorAlert("An error occurred");
  
       },
    });
   });
   

   $('#addEmployeeModal').on('hidden.bs.modal', function (e) {
    $('#create_employee_form')[0].reset();
    $('#preview-image').attr('src', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png');
    $("#create_employee_form").removeClass("was-validated")
  });

  
    // Call the function to display employees when the page loads
    displayEmployees();
  
    
  });
  
  