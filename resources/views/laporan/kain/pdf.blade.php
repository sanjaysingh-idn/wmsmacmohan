<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.min.css') }}">
		<style>
			.row {
				display: -webkit-box;
				display: -webkit-flex;
				display: flex;
			}

			.row>div {
				-webkit-box-flex: 1;
				-webkit-flex: 1;
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
							<div class="row mt-2">
								<div class="col-12">
									<p style="font-size: 14px; margin-bottom: 0px;">Periode :
										<strong>{{ \Carbon\Carbon::parse($startDate)->isoFormat('dddd, D MMMM Y') }}</strong>
									</p>

									{{-- <strong>{{ \Carbon\Carbon::parse($endDate)->isoFormat('dddd, D MMMM Y') }}</strong> --}}
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-12">
									<table class="table table-hover w-100">
										<thead style="background-color: yellow; color: black;">
											<tr>
												<th>No</th>
												<th>Nama Kain</th>
												<th>Input</th>
												<th>Supplier</th>
												<th>Total</th>
												<th>Warna</th>
											</tr>
										</thead>
										<tbody>
											@php
												$no = 1;
											@endphp
											@foreach ($kainReport as $item)
												<tr class="align-top">
													<td>{{ $no++ }}</td>
													<td>
														{{ $item->nama_kain }}
														<br><strong>{{ $item->kode_desain }} </strong>
														@if ($item->lot)
															<br>Lot:<strong> {{ $item->lot }} </strong>
														@endif
													</td>
													<td>{{ date('j/m/Y', strtotime($item->input_at)) }}</td>
													<td>{{ $item->supplier->nama_supplier }}</td>
													<td>
														@php
															$totalPcsKain = 0;
															$totalYardKain = 0;
														@endphp
														@foreach ($item->warnas as $w)
															@php
																$totalPcsKain += $w->total_pcs;
																$totalYardKain += $w->pcs->sum('yard');
															@endphp
														@endforeach
														Pcs: {{ $totalPcsKain }}
														<br>
														{{-- Yard: {{ $totalYardKain }} --}}
													</td>
													<td>
														<div class="mb-3" style="column-count: 2 !important;">
															<table class="table table-bordered" style="width: 100%;">
																<tbody>
																	@foreach ($item->warnas->sortBy('nama_warna') as $warna)
																		<tr>
																			<td>
																				<strong>{{ $warna->nama_warna }}:</strong>
																			</td>
																			<td>
																				{{ $warna->total_pcs }} Pcs
																			</td>
																		</tr>
																	@endforeach
																</tbody>
															</table>
															@php
																$totalPcsKain = 0;
																$totalYardKain = 0;
															@endphp
															@foreach ($item->warnas as $w)
																@php
																	$totalPcsKain += $w->total_pcs;
																	$totalYardKain += $w->pcs->sum('yard');
																@endphp
															@endforeach
														</div>
														<strong><span class="bg-primary text-white p-2 mb-2">Total Pcs: {{ $totalPcsKain }}</span></strong>
														<br>
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
			</div>
		</main>
	</body>

</html>
