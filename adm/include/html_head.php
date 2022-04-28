<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo strCompanyName; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet"
          href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
          href="dist/css/app.min.css">
    <link rel="stylesheet"
          href="plugins/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet"
          href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet"
          href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
          href="dist/css/custom.css">

    <!--[if lt IE 9]>
    <script type="text/javascript"
            src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js?v=1.0"></script>
    <script type="text/javascript"
            src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js?v=1.0"></script>
    <![endif]-->
    <script type="text/javascript"
            src="plugins/jQuery/jquery-2.2.3.min.js?v=1.0"></script>
    <script type="text/javascript"
            src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js?v=1.0"></script>
    <script type="text/javascript"
            src="bootstrap/js/bootstrap.min.js?v=1.0"></script>
    <script type="text/javascript"
            src="plugins/jquery-validate/jquery.validate.min.js?v=1.0"></script>
<!--
    <link rel="stylesheet"
          href="plugins/datatables/dataTables.bootstrap.css">
    <script type="text/javascript"
            src="plugins/datatables/jquery.dataTables.js?v=1.0"></script>-->


    <link rel="stylesheet"
          type="text/css"
          href="plugins/DataTables-1.10.12/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet"
          type="text/css"
          href="plugins/DataTables-1.10.12/media/css/dataTables.bootstrap.min.css">
    <script type="text/javascript"
            src="plugins/DataTables-1.10.12/media/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript"
            src="plugins/DataTables-1.10.12/media/js/dataTables.bootstrap.min.js">
    </script>
    <link rel="stylesheet"
          type="text/css"
          href="plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"/>
    <script type="text/javascript"
            src="plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js">
    </script>



    <script type="text/javascript"
            src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables-colvis/1.1.2/js/dataTables.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>

    <script type="text/javascript"
            src="plugins/datepicker/bootstrap-datepicker.js?v=1.0"></script>
    <script type="text/javascript"
            src="plugins/notify.js/notify.min.js?v=1.0"></script>
    <script type="text/javascript"
            src="plugins/sweetalert/sweetalert2.min.js?v=1.0"></script>

    <script type="text/javascript"
            src="js/content_protect.js?v=1.0"></script>
    <script type="text/javascript"
            src='plugins/jquery.playSound/jquery.playSound.js'></script>
    <script type="text/javascript">
        $(function() {
            $('body').smartcontentprotector({
                enableprotect: false
            });
        });
        function toEnglish(input) {
            return input;
        }
        function toBangla(str) {
            return str;
        }
        var moneyKeyPress = function(k) {
            return k > 47 && k < 58 || k == 44 || k == 46 || k == 0 || k == 8 || k == 9 || k == 37 || k == 39;
        }
    </script>
</head>