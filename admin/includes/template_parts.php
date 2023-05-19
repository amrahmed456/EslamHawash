<?php

function get_no_data_found($btn = '' , $link = false , $modalId = false){
    $modalId = ( !$modalId ) ? '#kt_modal_new_address' : $modalId;
    ?>

<div class="card">
    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Wrapper-->
        <div class="card-px text-center py-20 my-10">
            <!--begin::Title-->
            <h2 class="fs-2x fw-bolder mb-10">No Data Found!</h2>
            <!--end::Title-->
            <!--begin::Description-->
            <p class="text-gray-400 fs-4 fw-bold mb-10">Start by adding some data.<br>all of your data will be displayed here after you add it.</p>
            <!--end::Description-->
            <!--begin::Action-->
            <?php
                echo ( $link == false ) ? ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="'. $modalId .'">'. $btn .'</button>' : '<a href="' . $link . '" type="button" class="btn btn-primary">'. $btn .'</a>';
            ?>
           
            
            <!--end::Action-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Illustration-->
        <div class="text-center px-4">
            <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/2.png">
        </div>
        <!--end::Illustration-->
    </div>
    <!--end::Card body-->
</div>

    <?php
}


function get_edit_categores( $slug ){
    $camp = new CategoriesModel;
    $camp = $camp->get_category_product($slug , '' , true , 'all-cats');
    $cats = new CategoriesModel;
    $cats = $cats->get_category_product('' , '' , true , 'all-cats');

    ?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div id="kt_content_container" class="container-xxl">

    <?php

        if( count($camp) > 0 ){
            $camp = $camp[0];
            ?>
<form method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="kt_modal_new_card_form">

<input type="text" name="form_action" value="edit_category" hidden />
<input type="text" name="camp_id" value="<?php echo $camp['cat_slug']; ?>" hidden />

                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px" style="max-height: 268px;">
                        
 
                <!--begin::Input group-->
                <div id="kt_modal_add_customer_billing_info" class="collapse show">
                    <!--begin::Input group-->
                    
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row mt-4">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Title ( English )</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input required="" class="form-control form-control-solid" placeholder="Enter Categry title in english" value="<?php echo $camp['name_en']; ?>" name="name_en">
                        <!--end::Input-->
                    </div>
                    <div class="d-flex flex-column mb-7 fv-row mt-4">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Title ( Arabic )</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input required="" class="form-control form-control-solid" placeholder="Enter Categry title in arabic" value="<?php echo $camp['name_ar']; ?>" name="name_ar">
                        <!--end::Input-->
                    </div>

                    <select name="parent_id" aria-label="Select Parent" data-placeholder="Select Parent category ..." class="form-select form-select-solid form-select-lg fw-bold">
                        <option value="0">Select Parent category...</option>
                        <?php
                            if(count($cats) > 0){
                                echo 'Parent: '.$camp['parent_id'];
                                $selected = 'false';
                                foreach($cats as $cat){
                                    if($cat['parent_id'] != $camp['category_id'] && $cat['category_id'] != $camp['category_id']){
                                        if($selected == 'false' && $cat['category_id'] == $camp['parent_id']){
                                            $selected = 'selected';
                                            
                                        }
                                        echo "<option $selected value='".$cat['category_id']."'>".$cat['name_en']."</option>";
                                        $selected = ($selected == 'selected') ? '' : 'false';
                                    }
                                }
                            }
                        ?>
                    </select>
                   
                </div><!--end::Billing form-->
               
                </div>
                <!--end::Scroll-->
            </div>
            
            
                
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    
                    <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                        <span class="indicator-label">Save Changes</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form><!--end::Form-->
            <?php
        }else{
            echo '<h2 class="text-center"> Broken URL </h2><a class="btn btn-primary text-center m-auto btn-block d-flex justify-content-center" href="index.php">Go back</a>';
        }

    ?>

    </div>

</div>

    <?php
}



