  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?= base_url() ?>assets/img/RexinProSoft_logo.jpeg" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">RnexPro</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info">
                  <a href="#" class="d-block"
                      style><?php echo $this->session->userdata('name') ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo base_url('schedule') ?>" class="nav-link">
                          <i class="nav-icon fas fa-calendar"></i>
                          <p>
                              Schedules
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo base_url('ganttchart') ?>" class="nav-link">
                          <i class="nav-icon fas fa-chart-gantt"></i>
                          <p>
                              Gantt Chart
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="nav-icon fas fa-pencil-alt"></i>
                          <p>
                              Projects
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo base_url('jobs') ?>" class="nav-link">
                                  <p>Create Projects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('jobs/view')?>" class="nav-link">
                                  <p>View Projects</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo base_url('dailylog') ?>" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Daily Log
                          </p>
                      </a>
                  </li>
                  <?php if($this->session->userdata('role') == 1){?>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              User Management
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo base_url('user/index') ?>" class="nav-link">
                                  <i class="far fa-user nav-icon"></i>
                                  <p>Client</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('user/vendor_index') ?>" class="nav-link">
                                  <i class="fa-solid fa-user nav-icon"></i>
                                  <p>Sub-contractor/ Team</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <?php } ?>
                  <li class="nav-header">LABELS</li>
                  <li class="nav-item">
                      <a href="<?php echo base_url('welcome/logout') ?>" class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p class="text">Logout</p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>