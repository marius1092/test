
$(function() {   
    console.log('started');
        
    _V_("index_video").ready(function(){
        
        var myPlayer = this;

        $('#start_stop_btn').click(function(){
            if ($('#start_stop_btn').hasClass('play')){                
                myPlayer.play();
                $('#start_stop_btn').removeClass('play').addClass('pause');
            } else {                
                myPlayer.pause();
                $('#start_stop_btn').removeClass('pause').addClass('play');
            }            
            return false;
        });            
        
        $('#start_stop_sound').click(function(){
            console.log('click');
            if ($('#start_stop_sound').hasClass('sound-on')){                
                myPlayer.volume(0.5); 
                $('#start_stop_sound').removeClass('sound-on').addClass('sound-off');
            } else {                
                myPlayer.volume(0); 
                $('#start_stop_sound').removeClass('sound-off').addClass('sound-on');
            }            
            return false;
        });            
                
    });    
});