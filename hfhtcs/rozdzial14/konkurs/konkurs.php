<?php
if ($_POST) {
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 
<meta name="robots" content="noindex,  nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2">
<title>Konkurs Head First HTML with CSS &amp; XHTML</title> 
<style type="text/css">
img {
	float: left;
	margin-right: 20px;
}
div {
	padding-top: 40px;
}
</style>
</head>
<body>

<p>
<img src="http://headfirstlabs.com/Images/hfguy.jpg" alt="Cz�owiek Head First" />
</p>

<div>
<p>
Cześć, <strong><?php print($firstname); print(" "); print($lastname); ?></strong>!<br>
Dziekujemy za wzięcie udziału w konkursie Head First HTML with CSS &amp; XHTML.
</p>
<p>
Jeśli coś wygrasz, natychmiast Cię powiadomimy.
</p>
</div>


</body> 
</html>


<?php

}

?>
