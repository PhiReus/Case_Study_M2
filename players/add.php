<?php
    include_once '../db.php';?>
<?php
      $sql = "SELECT * FROM `teams`";
      $stmt = $conn->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
      $categories = $stmt->fetchAll();
    //Xu ly form
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        // print_r( $_REQUEST );
        // die();
        // $MASACH = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $date = $_REQUEST['date'];
        $country = $_REQUEST['country'];
        $ANH = '';
        $team_id = $_REQUEST['team_id'];


        if (isset($_FILES['image']))
        {
            if (!$_FILES['image']['error'])
            {
                move_uploaded_file($_FILES['image']['tmp_name'], ROOT_DIR.'/public/uploads/'.$_FILES['image']['name']);
                $ANH = '/public/uploads/'.$_FILES['image']['name'];
            }
        }
        


        //Viet cau truy van
        $sql = "INSERT INTO players(name,date,country,image,team_id) VALUES('$name','$date','$country','$ANH','$team_id')";
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
<h3>THÊM CẦU THỦ</h3>
<form action="" method="post" enctype="multipart/form-data">

  <div class="mb-3">
    <label  class="form-label">TÊN CẦU THỦ</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label  class="form-label">NGÀY SINH</label>
    <input type="text" class="form-control" name="date">
  </div>
  <div class="mb-3">
  <label  class="form-label">QUÓC GIA</label>
    <input type="text" class="form-control" name="country">
  </div>
  <div class="mb-3">
  <label  class="form-label">ẢNH</label>
    <input type="file" class="form-control" name="image">
  </div>
  <div class="mb-3">
    <label  class="form-label">CLB</label>
    <select name="team_id" class="form-control">
    <?php foreach( $categories as $category ): ?>
      <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <input type="submit" value="Them">
</form>

</div>