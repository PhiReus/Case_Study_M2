<?php
    include_once '../db.php';?>
<?php
    //Xu ly form
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        // print_r( $_REQUEST );
        // die();
        // $MASACH = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];

       
        


        //Viet cau truy van
        $sql = "INSERT INTO tournaments(name,start_date,end_date) VALUES('$name','$start_date','$end_date')";
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
<h3>Thêm Giải Đấu</h3>
<form action="" method="post">
  <div class="mb-3">
    <label  class="form-label">TÊN GIẢI ĐẤU</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label  class="form-label">NGÀY BẮT ĐẦU</label>
    <input type="text" class="form-control" name="start_date">
  </div>
  <div class="mb-3">
  <label  class="form-label">NGÀY KẾT THÚC</label>
    <input type="text" class="form-control" name="end_date">
  </div>
  <input type="submit" value="Them">
</form>

</div>