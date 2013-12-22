function countChar(val){
    if (val.value.length >= 500)      
    	val.value = val.value.substring(0, 500);
    $('#charNum').text(500 - val.value.length);    
};

function playKey() {
	var audio = new Audio("sound/click.mp3");	
	audio.play();
};

document.addEventListener('keydown', function(event) {
	playKey();
});
		