<?php
$servername="localhost";
$conn=mysqli_connect($servername, username:"s202228011215031" ,password: "ucas215031",database: "s202228011215031");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
    echo "var alertText='Connected';";
//echo "var protein_table_size=1000;";
//count the database row number of gene_table
$sql = "SELECT COUNT(*) FROM gene_table";
$num = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($num, MYSQLI_ASSOC);
$rowCount = $row['COUNT(*)'];
echo "var geneTableSize=" . "'$rowCount';";

//count the database row number of central_table
$sql = "SELECT COUNT(*) FROM central_table";
$num = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($num, MYSQLI_ASSOC);
$rowCount = $row['COUNT(*)'];
echo "var centralTableSize=" . "'$rowCount';";

//count the database row number of protein_table
$sql = "SELECT COUNT(*) FROM protein_table";
$num = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($num, MYSQLI_ASSOC);
$rowCount = $row['COUNT(*)'];
echo "var proteinTableSize=" . "'$rowCount';";
