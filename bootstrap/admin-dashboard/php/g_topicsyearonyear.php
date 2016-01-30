<?php

$topic=$_GET["topic"];
$year1=$thisyear;
$year2=$lastyear;

//
// THIS YEAR
//

$getdata=$pdo->prepare("
	SELECT MONTH(tprdate) as month, COUNT(tprid) as count FROM tprtable 
	WHERE discussedtopics LIKE '%$topic%'
	AND tprdate > '$nationals2015'
	GROUP BY MONTH(tprdate)
	");
$getdata->execute();

$showdata=array();
$output=array();

while($row=$getdata->fetch(PDO::FETCH_ASSOC)){ 
	$month=$row['month']; $count=$row['count'];
	$showdata[]=$row;
}

$arraycount=0;

foreach($showdata as $key=>$value){
	$int_month=intval($value['month']);	// Turn the month part of the array into an integer
	$int_count=intval($value['count']);	// Turn the count part of the array into an integer
	$int_key=intval($key);				// Turn the array key in to an integer
	
	if($int_month<>$int_key+1+$arraycount){	// If the key DOES NOT EQUAL the month plus the month's position, then
		$difference=($int_month-($int_key+1+$arraycount)); // find out how many blanks
		for($x=0;$x<$difference;$x++){
			array_push($output,"0");		// put a blank value for every 0 hour month
		}
		array_push($output,$int_count);		// once enough blank spaces have been added, enter the count
		$arraycount=$arraycount+$difference;
	} else {
		array_push($output,$int_count);
	}
}
// Make sure there are 12 entries in the array
	$under=12-count($output);
	for($x=0;$x<$under;$x++){
		    array_push($output,"0");
	}

// array runs from Jan-Dec, so we need to split to account for Enactus year (May-Apr)
$output_firsthalf=array_slice($output,4);	// take from 5th value (ie. MAY) onwards
$output_secondhalf=array_slice($output,0,4);	// take up to 4th value (ie. APRIL)
$output=array_merge($output_firsthalf, $output_secondhalf); // re-merge array to run from May to Apr

$output1=json_encode($output);

//
// LAST YEAR
//

$getdata=$pdo->prepare("
	SELECT MONTH(tprdate) as month, COUNT(tprid) as count FROM tprtable 
	WHERE discussedtopics LIKE '%$topic%'
	AND (tprdate BETWEEN '$nationals2014' AND '$nationals2015')
	GROUP BY MONTH(tprdate)
	");
$getdata->execute();

$showdata=array();
$output=array();

while($row=$getdata->fetch(PDO::FETCH_ASSOC)){ 
	$month=$row['month']; $count=$row['count'];
	$showdata[]=$row;
}

$arraycount=0;

foreach($showdata as $key=>$value){
	$int_month=intval($value['month']);	// Turn the month part of the array into an integer
	$int_count=intval($value['count']);	// Turn the count part of the array into an integer
	$int_key=intval($key);				// Turn the array key in to an integer
	
	if($int_month<>$int_key+1+$arraycount){	// If the key DOES NOT EQUAL the month plus the month's position, then
		$difference=($int_month-($int_key+1+$arraycount)); // find out how many blanks
		for($x=0;$x<$difference;$x++){
			array_push($output,"0");		// put a blank value for every 0 hour month
		}
		array_push($output,$int_count);		// once enough blank spaces have been added, enter the count
		$arraycount=$arraycount+$difference;
	} else {
		array_push($output,$int_count);
	}
}
// Make sure there are 12 entries in the array
	$under=12-count($output);
	for($x=0;$x<$under;$x++){
		    array_push($output,"0");
	}

// array runs from Jan-Dec, so we need to split to account for Enactus year (May-Apr)
$output_firsthalf=array_slice($output,4);	// take from 5th value (ie. MAY) onwards
$output_secondhalf=array_slice($output,0,4);	// take up to 4th value (ie. APRIL)
$output=array_merge($output_firsthalf, $output_secondhalf); // re-merge array to run from May to Apr
	
$output2=json_encode($output);

?>