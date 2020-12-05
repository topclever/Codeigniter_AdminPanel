<div id = "special_offer_parent_div" style="display: none;">
  <div id = "special_offer_div">
    <div class="special_offer_div">
      <div class="col-xl-12">
        <!-- Portlet card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-0"><?php echo get_phrase('special_offers'); ?></h5>
            <div class="collapse pt-3 show">
              <div class="row">
                <div class="col-xl-8">
                  <div class="form-group">
                    <label for="product_name"><?php echo get_phrase('product_name'); ?></label>
                    <input type="text" name="product_name[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="variants"><?php echo get_phrase('variants'); ?> <small>(<?php echo get_phrase('press_Enter_after_entering_every_variant'); ?>)</small></label>
                    <input type="text" class="form-control bootstrap-tag-input" name="variants[]" data-role="tagsinput"/>
                  </div>

                  <div class="form-group">
                    <label for="product_price"><?php echo get_phrase('product_price').' ('.currency_code_and_symbol().')'; ?></label>
                    <input type="text" name="product_price[]" class="form-control" />
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="product-image-1" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_product_image'); ?>  <small>(200 X 200) </small> </label>
                        <input id="product-image-1" style="visibility:hidden;" type="file" class="image-upload" name="product_image[]" onchange="console.log(this.value);" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end card-->
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendSpecialOffer()"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_product'); ?></button>
  </div>
</div>

<div id = "blank_special_offer_div">
  <div class="special_offer_div">
    <div class="col-xl-12">
      <!-- Portlet card -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-0"><?php echo get_phrase('special_offers'); ?>
            <button type="button" class="btn btn-outline-danger btn-sm btn-rounded alignToTitle" name="button" onclick="removeSpecialOffer(this)"><?php echo get_phrase('remove_this_product'); ?></button>
          </h5>
          <div class="collapse pt-3 show">
            <div class="row">
              <div class="col-xl-8">
                <div class="form-group">
                  <label for="product_name"><?php echo get_phrase('product_name'); ?></label>
                  <input type="text" name="product_name[]" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="variants"><?php echo get_phrase('variants'); ?> <small>(<?php echo get_phrase('press_Enter_after_entering_every_variant'); ?>)</small></label>
                  <input type="text" class="form-control bootstrap-tag-input" name="variants[]" data-role="tagsinput"/>
                </div>

                <div class="form-group">
                  <label for="product_price"><?php echo get_phrase('product_price').' ('.currency_code_and_symbol().')'; ?></label>
                  <input type="text" name="product_price[]" class="form-control" />
                </div>
              </div>
              <div class="col-xl-4">
                <div class="wrapper-image-preview">
                  <div class="box">
                    <div class="js--image-preview"></div>
                    <div class="upload-options">
                      <label for="files" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_product_image'); ?>  <small>(200 X 200) </small> </label>
                      <input id="files" style="visibility:hidden;" type="file" class="image-upload" name="product_image[]" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end card-->
    </div>
  </div>
</div>
