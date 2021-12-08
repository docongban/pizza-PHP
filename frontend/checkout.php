<?php
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	include_once('layouts/headerNoSlider.php');

	require_once('../api/checkout-form.php');

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

<form method="post">
    <div class="container">
            <div class="grid fix-wide">
                <div id="hai_san_pesto" class="product-decrip">
                    <span class="product-name">Đặt giao hàng</span>
                </div>
                <div class="row">
                    <div class="col l-6">
                        <div class="ship">
                            <div class="form-group">
                                <label for="usr" class="ship-title">Họ và tên:</label>
                                <input required="true" type="text" class="ship-input" id="usr" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="email" class="ship-title">Email:</label>
                                <input required="true" type="email" class="ship-input" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="ship-title">Số điện thoại:</label>
                                <input type="number" class="ship-input" id="phone_number" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="address" class="ship-title">Địa chỉ:</label>
                                <input type="text" class="ship-input" id="address" name="address" placeholder="Số nhà/ Ngõ/ Đường/ Phố/ Phường/ Quận/ Tỉnh/ Thành phố">
                            </div>
                            <div class="form-group">
                                <label for="note" class="ship-title">Ghi chú thêm:</label>
                                <textarea class="textarea-input" rows="5" name="note" id="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col l-6">
                        <div class="ship-logo" style="background-image: url('https://seeklogo.com/images/T/the-pizza-company-logo-D44DBE70F1-seeklogo.com.png')"></div>
                    </div>
                </div>
                <div class="product-btn">
                    <a href="cart.php" class="product-btn__return">
                        <i class="fas fa-arrow-left"></i>
                        <span class="product-btn__return-title">Quay lại</span>
                    </a>
                    <button class="product-btn__pay">
                        <span class="product-btn__pay-title">Thanh toán</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
</form>


<!-- <form method="post">
    <div class="container">
        <div class="grid fix-wide">
            <div class="row">
                <div class="col l-5">
                    <h3>Shipping Information</h3>
                    <div class="form-group">
                    <label for="usr">Name:</label>
                    <input required="true" type="text" class="form-control" id="usr" name="fullname">
                    </div>
                    <div class="form-group">
                    <label for="email">Email:</label>
                    <input required="true" type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                    <label for="note">Note:</label>
                    <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                    </div>
                </div>
                <div class="col l-7">
                    
                    <button class="btn btn-success" style="width: 100%; font-size: 32px;">Complete</button>
                </div>
            </div>
        </div>
    </div>
</form> -->
<script type="text/javascript">
	function deleteCart(id) {
		$.post('../api/cookie.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	include_once('layouts/footer.php');
?>