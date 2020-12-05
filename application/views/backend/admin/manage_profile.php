<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('manage_profile'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('edit_profile'); ?></h4>
                    <form action="<?php echo site_url('admin/manage_profile/update_profile_info/'.$user_info['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="name"><?php echo get_phrase('name'); ?></label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="name" value="<?php echo $user_info['name'];?>" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputEmail"><?php echo get_phrase('email'); ?></label>
                                </div>
                                <div class="col-7">
                                    <input type="email" name="email" value="<?php echo $user_info['email'];?>" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputPhone"><?php echo get_phrase('phone'); ?></label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="phone" value="<?php echo $user_info['phone'];?>" class="form-control" id="exampleInputPhone" placeholder="Phone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputAddress"><?php echo get_phrase('address'); ?></label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="address" value="<?php echo $user_info['address'];?>" class="form-control" id="exampleInputAddress" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <?php
                            $social_links = json_decode($user_info['social'], true);
                         ?>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-2">
                                     <label for="facebook"><?php echo get_phrase('social_links'); ?></label>
                                 </div>
                                 <div class="col-7">
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text" id="facebook"> <i class="mdi mdi-facebook"></i> </span>
                                         </div>
                                         <input type="text" class="form-control" name="facebook" placeholder="<?php echo get_phrase('write_down_facebook_url') ?>" aria-describedby="facebook" value="<?php echo $social_links['facebook']; ?>">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-2">
                                     <!-- <label for="twitter"><?php echo get_phrase('twitter'); ?></label> -->
                                 </div>
                                 <div class="col-7">
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text" id="twitter"> <i class="mdi mdi-twitter"></i> </span>
                                         </div>
                                         <input type="text" class="form-control" name="twitter" placeholder="<?php echo get_phrase('write_down_twitter_url') ?>" aria-describedby="twitter" value="<?php echo $social_links['twitter']; ?>">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-2">
                                     <!-- <label for="facebook"><?php echo get_phrase('linkedin'); ?></label> -->
                                 </div>
                                 <div class="col-7">
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text" id="linkedin"> <i class="mdi mdi-linkedin"></i> </span>
                                         </div>
                                         <input type="text" class="form-control" name="linkedin" placeholder="<?php echo get_phrase('write_down_linkedin_url') ?>" aria-describedby="linkedin" value="<?php echo $social_links['linkedin']; ?>">
                                     </div>
                                 </div>
                             </div>
                         </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="inputGroupFile04"><?php echo get_phrase('image'); ?></label>
                                </div>
                                <div class="col-7">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile04" name="user_image" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile04"><?php echo get_phrase('choose_file'); ?></label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">

                                </div>
                                <div class="col-7 text-center">
                                    <button type="submit" class="btn btn-primary w-50"><?php echo get_phrase('submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo site_url('admin/manage_profile/change_password/'.$user_info['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label for="current_password"><?php echo get_phrase('current_password'); ?></label>
                            </div>
                            <div class="col-7">
                                <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label for="new_password"><?php echo get_phrase('new_password'); ?></label>
                            </div>
                            <div class="col-7">
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label for="confirm_password"><?php echo get_phrase('confirm_new_password'); ?></label>
                            </div>
                            <div class="col-7">
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm new password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-7 text-center">
                                <button type="submit" class="btn btn-primary w-50"><?php echo get_phrase('change_password'); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
