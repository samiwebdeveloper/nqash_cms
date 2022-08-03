<?php
error_reporting(0);
$this->load->view('inc/header');
?>

<style>
	tr.group,
	tr.group:hover {
		background-color: #ddd !important;
	}
</style>
<script>
	$(document).ready(function() {
		var f_class = $('#f_panel').attr('class');
		$('#f_panel').hide();
		$('#data_list').DataTable()
	})
</script>
<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper">
	<!-- START PAGE CONTENT -->
	<div class="content">
		<!-- START JUMBOTRON -->
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<!-- START BREADCRUMB -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item">CMS</li>
						<li class="breadcrumb-item">Add Project</li>
						<li class="breadcrumb-item"><mark><?php echo date('Y-m-d h:i:s'); ?></mark></li>
					</ol>
					<!-- END BREADCRUMB -->
				</div>
			</div>
		</div>
		<!-- END JUMBOTRON -->
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg">
			<!-- BEGIN PlACE PAGE CONTENT HERE -->
			<!-- <div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"></div> -->
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<!-- START card -->
					<div class=" container-fluid   container-fixed-lg bg-gray">
						<div class="row">
							<div class="col-md-0" id="f_panel">
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Add Project </div>
									</div>
									<div class="card-body">
										<?php echo  $this->session->flashdata('msg'); ?>
										<?php echo $error['error'] ?>
										<?php
										$action_path = "Project_Controller/insert_data"; ?>
										<form enctype="multipart/form-data" id="add_name" class="row  needs-validation" novalidate method="POST" action="<?php echo base_url() . $action_path ?>">
											<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
											<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
											<style>
												.form-floating>label {
													position: absolute;
													font-size: 17px;
													top: -7px;
													left: 10px;
													height: 100%;
													padding: 1rem 0.75rem;
													pointer-events: none;
													border: 1px solid transparent;
													transform-origin: 0 0;
													transition: opacity .1s ease-in-out, transform .1s ease-in-out;
												}
											</style>


											<div class="col-md-6 my-3 form-floating ">
												<input type="text" class="form-control" name="title" id="floatingInput" placeholder="name@example.com" required>
												<label for="validationTooltip01" class="form-label">Title</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-6 my-3 form-floating ">
												<input type="text" class="form-control" name="Period" id="floatingInput" placeholder="name@example.com" required>
												<label for="validationTooltip01" class="form-label">Period</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating ">
												<input type="text" class="form-control" name="Organization" id="floatingInput" placeholder="name@example.com" required>
												<label for="validationTooltip01" class="form-label">Organization</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating ">
												<input type="file" class="form-control" name="OrganizationLogo" id="floatingInput" placeholder="name@example.com" required>
												<label for="validationTooltip01" class="form-label">Organization Logo</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>

											<div class="col-md-12 my-2 form-floating ">
												<textarea class="form-control" style="height:100px;" name="detail" placeholder="Leave a Detail here" id="floatingTextarea2" required></textarea>
												<label for="floatingTextarea2">Detail</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating ">
												<input type="file" class="form-control" name="File" id="floatingInput" placeholder="name@example.com" required>
												<label for="validationTooltip01" class="form-label">File</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>

											<div class="col-md-12 my-3 form-floating ">
												<table class="table table-bordered" id="dynamic_field">
													<tr>
														<td><input type="file" name="file[]" accept="image/*" class="form-control name_list" required /></td>
														<td><input type="text" name="text[]" placeholder="Enter alternative text" class="form-control name_list" required /></td>
														<td class="text-center"><button type="button" name="add" id="add" class="btn btn-success ">+</button></td>
													</tr>
												</table>
											</div>
											<div class="col-md-12  text-center">
												<a class="btn btn-danger" href="<?php echo base_url() ?>home" id="cancel" type="reset"> Cancel</a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button class="btn btn-success" id="add_name" type="submit">Save</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="col-md-12" id="d_panel">
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Data Panel</div>
										<div class="card-controls">
											<button class="btn btn-primary" type="button" onclick="filters()"><i class="fa fa-plus"></i> Add Project</button>
										</div>
									</div>
									<div class="card-body">

										<div class="table-responsive">
											<div id="msg_div"></div>

											<table width="100%" style="border-top:1px solid black ;" class="table table-bordered compact nowrap" id="data_list" name="data_panel">
												<thead>
													<tr>

														<th>Sr No</th>
														<th>Organization Logo</th>
														<th>Organization</th>
														<th>File</th>
														<th>Title</th>
														<th>Period</th>
														<th>Details</th>
														<th>Sort Project</th>
														<th hidden>Sort Project</th>

														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;

													foreach ($data as $item) {


														$ProjectId = $item['ProjectId'];
														$Title = $item['Title'];
														$Period = $item['Period'];
														$Detail = $item['Details'];
														$sort_no = $item['SortNo'];
														$File = $item['File'];
														$Organization = $item['Organization'];
														$OrganizationLogo = $item['OrganizationLogo'];

													?>
														<tr>

															<td><?php echo $i ?></td>
															<td class="text-center " style="cursor:pointer;" data-toggle="modal" data-target="#img_<?php echo $ProjectId ?>">
																<img width="30px" height="30px" src="<?php echo base_url(); ?>assets/projects_images/<?php echo $OrganizationLogo; ?>">
															</td>
															<div class="modal" id="img_<?php echo $ProjectId ?>">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<!-- Modal Header -->
																		<div class="modal-header">
																			<h4 class="modal-title"><?php echo $Organization ?> </h4>
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>
																		<!-- Modal body -->
																		<div class="modal-body">
																			<img width="100%" height="80%" src="<?php echo base_url(); ?>assets/projects_images/<?php echo $OrganizationLogo ?>">
																		</div>
																		<!-- Modal footer -->
																		<div class="modal-footer">
																			<button type="button" style="border:2px solid gray !important ;" class="btn btn-default " data-dismiss="modal" type="submit">Close</button>
																		</div>
																	</div>
																</div>
															</div>
															<td><?php echo $Organization ?> </td>
															<td><a target="_blank" href="<?php echo base_url(); ?>assets/projects_images/<?php echo $File ?>">Open <?php $get_exten = explode('.', $File);
																																									echo $get_exten[1] ?> File </a> </td>
															<td><?php echo $Title ?> </td>
															<td><?php echo $Period ?> </td>
															<td><?php echo $Detail ?> </td>
															<td class="edit_dc" width="70px"> <input disabled class="pickvalue form-control" type="number" value="<?php echo   $sort_no ?>"></td>
															<td hidden> <input type="number" hidden class="row_id " value="<?php echo $ProjectId ?>"></td>


															<td class="text-center ">
																<a data-toggle="tooltip" data-placement="top" title="Click And View Detail" class="edit_btn btn btn-info btn-sm" href="<?php echo base_url() ?>Project_Controller/edit_master_detail/<?php echo $ProjectId ?>"><i class="fa fa-eye"></i></a>
																<a class="edit_btn btn btn-success btn-sm" href="<?php echo base_url() ?>Project_Controller/edit_master_detail/<?php echo $ProjectId ?>"><i class="fa fa-edit"></i></a>
																<a data-toggle="modal" data-target="#del_<?php echo $ProjectId ?>" class="edit_btn btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
															</td>
															<!-- Button trigger modal -->


															<!-- Modal -->
															<div class="modal fade" id="del_<?php echo $ProjectId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			Are you sure you want to Delete Record?
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																			<a type="button" href="<?php echo base_url() ?>Project_Controller/delete_record/<?php echo $ProjectId ?>" class="btn btn-danger">Delete</a>
																		</div>
																	</div>
																</div>
															</div>
										</div>
										</tr>

									<?php $i++;
													} ?>
									</tbody>
									</table>
									</div>
								</div>
							</div>
						</div>

						<!-- END card -->
					</div>
				</div>
				<!-- END PLACE PAGE CONTENT HERE -->
			</div>
			<!-- END CONTAINER FLUID -->
		</div>
		<!-- END PAGE CONTENT -->


	</div>
