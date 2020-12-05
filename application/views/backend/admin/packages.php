<!-- start page title -->
<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('packages'); ?>
					<a href="<?php echo site_url('admin/package_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_package'); ?></a>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
<div class="row">
	<div class="col-xl-12">
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
				<div class="col-md-4 mb-2">
					<div class="card card-pricing card-pricing-recommended">
						<div class="row">
							<div class="col-6 text-left">
								<a href = "<?php echo site_url('admin/package_form/edit/'.$package['id']); ?>" class="btn btn-icon btn-outline-info btn-sm m-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('edit'); ?>" style="margin-right:5px;">
									<i class="mdi mdi-wrench"></i>
								</a>
							</div>
							<div class="col-6 text-right">
								<a href = "#" class="btn btn-icon btn-outline-danger btn-sm m-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('delete'); ?>" onclick="confirm_modal('<?php echo site_url('admin/packages/delete/'.$package['id']); ?>');">
									<i class="dripicons-trash"></i>
								</a>
							</div>
						</div>
						<div class="card-body text-center">
							<?php if ($package['is_recommended'] == 1): ?>
								<div class="card-pricing-plan-tag"><?php echo get_phrase('recommended'); ?></div>
							<?php endif; ?>
							<p class="card-pricing-plan-name font-weight-bold text-uppercase"><?php echo $package['name']; ?></p>
							
							<?php
								$package_type = $package['package_type'];
								if($package_type == 0){
							?>
								<i class="card-pricing-icon text-primary"><?php echo get_phrase('free'); ?></i>
							<?php
								}else{
							?>
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
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
