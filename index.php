<?php include_once 'db.php'; ?>
<?php include_once 'includes/header.php'; ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Trang Quản Lý Cầu Thủ</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Play Soccer</li>
    </ol>
    
    </div>
<?php
$style = "<style>
          .container {
            width: 80%;
            margin: 0 auto;
          }
          </style>";
echo $style;

$content = "<div class='container'>
            <h1>Hello !</h1>
            <p>Chào mừng đã đến với webside của chúng tôi</p>
            <img src='public/uploads/bruss.png' alt='description of image' width=500 height=300> 
            <img src='public/uploads/city.jpg' alt='description of image' width=500 height=300>
            </div>";
echo $content;
?>



<?php include_once 'includes/footer.php'; ?>
