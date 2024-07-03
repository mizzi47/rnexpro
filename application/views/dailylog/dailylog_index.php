<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daily Log</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Daily Log</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <h5 id="job_name_label">Project Name :</h5>
                                        </div>
                                        <div class="p-2">
                                            <h5 id="job_name_display"><?php echo $getJobName[$job_id] ?></h5>
                                        </div>
                                        <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){?>
                                        <div class="ml-auto p-2">
                                            <button onclick = "window.location.href='<?php echo base_url('dailylog/dailylog_add_index/')?><?php echo $job_id?>';" class="btn-lg btn-success"> Add Daily Log</button>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-bordered">
                                        <table id="list_dailylog" class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Date</th>
                                                    <th>Created By</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                    <th>Status</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1;
                                                foreach ($dailylog as $dl) { ?>
                                                    <tr>
                                                        <td><?php echo $count ?></td>
                                                        <td><?php echo $dl['logdate'] ?></td>
                                                        <td><?php echo $getUserName[$dl['user_id']] ?></td>
                                                        <td><?php echo $dl['logdate'] ?></td>
                                                        <td>
                                                        <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3){?>
                                                            <button id="<?php echo $dl['dailylog_id'] ?>" title="Edit Details" onclick="window.location.href = '<?php echo site_url('dailylog/attachment/') ?><?php echo $job_id?>/<?php echo $dl['dailylog_id']?>'" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit Details</button>
                                                            <?php } ?>
                                                            
                                                            <button id="<?php echo $dl['dailylog_id'] ?>" title="View Details" onclick="window.location.href = '<?php echo site_url('dailylog/view/') ?><?php echo $job_id?>/<?php echo $dl['dailylog_id']?>'" type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View Details</button>
                                                            <?php if($this->session->userdata('role') == 1){?>
                                                            <button title="Delete" onclick="deleteDailyLog(<?php echo $dl['dailylog_id'] ?>, <?php echo $dl['job_id'] ?>)" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            
                                                        <h4> <span class="badge badge-success">Accepted</span></h4>
                                                  <h4> <span class="badge badge-warning">Pending</span></h4>
                                                  <h4> <span class="badge badge-danger">Decline</span></h4>
                                          </td>
                                                            </td>
                                                    </tr>
                                                <?php $count++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>