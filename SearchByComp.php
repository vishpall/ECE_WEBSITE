<?php
if(isset($_POST['search2'])){
$selected_val = $_POST['comp'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_val;
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";
$count=0;
  // Displaying Selected Value
  $sql = "SELECT * FROM data WHERE comp_name='".$_POST['comp']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      echo "Comp_name : " . $_POST['comp']."<br>";

      while($row = $result->fetch_assoc()) {
          echo "<b>Roll no :</b> " . $row["roll_no"]."<b>    No : </b>".$row["no"]."<b>    Phone_no : </b>".$row["phno"]."   <b> Return data : </b>".$row["return_date"];
          echo "<br>";
          $count=$count+(int)$row["no"];
        }
      $sql = "SELECT total FROM list WHERE comp_name='".$_POST['comp']."'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $total=$row["total"];
             echo "<br>"."Total : ".$total."<br>";
              echo "Borrowed: " . $count."<br>";
              $remaining=(int)$total-$count;
              echo "Available : ".$remaining."<br>";}
      }
      else{echo"data not found in records";}
  }
  else
   {
      echo "Data not found in the records";
  }

}
$conn -> close();
#CloseCon($conn);
?>
