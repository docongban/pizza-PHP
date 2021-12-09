<?php
	include_once('layouts/headerNoSlider.php');
?>
<style> 
    .thankyou{
        font-size: 3.6rem;
        padding-top:100px;
        padding-bottom: 25px;
        color: #000;
        margin: 0 auto;
        font-weight: bold;
    }
    .delecious{
        font-size: 3.6rem;
        color:#000;
        margin: 0 auto;
        font-weight: bold;
        
    }
    .btnreturn{
        background-color:var(--primary-color);
        margin: 25px auto 200px;
    }
    .delevery{
        font-size: 1.6rem;
        font-style: italic;
        color: #444;
    }
</style>
<!-- body -->
<div class="container">
    <div class="grid fix-wide">
        <div class="row" >
            <span class="thankyou">Cảm ơn quý khách đã đến với PizzaCompany</span>
            <span class="delecious">Chúc quý khách ngon miệng</span>
        </div>
        <div >
            <a href="index.php?id=1" class="product-btn__return btnreturn">
                <span class="product-btn__return-title">Quay lại màn hình chính</span>
            </a>
            <span class="delevery">*Quý khách vui lòng chú ý điện thoại sau 15 phút chúng tôi sẽ cố gắng giao hàng tới bạn sớm nhất</span>
        </div>
    </div>
</div>
<?php
	include_once('layouts/footer.php');
?>