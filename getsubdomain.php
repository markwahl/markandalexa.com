<?php

$URL = $_SERVER['HTTP_HOST'];
echo "URL: ".$URL;

$fulldomain = explode('.',$URL);
$subdomain = $fulldomain[0];
echo"<p>subdomain: ".$subdomain;

?>
