<div class="context-header ">
	<div class="grid-container">
		<nav class="breadcrumbs ">
			<a href="<?=URL::Base()?>">Home</a>
			<a href="#"><?=$page_title?></a>
		</nav>
		<div class="context-header__heading h-pull-left">
			<h1 class="t-heading -color-inherit -size-l h-remove-margin">    
				<?=$page_title?>
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
				<div class="content t-body">
					<?php
					foreach($list['rows'] as $rows){
						$title = str_replace(" ", "-", $rows['nama']).'.html';
					?>
					<h3 class="t-heading -size-m">
          
							<a href="<?=($url=URL::Base("page/detail/{$add_param}/$rows[$pk]/$title"))?>" title="<?=$rows['nama']?>" class="js-google-analytics__list-event-trigger t-link -color-inherit -decoration-reversed">
								<?=$rows['nama']?>
							</a>
					</h3>
			        <p class="t-body">
			            <?=ReadMore($rows['isi'],$url)?>
			        </p>
					<?php }?>
				</div>
<nav class="js-pagination pagination">
  <?=UI::showPagingCms($paging,$page, $limit_arr,$limit,$list)?>
</nav>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$("#main_form").submit(function(){
			if($("#act").val()==''){
				$("#act").val('search');
			}
		});
	})
</script>

<style>
	.text img{
		max-width: 100px;
		height: auto;
		float: left;
		padding: 10px;
		margin: 10px;
	}
</style>