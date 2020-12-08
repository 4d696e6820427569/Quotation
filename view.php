<?php

echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
echo "</head>";
echo "<body onload='getQuotes()'>";
echo "<h1 id='banner'>Quotation Service</h1>";
echo "<div id='quotationsList'></div>";
echo "</body>";
echo "</html>";
?>

<script type='text/javascript'>
	var ajax = new XMLHttpRequest();
	function getQuotes() {
		ajax.open("GET", "controller.php?getQuote=true", true);
		ajax.send();
	}

	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var quotationsDivEle = document.getElementById("quotationsList");
			var resultHTML = "";
			var response = JSON.parse(ajax.responseText);
			if (response.length == 0) {
				
			} else {
				for (var i = 0; i < response.length; i++) {
					resultHTML += "<div class='generalBox'>";
					resultHTML += '"' + response[i]["quote"] + '"</br></br>';
					resultHTML += "--" + response[i]["author"] + "</br></br>";
					resultHTML += "<span><button type='button'>+</button></span>";
					resultHTML += "<span>" + response[i]["flagged"] + "</span>";
					resultHTML += "<span><button type='button'>-</button></span>";
					resultHTML += "<span><button type='button'>flag</button></span>";
					resultHTML += "</div>";
				}
				quotationsDivEle.innerHTML = resultHTML;
			}
		}
	}
</script>