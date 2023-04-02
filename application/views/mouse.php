<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.slider{
    width:90%;
    height:500px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    margin: 20px auto;
}
#img{
    width:100%;
    height:100%;
    object-fit: contain;
}
img{
    width:100%;
    height:100%;
}

</style>
<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">
        <div class="slider">
                <div id="img">
                    <img src=".\..\assets\images\R6.jpg"/>
                </div>
            </div>
            <div class="aho">
                <h3 class="litt">Our Products</h3>
                <div class="ho">
                    <button type="submit" class="betto active">Top</button>
                    <button type="submit" class="betto">Popular</button>
                    <button type="submit" class="betto">Most sold</button>
                </div>
            </div>
        
            <div class="flexwowo">
                <?php $arr_chunk_product = array_chunk($mouse_product, 1);
                    foreach ($arr_chunk_product as $chunk_products) { 
                ?>
                    <ul class="list-unstyled">
                        <?php foreach ($chunk_products as $single_products) { ?>
                            <li>
                                <div class="all">
                                <a  href="<?php echo base_url('Product/product_details/'.$single_products->product_id);?>" style="width: min-content;">
                                        <img style="width:200px;height:250px" src="<?php echo base_url('Upload/'.$single_products->product_image)?>" alt="" />
                                        <h2 class="name"><?php echo $single_products->product_name ?></h2>
                                        <p class="paragraph"><?php echo word_limiter($single_products->product_description, 2);  ?></p>
                                        <p class="price"><?php echo $single_products->product_price ?> $</p>
                                    </a>
                                    <form action="<?php echo base_url('Cart/add_to_cart'); ?>" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $single_products->product_id; ?>">
                                        <input type="hidden" name="product_image" value="<?php echo $single_products->product_image; ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $single_products->product_name; ?>">
                                        <input type="hidden" name="product_brand" value="<?php echo $single_products->product_brand; ?>">
                                        <input type="hidden" name="price" value="<?php echo $single_products->product_price; ?>">
                                        
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="mes"><h1 class="addtocard"> <i class="bx bx-plus ico" ></i>Add to cart</h1></button>

                                    </form>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
var img = document.getElementById('img');

var slides=['./../assets/images/R.jpg','./../assets/images/R2.jpg', './../assets/images/R3.jpg','./../assets/images/R7.jpg','./../assets/images/R5.jpg','./../assets/images/R6.jpg'];
var Start=0;
function slider(){
if(Start<slides.length){
    Start=Start+1;
}
else{
    Start=1;
}
img.innerHTML = "<img src="+slides[Start-1]+">";

}
setInterval(slider,2000);
</script>

</body>
</html>
