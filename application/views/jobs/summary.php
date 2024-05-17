    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Project Summary</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Create Project</a></li>
                            <li class="breadcrumb-item active">Project Summary</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php foreach ($jobs as $value) { ?>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <div class="card-header">
                                                <h6 class="card-title">Project Description</h6>
                                            </div>
                                            <div class="card-body">
                                                <table>
                                                    <tr>
                                                        <td>Project Name</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td style="text-transform: capitalize;">
                                                            <?php echo $value['job_name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Project No/Ref</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['job_prefix'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['status'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Project Type</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['job_type'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Contract Price</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['contract'] ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td>Job Group</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php //echo $value['job_group'] ?></td>
                                                    </tr> -->
                                                    <tr>
                                                        <td>Project Managers</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['manager'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['address'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Meters</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['meters'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['city'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['state'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Properties Type</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['pro_type'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Permit</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['permit'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Postcode</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['postcode'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lot</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['lot'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-header">
                                                <h6 class="card-title">Client</h6>
                                            </div>
                                            <div class="card-body">
                                                <table>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td style="text-transform:capitalize"><?php echo $value['owner'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>IC Number</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['ic_num'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['phone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td><?php echo $value['email'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="card-header">
                                                <h6 class="card-title">Project In Charge</h6>
                                            </div>
                                            <div class="card-body">
                                                <table>
                                                    <tr>
                                                        <td>Project In Charge</td>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td></td>
                                                        <td style="text-transform:capitalize">
                                                            <?php $user = $value['access'];
                                                            $myArray = explode('|', $user);
                                                            foreach ($myArray as $values1) {
                                                                if ($values1 != null) {
                                                                    echo $internal[$values1];
                                                                    echo ",&nbsp&nbsp";
                                                                }
                                                            }   ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="card-header">
                                                <h6 class="card-title">Project Folder</h6>
                                            </div>
                                            <div class="card-body">
                                                <form id="uploadProjectFiles" method="post" class="dropzone" action="<?php echo site_url('jobs/uploadProjectFiles') ?>">
                                                    <div class="d-flex flex-row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="ml-auto p-2">
                                                            <input type="hidden" name="job_id" value="<?php echo $this->uri->segment(3) ?>">
                                                            <button class="btn btn-success" type="submit">Submit</button>
                                                        </div>

                                                    </div>
                                                </form>
                                                <div class="card-header">
                                                    <h6 class="card-title">Uploaded Files</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table>
                                                        <tbody>
                                                            <?php foreach ($projectfiles as $pfile) { ?>
                                                                <tr>
                                                                    <td><i style="color:blue" class="fa fa-file"></i></td>
                                                                    <?php if ($pfile['pj_extension'] == 'application/pdf') { ?>
                                                                        <td><button class="btn btn-light" onclick="printJS('<?php echo base_url() ?>uploads/<?php echo $pfile['pj_filename'] ?>')"> <?php echo $pfile['pj_filename'] ?></button></td>
                                                                    <?php } else { ?>
                                                                        <td><a class="btn btn-light" href="<?php echo base_url() ?>uploads/<?php echo $pfile['pj_filename'] ?>"><?php echo $pfile['pj_filename'] ?></a></td>
                                                                    <?php } ?>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">

                                    </div>
                                    <div class="form-group row">

                                    </div> -->
                                        <a href="<?php echo base_url() ?>jobs/view"><button class="btn btn-default">Back</button></a>
                                    <?php } ?>
                                    </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div><!-- /.container-fluid -->