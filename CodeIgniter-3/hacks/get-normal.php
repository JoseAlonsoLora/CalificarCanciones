<?php
$con = mysqli_connect('127.0.0.1','alonso','1234','ProgramacionSegura');
$id = $_GET['id'];
$s = "SELECT username, name FROM User WHERE idUser={$id}";

$result = mysqli_query($con, $s);

while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    echo join(',', $row) . '<br>';
}
    
echo '<br>';
echo $s;
echo '<br>';