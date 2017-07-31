$( document ).ready(function() {

  
	VIDEO_PLAY_STATUS = false;

    $('.slider').hover(function(){   // hover cursor
       
	   clearInterval(play_id);  // stop scrolling slider
    },function(){
        
		if(OPT_PLAY && !VIDEO_PLAY_STATUS){   //  start scrolling slider
		   play_id = setInterval(function(){ $('.arr-ring').click(); }, OPT_PLAY_SPEED);
		}
    });


    
});