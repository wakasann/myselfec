<?php

/**
* 2018年10月B080702开考科目
* datasouse
* @link http://www.szzikao.net/kaoshi/2017/0929/8584.html
*/

$dataSource = array(
	'first_day' => [
		'am' => [
		   '00024',
		   '02197',
		   '02318',
		   '02324',
		   '02331',
		   '03709',
		   '04747'	
		],
		'pm' => [
			'00023',
			'00342',
			'02326',
			'04730',
			'04735'	
		]
	],
	'second_day' => [
		'am' => [
			'02325',
			'03708',
			'04737',	
		],
		'pm' => [
			'00015',
			'02333',
			'04741'	
		]
	]
);

function debug($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function firstTimeCombintion($amArray,$pmArray){
	$result = array();
	foreach ($amArray as $key => $value) {
		foreach ($pmArray as $key2 => $value2) {
			$result[] = array(
				$value,$value2
			);
		}
	}
	return $result;
}


$firstDayArray = $dataSource['first_day'];
$secondDayArray = $dataSource['second_day'];

$firstCombination = firstTimeCombintion($firstDayArray['am'],$firstDayArray['pm']);
$secondCombination = firstTimeCombintion($secondDayArray['am'],$secondDayArray['pm']);

//debug($firstCombination);
//debug($secondCombination);

$result = array();
foreach ($firstCombination as $key => $value) {
	foreach ($secondCombination as $k2=> $v2) {
		$tempCombination = $value;
		$tempCombination[] = $v2[0];
		$tempCombination[] = $v2[1];
		$result[] = $tempCombination;
	}
}

//debug($result);

$firstKey = '';

echo '<table border="1"  cellpadding="10" cellspacing="0">';
foreach ($result as $key => $value) {
	if($value[0] != $firstKey){
		echo '<tr bgcolor="orange" style="border-top:5px solid red;">';
		$firstKey = $value[0];
	}else{

		echo '<tr>';
	}
	
	echo '<td><input value="'.$value[0].'" readonly/></td>';
	echo '<td><input value="'.$value[1].'" readonly/></td>';
	echo '<td><input value="'.$value[2].'" readonly/></td>';
	echo '<td><input value="'.$value[3].'" readonly/></td>';
	echo '</tr>';
}
echo '</table>';