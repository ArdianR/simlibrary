<html class="  js flexbox no-touch cssanimations audio localstorage svg cors placeholder xhr2 overthrow-enabled" lang="en"><!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">

		<title><?=Config::Title($page_title)?></title>

		<meta content="The #1 marketplace for premium website templates, including themes for WordPress, Magento, Drupal, Joomla, and more.  Create a website, fast." name="description">

		<meta name="viewport" content="width=device-width,initial-scale=1">

		<link href="<?=URL::Base("assets/cms/template")?>/index-c7d9236d6d7a2a71be56e6f30caeac24.css" media="all" rel="stylesheet" type="text/css">
		<link href="<?=URL::Base("assets/cms/template")?>/index-0bbf701da4f85ab51d3137c19e5337aa.css" media="all" rel="stylesheet" type="text/css">
		<link href="<?=URL::Base("assets/cms/template")?>/index-f3bedd13efd1437bc5463d0cfcb5446c.css" media="all" rel="stylesheet" type="text/css">
		<script src="<?=URL::Base("assets/cms/template")?>/head-f0efac1d6976fdf77355672935951571.js" type="text/javascript"></script>
	</head>
	<body id="" class="" data-view="app" data-responsive="true" data-user-signed-in="false">
    
    <!--[if lte IE 8]>
  <div style="color:#fff;background:#f00;padding:20px;text-align:center;">
    ThemeForest no longer actively supports this version of Internet Explorer. We suggest that you <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" style="color:#fff;text-decoration:underline;">upgrade to a newer version</a> or <a href="http://browsehappy.com/" style="color:#fff;text-decoration:underline;">try a different browser</a>.
  </div>
<![endif]-->


<div class="page">
	<div class="page__off-canvas--left overthrow">
		<div class="off-canvas-left js-off-canvas-left">
			<!--<ul>
				<li>
				<a href="http://themeforest.net/page/top_sellers" class="off-canvas-category-link--empty">Home</a>
				</li>
				<li>
				<a href="http://themeforest.net/feature" class="off-canvas-category-link--empty">Katalog</a>
				</li>
				<li>
				<a href="http://themeforest.net/search?date=this-month&length_max=&length_min=&price_max=&price_min=&rating_min=&sales=&sort=sales&term=&utf8=%E2%9C%93&view=list" class="off-canvas-category-link--empty">Tentang Kami</a>
				</li>
				<li>
				<a href="http://themeforest.net/follow_feed" class="off-canvas-category-link--empty">Kontak Kami</a>
				</li>
			</ul>-->
			<?php $this->front->GetMenuMobile(); ?>
		</div>
	</div>

	<div class="page__canvas">
		<div class="canvas">
			<div class="canvas__header">
				<header class="site-header">
					<div class="site-header__mini is-hidden-desktop">
						<div class="header-mini">
							
							<div class="header-mini__button--categories">
								<a href="http://themeforest.net/#categories" class="btn btn--square" data-off-canvas="left" data-view="offCanvasNavToggle">
									<i class="e-icon -icon-hamburger"></i>
									<span class="is-hidden">Sites, Search &amp; Categories</span>
								</a>  
							</div>

							<div class="header-mini__logo">
							<a href="http://themeforest.net/?osr=tn" class="header-mini__logo--themeforest">ThemeForest</a>
							</div>
						</div>

					</div>

					<div class="site-header__logo-and-account is-hidden-tablet-and-below">
						<div class="header-logo-account">
							<div class="grid-container">
								<div class="header-logo-account__container">
									<a class="header-logo-account__logo" href="http://market.envato.com/">
										<span>Envato Market</span>
									</a>    
									<nav class="header-logo-account__right">
										<!--<ul class="nav nav-tabs nav-stacked main-menu">
											<li class="header-logo-account__sundry-item">
											<a href="https://studio.envato.com/?utm_source=marketplaces&utm_medium=themeforest&utm_campaign=internal%20navigation&utm_content=headernav" class="header-logo-account__sundry-main-link--brand-color -rounded-corners" target="_blank">Home</a>
											</li>
											<li class="header-logo-account__sundry-item">
											<a href="http://themeforest.net/become_an_author" class="header-logo-account__sundry-main-link -rounded-corners" target="_self">Katalog</a>
											</li>
											<li class="header-logo-account__sundry-item">
											<a href="https://forums.envato.com/" class="header-logo-account__sundry-main-link -rounded-corners" target="_self">Tentang Kami</a>
											</li>
											<li class="header-logo-account__sundry-item">
											<a href="<?=URL::Base("pagedetail/kontak")?>" class="header-logo-account__sundry-main-link -rounded-corners" target="_self">Kontak Kami</a>
											</li>
											<li class="header-logo-account__sundry-item">
											<a href="<?=URL::Base("panelbackend")?>" class="header-logo-account__sundry-main-link -rounded-corners" target="_self">Masuk</a>
											</li>
										</ul>  -->

										<?php $this->front->GetMenu(); ?> 
									</nav>
								</div>
							</div>
						</div>
					</div>
					
				</header>
			</div>

			<div class="js-canvas__body canvas__body">

				<div class="content-main--basic" id="content">

					<div class="">
					<!--<form method="post" class="search" enctype="multipart/form-data" id="main_form" >-->
					  	<?php $this->FlashMsg(); echo $content;?>
					<!--</form>-->
					</div>
				</div>



				<footer class="site-footer">
					<div class="site-footer__primary">
						<div class="footer-primary">
							<div class="grid-container">
								<p class="t-body h-remove-margin">
									<small>
									&copy; <?=date('Y')?> <a href="<?=URL::Base()?>" target="_blank">JM Library</a> 
									by 
									<a href="http://jasamultimedia.com/" title="Jasa Multimedia" target="_blank">jasamultimedia.com</a>
									</small>
								</p>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<div class="page__overlay" data-view="offCanvasNavToggle" data-off-canvas="close"></div>
	</div>
</div>

    

    <script src="<?=URL::Base("assets/cms/template")?>/index-eaa2a966a4822f1777f1dc601aae2760.js" type="text/javascript"></script>
    <script src="<?=URL::Base("assets/cms/template")?>/index-bd9c8bb621ca31bf58da2d719183761b.js" type="text/javascript"></script>




    <script>$(function(){viewloader.execute(Views);});</script>


</body></html>
