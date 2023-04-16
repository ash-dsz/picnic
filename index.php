<!DOCTYPE html>
<html>
<head>
  <title>Picnic Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .loader {
      border: 16px solid #f3f3f3;
      border-top: 16px solid #3498db;
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      margin: auto;
      display: none;
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>
  <div class="container">
  <center>
    <h3>Picnic Registration</h3>
  </center>
 <form>
  <div class="form-group">
    <label for="name">Full Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" required>
  </div>
  <button type="button" class="btn btn-primary" onclick="register()">Register</button>
  <div class="loader"></div>
</form>

<script>
function register() {
  // Get the name entered by the user
  var name = document.getElementById('name').value;

  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Define the AJAX request
  xhr.open('POST', 'register.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  // Show the loader
  document.querySelector('.loader').style.display = 'block';

  // Send the AJAX request with the name data
  xhr.send('name=' + encodeURIComponent(name));

  // Define the callback function to handle the response
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      // Hide the loader
      document.querySelector('.loader').style.display = 'none';

      // Update the page with the response
      if (xhr.status === 200) {
        alert(xhr.responseText);
        // You can add more code here to update the page as desired
      } else {
        alert('Error: ' + xhr.status);
      }
    }
  };
}
</script>

</body>
</html>
