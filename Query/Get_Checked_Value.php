<?php
$con = mysqli_connect("localhost","root","","library");
if(isset($_POST['row-check']))
{
    $Id = $_POST['row-check'];
    $column= implode(',',$Id);
}
else
{
  $_SESSION['war'] = "select first !";
}

?>