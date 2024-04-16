<?php
include('../config/db.php');
$sql = "SELECT * FROM ecompage";
$check=mysqli_query($conn,$sql)or die("Sql query failed");
$output = '<table id="table-data"  style="width:100% " cellspacing="40px">
<thead>
 <tr>
   <th>Id</th>
   <th>Title</th>
   <th>Page Discription</th>
   <th>Image</th>
   <th>Action</th>

 </tr></thead><tbody>';
while($row = mysqli_fetch_assoc($check)) {  
  
  $output .= '<tr id='.$row['id'].'>
              <td>'.$row['id'].'</td>
              <td>'.$row['pageTitle'].'</td>
              <td>'.$row['pageDescription'].'</td>
              <td> <img  src="uploads/pageImg/'.$row['ImgFileName'].'" width="70px" height="50px"></td>
                

              <td><a href="page/edit.php?id='.$row['id'].'" style="margin-top:15px" class=" btn btn-primary edit-btn" data-id='.$row['id'].'>Edit</a></td>
  </tr>';
}
$output .='</tbody></table>';
echo $output;
die;
?>
