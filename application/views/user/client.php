<script>
    function removeThisUser(ids) {
        if (confirm('You want to deactivate this user ?')) {
            window.location = "<?php echo base_url(); ?>/user/removeUser/" + ids;
        }
    };
</script>
<script>
    function activeThisUser(ids) {
        if (confirm('You want to activate this user ?')) {
            window.location = "<?php echo base_url(); ?>/user/activeUser/" + ids;
        }
    };
</script>
<script>
    function deleteThisUser(ids) {
        if (confirm('You want to permanently delete this user ?')) {
            window.location = "<?php echo base_url(); ?>/user/deleteUser/" + ids;
        }
    };
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Client</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Client Info</h3>
                            <div class="card-tools">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add New Client</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <?php echo form_open('user/addclient'); ?>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Client</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>User Status :</label>
                                                            <div class="col-sm-12">
                                                                <input type='radio' name='status' value="A" required>
                                                                Active <br>
                                                                <input type='radio' name='status' value="B" required>
                                                                Inactive
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Client Name :<font color="red">&ensp;*</font></label>
                                                            <input type="text" name="client_name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Reference/ IC Number :<font color="red">&ensp;*</font></label>
                                                            <input type="text" name="ref_icnum" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Username :<font color="red">&ensp;*</font></label>
                                                            <input type="text" name="client_username" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Password :<font color="red">&ensp;*</font></label>
                                                            <input type="password" name="client_password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email :</label>
                                                            <input type="email" name="client_email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone Number :</label>
                                                            <input type="text" name="phone_num" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label>Address :<font color="red">&ensp;*</font></label>
                                                            <input type="text" name="client_address" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Roles :<font color="red">&ensp;*</font></label>
                                                            <select class="form-control select2" name="roles" required>
                                                                <option>Choose Roles</option>
                                                                <!-- <option value="1">Project Manager / Admin</option>
                                                                <option value="2">Project Coordinator</option>
                                                                <option value="3">Project Executive</option> -->
                                                                <option value="4">Client</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="user" class="table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($users as $user) { ?>
                                        <tr>
                                            <td style="width: 50px"><?php echo $i++; ?></td>
                                            <td><?php echo $user['name'] ?></td>
                                            <td>
                                                <?php if ($user['role'] ==4) {
                                                    echo 'Client';
                                                  
                                                } ?>
                                                
                                                <!-- <close roles><open if need> -->

                                                
                                                
                                            </td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td>
                                                <?php if ($user['status'] == 'A') {
                                                    echo '<span class="badge badge-primary">Active</span>';
                                                } else {
                                                    echo '<span class="badge badge-danger">Inactive</span>';
                                                }
                                                ?>
                                            </td>



                                            <!-- <edit user part><open if need> -->
                                            <td>
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edituser_<?= $user['id'] ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                                                <div class="modal fade" id="edituser_<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Project In Charge</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                            </div>
                                                            <?php echo form_open('user/editclient') ?>
                                                            <?php $name_parts = explode(" ", $user['name']);
                                                            $first_name = $name_parts[0];
                                                            $last_name = $name_parts[1]; ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>User Status :</label>
                                                                            <div class="col-sm-12">
                                                                                <input type='radio' name='status' value="A" required <?= ($user['status'] == "A") ? "checked" : ""; ?>> Active <br>
                                                                                <input type='radio' name='status' value="B" required <?= ($user['status'] == "B") ? "checked" : ""; ?>> Inactive
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Client Name :<font color="red">&ensp;*</font></label>
                                                                            <input type="text" name="first_name" class="form-control" value="<?= $first_name ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Reference/ IC Number :<font color="red">&ensp;*</font></label>
                                                                            <input type="text" name="last_name" value="<?= $last_name ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    



                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Username :<font color="red">&ensp;*</font></label>
                                                                            <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Password :<font color="red">&ensp;*</font></label>
                                                                            <input type="password" name="password" value="<?= $user['password'] ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Email :</label>
                                                                            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Phone Number :</label>
                                                                            <input type="text" name="phone" value="<?= $user['phone'] ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label>Address :<font color="red">&ensp;*</font></label>
                                                                            <input type="text" name="phone" value="<?= $user['phone'] ?>" class="form-control" required>

                                                                            <label>Roles :<font color="red">&ensp;*</font></label>
                                                                            <select class="form-control select2" name="roles" required>


                                                                            <select class="form-control select2" name="roles" required>
                                                                                <option>Choose Roles</option>
                                                                                <!-- <option value="1">Project Manager / Admin</option>
                                                                                <option value="2">Project Coordinator</option>
                                                                                <option value="3">Project Executive</option> -->
                                                                                <option value="4">Client</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                <input type="hidden" name="client_id" value="<?php echo $user['id'] ?>">
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($user['status'] == "A") { ?>
                                                    <button class="btn btn-sm btn-warning" onclick="removeThisUser(<?php echo $user['id'] ?>)"><i class="fas fa-user-slash"></i> Disable</button>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteThisUser(<?php echo $user['id'] ?>)"><i class="fas fa-trash"></i> Delete</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-sm btn-primary" onclick="activeThisUser(<?php echo $user['id'] ?>)"><i class="fas fa-user-check"></i> Enable</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->