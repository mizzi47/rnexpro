<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Daily Log</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"> Add Daily Log</li>
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
                                <!-- <form id="uploadForm" method="post" class="dropzone" action="<?php //echo base_url('dailylog/addDailyLog_Web/') 
                                                                                                    ?><?php //echo $job_id 
                                                                                                        ?>" enctype="multipart/form-data"> -->
                                <form method="post" action="<?php echo base_url('dailylog/addDailyLog_Web/') ?><?php echo $job_id ?>" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class='input-group date'>
                                                <div class="col-md-4">
                                                    <label for="logdate">Date:</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        <input class="form-control" name="logdate" type="text" id="datepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='input-group'>
                                                <div class="col-md-4">
                                                    <label for="">Scope:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" id="scope0" name="scope[]" value="0">
                                                    <label for="scope0" checked> Wet Work</label><br>
                                                    <input type="checkbox" id="scope1" name="scope[]" value="1">
                                                    <label for="scope1"> Ceiling</label><br>
                                                    <input type="checkbox" id="scope2" name="scope[]" value="2">
                                                    <label for="scope2"> Wiring</label><br>
                                                    <input type="checkbox" id="scope3" name="scope[]" value="3">
                                                    <label for="scope3"> Wall Finishes</label><br>
                                                    <input type="checkbox" id="scope4" name="scope[]" value="4">
                                                    <label for="scope4"> Floor Finishes</label><br>
                                                    <input type="checkbox" id="scope5" name="scope[]" value="5">
                                                    <label for="scope5"> Carpentry Finishes</label><br>
                                                    <input type="checkbox" id="scope6" name="scope[]" value="6">
                                                    <label for="scope6"> Steel/aluminium Finishes</label><br>
                                                    <div class='input-group'>
                                                        <label for="scope7"> Others : </label><br>
                                                        <input type="text" class="form-control" id="scope7" name="scopeOthers">
                                                    </div>
                                                </div>
                                            </div><br><br><br><br><br><br><br><br><br><br><br><br>
                                            <div class='input-group'>
                                                <div class="col-md-4">
                                                    <label for="">Update<font color="red">*</font>:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea placeholder="Enter update" name="update" rows="5" class="form-control" required></textarea>
                                                </div>
                                            </div><br>
                                            <div class='input-group'>
                                                <div class="col-md-4">
                                                    <label for="">Pending<font color="red">*</font>:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea placeholder="Enter pending" name="pending" rows="5" class="form-control" required></textarea>
                                                </div>
                                            </div><br>
                                            <div class='input-group'>
                                                <div class="col-md-4">
                                                    <label for="">Issue<font color="red">*</font>:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea placeholder="Enter issue" name="issue" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div><br>
                                            <!-- <div class='input-group'>
                                                <div class="col-md-4">
                                                    <label for="">Info:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea placeholder="Enter info" name="info" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div> -->
                                        </div>
                                        <br>
                                        <div id="image_description" class="d-flex flex-row">
                                            <div style="display:none" class="row">
                                                <textarea class="form-control" name="eachDesc[]" rows="4" placeholder="Enter image description here" disabled></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="ml-auto p-2">
                                                <input type="hidden" name="hidden_job_id" id="hidden_job_id">
                                                <input type="hidden" name="hidden_job_name" id="hidden_job_name">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        Dropzone.options.uploadForm = { // The camelized version of the ID of the form element
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            paramName: "file",
            accept: function(file, done) {
                if (file.name == "1356237.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            // The setting up of the dropzone
            init: function() {

                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    e.preventDefault();

                    e.stopPropagation();

                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        $("#uploadForm").submit();
                    }
                });
                this.on("addedfile", function(file) {
                    console.log(file);
                })
                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function() {
                    // Gets triggered when the form is actually being sent.
                    // Hide the success button or the complete form.
                });
                this.on("successmultiple", function(files, response) {
                    window.location.href = '<?php echo site_url('dailylog/dailylog_index/') ?>' + response + '';
                });
                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                });
            }

        }
    })
</script>