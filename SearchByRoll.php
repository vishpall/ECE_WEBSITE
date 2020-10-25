<?php
if(isset($_POST['search1'])){
$rollno = $_POST['rollno'];  // Storing Selected Value In Variable
echo "You have entered :" .$rollno;
include 'db_connection.php';
$conn = OpenCon();
echo "<br>";
echo "Connected to database Successfully"."<br>";

$sql = "SELECT comp_name,no FROM data WHERE roll_no='".$_POST['rollno']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
        echo "component                count "."<br>";
    while($row = $result->fetch_assoc()) {

         echo $row["comp_name"]."                 ".$row["no"]."<br>";
      }
}
else
 {
    echo "Data not found in the records";
}




}
$conn -> close();
#CloseCon($conn);
?>
