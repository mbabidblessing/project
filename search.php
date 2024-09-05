<html> 
	<head> 
		<title>Google Search</title> 
		<script> 
			function submitSearchForm(button) { 
				var googleSearchForm = document.getElementById("google-search-form"); 
				if (button.id == 'google-web-search-button') { 
					googleSearchForm.action = 'http://www.google.com/search'; 
				} else if (button.id == 'google-image-search-button') { 
					googleSearchForm.action = 'http://images.google.com/images'; 
				} 
				googleSearchForm.method = 'get'; 
				googleSearchForm.submit(); 
			} 
		</script> 
	</head> 
	<body> 
		<form id="google-search-form"> 
			<input type="text" name="q" /> 
			<input id="google-web-search-button" type="button" value="Web Search" onclick="submitSearchForm(this)" /> 
			<input id="google-image-search-button" type="button" value="Image Search" onclick="submitSearchForm(this)" /> 
		</form> 
	</body> 
</html> 