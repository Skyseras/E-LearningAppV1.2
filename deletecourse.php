<?php
  // Create connection
  $conn = new mysqli('localhost', 'root','', 'e_classe_db');


  // delete data
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM course WHERE course_id=$id") or die($conn->error());
    echo "<script>window.location.replace('course.php')</script>";
  }
?>