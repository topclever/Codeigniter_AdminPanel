<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_thumbnail($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard')echo 'active';?>">
			<a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-device-desktop"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>
		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'categories' || $page_name == 'sub_categories' || $page_name == 'category_add' || $page_name == 'category_edit'): ?> active <?php endif; ?>">
				<i class="dripicons-network-1"></i>
				<span> <?php echo get_phrase('categories'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'categories') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('categories'); ?></a>
				</li>
				
				<li class = "<?php if($page_name == 'category_add') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/category_form/add'); ?>"><?php echo get_phrase('add_new_category'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'amenities' || $page_name == 'amenity_add' || $page_name == 'amenity_edit'):?> active <?php endif; ?>">
				<i class="dripicons-cutlery"></i>
				<span> <?php echo get_phrase('amenities'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'amenity') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/amenities'); ?>"><?php echo get_phrase('amenities'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'amenity_add') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/amenity_form/add'); ?>"><?php echo get_phrase('add_new_amenity'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'listings' || $page_name == 'listing_add_wiz' || $page_name == 'listing_edit_wiz' || $page_name == 'reported_listings'): ?> active <?php endif; ?>">
				<i class="dripicons-location"></i>
				<span> <?php echo get_phrase('listings'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'listings') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/listings'); ?>"><?php echo get_phrase('listings'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'listing_add_wiz') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/listing_form/add'); ?>"><?php echo get_phrase('add_new_listing'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'reported_listings') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/reported_listings'); ?>"><?php echo get_phrase('reported_listings'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'cities' || $page_name == 'city_add' || $page_name == 'city_edit'): ?> active <?php endif; ?>">
				<i class="dripicons-web"></i>
				<span> <?php echo get_phrase('cities'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'cities') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/cities'); ?>"><?php echo get_phrase('cities'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'city_add') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/city_form/add'); ?>"><?php echo get_phrase('add_new_city'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'packages' || $page_name == 'package_add' || $page_name == 'package_edit'): ?> active <?php endif; ?>">
				<i class="dripicons-cart"></i>
				<span> <?php echo get_phrase('pricings'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'packages') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/packages'); ?>"><?php echo get_phrase('all_packages'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'package_add') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/package_form/add'); ?>"><?php echo get_phrase('add_new_package'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item">
			<a href="<?php echo site_url('admin/offline_payment'); ?>" class="side-nav-link <?php if ($page_name == 'offline_payment'): ?> active <?php endif; ?> ">
				<i class="dripicons-card"></i>
				<span><?php echo get_phrase('offline_payment'); ?></span>
			</a>
		</li>
		<li class="side-nav-item">
			<a href="<?php echo site_url('admin/report'); ?>" class="side-nav-link <?php if ($page_name == 'report' || $page_name == 'package_invoice'): ?> active <?php endif; ?> ">
				<i class="dripicons-pulse"></i>
				<span><?php echo get_phrase('report'); ?></span>
			</a>
		</li>

		<li class="side-nav-item">
			<a href="<?php echo site_url('admin/rating_wise_quality'); ?>" class="side-nav-link <?php if ($page_name == 'rating_wise_quality' || $page_name == 'edit_rating_wise_quality'): ?> active <?php endif; ?>">
				<i class="dripicons-meter"></i>
				<span><?php echo get_phrase('rating_wise_quality'); ?></span>
			</a>
		</li>

		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'agents' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit'): ?> active <?php endif; ?>">
				<i class="dripicons-user"></i>
				<span> <?php echo get_phrase('users'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'users') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/users'); ?>"><?php echo get_phrase('users'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'user_add') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/user_form/add'); ?>"><?php echo get_phrase('add_new_user'); ?></a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'map_settings' || $page_name == 'about' ): ?> active <?php endif; ?>">
				<i class="dripicons-toggles"></i>
				<span> <?php echo get_phrase('settings'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'system_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/system_settings'); ?>"><?php echo get_phrase('system_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'frontend_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/frontend_settings'); ?>"><?php echo get_phrase('frontend_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'payment_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/payment_settings'); ?>"><?php echo get_phrase('payment_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'manage_language') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/manage_language'); ?>"><?php echo get_phrase('language_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'smtp_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/smtp_settings'); ?>"><?php echo get_phrase('smtp_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'about') echo 'active'; ?>">
					<a href="<?php echo site_url('admin/about'); ?>"><?php echo get_phrase('about'); ?></a>
				</li>
			</ul>
		</li>

	</ul>
	<!-- End Sidebar -->

	<div class="clearfix"></div>
	<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
