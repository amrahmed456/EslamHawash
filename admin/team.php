<?php
	require_once 'init.php';
    get_header(false,'team');
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        if( $id != '' ){
            // get member data first
            $data = new TeamModel;
            $data = $data->get_team($id);
            get_edit_team( $data );
            get_footer();
            exit();
        }
    }else if( isset($_GET['do']) ){
        if( $_GET['do'] == 'add' ){
            get_edit_team();
            get_footer();
            exit();
        }
    }
    $team = new TeamModel;
    $team = $team->get_team('','','' , $_SESSION['user']['user_id']);

?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<div id="kt_content_container" class="container-xxl">

<?php
    if(count($team) > 0){

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
                    <a href="team.php?do=add" type="button" class="btn btn-primary">New Member</a>
                    
                    
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
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 125px;" aria-label="Customer Name: activate to sort column ascending">Name</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 165.383px;" aria-label="Email: activate to sort column ascending">Position</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 125px;" aria-label="Company: activate to sort column ascending">photo</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 125px;" aria-label="Company: activate to sort column ascending">pinned</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" style="width: 125px;" aria-label="Company: activate to sort column ascending">order</th>
                        
                        <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" style="width: 79.7px;" aria-label="Actions">Actions</th></tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                <?php
                    foreach($team as $member){
                ?>
                <tr class="odd">
                        
                        <!--end::Checkbox-->
                        <!--begin::Name=-->
                        <td>
                            <?php echo $member['name_en']; ?><br>
                            <?php echo $member['name_ar']; ?>
                        </td>
                        <!--end::Name=-->
                        <!--begin::Email=-->
                        <td>
                            <?php echo $member['job_en']; ?><br>
                            <?php echo $member['job_ar']; ?>
                        </td>
                        <!--end::Email=-->
                        <!--begin::Company=-->
                        <td>
                            
                        <img src="<?php echo '../uploads/' . $member['photo']; ?>" class="w-95px me-3" alt="">
                        </td>
                        <td>
                            <?php 
                                echo ($member['pin'] == '0') ? '<span class="badge badge-light-danger">Not pinned</span>' : '<span class="badge badge-light-success">Pinned</span>';
                            ?>
                        </td>
                        <td>
                            <?php echo $member['member_order']; ?>
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
                                
                                <a href="team.php?edit=<?php echo $member['id']; ?>" class="menu-link px-3">Edit</a>
                                </div>

                                <div class="delete_member_btn menu-item px-3" data-id="<?php echo $member['id']; ?>" data-kt-customer-table-filter="delete_row" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                    <a href="" class="menu-link px-3" data-kt-customer-table-filter="delete_row" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Delete</a>
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
        get_no_data_found('Add Member' , 'team.php?do=add');
    }
?>


</div>
</div>
  
<!-- Delete modal -->
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" style="display: none;" aria-hidden="true">
									<!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Delete Campaign</h2>
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
                <form method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="kt_modal_new_card_form">

<input type="text" name="form_action" value="delete_member" hidden />
<input type="text" name="member_id" value="" hidden />

                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px" style="max-height: 268px;">
                        <h2 class="text-center text-danger">Are you sure you want to delete this Member ?</h2>
                        <div class="form-group row">

                
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                              
                                <button type="submit" class="btn btn-danger">
                                    <span class="indicator-label">Delete Member</span>
                                    
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form><!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
								</div>
								</div>
								
								
								<!--end::Modals-->
                            </div>
                            <!-- end Edit modal -->


<?php get_footer(); ?>