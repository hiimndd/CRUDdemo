<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$read = file('sinhvien.txt');

$id = (int)$_GET["id"];

if(isset($_POST['luu'])) {

$myfilew = fopen("sinhvien.txt", "w") or die("Unable to open file!");
$file = $read;
$sumid = -1;
foreach($file as $sv){
  $sumid ++;
}
if($id == 0){
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
  fwrite($myfilew, $txt);
  fclose($myfilew);
}else{
  $head = "";
  for($i = 0;$i<$id;$i++){
    $head .= $file[$i];
  }
  fwrite($myfilew, $head);
  fclose($myfilew);
  $myfilea = fopen("sinhvien.txt", "a") or die("Unable to open file!");
  
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
  fwrite($myfilea, $txt);
  fclose($myfilea);

}
$myfilea = fopen("sinhvien.txt", "a") or die("Unable to open file!");
$end = "";
  for($i = $id+1;$i<=$sumid;$i++){
    $end .= $file[$i]."\n";
  }
  fwrite($myfilea, $end);
  fclose($myfilea);
	header('location:index.php');
}

$hoten = "";
$mssv = "";
$ngaysinh = "";
$arr = array($read[$id]);
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
          for($i = $vitri2+2;$i < strlen($line); $i++ ){
            $ngaysinh .= $line[$i];
          }
          
        }
    }
  }
}
}




?>


<div class="container">
    <h2>sửa thông tin sinh viên</h2>
    <?php if (isset($_GET["id"])):  ?>
      <form method="post">
	<input type="hidden" value="<?php echo $id ?>" name="id"/>
    <div class="form-group">
    
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" value="<?php echo $hoten ?>" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="<?php echo trim($mssv) ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  value="<?php echo trim($ngaysinh); ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="luu">Lưu</button>
  <?php endif; ?>
  </form>

  
</div>
</body>
</html>