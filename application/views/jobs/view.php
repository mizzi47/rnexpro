<script>
    function closeThisJob(ids) {
        if (confirm('You want to close this job ?')) {
            window.location = "<?php echo base_url(); ?>/jobs/close/" + ids;
        }
    };

    function openThisJob(ids) {
        if (confirm('You want to open this job ?')) {
            window.location = "<?php echo base_url(); ?>/jobs/open/" + ids;
        }
    };

    function deleteThisJob(ids) {
        if (confirm('You want to delete this job ?')) {
            window.location = "<?php echo base_url(); ?>/jobs/delete/" + ids;
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
                    <h1 class="m-0 text-dark">Jobs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                        <li class="breadcrumb-item active">View Jobs</li>
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
                            <h3 class="card-title">Jobs</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-bordered">
                                <table id="table_alljobs">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Job Name</th>
                                            <th>Job Type</th>
                                            <th>Owner</th>
                                            <th>Status</th>
                                            <th>Internal User</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($job as $kerja) { ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $kerja['job_name'] ?></td>
                                                <td><?php echo $kerja['job_type'] ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $kerja['owner'] ?></td>
                                                <td>
                                                    <?php if ($kerja['status'] == 'In-progress') { ?>
                                                        <span class="badge badge-primary"><?php echo $kerja['status'] ?></span>
                                                    <?php } else if ($kerja['status'] == 'Incoming') { ?>
                                                        <span class="badge badge-warning"><?php echo $kerja['status'] ?></span>
                                                    <?php } else if ($kerja['status'] == 'Completed') { ?>
                                                        <span class="badge badge-success"><?php echo $kerja['status'] ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-transform: capitalize;">
                                                    <?php
                                                    $user = $kerja['access'];
                                                    $myArray = explode('|', $user);
                                                    foreach ($myArray as $values1) {
                                                        echo $internal[$values1];
                                                        echo "<br>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($kerja['status'] == "In-progress") { ?>
                                                        <a href="<?php echo base_url('jobs/summary') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-info"></i>View</a>
                                                        <a href="<?php echo base_url('jobs/update_job_index') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        <button class="btn btn-sm btn-success" onclick="closeThisJob(<?php echo $kerja['job_id'] ?>)">Complete</button>
                                                        <button type="button" data-id="<?php echo $kerja['job_id'] ?>" class="btn_setcolor btn-sm btn btn-primary" data-toggle="modal" data-target="#setcolormodal">Set Schedule Color</button>

                                                    <?php } else if ($kerja['status'] == "Incoming") { ?>
                                                        <a href="<?php echo base_url('jobs/summary') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-info">View</a>
                                                        <a href="<?php echo base_url('jobs/update_job_index') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        <button class="btn btn-sm btn-primary" onclick="openThisJob(<?php echo $kerja['job_id'] ?>)">Open</button>
                                                        <button type="button" data-id="<?php echo $kerja['job_id'] ?>" class="btn_setcolor btn-sm btn btn-primary" data-toggle="modal" data-target="#setcolormodal">Set Schedule Color</button>

                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url('jobs/summary') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-info">View</a>
                                                        <button class="btn btn-sm btn-primary" onclick="openThisJob(<?php echo $kerja['job_id'] ?>)">Open</button>
                                                        <button type="button" data-id="<?php echo $kerja['job_id'] ?>" class="btn_setcolor btn-sm btn btn-primary" data-toggle="modal" data-target="#setcolormodal">Set Schedule Color</button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteThisJob(<?php echo $kerja['job_id'] ?>)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
<script>
    $(document).ready(function() {
        $('.btn_setcolor').click(function() {
            $('#color_job_id').val($(this).data('id'));
        });
        $('#btn_save_color').click(function() {
            var color_hex = $('#color_input').val();
            var job_id = $('#color_job_id').val();
            $.ajax({
                url: '<?php echo base_url() ?>jobs/setScheduleColor',
                method: 'post',
                data: {
                    color_hex: color_hex,
                    job_id: job_id
                },
                dataType: 'text',
                success: function(data) {
                    if(data){
                        window.location.href = '<?php echo base_url() ?>jobs/view';
                    }
                },
                error: function(data) {
                    alert("ajax error, json: " + data);
                }
            });
        });
    });
</script>
<div class="modal fade" id="setcolormodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <input id="color_input" class="form-control" type="color">
                <input id="color_job_id" type="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="btn_save_color" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>