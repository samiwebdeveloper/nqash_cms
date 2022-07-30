<?php
error_reporting(0);
$this->load->view('inc/header');
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#data_panel').saimtech();
		$('#pending_panel').saimtech();

		$('#zone').select2({
			placeholder: "Select Origin or Zone",
			data: locations_list
		});
		$('#zone').prop('disabled', true);

		$('#zone_type').select2({
			placeholder: "Select Destination or Region",
			data: locations_list
		});
		$('#zone_type').prop('disabled', true);

		$('#rate_type').select2({
			placeholder: "Select Rate Type",
			data: rate_type_list
		});
		$('#rate_type').prop('disabled', true);

		$('#service_type').select2({
			placeholder: "Select Service Type"
		});

		$('#cur_srv').select2({
			placeholder: "Current Service"
		});

		$('#new_srv').select2({
			placeholder: "New Service"
		});
	});
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
						<li class="breadcrumb-item">Customer</li>
						<li class="breadcrumb-item">Add Rate</li>
						<li class="breadcrumb-item">Rate</li>
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
			<div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"><?php echo $message; ?></div>
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<!-- START card -->
					<div class=" container-fluid   container-fixed-lg bg-gray">
						<div class="row">
							<div class="col-md-4">
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Add New Rate</div>
									</div>
									<div class="card-body">
										<form role="form" action="../add_rates" method="post">
											<div class="form-group">
												<input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customer_id; ?>">
												<label>Service Type</label>
												<select class="form-control" name="service_type" id="service_type" onchange="service_change()">
													<option value="0">Select Service</option>
													<?php if (!empty($service_data)) {
														foreach ($service_data as $rows) {
															echo ("<option value=" . $rows->service_id . ">" . $rows->service_name . "</option>");
														}
													} ?>
												</select>
											</div>
											<div class="form-group">
												<label>Rate Type</label>
												<select class="form-control" name="rate_type" id="rate_type" onchange="rate_change()">
												</select>
											</div>
											<div class="form-group">
												<?php
												if (!empty($zone)) {
													echo "<input type='hidden' id='zonelist' name='zonelist' value='";
													foreach ($zone as $z) {
														if (next($zone)) {
															echo $z->acc_types_short . "|";
														} else {
															echo $z->acc_types_short;
														}
													}
													echo "' />";
												}
												?>
												<label id="lbl3">Origin</label>
												<select class="form-control" name="zone" id="zone" onchange="zone_change()">
												</select>
											</div>
											<div class="form-group">
												<label id="lbl4">Destintion</label>
												<select class="form-control" name="zone_type" id="zone_type">
												</select>
											</div>
											<div class="card" style="border-color:#6f42c1">
												<div class="card-header  separator">
													<div class="card-title" id="rateCard" name="rateCard">Add New Rate</div>
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Min Weight</label>
																<input type="number" id="min_wgt" name="min_wgt" class="form-control" placeholder="0.00" tabindex="1">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Min Rate</label>
																<input type="number" id="min_rate" name="min_rate" class="form-control" placeholder="0.00" tabindex="2">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Addt. Weight</label>
																<input type="number" id="add_wgt" name="add_wgt" class="form-control" placeholder="0.00" tabindex="3">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Addt. Rate</label>
																<input type="number" id="add_rate" name="add_rate" class="form-control" placeholder="0.00" tabindex="4">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Start Date</label>
																<input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo date('Y-m-01'); ?>" min="<?php echo date('Y-m-01', strtotime('-1 month')); ?>" tabindex="5" style="font-size:13px;">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>End date</label>
																<input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo date('Y-m-t', strtotime('+1 years')); ?>" min="<?php echo date('Y-m-01'); ?>" style="font-size:13px;" tabindex="6">
															</div>
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="card-footer">
										<input type="hidden" id="rate_id" name="rate_id">
										<input type="submit" id="sub" name="sub" class="btn btn-info pull-right" value="Save Rates" tabindex="7" />
										<input type="button" class="btn btn-danger pull-left" onclick="clr()" value="Clear" tabindex="8" />
									</div>
									</form>
								</div>
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title" id="art_title" name="art_title">Add New Article & Rate</div>
									</div>
									<div class="card-body">
										<form role="form" id="art_rates" name="art_rates" action="../add_article" method="post">
											<div class="form-group">
												<input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customer_id; ?>">
												<label>Name</label>
												<input type="text" id="art_name" name="art_name" class="form-control">
											</div>
											<div class="form-group">
												<label>Weight</label>
												<input type="number" id="art_wgt" name="art_wgt" min="0.0" step="0.1" class="form-control" placeholder="0.00">
											</div>
											<div class="form-group">
												<label>Pieces/Unit</label>
												<input type="number" id="art_pcs" name="art_pcs" class="form-control" placeholder="0.00">
											</div>
											<div class="form-group">
												<label>Rate</label>
												<input type="number" id="art_rate" name="art_rate" min="0.0" step="0.1" class="form-control" placeholder="0.00">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Start Date</label>
														<input type="date" id="art_start_date" name="art_start_date" class="form-control" value="<?php echo date('Y-m-01'); ?>" min="<?php echo date('Y-m-01', strtotime('-1 month')); ?>" tabindex="5" style="font-size:13px;">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>End date</label>
														<input type="date" id="art_end_date" name="art_end_date" class="form-control" value="<?php echo date('Y-m-t', strtotime('+1 years')); ?>" min="<?php echo date('Y-m-01'); ?>" style="font-size:13px;" tabindex="6">
													</div>
												</div>
											</div>
									</div>
									<div class="card-footer">
										<input type="hidden" id="art_rate_id" name="art_rate_id">
										<input type="hidden" id="art_id" name="art_id">
										<input type="submit" id="art_sub" name="art_sub" class="btn btn-info pull-right" value="Save Rates" />
										<input type="button" class="btn btn-danger pull-left" onclick="art_clr()" value="Clear" />
									</div>
									</form>
								</div>
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Re-Rate Customer</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Start Date</label>
													<input type="date" id="rr_start_date" name="rr_start_date" class="form-control" value="<?php echo date('Y-m-01', strtotime('-1 month')); ?>" min="<?php echo date('Y-m-01', strtotime('-2 month')); ?>" tabinde="5" style="font-size:13px;" tabindex="9">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>End date</label>
													<input type="date" id="rr_end_date" name="rr_end_date" class="form-control" value="<?php echo date('Y-m-t', strtotime('-1 month')); ?>" min="<?php echo date('Y-m-t', strtotime('-2 month')); ?>" style="font-size:13px;" tabinde="6" tabindex="10">
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<input type="button" class="btn btn-info pull-right" onclick="re_rate()" value="Re-Rate Customer" tabindex="11" />
									</div>
								</div>
								<?php if ($_SESSION['is_supervisor'] == 1) { ?>
									<div class="card m-t-10">
										<div class="card-header  separator">
											<div class="card-title">Service Change</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Start Date</label>
														<input type="date" id="sc_start_date" name="sc_start_date" class="form-control" value="<?php echo date('Y-m-01', strtotime('-1 month')); ?>" min="<?php echo date('Y-m-01', strtotime('-2 month')); ?>" tabinde="5" style="font-size:13px;" tabindex="12">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>End date</label>
														<input type="date" id="sc_end_date" name="sc_end_date" class="form-control" value="<?php echo date('Y-m-t', strtotime('-1 month')); ?>" min="<?php echo date('Y-m-t', strtotime('-2 month')); ?>" style="font-size:13px;" tabindex="13">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>Current Service</label>
														<select class="form-control" name="cur_srv" id="cur_srv" tabindex="14">
															<option value="0">Current Service</option>
															<?php if (!empty($service_data)) {
																foreach ($service_data as $rows) {
																	echo ("<option value=" . $rows->service_id . ">" . $rows->service_name . "</option>");
																}
															} ?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>New Service</label>
														<select class="form-control" name="new_srv" id="new_srv" tabindex="15">
															<option value="0">New Service</option>
															<?php if (!empty($service_data)) {
																foreach ($service_data as $rows) {
																	echo ("<option value=" . $rows->service_id . ">" . $rows->service_name . "</option>");
																}
															} ?>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<input type="button" class="btn btn-info pull-right" onclick="srv_chng()" value="Change Service" tabindex="16" />
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="col-md-8">
								<div class="card m-t-10">
									<div class="card-header  separator">
										<div class="card-title">Data Panel</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="data_panel">
												<thead>
													<tr>
														<th>Rate Type</th>
														<th>Rate ID</th>
														<th>Service Type</th>
														<th>Origin or Zone</th>
														<th>Destination or Zone Type</th>
														<th>Min Weight</th>
														<th>Min Rate</th>
														<!--<th>Weight 1</th>        
															<th>Rate 1</th>
															<th>Weight 2</th>        
														<th>Rate 2</th>-->
														<th>Addt. Weight</th>
														<th>Addt. Rate</th>
														<th>Start Date</th>
														<th>End Date</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="autoload">
													<?php if (!empty($rate_data)) {
														foreach ($rate_data as $rows) {
															echo ("<tr>");
															echo ("<td>" . $rows->rate_type . "</td>");
															echo ("<td>" . $rows->rate_id . "</td>");
															echo ("<td>" . $rows->service_name . "</td>");
															echo ("<td>" . $rows->o_or_z . "</td>");
															echo ("<td>" . $rows->d_or_zt . "</td>");
															echo ("<td>" . $rows->min_wgt . "</td>");
															echo ("<td>" . $rows->min_rate . "</td>");
															//echo("<td>".$rows->wgt1."</td>");
															//echo("<td>".$rows->rate1."</td>");
															//echo("<td>".$rows->wgt2."</td>");
															//echo("<td>".$rows->rate2."</td>");
															echo ("<td>" . $rows->add_wgt . "</td>");
															echo ("<td>" . $rows->add_rate . "</td>");
															echo ("<td>" . $rows->start_date . "</td>");
															echo ("<td>" . $rows->end_date . "</td>");
															if ($rows->is_enable == 1) {
																echo ("<td class='bg-success text-white'><center>Active</center></td>");
															} else {
																echo ("<td class='bg-danger text-white'><center>Blocked</center></td>");
															}
															echo ("<td><button type='button' onclick='editRate(this);' class='btn btn-primary btn-xs'>Edit</button>");
															if ($rows->is_enable == 1) {
																echo ("<button type='button' onclick='susRate(this);' class='btn btn-warning btn-xs'>Suspend</button>");
															} else {
																echo ("<button type='button' onclick='enRate(this);' class='btn btn-success btn-xs'>Enable</button>");
															}
															echo ("<button type='button' onclick='delRate(this);' class='btn btn-danger btn-xs'>Delete</button></td>");
															echo ("</tr>");
														}
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
			<script type="text/javascript">
				function srv_chng() {
					$('#msg_div').html("<div class='pgn push-on-sidebar-open pgn-bar'><div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Please Wait Service Change is in progress...</div></div>");

					var start_date = $('#sc_start_date').val();
					var end_date = $('#sc_end_date').val();
					var customer_id = $('#customer_id').val();
					var cur_srv = $('#cur_srv :selected').val();
					var new_srv = $('#new_srv :selected').val();

					var mydata = {
						c_id: customer_id,
						s_d: start_date,
						e_d: end_date,
						c_s: cur_srv,
						n_s: new_srv
					};

					$.ajax({
						url: "<?php echo base_url(); ?>Booking/Booking/update_service",
						type: "POST",
						data: mydata,
						success: function(data) {
							$('#msg_div').html("");
							$('#msg_div').html(data);
						},
						error: function(data) {
							$('#msg_div').html("");
							$('#msg_div').html(data);
						},
					});
				}

				function re_rate() {
					$('#msg_div').html("<div class='pgn push-on-sidebar-open pgn-bar'><div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>Please Wait Re-Rating is in progress...</div></div>");
					var start_date = $('#rr_start_date').val();
					var end_date = $('#rr_end_date').val();
					var customer_id = $('#customer_id').val();

					var mydata = {
						c_id: customer_id,
						s_d: start_date,
						e_d: end_date
					};

					$.ajax({
						url: "<?php echo base_url(); ?>Booking/Booking/re_rate_customer",
						type: "POST",
						data: mydata,
						success: function(data) {
							$('#msg_div').html("");
							$('#msg_div').html(data);
						},
						error: function(data) {
							$('#msg_div').html("");
							$('#msg_div').html(data);
						},
					});
				}

				function clr() {
					$('#service_type').prop('disabled', false);

					$('#rateCard').text('Add New Rate');

					$('#min_wgt').val('');
					$('#min_rate').val('');
					$('#add_wgt').val('');
					$('#add_rate').val('');

					$('#start_date').val('<?php echo date("Y-m-01"); ?>');
					$('#end_date').val('<?php echo date("Y-m-t", strtotime("+1 years")); ?>');

					$('#sub').val('Save Rates');
				}

				function art_clr() {
					$('#art_title').text('Add New Article');

					$('#art_name').val('');
					$('#art_wgt').val('');
					$('#art_pcs').val('');
					$('#art_rate').val('');

					$('#art_start_date').val('<?php echo date("Y-m-01"); ?>');
					$('#art_end_date').val('<?php echo date("Y-m-t", strtotime("+1 years")); ?>');

					$('#art_sub').val('Save Rates');
				}

				function editRate(ctl) {
					var row = $(ctl).parents("tr");
					var cols = row.children("td");

					if ($(cols[0]).text() != "Article Rate") {
						$('#service_type').prop('disabled', true);
						$('#rate_type').prop('disabled', true);
						$('#zone').prop('disabled', true);
						$('#zone_type').prop('disabled', true);

						$('#sub').val('Update Rates');
						$('#rate_id').val($(cols[1]).text());

						$('#rateCard').text('Editing Rates: ' + $(cols[1]).text());
						$('#min_wgt').val($(cols[5]).text());
						$('#min_rate').val($(cols[6]).text());
						$('#add_wgt').val($(cols[7]).text());
						$('#add_rate').val($(cols[8]).text());

						if ($(cols[9]).text().length > 0) {
							$('#start_date').val($(cols[9]).text());
							$('#start_date').removeAttr('min');
						}

						if ($(cols[10]).text().length > 0) {
							$('#end_date').val($(cols[10]).text());
							$('#start_date').removeAttr('min');
						}

						$('#min_wgt').focus();
					} else {
						var mydata = {
							rate_id: $(cols[1]).text()
						};

						$.ajax({
							url: "<?php echo base_url(); ?>Customer/get_article",
							type: "GET",
							data: mydata,
							success: function(data) {
								if (data.length > 0) {
									art = JSON.parse(data);
									$('#art_title').html("Edit Article & Rate");
									$('#art_rate_id').val($(cols[1]).text());
									$('#art_id').val(art[0].acc_article_id);
									$('#art_name').val(art[0].article_name);
									$('#art_wgt').val(art[0].article_weight);
									$('#art_pcs').val(art[0].pcs_unit);
									$('#art_rate').val(art[0].min_rate);
									$('#art_start_date').val(art[0].start_date);
									$('#art_end_date').val(art[0].end_date);
									$('#art_sub').val("Update Rate");
									$('#art_name').focus();
								}
							}
						});
					}
				}

				function susRate(ctl) {
					var row = $(ctl).parents("tr");
					var cols = row.children("td");
					var rate_id = $(cols[1]).text();
					var customer_id = $('#customer_id').val();

					var mydata = {
						customer_id: customer_id,
						rate_id: rate_id
					};

					if ($(cols[0]).text() != "Article Rate") {
						$.ajax({
							url: "<?php echo base_url(); ?>Customer/suspend_rate",
							type: "POST",
							data: mydata,
							success: function(data) {
								if (data > 0) {
									window.location = "<?php echo base_url(); ?>customer/zone_wise_rate_view/" + customer_id;
								} else {
									$('#msg_div').text("Error");
								}
							}
						});
					} else {
						$.ajax({
							url: "<?php echo base_url(); ?>Customer/suspend_art_rate",
							type: "POST",
							data: mydata,
							success: function(data) {
								if (data > 0) {
									window.location = "<?php echo base_url(); ?>customer/zone_wise_rate_view/" + customer_id;
								} else {
									$('#msg_div').text("Error");
								}
							}
						});
					}
				}

				function enRate(ctl) {
					var row = $(ctl).parents("tr");
					var cols = row.children("td");

					var rate_id = $(cols[1]).text();
					var customer_id = $('#customer_id').val();

					var mydata = {
						customer_id: customer_id,
						rate_id: rate_id
					};

					if ($(cols[0]).text() != "Article Rate") {
						$.ajax({
							url: "<?php echo base_url(); ?>Customer/enable_rate",
							type: "POST",
							data: mydata,
							success: function(data) {
								if (data > 0) {
									window.location = "<?php echo base_url(); ?>customer/zone_wise_rate_view/" + customer_id;
								} else {
									$('#msg_div').text("Error");
								}
							}
						});
					} else {
						$.ajax({
							url: "<?php echo base_url(); ?>Customer/enable_art_rate",
							type: "POST",
							data: mydata,
							success: function(data) {
								if (data > 0) {
									window.location = "<?php echo base_url(); ?>customer/zone_wise_rate_view/" + customer_id;
								} else {
									$('#msg_div').text("Error");
								}
							}
						});
					}
				}

				function delRate(ctl) {
					var row = $(ctl).parents("tr");
					var cols = row.children("td");

					var rate_id = $(cols[1]).text();
					var customer_id = $('#customer_id').val();

					var mydata = {
						customer_id: customer_id,
						rate_id: rate_id
					};

					if ($(cols[0]).text() != "Article Rate") {
						$.ajax({
							url: "<?php echo base_url(); ?>Customer/delete_rate",
							type: "POST",
							data: mydata,
							success: function(data) {
								window.location = "<?php echo base_url(); ?>customer/zone_wise_rate_view/" + customer_id;
							}
						});

					} else {
						$.ajax({
							url: "<?php echo base_url(); ?>Customer/delete_art_rate",
							type: "GET",
							data: mydata,
							success: function(data) {
								window.location = "<?php echo base_url(); ?>customer/zone_wise_rate_view/" + customer_id;
							}
						});
					}
				}
				<?php
				if (!empty($zone)) {
					echo "var zone_list = [";
					foreach ($zone as $z) {
						if (next($zone)) {
							echo "{id:'" . $z->acc_types_short . "', text:'" . $z->acc_types_full . "'},";
						} else {
							echo "{id:'" . $z->acc_types_short . "', text:'" . $z->acc_types_full . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($zone_type)) {
					echo "var zone_type_list =[";
					foreach ($zone_type as $zt) {
						if (next($zone_type)) {
							echo "{id:'" . $zt->acc_types_short . "', text:'" . $zt->acc_types_full . "'},";
						} else {
							echo "{id:'" . $zt->acc_types_short . "', text:'" . $zt->acc_types_full . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($zone_ex)) {
					echo "var zone_ex_list =[";
					foreach ($zone_ex as $ze) {
						if (next($zone_ex)) {
							echo "{id:'" . $ze->acc_types_short . "', text:'" . $ze->acc_types_full . "'},";
						} else {
							echo "{id:'" . $ze->acc_types_short . "', text:'" . $ze->acc_types_full . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($zone_tranist)) {
					echo "var zone_tranist_list =[";
					foreach ($zone_tranist as $ztl) {
						if (next($zone_tranist)) {
							echo "{id:'" . $ztl->acc_types_short . "', text:'" . $ztl->acc_types_full . "'},";
						} else {
							echo "{id:'" . $ztl->acc_types_short . "', text:'" . $ztl->acc_types_full . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($zone_province)) {
					echo "var zone_province_list =[";
					foreach ($zone_province as $zp) {
						if (next($zone_province)) {
							echo "{id:'" . $zp->acc_types_short . "', text:'" . $zp->acc_types_full . "'},";
						} else {
							echo "{id:'" . $zp->acc_types_short . "', text:'" . $zp->acc_types_full . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($rate_types)) {
					echo "var rate_type_list =[";
					foreach ($rate_types as $rt) {
						if (next($rate_types)) {
							echo "{id:'" . $rt['acc_types_short'] . "', text:'" . $rt['acc_types_full'] . "'},";
						} else {
							echo "{id:'" . $rt['acc_types_short'] . "', text:'" . $rt['acc_types_full'] . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($loc_types)) {
					echo "var loc_type_list =[";
					foreach ($loc_types as $rt) {
						if (next($loc_types)) {
							echo "{id:'" . $rt['acc_types_short'] . "', text:'" . $rt['acc_types_full'] . "'},";
						} else {
							echo "{id:'" . $rt['acc_types_short'] . "', text:'" . $rt['acc_types_full'] . "'}";
						}
					}
					echo "];\n\r";
				}

				if (!empty($locs)) {
					echo "var locations_list = [";
					foreach ($locs as $loc) {
						if (next($locs)) {
							echo "{id:" . $loc->city_id . ", text:'" . $loc->city_full_name . "'},";
						} else {
							echo "{id:" . $loc->city_id . ", text:'" . $loc->city_full_name . "'}";
						}
					}
					echo "];\n\r";
				}
				?>

				function service_change() {
					var selected_service = $('#service_type :selected').val();

					$("#rate_type option").each(function(i) {
						$(this).prop('disabled', false);
					});

					if (selected_service == '2') {
						$("#rate_type option").each(function(i) {
							if ($(this).val() != 'FR' && $(this).val() != 'ZW' && $(this).val() != 'DW') {
								$(this).prop('disabled', true);
							}
						});
						$('#rate_type').select2().val('ZW').trigger('change');
					} else if (selected_service == '1') {
						$("#rate_type option").each(function(i) {
							if ($(this).val() != 'PW' && $(this).val() != 'TW' && $(this).val() != 'FR' && $(this).val() != 'DW') {
								$(this).prop('disabled', true);
							}
						});
						$('#rate_type').select2().val('PW').trigger('change');
					} else if ((selected_service == '3') || (selected_service == '4')) {
						$("#rate_type option").each(function(i) {
							if ($(this).val() != 'SW' && $(this).val() != 'FR' && $(this).val() != 'DW') {
								$(this).prop('disabled', true);
							}
						});
						$('#rate_type').select2().val('FR').trigger('change');
					} else if ((selected_service == '5') || (selected_service == '6')) {
						$("#rate_type option").each(function(i) {
							if ($(this).val() != 'FR') {
								$(this).prop('disabled', true);
							}
						});
						$('#rate_type').select2().val('FR').trigger('change');
					}

					$('#rate_type').prop('disabled', false);
					$('#rate_type').select2();
				}

				function rate_change() {
					var selected_rate = $('#rate_type :selected').val();

					$('#zone').prop('disabled', false);
					$('#zone_type').prop('disabled', false);

					if (selected_rate == 'DW') {
						$('#zone').select2().empty().select2({
							data: locations_list
						}).trigger('change');
						$('#zone_type').select2().empty().select2({
							data: locations_list
						});
						$('#lbl3').text('Origin');
						$('#lbl4').text('Destination');
					} else if (selected_rate == 'TW') {
						$('#zone').select2().empty().select2({
							data: zone_tranist_list
						}).trigger('change');
						$('#zone_type').select2().empty().select2({
							data: loc_type_list
						});
						$('#lbl3').text('Transit Type');
						$('#lbl4').text('Location Type');
					} else if ((selected_rate == 'ZW') || (selected_rate == 'SW')) {
						$('#zone').select2().empty().select2({
							data: zone_list
						}).trigger('change');
						$('#zone_type').select2().empty().select2({
							data: zone_type_list
						});
						$('#lbl3').text('Zone');
						$('#lbl4').text('Region');
					} else if (selected_rate == 'PW') {
						$('#zone').select2().empty().select2({
							data: zone_province_list
						}).trigger('change');
						$('#zone_type').select2().empty().select2({
							data: zone_type_list
						});
						$('#lbl3').text('Province');
						$('#lbl4').text('Region');
					} else if (selected_rate == 'FR') {
						$('#zone').prop('disabled', true);
						$('#zone_type').prop('disabled', true);
					}
				}

				function zone_change() {
					var selected_zone = $('#zone :selected').val();
					var fl = "";

					if (selected_zone.indexOf('ex') != -1) {
						fl = selected_zone.substring(3, 4).toUpperCase();
						if (fl == "P") {
							$('#zone_type').select2().val('L').trigger('change');
						} else if (fl == "S") {
							$('#zone_type').select2().val('K').trigger('change');
						} else if (fl == "K") {
							$('#zone_type').select2().val('I').trigger('change');
						} else {
							$('#zone_type').select2().val(fl).trigger('change');
						}
					}

					var selected_text = $('#zone :selected').text();
					if ((selected_text.indexOf('Transit') != -1) || (selected_text.indexOf('Main') != -1)) {
						fl = selected_text.split(' ')[1][0];
						$('#zone_type').select2().val(fl).trigger('change');
					}

					var selected_rate = $('#rate_type :selected').val();
					if ((selected_rate == 'ZW') || (selected_rate == 'SW')) {
						fl = selected_zone.substring(1, 0);
						if (fl != "W") {
							$('#zone_type').select2().val(fl).trigger('change');
						}
					}
				}
			</script>
		</div>
	</div>
	<?php
	$this->load->view('inc/footer');
	?>