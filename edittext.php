<?php
  include 'handing.php';
?>

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
$id = (int)$_GET["id"];

$read = file("sinhvien.txt");

if(isset($_POST['luu'])) {
  $filetxt = new filetext($_POST["hoten"],$_POST["mssv"],$_POST["ngaysinh"]);
  $filetxt->update($id);
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