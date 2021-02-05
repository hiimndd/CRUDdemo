<?php
abstract class sinhvien {
    public $hoten;
    public $mssv;
    public $ngaysinh;
    public $chain ;
    abstract function loaddata();
    function __construct($hoten,$mssv,$ngaysinh) {
        $this->hoten = $hoten;
        $this->mssv = $mssv;
        $this->ngaysinh = $ngaysinh;
      }
      public function get_hoten() {
        return $this->hoten;
      }
      public function get_mssv() {
        return $this->mssv;
      }
      public function get_ngaysinh() {
        return $this->ngaysinh;
      }

      
}
class filetext extends sinhvien{
  function loaddata(){
    $myfile = fopen("sinhvien.txt", "a") or die("Unable to open file!");
    
    $read = file('sinhvien.txt');
    $sumid = 0;
    foreach($read as $sv){
      $sumid++;
    }
    for($a = 0;$a < $sumid;$a++){
    $hoten = "";
    $mssv = "";
    $ngaysinh = "";
    $arr = array($read[$a]);

    foreach ($arr as $line) {
      for($i = 0 ; $i < strlen($line); $i++){
        if($line[$i] === ","){
          $vitri1 = $i-1 ;
          for($i = 0;$i <= $vitri1; $i++ ){
            $hoten .= $line[$i];
          }
          for($i = $vitri1+2;$i < strlen($line) ; $i++ ){
            if($line[$i] === ","){
              $vitri2 = $i ;
              for($i = $vitri1+2;$i < $vitri2; $i++ ){
                $mssv .= $line[$i];
              }
              if(trim($mssv) == trim($this->get_mssv())){
                echo "Trùng mã sinh viên!"; 
                return 0;
              }else{
               break;
              }
            }
              
            }
        }
      }
    }
    }
  $this->chain .= $this->get_hoten().", ";
  $this->chain .= $this->get_mssv().", ";
  $this->chain .= $this->get_ngaysinh()."\n";
  fwrite($myfile, $this->chain);
  fclose($myfile);
  }
  
}

class filejson extends sinhvien{
  function loaddata(){
    $file = file_get_contents('sinhvien.json');
    $data = json_decode($file, true);
    $data["sinhvien"] = array_values($data["sinhvien"]);
    $sinhvien = array("hoten"=>$_POST["hoten"], "mssv"=>$_POST["mssv"], "ngaysinh"=>$_POST["ngaysinh"]);
    array_push($data["sinhvien"], $sinhvien);
    file_put_contents("sinhvien.json", json_encode($data));
  
  }
}


function filetext(){
  $move = new filetext($_POST["hoten"],$_POST["mssv"],$_POST["ngaysinh"]);
  $move->loaddata();
  

}
function filejson(){
  // $file = fopen("json.php", "a") or die("Unable to open file!");
  // $sinhvien = array("hoten"=>$_POST["hoten"], "mssv"=>$_POST["mssv"], "ngaysinh"=>$_POST["ngaysinh"]);
  
  // fwrite($file,json_encode($sinhvien)."\n");
  // fclose($file);
  
    $file = file_get_contents('sinhvien.json');
    $data = json_decode($file, true);
    $data["sinhvien"] = array_values($data["sinhvien"]);
    $sinhvien = array("hoten"=>$_POST["hoten"], "mssv"=>$_POST["mssv"], "ngaysinh"=>$_POST["ngaysinh"]);
    array_push($data["sinhvien"], $sinhvien);
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