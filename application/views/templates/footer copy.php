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

<!-- toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/select2/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"
    type="text/javascript"></script>
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

<script>
//     var tasks = [
//   {
// 	id: 'Task 1',
// 	name: 'Job A',
// 	start: '2016-12-28',
// 	end: '2016-12-31',
//   },
// ]
// var gantt =  new Gantt('#gantt', tasks, {
// 	on_click: function (task) {
// 		console.log(task);
// 	},
// 	on_date_change: function(task, start, end) {
// 		console.log(task, start, end);
// 	},
// 	on_progress_change: function(task, progress) {
// 		console.log(task, progress);
// 	},
// 	on_view_change: function(mode) {
// 		console.log(mode);
// 	}
// });

// gantt.change_view_mode('Week');

var list_scope = [
    'Wet Work',
    'Ceiling',
    'Wiring',
    'Wall Finishes',
    'Floor Finishes',
    'Carpentry Finishes',
    'Steel/aluminium Finishes',
    'Others'
];

var list_dailylog = [];

function populateDailyLog(job_id, job_name) {
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
        url: '<?php echo base_url()?>dailylog/getDailyLog_Web',
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
                        '" title="View Details" onclick="viewDailyLogDetails(this.id)" type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>&nbsp&nbsp';
                    var attachmentButton = '<button id="' + item['dailylog_id'] +
                        '" title="View Attachments" onclick="viewAttachmentWindow(' + item[
                            'dailylog_id'] +
                        ')" type="button" class="btn btn-sm btn-info"><i class="fa fa-file"></i></button>';
                    var commentButton = '<button id="' +
                        item[
                            'dailylog_id'] +
                        '" title="View Comments" onclick="" type="button" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i></button>&nbsp&nbsp';
                    var editButton = '<button id="' + item['dailylog_id'] +
                        '" title="Edit" onclick="editDailyLog(this.id)" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>&nbsp&nbsp';
                    var deleteButton = '<button id="' + item['dailylog_id'] +
                        '" title="Delete" onclick="deleteDailyLog(this.id)" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                    var tempobj = {
                        No: count,
                        Date: item['logdate'],
                        Scope: scope_string,
                        // Files: attachmentButton,
                        Details: detailButton + attachmentButton,
                        Actions: commentButton + editButton + deleteButton,
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
    console.log(selected_dailylog_id);
    var selected_dailylog = list_dailylog.find(({
        dailylog_id
    }) => dailylog_id === selected_dailylog_id);
    console.log(selected_dailylog);
    $('#display_update').val(selected_dailylog['update']);
    $('#display_pending').val(selected_dailylog['pending']);
    $('#display_issue').val(selected_dailylog['issue']);
    $('#dailyLogViewDetailsModal').modal('show');
}

// function viewDailyLogAttachment(dailylog_id) {
//     $('div .fg-gallery').empty();
//     $('div').remove('.body-cover');
//     myGallery = null;
//     $.ajax({
//         url: '<?php echo base_url()?>dailylog/getDailyLogFiles_Web',
//         method: 'post',
//         data: {
//             dailylog_id: dailylog_id
//         },
//         dataType: 'text',
//         success: function(data) {
//             var listdailylogfiles = JSON.parse(data);
//             if (listdailylogfiles.length !== 0) {
//                 $.each(listdailylogfiles, function(count, item) {
//                     var img_src = '<img src="<?php echo base_url()?>uploads/' + item['file_name'] +
//                         '" alt="">';
//                     $('div .fg-gallery').append(img_src);
//                 })
//             } else {}

//             myGallery = new FgGallery('.fg-gallery', {
//                 cols: 4,
//                 style: {
//                     border: '10px solid #fff',
//                     height: '180px',
//                     boxShadow: '0 2px 10px -5px #000'
//                 }
//             })
//         }
//     });
//     $('#dailyLogViewAttachmentModal').modal('show');
// }



