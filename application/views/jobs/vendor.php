  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Project</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item active"><a href="<?= base_url('jobs') ?>">Create Jobs</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="card card-default">

                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12">
                              <div class="card card-primary card-outline card-outline-tabs">
                                  <div class="card-header p-0 border-bottom-0">
                                      <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                          <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-job-tab" data-toggle="pill" href="#custom-tabs-job" role="tab" aria-controls="custom-tabs-job" aria-selected="true">Job</a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-owner-tab" data-toggle="tab" href="#custom-tabs-owner" role="tab" aria-controls="custom-tabs-owner" aria-selected="false">Client</a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-internal-tab" data-toggle="tab" href="#custom-tabs-internal" role="tab" aria-controls="custom-tabs-internal" aria-selected="false">Project In Charge</a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link active" id="custom-tabs-vendors-tab" data-toggle="tab" href="#custom-tabs-vendors" role="tab" aria-controls="custom-tabs-vendors" aria-selected="false">Subs/Vendors</a>
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="card-body">
                                      <div class="tab-content" id="custom-tabs-four-tabContent">
                                          <div class="tab-pane fade" id="custom-tabs-job" role="tabpanel" aria-labelledby="custom-tabs-job-tab">
                                              <?php $this->load->view('jobs/view/jobs') ?>
                                          </div>
                                          <div class="tab-pane fade" id="custom-tabs-owner" role="tabpanel" aria-labelledby="custom-tabs-owner-tab">
                                              <?php $this->load->view('jobs/view/owner') ?>
                                          </div>
                                          <div class="tab-pane fade" id="custom-tabs-internal" role="tabpanel" aria-labelledby="custom-tabs-internal-tab">
                                              <?php $this->load->view('jobs/view/internal') ?>
                                          </div>
                                          <div class="tab-pane fade show active" id="custom-tabs-vendors" role="tabpanel" aria-labelledby="custom-tabs-vendors-tab">
                                              <?php $this->load->view('jobs/view/create_vendor') ?>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /.card -->
                              </div>
                          </div>
                      </div>
                      <!-- /.row -->
                  </div>

              </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->