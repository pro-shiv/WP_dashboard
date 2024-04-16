<?php
include('../config/db.php');
$sql = "SELECT * FROM productdetail";
$check=mysqli_query($conn,$sql)or die("Sql query failed");
$output = '<table id="table-data_product"  style="width:100% " cellspacing="40px">
<thead>
 <tr>
   <th>Id</th>
   <th>Title</th>
   <th>Product Discription</th>
   <th>Image</th>
   <th>Action</th>

 </tr></thead><tbody>';
while($row = mysqli_fetch_assoc($check)) {  
  
  $output .= '<tr id='.$row['id'].'>
              <td>'.$row['id'].'</td>
              <td>'.$row['prductTitle'].'</td>
              <td>'.$row['productDiscription'].'</td>
              <td> <img  src="uploads/productImg/'.$row['ImgFileName'].'" width="70px" height="50px"></td>
                

              <td><a href="product/edit.php?id='.$row['id'].'" style="margin-top:15px" class=" btn btn-primary edit-btn" data-id='.$row['id'].'>Edit</a></td>
  </tr>';
}
$output .='</tbody></table>';
echo $output;
die;
?>
