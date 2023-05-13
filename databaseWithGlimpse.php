<!DOCTYPE html>
<style>
    @import "nav.css";
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
<ul id="nav">
    <li><a href="index.html">Blast</a></li>
    <li><a href="database.html">Database</a></li>
    <li><a href="databaseWithGlimpse.php">Search</a></li>
    <li><a href="documentation.html">Documentation</a></li>
</ul>
<form action="databaseWithGlimpse.php" method="get">
    Gene id: <label>
            <input type="text" name="gene_id">
        </label>
    <p><input type="submit" name="search" value="Search"></p>
</form>
<?php
$servername="localhost";
$conn=mysqli_connect($servername, username:"s202228011215031" ,password: "ucas215031",database: "s202228011215031");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
    echo ("Connection success<BR>");
if (isset($_GET['search'])) {
    $geneId = $_GET['gene_id'];
    $idPattern = "/ENS[A-Z]{0,3}G[0-9]{11}/";
    echo "<br><a href='https://www.ncbi.nlm.nih.gov/gene/?term=$geneId'>Search this gene in NCBI</a>";
    echo "<br><a href='https://useast.ensembl.org/Multi/Search/Results?q=$geneId;site=ensembl;facet_feature_type=Gene'>Search this gene in Ensembl</a>";
    if (!preg_match($idPattern, $geneId)) {
        echo "<p style='color:red'>Gene id is NOT correct!, should be as Ensemble format</p><a href='https://useast.ensembl.org/'></a><BR><BR>";
    } else {
        //check if this gene id exists in database
        $sql = "SELECT * FROM gene_table WHERE gene_id = '$geneId'";
        $num = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($num, MYSQLI_ASSOC);
        if (!$row) {
            echo "<p style='color:red'>Search failed, this gene is not in database</p>";
        } else {
            echo "<p style='color:#000000'>Search success!</p>";
            echo
            "<table>
                <tr>
                    <th>Gene id</th>
                    <th>Gene sequence</th>
                    <th>Gene chromosome</th>
                    <th>Gene start position</th>
                    <th>Gene end position</th>
                    <th>Gene direction</th>
                </tr>
                <tr>
                    <td>" . $row['gene_id'] . "</td>
                    <td>" . $row['gene_seq'] . "</td>
                    <td>" . $row['gene_chrom'] . "</td>
                    <td>" . $row['gene_start_position'] . "</td>
                    <td>" . $row['gene_end_position'] . "</td>
                    <td>" . $row['direction'] . "</td>
                </tr></table>";
        }
    }
}
?>
</body>