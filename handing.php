<?php
// class sinhvien {
//     public $hoten;
//     public $mssv;
//     public $ngaysinh;
//     function __construct($hoten,$mssv,$ngaysinh) {
//         $this->ngaysinh = $ngaysinh;
//         $this->mssv = $mssv;
//         $this->ngaysinh = $ngaysinh
//       }
//       function get_hoten() {
//         return $this->$hoten;
//       }
//       function get_mssv() {
//         return $this->$mssv;
//       }
//       function get_ngaysinh() {
//         return $this->$ngaysinh;
//       }

      
// }
// function hienthi() {

//     $myfile = fopen("sinhvien.txt", "r") or die("Unable to open file!");

// while(!feof($myfile)) {
//   echo fgets($myfile) ;
// }
// fclose($myfile);
// }

function filetext(){
  $myfile = fopen("sinhvien.txt", "a") or die("Unable to open file!");
  $txt = "";
  if(isset($_POST["hoten"])){
    
    $txt = $txt.$_POST["hoten"].", ";
    
  }
  if(isset($_POST["mssv"])){
    $txt = $txt.$_POST["mssv"].", ";
    
  }
  if(isset($_POST["ngaysinh"])){
    $txt = $txt.$_POST["ngaysinh"]."\n";
  }
  echo $txt;
  fwrite($myfile, $txt);
  fclose($myfile);
  

}
function filejson(){
  // $file = fopen("json.php", "a") or die("Unable to open file!");
  // $sinhvien = array("hoten"=>$_POST["hoten"], "mssv"=>$_POST["mssv"], "ngaysinh"=>$_POST["ngaysinh"]);
  
  // fwrite($file,json_encode($sinhvien)."\n");
  // fclose($file);
  
    $file = file_get_contents('sinhvien.json');
    $data = json_decode($file, true);
    unset($_POST["them"]);
    $data["sinhvien"] = array_values($data["sinhvien"]);
    array_push($data["sinhvien"], $_POST);
    file_put_contents("sinhvien.json", json_encode($data));




}
function filexml(){
  $loadxml=simplexml_load_file("sinhvien.xml") or die("Error: Cannot create object");
    $i = -1;
    foreach($loadxml->children() as $sv) {
    $i ++;
    }
    foreach($loadxml->children() as $sv) {
      if($sv["id"] == $i){
        $i++;
      }
       
    

    }
    
  // echo $sinhvien = $xpath->query('/sinhvien/ttsv[id]')->item($i);
  // $sv['id'] = $i;
  // $xml = new DomDocument();
  // $xml->preserveWhitespace = false;
  // $xml->load('sinhvien.xml');
  // $xpath = new DOMXPath($xml);
  // $sinhvien = $xpath->query('/sinhvien/ttsv')->item($i-1);

  // $ttsv =$xml->createElement("ttsv");
  // $sinhvien->appendChild($ttsv);

  // $name =$xml->createElement("hoten",$_POST["hoten"]);
  // $ttsv->appendChild($name);

  // $mssv =$xml->createElement("mssv",$_POST["mssv"]);
  // $ttsv->appendChild($mssv);

  // $ngaysinh =$xml->createElement("ngaysinh",$_POST["ngaysinh"]);
  // $ttsv->appendChild($ngaysinh);


  // $sinhvien->parentNode->insertBefore($ttsv, $sinhvien->nextSibling);
  // $xml->save("sinhvien.xml");


  
    $products = simplexml_load_file('sinhvien.xml');
    $product = $products->addChild('ttsv');
    $product->addAttribute('id',$i);
    $product->addChild('hoten', $_POST['hoten']);
    $product->addChild('mssv', $_POST['mssv']);
    $product->addChild('ngaysinh', $_POST['ngaysinh']);
    file_put_contents('sinhvien.xml', $products->asXML());

}


?>