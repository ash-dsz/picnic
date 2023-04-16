<?php
if (isset($_POST['name'])) {
  // Connect to the database using mysqli_connect
  $conn = mysqli_connect("localhost", "u736864550_morningmasala", "Keshav@12345", "u736864550_morningmasala");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve the name entered by the user from the $_POST array
  $name = mysqli_real_escape_string($conn, $_POST['name']);

  // Check if the name already exists in the database
  $query = "SELECT * FROM fake WHERE name='$name'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // The name already exists, so show an error message
    echo "The name '$name' already exists please include your ward name or mobile number";
  } else {
    // The name doesn't exist, so insert it into the database
    $sql = "INSERT INTO fake (name) VALUES ('$name')";

    if (mysqli_query($conn, $sql)) {
      echo "Name '$name' successfully registered";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

  // Close the database connection using mysqli_close
  mysqli_close($conn);
}
?>
