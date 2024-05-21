<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Validation</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form id="myForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="features">Features:</label>
        <select id="features" name="features" multiple required>
            <option value="feature1">Feature 1</option>
            <option value="feature2">Feature 2</option>
            <option value="feature3">Feature 3</option>
            <option value="feature4">Feature 4</option>
        </select>
        
        <p id="error" style="color:red; display:none;">Please select at least two features.</p>

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
