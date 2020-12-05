<?php
$category_details = $this->crud_model->get_categories($category_id)->row_array();
?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('update_category'); ?></h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title"><?php echo get_phrase('update_category_form'); ?></h4>

          <form action="<?php echo site_url('admin/categories/edit/'.$category_id); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name"><?php echo get_phrase('category_title'); ?></label>
              <input type="text" class="form-control" id="name" name = "name" value="<?php echo $category_details['name']; ?>">
            </div>

            <div class="form-group">
              <label for="parent"><?php echo get_phrase('parent'); ?></label>
              <select class="form-control select2" data-toggle="select2" name="parent" id="parent">
                <option value="0"><?php echo get_phrase('none'); ?></option>
                <?php foreach ($categories as $category): ?>
                  <?php if ($category['parent'] == 0 && $category_id != $category['id']): ?>
                    <option value="<?php echo $category['id']; ?>" <?php if($category_details['parent'] == $category['id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group" id = "icon-picker-area">
              <label for="font_awesome_class"><?php echo get_phrase('icon_picker'); ?></label>
              <input type="text" name="icon_class" class="form-control icon-picker" value="<?php echo $category_details['icon_class']; ?>" autocomplete="off" required>
            </div>

            <div class="form-group" id = "thumbnail-picker-area">
              <label><?php echo get_phrase('category_thumbnail'); ?> <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 400 X 255)</small> </label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="category_thumbnail" name="category_thumbnail" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                  <label class="custom-file-label" for="category_thumbnail"><?php echo get_phrase('choose_thumbnail'); ?></label>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<script type="text/javascript">
function checkCategoryType(category_type) {
  if (category_type > 0) {
    $('#thumbnail-picker-area').hide();
  }else {
    $('#thumbnail-picker-area').show();
  }
}

$(document).ready(function () {
  var parent_category = $('#parent').val();
  checkCategoryType(parent_category);
});
</script>
