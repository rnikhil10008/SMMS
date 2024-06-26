<?php include ('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">Employees Details
                <a href="employee-create.php" class="btn btn-primary float-end">Add Employee</a>
            </h5>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>
        <?php
            $employees = getAll('employees');

            if(!$employees){
                echo '<h4>Something went wrong</h4>';
            }
            if(mysqli_num_rows($employees)>0)
            {


                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
         
                
                                <?php foreach ($employees as $employeesItem): ?>
                                <tr>
                                    <td>
                                        <?= $emItem['id'] ?>
                                    </td>
                                    <td>
                                        <?= $emItem['name'] ?>
                                    </td>
                                    <td>
                                        <?= $emItem['email'] ?>
                                    </td>
                                    <td>
                                        <a href="employee-edit.php" class="btn btn-success btn-sm">Edit</a>
                                        <a href="employee-delete.php" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            

                        </tbody>

                    </table>
                </div>
                <?php
                            }         
                              else{
                                ?>
                                <tr>
                                <h4 class = "mb-0">No Record found </td>
                              </tr>  
                              <?php
                              }          
                              ?>
            
        </div>
    </div>
</div>

<?php include ('includes/footer.php'); 