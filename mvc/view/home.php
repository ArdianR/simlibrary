
						<section class="page-section -theme-themeforest">
							<div class="grid-container">
								<div class="h-text-align-center">
									<h3 class="t-heading -color-light is-hidden-phone">
									Masukkan kata kunci pencarian
									</h3>

										<div class="home-search__search">
											<form accept-charset="UTF-8" action="http://themeforest.net/search" class="search-field -size-xl -border-none" id="search" method="get">
												
												<div class="search-field__input">
													<input class="js-term search-field__input-field" name="term" placeholder="Ketikkan kata pencarian" type="search">
												</div>
												<button class="search-field__button" type="submit">
													<i class="e-icon -icon-search"><span class="e-icon__alt">Search</span></i>
												</button>

											</form>
										</div>
								</div>
							</div>
						</section>
<section class="page-section -color-grey -border-bottom">
  <div class="grid-container">
    <div class="home-section">
      <div class="home-section__header">
        <h2 class="t-heading -size-l -margin-none">Buku Terbaru</h2>
        <p class="t-body">Silahkan nikmati buku-buku terbaru dari kami</p>
      </div>


      <div class="home-section__item-thumbnail-carousel">
        <div data-view="productList">
          <ul class="item-thumbnail-carousel--row-10 overthrow">
          <?php foreach($book_new as $row){ ?>
                <li>
                  
<div class="item-thumbnail__image">
    <a href="<?=URL::Base('katalog/buku_detail/'.$row['id_buku'])?>" >
    <div class="crop">
    <img alt="<?=$row['nama']?>" border="0" class="landscape-image-magnifier preload no_preview" 
     src="<?=URL::Base('katalog/preview_file/'.$row['id_buku'])?>" title="" style="width:143px">
     </div>
     </a>

    <h4 class="t-heading -size-xs">
    <a href="<?=URL::Base('katalog/buku_detail/'.$row['id_buku'])?>" class="t-link -decoration-reversed -color-dark">
    <?=$row['nama']?>
    </a>
    </h4>
</div>
                </li>



          <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="page-section -color-white -border-bottom">
  <div class="grid-container">
    <div class="home-section">
      <div class="home-section__header">
        <h2 class="t-heading -size-l -margin-none">Buku Terlaris</h2>
        <p class="t-body">Buku-buku yang banyak diminati oleh pengunjung</p>
      </div>

      <div class="home-section__item-thumbnail-carousel">
        <div data-view="productList">
          <ul class="item-thumbnail-carousel--row-10 overthrow">
          <?php foreach($best_book as $row){ ?>
                <li>
                  
<div class="item-thumbnail__image">
    <a href="<?=URL::Base('katalog/buku_detail/'.$row['id_buku'])?>" >
    <div class="crop">
    <img alt="<?=$row['nama']?>" border="0" class="landscape-image-magnifier preload no_preview" 
     src="<?=URL::Base('katalog/preview_file/'.$row['id_buku'])?>" title="" style="width:143px">
     </div>
     </a>

    <h4 class="t-heading -size-xs">
    <a href="<?=URL::Base('katalog/buku_detail/'.$row['id_buku'])?>" class="t-link -decoration-reversed -color-dark">
    <?=$row['nama']?>
    </a>
    </h4>
</div>
                </li>



          <?php }?>
          </ul>

        </div>
      </div>
    </div>
  </div>
</section>
