
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    #imgtn {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }

    .cropped-ofp {
        width: 150px;
        height: 150px;
        object-fit: cover;
        object-position: 25% 25%;
    }

    .project {
        display: none;
    }

    .header-print {
        display: none;
    }

    .footer {
        display: none;
    }

    .logo-print {
        display: none;
    }

    

    /* @page {
  margin: 1in; 
}

    @page :first {
  margin-top: 2in; 
} */
    


    @media print {


        @page {
               /* margin-top: 2.0cm;
               margin-bottom: 2.0cm; */
               margin: 0;
            }

            

        body {
            margin-top: 0;
        }

        button {
            display: none;
        }

        .details-header {
        display: none;
    }

    .print {
        display: none;
    }

    .accept {
        display: none;
        position: absolute;
        
    }
    .decline {
        display: none;
    }
    

    /* .project *************/
        .project {
            display: block;
            margin-top: 1.0cm;
        }

        .input-group.project {
        display: flex; /* Use flexbox for alignment */
        align-items: baseline; /* Center-align items vertically */
    }
        .input-group .col-md-2 {
            /* Adjust the width to accommodate the label */
            width: 105px;
        }

        .input-group .col-md-8 {
            /* Ensure the value takes up the remaining space */
            flex: 1;
        }

        .input-group.date {
            display: flex;
            align-items: baseline;
        }

        .input-group .col-md-1.date {
            width: 105px;
        }

        .input-group .col-md-8.date {
            flex: 1;
        }

        /*.upper-border {
            border-bottom: 0.5px solid;
            line-height: 10px;
        }*/

        .scope-border {
            border: 0.5px solid;
            border-radius: 8px;
            margin: 10px;
            /* padding: 5px; */
        }


        .update-border {
            border: 0.5px solid;
            border-radius: 8px;
            margin: 10px;
            /* padding: 5px; */
        }

        .pending-border {
            border: 0.5px solid;
            border-radius: 8px;
            margin: 10px;
            /* padding: 5px; */
        }

        .issue-border {
            border: 0.5px solid;
            border-radius: 8px;
            margin: 10px;
            /* padding: 5px; */
        }

        .header-print {
            display: block;
            text-align: center;
            /* margin-bottom: 40px; */
            font-size: 300px;
        }

        .logo-print {
            display: block;
            text-align: left;
        }

        .footer {
            display: block;
            /* content: "Rnexpro.com"; */
            position: fixed;
            bottom: 10px;
            right: 10px;
            /* transform: translate(-50%, -50%); */
            font-size: 24px;
            color: rgba(0, 0, 0, 1);
            z-index: 9999;
            pointer-events: none;
        }

        .border-secondary{
            page-break-inside: avoid;
        }

        .Loa {
            margin: 0;
            padding: 0;
        }
        .accept{
            border-radius: 12px;
        }

    }

