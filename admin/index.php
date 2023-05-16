<?php
	require_once 'init.php';
	get_header(false,'');

	$projects 	= new CategoriesModel;
	$messages 	= new MessagesModel;
	$team 		= new TeamModel;
	$comments	= new CommentsModel;

	//print_r($comments->get_comment());

	$total_porject =  $projects->total_projects();

?>
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<div class="col-xl-4">
										<!--begin::Statistics Widget 5-->
										<a href="projects.php" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
												<span class="svg-icon svg-icon-muted svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="black"/>
<path d="M19 10.4C19 10.3 19 10.2 19 10C19 8.9 18.1 8 17 8H16.9C15.6 6.2 14.6 4.29995 13.9 2.19995C13.3 2.09995 12.6 2 12 2C11.9 2 11.8 2 11.7 2C12.4 4.6 13.5 7.10005 15.1 9.30005C15 9.50005 15 9.7 15 10C15 11.1 15.9 12 17 12C17.1 12 17.3 12 17.4 11.9C18.6 13 19.9 14 21.4 14.8C21.4 14.8 21.5 14.8 21.5 14.9C21.7 14.2 21.8 13.5 21.9 12.7C20.9 12.1 19.9 11.3 19 10.4Z" fill="black"/>
<path d="M12 15C11 13.1 10.2 11.2 9.60001 9.19995C9.90001 8.89995 10 8.4 10 8C10 7.1 9.40001 6.39998 8.70001 6.09998C8.40001 4.99998 8.20001 3.90005 8.00001 2.80005C7.30001 3.10005 6.70001 3.40002 6.20001 3.90002C6.40001 4.80002 6.50001 5.6 6.80001 6.5C6.40001 6.9 6.10001 7.4 6.10001 8C6.10001 9 6.80001 9.8 7.80001 10C8.30001 11.6 9.00001 13.2 9.70001 14.7C7.10001 13.2 4.70001 11.5 2.40001 9.5C2.20001 10.3 2.10001 11.1 2.10001 11.9C4.60001 13.9 7.30001 15.7 10.1 17.2C10.2 18.2 11 19 12 19C12.6 20 13.2 20.9 13.9 21.8C14.6 21.7 15.3 21.5 15.9 21.2C15.4 20.5 14.9 19.8 14.4 19.1C15.5 19.5 16.5 19.9 17.6 20.2C18.3 19.8 18.9 19.2 19.4 18.6C17.6 18.1 15.7 17.5 14 16.7C13.9 15.8 13.1 15 12 15Z" fill="black"/>
</svg></span>
												<!--end::Svg Icon-->
												<div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5"><?php echo $projects->total_views()['total_views']; ?></div>
												<div class="fw-bold text-gray-400">Total views</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-4">
										<!--begin::Statistics Widget 5-->
										<a href="projects.php" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
												<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black"></path>
														<path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black"></path>
														<path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black"></path>
														<path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
												<div class="text-white fw-bolder fs-2 mb-2 mt-5">
													<?php echo $total_porject; ?>
												</div>
												<div class="fw-bold text-white">Total Projects</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
									<div class="col-xl-4">
										<!--begin::Statistics Widget 5-->
										<a href="messages.php" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
												<span class="svg-icon svg-icon-muted svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="black"/>
