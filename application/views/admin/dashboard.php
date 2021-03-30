<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>

<body class="nav-fixed">

	<!-- Topbar -->
	<?php $this->load->view("admin/_partials/topbar.php") ?>

	<div id="layoutSidenav">

		<!-- Sidebar -->
		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="layoutSidenav_content">
			<main>

				<div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
					<div class="container-fluid">
						<div class="page-header-content">
							<h1 class="page-header-title">
								<div class="page-header-icon">
									<i data-feather="activity"></i>
								</div>
								<span>Dashboard</span>
							</h1>
							<div class="page-header-subtitle">Website Graph</div>
						</div>
					</div>
				</div>

				<div class="container mt-n10">

					<?php if ($totalResult > 0) { ?>
						<div class="d-flex justify-content-between alert alert-success alert-dismissible fade show mt-5" role="alert">
							<div class="col-lg-12 md-6 ">
								<div class="align-items-center">
									<p><strong>Pemberitahuan!</strong> Terdapat <strong><?= $totalResult ?></strong> Transaksi Terbaru Mohon Konfirmasi.</p>
								</div>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>

								<a href="<?= base_url('admin/Transaksi') ?>" class="btn btn-primary btn-sm align-items-center">Go To Transaction</a>
							</div>
						</div>
					<?php } ?>

					<div class="row mb-4">
						<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12">
							<div class="card h-100">
								<div class="card-header">
									Grafik Pengunjung Website
								</div>
								<div class="card-body">
									<div class="panel panel-primary">
										<div class="panel-body" style="position: relative; height:280px; width:100%;">
											<canvas id="website_visitor" width="100%" height="30"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xxl-3 col-lg-6">
							<div class="card bg-success text-white mb-4">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="mr-3">
											<div class="text-white-75 small">Total Transaksi</div>
											<div class="text-lg font-weight-bold"><?= $totalTransaksi ?></div>
										</div>
										<i class="feather-xl text-white-50" data-feather="activity"></i>
									</div>
								</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="<?= base_url('admin/Transaksi') ?>">Lihat Detail</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>

						<div class="col-xxl-3 col-lg-6">
							<div class="card bg-primary text-white mb-4">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="mr-3">
											<div class="text-white-75 small">Transaksi Selesai</div>
											<div class="text-lg font-weight-bold"><?= $transaksiSelesai ?></div>
										</div>
										<i class="feather-xl text-white-50" data-feather="activity"></i>
									</div>
								</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="<?= base_url('admin/Transaksi') ?>">Lihat Detail</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xxl-3 col-lg-6">
							<div class="card bg-warning text-white mb-4">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="mr-3">
											<div class="text-white-75 small">Transaksi Berlangsung</div>
											<div class="text-lg font-weight-bold"><?= $transaksiBerlangsung ?></div>
										</div>
										<i class="feather-xl text-white-50" data-feather="activity"></i>
									</div>
								</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="<?= base_url('admin/Transaksi') ?>">Lihat Detail</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xxl-3 col-lg-6">
							<div class="card bg-info text-white mb-4">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">
										<div class="mr-3">
											<div class="text-white-75 small">Transaksi Menunggu Konfirmasi</div>
											<div class="text-lg font-weight-bold"><?= $transaksiMenunggu ?></div>
										</div>
										<i class="feather-xl text-white-50" data-feather="activity"></i>
									</div>
								</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="<?= base_url('admin/Transaksi') ?>">Lihat Detail</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
							<div class="card h-100">
								<div class="card-header">
									Rumah 36+
								</div>
								<div class="card-body">
									<input type="hidden" id="inp36tersedia" value="<?= $data36tersedia; ?>">
									<input type="hidden" id="inp36terbooking" value="<?= $data36terbooking; ?>">
									<input type="hidden" id="inp36terjual" value="<?= $data36terjual; ?>">
									<div class="panel panel-primary">
										<div class="panel-body" style="position: relative; height:280px; width:100%;">
											<canvas id="36"></canvas>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
							<div class="card h-100">
								<div class="card-header">
									Rumah 40
								</div>
								<div class="card-body">
									<input type="hidden" id="inp40tersedia" value="<?= $data40tersedia; ?>">
									<input type="hidden" id="inp40terbooking" value="<?= $data40terbooking; ?>">
									<input type="hidden" id="inp40terjual" value="<?= $data40terjual; ?>">
									<div class="panel panel-primary">
										<div class="panel-body" style="position: relative; height:280px; width:100%;">
											<canvas id="40"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
							<div class="card h-100">
								<div class="card-header">
									Rumah 45
								</div>
								<div class="card-body">
									<div class="panel panel-primary">
										<input type="hidden" id="inp45tersedia" value="<?= $data45tersedia; ?>">
										<input type="hidden" id="inp45terbooking" value="<?= $data45terbooking; ?>">
										<input type="hidden" id="inp45terjual" value="<?= $data45terjual; ?>">
										<div class="panel-body" style="position: relative; height:280px; width:100%;">
											<canvas id="45"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
							<div class="card h-100">
								<div class="card-header">
									Ruko
								</div>
								<div class="card-body">
									<input type="hidden" id="inpRukotersedia" value="<?= $dataRukotersedia; ?>">
									<input type="hidden" id="inpRukoterbooking" value="<?= $dataRukoterbooking; ?>">
									<input type="hidden" id="inpRukoterjual" value="<?= $dataRukoterjual; ?>">
									<div class="panel panel-primary">
										<div class="panel-body" style="position: relative; height:280px; width:100%;">
											<canvas id="Ruko"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</main>

			<!-- Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
	</div>

	<!-- JS -->
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

