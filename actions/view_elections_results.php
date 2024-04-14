<?php
include('connect.php');

// Fetch group with the highest votes
$sql = "SELECT * FROM `userdata` WHERE standard = 'group' ORDER BY votes DESC LIMIT 1";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $group = mysqli_fetch_array($result);
    $groupName = $group['username'];
    $groupVotes = $group['votes'];
} else {
    $groupName = "No group found";
    $groupVotes = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Elections</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }

        h1, h3 {
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        .btn {
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="container my-5">
        <a href="../"><button class="btn btn-dark text-light px-4">Back</button></a>
        <h1 class="my-3">View Elections</h1>

        <div class="row my-5">
            <div class="col-md-12">
                <h3>Group with Highest Votes:</h3>
                <p><strong>Group Name:</strong> <?php echo $groupName; ?></p>
                <p><strong>Total Votes:</strong> <?php echo $groupVotes; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
