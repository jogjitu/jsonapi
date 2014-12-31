<?php

$isLocal = true;


if($isLocal)
{
	
	define("DATABASE_NAME","jsonapi");
	define("DATABASE_SERVER","localhost");
	define("DATABASE_USERNAME","root");
	define("DATABASE_PASSWORD","");
	
}
else
{
	define("DATABASE_NAME","jsonapi");
	define("DATABASE_SERVER","localhost");
	define("DATABASE_USERNAME","root");
	define("DATABASE_PASSWORD","");
}
?>