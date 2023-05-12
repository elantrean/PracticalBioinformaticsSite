<?php
$servername="localhost";
$conn=mysqli_connect($servername, username:"s202228011215031" ,password: "ucas215031",database: "s202228011215031");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
    echo ("Connection success<BR>");
if(isset($_POST['submit'])){
    $geneId = $_POST['gene_id'];
    $geneSeq = $_POST['gene_seq'];
    $geneChr = $_POST['gene_chr'];
    $geneStart = $_POST['gene_start'];
    $geneEnd = $_POST['gene_end'];
    $direction = $_POST['direction'];
    $idPattern = "/ENS[A-Z]{0,3}G[0-9]{11}/";
    $seqPattern = "/[ATCGN]*/";
    $chrPattern = "/[0-9XYMT]{1,2}/";
    if(!preg_match($idPattern, $geneId)){
        echo "<p style='color:red'>oops, gene id is NOT correct!, should be as Ensembl format</p><a href='https://useast.ensembl.org/'>Ensembl</a><BR><BR>";
    }elseif(!preg_match($seqPattern, $geneSeq)){
        echo "<p style='color:red'>oops, gene sequence is NOT correct!, should be capital form ATCG</p><BR><BR>";
    }elseif(!preg_match($chrPattern, $geneChr)){
        echo "<p style='color:red'>oops, gene chromosome is NOT correct!, should be 1-22, X, Y, M or MT</p><BR><BR>";
    }else{
        echo "Format Correct!<BR><BR>";
        $sql = "SELECT * FROM gene_table WHERE gene_id = '$geneId'";
        $num=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($num, MYSQLI_ASSOC);
        if($row['gene_id'] == $geneId){
            echo "<p style='color:red'>Gene already exists</p><BR>";
            $sql = "UPDATE gene_table SET gene_seq = '$geneSeq', gene_chrom = '$geneChr', gene_start_position = '$geneStart', gene_end_position = '$geneEnd' , direction = '$direction' WHERE gene_id = '$geneId'";
            mysqli_query($conn, $sql);
            echo "<p style='color:blue'>Update success!</p><BR>";
        }
        else{
            $sql = "INSERT INTO gene_table (gene_id, gene_chrom) VALUES ('$geneId', '$geneChr')";
            mysqli_query($conn, $sql);
            echo "<p style='color:blue'>Insertion success!</p><BR><BR>";
        }
    }
}
elseif (isset($_POST['delete'])) {
    $geneId = $_POST['gene_id'];
    $idPattern = "/ENS[A-Z]{0,3}G[0-9]{11}/";
    if (!preg_match($idPattern, $geneId)) {
        echo "<p style='color:red'>Gene id is NOT correct!, should be as Ensemble format</p><a href='https://useast.ensembl.org/'></a><BR><BR>";
    } else {
        //check if this gene id exists in database
        $sql = "DELETE FROM gene_table WHERE gene_id = '$geneId'";
        $num = mysqli_query($conn, $sql);
        if (!$num) {
            echo "<p style='color:red'>Deletion failed, this gene is not in database</p><BR><BR>";
        } else {
            echo "<p style='color:blue'>Deletion success!</p><BR><BR>";
        }
    }
}elseif (isset($_POST['search'])){
    $geneId = $_POST['gene_id'];
    $idPattern = "/ENS[A-Z]{0,3}G[0-9]{11}/";
    if (!preg_match($idPattern, $geneId)) {
        echo "<p style='color:red'>Gene id is NOT correct!, should be as Ensemble format</p><a href='https://useast.ensembl.org/'></a><BR><BR>";
    } else {
        //check if this gene id exists in database
        $sql = "SELECT * FROM gene_table WHERE gene_id = '$geneId'";
        $num = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($num, MYSQLI_ASSOC);
        if (!$row) {
            echo "<p style='color:red'>Search failed, this gene is not in database</p><BR><BR>";
        } else {
            echo "<p style='color:blue'>Search success!</p><BR><BR>";
            echo "<p style='color:blue'>Gene id: ".$row['gene_id']."</p><BR><BR>";
            echo "<p style='color:blue'>Gene sequence: ".$row['gene_seq']."</p><BR><BR>";
            echo "<p style='color:blue'>Gene chromosome: ".$row['gene_chrom']."</p><BR><BR>";
            echo "<p style='color:blue'>Gene start position: ".$row['gene_start_position']."</p><BR><BR>";
            echo "<p style='color:blue'>Gene end position: ".$row['gene_end_position']."</p><BR><BR>";
            echo "<p style='color:blue'>Gene direction: ".$row['direction']."</p><BR><BR>";
        }
    }
}
?>
