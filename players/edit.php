<?php
include_once '../db.php'; //$conn
// echo '<pre>';
// print_r($_GET);
// die();


//Lay gia tri ID tren URL
$id = $_GET['id'];
//lay du lieu theo ID
$sql = "SELECT * FROM `players` WHERE id = $id";
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
  $date = $_REQUEST['date'];
  $country = $_REQUEST['country'];
  $ANH = '';


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ...
    $ANH = $row['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
      $uploadDir = ROOT_DIR . '/public/uploads/';
      $uploadFile = $uploadDir . basename($_FILES['image']['name']);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $ANH = '/public/uploads/' . $_FILES['image']['name'];
      }
    }
  }


  //Viet cau truy van
  $sql = "UPDATE `players` SET 
        `name`= ' $name',
        `date`='$date',
        `country`='$country',
        `image`='$ANH'
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

  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">TÊN</label>
      <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">NGÀY SINH</label>
      <input type="text" class="form-control" name="date" value="<?= $row['date']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">ĐỊA CHỈ</label>
      <input type="text" class="form-control" name="country" value="<?= $row['country']; ?>">
    </div>
   
    <div class="mb-3">
      <label class="form-label">ẢNH</label>
      <?php if ($row['image']) : ?>
        <img src="<?= ROOT_URL . $row['image']; ?>" alt="<?= ROOT_URL . $row['name']; ?>" style="max-width: 200px;">
      <?php endif; ?>
      <input type="file" class="form-control" name="image">
    </div>
    <input type="submit" value="Them">
  </form>
  <?php include_once '../includes/footer.php'; ?>
</body>

</html>