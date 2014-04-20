<div id="video-list">
      <div class="container">
         
<?
	$i=0;
	foreach ($arResult['SECTIONS'] as $item) {
		if($i%3==0)	{
			if($i!=0) echo "</div>";
			echo '<div class="row">';
		}
		?>
			<div class="col-md-4">
               <a href="/doctors/video-item.html" class="item">
                  <span class="image" style="background-image:url(<?=$item['PICTURE']['SRC']?>)">
                     <span class="icon"></span>
                  </span>
                  <span class="title">
                     <?=$item['NAME']?>
                  </span>
                  <span class="description">
                     <?=$item['DESCRIPTION']?>
                  </span>
               </a>
            </div>
		<?
	}
?>
</div>

		
      </div>
   </div>