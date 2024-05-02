<?php echo form_open('jobs/create_job'); ?>

<div class="card bg-light mb-3">
    <div class="card-header">
        <h2>General</h2>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-8">
                <label class="col-sm-12 col-form-label">Project Name <font color="red">*</font></label>
                <div class="col-sm-12">
                    <input type="text" name="job_name" class="form-control" required>
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <label class="col-sm-12 col-form-label">Job Prefix</label>
                <div class="col-sm-12">
                    <input type="text" name="job_prefix" class="form-control">
                </div>
            </div> -->
            <div class="col-lg-4">
                <label class="col-sm-12 col-form-label">Status</label>
                <div class="col-sm-12">
                    <select class="form-control" name="status">
                        <option value="Incoming">Incoming</option>
                        <option value="In-progress">In-progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-8">
                <label class="col-sm-12 col-form-label">Job Type <font color="red">*</font></label>
                <div class="col-sm-12">
                    <input type="text" name="type" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="col-sm-12 col-form-label">Contract Price</label>
                <div class="col-sm-12">
                    <input type="number" step="0.01" name="price" placeholder="0.00" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <!-- <div class="col-lg-6">
                <label class="col-sm-12 col-form-label">Job Group</label>
                <div class="col-sm-12">
                    <input type="text" name="group" class="form-control">
                </div>
            </div> -->
            <div class="col-lg-4">
                <label class="col-sm-12 col-form-label">Project Managers</label>
                <div class="col-sm-12">
                    <select name="manager" class="form-control">
                        <?php foreach ($user as $internal) {
                            $role = array(1);
                            if ($internal['status'] == 'A' && in_array($internal['role'], $role)) { ?>
                                <option value="<?php echo $internal['name'] ?>"><?php echo $internal['name'] ?></option>

                        <?php }
                        } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card bg-light mb-3">
    <div class="card-header">
        <h2>Project Timeline</h2>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-6">
                <label class="col-sm-12 col-form-label">Start Date</label>
                <div class="col-sm-12">
                    <input type="date" name="start_date" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <label class="col-sm-12 col-form-label">End Date</label>
                <div class="col-sm-12">
                    <input type="date" name="end_date" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card bg-light mb-3">
    <div class="card-header">
        <h2>Project Site</h2>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">Street Address</label>
                <div class="col-sm-12">
                    <input type="text" name="address" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">City</label>
                <div class="col-sm-12">
                    <input type="text" name="city" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">Postcode</label>
                <div class="col-sm-12">
                    <input type="text" name="postcode" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card bg-light mb-3">
    <div class="card-header">
        <h2>Project Details</h2>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">Square Meters</label>
                <div class="col-sm-12">
                    <input type="text" name="meters" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">Permit #</label>
                <div class="col-sm-12">
                    <input type="text" name="permit" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">Lot Info</label>
                <div class="col-sm-12">
                    <input type="text" name="lot" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Save</button>
<?php echo form_close(); ?>