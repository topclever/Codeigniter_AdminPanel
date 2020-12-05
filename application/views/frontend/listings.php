<?php
	
    $listings_view = $this->session->userdata('listings_view');

    if($listings_view == 'list_view'){
        $listing_view_type = 'list_view';
    }else{
        $listing_view_type = 'grid_view';
    }

	include 'listings_'.$listing_view_type.'.php'
?>
