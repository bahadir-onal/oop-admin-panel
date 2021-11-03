<?php 

$_POST=[
	"ad" => "emrah",
	"soyad" => "yüksel",
	"kurs" => "php",
	"fiyat" => 30
];

// echo "<pre>";
// print_r($_POST);

// echo print_r(array_values($_POST));

//array_map

// function islem($deger) {

// 	return($deger."=?,");
// }



// $sonuc=array_map("islem",$_POST);
// print_r($sonuc);


//array_keys
// echo "<pre>";
print_r($_POST);

function addValue($argse) {

	$values=implode(',',array_map(function ($item){
		return $item.'=?';
	},array_keys($argse)));

	return $values;
}
echo "<br>";
echo addValue($_POST);
echo "<br>";
echo print_r(array_values($_POST))
?>