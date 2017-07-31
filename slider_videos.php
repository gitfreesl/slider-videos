  <script src="http://www.youtube.com/iframe_api"></script>  
  <script>
    VIDEO_ID = []; // array of videos
	VIDEO_PLAY_STATUS = false; // status current videos
	
    function onPlayerStateChange(event) { // change event current video
	  if((event.data == YT.PlayerState.ENDED || event.data == YT.PlayerState.PAUSED) && <?echo $COUNT_VIDEOS?> > 1){  // video stoped or paused
	    $('.arr-ring').show();   // show slider control
        VIDEO_PLAY_STATUS = false;		
	  }	
      else{  // video is playing
   	    $('.arr-ring').hide();  // hide slider control
		VIDEO_PLAY_STATUS = true;
      }		
    }
  </script>
  



  
<?if($COUNT_VIDEOS){?>	 
    
<div class="slider video">
	<div class="slider_head video_list">
		<ul>
		<? $CNT =0;
		   foreach($arResult["ITEMS"] as $arItem):?>
		       <li class="<?if(!$CNT) echo 'current';?>"><a href="" class="arr-ring video <?if($arResult["CNT_SLIDERS"]==1) echo 'hide';?>"><i class="arr"></i></a></li> <!-- if only one video then hide slider control-->
		<? $CNT++;
		   endforeach;?>
		</ul>		
	</div>
	<div class="slider_content">
  <? $CNT = 0;
     foreach($arResult["ITEMS"] as $arItem):?> <!-- create slider with names and descriptions videos --> 
	 
	    <div class="slider_content-item">      
		  <div class="youtube" id="youtube<?=$i?>" style=""></div> 
		   <script>
	        VIDEO_ID[<?echo $CNT?>] = '<?echo $arItem['DISPLAY_PROPERTIES']['VIDEO_ID']['VALUE']?>';
		  </script>	 
		   
		  <h2 class="">video —  <?=$arItem["NAME"]; ?></h2>
		  <?=$arItem["DETAIL_TEXT"]; ?>
	     </div>	
  <? $CNT ++;
     endforeach;?>
	</div>
</div>			
				

<?}?>
			
		

	<script>
	
	function onYouTubeIframeAPIReady() {  
	
	           for(var i=0;i< <? echo $COUNT_VIDEOS?>;i++){  // loading videos in slider
   
	       player = new YT.Player('youtube'+i, {
                height: '212',
                width: '379',
                videoId: VIDEO_ID[i],
	            playerVars: { 'autoplay': 0 },
                events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
                 }
               });
	   
	   } 
    }
	
	</script>
	
	
	
