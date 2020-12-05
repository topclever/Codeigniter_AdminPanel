<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('dashboard'); ?></h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div>
</div>
<div class="row">
  <div class="col-xl-6">
    <div class="row">

      <div class="col-xl-6">
        <div class="card widget-flat bg-primary text-white">
          <div class="card-body">
            <div class="float-right">
              <i class="mdi mdi-briefcase widget-icon bg-white text-primary"></i>
            </div>
            <h5 class="font-weight-normal mt-0" title="<?php echo get_phrase('total_amount_spent'); ?>"><?php echo get_phrase('total_amount_spent'); ?></h5>
            <h3 class="mt-3 mb-3 text-white">
              <?php
              $this->db->select_sum('amount_paid');
              $total_spent_amount = $this->db->get_where('package_purchased_history', array('user_id' => $this->session->userdata('user_id')))->row_array();
              echo currency($total_spent_amount['amount_paid']);
              ?>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-xl-6">
        <div class="card widget-flat bg-success text-white">
          <div class="card-body">
            <div class="float-right">
              <i class="mdi mdi-tag widget-icon bg-white text-success"></i>
            </div>
            <h5 class="font-weight-normal mt-0" title="<?php echo get_phrase('number_of_wishlisted_items'); ?>"><?php echo get_phrase('number_of_wishlisted_items'); ?></h5>
            <h3 class="mt-3 mb-3">
              <?php
              $wishlisted_items = $this->crud_model->get_user_wise_wishlist();
              echo count($wishlisted_items);
              ?>
            </h3>
          </div>
        </div>
      </div>


      <div class="col-xl-6">
        <div class="card widget-flat bg-success text-white">
          <div class="card-body">
            <div class="float-right">
              <i class="mdi mdi-tag widget-icon bg-white text-success"></i>
            </div>
            <h5 class="font-weight-normal mt-0" title="<?php echo get_phrase('number_of_active_listing'); ?>"><?php echo get_phrase('number_of_active_listing'); ?></h5>
            <h3 class="mt-3 mb-3">
              <?php
              $active_listing = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id'), 'status' => 'active'))->result_array();
              echo count($active_listing);
              ?>
            </h3>
          </div>
        </div>
      </div>

      <div class="col-xl-6">
        <div class="card widget-flat bg-info text-white">
          <div class="card-body">
            <div class="float-right">
              <i class="mdi mdi-tag-minus widget-icon bg-white text-info"></i>
            </div>
            <h5 class="font-weight-normal mt-0" title="<?php echo get_phrase('number_of_pending_listing'); ?>"><?php echo get_phrase('number_of_pending_listing'); ?></h5>
            <h3 class="mt-3 mb-3">
              <?php
              $pending_listing = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id'), 'status' => 'pending'))->result_array();
              echo count($pending_listing);
              ?>
            </h3>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="col-xl-6">
    <div class="card cta-box bg-primary text-white">
      <div class="card-body">
        <?php
        $currently_active_package = has_package($this->session->userdata('user_id'), true);
        if ($currently_active_package['package_id'] > 0):
          $package_details = $this->db->get_where('package', array('id' => $currently_active_package['package_id']))->row_array();
          ?>
          <div class="media align-items-center">
            <div class="media-body">
              <h2 class="mt-0"><i class="mdi mdi-bullhorn-outline"></i></h2>
              <h3 class="mt-1 font-weight-normal cta-box-title"> <?php echo get_phrase('currently_active_package').' : <b>'.$package_details['name'].'</b>'; ?></h3>
              <p class="mt-1 font-weight-normal"><?php echo get_phrase('purchase_date').': <b>'.date('D, d M Y', $currently_active_package['purchase_date']).'<b>'; ?></p>
                <p class="mt-1 font-weight-normal"><?php echo get_phrase('expiry_date').': <b>'.date('D, d M Y', $currently_active_package['expired_date']).'<b>'; ?></p>
                </div>
                <img class="ml-3" src="<?php echo base_url('assets/backend/images/report.svg'); ?>" width="120" alt="Generic placeholder image">
              </div>
              <div class="row mt-4 justify-content-center">
                <a href="<?php echo site_url('user/packages'); ?>" class="btn btn-outline-light btn-rounded"><?php echo get_phrase('for_more_info'); ?></a>
              </div>
            <?php else: ?>
              <div class="media align-items-center">
                <div class="media-body">
                  <h2 class="mt-0"><i class="mdi mdi-bullhorn-outline"></i></h2>
                  <h3 class="mt-1 font-weight-normal cta-box-title"> <?php echo get_phrase('no_package_is_currently_active'); ?></h3>
                </div>
                <img class="ml-3" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>" width="120" alt="Generic placeholder image">
              </div>
              <div class="row mt-4 justify-content-center">
                <a href="<?php echo site_url('user/packages'); ?>" class="btn btn-outline-light btn-rounded"><?php echo get_phrase('buy_package'); ?></a>
              </div>
            <?php endif; ?>
          </div>
          <!-- end card-body -->
        </div>
      </div>
    </div>
