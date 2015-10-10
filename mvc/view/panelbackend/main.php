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
    <style>
    .page-header {
    padding-bottom: 9px;
    margin: 20px 0 20px;
    border-bottom: 1px solid #eee;
    }
    </style>
    <!-- MetisMenu CSS -->
    <link href="<?=URL::Base()?>assets/template/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?=URL::Base()?>assets/template/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=URL::Base()?>assets/template/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=URL::Base()?>assets/template/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=URL::Base()?>assets/template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?=URL::Base()?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=URL::Base()?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=URL::Base()?>assets/template/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=URL::Base()?>assets/template/dist/js/sb-admin-2.js"></script>

    <?=$add_plugin?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          <a class="navbar-brand" href="<?=URL::Base()?>"><?=Config::Title()?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->

                <?php if($_SESSION[SESSION_APP]['is_admin']!=true){ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;<?=$_SESSION[SESSION_APP]['nama']?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=URL::Base("panelbackend/home/profile_user")?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=URL::Base("panelbackend/login/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <?php }else{ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;<?=$_SESSION[SESSION_APP]['name']?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=URL::Base("panelbackend/home/profile")?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=URL::Base("panelbackend/login/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <?php }?>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <!-- EDIT MENU -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <?php if($_SESSION[SESSION_APP]['is_admin']!=true){ ?>

                    <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?=URL::Base("panelbackend/home")?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bookmark fa-fw"></i> Pustaka <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?=URL::Base("panelbackend/buku")?>"><i class="fa fa-book fa-fw"></i> Buku</a>
                            </li>
                             <li>
                                <a href="<?=URL::Base("panelbackend/lokasi")?>"><i class="fa fa-building fa-fw"></i> Lokasi Buku</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Pengunjung <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li>
                                <a href="<?=URL::Base("panelbackend/member")?>"><i class="fa fa-user fa-fw"></i> Member</a>
                            </li>
                            <li>
                                <a href="<?=URL::Base("panelbackend/pinjam")?>"><i class="fa fa-credit-card fa-fw"></i> Peminjaman</a>
                            </li>
                        </ul>
                    </li>
                    </ul>
                <?php }else{ ?>
                    <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?=URL::Base("panelbackend/home")?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bookmark fa-fw"></i> Pustaka <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?=URL::Base("panelbackend/buku")?>"><i class="fa fa-book fa-fw"></i> Buku</a>
                            </li>
                             <li>
                                <a href="<?=URL::Base("panelbackend/kategori")?>"><i class="fa fa-tag fa-fw"></i> Kategori Buku</a>
                            </li>
                             <li>
                                <a href="<?=URL::Base("panelbackend/lokasi")?>"><i class="fa fa-building fa-fw"></i> Lokasi Buku</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Pengunjung <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li>
                                <a href="<?=URL::Base("panelbackend/member")?>"><i class="fa fa-user fa-fw"></i> Member</a>
                            </li>
                            <li>
                                <a href="<?=URL::Base("panelbackend/pinjam")?>"><i class="fa fa-credit-card fa-fw"></i> Peminjaman</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?=URL::Base("panelbackend/petugas")?>"><i class="fa fa-user fa-fw"></i> Petugas</a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Halaman-halaman<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php $this->auth->GetMenuCms();?>
                        </ul>
                    </li>
                    <li><a href="<?=URL::Base("panelbackend/testimoni")?>"><i class="fa fa-comment fa-fw"></i> Testimoni</a></li>
                    
                    </ul>
                <?php } ?>
                </div><!--/.nav-collapse -->
            </div>
            <!-- END EDIT MENU -->
        </nav>

  
    <form method="post" enctype="multipart/form-data" id="main_form">
    <input type="hidden" name="act" id="act" />
    <?php echo $content;?>
    </form>
    

    </div>
    <!-- /#wrapper -->
   <!-- /container -->
</body>

</html>
    <script src="<?=URL::Base()?>assets/js/tinymce/tinymce.min.js"></script>
    <script src="<?=URL::Base()?>assets/js/cms.js"></script>
  
<script>
var editor = function(select, options){
    var init = $.extend(true,{
        selector: select,
        theme: "modern",
        relative_urls : false,
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code media",
            "table contextmenu directionality emoticons template textcolor paste textcolor filemanager"
        ],
        add_unload_trigger: false,
        autosave_ask_before_unload: false,
        image_advtab: true, 
        toolbar1: "bold italic underline strikethrough  alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent blockquote removeformat | searchreplace | undo redo | link unlink anchor image media code | preview | forecolor backcolor | table | hr | subscript superscript | charmap emoticons | print | ltr rtl | spellchecker | visualchars visualblocks template pagebreak restoredraft | insertfile insertimage | formatselect fontselect fontsizeselect",
        menubar: false,
        toolbar_items_size: 'small',
        templates: [
            {title: '-pilih-', description: 'Pilihan Kosong', content: '(kosong)'},
            <?php foreach($tamplate as $row){ ?>
            {title: '<?=$row['nama']?>', description: '', url: '<?=URL::Base()."panelbackend/template_contents/template/{$row['template_contents_id']}"?>'}
            <?php }?>
        ]
    },options);
    tinymce.init(init);
};