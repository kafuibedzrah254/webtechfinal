<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../');
}

$data = $_SESSION['data'];
$loggedInId = $data['id'];

if($_SESSION['status'] == 1){
    $status = '<b class="text-success">Voted</b>';
}else{
    $status = '<b class="text-danger">Not voted</b>';
}

// Connect to the database
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "votingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM userdata WHERE standard = 'group' AND id != $loggedInId AND status = 0";
$result = $conn->query($sql);

$groups = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $groups[] = $row;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Voting system- Dashboard</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

</head>
<body class="bg-primary text-light">
<div class="container my-5">
<a href="../"><button class="btn btn-dark text-light px-4">Back</button></a>
<a href="logout.php"><button class="btn btn-dark text-light px-4">Logout</button></a>

<h1 class="my-3">E-Voting System</h1>

<div class="row my-5">
    <div class="col-md-7">

        <?php
        if(!empty($groups)){
           foreach($groups as $group){
        ?>  
            <div class="row">
            <div class="col-md-4">
                <img src="../uploads/<?php echo $group['photo']; ?>" alt="Group image">
            </div>
            <div class="col-md-8">
                <strong class="text-dark h5">Group name:</strong>
                <?php echo $group['username']; ?>
                <br>

                <br>
            </div>

                </div>
                <form action="../actions/voting.php" method="POST">
                    <input type="hidden" name="groupvotes" value="<?php echo $group['votes']; ?>">

                   <input type="hidden" name="groupid" value="<?php echo $group['id']; ?>">

                <?php
                if($_SESSION['status']==1){
                    ?>
                    <button class="bg-success my-4 text-white px-3">Voted</button>
                    <hr>
                    <?php
                }else{
                    ?>
                        <button class="bg-danger my-4 text-white px-3" type="submit">Vote</button>
                        <hr>

                    <?php
                }

                ?>

               </form>
            <?php
           }

        }

        else{
            ?>

            <div class="container">
                <p>No groups to display</p>
            </div>
        <?php
        }
        ?>
        <!--groups-->
        <hr>
        <!-- View Election Results Button -->
        <?php
        if($_SESSION['status'] == 1){
            echo '<a href="../actions/view_elections_results.php" class="btn btn-primary">View Election Results</a>';
        }
        else{
            echo "   ";
        }
        ?>
    </div>

    <div class="col-md-5">
                <!--user profile-->
                <img src="../uploads/<?php echo $data['photo']; ?>" alt="User image">
                <br>
                <br>
                <strong class="text-dark h5"> Name:</strong>
                <?php echo $data['username']; ?>

                <br><br>
                <strong class="text-dark h5"> Mobile:</strong>
                <?php echo $data['mobile']; ?>

                
                <br><br>
                <strong class="text-dark h5"> Status:</strong>
                <?php echo $status; ?>

                
                <br><br>




    </div>

</div>
</div>
</body>
</html>
