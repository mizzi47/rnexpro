<script>
    function removeThisUser(ids) {
        if (confirm('You want to deactivate this user ?')) {
            window.location = "<?php echo base_url(); ?>/security/removeUser/" + ids;
        }
    };
</script>
<script>
    function activeThisUser(ids) {
        if (confirm('You want to activate this user ?')) {
            window.location = "<?php echo base_url(); ?>/security/activeUser/" + ids;
        }
    };
</script>
<script>
    function deleteThisUser(ids) {
        if (confirm('You want to permanently delete this user ?')) {
            window.location = "<?php echo base_url(); ?>/security/deleteUser/" + ids;
        }
    };
</script>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Users</h3>
                    </div>
                    <div class="card-body">
                        <table id="user" class="table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Role</th>
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
                                            <?php if ($user['role'] == 1) {
                                                echo 'Project Manager / Admin';
                                            } else if ($user['role'] == 2) {
                                                echo 'Project Coordinator';
                                            } else if ($user['role'] == 3) {
                                                echo 'Sub-Contractor';
                                            } else if ($user['role'] ==4 ){
                                                echo 'Client';

                                            } ?>
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
                                                        <?php echo form_open('user/editUser') ?>
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
                                                                        <label>First Name :<font color="red">&ensp;*</font></label>
                                                                        <input type="text" name="first_name" class="form-control" value="<?= $first_name ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Last Name :<font color="red">&ensp;*</font></label>
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
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Roles :<font color="red">&ensp;*</font></label>
                                                                        <select class="form-control select2" name="roles" required>
                                                                            <option>Choose Roles</option>
                                                                            <option value="1">Project Manager / Admin HQ</option>
                                                                            <option value="2">Project Coordinator HQ</option>
                                                                            <option value="3">Project Executive HQ</option>
                                                                            <option value="4">Client</option>
                                                                            <option value="5">Admin</option>
                                                                            <option value="6">Project Coordinator</option>
                                                                            <option value="7">Sub-Contractor</option>
                                                                            <option value="99">Superadmin</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
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
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
</script>
<!-- fg gallery carousel -->
<script src="<?= base_url() ?>plugins/fg-gallery/js/gallery.js"></script>
<script src="<?php echo site_url('node_modules/print-js/dist/print.js') ?>"></script>
<!-- toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/select2/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>
<script src="<?= base_url() ?>/node_modules/print-js/dist/print.js"></script>
<script src="<?= base_url() ?>node_modules/frappe-gantt/dist/frappe-gantt.min.js"></script>
<!-- DOCX -->
<script src="<?php echo site_url('node_modules/docxtemplater/') ?>build/docxtemplater.js"></script>
<script src="<?php echo site_url('node_modules/pizzip/') ?>dist/pizzip.js"></script>
<script src="<?php echo site_url('node_modules/pizzip/') ?>dist/pizzip-utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
<script>
    var list_scope = [
        'foundation work',
        'structure work',
        'Framing work ',
        'siding work',
        'plastering work',
        'facade work',
        'painting work',
        'Others',
        'landscaping work'
    ];

    var list_dailylog = [];

    function showAddDailylogDiv(job_id, job_name) {
        $("#container_list_dailylog").css("display", "none");
        $("#container_add_dailylog").css("display", "block");
        $("#job_name_display_add").text(job_name);
        $("#hidden_job_id").val(job_id);
        $("#hidden_job_name").val(job_name);

    }

    function populateDailyLog(job_id, job_name) {
        $("#container_list_dailylog").css("display", "block");
        $("#container_add_dailylog").css("display", "none");
        $("body").addClass("loading");
        $("#btn_show_dailyLogAddModal").prop("disabled", false);
        $("#hidden_job_id").val(job_id);
        if (job_name == null || job_name == '') {
            job_name = 'Untitled';
        };
        $("#job_name_display").text(job_name);

        list_dailylog = [];

        table_list_dailylog.clear().draw();
        $.ajax({
            url: '<?php echo base_url() ?>dailylog/getDailyLog_Web',
            method: 'post',
            data: {
                job_id: job_id
            },
            dataType: 'text',
            success: function(data) {
                var listdailylog = JSON.parse(data);
                if (listdailylog.length !== 0) {
                    $.each(listdailylog, function(count, item) {
                        list_dailylog.push(item)
                        count++;
                        var scope_string = '<div class="row"><ul>';
                        arrayScope = item['scope'].split("|");
                        for (var i = 0; i < arrayScope.length; i++) {
                            scope_string += '<li>' + list_scope[arrayScope[i]] + '</li>';
                        }
                        scope_string += '</ul></div>';
                        var detailButton = '<button id="' + item[
                                'dailylog_id'] +
                            '" title="View Details" onclick="viewDailyLogDetails(this.id)" type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</button>&nbsp&nbsp';
                        // var attachmentButton = '<button id="' + item['dailylog_id'] +
                        //     '" title="View Attachments" onclick="viewAttachmentWindow(' + item[
                        //         'dailylog_id'] +
                        //     ')" type="button" class="btn btn-sm btn-info"><i class="fa fa-file"></i> View Attachment</button>';
                        var commentButton = '<button id="' +
                            item[
                                'dailylog_id'] +
                            '" title="View Comments" onclick="" type="button" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i></button>&nbsp&nbsp';
                        var editButton = '<button id="' + item['dailylog_id'] +
                            '" title="Edit" onclick="editDailyLog(this.id)" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>&nbsp&nbsp';
                        var deleteButton = '<button id="' + item['dailylog_id'] +
                            '" title="Delete" onclick="deleteDailyLog(this.id)" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>';
                        var tempobj = {
                            No: count,
                            Date: item['logdate'],
                            Scope: scope_string,
                            // Files: attachmentButton,
                            Details: detailButton,
                            Actions: deleteButton,
                            Datecreated: item['logdate_created'],
                        }
                        table_list_dailylog.row.add(tempobj).draw();
                    })
                } else {
                    table_list_dailylog.clear().draw();
                }
            }
        });
    }

    function viewDailyLogDetails(selected_dailylog_id) {
        $('#display_update').val();
        $('#display_pending').val();
        $('#display_issue').val();
        var selected_dailylog = list_dailylog.find(({
            dailylog_id
        }) => dailylog_id === selected_dailylog_id);
        $('#display_update').val(selected_dailylog['update']);
        $('#display_pending').val(selected_dailylog['pending']);
        $('#display_issue').val(selected_dailylog['issue']);
        $('#dailyLogViewDetailsModal').modal('show');
    }

    function deleteDailyLog(dailylog_id, job_id) {
        var choice = confirm('Are you sure you want to delete this daily log?');
        if (choice) {
            $.ajax({
                url: '<?php echo base_url() ?>dailylog/deleteDailyLog_Web',
                method: 'post',
                data: {
                    dailylog_id: dailylog_id
                },
                dataType: 'text',
                success: function(response) {
                    window.location.href = "<?php echo base_url() ?>dailylog/dailylog_index/" + job_id + "";
                }
            });
        }
    }
   
    Dropzone.options.uploadFormExisting = { // The camelized version of the ID of the form element
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        paramName: "file",
        init: function() {
            var myDropzone = this;
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();

            });
            this.on("successmultiple", function(files, response) {
                var callback = JSON.parse(response);
                window.location.href = '<?php echo site_url('dailylog/attachment/') ?>' + callback['job_id'] + '/' + callback['dailylog_id'] + '';
            });
        }

    }

    Dropzone.options.uploadProjectFiles = { // The camelized version of the ID of the form element
        addRemoveLinks: true,
        acceptedFiles: 'image/*, application/msword, application/pdf',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        paramName: "file",
        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });

            this.on("sendingmultiple", function() {});
            this.on("successmultiple", function(files, response) {
                window.location.href = "<?php echo site_url('jobs/summary/') ?>" + response + "";
            });
            this.on("errormultiple", function(files, response) {

            });
        }

    }


    $(document).ready(function() {

        $(function() {
            $('#datepicker').datepicker({
                format: 'dd/mm/yyyy',
            }).datepicker("setDate", 'now');
        })
        $(document).on({
            ajaxStart: function() {
                $("body").addClass("loading");
            },
            ajaxStop: function() {
                $("body").removeClass("loading");
            }
        });

        $('.preloader').show();

        $('.js-example-basic-single').select2();

        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        <?php if ($this->session->flashdata('msg-success-add')) : ?>
            toastr.success("<?php echo $this->session->flashdata('msg-success-add') ?>", "SUCCESS");
            document.getElementById('success').play();
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg-fail-add')) : ?>
            document.getElementById('notice').play();
            toastr.error("<?php echo $this->session->flashdata('msg-fail-add') ?>", "FAIL");
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg-warning')) : ?>
            document.getElementById('notice').play();
            toastr.warning("<?php echo $this->session->flashdata('msg-warning') ?>", "WARNING");
        <?php endif; ?>

        table_user = $('#user').DataTable();
        table_vendor = $('#vendor').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],
        });
        table_latestdailylog = $('#table_latestdailylog').DataTable({
            pageLength: 10,
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],
        });
        table_alljobs = $('#table_alljobs').DataTable({
            pageLength: 10,
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],
        });

        table_list_job = $('#joblist_dailylog').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],
            columns: [{
                    "data": "No"
                },
                {
                    "data": "Job_name"
                },
                {
                    "data": "Client"
                },
                {
                    "data": "Action"
                },
            ]
        });

        table_list_dailylog = $('#list_dailylog').DataTable({
            pageLength: 5,
            autoWidth: false,
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],

        });

        function onloadPageDailyLog() {
            $("body").addClass("loading");
            $("#btn_show_dailyLogAddModal").prop("disabled", false);
            $("#hidden_job_id").val(job_id);
            if (job_name == null || job_name == '') {
                job_name = 'Untitled';
            };
            $("#job_name_display").text(job_name);

            list_dailylog = [];

            table_list_dailylog.clear().draw();
        }
    });

    (function() {

        const form = document.querySelector('#sectionForm');
        const checkboxes = form.querySelectorAll('input[type=checkbox]');
        const checkboxLength = checkboxes.length;
        const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

        function init() {
            if (firstCheckbox) {
                for (let i = 0; i < checkboxLength; i++) {
                    checkboxes[i].addEventListener('change', checkValidity);
                }

                checkValidity();
            }
        }

        function isChecked() {
            for (let i = 0; i < checkboxLength; i++) {
                if (checkboxes[i].checked) return true;
            }

            return false;
        }

        function checkValidity() {
            const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
            firstCheckbox.setCustomValidity(errorMessage);
        }

        init();
    })();
</script>
</body>

</html>