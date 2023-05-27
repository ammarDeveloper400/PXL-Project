<?php 
	$discount = 0;
	$rs = $this->db->query("SELECT * FROM products WHERE id = ".$id)->result_object()[0];
	$qty = isset($_SESSION['qty'])?$_SESSION['qty']:1;
	$price_sub = $rs->price*$qty;
	$price = $price_sub;
	// TAX_CALCULATION
	$tax = settings()->tax;
	$percentage = settings()->tax;
    $totalWidth = $price;
    $discount_prices = ($percentage / 100) * $totalWidth;
	$tax_price = $discount_prices;
	$_SESSION['TAXX_PRICE'] = $tax_price;

	
	$total_price = ($price + $tax_price ) - $discount;

	if($_SESSION['discount']){
		$total_price = $total_price - $_SESSION['discount'];
	}
	$_SESSION['total_price'] = $total_price;
	


	
	
?>
<div class="shop_data_boxes">
					<div class="heading_shop">
						Order Summary
					</div>

					<?php 
						$product_detail = $this->db->query("SELECT * FROM products WHERE id = ".$id)->result_object()[0];
					?>

					<div class="image_shop_detail">
						<img src="<?php echo $uploads;?>products/<?php echo $product_detail->image;?>">
					</div>

					<div class="plus_minus_wrap">
						<div class="name_product_shop">
							<?php echo $product_detail->title; ?>
							<span>
								$<?php echo $product_detail->price;?>
							</span>
						</div>
						<div class="plus_minsss">
							<a href="javascript:;" onclick="minus_qty('<?php echo base_url();?>pxl/minus_qty')"  class="span">-</a>
							<div class="qty_plus"> <?php echo isset($_SESSION['qty'])?$_SESSION['qty']:1;?> </div>
							<a href="javascript:;" onclick="update_qty('<?php echo base_url();?>pxl/plus_qty')" class="span" style="color: var(--primary-color);">+</a>
						</div>
					</div>

					<div class="discount_text wd100">
						<small>Gift Card / Discount code</small>

					</div>
					<form action="<?php echo base_url();?>pxl/update_discount" method="post">
						<div class="discount_input">
							<input type="text" name="discount_item" id="discount_item" required class="custom_payment_input" value="<?php echo $_SESSION['COUPN_ADD'];?>">
							<button type="submit" class="btn_custom_small primary onlyborder">Apply</button>
						</div>
					</form>

					<div class="m-t-5">
						<div class="box_price_details">
							<div class="left_price_text">
								Sub total
							</div>
							<span>
								$<?php echo $price;?>
							</span>
						</div>
						<div class="box_price_details">
							<div class="left_price_text">
								Tax
							</div>
							<span>
								$<?php echo round($tax_price,2);?>
							</span>
						</div>
						<div class="box_price_details">
							<div class="left_price_text">
								Shipping
							</div>
							<span>
								Free
							</span>
						</div>
						<?php if(isset($_SESSION['discount'])) { ?>
							<div class="box_price_details" style="color:red">
								<div class="left_price_text"  style="color:red">
									Discount
								</div>
								<span>
									- $<?php echo $_SESSION['discount']; ?>
								</span>
							</div>
						<?php } ?>
						<div class="box_price_details">
							<div class="left_price_text bold_text">
								Total
							</div>
							<span>
								$<?php echo round($total_price,2);?>
							</span>
						</div>
					</div>
				</div>