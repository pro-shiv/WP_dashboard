<?php
session_start();
include('../config/db.php');
if(isset($_POST['selectedOption'])) {
    
    $data = $_POST['selectedOption'];
    $_SESSION['user_id']= $data;

    // Fetch and display related data (replace this with your own logic)
    $relatedData = fetchDataBasedOnOption($data);

    // Store the fetched data in a session variable
    // $_SESSION['fetched_data'] = $relatedData;

    // Echo the fetched data back to the JavaScript
    echo $relatedData;
} elseif(isset($_SESSION['fetched_data'])) {
   

    // If there is data in the session variable, echo it back to the JavaScript
    echo $_SESSION['fetched_data'];
}

function fetchDataBasedOnOption($data) {
    global $conn;
    // Implement your logic to fetch data based on the selected option
    // For example, query a database
    // Return the HTML content for the list
    
$sql = "SELECT * FROM menu WHERE menuName ='$data' ORDER BY display_order ASC ";
$check = mysqli_query($conn, $sql) or die("Sql query failed");

$dataToStore = array();

    $output = '';

    while ($row = mysqli_fetch_assoc($check)) {
        $output .= '<li class="ui-state-default" data-displayCounter="' . $row['display_order'] . '"type=' . $row['type'] . ' data-number=' . $row['itemId'] . ' id=' . $row['id'] . '>' . $row['menuTitle'] . '</li>';
        

    }
    // $output .= '<p class="counterPtag" style="display:none ">"'.$i.'"</p>';
    return $output;

}
?>
