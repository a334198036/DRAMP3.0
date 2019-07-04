<?php
	require_once '../Public_Class/Fengyepage.class.php';
	require_once '../Public_Class/EmpService.class.php';
    require_once '../Public_Class/public_paging.class.php';

?>


<!DOCTYPE html>
<html lang="en">

<!--  toos: cd -search   -->

<head>
    <title>Synthetic-Browse</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>


    <link href="../css/public_table.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_navil.css"  rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_down.css"  rel="stylesheet" type="text/css" media="screen" />
	<script src="../js/public_browse.js"></script>

</head>

<body>


<?php
    require_once ("../head/head_content.php");

?>


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dramp.cpu-bioinfor.org/browse">Browse</a></li>
            <li class="active">Synthetic Data</li>
        </ol>
    </div>
    <div class="row mt40">

   <!-- the content -->

            <div class="row highlight">


</body>
</html>

<?php



$query_mysql_one="SELECT * FROM synthetic_amps";
$query_mysql_two="SELECT count(DRAMP_ID) FROM synthetic_amps";

include("../template/public_swith_navil.php");


$paging_quick=new Paging_me();
$paging_quick->paging($fengyepage->pageNow,$fengyepage->pageCount,$fengyepage->rowCount,$my_url,$begin,$end);

include("../template/browse_funtion.php");

echo "<div style='clear:both'></div>";
echo "<div>";

echo "<table summary='The browse' class='datatable'>";
echo<<<END_END
	<tr><th style="border-right-style: none"><input id="CheckAll" onclick="SelectAll('browse_parent','browse_child')" name="browse_parent" type="checkbox" /></th><th style="border-left-style:none;width:90px;">DRAMP ID</th><th>Peptide NAME</th><th>Peptide Sequence</th><th>Source</th><th>Biological Activity</th><th>Swiss_Prot_Entry</th></tr>
END_END;
for ($i=0;$i<count($fengyepage->res_array);$i++){
	$row=$fengyepage->res_array[$i];
	if ($i%2 == 0) {
		echo "<tr class='altrow'><td style='border-right-style: none'><input type='checkBox' name='browse_child' value='{$row['DRAMP_ID']}' onclick='my_blast()'/></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}&dataset={$row['Dataset']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Name']}</td><td>{$row['Sequence']}</td><td>{$row['Source']}</td><td>{$row['Activity']}</td><td>{$row['Swiss_Prot_Entry']}</td></tr>";
	}else{
	echo "<tr ><td style='border-right-style: none'><input type='checkbox' name='browse_child' value='{$row['DRAMP_ID']}' onclick='my_blast()'/></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}&dataset={$row['Dataset']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Name']}</td><td>{$row['Sequence']}</td><td>{$row['Source']}</td><td>{$row['Activity']}</td><td>{$row['Swiss_Prot_Entry']}</td></tr>";
	}
}

echo "</table>";
echo "</div>";

?>
