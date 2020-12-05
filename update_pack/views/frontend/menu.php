<nav id="menu" class="main-menu">
	<ul>
		<li><span><a href="<?php echo base_url();?>">Home</a></span></li>
		<li><span><a href="<?php echo base_url();?>home/listings">Listings</a></span></li>
		<li><span><a href="<?php echo base_url();?>home/category">Category</a></span></li>
		<li><span><a href="<?php echo base_url();?>home/pricing">Pricing</a></span></li>
		<?php if ($this->session->userdata('is_logged_in') == 1): ?>
			<li><span><a href="javascript::"><?php echo get_phrase('account'); ?></a></span>
					<ul class="manage_account_navbar">
						<li><a href="<?php echo base_url(strtolower($this->session->userdata('role')).'/dashboard');?>"><?php echo get_phrase('manage_account'); ?></a></li>
						<li><a href="<?php echo site_url('login/logout') ?>"><?php echo get_phrase('logout'); ?></a></li>
					</ul>
				</li>
		<?php endif; ?>
	</ul>
</nav>



<!-- <header class="header_in map_view">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-12">
				<div id="logo">
					<a href="index.html">
						<img src="img/logo_sticky.svg" width="165" height="35" alt="" class="logo_sticky">
					</a>
				</div>
			</div>
			<div class="col-lg-9 col-12">
				<ul id="top_menu">
					<li><a href="account.html" class="btn_add">Add Listing</a></li>
					<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
					<li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
				</ul>
				<a href="#menu" class="btn_mobile">
					<div class="hamburger hamburger--spin" id="hamburger">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</a>
				<nav id="menu" class="main-menu">
                    <ul>
                        <li><span><a href="#0">Home</a></span>
                            <ul>
                                <li><a href="index.html">Home version 1</a></li>
                                <li><a href="index-2.html">Home version 2</a></li>
                                <li><a href="index-3.html">Home version 3</a></li>
                                <li><a href="index-4.html">Home version 4</a></li>
                                <li><a href="index-5.html">Home version 5</a></li>
                                <li><a href="index-6.html">Home version 6 (GDPR)</a></li>
                            </ul>
                        </li>
                        <li><span><a href="#0">Listings</a></span>
                            <ul>
                                <li>
                                    <span><a href="#0">Grid Layout</a></span>
                                    <ul>
                                        <li><a href="grid-listings-filterscol-search-aside.html">Sidebar+Search mobile 1</a></li>
                                        <li><a href="grid-listings-filterstop-search-aside.html">Full+Search mobile 1</a></li>
                                        <li><a href="grid-listings-filterscol.html">Sidebar+Search mobile 2</a></li>
                                        <li><a href="grid-listings-filterstop.html">Full+Search mobile 2</a></li>
                                        <li><a href="grid-listings-isotope.html">Full+Isotope filter</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span><a href="#0">Row Layout</a></span>
                                    <ul>
                                        <li><a href="row-listings-filterscol-search-aside.html">Sidebar+Search mobile 1</a></li>
                                        <li><a href="row-listings-filterstop-search-aside.html">Full+Search mobile 1</a></li>
                                        <li><a href="row-listings-filterscol.html">Sidebar+Search mobile 2</a></li>
                                        <li><a href="row-listings-filterstop.html">Full+Search mobile 2</a></li>
                                        <li><a href="row-listings-isotope.html">Full+Isotope filter</a></li>
                                    </ul>
                                </li>
                                <li><a href="listing-map.html">Listing Map</a></li>
                                <li>
                                    <span><a href="#0">Detail pages</a></span>
                                    <ul>
                                        <li><a href="detail-hotel.html">Detail page 1</a></li>
                                        <li><a href="detail-restaurant.html">Detail page 2</a></li>
                                        <li><a href="detail-shop.html">Detail page 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="bookings.html">Bookings - Purchases</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="confirm.html">Confirm</a></li>
                            </ul>
                        </li>
                        <li><span><a href="#0">Pages</a></span>
                            <ul>
                                <li><a href="admin_section/index.html">Admin section</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="account.html">Account</a></li>
                                <li><a href="help.html">Help Section</a></li>
                                <li><a href="faq.html">Faq Section</a></li>
                                <li><a href="wishlist.html">Wishlist page</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li>
                                    <span><a href="#0">Icon Packs</a></span>
                                    <ul>
                                        <li><a href="icon-pack-1.html">Icon pack 1</a></li>
                                        <li><a href="icon-pack-2.html">Icon pack 2</a></li>
                                        <li><a href="icon-pack-3.html">Icon pack 3</a></li>
                                        <li><a href="icon-pack-4.html">Icon pack 4</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="media-gallery.html">Media gallery</a></li>
                            </ul>
                        </li>
                        <li><span><a href="#0">Extra</a></span>
                            <ul>
                                <li><a href="404.html">404 page</a></li>
                                <li><a href="contacts-2.html">Contacts 2</a></li>
                                <li><a href="pricing-tables.html">Pricing tables</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="menu-options.html">Menu Options</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="coming_soon/index.html">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li><span><a href="#0">Buy template</a></span></li>
                    </ul>
                </nav>
			</div>
		</div>
	</div>
</header> -->