function get_project_form_template($data = []){
    // get categoreies
    $cats = new CategoriesModel;
    $cats = $cats->get_category_product('','',true);
    
    if(count($cats) > 0){

    
    $default_data = [
        'action' => 'insert_new_project',
        'port_slug' => time(),
        'status' => '1',
        'title_en' => '',
        'title_ar' => '',
        'description_en' => '',
        'description_ar' => '',
        'cat_id' => '',
        'photos' => '',
        'panorama'  => '',
        'videos'    => ''
    ];

    $logo_position = ( isset($_GET['logo-position']) ) ? $_GET['logo-position'] : 'bottom';
    $data = ( count($data) > 0 ) ? $data : $default_data;

    if( !isset($data['action']) ){
        $data['action'] = 'edit_project';
    };
    ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="background:#FFF;">

<div id="kt_content_container" class="container-xxl" >

<p class="d-none" id="logo-position" data-position="<?php echo $logo_position; ?>"></p>
<!--begin::Form-->
<form class="form" action="form_handler.php" method="post">
<input type="text" name="form_action" value="<?php echo $data['action']; ?>" hidden />
<input type="text" name="port_slug" value="<?php echo $data['port_slug']; ?>" hidden />

    <!--begin::Input group-->
    <div class="fv-row">
        <!--begin::Dropzone-->
        <!--begin::Label-->
        <label class="col-form-label text-lg-right">Project Images</label>

        
    <?php
        if( $data['photos'] != '' ){
            ?>
    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
        <!--begin::Col-->
        <?php
            $photos = explode("," , $data['photos']);
            foreach($photos as $photo){
                $photo_src = '../' . DB_SETTINGS['uploads'] . $data['port_slug'] . '/' . $photo;
?>
<div class="col-md-6 col-lg-4 col-xl-3">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8 dropzone">
                    <div class="dz-preview" data-key="<?php  echo $photo; ?>" style="margin:0 !important;min-height:0px !important;">
                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a>
                    </div>
                    
                    <!--begin::Name-->
                    <img src="<?php echo $photo_src; ?>" />
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
<?php
            }
        ?>
        
    </div>
        <!--end::Col-->
            <?php
        }
    ?>
        <!--end::Label-->
        <div class="dropzone" id="kt_dropzonejs_example_1">
            <!--begin::Message-->
            <div class="dz-message needsclick">
                <!--begin::Icon-->
                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="ms-4">
                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                    <span class="fs-7 fw-bold text-gray-400">Upload up to 20 files</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Dropzone-->
    </div>
    <!--end::Input group-->
</form>
<!--end::Form-->



<!--begin::Form-->
<form class="form" action="form_handler.php" method="post">
<input type="text" name="form_action" value="<?php echo $data['action']; ?>" hidden />
<input type="text" name="port_slug" value="<?php echo $data['port_slug']; ?>" hidden />

    
    <!--begin::Input group-->
    <div class="fv-row">
        <!--begin::Dropzone-->
        <!--begin::Label-->
        <label class="col-form-label text-lg-right">Project Panoramas</label>

        <?php
        if( $data['panorama'] != '' ){
            ?>
    <div class="row g-6 g-xl-9 mb-6 mb-xl-9 mt-0">
        <!--begin::Col-->
        <?php
            $panoramas = explode("," , $data['panorama']);
            foreach($panoramas as $panorama){
                $photo_src = '../' . DB_SETTINGS['uploads'] . $data['port_slug'] . '/panorama/' . $panorama;
?>
<div class="col-md-6 col-lg-4 col-xl-3 mt-0">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-center text-center flex-column p-8 dropzone">
                    <div class="dz-preview" data-key="panorama/<?php  echo $panorama; ?>" style="margin:0 !important;min-height:0px !important;">
                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a>
                    </div>
                    
                    <!--begin::Name-->
                    <img src="<?php echo $photo_src; ?>" />
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
<?php
            }
        ?>
        
    </div>
        <!--end::Col-->
            <?php
        }
    ?>
        <!--end::Label-->
        <div class="dropzone" id="kt_dropzonejs_example_2">
            <!--begin::Message-->
            <div class="dz-message needsclick">
                <!--begin::Icon-->
                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="ms-4">
                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                    <span class="fs-7 fw-bold text-gray-400">Upload up to 20 files</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Dropzone-->
    </div>
    <!--end::Input group-->
</form>
<!--end::Form-->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >

<input type="text" name="form_action" value="<?php echo $data['action']; ?>" hidden />
<input type="text" name="port_slug" value="<?php echo $data['port_slug']; ?>" hidden />

<div class="form-group row mt-5">
    <div class="d-flex flex-column mb-7 fv-row mt-4">
        <!--begin::Label-->
        <label class="fs-6 fw-bold mb-2">Videos Links</label>
        <!--end::Label-->
        <div id="videos-inputs">

            <?php
                if($data['videos'] != ''){
                    $videos = explode(',' , $data['videos']);
                    foreach($videos as $video){
                        echo '<input value="'. $video .'" type="url" class="form-control form-control-solid mt-3" placeholder="Enter video link" value="" name="videos[]">';
                    }
                }else{
                    echo '<input type="url" class="form-control form-control-solid mt-3" placeholder="Enter video link" value="" name="videos[]">';
                }
            ?>
        </div>
        <button type="button" class="btn btn-sm btn-secondary mt-3" id="add-new-video-link">Add New Link</button>
    </div>

        <div class="d-flex flex-column mb-7 fv-row mt-4">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Category</label>
            <!--end::Label-->
            <!--begin::Input-->
            <select name="category_slug" required class="form-select form-select-solid" data-control="select2" data-placeholder="Select a category">
                <option></option>
                <?php
                    foreach($cats as $cat){
                        $act = ( $data['cat_id'] == $cat['cat_slug'] ) ? 'selected' : '';
                        echo "<option value='".$cat['cat_slug'] ."' ". $act .">". $cat['name_en'] ."</option>";
                    
                    }
                ?>
            </select>
            <!--end::Input-->
        </div>

        <div class="d-flex flex-column mb-7 fv-row mt-4">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Title ( English )</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input required="" class="form-control form-control-solid translate-to-arabic" data-output="#proje-title-ar" placeholder="Enter title in english" value="<?php echo $data['title_en'] ?>" name="title_en">
            <!--end::Input-->
        </div>
        <div class="d-flex flex-column mb-7 fv-row mt-4">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Title ( arabic )</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input required="" id="proje-title-ar" class="form-control form-control-solid" placeholder="Enter title in arabic" value="<?php echo $data['title_ar'] ?>" name="title_ar">
            <!--end::Input-->
        </div>
        <div class="d-flex flex-column mb-7 fv-row mt-4">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Description ( english )</label>
            <!--end::Label-->
            
            <textarea id="editorwww" class="form-control translate-to-arabic is-textarea" placeholder="Description in english" name="desc_en" data-output="editorssss" required=""><?php echo $data['description_en'] ?></textarea>

        </div>
        <div class="d-flex flex-column mb-7 fv-row mt-4">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Description ( arabic )</label>
            <!--end::Label-->
            
            <textarea id="editorssss" class="form-control" placeholder="Description in english" name="desc_ar" required=""><?php echo $data['description_ar'] ?></textarea>

        </div>


        <div class="d-flex flex-stack">
            <!--begin::Label-->
            <div class="me-5">
                <label class="fs-6 fw-bold form-label">Active/Inactive</label>
                <div class="fs-7 fw-bold text-muted">Activate or Deactivate the project</div>
            </div>
            <!--end::Label-->
            <!--begin::Switch-->
            <label class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="to_status" value="1" <?php echo ( $data['status'] == '1' ) ? 'checked' : ''; ?>>
                
            </label>
            <!--end::Switch-->
        </div>

</div>
<!--begin::Actions-->
<div class="text-center pt-15">
                    
        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
            <span class="indicator-label">Save Changes</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>

</form>


</div>
</div>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
    <?php
    }else{
        echo '<div class="alert alert-danger text-center">You must insert some categories first <a href="categories.php">Insert category</a></div>';
    }
}


