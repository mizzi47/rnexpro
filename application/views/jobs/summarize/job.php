<?php foreach ($jobs as $value) { ?>
    <div class="col-6">
        <div class="card-header">
            <h6 class="card-title">Job Description</h6>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Project Name</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['job_name'] ?></td>
                </tr>
                <tr>
                    <td>Job Prefix</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['job_prefix'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['status'] ?></td>
                </tr>
                <tr>
                    <td>Project Type</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['job_type'] ?></td>
                </tr>
                <tr>
                    <td>Contract Price</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['contract'] ?></td>
                </tr>
                <tr>
                    <td>Job Group</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['job_group'] ?></td>
                </tr>
                <tr>
                    <td>Project Managers</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['manager'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['address'] ?></td>
                </tr>
                <tr>
                    <td>Meters</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['meters'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['city'] ?></td>
                </tr>
                <tr>
                    <td>Permit</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['permit'] ?></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['postcode'] ?></td>
                </tr>
                <tr>
                    <td>Lot</td>
                    <td></td>
                    <td>:</td>
                    <td></td>
                    <td><?php echo $value['lot'] ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php } ?>