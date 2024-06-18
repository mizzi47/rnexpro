<?php echo form_open_multipart('jobs/create_job'); ?>

<div class="card bg-light mb-3">
	<div class="card-header">
		<h2>General</h2>
	</div>
	<div class="card-body">
		<div class="form-group row">
			<div class="col-lg-8">
				<label class="col-sm-12 col-form-label">Project Name <font color="red">*</font></label>
				<div class="col-sm-12">
					<input type="text" name="job_name" class="form-control" style="text-transform: uppercase;"
						placeholder="EXP: HARMONY HEIGHTS" required>
				</div>
			</div>
			<div class="col-lg-4">
				<label class="col-sm-12 col-form-label">Project / Reference Number <font color="red">*</font></label>
				<div class="col-sm-12">
					<input type="text" name="job_prefix" class="form-control" placeholder="EXP: 240201DJR3TGSU">
				</div>
			</div>
			<div class="col-lg-8">
				<label class="col-sm-12 col-form-label">Project Type <font color="red">*</font></label>
				<div class="col-sm-12">
					<input type="text" name="type" class="form-control" placeholder="EXP: INTERIOR DESIGN" required>
				</div>
			</div>
			<div class="col-lg-4">
				<label class="col-sm-12 col-form-label">Status</label>
				<div class="col-sm-12">
					<select class="form-control" name="status">
						<option value="Incoming">New-project</option>
						<option value="Ongoing">Ongoing</option>
						<option value="Completed">Completed</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group row">
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
					<input type="text" name="address" class="form-control"
						placeholder="EXP: No.69, Jalan Ampang,Kampung Datuk Keramat">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label class="col-sm-12 col-form-label">City</label>
				<div class="col-sm-12">
					<input type="text" name="city" class="form-control" placeholder="EXP: SHAH ALAM">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label class="col-sm-12 col-form-label">Postcode</label>
				<div class="col-sm-12">
					<input type="text" name="postcode" class="form-control" placeholder="EXP: 40400">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label class="col-form-label">State<font color="red">*</font></label>
					<div>
						<select class="form-control" name="state" required>
							<option value="" disabled selected hidden>Select State</option>
							<option value="Johor">Johor</option>
							<!--<option value="Labuan"></option>-->
							<option value="Kedah">Kedah</option>
							<option value="Kelantan">Kelantan</option>
							<option value="Melaka">Melaka</option>
							<option value="Negeri Sembilan">Negeri Sembilan</option>
							<option value="Pahang">Pahang</option>
							<option value="Pulau Pinang">Pulau Pinang</option>
							<option value="Perak">Perak</option>
							<option value="Perlis">Perlis</option>
							<option value="Sabah">Sabah</option>
							<option value="Sarawak">Sarawak</option>
							<option value="Selangor">Selangor</option>
							<option value="Terengganu">Terengganu</option>
							<option value="Kuala Lumpur">W.P. Kuala Lumpur</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label class="col-form-label">Properties Type</label>
					<div>
						<select class="form-control" name="pro_type" required>
							<option value="" disabled selected hidden>Select Properties type</option>
							<option value="Government">Government</option>
							<option value="Commercial">Commercial</option>
							<option value="Residential">Residential</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label class="col-form-label">Square Meters</label>
					<div>
						<input type="text" name="meters" class="form-control">
					</div>
				</div>
			</div>
		</div>

		<!-- </div> -->
		<!-- <div class="form-group row">
            <div class="col-lg-12">
                <label class="col-sm-12 col-form-label">Square Meters</label>
                <div class="col-sm-12">
                    <input type="text" name="meters" class="form-control">
                </div>
            </div>
        </div> -->

	</div>
</div>

<div class="card bg-light mb-3">
	<!-- <div class="form-group row"> -->
	<div class="col-12">
		<!-- <div class="card"> -->
		<div class="card-header">
			<h2>Project Details</h2>
		</div>
		<div class="card-body">
			<div class="form-group row">
				<!-- <div class="col-12"> -->
					<div class="card-body">
						<div class="form-group">
						    <label class="col-form-label">Project Specification</label>
							<div class="col-12">
							   <textarea type="text" name="project_desc" class="form-control" rows="3" style="width: 100%;" id="project_desc"></textarea>
							</div>
							<br>
							<label class="col-form-label">Project File</label>
							<div class="col-8">
							   <input type="file" name="projectFiles[]" class="form-control" id="projectFiles" multiple>
							</div>
						</div>
					</div>
				<!-- </div> -->
			</div>
		</div>

		<!-- </div> -->
	</div>
	<!-- </div> -->
</div>

<button type="submit" class="btn btn-success float-right" style="margin-bottom: 20px;">Save</button>
<?php echo form_close(); ?>


