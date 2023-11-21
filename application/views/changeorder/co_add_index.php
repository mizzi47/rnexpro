<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Change Order/ Variaton Order</a></li>
                        <li class="breadcrumb-item"> Add VO/CO</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex flex-row">
                                                <h4 class="m-0 text-dark">Add VO/CO</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class='input-group date'>
                                                    <div class="col-md-4">
                                                        <label for="issuedate">Issued Date:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                            <input class="form-control" name="issuedate" type="text" id="datepicker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='input-group'>
                                                    <div class="col-md-4">
                                                        <label for="">Code ID:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" placeholder="Code ID" id="code_id" name="code_id" rows="5" class="form-control" required></input>
                                                    </div>
                                                </div><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex flex-row">
                                                <h4>Item List</h4>
                                                <div class="ml-auto p-2">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#modalAddItem" id="addRow">Add new item</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="itemListCo" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Item</th>
                                                        <th>Qty</th>
                                                        <th>Unit</th>
                                                        <th>Rate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        </div>
                                        <div class="col-md-2">
                                            <a onclick='generateCO()' class="btn btn-info form-control" id="code_id" id="print"><span><i class="fa fa-print"></i></span> Print</a>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="submitCo" class="btn btn-success form-control">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="modalAddItem" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Item:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="itemname" rows="5" class="form-control" required></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Quantity:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="number" id="qty" rows="5" class="form-control" required></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Unit:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="unit" rows="5" class="form-control" required></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Rate:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="rate" rows="5" class="form-control" required></input>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addItem" type="button" class="btn btn-ifo">Add Item</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = new DataTable('#itemListCo', {
            pageLength: 5,
            lengthMenu: [
                [5, 10],
                [5, 10]
            ],
        });
        let counter = 1;
        
        function addNewRow() {
            table.row
                .add([
                    counter,
                    $('#itemname').val(),
                    $('#qty').val(),
                    $('#unit').val(),
                    $('#rate').val(),
                ])
                .draw(false);

            counter++;
        }

        function submitCo() {
            arrItem = table.data().toArray();
            $.ajax({
                url: '<?php echo site_url() ?>changeorder/submitCo',
                method: 'post',
                dataType: 'text',
                data: {
                    code_id:  $('#code_id').val(),
                    issued_date:  $('#datepicker').val(),
                    job_id: <?php echo $job_id ?>,
                    arrItem: arrItem
                },
                success: function(result) {
                   console.log(result);
                }
            });
        }

        //print
        function loadFile(url, callback) {
            PizZipUtils.getBinaryContent(url, callback);
        }
        window.generateCO = function generateCO() {
            var arrayItem = table.data().toArray();
            console.log(arrayItem);
            $.ajax({
                url: '<?php echo site_url() ?>changeorder/generateCO',
                method: 'post',
                dataType: 'text',
                data: {
                    job_id: <?php echo $job_id ?>
                },
                success: function(result) {
                    data = JSON.parse(result);
                    console.log(data)
                    object = {
                        "client_name": data['owner'],
                        "client_ic": data['no_laporan_polis'],
                        "client_phone": data['phone'],
                        "client_title": data['job_name'],
                        "code_id": data['job_name'],
                        "print_date": "<?php echo date('d/m/Y') ?>",
                    }
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
                            saveAs(blob, "CO-VO.docx");
                        }
                    );
                }
            });

        };

        document.querySelector('#addItem').addEventListener('click', addNewRow);
        document.querySelector('#submitCo').addEventListener('click', submitCo);
    })
</script>