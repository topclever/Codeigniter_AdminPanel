<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_listings() {
        $this->db->where('status', 'active');
        return $this->db->get('listing');
    }


    function filter_listing($category_ids = array(), $amenity_ids = array(), $city_id = "", $price_range = 0, $with_video = 0) {
        $listing_ids = array();
        $listing_ids_with_video = array();
        $listing_ids_with_this_city = array();
        $listing_ids_with_this_price_range = array();

        $this->db->where('status', 'active');
        $listings = $this->db->get('listing')->result_array();
        foreach ($listings as $listing) {
            $categories = json_decode($listing['categories']);
            $amenities  = json_decode($listing['amenities']);

            if(!array_diff($category_ids, $categories) && !array_diff($amenity_ids, $amenities)) {

                // push the listing id if the video url is not empty
                if ($with_video == 1) {
                    if ($listing['video_url'] != "") {
                        if (!in_array($listing['id'], $listing_ids_with_video)) {
                          array_push($listing_ids_with_video, $listing['id']);
                        }
                    }
                }else {
                  array_push($listing_ids_with_video, $listing['id']);
                }

                //Push the listing id if the listing has this city id
                if ($city_id != "" && $city_id != "all") {
                  if ($listing['city_id'] == $city_id) {
                    if (!in_array($listing['id'], $listing_ids_with_this_city)) {
                      array_push($listing_ids_with_this_city, $listing['id']);
                    }
                  }
                }else {
                  array_push($listing_ids_with_this_city, $listing['id']);
                }

                // Push the listing id if it lies in this price range
                if ($price_range > 0) {
                  $returned_listing_id = $this->check_if_this_listing_lies_in_price_range($listing['id'], $price_range);
                  if ($returned_listing_id > 0) {
                    if (!in_array($returned_listing_id, $listing_ids_with_this_price_range)) {
                      array_push($listing_ids_with_this_price_range, $returned_listing_id);
                    }
                  }
                }else {
                  array_push($listing_ids_with_this_price_range, $listing['id']);
                }

                // If with video checkbox and city checkbox remain unchecked
                if ($with_video != 1 && $city_id == "" && $price_range == 0) {
                  if (!in_array($listing['id'], $listing_ids)) {
                    array_push($listing_ids, $listing['id']);
                  }
                }else {
                    $listing_ids = array_intersect($listing_ids_with_video, $listing_ids_with_this_city, $listing_ids_with_this_price_range);
                    //print_r($listing_ids_with_video);
                    // print_r($listing_ids_with_this_city);
                    // print_r($listing_ids_with_this_price_range);
                    // print_r($listing_ids);
                }
            }
        }

        if (count($listing_ids) > 0) {
            $this->db->order_by('is_featured', 'desc');
            $this->db->where_in('id', $listing_ids);
            return $this->db->get('listing')->result_array();
        }else {
            return array();
        }
    }

    function get_amenity($amenity_id = "", $attribute = "") {
        if ($attribute != "") {
            $this->db->select($attribute);
        }

        if ($amenity_id != "") {
            $this->db->where('id', $amenity_id);
        }

        return $this->db->get('amenities');
    }

    // Functions related to review
    function post_review() {
        $data['reviewer_id'] = $this->input->post('reviewer_id');
        $data['listing_id'] = sanitizer($this->input->post('listing_id'));
        $data['review_rating'] = sanitizer($this->input->post('review_rating'));
        $data['review_comment'] = sanitizer($this->input->post('review_comment'));
        $data['timestamp'] = strtotime(date('D, d-M-Y'));
        $this->db->insert('review', $data);
    }

    function get_listing_wise_review($listing_id = "") {
        return $this->db->get_where('review', array('listing_id' => $listing_id))->result_array();
    }

    function get_listing_wise_rating($listing_id = "") {
        $this->db->select_avg('review_rating');
        $rating = $this->db->get_where('review', array('listing_id' => $listing_id))->row()->review_rating;
        return number_format((float)$rating, 1, '.', '');
    }

    function get_rating_wise_quality($listing_id = "") {
        $rating = $this->get_listing_wise_rating($listing_id);
        $this->db->where('rating_to >=', $rating);
        $this->db->where('rating_from <=', $rating);
        return $this->db->get('review_wise_quality')->row_array();
    }

    public function get_percentage_of_specific_rating($listing_id = "", $rating = "") {
        $total_number_of_reviewers = count($this->get_listing_wise_review($listing_id));
        $total_number_of_reviewers_of_specific_rating = $this->db->get_where('review', array('listing_id' => $listing_id, 'review_rating' => $rating))->num_rows();

        if ($total_number_of_reviewers_of_specific_rating > 0) {
            $percentage = ($total_number_of_reviewers_of_specific_rating / $total_number_of_reviewers) * 100;
        }else {
            $percentage = 0;
        }
        return floor($percentage);
    }

    public function get_reviewers_image($email = "") {
        $user_details = $this->db->get_where('user', array('email' => $email));
        if($user_details->num_rows() > 0) {
            return base_url("uploads/user_image/".$user_details->row()->id.'.jpg');
        }else {
            return base_url('uploads/user_image/user.png');
        }
    }

    public function toggle_wishlist($listing_id = "") {
        $existing_wishlist = array();
        $status = "";
        $user_details = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')))->row_array();
        if ($user_details['wishlists'] != "") {
            $existing_wishlist = json_decode($user_details['wishlists']);
            if (in_array($listing_id, $existing_wishlist)) {
                if (($key = array_search($listing_id, $existing_wishlist)) !== false) {
                    unset($existing_wishlist[$key]);
                }
                $status = 'removed';
            }else {
                array_push($existing_wishlist, $listing_id);
                $status = 'added';
            }
        }else {
            array_push($existing_wishlist, $listing_id);
            $status = 'added';
        }
        $updater = array(
            'wishlists' => json_encode($existing_wishlist)
        );
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('user', $updater);
        return $status;
    }

    function report_this_listing() {
      $data['listing_id'] = sanitizer($this->input->post('listing_id'));
      $data['reporter_id'] = sanitizer($this->input->post('reporter_id'));
      $data['report'] = sanitizer($this->input->post('report'));
      $data['status'] = 0;
      $data['date_added'] = strtotime(date('D, d M Y'));
      $this->db->insert('reported_listing', $data);
    }

    function get_category_wise_listings($category_id = "") {
        $listing_ids = array();
        $listings = $this->get_listings()->result_array();
        foreach ($listings as $listing) {
            if(!has_package($listing['user_id']) > 0){
                continue;
            }
            $categories = json_decode($listing['categories']);
            if(in_array($category_id, $categories)) {
                array_push($listing_ids, $listing['id']);
            }
        }
        if (count($listing_ids) > 0) {
            $this->db->where_in('id', $listing_ids);
            $this->db->where('status', 'active');
            return  $this->db->get('listing')->result_array();
        }else {
            return array();
        }
    }

    function get_top_ten_listings() {
        $listing_ids = array();
        $listing_id_with_rating = array();
        $listings = $this->get_listings()->result_array();
        foreach ($listings as $listing) {
          if(!has_package($listing['user_id']) > 0){
            continue;
          }
          $listing_id_with_rating[$listing['id']] = $this->get_listing_wise_rating($listing['id']);
        }
        arsort($listing_id_with_rating);
        foreach ($listing_id_with_rating as $key => $value) {
            if (count($listing_ids) <= 10) {
                array_push($listing_ids, $key);
            }
        }
        if (count($listing_ids) > 0) {
            $this->db->where_in('id', $listing_ids);
            $this->db->where('status', 'active');
            return  $this->db->get('listing')->result_array();
        }else {
            return array();
        }
    }

    function search_listing($search_string = '', $selected_category_id = '') {
        if ($search_string != "") {
            $this->db->like('name', $search_string);
        }

        if ($selected_category_id != "") {
            $this->db->like('categories', "$selected_category_id");
        }

        $this->db->order_by('is_featured', 'desc');

        $this->db->where('status', 'active');
        return  $this->db->get('listing')->result_array();
    }

    function get_the_maximum_price_limit_of_all_listings() {
      $related_tables = array('hotel_room_specification', 'food_menu', 'product_details');
      $maximum_prices = array();
      for ($i=0; $i < count($related_tables); $i++) { // select_max active record didn't work, thats why i had to do in this shitty style
        $prices = array();
        $this->db->select('price');
        $query_price = $this->db->get($related_tables[$i])->result_array();
        foreach ($query_price as $query) {
            array_push($prices, $query['price']);
        }
        if (count($prices) > 0) {
          array_push($maximum_prices, max($prices));
      }else {
          array_push($maximum_prices, 0);
      }
      }
      return max($maximum_prices);
    }

    function check_if_this_listing_lies_in_price_range($listing_id = "", $price_range = "") {

      $maximum_price = 0;

      if ($price_range > 0) {
        $listing_details = $this->db->get_where('listing', array('id' => $listing_id))->row_array();

        if($listing_details['listing_type'] == 'hotel') {
          $this->db->select_max('price');
          $maximum_price = $this->db->get_where('hotel_room_specification', array('listing_id' => $listing_id))->row()->price;

        }elseif ($listing_details['listing_type'] == 'shop') {
          $this->db->select_max('price');
          $maximum_price = $this->db->get_where('product_details', array('listing_id' => $listing_id))->row()->price;

        }elseif ($listing_details['listing_type'] == 'restaurant') {
          $this->db->select_max('price');
          $maximum_price = $this->db->get_where('food_menu', array('listing_id' => $listing_id))->row()->price;
        }

         // echo $listing_id.'-'.$maximum_price.'--'.$price_range.'<br/>';

        // returning part
        if ($price_range >= $maximum_price) {
            return $listing_id;
        }else {
            return 0;
        }
      }else {
        return $listing_id;
      }
    }
}
