function showHint(str){
		if(str.length==0){
			document.getElementById('inner').innerHTML="Ieskoti";
			return;
		} //checks empty fields
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest(); 
		} //checks if not IE 5 or 6
		else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} // checks if IE 5 or 6

		xmlhttp.onreadystatechange = function (){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById('inner').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("REQUEST","../search.php?text="+str,true);
		xmlhttp.send();
	}