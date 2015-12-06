<div class="js-search-header page-section -theme-themeforest -size-xcompact">
  <div data-view="searchBar" data-facet-id="searchFacets">
      <div class="h-padding">
        <form class="huge-search--search-home" method="GET" onsubmit="return goFilter1()">
          <input name="term" placeholder="search..." type="search" id="keywordtemp" value="<?=$keyword?>">
          <button type="button" onclick="goFilter1()"><span class="e-icon__alt">Search</span></button>
        </form>
      </div>

    <div class="search-header__results-count">
        Ditemukan <?=$total_rows?>
        <h1>materi</h1>
    </div>

  </div>
</div>

<form action="" method="POST" id="main_form">
<input type="hidden" name="act" id="act">
<input name="keyword" id="keyword"  type="hidden" value="<?=$keyword?>">

<div class="content-main--basic" id="content">
              
              <div class="">
                


<div class="page-section">
  <div class="grid-container">
    <aside class="sidebar-l">
    <h3 class="t-heading -size-m">Mata Pelajaran</h3>
      <ul class="side-tabs">
    <?php foreach($listmatapelajaran as $k=>$v){ ?>
  <li>
    <a href="#"  <?=((is_array($list_filter['id_matapelajaran'])&&in_array($k, $list_filter['id_matapelajaran'])?'class="active" onclick="$(\'#matapelajaran'.$k.'\').click();"':'onclick="$(\'#matapelajaran'.$k.'\').click(); $(\'#matapelajaran'.$k.'\').removeAttr(\'checked\');"'))?> >
      <input type="checkbox" name="list_filter[id_matapelajaran][]" 
          id="matapelajaran<?=$k?>" 
          <?=((is_array($list_filter['id_matapelajaran'])&&in_array($k, $list_filter['id_matapelajaran'])?'checked':''))?> 
          onclick="goFilter()" 
          value="<?=$k?>"/>
         <?=$v?>
    </a>
  </li>
  <li>
  <?php }?>
</ul>


    </aside>

    <div class="content-s t-body">
<?php foreach ($list['rows'] as $row) { ?>
      <section class="h-spacing-below">
        <h2 class="t-heading -size-m">
<a href="<?=$url=URL::Base('materi/detail/'.$row['id_materi'])?>" title="<?=$row['nama']?>" class="js-google-analytics__list-event-trigger t-link -color-inherit -decoration-reversed">
                <?=$row['nama']?>
              </a>
        </h2>
        <p class="t-body">
            <?=ReadMore($row['isi'],$url)?>
        </p>
      </section>
<?php }?>
    <nav class="js-pagination pagination">
  <?=UI::showPagingCms($paging,$page, $limit_arr,$limit,$list)?>
</nav>
    </div>
  </div>
</div>

              </div>
            </div>


</form>
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
<script>
  function goFilter(){
    $("#act").val("list_filter");
    $("#main_form").submit();
  }

  function goFilter1(){
    $("#keyword").val($("#keywordtemp").val());
    $("#act").val("search");
    $("#main_form").submit();
    return false;
  }
</script>