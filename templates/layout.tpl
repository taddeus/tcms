<!doctype html>
<html>
<head>
	<title>Tcms</title>
	
	<meta charset="utf-8" />
	<meta name="robots" content="index,nofollow" />
	<base href="http://localhost/tcms/" />
	
	<link href="css/main" rel="stylesheet" />
	
	<script async type="text/javascript" src="js/jquery-1.7.min,menu,list"></script>
	<!--
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript">
		$.getScript('js/menu,list');
	</script>
	-->
</head>
<body>

<div id="wrapper">
	<div id="menu">
		{block:menu}
		<a href="#{icon}" class="{active}">
			{title}
			<div class="icon {icon}"></div>
		</a>
		{end}
	</div>
</div>

</body>
</html>