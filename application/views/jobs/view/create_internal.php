<div class="row">
    <div class="col-lg-12">
        <div class="card bg-light mb-3">
            <div class="card-header">
                <h3 class="card-title">Project In Charge</h3>
            </div>
            <div class="card-body">
                <?php echo form_open('jobs/create_internal') ?>
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
                                    <td><input type="checkbox" name="access[]" value="<?php echo $internal['id']; ?>"></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>

                </table>
                <input type="hidden" value="<?php echo $this->uri->segment(3);  ?>" name="job_id">
                <button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Save</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>