</style>
<!--link rel="stylesheet" type="text/css" href="dailylog_print.css" media="print"-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PROJECT : <?php echo $getJobName[$dailylog[0]['job_id']] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Daily Log for job</li>
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
                                <div class="card-header details-header">
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <h5>DETAILS</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="logo-print">
                                    <img src="<?= base_url() ?>assets/img/LOGO-WALLMASTER-(M)-5.png" style="width: 200px;height: 175px;" alt="logo">
                                    </div>
                                    <div class="logo-address">
                                        
                                    </div>
                                    </div>

                                    <hr> 

                                    <div class="header-print">
                                        <h1><b>DAILY PROGRESS REPORT</b></h1>
                                    </div>
                                    <div class="upper-border">
                                    <div class='input-group project'>
                                        <div class="col-md-2">
                                            <h5><b>PROJECT:</b></h5>
                                        </div>
                                        <div class="col-md-8">
                                        <!--<p><?php //echo $getJobName[$dailylog[0]['job_id']] ?></p>-->
                                        <p><?php echo '<span style="font-size: 20px;">', $getJobName[$dailylog[0]['job_id']] ?></p>
                                        </div>
                                    </div>
                                    <div class='input-group date'>
                                        <div class="col-md-1 date">
                                            <h5><b>DATE:</b></h5>
                                        </div>
                                        <div class="col-md-8 date">
                                            <p><?php echo $dailylog[0]['logdate'] ?></p>
                                        </div>
                                    </div>
                                    </div>
                                <div class="scope-border">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Scopes:</h5>
                                            </div>
                                            <div class="row">
                                                <ul>
                                                    <?php $list_scope = array(
                                                        // <EXTERIOR WORK>
                                                        'Foundation Work',
                                                        'Structure Work',
                                                        'Framing Work',
                                                        'Siding Work',
                                                        'Plastering Work',
                                                        'Facade Work',
                                                        'Painting Work',
                                                        'Others',
                                                        'Landscaping Work',
                                                        // <INTERIOR WORK>
                                                        'Site Protection',
                                                        'Demolish Work',
                                                        'Extension Work',
                                                        'Partition Work',
                                                        'Floor Finishes ',
                                                        'Wiring & Electrical',
                                                        'Wall Finishes',
                                                        'Ceiling Finishes',
                                                        'Carpentry Work',
                                                        'Aluminium & Glass', 
                                                        'Steel Work',
                                                        'Plumbing',
                                                        'Furnishing & Decoration',
                                                        'Cleaning',
                                                        'Others:'
                                                    );
                                                    $arrScope = explode("|", $dailylog[0]['scope']);
                                                    foreach ($arrScope as $scope) { ?>
                                                        <li><?php echo $list_scope[(int)$scope] ?></li>
                                                    <?php } ?>
                                                    <li>Others : <?php echo isset($dailylog[0]['other_scope'])?  $dailylog[0]['other_scope'] : 'None'; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="update-border">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Update:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['update'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pending-border">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Pending:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['pending'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="issue-border">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Issue:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $dailylog[0]['issue'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5>Info:</h5>
                                            </div>
                                            <div class="row">
                                                <p><?php //echo $dailylog[0]['info'] 
                                                    ?></p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex flex-row">
                                        <div class="Loa">
                                        <div class="p-2">
                                            <h5>List of Attachment(s) with Description</h5>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php $i = 1;
                                    foreach ($dailylog_files_description as $dfDesc) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border border-secondary">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        Description:
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p><?php echo $dfDesc['description_name'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        Image:
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <?php foreach ($dailylog_files as $df) { ?>
                                                                                <?php if ($df['description_id'] == $dfDesc['dailylog_files_description_id']) { ?>
                                                                                    <div class="col-sm-2">
                                                                                        <a href="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                                                                            <img src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" class="img-thumbnail cropped-ofp">
                                                                                        </a>
                                                                                    </div>
                                                                                    <!-- <img src="<?php echo base_url() ?>uploads/<?php echo $df['file_name'] ?>" alt=""> -->
                                                                            <?php }
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- <div class="col-md-8">
                                            <div class="card">
                                                    <div class="card-header">
                                                    
                                                <div class="col-md-6">
                                                    <label for="">Comment<font color="red">*</font>:</label>
                                                    <div class="col-md-12">
                                                    <textarea placeholder="Enter update" name="update" rows="5" class="form-control" required></textarea>

                                                    </div>
                                </div>
                                </div>
                                </div>
                                
                                </div> -->
                                <div class="card bg-light mb-3">
                                    <div class="card-header">
                                        <h3>Comment</h3>
                                        
                                    </div>
                                    <div class="card-body">
                                    <div class="form-group row">
                                                <!-- <div class="col-12"> -->
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <!-- <label class="col-form-label">Enter comment</label> -->
                                                            <div class="col-12">
                                                               
                                                               <textarea placeholder="Enter Comment" name="update" rows="5" class="form-control" required></textarea>
                                                               <?php if($this->session->userdata('role') == 1){?>
                                                               <button value="accept" class="btn btn-success accept">Accept</button>
                                                               <button value="decline" class="btn btn-danger decline">Decline</button>
                                                               <div class="card-header">
                                                               <h6> Notes:</h6> <h6>Once Daily Log is Accepted. It will be sent to Client.</h6>
                                                               <h6> If Daily Log is Decline. It will be sent back to Person In Charge</h6>
                                                                </div>
                                                               <?php } ?>
                                                               <?php if($this->session->userdata('role') == 4){?>
                                                               <button type="Submit" class="btn btn-success">Submit</button>
                                                               <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="w3-section">
                                                    <button class="btn btn-primary print" id="printButton" >Print <i class='fas fa-print'></i></button>
                                      </div>
                                                </div>
                                            </div>
                                            <!--button id="printButton">Print</button-->
                                            <!--button onclick="printPage()">Print This Page</button-->
                                        </div>
                                        <div class="footer">Rnexpro.com</div>
                                    </section>
                                </div>
                                    
                                <script>
                                    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                                        event.preventDefault();
                                        $(this).ekkoLightbox();
                                    });
                                </script>
                                <script src="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
                                <script src="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.js"></script>
                                <!-- PRINT FUNCTION / STYLE -->
                                <script>
                                
                                const printBtn = document.getElementById('printButton');
                                
                                printBtn.addEventListener('click', function() {
                                    print();
                                })
                                
                                </script>
                                