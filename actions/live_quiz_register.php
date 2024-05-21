<?php
include('connect.php');

$name= $_POST['name'];
$features= $_POST['features'];




// Insert user data into database
$sql = "INSERT INTO `product` (pname)  
        VALUES ('$name')";
$sql_one= "INSERT INTO `product_feature` (feature_name)  
//VALUES ('$features')";
$result = mysqli_query($con, $sql);

$result_one = mysqli_query($con,$sql_one);

if($result && $result_one){
    echo '<script>
    alert ("Registration successful");
    window.location = "live_quiz_registration.php";
    </script>';
} else {
    die("Connection failed: " . mysqli_error($con));
}

mysqli_close($con);
?>