function get_edit_team($data = []){
        $perm = new TeamModel();
        $all_permissions = $perm->get_all_permissions();
        $default_data = [
            'key' => time(),
            'pin' => '0',
            'member_order' => '0',
            'action' => 'insert_member',
            'name_en' => '',
            'name_ar' => '',
            'job_en' => '',
            'job_ar' => '',
            'facebook' => '',
            'whatsapp' => '',
            'instagram' => '',
            'email' => '',
            'id'    => '0',
            'permissions'   => []
        ];

        $data = ( count($data) > 0 ) ? $data[0] : $default_data;

        if($data['id'] != 0){
            // get user permissions
            $user_permissions = $perm->get_user_permissions($data['id']);
            $data['permissions'] = $user_permissions;
        }

        if( !isset($data['action']) ){
            $data['action'] = 'edit_member';
        };

        if( !isset($data['key']) ){
            $data['key'] = explode('/' , $data['photo'])[0];
        };


    ?>
<form style="background:#FFF" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="kt_modal_new_address_form">

<input type="text" name="form_action" value="<?php echo $data['action']; ?>" hidden />
<input type="text" name="key" value="<?php echo $data['key']; ?>" hidden />
<input type="text" name="id" value="<?php echo $data['id']; ?>" hidden />

    <!--begin::Modal header-->
    <div class="modal-header" id="kt_modal_new_address_header">
        <!--begin::Modal title-->
        <h2 class="fw-bolder">Add new Member</h2>
        <!--end::Modal title-->
        <!--begin::Close-->
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
    </div>
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body py-10 px-lg-17">
        <!--begin::Scroll-->
        <div>
                    
                    <div class="form-group row">
<!--begin::Label-->
<label class="col-lg-2 col-form-label text-lg-right">Photo</label>
<!--end::Label-->

<!--begin::Col-->
<div class="col-lg-10">
<!--begin::Dropzone-->
<div class="dropzone dropzone-queue mb-2 upload_dropzone_images" id="another_random_id" data-max="1" data-key="<?php echo $data['key']; ?>" data-img="personalimg">
<!--begin::Controls-->
<div class="dropzone-panel mb-lg-0 mb-2">
<a class="dropzone-select btn btn-sm btn-primary me-2">Attach file</a>
<a class="dropzone-upload btn btn-sm btn-light-primary me-2">Upload All</a>
<a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a>
</div>
<!--end::Controls-->

<!--begin::Items-->
<div class="dropzone-items wm-200px">
<div class="dropzone-item" style="display:none">
<!--begin::File-->
<div class="dropzone-file">
<div class="dropzone-filename" title="some_image_file_name.jpg">
<span data-dz-name></span>
<strong>(<span data-dz-size></span>)</strong>
</div>

<div class="dropzone-error" data-dz-errormessage></div>
</div>
<!--end::File-->

<!--begin::Progress-->
<div class="dropzone-progress">
<div class="progress">
<div
    class="progress-bar bg-primary"
    role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
</div>
</div>
</div>
<!--end::Progress-->

<!--begin::Toolbar-->
<div class="dropzone-toolbar">
<span class="dropzone-start"><i class="bi bi-play-fill fs-3"></i></span>
<span class="dropzone-cancel" data-dz-remove style="display: none;"><i class="bi bi-x fs-3"></i></span>
<span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
</div>
<!--end::Toolbar-->
</div>
</div>
<!--end::Items-->
</div>
<!--end::Dropzone-->

<!--begin::Hint-->
<span class="form-text text-muted">Max file size is 8MB and max number of files is 1.</span>
<!--end::Hint-->
</div>
<!--end::Col-->


<!--begin::Input group-->
<div id="kt_modal_new_address_billing_info" class="collapse show">
<!--begin::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">member name ( english )</label>
<!--end::Label-->
<!--begin::Input-->
<input required class="form-control form-control-solid" value="<?php echo $data['name_en']; ?>" placeholder="Enter name in english" name="name_en">
<!--end::Input-->
</div>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Position ( english )</label>
<!--end::Label-->
<!--begin::Input-->
<input required class="form-control form-control-solid" value="<?php echo $data['job_en']; ?>" placeholder="Enter position in english" name="pos_en">
<!--end::Input-->
</div>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">member name ( arabic )</label>
<!--end::Label-->
<!--begin::Input-->
<input required class="form-control form-control-solid" value="<?php echo $data['name_ar']; ?>" placeholder="Enter name in arabic" name="name_ar">
<!--end::Input-->
</div>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Position ( arabic )</label>
<!--end::Label-->
<!--begin::Input-->
<input required class="form-control form-control-solid" value="<?php echo $data['job_ar']; ?>" placeholder="Enter position in arabic" name="pos_ar">
<!--end::Input-->
</div>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Email</label>
<!--end::Label-->
<!--begin::Input-->
<input  class="form-control form-control-solid" type="email" required value="<?php echo $data['email']; ?>" placeholder="Email Address" name="email">
<!--end::Input-->
</div>
<?php
    if($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_GET['edit'])){
?>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Password</label>
<!--end::Label-->
<!--begin::Input-->
<input  class="form-control form-control-solid" type="password" placeholder="Password" name="password">
<!--end::Input-->
</div>
<?php
    }