</div>
<?php
$this->load->view('inc/footer');
?>
<script>
	$(".edit_dc").click(function() {
		var $row = $(this).closest("tr");
		$row.find(".pickvalue").attr("disabled", false);
		$(".pickvalue").keypress(function(event) {
			var edit_dc = $row.find(".pickvalue").val();
			var row_id = $row.find(".row_id").val();
			var mydata = {
				row_id: row_id,
				sort_no: edit_dc,
			};
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if (keycode == '13') {
				$.ajax({
					url: "Project_Controller/update_sorting",
					method: "POST",
					data: mydata,
					beforeSend: function() {
						$row.find(".pickvalue").css("cursor", "not-allowed");
					},
					success: function(data) {
						console.log(data)
						$row.find(".pickvalue").attr("disabled", true).css("cursor", "pointer");
						$("#msg_div").html(data);
					},
				});
			}
			// $("#cnnumber").blur();
		});


	})
</script>
<script>
	$(document).ready(function() {
		var i = 1;
		$('#add').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i + '"><td><input type="file" name="file[]" accept="image/*" class="form-control name_list" required /></td><td><input type="text" name="text[]" placeholder="Enter alternative text" class="form-control name_list" required /></td><td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
		});
		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});

	});
</script>

<script>
	function filters() {
		var f_class = $('#f_panel').attr('class');
		$('#f_panel').hide();

		var d_class = $('#d_panel').attr('class');
		if (f_class.indexOf('col-md-5') != -1) {
			f_class = f_class.replace('col-md-5', 'col-md-0');
			d_class = d_class.replace('col-md-7', 'col-md-12');
			$('#f_panel').hide();
		} else {
			f_class = f_class.replace('col-md-0', 'col-md-5');
			d_class = d_class.replace('col-md-12', 'col-md-7');
			$('#f_panel').show();
		}

		$('#f_panel').attr('class', f_class);
		$('#d_panel').attr('class', d_class);
	}
</script>
<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict'
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')
		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function(form) {
				form.addEventListener('submit', function(event) {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}
					form.classList.add('was-validated')
				}, false)
			})
	})()
</script>