function showHide(id){
	obj = document.getElementById(id);
	if(obj.style.display != 'block'){
		obj.style.display = 'block';
	}else{
		obj.style.display = 'none';
	}
}
function showHideTr(id){
	obj = document.getElementById(id);
	if(firefox){	
		if(obj.style.display != 'table-row'){
			obj.style.display = 'table-row';
		} else {
			obj.style.display = 'none';
		}
	} else {
		if(obj.style.display != 'block'){
			obj.style.display = 'block';
		} else {
			obj.style.display = 'none';
		}
	}

}

