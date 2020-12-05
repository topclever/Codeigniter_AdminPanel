<?php
    $edit_data = $this->db->get_where('review_wise_quality', array('id' => $id))->row_array();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('update_rating_wise_quality'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-md-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('edit_form'); ?></h4>

                <form action="<?php echo site_url('admin/rating_wise_quality/edit/'.$id); ?>" method="post" role="form" class="form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label for="rating_from"><?php echo get_phrase('rating_from'); ?></label>
                        <input type="text" class="form-control" id="rating_from" name="rating_from" value="<?php echo $edit_data['rating_from']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rating_to"><?php echo get_phrase('rating_to'); ?></label>
                        <input type="text" class="form-control" id="rating_to" name="rating_to" value="<?php echo $edit_data['rating_to']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="quality"><?php echo get_phrase('quality'); ?></label>
                        <input type="text" class="form-control" id="quality" name="quality" value="<?php echo $edit_data['quality']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo get_phrase('update'); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
