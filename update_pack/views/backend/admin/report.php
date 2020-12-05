<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('report'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title"><?php echo get_phrase('purchase_histories'); ?></h4>
              <div class="row justify-content-md-center">
                  <div class="col-xl-6">
                      <form class="form-inline" action="<?php echo site_url('admin/report/filter_by_date_range') ?>" method="get">
                          <div class="col-xl-10">
                              <div class="form-group">
                                  <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                      <i class="mdi mdi-calendar"></i>&nbsp;
                                      <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                                  </div>
                                  <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                              </div>
                          </div>
                          <div class="col-xl-2">
                              <button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="table-responsive-sm mt-4">
                <table class="table table-striped table-centered mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo get_phrase('date'); ?></th>
                      <th><?php echo get_phrase('buyer'); ?></th>
                      <th><?php echo get_phrase('package'); ?></th>
                      <th><?php echo get_phrase('amount_paid'); ?></th>
                      <th><?php echo get_phrase('actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                       $total_amount = 0;
                       foreach ($purchase_histories->result_array() as $key => $purchase_history):
                           $total_amount += $purchase_history['amount_paid']; ?>
                          <tr>
                              <td><?php echo $key+1; ?></td>
                              <td>
                                  <?php
                                    echo date('D d-M-Y', $purchase_history['purchase_date']);
                                   ?>
                              </td>
                              <td>
                                  <?php
                                    $user_details = $this->user_model->get_all_users($purchase_history['user_id'])->row_array();
                                    echo $user_details['name'];
                                   ?>
                              </td>
                              <td>
                                  <?php
                                    $package_details = $this->crud_model->get_packages($purchase_history['package_id'])->row_array();
                                    echo $package_details['name'];
                                   ?>
                              </td>
                              <td>
                                  <?php
                                    echo currency($purchase_history['amount_paid']);
                                   ?>
                                  <?php
                                    if($purchase_history['amount_paid'] > 0 ){
                                      if($purchase_history['payment_method'] == 'stripe' || $purchase_history['payment_method'] == 'paypal'){
                                      ?>                                  
                                        <small><span class="badge badge-success "><?php echo $purchase_history['payment_method']; ?></span></small>
                                      <?php }else{
                                        ?>
                                          <small><span class="badge badge-info "><?php echo $purchase_history['payment_method']; ?></span></small>
                                        <?php
                                      }
                                    }else{  ?>
                                      <small><span class="badge badge-dark "><?php echo $purchase_history['payment_method']; ?></span></small>
                                    <?php }  ?>
                              </td>
                              <td class="text-center">
                                  <a href="<?php echo site_url('admin/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-icon btn-primary"><i class="mdi mdi-printer"></i> <?php echo get_phrase('invoice'); ?></a>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                      <tr>
                          <td colspan="4"> <strong><?php echo get_phrase('total_amount'); ?>:</strong> </td>
                          <td colspan="2"><strong><?php echo currency($total_amount); ?></strong> </td>
                      </tr>
                  </tbody>
              </table>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
    function update_date_range()
    {
        var x = $("#selectedValue").html();
        $("#date_range").val(x);
    }
</script>
