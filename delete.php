<?php

// Check if the user is not logged in or has "guest" access level
if (!isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "guest") {
    // Redirect to the index.php page and exit
    header("Location: index.php");
    exit();
}

// Include the connection file
include_once("connections/connection.php");
$con = connection();

// Check if the form is submitted (delete button clicked)
if(isset($_POST['delete'])) {
    // Retrieve the ID from the form
    $id = $_POST['ID'];

    // Delete from students_list_old table
    $deleteStudentSql = "DELETE FROM students_list_old WHERE id = '$id'";
    $con->query($deleteStudentSql) or die ($con->error);

    // Delete from student_id_trig table
    $deleteIDSql = "DELETE FROM student_id_trig WHERE id = '$id'";
    $con->query($deleteIDSql) or die ($con->error);
    
    // Redirect to the list.php page
    header("Location: list.php");
    exit;
} else {
    // If the form is not submitted, redirect to the index.php page
    header("Location: index.php");
    exit;
}

?>