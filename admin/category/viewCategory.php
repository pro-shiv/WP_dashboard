<?php
include('../config/db.php');
$sql = "SELECT * FROM categorydetail";
$check=mysqli_query($conn,$sql)or die("Sql query failed");
$output = '<table id="table-data_category"  style="width:100% " cellspacing="40px">
<thead>
 <tr>
   <th>Id</th>
   <th>Title</th>
   <th>Slug</th>
   <th>Description</th>
   <th>Action</th>

 </tr></thead><tbody>';
while($row = mysqli_fetch_assoc($check)) {  
  
  $output .= '<tr id='.$row['id'].'>
              <td>'.$row['id'].'</td>
              <td>'.$row['title'].'</td>
              <td>'.$row['slug'].'</td>
              <td>'.$row['description'].'</td>
              <td><a href="category/edit.php?id='.$row['id'].'" style="margin-top:15px" class=" btn btn-primary edit-btn" data-id='.$row['id'].'>Edit</a></td>
  </tr>';
}
$output .='</tbody></table>';
echo $output;
die;
?>
