<?php
    $city_details = $this->crud_model->get_cities($city_id)->row_array();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('update_city'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-md-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('city_edit_form'); ?></h4>

                <form action="<?php echo site_url('admin/cities/edit/'.$city_id); ?>" method="post" role="form" class="form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('city_name'); ?></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $city_details['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="country_id"><?php echo get_phrase('country'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="country_id" id="country_id">
                            <?php foreach ($countries as $country): ?>
                               <option value="<?php echo $country['id']; ?>" <?php if($city_details['country_id'] == $country['id']) echo 'selected'; ?>><?php echo $country['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo get_phrase('update_city'); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
