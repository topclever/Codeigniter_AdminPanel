<?php
$number_of_active_listing = 0;
$number_of_pending_listing = 0;
$listings = $this->db->get('listing')->result_array();
foreach ($listings as $key => $listing) {
    if(!has_package($listing['user_id']) > 0)
    continue;
    if ($listing['status'] == 'active') {
        $number_of_active_listing++;
    }
    if ($listing['status'] != 'active') {
        $number_of_pending_listing++;
    }
}

// Package expiration in this month
$current_date_time = strtotime(date('d-m-Y 00:00:00'));
$first_day_this_month = strtotime(date('01-m-Y').' 00:00:00'); // hard-coded '01' for first day
$last_day_this_month  = strtotime(date('t-m-Y').' 00:00:00');
$this->db->where('expired_date >=' , $first_day_this_month);
$this->db->where('expired_date <=' , $last_day_this_month);
$expiration_in_this_month = $this->db->get('package_purchased_history')->result_array();
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('dashboard'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-4"><?php echo get_phrase('income_overview'); ?></h4>

                <div class="mt-3 chartjs-chart" style="height: 320px;">
                    <canvas id="task-area-chart"></canvas>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?php echo get_phrase('listing_overview'); ?></h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="project-status-chart"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $number_of_active_listing; ?></span>
                        </h3>
                        <p class="text-muted mb-0"><?php echo get_phrase('active_listings'); ?></p>
                    </div>
                    <div class="col-6">
                        <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $number_of_pending_listing; ?></span>
                        </h3>
                        <p class="text-muted mb-0"> <?php echo get_phrase('pending_listings'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('package_expiration').' : '.date('F'); ?></h4>
                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <tbody>

                            <?php foreach ($expiration_in_this_month as $key => $row):
                                $user_details = $this->user_model->get_all_users($row['user_id'])->row_array();
                                $package_details = $this->crud_model->get_packages($row['package_id'])->row_array();
                            ?>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $package_details['name']; ?></a></h5>
                                        <span class="text-muted font-13"><?php echo get_phrase('package_name'); ?></span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $user_details['name']; ?></a></h5>
                                        <small><?php echo get_phrase('email'); ?>: <span class="text-muted font-13"><?php echo $user_details['email']; ?></span></small>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13"><?php echo get_phrase('expires_in'); ?></span> <br/>
                                        <?php if ($current_date_time > $row['expired_date']): ?>
                                            <span class="badge badge-danger-lighten"><?php echo date('D, d-M-Y', $row['expired_date']); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-warning-lighten"><?php echo date('D, d-M-Y', $row['expired_date']); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $this->db->get_where('listing', array('user_id' => $row['user_id'], 'status' => 'active'))->num_rows(); ?></a></h5>
                                        <small><span class="text-muted font-13"><?php echo get_phrase('total_number_of_listing'); ?></span></small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
