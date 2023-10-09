<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>node_modules/print-js/dist/print.css">
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/frappe-gantt/dist/frappe-gantt.css">
    <style>
        .overlay {
            display: none;
            position: fixed;
            align: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background-position: center;
            background: rgba(255, 255, 255, 0.8) url("<?= base_url() ?>plugins/audio/YCZH.gif") center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }

        .target {
            font-weight: bold;
            color: #fbfbfb;
            animation-name: rightToLeft;
            animation-duration: 20s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            /* animation: rightToLeft 4.5s linear infinite; */
        }
    </style>
    <style>
        #job_name_display {
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
        }

        #job_name_label {
            padding: 10px;
        }

        #job_name_display_add {
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
        }

        #job_name_display_add {
            padding: 10px;
        }

        /* .dz-message {
            border: 1px solid black;
            border-color: #ccc !important;
            border-radius: 5px !important;
        } */
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RnexPro</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/RexinProSoft_logo_16x16.jpeg">
    <!-- tui calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

    <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>RexinProSoft_logo.jpeg"> -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/summernote/summernote-bs4.min.css">
    <!-- datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!-- tui calendar -->
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- carousel image-->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fg-gallery/css/gallery.css">
    <link href="<?= base_url() ?>plugins/select2/css/select2.min.css" rel="stylesheet" />
    <!-- dropzone js -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<audio id="notice" src="<?= base_url() ?>plugins/audio/notice.mp3" preload="auto"></audio>
<audio id="success" src="<?= base_url() ?>plugins/audio/success.mp3" preload="auto"></audio>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="overlay"></div>
    <div class="wrapper">