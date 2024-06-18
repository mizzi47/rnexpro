<!--
 * @author myzking
 * @copyright 2022
-->
<style>
    .box {
        float: left;
        height: 20px;
        width: 20px;
        margin-bottom: 15px;
        border: 1px solid black;
        clear: both;
        background-color: red;
    }
</style>
<?php

$data = [
    'EXTERIOR WORK' => [
        'Foundation Work' => [
            'Color' => 'Red',
            'Code' => '#FF0000'
        ],
        'Structure Work' => [
            'Color' => 'Orange',
            'Code' => '#FFA500'
        ],
        'Framing Work' => [
            'Color' => 'Yellow',
            'Code' => '#FFFF00'
        ],
        'Siding Work' => [
            'Color' => 'Brown',
            'Code' => '#A52A2A'
        ],
        'Plastering Work' => [
            'Color' => 'Purple',
            'Code' => '#800080'
        ],
        'Facade Work' => [
            'Color' => 'Grey',
            'Code' => '#808080'
        ],
        'Painting Work' => [
            'Color' => 'Cyan',
            'Code' => '#00FFFF'
        ],
        'Landscaping Work' => [
            'Color' => 'Green',
            'Code' => '#008000'
        ]
    ],
    'INTERIOR WORK' => [
        'Site Protection' => [
            'Color' => 'Blue',
            'Code' => '#0000FF'
        ],
        'Demolish Work' => [
            'Color' => 'Dark Raspberry',
            'Code' => '#872657'
        ],
        'Extension Work' => [
            'Color' => 'Aquamarine',
            'Code' => '#7FFFD4'
        ],
        'Partition Work' => [
            'Color' => 'Golden Yellow',
            'Code' => '#FFDF00'
        ],
        'Floor Finishes' => [
            'Color' => 'Irish Green',
            'Code' => '#08A04B'
        ],
        'Wiring & Electrical' => [
            'Color' => 'Dark Blue',
            'Code' => '#00008B'
        ],
        'Wall Finishes' => [
            'Color' => 'Coral Peach',
            'Code' => '#FBD5AB'
        ],
        'Ceiling Finishes' => [
            'Color' => 'Dark White',
            'Code' => '#E1D9D1'
        ],
        'Carpentry Work' => [
            'Color' => 'FireBrick',
            'Code' => '#B22222'
        ],
        'Aluminium & Glass' => [
            'Color' => 'Jet Gray',
            'Code' => '#616D7E'
        ],
        'Steel Work' => [
            'Color' => 'Silver',
            'Code' => '#C0C0C0'
        ],
        'Plumbing' => [
            'Color' => 'Red Brown',
            'Code' => '#622F22'
        ],
        'Furnishing & Decoration' => [
            'Color' => 'Violet Red',
            'Code' => '#F6358A'
        ],
        'Cleaning' => [
            'Color' => 'Lime',
            'Code' => '#00FF00'
        ]
    ]
];

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Schedule</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Schedule</li>
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
                            <div class="d-flex flex-row">
                                <div class="col-md-4">
                                    <button class="btn btn-info" onclick="cal.prev();setDate();"><span><i class="fa-solid fa fa-chevron-circle-left"></i></span>
                                        Previous</button>
                                    <button class="btn btn-info" onclick="cal.today();setDate();">Today's Date</button>
                                    <button class="btn btn-info" onclick="cal.next();setDate();">Next <span><i class="fa-solid fa fa-chevron-circle-right"></i></button>
                                </div>
                                <div class="col">
                                    <h1 id="currentMonth" class="m-0 text-dark">Schedule</h1>
                                </div>
                                <div class="col">
                                    <select id="schedule_job_selection" class="js-example-basic-single" style="width: 100%" name="state">
                                        <option value="all">All</option>
                                        <?php foreach ($job as $j) { ?>
                                            <option value="<?= $j['job_id'] ?>"><?= $j['job_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-md-auto">
                                            PICK DATE
                                </div>
                                <div class="col-md-2">
                                    <input placeholder="select month" class="form-control" type="month" onchange="setMonth(event)">
                                </div>
                            </div>
                        </div>
                        <div id="container_calendar" style="height: 600px;"></div>
                        <svg id="gantt"></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="addModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='input-group date'>
                    <div class="col-md-4">
                        <label for="display_date_start">Start Date:</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" id="display_date_start" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                </div>
                <div class='input-group date'>
                    <div class="col-md-4">
                        <label for="display_date_end">End Date:</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" id="display_date_end" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                </div>
                <div class='input-group'>
                    <div class="col-md-4">
                        <label for="sch_color">Scope:</label>
                    </div>
                    <div class="col-md-auto">
                        <select class="form-control" name="sch_color" id="sch_color">
                            <?php foreach ($data as $category => $items) : ?>
                                <optgroup label="<?= $category ?>">
                                    <?php foreach ($items as $work => $details) : ?>
                                        <option value="<?php echo htmlspecialchars($details['Code']); ?>">
                                            <?php echo $work; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <input id="previewColor" class="form-control" type='color' disabled>
                    </div>
                </div>
                <br>
                <div class='input-group'>
                    <div class="col-md-4">
                        <label for="sch_title">Schedule Title:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sch_title" name="sch_title" placeholder="Enter schedule name">
                    </div>
                </div>
                <div class='input-group'>
                    <div class="col-md-4">
                        <label for="sch_body">Schedule Description:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea placeholder="Enter description here" class="form-control" rows="10" id="sch_body"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="data_date_start">
                <input type="hidden" id="data_date_end">
                <button id="add_schedule" type="button" class="btn btn-success">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="clickScheduleModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('schedule/editSchedule') ?>">
                <div class="modal-body">
                    <div class='input-group'>
                        <div class="col-md-4">
                            <label for="details_view_job">Project Name:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="job_name" class="form-control" id="details_view_job" value="" disabled>
                        </div>
                    </div>
                    <div class='input-group date'>
                        <div class="col-md-4">
                            <label for="details_view_date_start">Start Date:</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="details_view_date_start" value="" disabled>
                        </div>
                    </div>
                    <div class='input-group date'>
                        <div class="col-md-4">
                            <label for="details_view_date_end">End Date:</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="details_view_date_end" value="" disabled>
                        </div>
                    </div>
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
                        <input type="hidden" id="data_date_start">
                        <input type="hidden" id="data_date_end">
                        <input type="hidden" name="schedule_id" id="details_schedule_id">
                        <button id="remove_schedule" type="button" class="btn btn-danger">Remove</button>
                        <button id="edit_schedule" type="submit" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var colors = document.getElementById('sch_color');
    colors.onchange = function() {
        var previewColor = document.getElementById("previewColor");
        previewColor.value = colors.value;
    };
</script>