
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
function loadtext($file){
  $read = $file;
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
function loadjson(){
  $name ="";
  $mssv = "";
  $ngaysinh = "";
  $read = file('json.php');
    foreach ($read as $line) {
    // echo $line ."<br> ";
    $arr = json_decode($line, true);
    echo $arr["hoten"]."<br>";
    
    }
    
}


?>
<div class="container">
  <h2>Danh sách sinh viên</h2>
  
  <a href="student.php?type=text"><button type="button" class="btn btn-default" name="bttxt">Thêm vào file text</button></a> 
  <a href="student.php?type=json"><button type="button" class="btn btn-default " name="btjson">Thêm vào file Json</button></a> 
  <a href="student.php?type=xml"><button type="button" class="btn btn-default" name="btxml" >Thêm vào file xml</button></a>
		
  
  
  <p>file text</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
    <?php
      loadtext(file('sinhvien.txt'));
    ?>
  </table>
  <p>file json</p>
  <table class="table table-striped">
  <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
  <?php 
            $getfile = file_get_contents('sinhvien.json');
            $jsonfile = json_decode($getfile);
            foreach ($jsonfile->sinhvien as $index => $obj) {
            ?>
      <tr>
        <td><?php echo $obj->hoten."<br>"; ?></td>
        <td><?php echo $obj->mssv."<br>"; ?></td>
        <td><?php echo $obj->ngaysinh."<br>"; ?></td>
        <td><a href = "editjson.php?id=<?php echo $index; ?>"><button type="button" class="btn btn-primary">sửa</button><a> </a><a href = "deletejson.php?id=<?php echo $index; ?>" onclick="return confirm('Bạn có chắc muốn xóa thông tin này trong file json?')"><button type="button" class="btn btn-primary">xóa</button></a></td>
        
        <?php } ?>
      </tr>
    </tbody>
  </table>

  <p>file xml</p>
  <table class="table table-striped">
  <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
  <?php 
           $xml=simplexml_load_file("sinhvien.xml") or die("Error: Cannot create object");
           
           foreach($xml->children() as $sv ) {

            ?>
            
      <tr>
        <td><?php echo $sv->hoten."<br>"; ?></td>
        <td><?php echo $sv->mssv."<br>"; ?></td>
        <td><?php echo $sv->ngaysinh."<br>"; ?></td>
        <td><a href = "editxml.php?id=<?php echo $sv['id']; ?>"><button type="button" class="btn btn-primary">sửa</button><a> </a><a href = "deletexml.php?id=<?php echo $sv['id']; ?>"  onclick="return confirm('Bạn có chắc muốn xóa thông tin này trong file xml?')"><button type="button" class="btn btn-primary">xóa</button></a></td>
        <?php } ?>
        
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
