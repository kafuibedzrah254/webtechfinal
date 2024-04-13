<?php
session_start();
include('connect.php');

// Check if user has already voted
if ($_SESSION['status'] == 1) {
    echo '<script>
    alert("You have already voted. You cannot vote again.");
    window.location="../partials/dashboard.php";
    </script>';
    exit; // Exit the script to prevent further execution
}

$votes = $_POST['groupvotes'];
$totalvotes = $votes + 1;

$gid = $_POST['groupid'];
$uid = $_SESSION['id'];

// Update the votes for the selected group
$updatevotes = mysqli_query($con, "UPDATE `userdata` SET votes='$totalvotes' WHERE id='$gid' ");

// Update the status of the user to indicate that they have voted
$updatestatus = mysqli_query($con, "UPDATE `userdata` SET status=1 WHERE id='$uid' ");

if ($updatevotes && $updatestatus) {
    // Fetch updated group data
    $getgroups = mysqli_query($con, "SELECT username,photo,votes,id FROM `userdata` WHERE standard='group'");
    $groups = mysqli_fetch_all($getgroups, MYSQLI_ASSOC);
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] = 1; // Update user's status to indicate they have voted

    echo '<script>
    alert("Voting Successful");
    window.location="../partials/dashboard.php";
    </script>';
} else {
    echo '<script>
    alert("Technical error!! Vote after sometime");
    window.location="../partials/dashboard.php";
    </script>';
}

?>