<path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="black"/>
</svg></span>
												<!--end::Svg Icon-->
												<div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">
												<?php echo $messages->total_message(); ?>
												</div>
												<div class="fw-bold text-gray-100">Received Messages</div>
											</div>
											<!--end::Body-->
										</a>
										<!--end::Statistics Widget 5-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--begin::List Widget 1-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark">Team members</span>
													<span class="text-muted mt-1 fw-bold fs-7"><?php  echo $team->team_count(); ?> Member</span>
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-5">
												<?php
												$members = $team->get_team('' , 5);
												foreach($members as $member){
													$img_src = '../' . DB_SETTINGS['uploads'] . $member['photo'];
													?>
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-7">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label bg-light-warning">
															<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
															<span style="height: 100%;" class="svg-icon svg-icon-2x svg-icon-warning">
																<img style="width:100%;height:100%" src="<?php echo $img_src; ?>" />
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Text-->
													<div class="d-flex flex-column">
														<span class="text-dark text-hover-primary fs-6 fw-bolder"><?php echo $member['name_en']; ?></span>
														<span class="text-muted fw-bold"><?php echo $member['job_en']; ?></span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
													<?php
												}
												?>
												
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 1-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-8">
										<!--begin::Tables Widget 5-->
										<div class="card card-xl-stretch mb-5 mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Most viewed Projects</span>
													<span class="text-muted mt-1 fw-bold fs-7">Total <?php echo $total_porject; ?> projects</span>
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<div class="tab-content">
													<!--begin::Tap pane-->
													<div class="tab-pane fade active show" id="kt_table_widget_5_tab_1">
														<!--begin::Table container-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
																<!--begin::Table head-->
																<thead>
																	<tr class="border-0">
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px"></th>
																		<th class="p-0 min-w-140px"></th>
																		<th class="p-0 min-w-110px"></th>
																		<th class="p-0 min-w-50px"></th>
																	</tr>
																</thead>
																
																
																<tbody>
																	<?php
																		$most_projects = $projects->get_category_product('' , '' , false, 'all-ports' , '5' , ' p.views DESC');
																		foreach( $most_projects as $pro ){
																			$img_src = '../' . DB_SETTINGS['uploads'] . $pro['port_slug'] . '/' . explode(',', $pro['photos'])[0];
																			?>
				<tr>
					<td>
						<div class="symbol symbol-45px me-2">
							<span class="symbol-label">
								<img style="height: 100% !important;
width: 100%;" src="<?php echo $img_src; ?>" class="h-50 align-self-center" alt="">
							</span>
						</div>
					</td>
					<td>
						<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php echo $pro['title_en']; ?></a>
						<span class="text-muted fw-bold d-block"><?php echo $pro['date']; ?></span>
					</td>
					<td class="text-end text-muted fw-bold"><?php echo $pro['name_en']; ?></td>
					<td class="text-end">
						<span class="badge badge-light-success"><?php echo $pro['views']; ?></span>
					</td>
					<td class="text-end">
						<a href="../project.php?slug=<?php echo $pro['port_slug']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
									<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
					</td>
			</tr>
											<?php
										}
											?>
												
																	
																	
																	
																	
																</tbody>
																<!--end::Table body-->
															</table>
														</div>
														<!--end::Table-->
													</div>
													
													
													
													<!--end::Tap pane-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Tables Widget 5-->
									</div>
									<!--end::Col-->
								</div>
								
								
								
								
								<!--begin::Row-->
								<div class="row g-5 g-xl-8">
									<div class="col-xl-6">
										<!--begin::List Widget 7-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="fw-bolder text-dark">Unread Messages</span>
													<span class="text-muted mt-1 fw-bold fs-7"><?php echo $messages->total_message('0'); ?> unread messages</span>
												</h3>
												
											</div>
											
											
											<div class="card-body pt-3">
												<!--begin::Item-->

												<?php
													$unread = $messages->get_message('' , '0');
													if( count($unread) > 0 ){

													
													foreach($unread as $mssg){
														?>
<div class="d-flex align-items-sm-center mb-7">
													
		<div class="d-flex flex-row-fluid flex-wrap align-items-center">
			<div class="flex-grow-1 me-2">
				<a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6"><?php echo $mssg['message'] ?></a>
				<span class="text-muted fw-bold d-block pt-1"><?php echo $mssg['name'] ?></span>
			</div>
			<span class="badge badge-light-success fs-8 fw-bolder my-2"><?php echo $mssg['date'] ?></span>
		</div>
		<!--end::Title-->
	</div>
														<?php
													}
												}else{
													echo '<div class="text-center alert alert-info">No Unread Messages</div>';
												}
												?>
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 7-->
									</div>
									<div class="col-xl-6">
										<!--begin::List Widget 6-->
										<div class="card card-xl-stretch mb-5 mb-xl-8">
											<!--begin::Header-->
											
											<div class="card-header border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="fw-bolder text-dark">
														Latest Comments
													</span>
													<span class="text-muted mt-1 fw-bold fs-7"><?php echo $messages->total_message('0'); ?> Unseen comment</span>
												</h3>
											</div>
											<div class="card-body pt-5">
												<div class="d-flex align-items-center mb-7">
													
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label bg-light-success">
															<!-- Image goes here -->
														</span>
														
													</div>
													
													<!--begin::Text-->
													<div class="d-flex justify-content-between aign-items-center w-100">
														<div>
														<p class="mb-0 text-dark text-hover-primary fs-6 fw-bolder">Name</p>
														<p class="text-muted fw-bold mb-0">Comment</p>
														</div>
														
														<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
																				
															<span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
																	<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</a>
													</div>
													<!--end::Text-->
												</div>
												</div>
											
										</div>
										<!--end::List Widget 6-->
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					
					<?php get_footer(); ?>