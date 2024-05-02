<style>
    #imgtn {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }

    .cropped-ofp {
        width: 150px;
        height: 150px;
        object-fit: cover;
        object-position: 25% 25%;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.css">
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
                                    <!-- <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Info:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php //echo $dailylog[0]['info'] 
                                                    ?></p>
                                            </div>
                                        </div>
                                    </div> -->
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
                                            <h5>List of Atttachment(s) with Description</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php $i = 1;
                                    foreach ($dailylog_files_description as $dfDesc) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border border-secondary">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        Description:
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><?php echo $dfDesc['description_name'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        Image:
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <?php foreach ($dailylog_files as $df) { ?>
                                                                                <?php if ($df['description_id'] == $dfDesc['dailylog_files_description_id']) { ?>
                                                                                    <div class="col-sm-2">
                                                                                        <a href="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                                                            <img src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" class="img-thumbnail cropped-ofp">
                                                                                        </a>
                                                                                    </div>
                                                                                    <!-- <img src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" alt=""> -->
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
<script src="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.js"></script>