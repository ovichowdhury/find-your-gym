function validateName(name){
	error = document.getElementById("gymname_error");
	if(name.length == 0){
		error.style.display = "none";
	}
	else{
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				if(this.responseText == 1){
					error.style.display = "block";
				}
				else{
					error.style.display = "none";
				}
			}
		}
	}
	
	xmlHttp.open("POST","validateGymName.php?name="+name,true);
	xmlHttp.send();
}