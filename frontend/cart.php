<?php
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	include_once('layouts/headerNoSlider.php');

	$cart = [];
	if(isset($_COOKIE['cart'])) {
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
	}
	$idList = [];
	foreach ($cart as $item) {
		$idList[] = $item['id'];
	}
	if(count($idList) > 0) {
		$idList = implode(',', $idList);

		$sql = "select * from product where id in ($idList)";
		$cartList = executeResult2($sql);
	} else {
		$cartList = [];
	}
?>
<!-- body -->

<!-- <div class="container">
    <div class="grid fix-wide">
        <div class="row">
            <div class="col l-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Num</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 0;
                            $total = 0;
                            foreach ($cartList as $item) {
                                $num = 0;
                                foreach ($cart as $value) {
                                    if($value['id'] == $item['id']) {
                                        $num = $value['num'];
                                        break;
                                    }
                                }
                                $total += $num*$item['price'];
                                echo '
                                    <tr>
                                        <td>'.(++$count).'</td>
                                        <td><img src="'.$item['thumbnail'].'" style="height: 100px"/></td>
                                        <td>'.$item['title'].'</td>
                                        <td>'.$num.'</td>
                                        <td>'.number_format($item['price'], 0, ',', '.').'</td>
                                        <td>'.number_format($num*$item['price'], 0, ',', '.').'</td>
                                        <td><button class="btn btn-danger" onclick="deleteCart('.$item['id'].')">Delete</button></td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <p style="font-size: 30px; color: red">
                    Total: <?=number_format($total, 0, ',', '.')?>
                </p>

                <a href="checkout.php">
                    <button class="btn btn-success" style="width: 100%; font-size: 32px;">Checkout</button>
                </a>
            </div>
        </div>
    </div>
</div> -->

<!-- Start container -->
        <div class="container">
            <div class="grid fix-wide">
                <div id="hai_san_pesto" class="product-decrip">
                    <span class="product-name">Sản phẩm</span>
                </div>
                <div class="row">
                    
                            <?php
                                $count = 0;
                                $total = 0;
                                foreach ($cartList as $item) {
                                    $num = 0;
                                    foreach ($cart as $value) {
                                        if($value['id'] == $item['id']) {
                                            $num = $value['num'];
                                            break;
                                        }
                                    }
                                    $total += $num*$item['price'];
                                    echo '
                                    <div class="col l-12">
                                        <div class="product-cart">
                                            <div class="product-cart__img" style="background-image: url('.$item['thumbnail'].');"></div>
                                            <div class="product-cart__content">
                                                <div class="product-cart__content-title">'.$item['title'].'</div>
                                                <div class="product-cart__content-decrip">'.$item['content'].'</div>
                                            </div>
                                            <div class="product-cart__count">'.$num.'</div>
                                            <div class="product-cart__price">'.number_format($num*$item['price'], 0, ',', '.').'đ</div>
                                            
                                            <div class="product-cart__delete" onclick="deleteCart('.$item['id'].')">
                                            <i class="fas fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            ?>
                            
                    
                </div>
                <div class="product-pay">
                    <span class="product-pay__title">Tổng tiền:</span>
                    <span class="product-pay__price"><?=number_format($total, 0, ',', '.')?>đ</span>
                </div>
                <div class="product-btn">
                    <a href="index.php?id=1" class="product-btn__return">
                        <i class="fas fa-arrow-left"></i>
                        <span class="product-btn__return-title">Tiếp tục mua hàng</span>
                    </a>
                    <a href="checkout.php" class="product-btn__pay">
                        <span class="product-btn__pay-title">Thanh toán</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- End container -->

<script type="text/javascript">
	function deleteCart(id) {
		$.post('../api/cookie.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload();
		})
	}
</script>
<?php
	include_once('layouts/footer.php');
?>