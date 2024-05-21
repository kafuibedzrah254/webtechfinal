<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Validation</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #error {
            color: red;
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form  action="live_quiz_register.php"  method="POST" id="myForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>

        <label for="features">Features:</label>
        <select id="features" name="features" multiple required>
            <option value="feature1">Car</option>
            <option value="feature2">Trolley</option>
            <option value="feature3">Van</option>
            <option value="feature4">Truck</option>
        </select>
        
        <p id="error">Please select at least two features.</p>

        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var features = document.getElementById('features');
            var selectedOptions = Array.from(features.selectedOptions);

            if (selectedOptions.length < 2) {
                event.preventDefault();
                document.getElementById('error').style.display = 'block';
            } else {
                document.getElementById('error').style.display = 'none';
            }
        });
    </script>
</body>
</html>