function deleteDailyLog(dailylog_id) {
    var choice = confirm('Are you sure you want to delete this daily log?');
    if (choice) {
        $.ajax({
            url: '<?php echo base_url()?>dailylog/deleteDailyLog_Web',
            method: 'post',
            data: {
                dailylog_id: dailylog_id
            },
            dataType: 'text',
            success: function(response) {
                window.location.href = "<?php echo base_url()?>dailylog/index";
            }
        });
    }
}
Dropzone.options.uploadForm = { // The camelized version of the ID of the form element
    addRemoveLinks: true, 
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    paramName: "file",
    accept: function(file, done) {
        
      if (file.name == "1356237") {
        done("Naha, you don't.");
      }
      else { done(); }
    },
    // The setting up of the dropzone
    init: function() {
        
        var myDropzone = this;

        // First change the button to actually tell Dropzone to process the queue.
        this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });

        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
        // of the sending event because uploadMultiple is set to true.
        this.on("sendingmultiple", function() {
            // Gets triggered when the form is actually being sent.
            // Hide the success button or the complete form.
        });
        this.on("successmultiple", function(files, response) {
            window.location.href = "<?php echo site_url('dailylog/attachment/')?>" + response + "";
        });
        this.on("errormultiple", function(files, response) {
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
        });
    }

}

Dropzone.options.uploadProjectFiles = { // The camelized version of the ID of the form element

// The configuration we've talked about above
autoProcessQueue: false,
uploadMultiple: true,
parallelUploads: 100,
maxFiles: 100,
paramName: "file",
// The setting up of the dropzone
init: function() {
    var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
    });

    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function() {
        // Gets triggered when the form is actually being sent.
        // Hide the success button or the complete form.
    });
    this.on("successmultiple", function(files, response) {
        window.location.href = "<?php echo site_url('jobs/summary/')?>" + response + "";
    });
    this.on("errormultiple", function(files, response) {
        // Gets triggered when there was an error sending the files.
        // Maybe show form again, and notify user of error
    });
}

}


function viewAttachmentWindow(dailylog_id) {
    window.location.href = "<?php echo site_url('dailylog/attachment/')?>" + dailylog_id + "";
}


$(document).ready(function() {

    $(function() {
        $('#datepicker').datepicker({
            format: 'yyyy/dd/mm',
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
    toastr.success("<?php echo $this->session->flashdata('msg-success-add')?>", "SUCCESS");
    document.getElementById('success').play();
    <?php endif; ?>
    <?php if ($this->session->flashdata('msg-fail-add')) : ?>
    document.getElementById('notice').play();
    toastr.error("<?php echo $this->session->flashdata('msg-fail-add')?>", "FAIL");
    <?php endif; ?>

    table_user = $('#user').DataTable();
    table_vendor = $('#vendor').DataTable({
        pageLength: 5,
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
        columns: [{
                "data": "No"
            },
            {
                "data": "Date"
            },
            {
                "data": "Scope"
            },
            // {
            //     "data": "Files"
            // },
            {
                "data": "Details"
            },
            {
                "data": "Actions"
            },
            {
                "data": "Datecreated"
            },
        ]

    });

    var myGallery = new FgGallery('.fg-gallery', {
        cols: 4,
        style: {
            border: '10px solid #fff',
            height: '180px',
            boxShadow: '0 2px 10px -5px #000'
        }
    })

    $.ajax({
        url: '<?php echo base_url()?>dailylog/getJob_Web',
        method: 'post',
        dataType: 'text',
        success: function(data) {
            var listjob = JSON.parse(data);
            console.log(data);
            if (listjob.length !== 0) {
                $.each(listjob, function(count, item) {
                    count++;
                    var actionButton = '<button id="' + item['job_id'] +
                        '" title="View Daily Log" onclick="populateDailyLog(this.id, \'' +
                        item['job_name'] +
                        '\');" type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"</button>';
                    var tempobj = {
                        No: count,
                        Job_name: item['job_name'],
                        Client: item['owner'],
                        Action: actionButton,
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