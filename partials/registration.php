<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system - Registration page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  rel="stylesheet">
</head>
<body class="bg-dark">
    <h1 class="text-center text-info p-3" >E-voting System</h1>
    <div class="bg-info py-4">
        <h2 class="text-center">Register Account</h2>
        <div class="container text-center">
            <form action="../actions/register.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" placeholder="Enter your username" required="required" name="username" pattern="[A-Za-z]{1,250}" title="Username must contain only alphabets and should be between 1 to 250 characters">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" placeholder="Enter your phone number (10 digits)" required="required" pattern="[0-9]{10}" title="Please enter 10 digits" name="mobile">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" placeholder="Enter your password" required="required" name="password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" placeholder="Confirm your password" required="required" name="cpassword">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control w-50 m-auto" name="photo">
                </div>
                <div class="mb-3">
                    <select name="std" class="form-select w-50 m-auto" required="required">
                        <option value="group">Group</option>
                        <option value="single voter">Single Voter</option>
                        <option value="poll creator">Poll Creator</option>
                    </select>  
                </div>
                <button type="submit" class="btn btn-dark my-4">Register</button>
                <p>Already have an account? <a href="../" class="text-white">Login here</a></p>
            </form>
        </div>
    </div>    
</body>
</html>
