<div class="col-xl-9 col-lg-8 col-md-12 position-relative">
    <div class="card shadow mb-4">
        <div class="card-header py-3  flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Employee Management</h3>
            <p class="mt-1">Total Employees : <strong class="text-danger "><?php echo count_users(); ?></strong></p>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row align-items-center">
                    <!-- search box -->
                    <div class="col-md-6 mb-2">
                        <input type="text" name="search_employee" id="search_employee" placeholder="Search employee..." class="form-control" />
                    </div>
                    <!-- filter -->
                    <div class="col-md-4 mb-2">
                        <select id="position" name="position" class="custom-select  border-dark" tile="Please select the position of the employee." required>
                            <option value="" selected disabled>Choose Position</option>
                            <?php $get_positions = get_positions(); ?>
                            <?php foreach ($get_positions as $position) :  ?>
                                <option value="<?= $position['id']; ?>"><?= $position['position']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- add employee button -->
                    <div class="col-md-2 mb-2">
                        <a href="/create_employee" class="btn btn-primary ">Add</a>
                    </div>
                </div>
            </div>
            <br>

            <!-- Table to Show All Employees -->
            <table class="table table-hover">
                <thead class="table-dark ">
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-bottom" style="font-size:14px">
                        <td class="d-flex" style="text-align: center; vertical-align: middle;">
                            <img style="width: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="https://www.allkpop.com/upload/2024/01/content/102324/1704947068-20240110-iu.jpg" />
                            <span class="mt-3 m-lg-3">Tanner Hickman</span>
                        </td>
                        <td style="vertical-align: middle;">sifilycoza@mailinator.com</td>
                        <td style="vertical-align: middle;">Developer</td>
                        <td style="vertical-align: middle;">
                            <a href="#" class="btn  btn-success" style="font-size:13px">Update</a>
                            <a href="#" class="btn btn-danger border border-0" style="font-size:13px">Delete</a>
                        </td>
                    </tr>
                    <tr class="border-bottom" style="font-size:14px">
                        <td class="d-flex" style="text-align: center; vertical-align: middle;">
                            <img style="width: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="https://t.ly/E7wHA" />
                            <span class="mt-3 m-lg-3">Marshall Roberson</span>
                        </td>
                        <td style="vertical-align: middle;">toligir@mailinator.com</td>
                        <td style="vertical-align: middle;">Marketing</td>
                        <td style="vertical-align: middle;">
                            <a href="#" class="btn  btn-success" style="font-size:13px">Update</a>
                            <a href="#" class="btn btn-danger border border-0" style="font-size:13px">Delete</a>
                        </td>
                    </tr>
                    <tr class="border-bottom" style="font-size:14px">
                        <td class="d-flex" style="text-align: center; vertical-align: middle;">
                            <img style="width: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="https://media.asiaone.com/sites/default/files/styles/article_main_image/public/original_images/May2023/230525_ma%20dong%20seok.png?itok=4MFBNauv" />
                            <span class="mt-3 m-lg-3">Justina Mendoza</span>
                        </td>
                        <td style="vertical-align: middle;">zizazuxaxo@mailinator.com</td>
                        <td style="vertical-align: middle;">QA</td>
                        <td style="vertical-align: middle;">
                            <a href="#" class="btn  btn-success" style="font-size:13px">Update</a>
                            <a href="#" class="btn btn-danger border border-0" style="font-size:13px">Delete</a>
                        </td>
                    </tr>
                    <tr class="" style="font-size:14px">
                        <td class="d-flex" style="text-align: center; vertical-align: middle;">
                            <img style="width: 60px; object-fit: cover;" class="shadow-none rounded-circle" alt="avatar1" src="https://0.soompi.io/wp-content/uploads/2023/03/22100129/Ahn-Jae-Hyun-4-1.jpg" />
                            <span class="mt-3 m-lg-3">Justina Mendoza</span>
                        </td>
                        <td style="vertical-align: middle;">zizazuxaxo@mailinator.com</td>
                        <td style="vertical-align: middle;">QA</td>
                        <td style="vertical-align: middle;">
                            <a href="#" class="btn  btn-success" style="font-size:13px">Update</a>
                            <a href="#" class="btn btn-danger border border-0" style="font-size:13px">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>