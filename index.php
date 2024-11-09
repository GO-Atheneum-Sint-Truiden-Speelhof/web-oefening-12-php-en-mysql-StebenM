<!doctype html
<html lang=nl>
<!--invoegen Header-->
<?php include("include/head.php")?>

<body>
	<div class="container">

		<?php include("include/start.php");
			if(!isset($_GET['page']))
			{
				include("include/".$_GET['page'].".php");
			}
			else
			{
				$link = "includes/".$_GET['page'].".php";
				include($link);
			}
			include("include/fooder.php");
			?>
	</div>
	</body>

</html>