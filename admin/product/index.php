<?php
    require_once ('../../db/dbhelper.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Sản Phẩm</title>
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
        <li class="nav-item">
            <a class="nav-link" href="../category">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link active" href="#">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../bill">Thông tin Hóa Đơn</a>
        </li>
    </ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
                <a href="add.php">
                    <button class="btn btn-success" style="margin-bottom: 10px;">Thêm Sản Phẩm</button>
                </a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Bán</th>
                            <th>Danh Mục</th>
                            <th>Ngày Tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //Lấy danh sách danh mục từ database
                            $sql = "SELECT product.id,product.title, product.price,product.updated_at ,product.thumbnail, category.name category_name FROM product
                                    left join category on product.id_category = category.id";
                            $productList = executeResult($sql);
                            $index=1;
                            foreach ($productList as $item) {
                                echo '<tr>
                                        <td>'.($index++).'</td>
                                        <td><img src="'.$item['thumbnail'].'" style="max-width:100px"/></td>
                                        <td>'.$item['title'].'</td>
                                        <td>'.number_format($item['price'], 0, ',', '.').'đ</td>
                                        <td>'.$item['category_name'].'</td>
                                        <td>'.$item['updated_at'].'</td>
                                        <td>
                                            <a href="add.php?id='.$item['id'].'">
                                                <button class="btn btn-warning">Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">Xóa</button>
                                        </td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>

    <script type="text/javascript">
        function deleteProduct(id, name){
            var option = confirm('Bạn có chắc chắn muốn xóa sản phẩm này không');
            if(!option) {
                return;
            }

            console.log(id)
            $.post('ajax.php', {
                'id' :id,
                'action' : 'delete'
            }, function(data) {
                location.reload();
            })
        }
    </script>
</body>
</html>