<?php
// Paypal Keys
$paypal_settings = get_settings('paypal');
$paypal = json_decode($paypal_settings);

// Stripe Keys
$stripe_settings = get_settings('stripe');
$stripe = json_decode($stripe_settings);
?>
<!-- start page title -->
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('purchase_a_package'); ?></h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row justify-content-center mb-25">
	<div class="col-xl-10">

		<!-- Pricing Title-->
		<div class="text-center">
			<h3 class="mb-2"><?php echo get_phrase('our_plans_and_pricings'); ?></h3>
			<p class="text-muted w-50 m-auto">
				<?php echo get_phrase('we_have_plans_and_prices_that_fit_your_business_perfectly').'. '; ?>
			</p>
		</div>

		<!-- Plans -->
		<div class="row mt-sm-5 mt-3 mb-3">
			<?php foreach ($packages as $package): ?>
				<div class="col-md-4">
					<div class="card card-pricing card-pricing-recommended">
						<div class="card-body text-center">
							<?php if ($package['is_recommended'] == 1): ?>
								<div class="card-pricing-plan-tag"><?php echo get_phrase('recommended'); ?></div>
							<?php endif; ?>
							<p class="card-pricing-plan-name font-weight-bold text-uppercase"><?php echo $package['name']; ?></p>
							<?php if($package['package_type'] == 0){ ?>
							<i class="card-pricing-icon text-primary"><?php echo get_phrase('free'); ?></i>
							<?php }else{ ?>
								<i class="card-pricing-icon dripicons-briefcase text-primary"></i>
							<?php } ?>
							<h2 class="card-pricing-price"><?php echo currency($package['price']); ?> <span>/ <?php echo $package['validity'].' '.get_phrase('days'); ?></span></h2>
							<ul class="card-pricing-features">
								<li><?php echo $package['number_of_listings'].' '.get_phrase('listings'); ?> <?php echo get_phrase('this_package'); ?></li>
								<li><?php echo $package['number_of_categories'].' '.get_phrase('categories'); ?> <?php echo get_phrase('per_listing'); ?></li>
								<li><?php echo $package['number_of_photos'].' '.get_phrase('photos'); ?>  <?php echo get_phrase('per_listing'); ?></li>
								<li><?php echo $package['number_of_tags'].' '.get_phrase('tags'); ?> <?php echo get_phrase('per_listing'); ?></li>
								<li><?php echo $package['ability_to_add_contact_form'] == 1 ? get_phrase('availability_of') : get_phrase('unavailability_of'); ?> <?php echo get_phrase('contact_form'); ?></li>
								<li><?php echo $package['ability_to_add_video'] == 1 ? get_phrase('availability_of') : get_phrase('unavailability_of'); ?> <?php echo get_phrase('video'); ?></li>
								<li><?php echo $package['featured'] == 1 ? get_phrase('featured_listings_allowed') : get_phrase('featured_listings_unallowed'); ?>
								<li><?php echo $package['validity'].' '.get_phrase('days'); ?> <?php echo get_phrase('listing'); ?></li>
							</ul>
							<?php
								$package_type = $package['package_type'];

								$total_submited_package = 0;
								$sumited_packages = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id')))->result_array();
								foreach($sumited_packages as $sumited_package){
									$total_submited_package++;
								}

								if($package_type == 0){

									if($total_submited_package > $package['number_of_listings']){ 
										echo "<span class='text-warning'>".get_phrase('listings_capacity_limited').', '.get_phrase('please_choose_a_upper_level_package')."</span>";
									}else{
							?>
										<a href="<?php echo site_url('user/free_package/free/'.$this->session->userdata('user_id').'/'.$package['id'].'/0') ?>" class="btn btn-primary mt-4 mb-2 btn-rounded"><?php echo get_phrase('choose_plan'); ?></a>
							<?php
									}
								}else{
									
									if($total_submited_package > $package['number_of_listings']){ 
										echo "<span class='text-warning'>".get_phrase('listings_capacity_limited').', '.get_phrase('please_choose_a_upper_level_package')."</span>";
									}else{
							?>
										<button class="btn btn-primary mt-4 mb-2 btn-rounded" onclick="showPaymentDiv('<?php echo $package['id']; ?>')"><?php echo get_phrase('choose_plan'); ?></button>
							<?php
									}
								}
							?>
							
						</div>
						<div class="row pl-1 pr-1 payment-section" style="display: none;" id = "payment-section-<?php echo $package['id'] ?>">
							<div class="col-12 text-center">
								<?php if($stripe[0]->active == 1){ ?>
									<a href = "<?php echo site_url('user/stripe_checkout/'.$package['id']); ?>" class="btn btn-outline-primary btn-rounded mb-2" target="_blank"> <?php echo get_phrase('pay_with_stripe'); ?></a>
								<?php
								}

								if($paypal[0]->active == 1){
								?>
									<a href="<?php echo site_url('user/paypal_checkout/'.$package['id']); ?>" class="btn btn-outline-primary btn-rounded mb-2" target="_blank"><?php echo get_phrase('pay_with_paypal'); ?></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	function showPaymentDiv(package_id) {
		console.log('payment-section-'+package_id);
		$('.payment-section').each(function () {
		    if (this.id == 'payment-section-'+package_id) {
				$('#payment-section-'+package_id).slideToggle();
		    }else {
				$('#'+this.id).slideUp();
			}
		});
	}
</script>
