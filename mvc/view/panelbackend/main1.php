<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=Config::Title($page_title)?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=URL::Base()?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=URL::Base()?>assets/template/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=URL::Base()?>assets/template/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=URL::Base()?>assets/template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    <link href="<?=URL::Base()?>assets/css/styleadmin.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?=URL::Base()?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=URL::Base()?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=URL::Base()?>assets/js/jquery.countdown.min.js"></script>

    <?=$add_plugin?>
</head>

<body>
    <div>
        <div>
            <form method="post" enctype="multipart/form-data" id="main_form">
            <input type="hidden" name="act" id="act" />
            <?php echo $content;?>
            </form>
        </div>
    </div>
</body>
</html>
<style>
    .pageone-panel{
        margin-top:0%;
    }
.text-center {
    text-align: center;
    vertical-align: middle;
}
</style>