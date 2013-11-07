<html lang="en">
<head>
<meta charset="utf-8" />
<title>jQuery UI Dialog - Default functionality</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="jquery-1.9.1.js"></script>
<script src="jquery-ui.js"></script>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="jquery-ui.css" />
<script>
$(document).ready(function () {
	$('#clickhere').on('click', function() {
		$( "#dialog" ).dialog();
	});
});
</script>
</head>
<body>
<a href="#" id="clickhere">Click here</a>
<div id="dialog" title="Basic dialog">
<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
</body>
</html>