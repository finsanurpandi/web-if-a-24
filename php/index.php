<?php
require('header.php');
include_once('nav.php');
// include('main.php');
// include('footer.php');

echo "Hello";
echo "<h3>Empty Function</h3>";
function testEmpty($nilai="")
{
    if(!empty($nilai)) {
        echo "Nilai yang dimasukan adalah ".$nilai;
        echo "<br/>";
    } else {
        echo "Variabel tidak memiliki nilai";
        echo "<br/>";
    }
}

testEmpty();
testEmpty(18);
testEmpty("");
testEmpty(null);
testEmpty("Hello...");

echo "<h3>Isset Function</h3>";
function testIsset($nilai=null)
{
    if(isset($nilai)) {
        if(empty($nilai)) {
            echo "Nilai sudah ada yaitu nilai kosong <br/>";
        } else {
            echo "Nilai sudah ada yaitu nilai $nilai <br/>";
        }
    } else {
        echo "Variable nilai belum terbentuk <br/>";
    }
}

$val = "";
testIsset();
testIsset($val);
testIsset(10);

echo "<h3>Unset Function</h3>";
function testUnset($nilai=null)
{
    if(!isset($nilai)) {
        echo "Variabel sudah tidak tersedia <br/>";
    } else {
        echo "Variabel tersedia <br/>";
    }
}

$valX = "";
$data = 100;
testUnset();
testUnset($valX);
testUnset($data);
unset($data);
testUnset(@$data);

echo "<h3>Modifikasi String</h3>";
$teks = 'Universitas Suryakancana';
echo substr($teks, 0, 11);
echo "<br/>";
echo substr($teks, 12);
echo "<br/>";
echo substr($teks, -4);
echo "<br/>";
echo substr($teks, -8, 4);
echo "<br/>";
echo strstr($teks, 'e');
echo "<br/>";
echo str_replace('universitas', 'University', $teks);

$teks2 = "ini adalah tanda tanya :tandatanya, ini adalah tanda seru :tandaseru, ini adalah tanda panah :tandapanah";
echo "<br/>";
echo $teks2;
echo "<br/>";
$cari = array(':tandatanya', ':tandaseru', ':tandapanah');
$ganti = array('(?)', '(!)', '(-->)');
echo str_replace($cari, $ganti, $teks2);
echo "<br/>";
echo strtoupper($teks);
echo "<br/>";
echo strtolower($teks);
echo "<br/>";
echo ucfirst($teks2);
echo "<br/>";
echo ucwords($teks2);

echo "<h3>Gabungan String</h3>";
// explode
$part = explode(" ", $teks2);
var_dump($part);
// implode
echo "<br/>";
echo implode("_gabung_", $part);
// menghitung jumlah srting
echo "<br/>";
echo strlen($teks2);
echo "<br/>";

function modifikasiString($string)
{
    $panjangString = strlen($string);
    $newText = "";
    for ($i=0; $i < $panjangString; $i++) { 
        if($i % 2) {
            $newText .= strtoupper(substr($string, $i, 1));
        } else {
            $newText .= strtolower(substr($string, $i, 1));
        }
    }

    echo $newText;
}

modifikasiString("Lorem ipsum dolor sit amet");