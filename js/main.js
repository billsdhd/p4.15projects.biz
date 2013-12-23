function countChar(val){
    if (val.value.length >= 500)      
    	val.value = val.value.substring(0, 500);
    $('#charNum').text(500 - val.value.length +' '+'left');    
};

function playAKey() {
	var audio = document.getElementById("sound/click.mp3");
	if (audio) audio.play();
}
		
document.addEventListener('keydown', function(event) {
	playAKey();
});