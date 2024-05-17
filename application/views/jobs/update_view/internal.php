<div class="row">
    <div class="col-lg-12">
        <div class="card bg-light mb-3">
            <div class="card-header">
                <h3 class="card-title">Project In Charge</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Administrator</th>
                            <th>Job Viewing Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $internal) {
                            $role = array(1);
                            if ($internal['status'] == 'A' && in_array($internal['role'], $role)) { ?>
                                <tr>
                                    <td style="text-transform: capitalize;"><?php echo $internal['name']; ?></td>
                                    <td>
                                        <?php foreach ($jobs as $job) {
                                            $hasAccess = "";
                                            $arrayAccess = explode('|', $job['access']);
                                            foreach ($arrayAccess as $key => $crvalue) {
                                                if ($internal['id'] == $crvalue) {
                                                    // echo $crvalue;
                                                    $hasAccess = 'checked';
                                                }
                                            } ?>
                                            <input <?php echo $hasAccess; ?> type="checkbox" name="access[]" value="<?php echo $internal['id']; ?>" disabled>
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <?php echo form_open('jobs/update_internal') ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Project In Charge</th>
                            <th>Job Viewing Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $internal) {
                            $role = array(2, 3);
                            if ($internal['status'] == 'A' && in_array($internal['role'], $role)) { ?>
                                <tr>
                                    <td style="text-transform: capitalize;"><?php echo $internal['name']; ?></td>
                                    <td>
                                        <?php foreach ($jobs as $job) {
                                            $hasAccess = "";
                                            $arrayAccess = explode('|', $job['access']);
                                            foreach ($arrayAccess as $key => $crvalue) {
                                                if ($internal['id'] == $crvalue) {
                                                    // echo $crvalue;
                                                    $hasAccess = 'checked';
                                                }
                                            } ?>
                                            <input <?php echo $hasAccess; ?> type="checkbox" name="access[]" value="<?php echo $internal['id']; ?>">
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <input type="hidden" value="<?php echo $this->uri->segment(3);  ?>" name="job_id">
                <button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Update</button>
                <?php echo form_close() ?>
            </div>
        </div>
        <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>jobs/summary/<?= $this->uri->segment(3) ?>">Job Summary</a>
    </div>
</div>