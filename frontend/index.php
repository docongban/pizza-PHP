<?php
	require_once('../db/dbhelper.php');
	require_once('../utils/utility.php');
	include_once('layouts/header.php');


    $id='';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "Select * from category where id='$id'";
        $category = executeSingleResult($sql);
        if($category!=null){
            $name = $category['name'];
        }
    } 

?>

        <!-- Start container -->
        <div class="container">
            <div class="grid fix-wide">
                <div class="container_header">
                    <span class="container_header-text"><?=$category['name']?></span>
                </div>
            </div>

            <div class="grid fix-wide">
                <!-- Start product -->
                <div class="row">
                    <?php
                        $sql = "SELECT product.id,product.title,product.content, product.price,product.updated_at ,product.thumbnail, category.name category_name FROM product
                        left join category on product.id_category = category.id where category.id='$id' ";
                        $productList = executeResult($sql);
                        foreach ($productList as $item) {
                            echo '
                            <div class="col l-3">
                                <a href="" class="product-item">
                                    <div class="product-item-show">
                                        <div class="product-item__img" style="background-image: url('.$item['thumbnail'].');"></div>
                                        <div class="product-item__name">'.$item['title'].'</div>
                                        <div class="product-item__decrip">'.$item['content'].'</div>
                                    </div>
                                    <div class="product-item__wrapper">
                                        <div class="product-item__wrapper-price">
                                            <span class="product-item__wrapper-price-text">Giá chỉ từ</span>
                                            <span class="product-item__wrapper-price-number">'.number_format($item['price'], 0, ',', '.').'đ</span>
                                        </div>
                                        <div class="product-item__wrapper-button" onclick="addToCart('.$item['id'].')"">
                                            <span class="product-item__wrapper-button-text">Thêm</span>
                                            <i class="fas fa-arrow-right product-item__wrapper-button-btn"></i>
                                        </div> 
                                    </div>
                                </a>
                            </div>
                            ';
                        }
                    ?>
                </div>
                <!-- End product -->

            </div> 
        </div>
        <!-- End container -->
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