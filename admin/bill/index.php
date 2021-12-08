<?php
    require_once ('../../db/dbhelper.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thông tin Hóa Đơn</title>
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
        <li class="nav-item">
            <a class="nav-link" href="../product">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link active" href="#">Thông tin Hóa Đơn</a>
        </li>
    </ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thông tin Hóa Đơn</h2>
			</div>
			<div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thông tin</th>
                            <th>Thời gian đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM orders";
                            $orderList = executeResult($sql);
                            $index=1;

                            $sql1 = "SELECT * FROM order_details,product where
                            order_details.product_id=product.id ";
                            $productList = executeResult($sql1);
                            foreach ($orderList as $item) {
                                echo '<tr>
                                        <td  style="width:50px">'.($index++).'</td>
                                        <td>
                                        <span style="width:250px;display:inline-block">'.$item['fullname'].'</span>
                                        SĐT: 
                                        <span style="width:200px;display:inline-block">'.$item['phone_number'].'</span>
                                        Email:
                                        <span>'.$item['email'].'</span></br>
                                        Địa chỉ:
                                        <span>'.$item['address'].'</span></br>
                                        </td>
                                        <td style="width:170px">'.$item['order_date'].'</td>
                                    </tr>';

                                    $total=0;
                                    foreach ($productList as $item1){
                                        if($item1['order_id']==$item['id']){
                                            $total+=$item1['price']*$item1['num'];
                                            echo '
                                            <tr>
                                                <td></td>
                                                <td>    
                                                    <img src="'.$item1['thumbnail'].'" style="max-width:100px"/>
                                                    <span style="width:250px;display:inline-block;padding-left:20px;">'.$item1['title'].'</span>
                                                    <span style="width:150px;display:inline-block;text-align:center">'.$item1['num'].'</span>
                                                    <span style="width:250px;display:inline-block;padding-left:100px;">'.number_format($item1['price']*$item1['num'], 0, ',', '.').'đ</span>
                                                </td>
                                                <td></td>
                                            </tr>';
                                        }
                                        
                                    }
                                    
                                    echo '
                                        <tr >
                                            <td></td>
                                            <td>    
                                                <span style="width:550px;display:inline-block;text-align:right;font-weight:bold;font-size:20px">Tổng đơn: </span>
                                                <span style="display:inline-block;padding-left:50px;font-size:20px;color:red;font-weight:bold">'.number_format($total, 0, ',', '.').'đ</span>
                                                
                                            </td>
                                            <td></td>
                                        </tr>';
                            }

                            // foreach ($productList as $item) {
                            //     echo '<tr>
                            //             <td >
                            //                 <img src="'.$item['thumbnail'].'" style="max-width:100px"/>
                            //                 <span style="width:100px;display:inline-block">'.$item['title'].'</span>
                            //                 <span style="width:50px;display:inline-block">'.$item['num'].'</span>
                            //                 <span style="width:100px;display:inline-block">'.$item['price'].'</span>
                            //             </td>
                                        
                            //         </tr>';
                            // }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>

    <script type="text/javascript">
        function confirmBtn(){
            var option = confirm('Bạn có chắc chắn xác nhận làm đơn hàng');
            if(!option) {
                return;
            }
        }
    </script>
</body>
</html>