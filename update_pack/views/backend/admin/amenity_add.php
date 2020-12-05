<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box ">
            <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('add_new_amenity'); ?></h4>
        </div>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('amenity_add_form'); ?></h4>

                <form action="<?php echo site_url('admin/amenities/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('name'); ?></label>
                        <input type="text" class="form-control" id="name" name = "name">
                    </div>

                    <div class="form-group">
                        <label for="font_awesome_class"><?php echo get_phrase('icon_picker'); ?></label>
                        <input type="text" name="icon" class="form-control icon-picker" autocomplete="off" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
