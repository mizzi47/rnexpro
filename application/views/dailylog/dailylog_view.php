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

    /* .logo-print {
        display: none;
    } */

    /* @page {
  margin: 1in; 
}

    @page :first {
  margin-top: 2in; 
} */
    


    @media print {


        @page {
               margin-top: 2.0cm;
               margin-bottom: 2.0cm;
            }
       /* @page {
            margin: 2.0cm;
        } */

        body {
            margin-top: 38px;
        }

        button {
            display: none;
        }

        .details-header {
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
            width: 105px; /* You can adjust the width as needed */
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
            border-top: 0.5px solid;
            border-right: 0.5px solid;
            border-bottom: 0.5px solid;
            border-left: 0.5px solid;
        }


        .update-border {
            border-right: 0.5px solid;
            /* border-top: 0.5px solid; */
            border-left: 0.5px solid;
            border-bottom: 0.5px solid; 
                  /*border-radius: 5px;*/  /*round border*/
                  /*padding: 5px;*/
                 }

        .pending-border {
            /*border: 0.5px solid;*/
            /*border-top: 0.5px solid;*/
            border-right: 0.5px solid;
            border-bottom: 0.5px solid;
            border-left: 0.5px solid; 
        }

        .issue-border {
            border-right: 0.5px solid;
            border-bottom: 0.5px solid;
            border-left: 0.5px solid; 
            margin-bottom: 0.8cm;
        }

        .header-print {
            display: block;
            text-align: center;
            margin-bottom: 40px;
            font-size: 300px;

           /* position: absolute;
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            margin-bottom: 40px;*/
        }

        /* .logo-print {
            display: block;
            text-align: center;
            padding-bottom: 20px;
        } */

        .border-secondary {
            page-break-inside: avoid;
        }

        .Loa {
            margin-bottom: 0;
        }

        /* .h1 {
            font-size: 300px;
        } */


    }



</style>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>plugins/ekko-lightbox/ekko-lightbox.css">
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
                                    <!-- <div class="logo-print">
                                    <img src="https://renovation.wallmaster.com.my/wp-content/uploads/2019/11/LOGO-WALLMASTER-2019.png" style="width: 450px;height: 70px;" alt="logo">
                                    </div> -->
                                    <div class="header-print">
                                            <h1><b>PROJECT PROGRESS REPORT</b></h1>
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
                                                        'Wet Work',
                                                        'Ceiling',
                                                        'Wiring',
                                                        'Wall Finishes',
                                                        'Floor Finishes',
                                                        'Carpentry Finishes',
                                                        'Steel/aluminium Finishes',
                                                        'Others',
                                                        'Plumbing Works'
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
                </div>
            </div>
            <button id="printButton" style='font-size: 22px'>Print <i class='fas fa-print'></i></button>
            <!--button id="printButton">Print</button-->
            <!--button onclick="printPage()">Print This Page</button-->
        </div>
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
<!--script>
    function printPage() {
        window.print();
    }
</script-->

<!--style>
    @media print {
        button {
            display: none;
        }
    }
</style-->