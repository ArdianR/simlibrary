<div class="context-header ">
	<div class="grid-container">
		<nav class="breadcrumbs ">
			<a href="<?=URL::Base()?>">Home</a>
			<a href="#"><?=$row['nama']?></a>
		</nav>
		<div class="context-header__heading h-pull-left">
			<h1 class="t-heading -color-inherit -size-l h-remove-margin">    
				<?=$row['nama']?>
			</h1>
		</div>
		<div class="page-title__result-count h-pull-left">
		</div>
		<div class="h-clear"></div>
	</div>
</div>


<div class="content-main--basic" id="content">
	<div class="">
		<div class="page-section">
			<div class="grid-container">
				<div class="content">
					<section class="h-spacing-below">
						<?=$row['isi'],$url?>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>