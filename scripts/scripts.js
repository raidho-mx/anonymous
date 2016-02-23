


var clientHeight = document.getElementById('animacion_contenedor').clientHeight;
var clientWidth = document.getElementById('animacion_contenedor').clientWidth;
var offsetHeight = document.getElementById('animacion_contenedor').offsetHeight;

var mask_container = document.getElementById('animacion_contenedor');
var mask = document.getElementById('anim_imagen');

var mask_init_top = (clientHeight/100*20);
var mask_init_right = clientWidth - (clientWidth/100*20);
var mask_init_bottom = clientHeight - (clientHeight/100*20);
var mask_init_left = (clientWidth/100*20);

// clip: rect(20px, 600px, 380px, 100px)

window.onload = function add_size(){
		document.getElementById("anim_imagen").setAttribute("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect("+ mask_init_top +"px, "+ mask_init_right +"px, "+ mask_init_bottom +"px, "+ mask_init_left +"px)");

		console.log('Client H: ' + clientHeight);
		console.log('Client W: ' + clientWidth);
		console.log('Offset H: ' + offsetHeight);

		console.log('Init top: ' + mask_init_top);
		console.log('Init right: ' + mask_init_right);
		console.log('Init bottom: ' + mask_init_bottom);
		console.log('Init left: ' + mask_init_left);
}

mask_container.onmouseover = function open_mask(){
		document.getElementById("anim_imagen").setAttribute("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect(0, "+ clientWidth +"px, "+ clientHeight +"px, 0)");
}

mask_container.onmouseout = function recover_mask(){
		document.getElementById("anim_imagen").setAttribute("style","width: "+ clientWidth +"px;height: "+ clientHeight +"px;clip: rect("+ mask_init_top +"px, "+ mask_init_right +"px, "+ mask_init_bottom +"px, "+ mask_init_left +"px)");
}
