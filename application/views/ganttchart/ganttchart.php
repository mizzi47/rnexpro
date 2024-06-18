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
                    <div id="printable" class="card">
                        <div class="card-header">
                            <h5>Project Name: <u><?php echo $selected_job[0]['job_name'] ?></u></h5>
                        </div>
                        <div class="card-body">
                            <div id="timeline" style=""></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="Print Chart" />
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

    // function drawChart() {
    //     var container = document.getElementById('timeline');
    //     var chart = new google.visualization.Timeline(container);
    //     var dataTable = new google.visualization.DataTable();
    //     var tasks = [];
    //     $(document).ready(function() {
    //         $.ajax({
    //             url: '<?php echo base_url() ?>ganttchart/getGantt',
    //             method: 'post',
    //             data: {
    //                 job_id: <?php echo $job_id ?>,
    //             },
    //             dataType: 'text',
    //             success: function(data) {
    //                 var all_schedule = JSON.parse(data);
    //                 CountSchedule = all_schedule.length;
    //                 for (var i = 0; i < all_schedule.length; i++) {
    //                     var savedSchedules = {
    //                         id: all_schedule[i]['schedule_id'],
    //                         name: all_schedule[i]['title'],
    //                         body: all_schedule[i]['body'],
    //                         start: all_schedule[i]['start'],
    //                         end: all_schedule[i]['end'],
    //                         progress: 100
    //                     };
    //                     tasks.push(savedSchedules);
    //                 }
    //                 console.log(tasks);
    //                 dataTable.addColumn({
    //                     type: 'string',
    //                     id: 'Title'
    //                 });
    //                 dataTable.addColumn({
    //                     type: 'date',
    //                     id: 'Start'
    //                 });
    //                 dataTable.addColumn({
    //                     type: 'date',
    //                     id: 'End'
    //                 });
    //                 for (var i = 0; i < tasks.length; i++) {
    //                     dataTable.addRows([
    //                         [all_schedule[i]['title'], new Date(all_schedule[i]['start']), new Date(all_schedule[i]['end'])],
    //                     ]);
    //                 }

    //                 var options = {
    //                     height: 1200,
    //                     timeline: {
    //                         groupByRowLabel: true
    //                     },
    //                     "hAxis": {
    //                         "gridlines": {
    //                             "count": "-1",
    //                             "units": {
    //                                 "minutes": {
    //                                     "format": [
    //                                         "HH:mm"
    //                                     ]
    //                                 },
    //                                 "hours": {
    //                                     "format": [
    //                                         "MM/dd HH",
    //                                         "HH"
    //                                     ]
    //                                 },
    //                                 "days": {
    //                                     "format": [
    //                                         "yyyy/MM/dd"
    //                                     ]
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //                 chart.draw(dataTable, options);
    //             }
    //         });
    //     })
    // }
    function drawChart() {
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();
        var all_schedule = <?php echo json_encode($ganttChartData); ?>;
        console.log(all_schedule);
        dataTable.addColumn({
            type: 'string',
            id: 'Group'
        });
        dataTable.addColumn({
            type: 'string',
            id: 'ID'
        });
        dataTable.addColumn({
            type: 'string',
            role: 'style'
        });
        dataTable.addColumn({
            type: 'date',
            id: 'Start'
        });
        dataTable.addColumn({
            type: 'date',
            id: 'End'
        });
        for (var i = 0; i < all_schedule.length; i++) {
            dataTable.addRows([
                [all_schedule[i]['title'], all_schedule[i]['body'], all_schedule[i]['bgColor'], new Date(all_schedule[i]['start']), new Date(all_schedule[i]['end'])],
            ]);
        }

        var rowHeight = 41;
        var chartHeight = (dataTable.getNumberOfRows() + 1) * rowHeight;

        var options = {
            height: 1200,
            timeline: {
                groupByRowLabel: true
            },
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

    function printDiv() {
        var printContents = document.getElementById('printable').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>