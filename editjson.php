
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

  $id = (int) $_GET["id"];
  $data = file_get_contents('sinhvien.json');
  $data_array = json_decode($data, true);
  $row = $data_array["sinhvien"][$id];
  
if(isset($_POST['luu']))
{	
	
	$update_arr = array(
			'hoten' => $_POST['hoten'],
			'mssv' => $_POST['mssv'],
			'ngaysinh' => $_POST['ngaysinh']
			
		);
 
		$data_array["sinhvien"][$id] = $update_arr;
 
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('sinhvien.json', $data);
 
		header('location: index.php');
}

?>


<div class="container">
    <h2>sửa thông tin sinh viên</h2>
    <?php if (isset($_GET["id"])): ?>
  <form  method="POST">
    <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id"/>
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" value="<?php echo $row["hoten"] ?>" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="<?php echo $row["mssv"] ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  value="<?php echo $row["ngaysinh"] ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="luu">Lưu</button>


  </form>
  <?php endif; ?>


  
</div>
</body>
</html>


