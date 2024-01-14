<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		{{-- <link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.min.css') }}"> --}}
		<style>
			.row {
				clear: both;
			}

			.col-lg-1 {
				width: 8%;
				float: left;
			}

			.col-lg-2 {
				width: 16%;
				float: left;
			}

			.col-lg-3 {
				width: 25%;
				float: left;
			}

			.col-lg-4 {
				width: 33%;
				float: left;
			}

			.col-lg-5 {
				width: 42%;
				float: left;
			}

			.col-lg-6 {
				width: 50%;
				float: left;
			}

			.col-lg-7 {
				width: 58%;
				float: left;
			}

			.col-lg-8 {
				width: 66%;
				float: left;
			}

			.col-lg-9 {
				width: 75%;
				float: left;
			}

			.col-lg-10 {
				width: 83%;
				float: left;
			}

			.col-lg-11 {
				width: 92%;
				float: left;
			}

			.col-lg-12 {
				width: 100%;
				float: left;
			}

			.fs-me {
				font-size: 0.7rem;
			}

			#my-table {
				border-color: white !important;
			}

			#my-table th td {
				border-color: white !important;
			}

			.text-center {
				text-align: center !important;
			}

			table {
				border-collapse: collapse;
				width: 100%;
			}

			th,
			td {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			td {
				page-break-inside: avoid;
			}

			.page-break {
				page-break-after: always;
			}

			.mt-1 {
				margin-top: 5px;
			}

			.mt-2 {
				margin-top: 10px;
			}

			.mt-3 {
				margin-top: 15px;
			}

			.py-1 {
				padding-top: 5px;
				padding-bottom: 5px;
			}

			.py-2 {
				padding-top: 10px;
				padding-bottom: 10px;
			}

			.py-3 {
				padding-top: 15px;
				padding-bottom: 15px;
			}

			.p-1 {
				padding: 5px;
			}

			.pt-1 {
				padding-top: 5px;
			}

			.pt-2 {
				padding-top: 10px;
			}

			.pt-3 {
				padding-top: 15px;
			}

			.text-uppercase {
				text-transform: uppercase;
			}

			.fw-bold {
				font-weight: bold;
			}

			.bg-primary {
				background-color: #007bff;
				color: #fff;
			}

			.bg-secondary {
				background-color: #6c757d;
				color: #fff;
			}

			.bg-success {
				background-color: #28a745;
				color: #fff;
			}

			.bg-danger {
				background-color: #dc3545;
				color: #fff;
			}

			.bg-warning {
				background-color: #ffc107;
				color: #000;
			}

			.bg-info {
				background-color: #17a2b8;
				color: #fff;
			}

			.bg-light {
				background-color: #f8f9fa;
				color: #000;
			}

			.bg-dark {
				background-color: #343a40;
				color: #fff;
			}

			.square {
				width: 15px;
				height: 15px;
				border: 1px solid #000;
				margin-top: 2px;
			}

			footer {
				position: fixed;
				bottom: -30px;
				left: 0px;
				right: 0px;
				height: 60px;
				font-size: 18px !important;
				color: black !important;
				/** Extra personal styles **/
				text-align: center;
				line-height: 35px;
				opacity: 0.5;
			}
		</style>
		<title>{{ $title }}</title>
	</head>

	<body>
		<footer style="font-size: 10px">
			Warehouse Management System <strong>Mac Mohan Surakarta</strong> ©
			<script>
				document.write(new Date().getFullYear());
			</script>
		</footer>
		<main>
			<div class="">
				<div class="row">
					<div class="col-12 text-center">
						<img src="{{ public_path('image/logo.png') }}" alt="" srcset="" style="width: 80px"
							class="text-center mb-1">
						<h3>Mac Mohan Warehouse</h3>
						<p style="font-size: 14px">Jl. Gatot Subroto No.42, Kemlayan, Kec. Serengan, Kota Surakarta, Jawa Tengah 57151</p>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="head">
							<div class="row">
								<div class="col-12">
									<h3 class="text-center" style="margin-top: 0px !important;">
										<strong>{{ $titleReport }}</strong>
									</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">Nama Kain</div>
								<div class="col-lg-4">: <strong>{{ $kain->nama_kain }}</strong></div>
								<div class="col-lg-2">Masuk</div>
								<div class="col-lg-4">
									: <strong>{{ \Carbon\Carbon::parse($kain->tgl_masuk)->isoFormat('dddd, D MMMM Y') }}</strong>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">Kode Desain</div>
								<div class="col-lg-4">: <strong>{{ $kain->kode_desain }}</strong></div>
								<div class="col-lg-2">Harga</div>
								<div class="col-lg-4">
									: <strong>Rp. {{ number_format($kain->harga) }}</strong> / {{ $kain->satuan }}</strong>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">Lot</div>
								<div class="col-lg-4">: <strong>{{ $kain->lot }}</strong></div>
								<div class="col-lg-2">Pcs Total</div>
								<div class="col-lg-4">
									: <strong>{{ $kain->pcsCount() }} Pcs</strong> ({{ $kain->warnas->count() }} Warna)
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">Supplier</div>
								<div class="col-lg-4">: <strong>{{ $kain->supplier->nama_supplier }}</strong></div>
								<div class="col-lg-2">Pcs Ready</div>
								<div class="col-lg-4">:<strong>
										@php
											$totalReadyPcs = 0;
											$warnaCount = 0;

											foreach ($kain->warnas as $item) {
											    $totalReadyPcs += $item->total_ready_pcs;

											    if ($item->total_ready_pcs > 0) {
											        $warnaCount++;
											    }
											}

											echo $totalReadyPcs;
										@endphp
										Pcs</strong> ( {{ $warnaCount }} Warna)
								</div>
							</div>
							@if ($kain->foto_kain)
								<div class="row mt-2">
									<div class="col-lg-12 text-center">
										@if ($kain->foto_kain)
											<div class="img mt-3">
												<img src="{{ public_path('storage/' . $kain->foto_kain) }}" alt="" srcset=""
													style="width: 60%;">
											</div>
										@else
											<div class="text-center text-center mt-3">
												<strong>Tidak Ada Foto Sampel</strong>
											</div>
										@endif
									</div>
								</div>
								<hr>
								<div class="page-break"></div>
							@endif
							<div class="row mt-3">
								<p>Keterangan Warna: <strong>{{ $kain->nama_kain }}</strong></p>
								<div class="col-lg-3">
									Masih Di Gudang
								</div>
								<div class="col-lg-3">
									<div class="square bg-light"></div>
								</div>
								<div class="col-lg-3">
									Keluar ke Stand
								</div>
								<div class="col-lg-3">
									<div class="square bg-danger"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
									Keluar ke Cabang
								</div>
								<div class="col-lg-3">
									<div class="square bg-warning"></div>
								</div>
								<div class="col-lg-3">
									Keluar ke Pembeli
								</div>
								<div class="col-lg-3">
									<div class="square bg-info"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3">
									Keluar ke Online
								</div>
								<div class="col-lg-3">
									<div class="square bg-dark"></div>
								</div>
							</div>
							<div class="row mt-3">
								<table class="table table-hover w-100 mt-2">
									<thead style="background-color: yellow; color: black;">
										<tr>
											<th>Kode Warna</th>
											<th>Pcs Ready</th>
											<th>Yard</th>
										</tr>
									</thead>
									<tbody>
										@php
											$no = 1;
										@endphp

										@php
											$sortedWarnas = $kain->warnas->sortBy(function ($item) {
											    return intval(preg_replace('/[^0-9]+/', '', $item->nama_warna));
											});
										@endphp

										@foreach ($sortedWarnas as $item)
											<tr class="align-top @if ($item->total_ready_pcs == 0) bg-success @endif">
												<td>
													{{ $item->nama_warna }}
													<br>
													<span class="badge bg-primary">{{ $item->nama_desain }}</span>
												</td>
												<td>
													{{ $item->total_ready_pcs }} Pcs
												</td>
												<td>
													@foreach ($item->pcs as $pcs)
														<span
															class="square p-1 shadow mx-auto text-center
                            @if ($pcs->status == 0) bg-light
                            @elseif ($pcs->status == 1) bg-danger text-white 
                            @elseif ($pcs->status == 2) bg-warning text-white
                            @elseif ($pcs->status == 3) bg-info text-white
                            @elseif ($pcs->status == 4) bg-dark text-white @endif
                        ">
															{{ $pcs->yard }}
														</span>
													@endforeach
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>

</html>
