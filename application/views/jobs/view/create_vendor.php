<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sub/Vendor Permissions</h3>
            </div>
            <div class="card-body">
                <?php echo form_open('jobs/create_vendor') ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Primary Contact</th>
                            <th>Business Phone</th>
                            <th>Cell Phone</th>
                            <th>Job Viewing Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-transform: capitalize;"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="access[]" value=""></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" value="<?php echo $this->uri->segment(3);  ?>" name="job_id">
                <button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Update</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>