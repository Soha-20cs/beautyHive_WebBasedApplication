    <?php

include 'conn.php';

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Insert the values into the database
    $sql = "INSERT INTO article_comment (name, email, comment) VALUES ('$name', '$email', '$comment')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Comment added successfully!');window.location.href = 'articles.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

// Close the connection
mysqli_close($conn);

?>