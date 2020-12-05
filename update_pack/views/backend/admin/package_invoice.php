<?php
  $user_details = $this->db->get_where('user', array('id' => $purchase_history['user_id']))->row_array();
  $package_details = $this->db->get_where('package', array('id' => $purchase_history['package_id']))->row_array();
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <!-- Invoice Logo-->
        <div class="clearfix">
          <div class="float-left mb-3">
            <img src="<?php echo base_url('assets/global/dark_logo.png'); ?>" alt="" height="30">
          </div>
          <div class="float-right">
            <h4 class="m-0 d-print-none"><?php echo get_phrase('invoice'); ?></h4>
          </div>
        </div>

        <!-- Invoice Detail-->
        <div class="row justify-content-end">
          <div class="col-sm-4 offset-sm-2">
            <div class="mt-3 float-sm-right">
              <p class="font-13"><strong><?php echo get_phrase('purchase_date'); ?>: </strong> &nbsp;&nbsp;&nbsp; <?php echo date('D, d-M-Y', $purchase_history['purchase_date']); ?></p>
              <p class="font-13"><strong><?php echo get_phrase('purchase_status'); ?>: </strong> <span class="badge badge-success float-right"><?php echo get_phrase('paid'); ?></span></p>
              <p class="font-13"><strong><?php echo get_phrase('order_id_no'); ?>: </strong> <span class="float-right"><?php echo sprintf('%07d', $purchase_history['id']); ?></span></p>
            </div>
          </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row mt-4">
          <div class="col-sm-4">
            <h6><?php echo get_phrase('billing_to'); ?></h6>
            <address>
              <?php echo $user_details['name']; ?><br>
              <?php echo $user_details['address']; ?><br>
              <?php echo $user_details['phone']; ?><br>
            </address>
          </div>
          <div class="col-sm-4">
            <h6><?php echo get_phrase('billing_from'); ?></h6>
            <address>
              <?php echo get_settings('website_title'); ?><br>
              <?php echo get_settings('address'); ?><br>
              <?php echo get_settings('phone'); ?><br>
            </address>
          </div>
        </div>

        <!-- end row -->

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table mt-4">
                <thead>
                  <tr><th>#</th>
                    <th><?php echo get_phrase('package_name'); ?></th>
                    <th><?php echo get_phrase('expired_date'); ?></th>
                    <th><?php echo get_phrase('cost'); ?></th>
                    <th class="text-right"><?php echo get_phrase('total'); ?></th>
                  </tr></thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        <b><?php echo $package_details['name']; ?></b> <br/>
                      </td>
                      <td><?php echo date('D, d-M-Y', $purchase_history['expired_date']); ?></td>
                      <td><?php echo currency($purchase_history['amount_paid']); ?></td>
                      <td class="text-right"><?php echo currency($purchase_history['amount_paid']); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- end table-responsive-->
            </div> <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row justify-content-end">
            <div class="col-sm-6">
              <div class="float-right mt-3 mt-sm-0">
                <p><b>Sub-total:</b> <span class="float-right"><?php echo currency($purchase_history['amount_paid']); ?></span></p>
                <h3><?php echo currency($purchase_history['amount_paid']); ?> <?php echo get_settings('system_currency') ?></h3>
              </div>
              <div class="clearfix"></div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->

          <div class="d-print-none mt-4">
            <div class="text-right">
              <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> <?php echo get_phrase('print'); ?></a>
            </div>
          </div>
          <!-- end buttons -->

        </div> <!-- end card-body-->
      </div> <!-- end card -->
    </div> <!-- end col-->
  </div>
