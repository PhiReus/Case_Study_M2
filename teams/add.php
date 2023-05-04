<?php
    include_once '../db.php';?>
<?php
    //Xu ly form
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        // print_r( $_REQUEST );
        // die();
        // $MASACH = $_REQUEST['id'];
        
        $clb = $_REQUEST['clb'];
        $country = $_REQUEST['country'];
        $image = '';
        $image = $row['image'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
          $uploadDir = ROOT_DIR . '/public/uploads/';
          $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    
          if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $image = '/public/uploads/' . $_FILES['image']['name'];
          }
        }
        
        


        //Viet cau truy van
        $sql = "INSERT INTO teams(name,country,image) VALUES('$clb','$country','$image')";
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

<div class="container-fluid px-4">
<h2>Thêm mới thể loại</h2>
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">CLB</label>
    <input type="text" class="form-control" name="clb">
  </div>
  <div class="mb-3">
    <label  class="form-label">QUỐC GIA</label>
    <input type="text" class="form-control" name="country">
  </div>
  <div class="mb-3">
    <label  class="form-label">ẢNH</label>
    <input type="file" class="form-control" name="image">
  </div>
  <input type="submit" value="Them">
</form>

</div>