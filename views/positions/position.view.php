<?php
// Check if the department is selected
if (!isset($id)) {
} else {

?>
    <div class="col-xl-9 col-lg-8 col-md-12 position-relative">
        <div class="card shadow mb-4">
            <div class="card-header py-3  flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Department: <?= get_department($id)['department'] ?></h3>
            </div>
            <div class="col-md-8 mb-2" style="margin-top: 10px;">
                <input type="text" name="search_position" id="search_position" placeholder="Search position" class="form-control" />
            </div>

            <!-- Table to Show on position -->
            <div class="container" style="display: flex; justify-content: flex-end;">
                <a href="/create_positions" class="btn btn-primary">Add New Position</a>
            </div>
            <div class="container" style="margin-top: 20px;">
                <table class="table table-hover">
                    <thead class="border-bottom" style="font-size: 18px">
                        <tr>
                            <th>Position Name</th>
                            <th class="float-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $positions = get_postion_from_department($id); // Assuming you have a function to retrieve positions for a specific department
                        if (empty($positions)) {
                            // echo "<tr><td colspan='2'>No positions found for this department.</td></tr>";
                        } else {
                            foreach ($positions as $position) :
                        ?>
                                <tr>
                                    <td><?= $position['position'] ?></td>
                                    <td>
                                        <div class="float-right">
                                            <a href="/edit_positions?id=<?= $position['id'] ?>" class="btn  btn-success text-white" style="font-size:13px" type="button">Update</a>
                                            <a href="../../controllers/positions/delet_position.controller.php?id=<?= $position['id'] ?>" onclick="return confirm('Are you sure you want to delete Position <?= $position['position'] ?> ?')" class="btn btn-danger border border-0 text-white" style="font-size:13px" type="button">delete</a>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
                <div id="notFoundRow" class="text-center text-secondary d-none" style="height:40vh; display: flex; align-items: center; justify-content: center;">No positions found!</div>
            </div>
        </div>
    </div>
<?php
}
?>
<script>
    //search position---------------------------------------------------------------------------------------------------
    let search_position = document.getElementById('search_position');
    let positionSelect = document.getElementById('position');
    let tbody = document.querySelector('tbody');
    let tr = tbody.querySelectorAll('tr');

    search_position.addEventListener('input', function() {
        const searchText = search_position.value.toLowerCase();
        let found = false;
        tr.forEach(row => {
            const tdContent = row.querySelector('td').textContent.toLowerCase(); // Get the text content of the first td in the row
            if (tdContent.includes(searchText)) {
                row.style.display = ''; // Show the row
                found = true;
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
        // Toggle visibility of "Not found" message
        document.getElementById('notFoundRow').classList.toggle('d-none', found);
    });
</script>