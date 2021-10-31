<?php
    require_once ('../db/dbhelper.php');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaCompany</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/gird.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="app">

        <!-- Start header -->
        <header class="header">
            <div class="grid header-container">
                <!-- Start header with logo -->
                <div class="header-with-logo">
                    <a href="/" class="header-logo-link">
                        <div class="header-logo"></div>
                    </a>

                    <div class="header-delivery-with-serach">
                        <div class="header-delivery">
                            <div class="header-delivery_item active">
                                <i class="fas fa-shipping-fast header-delivery_item-logo"></i>
                                <span class="header-delivery_item-text">Đặt giao hàng</span>
                            </div>
                            <div class="header-delivery_item">
                                <i class="fas fa-store-alt header-delivery_item-logo"></i>
                                <span class="header-delivery_item-text">Đặt đến lấy</span>
                            </div>
                        </div>

                        <div class="header-search block">
                            <i class="fas fa-map-marker-alt header-search-map"></i>
                            <input class="header-search_title" placeholder="Nhập địa chỉ của bạn"></input>
                        </div>

                        <div class="header-search">
                            <i class="fas fa-store header-search-map"></i>
                            <input class="header-search_title" placeholder="Nhập cửa hàng"></input>

                            
                            <div class="header-search_store">
                                <ul class="header-search_store-item">
                                    <li class="header-search_store-list">The Pizza Company Cầu Giấy</li>
                                    <li class="header-search_store-list">The Pizza Company Times City</li>
                                    <li class="header-search_store-list">The Pizza Company Đoàn Trần Nghiệp</li>
                                    <li class="header-search_store-list">The Pizza Company Xuân Diệu</li>
                                    <li class="header-search_store-list">The Pizza Company Vincom Bắc Từ Liêm</li>
                                    <li class="header-search_store-list">The Pizza Company Vincom Royal City</li>
                                    <li class="header-search_store-list">The Pizza Company Aeon Mall Long Biên</li>
                                    <li class="header-search_store-list">The Pizza Company Aeon Mall Hà Đông</li>
                                    <li class="header-search_store-list">The Pizza Company Linh Đàm</li>
                                    <li class="header-search_store-list">The Pizza Company Trần Duy Hưng</li>
                                    <li class="header-search_store-list">The Pizza Company Song Hành</li>
                                    <li class="header-search_store-list">The Pizza Company Nguyễn Thị Minh Khai</li>
                                    <li class="header-search_store-list">The Pizza Company 333 Lê Văn Sỹ</li>
                                    <li class="header-search_store-list">The Pizza Company Bà Hom</li>
                                    <li class="header-search_store-list">The Pizza Company Crescent Mall</li>
                                    <li class="header-search_store-list">The Pizza Company Phạm Hùng</li>
                                    <li class="header-search_store-list">The Pizza Company Hoàng Hoa Thám</li>
                                    <li class="header-search_store-list">The Pizza Company Thống Nhất</li>
                                    <li class="header-search_store-list">The Pizza Company AEON Mall Tân Phú</li>
                                    <li class="header-search_store-list">The Pizza Company Vincom Biên Hòa</li>
                                    <li class="header-search_store-list">The Pizza Company Pegasus</li>
                                    <li class="header-search_store-list">The Pizza Company Sense City Bến Tre</li>
                                    <li class="header-search_store-list">The Pizza Company Vincom Buôn Ma Thuột</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="header-account">
                        <div class="header-account_login">
                            <i class="far fa-user header-account_login-icon"></i>
                            <span class="header-account-text">Đăng nhập</span>
                        </div>
                        <span>/</span>
                        <div class="header-account_register">
                            <span class="header-account-text">Tạo tài khoản</span>
                        </div>
                    </div>
                </div>
                <!-- End header with logo -->

                <!-- Start navbar -->
                <nav class="navbar">
                    <div class="navbar-select">
                        <ul class="navbar-list">
                            <li class="navbar-list_item">
                                <a href="" class="navbar-list_item-link">
                                    <span class="navbar-list_item-text">Khuyến mãi</span>
                                </a>
                            </li>
                            <?php
                                //Lấy danh sách danh mục từ database
                                $sql = "SELECT * FROM category";
                                $categoryList = executeResult($sql);
                                foreach ($categoryList as $item) {
                                    echo '
                                        <li class="navbar-list_item">
                                            <a href="index.php?id='.$item['id'].'" class="navbar-list_item-link">
                                                <span class="navbar-list_item-text">'.$item['name'].'</span>
                                            </a>
                                        </li>
                                    ';
                                }
                            ?>
                        </ul>
                    </div>

                    <div class="navbar-with-search">
                        <div class="navbar_search">
                            <i class="fas fa-search navbar_search-icon"></i>
                        </div>
                        <?php
                            $cart = [];
                            if(isset($_COOKIE['cart'])) {
                                $json = $_COOKIE['cart'];
                                $cart = json_decode($json, true);
                            }
                            $count = 0;
                            foreach ($cart as $item) {
                                $count += $item['num'];
                            }
                        ?>
                        <div class="navbar_cart">
                            <a href="cart.php" class="navbar_cart-icon-link">
                                <i class="fas fa-shopping-cart navbar_cart-icon"></i>
                            </a>
                            <a href="cart.php" class="navbar_cart-link">
                                <span class="navbar_cart-text">Giỏ hàng</span>
                            </a>
                            <div class="navbar_cart-amount">
                                <span class="navbar_cart-count"><?=$count?></span>
                            </div>

                            <!-- <div class="navbar_cart-list">
                                <p class="navbar_cart-list-title">Rất tiếc!!! Bạn không có sản phẩm ở đây.</p>
                                <p class="navbar_cart-list-decrip">Chúng tôi sẽ giao hàng với hoá đơn trên <span>100,000 đ</span></p>
                            </div> -->
                        </div>
                    </div>
                </nav>
                <!-- Start navbar -->
            </div>
        </header>
        <!-- End header -->