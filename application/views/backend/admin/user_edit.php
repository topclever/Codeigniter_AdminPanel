<?php
    $user_details = $this->user_model->get_all_users($user_id)->row_array();
    $social_links = json_decode($user_details['social'], true);
 ?>
 <div class="row ">
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('add_new_user'); ?></h4>
             </div> <!-- end card body-->
         </div> <!-- end card -->
     </div><!-- end col-->
 </div>

 <div class="row justify-content-md-center">
     <div class="col-xl-6">
         <div class="card">
             <div class="card-body">
               <div class="col-lg-12">
                 <h4 class="mb-3 header-title"><?php echo get_phrase('user_add_form'); ?></h4>

                 <form action="<?php echo site_url('admin/users/edit/'.$user_id); ?>" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                     <div class="form-group">
                         <label for="name"><?php echo get_phrase('name'); ?></label>
                         <input type="text" name = "name" id = "name" class="form-control" required value="<?php echo $user_details['name']; ?>">
                     </div>

                     <div class="form-group">
                         <label for="email"><?php echo get_phrase('email'); ?></label>
                         <input type="email" name = "email" id = "email" class="form-control" required value="<?php echo $user_details['email']; ?>">
                     </div>

                     <div class="form-group">
                         <label for="address"><?php echo get_phrase('address'); ?></label>
                         <textarea name="address" id = "address" rows="5" class="form-control"><?php echo $user_details['address']; ?></textarea>
                     </div>


                     <div class="form-group">
                         <label for="phone"><?php echo get_phrase('phone'); ?></label>
                         <input type="text" id = "phone" name = "phone" class="form-control" value="<?php echo $user_details['phone']; ?>">
                     </div>

                     <div class="form-group">
                         <label for="website"><?php echo get_phrase('website'); ?></label>
                         <input type="text" id = "website" name = "website" class="form-control" value="<?php echo $user_details['website']; ?>">
                     </div>

                     <div class="form-group">
                         <label for="about"><?php echo get_phrase('about'); ?></label>
                         <textarea name="about" id = "about" rows="5" class="form-control"></textarea>
                     </div>

                     <div class="form-group mb-3">
                         <label><?php echo get_phrase('social_links') ?></label>
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="facebook"> <i class="mdi mdi-facebook"></i> </span>
                             </div>
                             <input type="text" class="form-control" name="facebook" placeholder="<?php echo get_phrase('write_down_facebook_url') ?>" aria-describedby="facebook" value="<?php echo $social_links['facebook']; ?>">
                         </div>
                     </div>
                     <div class="form-group mb-3">
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="twitter"> <i class="mdi mdi-twitter"></i> </span>
                             </div>
                             <input type="text" class="form-control" name="twitter" placeholder="<?php echo get_phrase('write_down_twitter_url') ?>" aria-describedby="twitter" value="<?php echo $social_links['twitter']; ?>">
                         </div>
                     </div>
                     <div class="form-group mb-3">
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="linkedin"> <i class="mdi mdi-linkedin"></i> </span>
                             </div>
                             <input type="text" class="form-control" name="linkedin" placeholder="<?php echo get_phrase('write_down_linkedin_url') ?>" aria-describedby="linkedin" value="<?php echo $social_links['linkedin']; ?>">
                         </div>
                     </div>

                     <div class="form-group mb-2">
                         <label><?php echo get_phrase('user_image'); ?></label>
                         <div class="input-group">
                             <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="user_image">
                                 <label class="custom-file-label" for="user_image" name="user_image" accept="image/*">Choose file</label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group mb-0">
                         <button type="submit" class="btn btn-primary"><?php echo get_phrase('save'); ?></button>
                     </div>
                 </form>
               </div>
             </div> <!-- end card body-->
         </div> <!-- end card -->
     </div><!-- end col-->
 </div>
