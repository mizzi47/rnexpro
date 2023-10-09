<?php echo form_open('jobs/create_owner'); ?>
<div class="form-group row">
    <div class="col-lg-3">
        <label class="col-sm-12 col-form-label">Owner Name <font color="red">*</font></label>
        <div class="col-sm-12">
            <input type="text" name="owner_name" class="form-control" style="text-transform: uppercase;" required>
        </div>
    </div>
    <div class="col-lg-3">
        <label class="col-sm-12 col-form-label">Phone Number</label>
        <div class="col-sm-12">
            <input type="text" name="phone" class="form-control">
        </div>
    </div>
    <div class="col-lg-3">
        <label class="col-sm-12 col-form-label">Email</label>
        <div class="col-sm-12">
            <input type="text" name="email" class="form-control">
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $this->uri->segment(3);  ?>" name="job_id">
<button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Save</button>
<?php echo form_close(); ?>