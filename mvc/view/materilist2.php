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

<div class="content-main--basic" id="content">
              
              <div class="">
                

<form action="" method="POST" id="main_form">
<input type="hidden" name="act" id="act">
<input name="keyword" id="keyword"  type="hidden" value="<?=$keyword?>">
<div class="faceted-search js-faceted-search" data-view="pjaxFacetedSearch">
  <div class="grid-container">



 



  <div class="sidebar-s -size-fixed-tablet is-hidden-phone">
      <form accept-charset="UTF-8" action="/search" class="js-facet-form" data-pjax="" data-view="facetingControls" id="searchFacets" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
  <!--
     <div class="is-hidden--no-js search-facet-horizontal-form -border-bottom" data-view="searchFacetHorizontalForm">

<div class="inline-select-wrapper">
  <div class="-border-top-none -border-radius-none inline-select">
    <select class="js-search-facet-sort-by" data-pjax="" id="sort_horizontal" name="sort_horizontal">
    <option selected="selected" value="">Urukan : nama</option>
    <option selected="selected" value="">Urukan : tanggal</option>
    <option selected="selected" value="">Urukan : jumlah</option>
    </select>
  </div>
</div>

  

    
</div>-->

  <div class="search-facet-panel" data-view="searchFacetPanel">

<div class="search-facet">
<div class="search-facet-actives__remove-all">
      <b>Matapelajaran:</b>
    </div>

  <div class="search-facet-actives__facet-wrapper">
    <ul class="search-facet-actives__facet-categories-list">
    <?php foreach($listmatapelajaran as $k=>$v){ ?>
      <li>
        <div class="search-facet-actives__facet">
        <label class="search-facet-actives__text" for="matapelajaran<?=$k?>">
          <input type="checkbox" name="list_filter[id_matapelajaran][]" 
          id="matapelajaran<?=$k?>" 
          <?=((is_array($list_filter['id_matapelajaran'])&&in_array($k, $list_filter['id_matapelajaran'])?'checked':''))?> 
          onclick="goFilter()" 
          value="<?=$k?>"/>&nbsp;<?=$v?>
        </label>     
        </div>
      </li>
      <?php }?>
    </ul>

  </div>
</div>
  </div>


</form>
  







  </div>





  <div class="content-l -size-scale-tablet content-right">


        <div data-view="productList">

  <ul class="product-list" data-view="bookmarkStatesLoader">
<?php foreach ($list['rows'] as $row) { ?>
<li class="js-google-analytics__list-event-container" data-item-id="<?=$row['id_materi']?>">
          <h3 class="product-list__heading">
          
              <a href="<?=$url=URL::Base('materi/detail/'.$row['id_materi'])?>" title="<?=$row['nama']?>" class="js-google-analytics__list-event-trigger t-link -color-inherit -decoration-reversed">
                <?=$row['nama']?>
              </a>
          </h3>
          <br/>
             
            <?=ReadMore($row['isi'],$url)?>
          <br/>
</li>
<?php }?>

  </ul>



</div>

<nav class="js-pagination pagination">
  <?=UI::showPagingCms($paging,$page, $limit_arr,$limit,$list)?>
</nav>



      
  </div>
    
</div>
</div>
</form>
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