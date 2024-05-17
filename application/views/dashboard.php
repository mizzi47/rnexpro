  <style>
      .blink {
          animation: blink 1s infinite;
      }

      .tui-view-10 {
          display: none;
      }

      @keyframes blink {
          0% {
              opacity: 1;
          }

          50% {
              opacity: 0;
          }

          100% {
              opacity: 1;
          }
      }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <hr>
      <!-- /.content-header -->
      <section class="content">
          <div class="card">
              <div class="card-header">
                  Project Info
              </div>
              <div class="card-body">
                  <div class="row">
                      <!-- Column -->
                      <div class="col">
                          <div class="card card-hover">
                              <div class="card-header text-center bg-light">
                                  <h5 class="text-black">New Project</h5>
                              </div>
                              <div class="box bg-warning text-center">
                                  <h1 class="font-light text-white">
                                      <h1>
                                          <?php echo $Newprojectjob ?>
                                      </h1>
                                  </h1>
                              </div>
                          </div>
                      </div>
                      <!-- Column -->
                      <div class="col">
                          <div class="card card-hover">
                              <div class="card-header text-center bg-light">
                                  <h5 class="text-black">On Going</h5>
                              </div>
                              <div class="box bg-info text-center">
                                  <h1 class="font-light text-white">
                                      <h1>
                                          <span class="blink">
                                              <?php echo $inprogressjob ?>
                                          </span>
                                      </h1>
                                  </h1>
                              </div>
                          </div>
                      </div>
                      <!-- Column -->
                      <div class="col">
                          <div class="card card-hover">
                              <div class="card-header text-center bg-light">
                                  <h5 class="text-black">Completed</h5>
                              </div>
                              <div class="box bg-success text-center">
                                  <h1 class="font-light text-white">
                                      <h1>
                                          <?php echo $completedjob ?>
                                      </h1>
                                  </h1>
                              </div>
                          </div>
                      </div>
                      <!-- Column -->
                  </div>
              </div>
          </div>
              <div class="row">
                  <div class="col">
                      <div class="card">
                          <div class="card-header border-transparent">
                              <h3 class="card-title">Latest Created Daily Logs</h3>
                              <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive table-bordered">
                                  <table id="table_latestdailylog">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Project Name</th>
                                              <th>Updated By</th>
                                              <th>Date</th>
                                              <th>Date Created</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $count = 1; ?>
                                          <?php foreach ($latestdailylog as $dl) { ?>
                                              <tr>
                                                  <td><?php echo $count ?></td>
                                                  <td><?php echo $getJobName[$dl['job_id']] ?></td>
                                                  <td><?php echo $getUserName[$dl['user_id']] ?></td>
                                                  <td><?php echo $dl['logdate'] ?></td>
                                                  <td><?php echo $dl['logdate_created'] ?></td>
                                                  <td>
                                                      <button id="<?php echo $dl['dailylog_id'] ?>" title="View Details" onclick="window.location.href = '<?php echo site_url('dailylog/view/') ?><?php echo $dl['job_id']?>/<?php echo $dl['dailylog_id']?>'" type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View Details</button>
                                                  </td>
                                              </tr>
                                          <?php $count++;
                                            } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                          <div class="card-footer clearfix">
                          </div>
                      </div>
                  </div>
              </div>
          <div id="dailyLogViewDetailsModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Daily Log Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class='input-group'>
                              <div class="col-md-4">
                                  <label for="display_update">Update:</label>
                              </div>
                              <div class="col-md-8">
                                  <textarea class="form-control" rows="5" id="display_update" disabled></textarea>
                              </div>
                          </div>
                          <div class='input-group'>
                              <div class="col-md-4">
                                  <label for="display_pending">Pending:</label>
                              </div>
                              <div class="col-md-8">
                                  <textarea class="form-control" rows="5" id="display_pending" disabled></textarea>
                              </div>
                          </div>
                          <div class='input-group'>
                              <div class="col-md-4">
                                  <label for="display_issue">Issue:</label>
                              </div>
                              <div class="col-md-8">
                                  <textarea class="form-control" rows="5" id="display_issue" disabled></textarea>
                              </div>
                          </div>
                          <div class='input-group'>
                              <div class="col-md-4">
                                  <label for="display_info">Info:</label>
                              </div>
                              <div class="col-md-8">
                                  <textarea class="form-control" rows="5" id="display_info" disabled></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
          <script>
              function viewLatestDailyLog(selected_dailylog_id) {
                  $('#display_update').val();
                  $('#display_pending').val();
                  $('#display_issue').val();
                  $.ajax({
                      url: '<?php echo base_url() ?>dailylog/getDailyLogLatestDetails',
                      method: 'post',
                      data: {
                          selected_dailylog_id: selected_dailylog_id
                      },
                      dataType: 'text',
                      success: function(response) {
                          var selected_dailylog = JSON.parse(response);
                          $('#display_update').val(selected_dailylog['update']);
                          $('#display_pending').val(selected_dailylog['pending']);
                          $('#display_issue').val(selected_dailylog['issue']);
                          $('#dailyLogViewDetailsModal').modal('show');
                      }
                  });
              }
          </script>

      </section>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->