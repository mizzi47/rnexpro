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
                    <h1 class="m-0 text-dark">Project</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
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
                            <h3 class="card-title">Project</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-bordered">
                                <table id="table_alljobs">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Project Name</th>
                                            <th>Job Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($job as $kerja) { ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td style="text-transform: capitalize;"><?php echo $kerja['job_name'] ?></td>
                                                <td>
                                                    <?php if ($kerja['status'] == 'In-progress') { ?>
                                                        <span class="badge badge-primary"><?php echo $kerja['status'] ?></span>
                                                    <?php } else if ($kerja['status'] == 'Incoming') { ?>
                                                        <span class="badge badge-warning"><?php echo $kerja['status'] ?></span>
                                                    <?php } else if ($kerja['status'] == 'Completed') { ?>
                                                        <span class="badge badge-success"><?php echo $kerja['status'] ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('ganttchart/view_gantt') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-info"></i>Gantt Chart</a>
                                                    <a href="<?php echo base_url('ganttchart/view_gantt_download') ?>/<?php echo $kerja['job_id'] ?>" class="btn btn-sm btn-warning"></i>Download Timeline</a>
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