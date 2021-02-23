<?php
abstract class sinhvien {
    public $hoten;
    public $mssv;
    public $ngaysinh;
    public $chain ;
    abstract function create();
    abstract function display();
    // abstract function update();
    // abstract function delete();
    
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
  function create(){
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
  header("location: index.php");
  }
  function display(){
    
  
      $read = file('sinhvien.txt');
      echo "<tbody>";
  $name= "";
  $mssv ="";
  $ngaysinh = "";
  $id = 0;
    foreach ($read as $line) {
      for($i = 0 ; $i < strlen($line); $i++){
        echo "<tr>";
        if($line[$i] === ","){
          $vitri1 = $i-1 ;
          echo "<td>";
          for($i = 0;$i <= $vitri1; $i++ ){
            $name = $line[$i];
            echo $name;
          }
          echo "</td>";
          echo "<td>";
          for($i = $vitri1+2;$i < strlen($line) ; $i++ ){
            if($line[$i] === ","){
              $vitri2 = $i ;
              for($i = $vitri1+2;$i < $vitri2; $i++ ){
                $mssv = $line[$i];
                echo $mssv;
              }
              echo "</td>";
              echo "<td>";
              for($i = $vitri2+2;$i < strlen($line); $i++ ){
                $ngaysinh = $line[$i];
                echo $ngaysinh;
              }
              
              echo "</td>";
              $index = $id ++;
              echo "<td>";
              
              echo "<a href = '"."edittext.php?id=".$index."'><button type='"."button"."' class='"."btn btn-primary"."'>"."sửa"."</button><a> </a>";
              echo "<a href = '"."deletetext.php?id=".$index."'><button type='"."button"."' class='"."btn btn-primary"."'>"."xóa"."</button><a> </a>";


            }
        }
      }
      echo "</tr>";
    }
  
  }
  echo "</tbody>";
  
  
}

// class filejson extends sinhvien{
//   function create(){
//     $file = file_get_contents('sinhvien.json');
//     $data = json_decode($file, true);
//     $data["sinhvien"] = array_values($data["sinhvien"]);
//     foreach($data["sinhvien"] as $key => $value ) {
//       if($this->get_mssv() == $value["mssv"]){
//            echo "Trùng mã sinh viên!";
//            return 0; 
//         }       
//     }
//     $this->chain = array("hoten"=>$this->get_hoten(), "mssv"=>$this->get_mssv(), "ngaysinh"=>$this->get_ngaysinh());
//     array_push($data["sinhvien"], $this->chain);
//     file_put_contents("sinhvien.json", json_encode($data));
//     header("location: index.php");
  
//   }
// }

// class filexml extends sinhvien{
//   function create(){
//     $loadxml=simplexml_load_file("sinhvien.xml") or die("Error: Cannot create object");
//     foreach($loadxml->children() as $sv ) {
//       if($sv->mssv == $this->get_mssv()){
//         echo "Trùng mã sinh viên!";
//         return 0;
//       }
//     }
//     $i = 0;
//     foreach($loadxml->children() as $sv) {
//     $i ++;
//     }
//     foreach($loadxml->children() as $sv) {
//       if($sv["id"] == $i){
//         $i++;
//       }
//     }
//     $products = simplexml_load_file('sinhvien.xml');
//     $product = $products->addChild('ttsv');
//     $product->addAttribute('id',$i);
//     $product->addChild('hoten', $this->get_hoten());
//     $product->addChild('mssv', $this->get_mssv());
//     $product->addChild('ngaysinh', $this->get_ngaysinh());
//     file_put_contents('sinhvien.xml', $products->asXML());
//     header("location: index.php");
//   }
}




?>