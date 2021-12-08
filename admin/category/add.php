<?php
    require_once ('../../db/dbhelper.php');
    $id=$name='';
    if(!empty($_POST)){
        if(isset($_POST['name'])) {
            $name=$_POST['name'];
        }
        if(isset($_POST['id'])) {
            $id=$_POST['id'];
        }
        if(!empty($name)) {
            $created_at=$updated_at=date('Y-m-d H:i:s');
            if($id == '' ){
                $sql = "INSERT INTO category (name, created_at, updated_at) VALUES ('$name','$created_at','$updated_at')";
            } else {
                $sql = "UPDATE category SET name ='$name', updated_at='$updated_at' where id = '$id'";
            }
            execute($sql);
            header('Location: index.php');
            exit(); 
        }
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "Select * from category where id='$id'";
        $category = executeSingleResult($sql);
        if($category!=null){
            $name = $category['name'];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Danh Mục Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <ul class="nav nav-tabs">
        <li class="nav-item active">
            <a class="nav-link active" href="index.php">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../bill">Thông tin Hóa Đơn</a>
        </li>
    </ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                        <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
                        <button class="btn btn-success">Lưu</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
</body>
</html>