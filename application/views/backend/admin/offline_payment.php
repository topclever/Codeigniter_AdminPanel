<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="dripicons-card title_icon"></i> <?php echo get_phrase('offline_payment'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-md-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('offline_payment'); ?></h4>

                <form action="<?php echo site_url('admin/offline_payment/pay'); ?>" method="post" role="form" class="form-horizontal form-groups-bordered">
                    <div class="form-group">
						<label class="form-label" for="user"><?php echo get_phrase('user'); ?></label>
						<select name="user" class="form-control select2" data-toggle="select2" required>
						    <option value=""><?php echo get_phrase('select_user'); ?></option>
					        <?php
					        	$users = $this->db->get('user')->result_array();
					        	foreach($users as $user){
					        		if($user['role_id'] == 2){
					        ?>
					        		<option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
					        <?php
					        		}
					        	}
					        ?>
						</select>
			        </div>
			        <div class="form-group">
						<label class="form-label" for="package"><?php echo get_phrase('choose_package'); ?></label>
						<select name="package" class="form-control select2" data-toggle="select2" id="package" required>
						    <option value=""><?php echo get_phrase('select_package'); ?></option>
					        <?php
					        	$packages = $this->db->get('package')->result_array();
					        	foreach($packages as $package){
					        		if($package['package_type'] == 1){
					        ?>
					        		<option value="<?php echo $package['id']; ?>"><?php echo $package['name'].' '.'('.currency_code_and_symbol().$package['price'].') '; ?></option>
					        <?php
					        		}
					        	}
					        ?>
						</select>
			        </div>
			        <div class="form-group">
						<label class="form-label" for="amount"><?php echo get_phrase('payment_amount').' ('.currency_code_and_symbol().')'; ?></label>
						<input type="number" value="0" class="form-control" id="amount" name="amount" placeholder="<?php echo get_phrase('amount'); ?>" required>
			        </div>
			        <div class="form-group">
						<label class="form-label" for="payment_method"><?php echo get_phrase('payment_method'); ?></label>
						<input type="text" class="form-control" id="payment_method" name="payment_method" placeholder="<?php echo get_phrase('payment_method'); ?>">
			        </div>
                    

                    <button type="submit" class="btn btn-primary mt-1"><?php echo get_phrase('add_user_to_package'); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>