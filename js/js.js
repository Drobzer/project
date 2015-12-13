function chgcol(){
	document.body.style.backgroundColor = "black";
}
			
function apply_settings(color){
	document.body.style.backgroundColor = color;
}
                        
function previewred(){
    document.body.style.transition = "1s all";
    document.body.style.backgroundColor = "red";
}
                        
function previewblack(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "black";
	
}

function previewgreen(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "green";
	
}

function previeworange(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "orange";
	
}

function previewblue(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "blue";
	
}

function previewyellow(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "yellow";
	
}

function previewcustom1(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "#3399ff";
	
}

function previewcustom2(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "#829bae";
	
}

function previewcustom3(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "#eafeef";
	
}

function previewcustom4(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "#9faeb8";
	
}

function previewcustom5(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "#a1efb4";
	
}

function previewcustom6(){
	document.body.style.transition = "1s all";
	document.body.style.backgroundColor = "#eeeeee";
	
}

function restore(color){
	document.body.style.backgroundColor = color;
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function reload(){
    location.reload();
}