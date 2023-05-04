<?php
include_once '../db.php'; //$conn
// echo '<pre>';
// print_r($_GET);
// die();


//Lay gia tri ID tren URL
$id = intval($_GET['id']);
//lay du lieu theo ID
$sql = "SELECT * FROM `tournaments` WHERE id = $id";
//Debug sql
// var_dump($sql);
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

//Lấy về dữ liệu duy nhat
$row = $stmt->fetch();

//  echo '<pre>';
// print_r($row);
// die();
//Xu ly form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // echo '<pre>';
  // print_r( $_REQUEST );
  // die();
  $name = $_REQUEST['name'];
  $start_date = $_REQUEST['start_date'];
  $end_date = $_REQUEST['end_date'];

  //Viet cau truy van
  $sql = "UPDATE `tournaments` SET 
        `name`= ' $name',
        `start_date`='$start_date',
        `end_date`='$end_date'
         WHERE id = $id
        ";



  //Debug sql
  // var_dump($sql);
  // die();

  //Thuc hien truy van
  $conn->exec($sql);

  //Chuyen huong
  header("Location: list.php");
}

?>

<?php include_once '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <form action="" method="post">
    <div class="mb-3">
      <label class="form-label">TÊN GIẢI ĐẤU</label>
      <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">NGÀY BẮT ĐẦU</label>
      <input type="text" class="form-control" name="start_date" value="<?= $row['start_date']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">NGÀY KẾT THÚC</label>
      <input type="text" class="form-control" name="end_date" value="<?= $row['end_date']; ?>">
    </div>
    <input type="submit" value="Them">
  </form>
  <?php include_once '../includes/footer.php'; ?>
</body>

</html>