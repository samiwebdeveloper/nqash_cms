<?php
error_reporting(0);
$this->load->view('inc/header');
?>

<style>
	.col-md-10,
	.col-md-8,
	.col-md-12,
	.col-md-2,
	.col-md-3,
	.col-md-4 {
		position: relative;
		width: 100%;
		min-height: 1px;
		padding-right: 4px;
		padding-left: 4px;
	}

	body {
		background-color: #f0f0f0 !important;
	}

	.select2-container--default .select2-selection--single {
		background-color: #fff;
		border: 1px solid #BEBEBE !important;
		border-radius: 4px;
		padding: 27px !important;
	}

	.select2-container .select2-selection .select2-selection__rendered {
		margin-left: -25px !important;
	}

	.select2-container .select2-selection .select2-selection__rendered {
		padding: 0;
		padding-left: 13px;
		padding-top: 0px;
	}
</style>
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
						<li class="breadcrumb-item">Create Slider</li>
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
			<div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"></div>
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<!-- START card -->
					<div class=" container-fluid   container-fixed-lg bg-gray">
						<div class="row">
							<div class="col-md-4" id="f_panel">
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Create Slider </div>
									</div>
									<div class="card-body">
										<?php echo $error['error'] ?>
										<form enctype="multipart/form-data" class="row  needs-validation" novalidate method="POST" action="<?php echo base_url() ?>Slider_Controller/insert_slider_data">
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
											<div class="col-md-12 my-3 form-floating ">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" name="sliderdate" id="floatingInput" required>
												<label for="validationTooltip01" class="form-label">Date</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating ">
												<input type="date" class="form-control" name="startdate" id="floatingInput" value="<?php echo date('Y-m-d') ?>" required>
												<label for="validationTooltip01" class="form-label">Start Date</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating ">
												<input type="date" class="form-control" name="enddate" id="floatingInput" value="<?php echo date('Y-m-d', strtotime('+2 days')) ?>" required>
												<label for="validationTooltip01" class="form-label">End Date</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12   my-3 form-floating ">

												<select class="form-select" name="type" id="slider_type" required>
													<option selected disabled value="">Choose...</option>
													<option>Promotion</option>
													<option>Promotion</option>
													<option>Promotion</option>
												</select>
												<label for="slider_type" class="form-label">Select Type</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating ">
												<input type="text" class="form-control" name="title" id="floatingInput" placeholder="name@example.com" required>
												<label for="validationTooltip01" class="form-label">Title</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-3 form-floating">
												<input type="file" class="form-control" name="file" accept=".png, .jpg, .jpeg" id="validationTooltip01" required>
												<label for="validationTooltip01" class="form-label">Upload Slider Image</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>
											<div class="col-md-12 my-4 form-floating ">
												<textarea class="form-control" style="height:100px ;" name="detail" placeholder="Leave a Detail here" id="floatingTextarea2" required></textarea>
												<label for="floatingTextarea2">Detail</label>
												<div class="valid-tooltip">Looks good!</div>
												<div class="invalid-tooltip">This Field Is Required!</div>
											</div>

											<div class="col-md-12 my-2 text-center">
												<button class="btn btn-danger" id="cancel" type="reset"> Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button class="btn btn-success" type="submit">Save</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="col-md-8" id="d_panel">
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Data Panel</div>
										<div class="card-controls">
											<button class="btn btn-primary" type="button" onclick="filters()">Full Screen</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table width="100%" class="table table-bordered nowrap" id="data_list" name="data_panel">
												<thead>
													<tr>
														<th>Sr No</th>
														<th>SliderDate</th>
														<th>Start Date</th>
														<th>End Date</th>
														<th>Type</th>
														<th>Title</th>
														<th>Detail</th>
														<th>File</th>
														<th style="display:none ;">id</th>
														<th  class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 0;
													foreach ($fetch_data as $item) {
														$i++; ?>
														<tr>
															<?php $id = $item->SliderId ?>
															<td><?php echo $i ?></td>
															<td><?php echo $item->SliderDate ?></td>
															<td><?php echo $item->StartDate ?></td>
															<td><?php echo $item->EndDate ?></td>
															<td><?php echo $item->Type ?></td>
															<td><?php echo $item->Title ?></td>
															<td><?php echo $item->Detail ?></td>
															<td><?php echo $item->Image ?></td>
															<td hidden class='row_id'><?php echo $id ?></td>
															<td class="text-center ">
																<button data-toggle="modal" data-target="#edit" class="edit_btn btn btn-success btn-sm">
																	<i class="fa fa-edit"></i>
																</button>
															
																<button data-toggle="modal" data-target="#edit" class="edit_btn btn btn-danger btn-sm">
																	<i class="fa fa-trash"></i>
																</button>
															</td>
														</tr>
													<?php } ?>
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
		$('#cancel').click(function(params) {
			history.go(-1);
		})
	</script>
	<script>
		function filters() {
			var f_class = $('#f_panel').attr('class');
			var d_class = $('#d_panel').attr('class');

			if (f_class.indexOf('col-md-4') != -1) {
				f_class = f_class.replace('col-md-4', 'col-md-0');
				d_class = d_class.replace('col-md-8', 'col-md-12');
				$('#f_panel').hide();
			} else {
				f_class = f_class.replace('col-md-0', 'col-md-4');
				d_class = d_class.replace('col-md-12', 'col-md-8');
				$('#f_panel').show();
			}

			$('#f_panel').attr('class', f_class);
			$('#d_panel').attr('class', d_class);
		}
		var data_arr = [];
		var order_others = '';
		var js_obj = "";
		var table = "";

		function rate_cus() {

		};
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
	<script type="text/javascript">
		$(document).ready(function() {
			$('#data_list').DataTable()
		})
	</script>