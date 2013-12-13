<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<title>Face to Face</title>
	<meta charset="UTF-8"/>
	<meta name="author" content="Mário Valney"/>
	<meta name="description" content="Face to Face"/>
    <link rel="stylesheet" type="text/css" href="css/face.css" />
    <script src="http://js.opovo.com.br/html5shiv.js"></script>
    <link href="imgs/favicon.ico" rel="shortcut icon" />
    <script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="js/jqueryFace.js"></script>
</head>

<body>

<?php

// PRECISAMOS DE UM USUÁRIO INICIAL
$userID = '10';

while ($userID <= 50) {

// ACHAMOS A URL DA API DO FACEBOOK
$userURL = 'http://graph.facebook.com/1000012875800'.$userID.'/picture?redirect=false';
$userJSON = file_get_contents($userURL);

//Faz o parsing da string 

// relationship_status
$jsonObj = json_decode($userJSON); 
$jsonObj = $jsonObj->data;

if (! $jsonObj->is_silhouette) {
	echo '<a href="http://fb.com/1000012875800'.$userID.'" target="_blank"><img src="'.$jsonObj->url.'"></a>';
}

$userID ++;
}
?>
</body>
</html>
