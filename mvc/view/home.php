
						<section class="page-section -theme-themeforest">
							<div class="grid-container">
								<div class="h-text-align-center">
									<h3 class="t-heading -color-light is-hidden-phone">
									Masukkan kata kunci pencarian materi
									</h3>

										<div class="home-search__search">
											<form accept-charset="UTF-8" action="<?=URL::Base('materi/index')?>" class="search-field -size-xl -border-none" id="search" method="post">
												
<input type="hidden" name="act" id="act" value='search'>
												<div class="search-field__input">
													<input class="js-term search-field__input-field" name="keyword" placeholder="Ketikkan kata pencarian" type="search">
												</div>
												<button class="search-field__button" type="submit">
													<i class="e-icon -icon-search"><span class="e-icon__alt">Search</span></i>
												</button>

											</form>
										</div>
								</div>
							</div>
						</section>



<section class="page-section -color-white -border-bottom">
  <div class="grid-container">
    <div class="home-section">
      <div class="get-hosting__heading">
    <h1>Jadwal Ujian</h1>
    <h4>Berikut adalah jadwal ujian yang akan datang atau sedang berlangsung : </h4>
  </div>
<table class="table-general -width-three-col-equal -bordered-v -comparison-table h-spacing-above h-spacing-below">
      <thead>
        <tr>
          <th>Nama Ujian</th>
          <th width="50">Matapelajaran</th>
          <th>Waktu</th>
        </tr>
      </thead>
      <tbody>
      <?php if(count($ujian_live)){
        foreach($ujian_live as $row){ ?>
        <tr>
          <td style="font-size: 14px;text-align:left"><?=$row['nama']?></td>
          <td style="font-size: 14px;text-align:left;width:50px" width="50"><?=$row['matapelajaran']?></td>
          <td style="font-size: 14px;text-align:left"><?=Eng2Ind($row['waktu_mulai'])?> sd <br/> <?=Eng2Ind($row['waktu_selesai'])?></td>
        </tr>
        <?php } }else{ ?>
        <tr>
          <td colspan="3">Tidak ada jadwal</td>
        </tr>
        <?php }?>
      </tbody>
    </table>


    </div>
  </div>
</section>

<section class="page-section -color-grey -border-bottom">
  <div class="grid-container">
    <div class="home-section">
      <div class="get-hosting__heading">
    <h1>Materi Terbaru</h1>
    <h4>Silahkan nikmati materi-materi terbaru</h4>
  </div>
  <br/>
      <div style="clear:both"></div>
      <div class="home-section__item-thumbnail-carousel">
        <div data-view="productList t-body">
        <ul>
          <?php foreach($materi_new as $row){ ?>
          <li class="materi-list">
            <h2 class="t-heading -size-s">
            <i class="e-icon -icon-folder"></i>
              <a href="<?=$url=URL::Base('materi/detail/'.$row['id_materi'])?>" title="<?=$row['nama']?>" class="js-google-analytics__list-event-trigger t-link -color-inherit -decoration-reversed">
                    <?=$row['nama']?>
              </a>
            </h2>
          </li>
          <?php }?>
          </ul>
      <div style="clear:both"></div>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="page-section -color-white -border-bottom">
  <div class="grid-container">
    <div class="home-section">
    <div class="home-section">
      <div class="get-hosting__heading">
    <h1>Artikel atau Berita Terbaru</h1>
    <h4>Artikel menarik yang selalu terupdate</h4>
  </div>
  <br/>
      <div style="clear:both"></div>
      <div class="home-section__item-thumbnail-carousel">
        <div data-view="productList">
          <?php foreach($artikel_new as $rows){ 
            $title = str_replace(" ", "-", $rows['nama']).'.html';
          ?>
          <section class="h-spacing-below">
            <h2 class="t-heading -size-s">
              <a href="<?=($url=URL::Base("page/detail/artikel/$rows[$pk]/$title"))?>" title="<?=$rows['nama']?>" class="js-google-analytics__list-event-trigger t-link -color-inherit -decoration-reversed">
                <?=$rows['nama']?> </a>
            </h2>
          <div style="clear:both"></div>
             
            <?=ReadMorePlain($rows['isi'],50)?>
          <br/>

          <?php }?>

        </div>
      </div>
    </div>
  </div>
</section>
<style>
.materi-list{
  float:left; width:100%; max-width:450px
}
</style>