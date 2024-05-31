    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="card-header">
                            <div class="d-flex flex-row">
                                <div class="p-2">
                                    <h1>Variation Order</h1>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Variation Order</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php foreach ($jobs as $value) { ?>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <div class="card-header">
                                                        <h6 class="card-title">Project Description</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <table>
                                                            <tr>
                                                                <td>Project Name</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td style="text-transform: capitalize;">
                                                                    <?php echo $value['job_name'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Project No/Ref</td>
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
                                                            <!-- <tr>
                                                                <td>Job Group</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php //echo $value['job_group'] ?></td>
                                                            </tr> -->
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
                                                                <td>State</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['state'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Properties Type</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['pro_type'] ?></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>Permit</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['permit'] ?></td>
                                                            </tr> -->
                                                            <tr>
                                                                <td>Postcode</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['postcode'] ?></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>Lot</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['lot'] ?></td>
                                                            </tr> -->
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card-header">
                                                        <h6 class="card-title">Owner</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <table>
                                                            <tr>
                                                                <td>Owner Name</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td style="text-transform:capitalize">
                                                                    <?php echo $value['owner'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Reference/IC Number</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['ic_num'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone Number</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['phone'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td></td>
                                                                <td>:</td>
                                                                <td></td>
                                                                <td><?php echo $value['email'] ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex flex-row">
                                            <div class="p-2">
                                                <h5>List Of Variation Order</h5>
                                            </div>
                                            <div class="ml-auto p-2">
                                                <button onclick="window.location.href='<?php echo base_url('changeorder/co_add_index/') ?><?php echo $job_id ?>';" class="btn-lg btn-success"> Add New Variation Order</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-bordered">
                                            <table id="changeorder" class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Project Name</th>
                                                        <th>Reference Code</th>
                                                        <th>Created Date</th>
                                                        <th>Issued Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url() ?>jobs/view"><button class="btn btn-default">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function() {
            changeorder = $('#changeorder').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10],
                    [5, 10]
                ],
                columns: [{
                        "data": "no"
                    },
                    {
                        "data": "project_name"
                    },
                    {
                        "data": "code_id"
                    },
                    {
                        "data": "created_date"
                    },
                    {
                        "data": "issued_date"
                    },
                    {
                        "data": "action"
                    },
                ]
            });

            $.ajax({
                url: '<?php echo base_url() ?>changeorder/getCo',
                method: 'post',
                dataType: 'text',
                data: {
                    job_id: <?php echo $job_id ?>
                },
                success: function(data) {
                    var listco = JSON.parse(data);
                    if (listco.length !== 0) {
                        $.each(listco, function(count, item) {
                            var job_id = <?php echo $job_id ?>;
                            count++;
                            var actionButton = '<button id="' + item['id'] +
                                '" title="Delete Variation Order" onclick="window.location.href=\'<?php echo base_url('changeorder/deleteCo') ?>/' + job_id + '/' + item['id'] + '\'" type="button" class="btn btn-sm btn-danger form-control"><i class="fa fa-trash"></i>&nbsp Delete Variation Order</button>&nbsp';
                            var print = ' <a onclick="generateCO('+item['id']+')" class="btn btn-sm btn-info form-control" id="code_id" id="print"><span><i class="fa fa-print"></i></span> Print</a>';
                            var tempobj = {
                                no: count,
                                project_name: "<?php echo $value['job_name'] ?>",
                                code_id: item['code_id'],
                                created_date: item['created_date'],
                                issued_date: item['issued_date'],
                                action: actionButton + print,
                            }
                            changeorder.row.add(tempobj).draw();
                        })
                    } else {
                        changeorder.clear().draw();
                    }
                } 
            });
        })

        function loadFile(url, callback) {
            PizZipUtils.getBinaryContent(url, callback);
        }
        window.generateCO = function generateCO(id) {
            $.ajax({
                url: '<?php echo site_url() ?>changeorder/generateCo',
                method: 'post',
                dataType: 'text',
                data: {
                    job_id: <?php echo $job_id ?>,
                    id: id
                },
                success: function(result) {
                    data = JSON.parse(result);
                    arrItem = data['changeorder_item'];
                    var total = 0;
                    for (var i = 0; i < arrItem.length; i++) {
                        arrItem[i]['amount'] = arrItem[i]['qty'] * arrItem[i]['rate'];
                        arrItem[i]['count'] = i + 1;
                        total = total + arrItem[i]['amount'];
                    }
                    object = {
                        "client_name": data['jobs'][0]['owner'],
                        "client_ic": data['jobs'][0]['no_laporan_polis'],
                        "client_phone": data['jobs'][0]['phone'],
                        "client_title": data['jobs'][0]['job_name'],
                        "code_id": data['changeorder'][0]['code_id'],
                        "print_date": "<?php echo date('d/m/Y') ?>",
                        "total": total,
                    }
                    object.itemco = arrItem;
                    console.log(object)
                    loadFile("<?php echo site_url() ?>/assets/covo-template.docx",
                        function(error, content) {
                            if (error) {
                                throw error;
                            }
                            const zip = new PizZip(content);
                            const doc = new window.docxtemplater(zip, {
                                paragraphLoop: true,
                                linebreaks: true,
                            });
                            // Render the document (Replace {first_name} by John, {last_name} by Doe, ...)
                            doc.render(object);

                            const blob = doc.getZip().generate({
                                type: "blob",
                                mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                                // compression: DEFLATE adds a compression step.
                                // For a 50MB output document, expect 500ms additional CPU time
                                compression: "DEFLATE",
                            });
                            // Output the document using Data-URI
                            saveAs(blob, "Variation_Order.docx");
                        }
                    );
                }
            });

        };
    </script>