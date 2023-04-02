<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fuild">
            <div class="bara">
                <div class="p">
                    <h1 class="litt">Product</h1>
                    <div class="pro">
                        <?php foreach ($cart_items as $item): ?>
                            <div class="last">
                            <ul class="cartst">
                                <li class="licart"><img src='<?php echo base_url("Upload/" . $item['image']) ?>' style='width:130px;height: 200px;padding: 10px;'/></li>
                                <li class="licart"><?php echo $item['name']; ?></li>
                                <div class="linee"></div>
                                <li class="licart"><?php echo $item['brand']; ?></li>
                                <div class="linee"></div>
                                <li class="licart" id="count_display">
                                    <form action="<?php echo base_url('Cart/update_cart'); ?>" method="post" style="display: flex; flex-direction: column;">
                                        <input type="number" name="qty" value="<?php echo $item['qty'] ?>" class="wo"/>
                                        <input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>"/>
                                        <input type="submit" name="submit" class="mainbtn" value="Update" style="margin:0 !important;"/>
                                    </form>
                                </li>
                                <div class="linee"></div>
                                <li class="licart">pricing : <?php echo $item['price']*$item['qty']; ?></li>
                                
                               
                            </ul>

                            
                            <div class="ic">
                            <form action="<?php echo base_url('Cart/remove_cart'); ?>" method="post" style="margin: 0;">
                                        <input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>"/>
                                        <button type="submit" class="mes"><i class="bx bx-x"></i></button>
                                    </form>
                                
                            </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="al">
                <div class="minimany">
                <a href="<?php echo base_url();?>Cart/back"><h1 class="clickk"><i class="bx bx-arrow-back" style="padding-right: 20px;"></i>Back to shopping</h1></a>
                </div>
                <div class="minimany">
                <a href="<?php echo base_url();?>Cart/home"><h1 class="clickk"><i class="bx bx-arrow-back" style="padding-right: 20px;"></i>Go to home page</h1></a>
                </div>
                <div class="minimany">
                    <h1 class="clickk">Subtotal : <?php echo $this->cart->total(); ?>$</h1>
                </div>
            </div>
                </div>
                <div class="cartt">
                    <h1 class="nome">Cart detail</h1>
                    <p>Select card type</p>
                    <div class="im">
                    <img src="<?php echo base_url();?>.\assets\images\visa.png" alt="" class="logvard">
                        <img src="<?php echo base_url();?>.\assets\images\matercard.png" alt="" class="naster">
                    </div>
                    <input type="text" placeholder="card number" class="inn">
                    <div class="lo">
                        <div class="mi">
                            <label for="expiry date">expiry date</label>
                            <input type="date" class="inn" >
                        </div>
                        <div class="mi">
                            <label for="cvv">cvv</label>
                            <input type="text" class="inn">
                        </div>
                    </div>
                    <a href="<?php echo base_url();?>Cart/checkout"><button class="bot">CHECKOUT</button></a>

                </div>
            </div>
            
        </div>
    </div>
</div>


