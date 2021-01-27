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

<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>
  <a href="student.php"><button type="button" class="btn btn-default">Thêm</button></a>           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" class="form-control" id="usr"></td>
        <td><input type="text" class="form-control" id="usr"></td>
        <td><input type="text" class="form-control" id="usr"></td>
        <td><button type="button" class="btn btn-primary">Sửa</button></td>
        <td><button type="button" class="btn btn-default">Xóa</button></td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td><button type="button" class="btn btn-primary">Sửa</button></td>
        <td><button type="button" class="btn btn-default">Xóa</button></td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td><button type="button" class="btn btn-primary">Sửa</button></td>
        <td><button type="button" class="btn btn-default">Xóa</button></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