<script>
	(Chart.defaults.global.defaultFontFamily = "Metropolis"),
	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = "#858796";

	var ctx = document.getElementById("website_visitor");
	var cData = JSON.parse(`<?php echo $grafik; ?>`);
	var myLineChart = new Chart(ctx, {
		type: "line",
		data: {
			// labels: [
			// 	"Januari",
			// 	"Februari",
			// 	"Maret",
			// 	"April",
			// 	"Mei",
			// 	"Juni",
			// 	"Juli",
			// 	"Agustus",
			// 	"September",
			// 	"Oktober",
			// 	"November",
			// 	"Desember"
			// ],
			labels: cData.tanggal,
			datasets: [{
				label: "Earnings ",
				lineTension: 0.3,
				backgroundColor: "rgba(0, 97, 242, 0.05)",
				borderColor: "rgba(0, 97, 242, 1)",
				pointRadius: 3,
				pointBackgroundColor: "rgba(0, 97, 242, 1)",
				pointBorderColor: "rgba(0, 97, 242, 1)",
				pointHoverRadius: 3,
				pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
				pointHoverBorderColor: "rgba(0, 97, 242, 1)",
				pointHitRadius: 10,
				pointBorderWidth: 2,
				// data: [
				// 	0,
				// 	10,
				// 	5,
				// 	15,
				// 	10,
				// 	20,
				// 	15,
				// 	25,
				// 	20,
				// 	30,
				// 	25,
				// 	40
				// ]
				data: cData.jumlah
			}]
		},
		options: {
			maintainAspectRatio: false,
			layout: {
				padding: {
					left: 10,
					right: 25,
					top: 25,
					bottom: 0
				}
			},
			scales: {
				xAxes: [{
					time: {
						unit: "date"
					},
					gridLines: {
						display: false,
						drawBorder: false
					},
					ticks: {
						maxTicksLimit: 7
					}
				}],
				yAxes: [{
					ticks: {
						maxTicksLimit: 5,
						padding: 10,
						callback: function(value, index, values) {
							return number_format(value);
						}
					},
					gridLines: {
						color: "rgb(234, 236, 244)",
						zeroLineColor: "rgb(234, 236, 244)",
						drawBorder: false,
						borderDash: [2],
						zeroLineBorderDash: [2]
					}
				}]
			},
			legend: {
				display: false
			},
			tooltips: {
				backgroundColor: "rgb(255,255,255)",
				bodyFontColor: "#858796",
				titleMarginBottom: 10,
				titleFontColor: "#6e707e",
				titleFontSize: 14,
				borderColor: "#dddfeb",
				borderWidth: 1,
				xPadding: 15,
				yPadding: 15,
				displayColors: false,
				intersect: false,
				mode: "index",
				caretPadding: 10,
				callbacks: {
					label: function(tooltipItem, chart) {
						var datasetLabel =
							chart.datasets[tooltipItem.datasetIndex].label || "";
						return datasetLabel + number_format(tooltipItem.yLabel);
					}
				}
			}
		}
	});



	// START 36
	var data36tersedia = document.getElementById("inp36tersedia").value;
	var data36terbooking = document.getElementById("inp36terbooking").value;
	var data36terjual = document.getElementById("inp36terjual").value;
	var ctx = document.getElementById("36");
	var myPieChart = new Chart(ctx, {
		type: "doughnut",
		data: {
			labels: ["Tersedia", "Booking", "Terjual"],
			datasets: [{
				data: [data36tersedia, data36terbooking, data36terjual],
				backgroundColor: [
					"rgba(0, 97, 242, 1)",
					"rgba(0, 172, 105, 1)",
					"rgba(88, 0, 232, 1)"
				],
			}]
		},
		options: {
			resizeable: true,
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				enabled: false,
			},
			legend: {
				display: false
			},
			zoomOutPercentage: 100,
			layout: {
				padding: {
					left: 10,
					right: 10,
					top: 70,
					bottom: 50
				}
			},
			plugins: {
				datalabels: {
					formatter: (value, ctx) => {
						let sum = 0;
						let dataArr = ctx.chart.data.datasets[0].data;
						dataArr.map(data => {
							sum += data;
						});
						let percentage = (value * 100 / sum).toFixed(2) + "%";
						return percentage;
					},
					color: '#fff',
				},
				legend: false,
				outlabels: {
					text: '%l %p',
					color: 'white',
					stretch: 15,
					font: {
						resizable: true,
						minSize: 12,
						maxSize: 16
					}
				}
			},
			cutoutPercentage: 0
		}
	});
	// END 36

	// START 40
	var data40tersedia = document.getElementById("inp40tersedia").value;
	var data40terbooking = document.getElementById("inp40terbooking").value;
	var data40terjual = document.getElementById("inp40terjual").value;
	var ctx = document.getElementById("40");
	var myPieChart = new Chart(ctx, {
		type: "doughnut",
		data: {
			labels: ["Tersedia", "Booking", "Terjual"],
			datasets: [{
				data: [data40tersedia, data40terbooking, data40terjual],
				backgroundColor: [
					"rgba(0, 97, 242, 1)",
					"rgba(0, 172, 105, 1)",
					"rgba(88, 0, 232, 1)"
				],
			}]
		},
		options: {
			resizeable: true,
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				enabled: false,
			},
			legend: {
				display: false
			},
			zoomOutPercentage: 100,
			layout: {
				padding: {
					left: 10,
					right: 10,
					top: 70,
					bottom: 50
				}
			},
			plugins: {
				datalabels: {
					formatter: (value, ctx) => {
						let sum = 0;
						let dataArr = ctx.chart.data.datasets[0].data;
						dataArr.map(data => {
							sum += data;
						});
						let percentage = (value * 100 / sum).toFixed(2) + "%";
						return percentage;
					},
					color: '#fff',
				},
				legend: false,
				outlabels: {
					text: '%l %p',
					color: 'white',
					stretch: 15,
					font: {
						resizable: true,
						minSize: 12,
						maxSize: 16
					}
				}
			},
			cutoutPercentage: 0
		}
	});
	// END 40

	// END 45
	var data45tersedia = document.getElementById("inp45tersedia").value;
	var data45terbooking = document.getElementById("inp45terbooking").value;
	var data45terjual = document.getElementById("inp45terjual").value;
	var ctx = document.getElementById("45");
	var myPieChart = new Chart(ctx, {
		type: "doughnut",
		data: {
			labels: ["Tersedia", "Booking", "Terjual"],
			datasets: [{
				data: [data45tersedia, data45terbooking, data45terjual],
				backgroundColor: [
					"rgba(0, 97, 242, 1)",
					"rgba(0, 172, 105, 1)",
					"rgba(88, 0, 232, 1)"
				],
			}]
		},
		options: {
			resizeable: true,
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				enabled: false,
			},
			legend: {
				display: false
			},
			zoomOutPercentage: 100,
			layout: {
				padding: {
					left: 10,
					right: 10,
					top: 70,
					bottom: 50
				}
			},
			plugins: {
				datalabels: {
					formatter: (value, ctx) => {
						let sum = 0;
						let dataArr = ctx.chart.data.datasets[0].data;
						dataArr.map(data => {
							sum += data;
						});
						let percentage = (value * 100 / sum).toFixed(2) + "%";
						return percentage;
					},
					color: '#fff',
				},
				legend: false,
				outlabels: {
					text: '%l %p',
					color: 'white',
					stretch: 15,
					font: {
						resizable: true,
						minSize: 12,
						maxSize: 16
					}
				}
			},
			cutoutPercentage: 0
		}
	});
	// END 45

	// START RUKO
	var dataRukotersedia = document.getElementById("inpRukotersedia").value;
	var dataRukoterbooking = document.getElementById("inpRukoterbooking").value;
	var dataRukoterjual = document.getElementById("inpRukoterjual").value;
	var ctx = document.getElementById("Ruko");
	var myPieChart = new Chart(ctx, {
		type: "doughnut",
		data: {
			labels: ["Tersedia", "Booking", "Terjual"],
			datasets: [{
				data: [dataRukotersedia, dataRukoterbooking, dataRukoterjual],
				backgroundColor: [
					"rgba(0, 97, 242, 1)",
					"rgba(0, 172, 105, 1)",
					"rgba(88, 0, 232, 1)"
				],
			}]
		},
		options: {
			resizeable: true,
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				enabled: false,
			},
			legend: {
				display: false
			},
			zoomOutPercentage: 100,
			layout: {
				padding: {
					left: 10,
					right: 10,
					top: 70,
					bottom: 50
				}
			},
			plugins: {
				datalabels: {
					formatter: (value, ctx) => {
						let sum = 0;
						let dataArr = ctx.chart.data.datasets[0].data;
						dataArr.map(data => {
							sum += data;
						});
						let percentage = (value * 100 / sum).toFixed(2) + "%";
						return percentage;
					},
					color: '#fff',
				},
				legend: false,
				outlabels: {
					text: '%l %p',
					color: 'white',
					stretch: 15,
					font: {
						resizable: true,
						minSize: 12,
						maxSize: 16
					}
				}
			},
			cutoutPercentage: 0
		}
	});
	// END RUKO 
</script>

</html>