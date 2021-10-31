<?php
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	include_once('layouts/header.php');

	$id = getGet('id');
	$product = executeResult2('select * from product where id = '.$id, true);
	if($product == null) {
		header('Location: ../frontend/index.php?id=1');
	}
?>
<!-- body -->
<div class="container">
    <div class="grid fix-wide">
        <div class="row">
            <div class="col l-5">
                <img style="width: 100%" src="<?=$product['thumbnail']?>">
            </div>
            <div class="col l-7">
                <h4><?=$product['title']?></h4>
                <p style="font-size: 36px; color: red"><?=number_format($product['price'], 0, ',', '.')?></p>
                <button class="btn btn-success" onclick="addToCart(<?=$id?>)" style="width: 100%; font-size: 30px;">Add to cart</button>
            </div>
            <div class="col l-12">
                <?=$product['content']?>
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript">
	function addToCart(id) {
		$.post('../api/cookie.php', {
			'action': 'add',
			'id': id,
			'num': 1
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	include_once('layouts/footer.php');
?>