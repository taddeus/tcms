<!doctype html>
<html>
<head>
	<title>Tcms</title>
	<meta charset="utf-8" />
	<link href="css/main.css" rel="stylesheet" />	
</head>
<body>

<div id="wrapper">
	<ul id="menu">
		{block:menu}
		<li class="{active}">
			{title}
			<div class="icon {icon}"></div>
		</li>
		{end}
	</ul>
</div>

</body>
</html>