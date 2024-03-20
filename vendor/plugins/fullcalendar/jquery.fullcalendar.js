// Function to calculate and display duration for insert
function calculate_duration_insert(start, end) {
  const duration = moment.duration(moment(end).diff(moment(start)));
  const days = duration.asDays();
  $("#start_date").val(moment(start).format("YYYY-MM-DD"));
  $("#end_date").val(moment(end).format("YYYY-MM-DD"));
  $("#duration").val(days);
}

// Function to calculate and display duration for update
function calculate_duration_update(newStart, newEnd) {
  const duration = moment.duration(moment(newEnd).diff(moment(newStart)));
  const days = duration.asDays();
  $("#duration_update").val(days);
}

$(document).ready(function () {
  const calendar = $("#calendar").fullCalendar({
    defaultView: "month", // Default view
    header: {
      left: "title",
      center: "",
      right: "prev,next today",
    },
    timeZone: "local",
    editable: true,
    selectable: true,
    selectHelper: true,
    select: function (start, end) {
      // Set data attributes on insert modal
      $("#insert_modal").data("start", start);
      $("#insert_modal").data("end", end);

      // Show insert modal
      $("#insert_modal").modal("show");
    },
    events: {
      url: "../../controllers/calendar/display_event.controller.php", // Specify the path to your display_event.php file
      error: function () {
        alert("Error fetching events!");
      },
    },
    // eventClick function to handle click on an event
    eventClick: function (event) {
      // Fill update modal with event data
      $("#event_title").text(event.title);
      $("#event_start_date").text(moment(event.start).format("YYYY-MM-DD"));
      $("#event_end_date").text(moment(event.end).format("YYYY-MM-DD"));
      $("#event_description").text(event.description);

      // Calculate and display the duration of the leave
      var duration = moment.duration(
        moment(event.end).diff(moment(event.start))
      );
      var days = duration.asDays();
      $("#event_duration").text(days + " days");

      // Calculate and set the duration of the leave in the update modal
      var duration = moment.duration(
        moment(event.end).diff(moment(event.start))
      );
      var days = duration.asDays();
      // Set the duration in the duration_update field
      $("#duration_update").val(days);

      // Set the selected leave type in the update_event_modal
      $("#update_event_title").val(event.leave_type_id).change();
      $("#update_delete_modal").modal("show");

      // Update event button click
      $("#update_event_button").off('click').click(function () {
        // Fill update modal with event data
        $("#update_event_start_date").val(
          moment(event.start).format("YYYY-MM-DD")
        );
        $("#update_event_end_date").val(moment(event.end).format("YYYY-MM-DD"));
        $("#update_event_description").val(event.description);
        $("#update_event_id").val(event.id);

        // Close update/delete modal and show update event modal
        $("#update_delete_modal").modal("hide");
        $("#update_event_modal").modal("show");
      });

      // Delete event button click
      $("#delete_event_button").off('click').click(function () {
        if (confirm("Are you sure you want to delete this event?")) {
          $.ajax({
            type: "POST",
            url: "../../controllers/calendar/delete_event.controller.php",
            data: { id: event.id },
            success: function (response) {
              calendar.fullCalendar("refetchEvents");
              showAlert("Event deleted successfully!");
              $("#update_delete_modal").modal("hide");
            },
            error: function (xhr, status, error) {
              alert("An error occurred while processing your request.");
              console.log(xhr.responseText);
            },
          });
        }
      });
    },
  });

  // Handle change event of the view selector dropdown
  $("#view_selector").change(function () {
    const selectedView = $(this).val();
    calendar.fullCalendar("changeView", selectedView);
  });

  // Submit event handler for insert form
  $("#insert_form").submit(function (e) {
    e.preventDefault();

    // Manually validate form inputs
    const startDate = $("#start_date").val();
    const endDate = $("#end_date").val();
    const leaveType = $("#leave_type").val();
    const description = $("#description").val();

    // Reset validation state
    $(this).find(".is-invalid").removeClass("is-invalid");

    if (!startDate || !endDate || !leaveType || !description) {
      $(this).addClass("was-validated");
      if (!leaveType)
        $("#leave_type").addClass("is-invalid").attr("required", true);
      if (!description)
        $("#description").addClass("is-invalid").attr("required", true);
      return;
    }

    // Calculate duration
    const start = moment(startDate, "YYYY-MM-DD");
    const end = moment(endDate, "YYYY-MM-DD");
    const duration = moment.duration(end.diff(start)).asDays();

    // Check if duration is less than 1 day
    if (duration < 1) {
      alert("The duration must be at least 1 day.");
      return; // Prevent form submission
    }

    const formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../controllers/calendar/insert_leave_request.controller.php",
      data: formData,
      success: function (response) {
        $("#description").val("");
        calendar.fullCalendar("refetchEvents");
        $("#insert_modal").modal("hide");
        showAlert("Event created successfully!");
      },
      error: function (xhr, status, error) {
        alert("An error occurred while processing your request.");
        console.log(xhr.responseText);
      },
    });
  });

  // Submit event handler for update event form
  $(document).on("submit", "#update_event_form", function (e) {
    e.preventDefault();

    // Manually validate form inputs
    const startDate = $("#update_event_start_date").val();
    const endDate = $("#update_event_end_date").val();
    const leaveType = $("#update_event_title").val();
    const description = $("#update_event_description").val();

    // Reset validation state
    $(this).find(".is-invalid").removeClass("is-invalid");

    if (!startDate || !endDate || !leaveType || !description) {
      $(this).addClass("was-validated"); // Add 'was-validated' class to the form

      // Add 'is-invalid' class to empty fields and set 'required' attribute
      if (!startDate)
        $("#update_event_start_date")
          .addClass("is-invalid")
          .attr("required", true);
      if (!endDate)
        $("#update_event_end_date")
          .addClass("is-invalid")
          .attr("required", true);
      if (!leaveType)
        $("#update_event_title").addClass("is-invalid").attr("required", true);
      if (!description)
        $("#update_event_description")
          .addClass("is-invalid")
          .attr("required", true);

      return; // Prevent form submission
    }
    // Calculate duration
    const oldStart = moment($("#update_event_start_date").val(), "YYYY-MM-DD");
    const oldEnd = moment($("#update_event_end_date").val(), "YYYY-MM-DD");
    const duration = moment.duration(oldEnd.diff(oldStart)).asDays();

    // Check if duration is less than 1 day
    if (duration < 1) {
      alert("The duration must be at least 1 day.");
      return; // Prevent form submission
    }

    const formData = $(this).serialize();
    const eventId = $("#update_event_id").val();
    $.ajax({
      type: "POST",
      url: "../../controllers/calendar/update_leave_request.controller.php",
      data: formData + "&id=" + eventId,
      success: function (response) {
        calendar.fullCalendar("refetchEvents");
        console.log("Data after update:", response);
        showAlert("Event updated successfully!");
        $("#update_event_modal").modal("hide");
      },
      error: function (xhr, status, error) {
        alert("An error occurred while processing your request.");
        console.log(xhr.responseText);
      },
    });
  });

  // Show insert modal event
  $("#insert_modal").on("show.bs.modal", function (event) {
    const modal = $(this);
    const start = modal.data("start");
    const end = modal.data("end");
    calculate_duration_insert(start, end);
  });

  // Show update event modal event
  $("#update_event_modal").on("show.bs.modal", function (event) {
    const modal = $(this);
    const eventId = modal.data("eventId");
    $.ajax({
      url: "get_event_details.php",
      method: "POST",
      data: { id: eventId },
      dataType: "json",
      success: function (response) {
        // Populate start and end date inputs with event data
        modal.find("#update_event_start_date").val(response.start);
        modal.find("#update_event_end_date").val(response.end);
        calculate_duration_update(
          response.start,
          response.end,
          response.start,
          response.end
        );
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });

  // Add event listeners to the date input fields
  $("#start_date, #end_date").change(function () {
    // Get the new start and end dates
    const start = moment($("#start_date").val(), "YYYY-MM-DD");
    const end = moment($("#end_date").val(), "YYYY-MM-DD");
    calculate_duration_insert(start, end);
  });

  // Add event listeners to the date input fields in the update event modal
  $("#update_event_start_date, #update_event_end_date").change(function () {
    const oldStart = moment($("#update_event_start_date").val(), "YYYY-MM-DD");
    const oldEnd = moment($("#update_event_end_date").val(), "YYYY-MM-DD");
    calculate_duration_update(oldStart, oldEnd, oldStart, oldEnd);
  });

  // Reset insert modal form fields
  $("#insert_modal").on("hidden.bs.modal", function () {
    $(this).find("form")[0].reset();
    $("#duration").val("");
    $(this).find("form").removeClass("was-validated");
    $(this)
      .find("input, select, textarea")
      .removeClass("is-invalid")
      .attr("required", false);
  });

  // Reset update modal form fields
  $("#update_event_modal").on("hidden.bs.modal", function () {
    $(this).find("form")[0].reset();
    $("#duration_update").val("");
    $(this).find("form").removeClass("was-validated");
    $(this)
      .find("input, select, textarea")
      .removeClass("is-invalid")
      .attr("required", false);
  });

  // Function to show alert notification
  function showAlert(message) {
    $("#alert_message").text(message);
    $("#alert_modal")
      .modal("show")
      .addClass("animate__animated animate__fadeIn");
    setTimeout(function () {
      $("#alert_modal")
        .modal("hide")
        .removeClass("animate__animated animate__fadeIn");
    }, 1100);
  }
});
