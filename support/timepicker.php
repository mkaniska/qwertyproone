<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Demo - jquery-simple-datetimepicker</title>	
	<!--Requirement jQuery-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!--Load Script and Stylesheet -->
	<script type="text/javascript" src="jquery.simple-dtpicker.js"></script>
	<link type="text/css" href="jquery.simple-dtpicker.css" rel="stylesheet" />

</head>
<body>
		<h4>Close when selected date &amp; time ("closeOnSelected": true) with append to Input-field mode</h4>
		<p>
			<input type="text" name="date9" value="">
			<script type="text/javascript">
				$(function(){
					$('*[name=date9]').appendDtpicker({
						"closeOnSelected": true
					});
				});
			</script>
		</p>

</body>
</html>
