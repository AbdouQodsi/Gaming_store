
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">
<div class="allitems">
    <div class="infoproduct">
    <h2 class="titleprod"><?php echo $product->product_name; ?></h2>
    <p class="prix">Price: <?php echo $product->product_price; ?> <span class="prixdollar">$</span></p>
    <p> <?php echo $product->product_description; ?></p>

    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <form action="<?php echo base_url('Cart/add_to_cart'); ?>" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
        <input type="hidden" name="product_image" value="<?php echo $product->product_image; ?>">
        <input type="hidden" name="product_name" value="<?php echo $product->product_name; ?>">
        <input type="hidden" name="product_brand" value="<?php echo $product->product_brand; ?>">
        <input type="hidden" name="price" value="<?php echo $product->product_price; ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="1" class="form-control inputcolor infoo" style="width: 400px; margin-left: 20px;">
        <div class="buttonfinal">
        <button type="submit" class="mainbtn">Order Now <i class='bx bx-shopping-bag' style=" color: white;"></i></button>

    </form>
    <a href="<?php echo site_url('Welcome/add_to_favorites/'.$product->product_id); ?>" class="mainbtn">Add to favorite <i class='bx bx-heart' style="color: white;"></i></a>
</div>
    </div>
    <div class="imageproduit">
    <img src='<?php echo base_url("Upload/" . $product->product_image) ?>' style="width: 80%;"/>
    </div>
</div>




    </div>
    </div>
</div>
</body>