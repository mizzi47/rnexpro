<style>
    #imgtn {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Job: <?php echo $getJobName[$dailylog[0]['job_id']] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Daily Log for job</li>
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
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <h5>DETAILS</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class='input-group'>
                                        <div class="col-md-1">
                                            <h5>Date:</h5>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $dailylog[0]['logdate'] ?></p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Update:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['update'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Pending:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['pending'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Issue:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['issue'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Info:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['info'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <h5>Description With Images</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php foreach ($dailylog_files_old as $dfold) { ?>
                                                        <a target="_blank" href="<?php echo base_url() ?>uploads/<?php echo $dfold['file_name'] ?>">
                                                            <img id="imgtn" src="<?php echo base_url() ?>uploads/<?php echo $dfold['file_name'] ?>" alt="<?php echo base_url() ?>uploads/<?php echo $dfold['file_name'] ?>">
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php $i = 1;
                                    foreach ($dailylog_files_description as $dfDesc) { ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5><?php echo $dfDesc['description_name'] ?></h5>
                                                        <?php foreach ($dailylog_files as $df) { ?>
                                                            <?php if ($df['description_id'] == $dfDesc['dailylog_files_description_id']) { ?>
                                                                <a target="_blank" href="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>">
                                                                    <img id="imgtn" src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" alt="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>">
                                                                </a>
                                                        <?php }
                                                        } ?>
                                                    </div>
                                                    <div class="card-footer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    window.onload = function(e) {
        var myGallery = new FgGallery('.fg-gallery', {
            cols: 8,
            style: {
                border: '10px solid #fff',
                height: '60px',
                boxShadow: '0 2px 10px -5px #000'
            }
        })
    }
</script>