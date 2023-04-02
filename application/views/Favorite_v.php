<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">

<h1 class="litt">My favorite products</h1>

<?php if (empty($products)): ?>
    <p>You haven't added any products to your favorites yet.</p>
<?php else: ?>
    <div class="flexwowo">
        <?php foreach ($products as $product): ?>
                    <ul class="list-unstyled">
                    
                            <li>
                                <div class="all">
                                    <a  href="<?php echo site_url('Product/product_details/'.$product->product_id);?>">
                                        <img style="width:250px;height:250px" src="<?php echo base_url('Upload/'.$product->product_image)?>" alt="" />
                                        <h2 class="name"><?php echo $product->product_name; ?></h2>
                                        <p class="paragraph"><?php echo word_limiter($product->product_description, 5);  ?></p>
                                        <p class="price"><?php echo $product->product_price ?> $</p>
                                    </a>
                                    <h1 class="addtocard"> <i class="bx bx-plus ico" ></i>Add to cart</h1>
                                </div>
                            </li>
                            
                    </ul>
              <?php endforeach; ?>
            </div>


    </ul>
<?php endif; ?>



