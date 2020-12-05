<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_thumbnail($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">

			<?php
			$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $user_details['name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard')echo 'active';?>">
			<a href="<?php echo site_url('user/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-align-justify"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>



	<li
		<?php
		$is_active = '';
		if ($page_name == 'listings' ||
		$page_name == 'listing_add_wiz' ||
		$page_name == 'listing_edit_wiz') $is_active = 'active'; ?>
		class="side-nav-item <?php echo $is_active; ?>">
		<a href="javascript: void(0);" class="side-nav-link <?php echo $is_active; ?>">
			<i class="dripicons-archive"></i>
			<span> <?php echo get_phrase('listings'); ?> </span>
			<span class="menu-arrow"></span>
		</a>
		<ul class="side-nav-second-level" aria-expanded="false">
			<li class = "<?php if($page_name == 'listings' || $page_name == 'listing_edit_wiz') echo 'active'; ?>">
				<a href="<?php echo site_url('user/listings'); ?>"><?php echo get_phrase('listings'); ?></a>
			</li>
			<?php if (has_package() > 0): ?>
				<li class = "<?php if($page_name == 'listing_add_wiz') echo 'active'; ?>">
					<a href="<?php echo site_url('user/listing_form/add'); ?>"><?php echo get_phrase('add_new_listing'); ?></a>
				</li>
			<?php endif; ?>
		</ul>
	</li>

	<li
		<?php
		$is_active = '';
		if ($page_name == 'packages' ||
		$page_name == 'purchase_history' || $page_name == 'package_invoice') $is_active = 'active'; ?>
		class="side-nav-item <?php echo $is_active; ?>">
		<a href="javascript: void(0);" class="side-nav-link <?php echo $is_active; ?>">
			<i class="dripicons-archive"></i>
			<span> <?php echo get_phrase('packages'); ?> </span>
			<span class="menu-arrow"></span>
		</a>
		<ul class="side-nav-second-level" aria-expanded="false">
			<li class = "<?php if($page_name == 'packages') echo 'active'; ?>">
				<a href="<?php echo site_url('user/packages'); ?>"><?php echo get_phrase('purchase_package'); ?></a>
			</li>
			<?php if (has_package() > 0): ?>
				<li class = "<?php if($page_name == 'purchase_history' || $page_name == 'package_invoice') echo 'active'; ?>">
					<a href="<?php echo site_url('user/purchase_history'); ?>"><?php echo get_phrase('purchase_history'); ?></a>
				</li>
			<?php endif; ?>
		</ul>
	</li>

	<li class="side-nav-item <?php if ($page_name == 'wishlists')echo 'active';?>">
		<a href="<?php echo site_url('user/wishlists'); ?>" class="side-nav-link">
			<i class="dripicons-heart"></i>
			<span><?php echo get_phrase('wishlist'); ?></span>
		</a>
	</li>

	<li class="side-nav-item">
		<a href="<?php echo site_url('user/manage_profile'); ?>" class="side-nav-link <?php if ($page_name == 'manage_profile'):?> active <?php endif; ?>">
			<i class="dripicons-gear"></i>
			<span><?php echo get_phrase('account'); ?></span>
		</a>
	</li>

</ul>
<!-- End Sidebar -->

<div class="clearfix"></div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
