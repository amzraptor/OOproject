<?php 
include "db.php";
//$id = "guesthomepage";
//$id = "userhomepage";
//$id = "validationpage";
$id = "signinsignuppage";
$page = get_page($id);
$header = $page[1];
$subheader = $page[2];
$body = $page[3];
$footer = $page[4];

if ($header != NULL)
{
include $header; 
}
if ($subheader != NULL)
{
include $subheader; 
}
if ($body != NULL)
{
include $body; 
}
if ($footer != NULL)
{
include $footer; 
}
?>

