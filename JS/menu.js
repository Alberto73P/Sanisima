function alternarMenu(){
	let menu = document.getElementById("Paginas");
	let pos = menu.style.right;

	if(!menu.style.right){
		pos = window.getComputedStyle(menu).right;
	}
	
	pos = pos.replace("px","");
	pos = pos.replace("%","");

	if(pos < 0){
		menu.style.right = "0";
	}
	else{
		menu.style.right = "-100%";
	}
}