?>


<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Permissions</label>
<!--end::Label-->
<!--begin::Input-->
<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select permissions" data-allow-clear="true" multiple="multiple" name="permissions[]">
   <?php
        foreach($all_permissions as $db_permission){
            $selected = '';
            foreach($data['permissions'] as $permission){
                if($permission['per_id'] == $db_permission['id'] && $selected == ''){
                    $selected = 'selected';
                }
            }
            echo "<option $selected value='". $db_permission['id'] ."'>". $db_permission['title'] ."</option>";
            $selected = '';
        }
   ?>
</select>
<!--end::Input-->
</div>



<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">facebook</label>
<!--end::Label-->
<!--begin::Input-->
<input  class="form-control form-control-solid" value="<?php echo $data['facebook']; ?>" placeholder="Facebook link" name="facebook">
<!--end::Input-->
</div>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Instagram</label>
<!--end::Label-->
<!--begin::Input-->
<input  class="form-control form-control-solid" value="<?php echo $data['instagram']; ?>" placeholder="instagram link" name="instagram">
<!--end::Input-->
</div>

<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Whatsapp</label>
<!--end::Label-->
<!--begin::Input-->
<input  class="form-control form-control-solid" value="<?php echo $data['whatsapp']; ?>" placeholder="Whatsapp Link" name="whatsapp">
<!--end::Input-->
</div>
<div class="d-flex flex-column mb-7 fv-row mt-4">
<!--begin::Label-->
<label class="fs-6 fw-bold mb-2">Order</label>
<!--end::Label-->
<!--begin::Input-->
<input class="form-control form-control-solid" value="<?php echo $data['member_order']; ?>" placeholder="member order" name="order" type="number">
<!--end::Input-->
</div>

<div class="d-flex flex-stack">
<!--begin::Label-->
<div class="me-5">
<label class="fs-6 fw-bold form-label">Pin to homepage</label>
<div class="fs-7 fw-bold text-muted">when pinned this member will appear in home screen</div>
</div>
<!--end::Label-->
<!--begin::Switch-->
<label class="form-check form-switch form-check-custom form-check-solid">
<input class="form-check-input" type="checkbox" name="pin" value="1" <?php echo ( $data['pin'] == '0' ) ? '' : 'checked'; ?>>
</label>
<!--end::Switch-->
</div>

<!--end::Input group-->
</div><!--end::Billing form-->
<div id="kt_modal_new_address_billing_info mt-4" class="collapse show">
<!--begin::Input group-->



                            <!--end::Input group-->
                        </div><!--end::Billing form-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                   
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            <div></div></form>
            </div>

    <?php
}

?>