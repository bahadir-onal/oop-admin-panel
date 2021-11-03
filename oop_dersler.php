<?php 

// class Kitap {

// 	//Özellik

// 	public $ad, $yazar, $fiyat;


// 	//Metod

// 	public function insert($ad,$yazar,$fiyat) {

// 		$this->ad=$ad;
// 		$this->yazar=$yazar;
// 		$this->fiyat=$fiyat;
// 	}

// 	public function listele() {

// 		echo 'Kitap Adı '.$this->ad.'<br>';
// 		echo 'Kitap Yazar '.$this->yazar.'<br>';
// 		echo 'Kitap Fiyat '.$this->fiyat.'<br>';
// 	}


// }


// $php=new Kitap();
// $php->insert("PHP","Emrah Yüksel","52");

// $php->listele();



// Class KurucuYikici {


// public function __construct()
//  {

//  	echo "Başladı...";

//  }


//  public function __destruct() {

//  	echo "Bitti...";
//  }
// }

// $islem=new KurucuYikici();



// class Kitap {

// 	//Özellik

// 	public $ad, $yazar, $fiyat;


// 	//Metod

// 	public function insert($ad,$yazar,$fiyat) {

// 		$this->ad=$ad;
// 		$this->yazar=$yazar;
// 		$this->fiyat=$fiyat;
// 	}

// 	public function listele() {

// 		echo 'Kitap Adı '.$this->ad.'<br>';
// 		echo 'Kitap Yazar '.$this->yazar.'<br>';
// 		echo 'Kitap Fiyat '.$this->fiyat.'<br>';
// 	}


// }


// Class Yazilim extends Kitap {


// 	public function __construct() {

// 		echo "Yazılım Kitapları...<br>";
// 	}
// }


// Class BilimKurgu extends Kitap {


// 	public function __construct() {

// 		echo "Bilim Kurgu Kitapları...<br>";
// 	}
// }

// $php=new Yazilim();
// $php->insert("Yazılım","Emrah Yüksel","52");

// $php->listele();

// $php=new BilimKurgu();
// $php->insert("Bilimkurgu","Emrah Yüksel","52");

// $php->listele();




/*

public Her yerden erişilebilir
private Sadece tanımlandığı sınıf içerisinden erişilebilir
protected Tanımlandığı sınıf içerisinden yada miras alma yoluyla erişilebilir.

*/


// class Kitap {

// 	//Özellik

// 	public $ad="PHP";
// 	private $fiyat=52;
// 	protected $yazar="Emrah Yüksel";


// 	//Metod



// }

// Class Yazilim extends Kitap {

// 	public function listele() {

// 		echo 'Kitap Adı '.$this->ad.'<br>';
// 		echo 'Kitap Yazar '.$this->yazar.'<br>';
// 		echo 'Kitap Fiyat '.$this->fiyat.'<br>';
// 	}



// }

// $php=new Yazilim();
// $php->listele();



//OVERRIDE



// Class Ekmek {

// 	protected $kdv;

// 	public function Kdv($fiyat) {

// 		$this->kdv=0.08;
// 		return $this->kdv*$fiyat;

// 	}
// }

// Class Mazot extends Ekmek {

// 	public $kdv;


// 	public function Kdv($fiyat) {

// 		$this->kdv=0.18;
// 		return $this->kdv*$fiyat;

// 	}


// }

// $ekmek=new Ekmek();
// echo "Ekmek KDV....:".$ekmek->Kdv(10);

// $mazot=new Mazot();
// echo "Mazot KDV....:".$mazot->Kdv(10);



// Class Sinif1 {

// 	public static function metod1() {

// 		echo "metod1 içeriği";
// 	}
// }

// Sinif1::metod1();


//INTERFACE

// interface Ekle {


// 	public function ekle($ad);
// }

// interface Listele {

// 	public function Listele();
// }

// Class Alt implements Ekle,Listele {


// 	public $ad;

// 	public function ekle($ad) {

// 		return  $this->ad=$ad;
// 	}

// 	public function Listele() {

// 		echo $this->ad;
// 	}
// }

// $isim=new Alt();
// $isim->ekle("Emrah Yüksel");
// $isim->Listele();

//ÇOK BİÇİMLİLİK POLYMORPHISM


// interface Selamlama {

// 	public function dil($ad);
// }

// Class Turkce implements Selamlama {


// 	public function dil($ad) {

// 		echo "Merhaba....: ".$ad;
// 	}
// }


// Class Ingilizce implements Selamlama {


// 	public function dil($ad) {

// 		echo "Hello....: ".$ad;
// 	}
// }


// $tr=new Turkce();
// $tr->dil("Emrah");

// $en=new Ingilizce();
// $en->dil("Emrah");

//NAMESPACE


// require 'user.php';
// require 'Class/user.php';

// use class1\User;
// use class2\User;

// $a=new User();
// $b=new User();


// $class1=new class1\User();
// $class2=new class2\User();


// function __autoload($class) {

// 	require_once $class.".php";
// }

// spl_autoload_register(function($class){

// 	require_once $class.".php";

// });

// $class1=new Class1();
// $class2=new Class2();



// Class Kitap {

// 	public $ad;
// 	public $yazar;
// 	public $fiyat;
// 	public $yayinevi;

// 	public function ad($ad) {

// 		$this->ad=$ad;
// 		return $this;

// 	}

// 	public function yazar($yazar) {

// 		$this->yazar=$yazar;
// 		return $this;

// 	}

// 	public function fiyat($fiyat) {

// 		$this->fiyat=$fiyat;
// 		return $this;

// 	}

// 	public function yayinevi($yayinevi) {

// 		$this->yayinevi=$yayinevi;
// 		return $this;

// 	}

// 	public function lists() {

// 		echo $this->ad." ".$this->yazar." ".$this->fiyat." ".$this->yayinevi;
// 	}


// }

// $php=new Kitap();

// $php->ad("PHP");
// $php->yazar("Emrah Yüksel");
// $php->fiyat(52);
// $php->yayinevi("EDUKEY");
// $php->lists();

//Zincirleme Metod

// $php->ad("PHP")
// 	->yazar("Emrah Yüksel")
// 	->fiyat(52)
// 	->yayinevi("EDUKEY")
// 	->lists();


//Final


 Class kurs {

	public function yaz() {

		echo "php";
	}
}

Class kurs2 extends kurs {


}

//Class_exists

if (class_exists("kurs")) {
	
	$a=new kurs();

} else {

	echo "Sınıf ismi hatalı";
}


//method_exists

if (method_exists($a, "yaz")) {
	
	echo "Method Var<br>";
	$a->yaz();
} else {

	echo "Böyle bir method yok";
}
