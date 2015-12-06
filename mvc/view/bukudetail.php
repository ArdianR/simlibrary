<div class="context-header ">
	<div class="grid-container">
		<nav class="breadcrumbs ">
			<a href="<?=URL::Base()?>">Home</a>
			<a href="<?=URL::Base('katalog')?>">Daftar Buku</a>
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
<div class="product-list__columns-container">
    <div class="product-list__column-detail">
      <div class="product-list__item-thumbnail">
        <div class="item-thumbnail">
          <div class="item-thumbnail__image">
            <a href="<?=URL::Base('katalog/detail/'.$row['id_buku'])?>" class="js-google-analytics__list-event-trigger">
            <div class="crop">
            <img alt="<?=$row['nama']?>" border="0" class="landscape-image-magnifier preload no_preview" 
           src="<?=URL::Base('katalog/preview_file/'.$row['id_buku'])?>" title="" style="width:143px">
           </div>
            </a>
            <div class="item-thumbnail__preview">
              <a href="<?=URL::Base('katalog/detail/'.$row['id_buku'])?>" target="_blank">Detail</a>
            </div>
          </div>
        </div>
      </div>


    </div>

    <div class="product-list__column-category">
      <div class="product-list__adjacent-thumbnail">
        <h3 class="product-list__heading">
          <a href="<?=$url=URL::Base('katalog/detail/'.$row['id_buku'])?>" class="js-google-analytics__list-event-trigger t-link -color-inherit -decoration-reversed"><?=$row['nama']?></a>
        </h3>
      </div>
      <div style="clear:both"></div>
      <p class="t-body -size-s h-remove-margin">
        <span class="meta-categories -no-slash">
        <table>
          <tr>
            <td>Kategori</td>
            <td>: <a href="<?=URL::Base("katalog/set_kategori/{$row['id_kategori']}")?>"><?=$listkategori[$row['id_kategori']]?></a></td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td>: <?=$row['lokasi']?></td>
          </tr>
          <tr>
            <td>ISBN</td>
            <td>: <?=$row['isbn']?></td>
          </tr>
          <tr>
            <td>Penulis</td>
            <td>: <?=$row['penulis']?></td>
          </tr>
          <tr>
            <td>Penerbit</td>
            <td>: <?=$row['penerbit']?></td>
          </tr>
        </table>
         
        </span>

        <br>
       <?=$row['deskripsi']?>
      </p>
    </div>
  </div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
  .inline-select>select{
    padding: 0 25px 0 0px;
  }
  .search-facet-actives__facet-categories-list>li+li {
padding-left: 0px;
}  
.search-facet-actives__facet-categories-list>li+li+li {
padding-left: 0px;
}
.search-facet-actives__facet-categories-list>li+li+li+li {
padding-left: 0px;
}
.product-list__column-detail {
width: 163px;
}
.product-list__column-category {
display: block;
margin: 0 20px;
width:auto;
padding: 5px;
padding-left: 20px;
max-width: 750px;
}
.item-thumbnail img {
display: block;
max-width: none;
}
.t-body.-size-s td{
font-size: 12px;
}
</style>