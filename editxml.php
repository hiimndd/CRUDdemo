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
$products = simplexml_load_file('sinhvien.xml');



if(isset($_POST['luu'])) {
  $id = (int)$_POST['id'];
  $filexml = new filexml($_POST["hoten"],$_POST["mssv"],$_POST["ngaysinh"]);
  $filexml->update($id);
}



foreach($products->children() as $sv){
	if($sv['id']== $_GET['id']){
		$id = $sv['id'];
		$hoten = $sv->hoten;
    $mssv = $sv->mssv;
    $ngaysinh = $sv->ngaysinh;
		break;
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
        <input type="text" class="form-control" id="mssv" value="<?php echo $mssv ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  value="<?php echo $ngaysinh ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="luu">Lưu</button>
  <?php endif; ?>
  </form>

  
</div>
</body>
</html>

