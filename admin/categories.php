<?php
	require_once 'init.php';
    get_header(false,'categories');
    if(isset($_GET['edit'])){
        $slug = $_GET['edit'];
        if( $slug != '' ){
            get_edit_categores( $slug );
            get_footer();
            exit();
        }
    }
    $cats = new CategoriesModel;
    $cats = $cats->get_category_product('' , '' , true , 'all-cats');

?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<div id="kt_content_container" class="container-xxl">


<?php
    if(count($cats) > 0){

?>

<div class="card">
        <!--begin::Card header-->
        
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar--><div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->	
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">New Category</button>
                    
                    
                </div><!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div><!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 125px;" aria-label="Customer Name: activate to sort column ascending">Title English</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 165.383px;" aria-label="Email: activate to sort column ascending">Title Arabic</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 165.383px;" aria-label="Email: activate to sort column ascending">Parent Category</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 125px;" aria-label="Company: activate to sort column ascending">Projects</th>
                        
                        <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" style="width: 79.7px;" aria-label="Actions">Actions</th></tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                <?php
                    foreach($cats as $cat){
                ?>
                <tr class="odd">
                        
                        <!--end::Checkbox-->
                        <!--begin::Name=-->
                        <td>
                            <?php echo $cat['name_en']; ?>
                        </td>
                        <!--end::Name=-->
                        <!--begin::Email=-->
                        <td>
                            <?php echo $cat['name_ar']; ?>
                        </td>
                        <!--end::Email=-->
                        <td>
                            <?php
                                if($cat['parent_id'] == 0){
                                    echo '-';
                                }else{
                                    echo $cat['parent_name_en'].'<br>';
                                    echo $cat['parent_name_ar'];
                                }
                            ?>
                        </td>
                        <!--begin::Company=-->
                        <td>
                            <?php echo $cat['total']; ?>
                        </td>
                        
                    
                        <!--begin::Action=-->
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon--></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 edit-campaign">
                                
                                <a href="categories.php?edit=<?php echo $cat['cat_slug']; ?>" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                
                            </div>
                            <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                    </tr>
                    <?php } ?>
                </tbody>
                <!--end::Table body-->
            </table></div></div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

<?php
    }else{
         // no data found
         get_no_data_found('Add Category');
    }
?>


</div>
</div>


                                
<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_new_address" tabindex="-1" style="display: none;" aria-hidden="true">
									<!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="kt_modal_new_address_form">

                        <input type="text" name="form_action" value="insert_category" hidden />
                        
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_new_address_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Add new category</h2>
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
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px" style="max-height: 268px;">
                                
                                <div class="form-group row">


<!--end::Col-->
<!--begin::Input group-->
<div id="kt_modal_new_address_billing_info" class="collapse show">
<!--begin::Input group-->

<!--end::Input group-->
<!--begin::Input group-->
<div class="d-flex flex-column mb-7 fv-row mt-4">
    <!--begin::Label-->
    <label class="fs-6 fw-bold mb-2">Title ( English )</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input required class="form-control form-control-solid translate-to-arabic" data-output="#category-input-english" placeholder="Category name in english" name="name_en">
    <!--end::Input-->
</div>


<!--end::Input group-->
</div><!--end::Billing form-->

<div id="kt_modal_new_address_billing_info mt-4" class="collapse show">
<!--begin::Input group-->

<!--end::Input group-->
<!--begin::Input group-->
<div class="d-flex flex-column mb-7 fv-row">
    <!--begin::Label-->
    <label class="fs-6 fw-bold mb-2">Title ( Arabic )</label>
    <!--end::Label-->
                        <!--begin::Input-->
                        <input id="category-input-english" required class="form-control form-control-solid" placeholder="Category name in arabic" name="name_ar">
                        <!--end::Input-->
                    </div>
                   
                            <!--end::Input group-->
                        </div><!--end::Billing form-->
                        <div id="kt_modal_new_address_billing_info" class="collapse show">
                    <!--begin::Input group-->
                    
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row mt-4">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Parent Category</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="col-lg-8 fv-row w-100">
                            <select name="parent_id" aria-label="Select Parent" data-placeholder="Select Parent category ..." class="form-select form-select-solid form-select-lg fw-bold">
                                <option value="0" selected>Select Parent category...</option>
                                <?php
                                    if(count($cats) > 0){
                                        foreach($cats as $cat){
                                            echo "<option value='".$cat['category_id']."'>".$cat['name_en']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        <!--end::Input-->
                    </div>
                   
                    
                    <!--end::Input group-->
                </div><!--end::Billing form-->
													</div>
													<!--end::Scroll-->
												</div>
												<!--end::Modal body-->
												<!--begin::Modal footer-->
												<div class="modal-footer flex-center">
													<!--begin::Button-->
													<button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
													<!--end::Button-->
													<!--begin::Button-->
													<button type="submit" class="btn btn-primary">
														<span class="indicator-label">Submit</span>
														
													</button>
													<!--end::Button-->
												</div>
												<!--end::Modal footer-->
											<div></div></form>
											<!--end::Form-->
										</div>
									</div>
								</div>
								</div>
								
								<!--end::Modals-->
<!-- end Edit modal -->
<?php get_footer(); ?>