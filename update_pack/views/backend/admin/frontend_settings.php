<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('frontend_settings'); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('frontend_settings');?></h4>

                <form action="<?php echo site_url('admin/frontend_settings/frontend_update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="banner_title"><?php echo get_phrase('banner_title'); ?></label>
                        <input type="text" name = "banner_title" id = "banner_title" class="form-control" value="<?php echo get_frontend_settings('banner_title');  ?>">
                    </div>

                    <div class="form-group">
                        <label for="banner_sub_title"><?php echo get_phrase('banner_sub_title'); ?></label>
                        <input type="text" name = "banner_sub_title" id = "banner_sub_title" class="form-control" value="<?php echo get_frontend_settings('banner_sub_title');  ?>">
                    </div>

                    <div class="form-group">
                        <label for="slogan"><?php echo get_phrase('slogan'); ?></label>
                        <textarea name="slogan" class="form-control" rows="5"><?php echo get_frontend_settings('slogan'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_us"><?php echo get_phrase('about_us'); ?></label>
                        <textarea name="about_us" id = "about_us" class="form-control" rows="5"><?php echo get_frontend_settings('about_us'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="terms_and_condition"><?php echo get_phrase('terms_and_condition'); ?></label>
                        <textarea name="terms_and_condition" id ="terms_and_condition" class="form-control" rows="5"><?php echo get_frontend_settings('terms_and_condition'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="privacy_policy"><?php echo get_phrase('privacy_policy'); ?></label>
                        <textarea name="privacy_policy" id = "privacy_policy" class="form-control" rows="5"><?php echo get_frontend_settings('privacy_policy'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="privacy_policy"><?php echo 'FAQ'; ?></label>
                        <textarea name="faq" id = "faq" class="form-control" rows="5"><?php echo get_frontend_settings('faq'); ?></textarea>
                    </div>

                    <?php
                    $social_links = json_decode(get_frontend_settings('social_links'), true);
                    ?>
                    <div class="form-group">
                        <label for="social_links"><?php echo get_phrase('facebook_link'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="facebook"> <i class="mdi mdi-facebook"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="facebook" placeholder="<?php echo get_phrase('write_down_facebook_url') ?>" aria-describedby="facebook" value="<?php echo $social_links['facebook']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="social_links"><?php echo get_phrase('twitter_link'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="twitter"> <i class="mdi mdi-twitter"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="twitter" placeholder="<?php echo get_phrase('write_down_twitter_url') ?>" aria-describedby="twitter" value="<?php echo $social_links['twitter']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="social_links"><?php echo get_phrase('linkedin_link'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="linkedin"> <i class="mdi mdi-linkedin"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="linkedin" placeholder="<?php echo get_phrase('write_down_linkedin_url') ?>" aria-describedby="linkedin" value="<?php echo $social_links['linkedin']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="social_links"><?php echo get_phrase('google_link'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="google"> <i class="mdi mdi-google"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="google" placeholder="<?php echo get_phrase('write_down_google_url') ?>" aria-describedby="google" value="<?php echo $social_links['google']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="social_links"><?php echo get_phrase('instagram_link'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="google"> <i class="mdi mdi-instagram"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="instagram" placeholder="<?php echo get_phrase('write_down_instagram_url') ?>" aria-describedby="instagram" value="<?php echo $social_links['instagram']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="social_links"><?php echo get_phrase('pinterest_link'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="pinterest"> <i class="mdi mdi-pinterest"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="pinterest" placeholder="<?php echo get_phrase('write_down_pinterest_url') ?>" aria-describedby="pinterest" value="<?php echo $social_links['pinterest']; ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_settings'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-xl-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_banner_image');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/image_upload/banner_image'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/home_banner.jpg'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="banner_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_banner_image'); ?> <br> <small>(1400 X 950)</small> </label>
                                            <input id="banner_image" style="visibility:hidden;" type="file" class="image-upload" name="banner_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_banner_image'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-xl-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_light_logo');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/image_upload/light_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('assets/global/light_logo.png'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="light_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_light_logo'); ?> <br> <small>(330 X 70)</small> </label>
                                            <input id="light_logo" style="visibility:hidden;" type="file" class="image-upload" name="light_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_light_logo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_dark_logo');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/image_upload/dark_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('assets/global/dark_logo.png'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="dark_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_dark_logo'); ?> <br> <small>(330 X 70)</small> </label>
                                            <input id="dark_logo" style="visibility:hidden;" type="file" class="image-upload" name="dark_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_light_logo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_small_logo');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/image_upload/small_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('assets/global/logo-sm.png'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="small_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_small_logo'); ?> <br> <small>(49 X 58)</small> </label>
                                            <input id="small_logo" style="visibility:hidden;" type="file" class="image-upload" name="small_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_small_logo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_favicon');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/image_upload/favicon'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('assets/global/favicon.png'); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="favicon" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_favicon'); ?> <br> <small>(90 X 90)</small> </label>
                                            <input id="favicon" style="visibility:hidden;" type="file" class="image-upload" name="favicon" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_favicon'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#about_us', '#terms_and_condition', '#privacy_policy', '#faq']);
  });
</script>
