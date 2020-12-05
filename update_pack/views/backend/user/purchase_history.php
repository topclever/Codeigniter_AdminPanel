<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('purchase_histories'); ?></h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">

        <h4 class="header-title"><?php echo get_phrase('purchased_packages'); ?></h4>

        <div class="table-responsive-sm">
          <table class="table table-striped table-centered mb-0">
            <thead style="text-align: center;">
              <tr>
                <th>#</th>
                <th><?php echo get_phrase('package_name'); ?></th>
                <th><?php echo get_phrase('purchase_date'); ?></th>
                <th><?php echo get_phrase('expired_date'); ?></th>
                <th><?php echo get_phrase('amount_paid'); ?></th>
                <th><?php echo get_phrase('payment_method'); ?></th>
                <th><?php echo get_phrase('action'); ?></th>
              </tr>
            </thead>
            <tbody style="text-align: center;">
              <?php foreach ($purchase_histories as $key => $purchase_history): ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td>
                    <?php echo $this->db->get_where('package', array('id' => $purchase_history['package_id']))->row('name'); ?>
                    <?php
                    $active_package = has_package($this->session->userdata('user_id'), true);
                    if ($active_package['id'] == $purchase_history['id']): ?>
                      <br> <small><span class="badge badge-success "><?php echo get_phrase('currently_active'); ?></span></small>
                    <?php endif; ?>
                  </td>
                  <td><?php echo date('D, d-M-Y', $purchase_history['purchase_date']); ?></td>
                  <td><?php echo date('D, d-M-Y', $purchase_history['expired_date']); ?></td>
                  <td><?php echo currency($purchase_history['amount_paid']); ?></td>
                  <td><?php echo ucfirst($purchase_history['payment_method']); ?></td>
                  <td> <a href="<?php echo site_url('user/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-icon btn-primary"><i class="mdi mdi-printer"></i> <?php echo get_phrase('print_invoice'); ?></a> </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div> <!-- end table-responsive-->

      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div>
</div>
