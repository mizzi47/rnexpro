<script>
    window.job_id = <?php echo $this->uri->segment(3) ?>;
    window.dailylog_id = <?php echo $this->uri->segment(4) ?>;

    function deleteImage(ids) {
        window.job_id = <?php echo $this->uri->segment(3) ?>;
        window.dailylog_id = <?php echo $this->uri->segment(4) ?>;
        if (confirm('You want to delete this image?')) {
            window.location = "<?php echo base_url(); ?>/dailylog/deleteImage/" + job_id + '/' + dailylog_id + '/' + ids;
        }
    };

    function openThisJob(ids) {
        if (confirm('You want to open this job ?')) {
            window.location = "<?php echo base_url(); ?>/jobs/open/" + ids;
        }
    };
</script>
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
                                            <h5 id="job_name_label">Project Name:</h5>
                                        </div>
                                        <div class="p-2">
                                            <h5 id="job_name_display_add"><?php echo $getJobName[$job_id] ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="<?php echo base_url('dailylog/editDailyLogDetails') ?>">
                                    <div class="modal-body">
                                        <div class='input-group'>
                                            <div class="col-md-4">
                                                <label for="display_update">Date:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" rows="5" id="display_date" value="<?php echo $dailylog[0]['logdate'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class='input-group'>
                                            <div class="col-md-4">
                                                <label for="display_update">Update:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="update" rows="5" id="display_update"><?php echo $dailylog[0]['update'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class='input-group'>
                                            <div class="col-md-4">
                                                <label for="display_pending">Pending:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="pending" rows="5" id="display_pending"><?php echo $dailylog[0]['pending'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class='input-group'>
                                            <div class="col-md-4">
                                                <label for="display_issue">Issue:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="issue" rows="5" id="display_issue"><?php echo $dailylog[0]['issue'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                            <input type="hidden" name="dailylog_id" value="<?php echo $dailylog_id ?>">
                                            <input type="hidden" name="job_id" value="<?php echo $job_id ?>">
                                        </div>
                                </form>
                                <!-- <div class='input-group'>
                                        <div class="col-md-4">
                                            <label for="display_info">Info:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="5" id="display_info"><?php //echo $dailylog[0]['info'] 
                                                                                                        ?></textarea>
                                        </div>
                                    </div> -->
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
                                            <textarea class="form-control" name="description" rows="4" placeholder="Enter image(s) description here..."></textarea>
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
                    <!-- <div class="card-body">
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
                                </div> -->
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
                                                                        <div class="text-center col-sm-2">
                                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                                                <img src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" class="img-thumbnail cropped-ofp">
                                                                            </a>
                                                                            <button type="button" onclick="deleteImage(<?php echo $df['dailylog_files_id'] ?>)" class="btn-xs btn-danger"><i class="fas fa-trash"></i>Delete</button>
                                                                        </div>
                                                                <?php }
                                                                } ?>
                                                                <div class="text-center col-sm-2">
                                                                    <button type="button" class="addNewImage btn-lg btn-info" data-dfId="<?php echo $dfDesc['dailylog_files_description_id'] ?>"><i class="fas fa-plus"></i> Add</button>
                                                                </div>
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
<div id="modalupload" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload New Image</h5>
            </div>
            <form action="<?php echo site_url('dailylog/addNewImageToCurrentDescription/') ?>" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneDiv">
                <div class="modal-body">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <input type="hidden" name="dfId" id="dfId" value="">
                    <input type="hidden" name="job_id" id="job_id" value="<?php echo $job_id ?>">
                    <input type="hidden" name="dailylog_id" id="dailylog_id" value="<?php echo $dailylog_id ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $(".addNewImage").click(function() {
            var dfId = $(this).attr("data-dfId");
            $('#dfId').val(dfId);
            console.log(dfId);
            $("#modalupload").modal('show');
        })
    })

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });


    dropzone = $("#dropzoneDiv").dropzone({
        acceptedFiles: 'image/*,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        autoProcessQueue: false,
        createImageThumbnails: true,
        addRemoveLinks: true,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        init: function() {
            var myDropzone = this;
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                if (myDropzone.getQueuedFiles().length === 0) {
                    toastr.warning('Please Upload at least one image');
                    e.preventDefault();
                    return;
                } else {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue(); // Process the queue when there are files
                }
            });
            this.on("sendingmultiple", function() {});
            this.on("successmultiple", function(files, response) {
                response = JSON.parse(response);
                location.href =
                    '<?php echo site_url('/dailylog/attachment/') ?>' + response['job_id'] + '/' + response['dailylog_id'];
            });
            this.on("errormultiple", function(files, response) {
                location.href =
                    '<?php echo site_url('/dailylog/attachment/') ?>' + response['job_id'] + '/' + response['dailylog_id'];
            });

        }
    });
</script>
<script src="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.js"></script>