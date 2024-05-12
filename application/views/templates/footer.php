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
        'Wet Work',
        'Ceiling',
        'Wiring',
        'Wall Finishes',
        'Floor Finishes',
        'Carpentry Finishes',
        'Steel/aluminium Finishes',
        'Others',
        'Plumbing Works'
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

        $.ajax({
            url: '<?php echo base_url() ?>dailylog/getJob_Web',
            method: 'post',
            dataType: 'text',
            success: function(data) {
                var listjob = JSON.parse(data);
                if (listjob.length !== 0) {
                    $.each(listjob, function(count, item) {
                        count++;
                        job_id = item['job_id'];
                        job_name = item['job_name'];
                        var actionButton = '<button id="' + job_id +
                            '" title="View Daily Log" onclick="window.location.href=\'<?php echo base_url('dailylog/dailylog_index') ?>/' + job_id + '\'" type="button" class="btn btn-sm btn-info"><i class="fa fa-file"></i>&nbsp View Daily Logs</button>&nbsp';
                        var changeorderButton = '<button id="' + job_id +
                            '" title="Variation Order" onclick="window.location.href=\'<?php echo base_url('changeorder/index') ?>/' + job_id + '\'" type="button" class="btn btn-sm btn-warning"><i class="fa fa-file"></i>&nbsp Variation Order</button>&nbsp';
                        var tempobj = {
                            No: count,
                            Job_name: item['job_name'],
                            Client: item['owner'],
                            Action: actionButton + changeorderButton,
                        }
                        table_list_job.row.add(tempobj).draw();
                    })
                } else {
                    table_list_job.clear().draw();
                }
            }
        });
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