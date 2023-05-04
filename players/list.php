<?php include_once '../db.php'; ?>
<?php
$sql = "SELECT * FROM `players`";

if( isset( $_GET["s"] )  ){
    $s = $_GET["s"];
    $sql .= " WHERE players.name LIKE '%$s%'";

}
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$players = $stmt->fetchAll();
?>
<?php include_once '../includes/header.php'; ?>
<div class="container-fluid px-4">
    <h2>Quản Lý Cầu Thủ</h2>
    <br><br>
<a class="btn btn-warning" href="add.php"> Thêm mới </a>
<br><br>

    <table border="1" class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Cầu Thủ</th>
                <th>Ngày Sinh</th>
                <th>Quốc Gia</th>
                <th>Ảnh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $key => $row) :
                // echo '<pre>';
                // print_r($row);
                // die();
            ?>
                <tr>
                    <td> <?php echo  $key + 1; ?> </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><img width="100" src="<?php echo ROOT_URL . $row['image'];?>" alt=""> </td>

                    <td style="display: flex;">
                        <a class="btn btn-primary" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once '../includes/footer.php'; ?>