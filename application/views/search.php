<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">
            <div class="content_top">
                <div class="heading">
                    <h3>You Are Search Now <b style="color:#8b57c6"><?php if($search){echo $search;}?></b></h3>
                </div>
                <div class="clear"></div>
            </div>

            <div class="flexwowo">
                <?php $arr_chunk_product = array_chunk($get_all_product, 1);
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
                                    <!-- <h1 class="addtocard"> <i class="bx bx-plus ico" ></i>Add to cart</h1> -->
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


  
</body>
</html>
