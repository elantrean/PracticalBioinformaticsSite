<?php
if(isset($_POST['submit']))
{
    $servername = "localhost";
    $conn=mysqli_connect($servername, username:"s202228011215031" ,password: "ucas215031",database: "s202228011215031");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else
        echo("Connection success<BR>");
        echo("<a href='index.html'>Back to home page</a><BR><BR>");
}
?>