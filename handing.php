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
    
    $txt = "\n".$txt.$_POST["hoten"].", ";
    
  }
  if(isset($_POST["mssv"])){
    $txt = $txt.$_POST["mssv"].", ";
    
  }
  if(isset($_POST["ngaysinh"])){
    $txt = $txt.$_POST["ngaysinh"];
  }
  echo $txt;
  fwrite($myfile, $txt);
  fclose($myfile);
  

}
function filejson(){
  $file = fopen("json.php", "a") or die("Unable to open file!");
  $sinhvien = array("hoten"=>$_POST["hoten"], "mssv"=>$_POST["mssv"], "ngaysinh"=>$_POST["ngaysinh"]);
  
  fwrite($file,json_encode($sinhvien)."\n");
  fclose($file);
}


?>