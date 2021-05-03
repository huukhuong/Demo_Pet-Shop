<?php  
 //sort.php  
 $connect = mysqli_connect("localhost", "root", "", "petshop");  
 $output = '';  
 $order = $_POST["order"];  
 /* $limit = $_POST["limit"] ;
 $firstindex = $_POST["index"];  */ 
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * FROM sanpham ORDER BY ".$_POST["column_name"]." ".$_POST["order"].""; 
 //$sql = "SELECT * FROM `sanpham` ORDER BY MaSP DESC LIMIT $limit OFFSET $firstIndex";
   
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID</a></th>  
           <th><a class="column_sort" id="name" data-order="'.$order.'" href="#">Name</a></th>  
           <th><a class="column_sort" id="gender" data-order="'.$order.'" href="#">Gender</a></th>  
           <th><a class="column_sort" id="designation" data-order="'.$order.'" href="#">Designation</a></th>  
           <th><a class="column_sort" id="age" data-order="'.$order.'" href="#">Age</a></th>  
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["MaSP"] . '</td>  
           <td>' . $row["TenSP"] . '</td>  
           <td>' . $row["MaLoai"] . '</td>  
           <td>' . $row["SoLuong"] . '</td>  
           <td>' . $row["DonViTinh"] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  