<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('system_settings'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('system_settings');?></h4>

                    <form action="<?php echo site_url('admin/system_settings/system_update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="website_title"><?php echo get_phrase('website_title'); ?></label>
                            <input type="text" name = "website_title" id = "website_title" class="form-control" value="<?php echo get_settings('website_title');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="system_title"><?php echo get_phrase('system_title'); ?></label>
                            <input type="text" name = "system_title" id = "system_title" class="form-control" value="<?php echo get_settings('system_title');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="system_email"><?php echo get_phrase('system_email'); ?></label>
                            <input type="text" name = "system_email" id = "system_email" class="form-control" value="<?php echo get_settings('system_email');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="address"><?php echo get_phrase('address'); ?></label>
                            <textarea name="address" id = "address" class="form-control" rows="4"><?php echo get_settings('address');  ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone"><?php echo get_phrase('phone'); ?></label>
                            <input type="text" name = "phone" id = "phone" class="form-control" value="<?php echo get_settings('phone');  ?>">
                        </div>

                        <div class="form-group">
                            <label for="country_id"><?php echo get_phrase('country'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="country_id" id="country_id">
                                <?php $countries = $this->crud_model->get_countries()->result_array(); ?>
                                <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['id']; ?>" <?php if(get_settings('country_id') == $country['id']) echo 'selected'; ?>><?php echo $country['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="country_id"><?php echo get_phrase('timezone'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="timezone" id="timezone">
                                <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL); ?>
                                <?php foreach ($tzlist as $tz): ?>
                                    <option value="<?php echo $tz; ?>" <?php if(get_settings('timezone') == $tz) echo 'selected'; ?>><?php echo $tz; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="language"><?php echo get_phrase('system_language'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="language" id="language">
                                <?php foreach ($languages as $language): ?>
                                    <option value="<?php echo $language; ?>" <?php if(get_settings('language') == $language) echo 'selected'; ?>><?php echo ucfirst($language); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="purchase_code"><?php echo get_phrase('purchase_code'); ?></label>
                            <input type="text" name = "purchase_code" id = "purchase_code" class="form-control" value="<?php echo get_settings('purchase_code');  ?>">
                        </div>

                        <button type="submit" class="btn btn-primary"><?php echo get_phrase('save'); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_product');?></h4>

                    <form action="<?php echo site_url('updater/update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label><?php echo get_phrase('file'); ?></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_name" name="file_name">
                                    <label class="custom-file-label" for="file_name"><?php echo get_phrase('update_product'); ?></label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><?php echo get_phrase('install_update'); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#address']);
  });
</script>