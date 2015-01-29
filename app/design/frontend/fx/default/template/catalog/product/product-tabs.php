<script type="text/javascript">
	$j(function() {
		$j('.seeMoreLink').on('click', function() {
			$j(this).hide();
		});

		$j('.seeLessLink').on('click', function() {
			$j('.seeMoreLink').show();
		});
	});
</script>
<style type="text/css">
	.collapse.in{ display:inline; margin: 0; padding: 0;}
</style>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
	<?php if (($_products = $this->getProductCollection()) && $_products->getSize()){ ?>
	<li class="active"><a href="#latest" data-toggle="tab"><?php echo $this->__('New Products') ?></a></li>
	<?php } ?>
<!--	<li><a href="#featured" data-toggle="tab">Featured</a></li>
	<li><a href="#bestSeller" data-toggle="tab">Best Seller</a></li>
	<li><a href="#webSpecial" data-toggle="tab">Web Special</a></li>
	<li><a href="#mostViewed" data-toggle="tab">Most viewed</a></li>
	<li><a href="#mostPopular" data-toggle="tab">Most Popular</a></li>-->
</ul>

<!-- Tab panes -->
<div class="tab-content home-tab-content">
	<?php if (($_products = $this->getProductCollection()) && $_products->getSize()) { ?>
	<div class="tab-pane fade in active" id="latest">
		<div class="row">
			<?php foreach ($_products->getItems() as $_product) { ?>
			<div class="col-xs-18 col-sm-6 col-md-3">
				<div class="thumbnail">
					<?php $this->getReviewsSummaryHtml($_product, 'short') ?>
					<?php $_imgSize = 260; ?>
					<a href="<?php echo $_product->getProductUrl(); ?>" title="<?php echo $this->escapeHtml($_product->getName()) ?>">
						<img src="<?php echo $this->helper('catalog/image')->init($_product, 'small_image')->resize($_imgSize); ?>" alt="<?php echo $this->stripTags($this->getImageLabel($_product, 'small_image'), null, true) ?>" />
					</a>
					<div class="caption">
						<h5 class="text-product-title"><a href="<?php echo $_product->getProductUrl() ?>" title="<?php echo $this->escapeHtml($_product->getName()) ?>"><?php echo $this->escapeHtml($_product->getName()) ?></a></h5>
						<p class="text-product-desc">
							<?php $moreLink = '<small><a href="javascript:void(0);"  title="'. $this->__('Click to see more'). '" data-placement="bottom" data-original-title="' . $this->__('Click to see more') . '" class="fxtooltip seeMoreLink" data-toggle="collapse" data-target="#moreText' . $_product->getId() . '" onclick="">..' . $this->__('more') . ' &raquo;</a></small>'; ?>
							<?php
							$shortDescription = $_product->getShortDescription();
							$charLimit = 50;

							if (strlen($shortDescription) >= $charLimit) {
								echo substr($shortDescription, 0, $charLimit);
								echo $moreLink;
							} else {
								echo $shortDescription;
							}
							$remainder = substr($shortDescription, $charLimit, (strlen($shortDescription) - $charLimit));
							?>
							<span id="moreText<?php echo $_product->getId(); ?>" class="collapse">
								<?php echo $remainder; ?>
								<small><a href="javascript:void(0);" title="<?php echo $this->__('Click to see less'); ?>" data-placement="bottom" data-original-title="<?php echo $this->__('Click to see less'); ?>" class="fxtooltip seeLessLink" data-toggle="collapse" data-target="#moreText<?php echo $_product->getId(); ?>">&laquo;..<?php echo $this->__('less'); ?></a></small>
							</span>
						</p>
						<div class="row">
							<div class="col-md-7">
<!--								<span class="text-muted"><span class="strike">£21.000</span></span>&nbsp;-->
								<span class="lead text-danger"><?php echo $this->getPriceHtml($_product, true, '-new') ?></span>
							</div>
						</div>
					</div>
					<div class="row product-actions center-align">
						<div class="col-md-12">
							<?php if ($this->helper('wishlist')->isAllow()) : ?>
								<div class="btn-group">
									<a href="<?php echo $this->getAddToWishlistUrl($_product) ?>" class="btn btn-xs btn-default fxtooltiptip" title="<?php echo $this->__('Add to Wishlist') ?>" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $this->__('Add to Wishlist') ?>"><span class="glyphicon glyphicon-heart"></span></a>
								</div>
							<?php endif; ?>
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-default "><span class="glyphicon glyphicon-star-empty"></span></button>
							</div>
							<?php //if ($this->canEmailToFriend()): ?>
											<div class="btn-group">
												<a href="<?php echo $this->helper('catalog/product')->getEmailToFriendUrl($_product) ?>" class="btn btn-xs btn-default "><span class="glyphicon glyphicon-envelope"></span></a>
											</div>
							<?php //endif; ?>


							<?php if ($_compareUrl = $this->getAddToCompareUrl($_product)): ?>
								<div class="btn-group">
									<a href="<?php echo $_compareUrl ?>" title="<?php echo $this->__('Add to Compare') ?>" class="btn btn-xs btn-default fxtooltip"><span class="glyphicon glyphicon-search"></span></a>
								</div>
							<?php endif; ?>
							<?php if ($_product->isSaleable()): ?>
								<div class="btn-group">
									<button type="button" title="<?php echo $this->__('Add to Cart') ?>" onclick="setLocation('<?php echo $this->getAddToCartUrl($_product) ?>')" class="btn btn-xs btn-success "><span class="glyphicon glyphicon-shopping-cart"></span> <?php echo $this->__('Add to Cart') ?></button>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
<!--	<div class="tab-pane fade" id="featured">Featured</div>
	<div class="tab-pane fade" id="bestSeller">Best seller</div>
	<div class="tab-pane fade" id="webSpecial">Web special</div>
	<div class="tab-pane fade" id="mostViewed">Most viewed</div>
	<div class="tab-pane fade" id="mostPopular">Most popular</div>-->
</div>