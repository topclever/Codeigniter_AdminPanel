<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('add_new_city'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-md-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('city_add_form'); ?></h4>

                <form action="<?php echo site_url('admin/cities/add'); ?>" method="post" role="form" class="form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('city_name'); ?></label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="country_id"><?php echo get_phrase('country'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="country_id" id="country_id">
                          <option value="0"><?php echo get_phrase('none'); ?></option>
                          <?php foreach ($countries as $country): ?>
                              <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
