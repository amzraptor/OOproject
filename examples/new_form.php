<!DOCTYPE html>
<?php
$bp = $_GET['bp'];
if(empty($bp))
{
echo("
<html>
  <body>
    <form action='new_form.php' method='get'>
      <input type='text' name='bp' id='bp' value='heh' />
      <input type='submit' value=' Register ' id='submit' />
    </form>
  </body>
</html>
");
}
else
{
echo("
<html>
  <body>
    <form action='new_form.php' method='get'>
      <input type='text' name='bp' id='bp' value='heh there' />
      <input type='text' name='val' id='bp' value='$bp' />
      <input type='submit' value=' Register ' id='submit' />
    </form>
  </body>
</html>
");
}
?>
