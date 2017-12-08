function addToFormula(id1, id2){
	document.getElementById(id1).value += document.getElementById(id2).innerHTML;
}

function calculation(id){
	var formula = document.getElementById(id).value;
	if(formula){
		confirm(eval(formula));
	}else{
		alert("何も入力されていません");
	}
}

function reset(id){
	document.getElementById(id).value = "";
}
function call(id){
	var number = document.getElementById(id).value;
	if(number){
		confirm(number);
	}else{
		alert("何も入力されていません");
	}
}