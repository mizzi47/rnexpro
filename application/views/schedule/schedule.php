<!--
 * @author myzking
 * @copyright 2022
-->
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
                                <div class="col">
                                    <button class="btn btn-info" onclick="cal.prev();setDate();"><span><i class="fa-solid fa fa-chevron-circle-left"></i></span>
                                        Previous</button>
                                    <button class="btn btn-success" onclick="cal.today();setDate();">Today</button>
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
                <div class='input-group date' id='datetimepicker3'>
                    <div class="col-md-4">
                        <label for="selected_dateStart">Start Date:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="display_date_start" value="" disabled>
                    </div>
                </div>
                <div class='input-group date' id='datetimepicker3'>
                    <div class="col-md-4">
                        <label for="selected_dateEnd">End Date:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="display_date_end" value="" disabled>
                    </div>
                </div>
                <div class='input-group'>
                    <div class="col-md-4">
                        <label for="sch_color">Schedule Color:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="color" id="sch_color" name="sch_color" list="presetColors">
                        <datalist id="presetColors">
                            <option>#FF3333</option>
                            <option>#FFFF00</option>
                            <option>#00FF00</option>
                            <option>#00FFFF</option>
                            <option>#0000FF</option>
                            <option>#9933FF</option>
                            <option>#FF99CC</option>
                            <option>#606060</option>
                        </datalist>
                    </div>
                </div>
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
                            <label for="details_view_job">Job Name:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="job_name" class="form-control" id="details_view_job" value="" disabled>
                        </div>
                    </div>
                    <!-- <div class='input-group date'>
                        <div class="col-md-4">
                            <label for="logdate">Date:</label>
                        </div>
                        <script type="text/javascript">
                        $(function() {
                            $('#details_view_date_start').datepicker({
                                format: "dd/mm/yyyy"
                            });
                        });
                        </script>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="details_view_date_start" name="date_start" type="text" class="form-control date-input"
                                    required />
                                <label class="input-group-btn" for="txtDate">
                                    <span class="btn btn-default">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='input-group date'>
                        <div class="col-md-4">
                            <label for="logdate">Date:</label>
                        </div>
                        <script type="text/javascript">
                        $(function() {
                            $('#details_view_date_end').datepicker({
                                format: "dd/mm/yyyy"
                            });
                        });
                        </script>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="details_view_date_end" name="date_end" type="text" class="form-control date-input"
                                    required />
                                <label class="input-group-btn" for="txtDate">
                                    <span class="btn btn-default">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <div class='input-group date' id='datetimepicker3'>
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