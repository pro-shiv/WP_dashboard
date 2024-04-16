<?php
session_start();
include('../config/db.php');

$data = $_POST['selectedOption'];
$_SESSION['user_id']= $data;

$sql = "SELECT * FROM menu WHERE menuName ='$data' ORDER BY display_order ASC ";
$check = mysqli_query($conn, $sql) or die("Sql query failed");

$dataToStore = array();

$output = '';

while ($row = mysqli_fetch_assoc($check)) {
    $output .= '<li class="ui-state-default" data-displayCounter="' . $row['display_order'] . '"type=' . $row['type'] . ' data-number=' . $row['itemId'] . ' id=' . $row['id'] . '>' . $row['menuTitle'] . '</li>';
    

}
// $output .= '<p class="counterPtag" style="display:none ">"'.$i.'"</p>';
echo $output;

// Close the database connection if needed
mysqli_close($conn);
?>
