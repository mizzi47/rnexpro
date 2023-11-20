<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gantt Chart</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Gantt Chart</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- <svg id="gantt"></svg>
                            <div class="mx-auto mt-3 btn-group" role="group">
                                <button type="button" onclick="changeMode('Quarter Day')" class="btn btn-sm btn-light">Quarter Day</button>
                                <button type="button" onclick="changeMode('Half Day')" class="btn btn-sm btn-light">Half Day</button>
                                <button type="button" onclick="changeMode('Day')" class="btn btn-sm btn-light">Day</button>
                                <button type="button" onclick="changeMode('Week')" class="btn btn-sm btn-light">Week</button>
                                <button type="button" onclick="changeMode('Week')" class="btn btn-sm btn-light">Month</button>
                            </div> -->
                            <div id="timeline" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="viewDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='input-group'>
                    <div class="col-md-4">
                        <label for="details_view_title">Title:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control" id="details_view_title" value="">
                    </div>
                </div>
                <div class='input-group'>
                    <div class="col-md-4">
                        <label for="details_view_body">Description:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea rows="10" name="body" id="details_view_body" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['timeline']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();
        var tasks = [];
        $(document).ready(function() {
            $.ajax({
                url: '<?php echo base_url() ?>ganttchart/getGantt',
                method: 'post',
                data: {
                    job_id: <?php echo $job_id ?>,
                },
                dataType: 'text',
                success: function(data) {
                    var all_schedule = JSON.parse(data);
                    CountSchedule = all_schedule.length;
                    for (var i = 0; i < all_schedule.length; i++) {
                        var savedSchedules = {
                            id: all_schedule[i]['schedule_id'],
                            name: all_schedule[i]['title'],
                            body: all_schedule[i]['body'],
                            start: all_schedule[i]['start'],
                            end: all_schedule[i]['end'],
                            progress: 100
                        };
                        tasks.push(savedSchedules);
                    }
                    console.log(tasks);
                    dataTable.addColumn({
                        type: 'string',
                        id: 'Title'
                    });
                    dataTable.addColumn({
                        type: 'date',
                        id: 'Start'
                    });
                    dataTable.addColumn({
                        type: 'date',
                        id: 'End'
                    });
                    for (var i = 0; i < tasks.length; i++) {
                        dataTable.addRows([
                            [all_schedule[i]['title'], new Date(all_schedule[i]['start']), new Date(all_schedule[i]['end'])],
                        ]);
                    }

                    var options = {
                        "hAxis": {
                            "gridlines": {
                                "count": "-1",
                                "units": {
                                    "minutes": {
                                        "format": [
                                            "HH:mm"
                                        ]
                                    },
                                    "hours": {
                                        "format": [
                                            "MM/dd HH",
                                            "HH"
                                        ]
                                    },
                                    "days": {
                                        "format": [
                                            "yyyy/MM/dd"
                                        ]
                                    }
                                }
                            }
                        }
                    }
                    chart.draw(dataTable, options);
                }
            });
        })
    }
</script>
<!-- <script src="<?= base_url() ?>node_modules/frappe-gantt/dist/frappe-gantt.min.js"></script>
<script>
    var gantt;
    var tasks = []
    $(document).ready(function() {
        $.ajax({
            url: '<?php echo base_url() ?>ganttchart/getGantt',
            method: 'post',
            data: {
                job_id: <?php echo $job_id ?>,
            },
            dataType: 'text',
            success: function(data) {
                var all_schedule = JSON.parse(data);
                CountSchedule = all_schedule.length;
                for (var i = 0; i < all_schedule.length; i++) {
                    var rawdate = new Date(all_schedule[i]['start']);
                    var realdate = addOneDay(rawdate);
                    var savedSchedules = {
                        id: all_schedule[i]['schedule_id'],
                        name: all_schedule[i]['title'],
                        body: all_schedule[i]['body'],
                        start: realdate.toISOString(),
                        end: all_schedule[i]['end'],
                        progress: 100
                    };
                    tasks.push(savedSchedules);
                }
                gantt = new Gantt("#gantt", tasks, {
                    on_click: function(task) {
                        $("#details_view_date_start").val(task.start);
                        $("#details_view_date_end").val(task.end);
                        $("#details_view_title").val(task.name);
                        $("#details_view_body").val(task.body);
                        $("#viewDetails").modal("show");
                    },
                    on_date_change: function(task, start, end) {
                        var rawdate = new Date(start.toISOString());
                        var realdate = addOneDay(rawdate);
                        $.ajax({
                            url: '<?php echo base_url() ?>ganttchart/updateGantt',
                            method: 'post',
                            data: {
                                schedule_id: task.id,
                                start: start.toISOString(),
                                end: end.toISOString(),
                            },
                            dataType: 'text',
                            success: function(data) {
                                console.log(data);
                                if(data == 'SUCCESS'){
                                    toastr.success("SCHEDULE UPDATED", data);
                                }else{
                                    toastr.error("SCHEDULE UPDATE FAIL", data);
                                }
                            },
                            error: function(jqXHR, exception) {
                                var msg = '';
                                if (jqXHR.status === 0) {
                                    msg = 'Not connect.\n Verify Network.';
                                } else if (jqXHR.status == 404) {
                                    msg = 'Requested page not found. [404]';
                                } else if (jqXHR.status == 500) {
                                    msg = 'Internal Server Error [500].';
                                } else if (exception === 'parsererror') {
                                    msg = 'Requested JSON parse failed.';
                                } else if (exception === 'timeout') {
                                    msg = 'Time out error.';
                                } else if (exception === 'abort') {
                                    msg = 'Ajax request aborted.';
                                } else {
                                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                }
                                window.alert(msg);
                            },
                        });
                    },
                });
            }
        });
    })

    function changeMode(modeSelected) {
        gantt.change_view_mode(modeSelected);
    }

    function addOneDay(date = new Date()) {
        date.setDate(date.getDate() + 1);
        return date;
    }
</script> -->