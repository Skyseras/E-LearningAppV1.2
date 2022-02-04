<?php

  // Create connection
  $conn = new mysqli('localhost', 'root','', 'e_classe_db');


  // delete data
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM student WHERE student_id=$id") or die($conn->error());
    echo "<script>window.location.replace('students.php')</script>";
  }
?>