<?php
	require_once 'init.php';
	get_header(false,'settings');
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<div id="kt_content_container" class="container-xxl">


<div class="card mb-5 mb-xl-10">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
	<!--begin::Card title-->
	<div class="card-title m-0">
		<h3 class="fw-bolder m-0">Profile Details</h3>
	</div>
	<!--end::Card title-->
	</div>
	<!--begin::Card header-->
	<!--begin::Content-->
	<div id="kt_account_profile_details" class="collapse show">
	<!--begin::Form-->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"  id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
		<!--begin::Card body-->
		<div class="card-body border-top p-9">
			<input type="text" name="form_action" value="update_profile_info" hidden />
				<!--begin::Input group-->
				<div class="d-flex flex-wrap align-items-center mb-4">
					<!--begin::Label-->
					<div id="kt_signin_email">
						<div class="fs-6 fw-bolder mb-1">Email Address</div>
						<div class="fw-bold text-gray-600"><?php echo $_SESSION['user']['email']; ?></div>
					</div>
					<!--end::Label-->
					<!--begin::Edit-->
					<div id="kt_signin_email_edit" class="flex-row-fluid d-none">
					</div>
					<!--end::Edit-->
					
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="your name" value="<?php echo $_SESSION['user']['name']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Change Password</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="new password">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				

				
			</div>
			<!--end::Card body-->
			<!--begin::Actions-->
			<div class="card-footer d-flex justify-content-end py-6 px-9">
				<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
			</div>
		<!--end::Actions--><div></div></form>
	<!--end::Form-->
	</div>
	<!--end::Content-->
	</div>

	<div class="card mb-5 mb-xl-10">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
	<!--begin::Card title-->
	<div class="card-title m-0">
		<h3 class="fw-bolder m-0">Website Settings</h3>
	</div>
	<!--end::Card title-->
	</div>
	<!--begin::Card header-->
	<!--begin::Content-->
	<div id="kt_account_profile_details" class="collapse show">
	<!--begin::Form-->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"  id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
		<!--begin::Card body-->
		<div class="card-body border-top p-9">
			<input type="text" name="form_action" value="update_website_settings" hidden />
				<!--begin::Input group-->
				
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Facebook link</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="facebook" class="form-control form-control-lg form-control-solid" placeholder="Facebook" value="<?php echo WEBSITE_SETTINGS['facebook']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Twitter link</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="twitter" class="form-control form-control-lg form-control-solid" placeholder="Twitter" value="<?php echo WEBSITE_SETTINGS['twitter']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Whatsapp link</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="whatsapp" class="form-control form-control-lg form-control-solid" placeholder="Whatsapp" value="<?php echo WEBSITE_SETTINGS['whatsapp']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">behance link</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="behance" class="form-control form-control-lg form-control-solid" placeholder="behance" value="<?php echo WEBSITE_SETTINGS['behance']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Instagram link</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="instagram" class="form-control form-control-lg form-control-solid" placeholder="Instagram" value="<?php echo WEBSITE_SETTINGS['instagram']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="email" class="form-control form-control-lg form-control-solid" placeholder="Email address" value="<?php echo WEBSITE_SETTINGS['email']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label required fw-bold fs-6">Phone number</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row fv-plugins-icon-container">
						<input type="text" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="<?php echo WEBSITE_SETTINGS['phone']; ?>">
					<div class="fv-plugins-message-container invalid-feedback"></div></div>
					<!--end::Col-->
				</div>
				
				<div class="row mb-0">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">Lock Website</label>
					<!--begin::Label-->
					<!--begin::Label-->
					<div class="col-lg-8 d-flex align-items-center">
						<div class="form-check form-check-solid form-switch fv-row">
							<input name="lock" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" <?php echo ( WEBSITE_SETTINGS['lock'] == '1') ? 'checked' : ''; ?> >
							<label class="form-check-label" for="allowmarketing"></label>
						</div>
					</div>
					<!--begin::Label-->
				</div>
				
			</div>
			<!--end::Card body-->
			<!--begin::Actions-->
			<div class="card-footer d-flex justify-content-end py-6 px-9">
				<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
			</div>
		<!--end::Actions--><div></div></form>
	<!--end::Form-->
	</div>
	<!--end::Content-->
	</div>

	</div>
</div>

<?php get_footer(); ?>