$(document).ready(function () {

	$("#dataTable").DataTable();

	function rupiah(number) {
		return number.toLocaleString('id');
	}

	var thisYear = moment(new Date()).format("YYYY");
	$("#tahun input").val(thisYear);

	if (CURRENT_URL.includes("grafik") || CURRENT_URL.includes("laporan") || CURRENT_URL.includes("dashboard") ) {
		console.log(CURRENT_URL);
		fetchDataPenjualan();
		fetchDataPembelian();
		fetchDataCampuran();
	}

	$('#tahun').datetimepicker({
		format: 'YYYY',
		allowInputToggle: true,
		widgetPositioning: {
			horizontal: 'left',
			vertical: 'bottom'
		},
		viewMode: "years",

	}).on('dp.change', function (e) {
		fetchDataPenjualan();
		fetchDataPembelian();
		fetchDataCampuran();
	});

	function fetchDataPenjualan() {

		var tahun = $('#tahun').data('date');

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/grafik_penjualan",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var total = [];
				var month = [];

				for (var i in data) {
					total.push(data[i].total);
					month.push(data[i].bulan);
				}

				var chartdata = {
					labels: month,
					datasets: [
						{
							label: 'Total Penjualan',
							backgroundColor: 'rgba(26, 187, 156, 0.4)',
							borderColor: 'rgba(26, 187, 156, 0.7)',
							hoverBackgroundColor: 'rgba(26, 187, 156, 0.6)',
							hoverBorderColor: 'rgba(26, 187, 156, 1)',
							lineTension: 0.2,
							data: total
						}
					]
				};

				var ctx = $("#grafik_penjualan");

				var barGraph = new Chart(ctx, {
					type: 'bar',
					data: chartdata,

				});
			}
		})

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/penjualan_tertinggi",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var row;

				for (var i = 0; i < data.length; i++) {
					row += `
					<tr>
					<td>${i + 1}</td>
					<td>${data[i].nama_barang}</td>
					<td>${data[i].total_barang} </td>
					</tr>
					`;
				}

				$("#penjualan_tertinggi").html(row);

			}
		})

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/penjualan_terendah",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var row;

				for (var i = 0; i < data.length; i++) {
					row += `
					<tr>
					<td>${i + 1}</td>
					<td>${data[i].nama_barang}</td>
					<td>${data[i].total_terjual} </td>
					</tr>
					`;
				}

				$("#penjualan_terendah").html(row);

			}
		})


	}

	function fetchDataPembelian() {

		var tahun = $('#tahun').data('date');

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/grafik_pembelian",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var total = [];
				var month = [];

				for (var i in data) {
					total.push(data[i].total);
					month.push(data[i].bulan);
				}

				var chartdata = {
					labels: month,
					datasets: [
						{
							label: 'Total Pembelian',
							backgroundColor: 'rgba(26, 187, 156, 0.4)',
							borderColor: 'rgba(26, 187, 156, 0.7)',
							hoverBackgroundColor: 'rgba(26, 187, 156, 0.6)',
							hoverBorderColor: 'rgba(26, 187, 156, 1)',
							lineTension: 0.2,
							data: total
						}
					]
				};

				var ctx = $("#grafik_pembelian");

				var barGraph = new Chart(ctx, {
					type: 'bar',
					data: chartdata,

				});
			}
		})

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/pembelian_tertinggi",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var row;

				for (var i = 0; i < data.length; i++) {
					row += `
					<tr>
					<td>${i + 1}</td>
					<td>${data[i].nama_barang}</td>
					<td>${data[i].total_dibeli} </td>
					</tr>
					`;
				}

				$("#pembelian_tertinggi").html(row);

			}
		})

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/pembelian_terendah",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var row;

				for (var i = 0; i < data.length; i++) {
					row += `
					<tr>
					<td>${i + 1}</td>
					<td>${data[i].nama_barang}</td>
					<td>${data[i].total_dibeli} </td>
					</tr>
					`;
				}

				$("#pembelian_terendah").html(row);

			}
		})


	}

	function fetchDataCampuran() {

		var tahun = $('#tahun').data('date');

		$.ajax({
			method: 'GET',
			url: BASE_URL + "api/grafik_campuran",
			data: { tahun: tahun },
			success: function (data) {
				console.log(data);

				var bulan = [];
				var penjualan = [];
				var pembelian = [];
				var total_penjualan = 0;
				var total_pembelian = 0;

				for (var i in data) {
					bulan.push(data[i].bulan);
					penjualan.push(data[i].total_penjualan);
					pembelian.push(data[i].total_pembelian);
					total_penjualan += data[i].total_penjualan;
					total_pembelian += data[i].total_pembelian;
				}

				var row;
				var pendapatan;
				var total_pendapatan = 0;
				var text_class;

				for (var i = 0; i < data.length; i++) {
					pendapatan = parseInt(data[i].total_penjualan) - parseInt(data[i].total_pembelian);
					total_pendapatan += parseInt(pendapatan);

					if (pendapatan > 0) {
						text_class = "text-success";
					} else if (pendapatan < 0) {
						text_class = "text-danger";
					} else {
						text_class = "";
					}

					row += `
					<tr>
					<td>${i + 1}</td>
					<td>${data[i].bulan}</td>
					<td>Rp ${rupiah(data[i].total_penjualan)}</td>
					<td>Rp ${rupiah(data[i].total_pembelian)}</td>
					<td class="${text_class} fw-700">Rp ${rupiah(pendapatan)}</td>
					</tr>
					`;


				}

				row += `
					<tr>
					<th colspan="2">Total</th>
					<th>Rp ${rupiah(total_penjualan)}</th>
					<th>Rp ${rupiah(total_pembelian)}</th>
					<th class="${text_class} fw-700">Rp ${rupiah(total_pendapatan)}</th>
					</tr>
					`;

				$("#laporan_campuran").html(row);

				var chartdata = {
					labels: bulan,
					datasets: [
						{
							label: 'Total Penjualan',
							backgroundColor: 'rgba(26, 187, 156, 0.4)',
							borderColor: 'rgba(26, 187, 156, 0.7)',
							hoverBackgroundColor: 'rgba(26, 187, 156, 0.6)',
							hoverBorderColor: 'rgba(26, 187, 156, 1)',
							lineTension: 0.2,
							data: penjualan
						},
						{
							label: 'Total Pembelian',
							backgroundColor: 'rgba(255, 99, 132, 0.4)',
							borderColor: 'rgba(255, 99, 132, 0.7)',
							hoverBackgroundColor: 'rgba(255, 99, 132, 0.6)',
							hoverBorderColor: 'rgba(255, 99, 132, 1)',
							lineTension: 0.2,
							data: pembelian
						}
					]
				};

				var ctx = $("#grafik_campuran");

				var barGraph = new Chart(ctx, {
					type: 'line',
					data: chartdata,

				});
			}
		})


	}


});
