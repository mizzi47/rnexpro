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
                                        <div class="col-md-4">
                                            <label for="display_update">Date:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" rows="5" id="display_date" value="<?php echo $dailylog[0]['logdate']?>" disabled>
                                        </div>
                                    </div>
                                    <div class='input-group'>
                                        <div class="col-md-4">
                                            <label for="display_update">Update:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" id="display_update" disabled><?php echo $dailylog[0]['update']?></textarea>
                                        </div>
                                    </div>
                                    <div class='input-group'>
                                        <div class="col-md-4">
                                            <label for="display_pending">Pending:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" id="display_pending" disabled><?php echo $dailylog[0]['pending']?></textarea>
                                        </div>
                                    </div>
                                    <div class='input-group'>
                                        <div class="col-md-4">
                                            <label for="display_issue">Issue:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" id="display_issue" disabled><?php echo $dailylog[0]['issue']?></textarea>
                                        </div>
                                    </div>
                                    <div class='input-group'>
                                        <div class="col-md-4">
                                            <label for="display_info">Info:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" id="display_info" disabled><?php echo $dailylog[0]['info']?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <h5>ATTACHMENT</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="uploadFormExisting" method="post" class="dropzone" action="<?php echo site_url('dailylog/dropzoneUpload/') ?><?php echo $job_id ?>/<?php echo $dailylog_id ?>" enctype="multipart/form-data">
                                        <div class="d-flex flex-row">
                                            <div class="col">
                                                <textarea class="form-control" name="description" rows="4"></textarea>
                                                <input name="dailylog_id" type="hidden" value="<?php echo $this->uri->segment(4) ?>">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="col">
                                            </div>
                                            <div class="ml-auto p-2">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
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
                                                    <div class="fg-gallery">
                                                        <?php foreach ($dailylog_files_old as $dfold) { ?>
                                                            <img src="<?php echo base_url() ?>uploads/<?php echo $dfold['file_name'] ?>" alt="">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="card-footer"></div>
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
                                                        <div class="fg-gallery">
                                                            <?php foreach ($dailylog_files as $df) { ?>
                                                                <?php if ($df['description_id'] == $dfDesc['dailylog_files_description_id']) { ?>
                                                                    <img src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" alt="">
                                                            <?php }
                                                            } ?>
                                                        </div>
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
            cols: 4,
            style: {
                border: '10px solid #fff',
                height: '180px',
                boxShadow: '0 2px 10px -5px #000'
            }
        })
    }
</script>