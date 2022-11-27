{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google" value="notranslate">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<body>
        <div class="mx-4 ">
            <P class=" fs-6 mb-0">Nomor Penjualan : <strong>{{ $data[0]->nomor_penjualan }}</strong></P>
            <P class=" fs-6 mt-0">Tanggal Penjualan : <strong> {{date('d F Y', strtotime($data[0]->tanggal))}}</strong></P>
        </div>

            <table id="example" class="table table-striped table-bordered" style="width:50%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    @foreach ($data as $d )  

                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>                                
                            <td>{{$d->kode_barang}}</td>                  
                            <td>{{$d->nama_barang}}</td>                
                            <td>{{$d->satuan}}</td>                
                            <td>{{$d->qty}}</td>                
                            @if (strlen($d->harga) === 5)
                            <td>Rp. {{ substr($d->harga,0,2).".".substr($d->harga,2,5)}},-</td>
                            @elseif (strlen($d->harga) === 6)
                            <td>Rp. {{ substr($d->harga,0,3).".".substr($d->harga,3,6)}},-</td>
                            @elseif (strlen($d->harga) === 7)
                            <td>Rp. {{ substr($d->harga,0,1).".".substr($d->harga,1,3).".".substr($d->harga,4,7)}},-</td>
                            @endif                   
                            <td>{{$d->diskon}}%</td>                
                                          
                            @if (strlen($d->subtotal) === 5)
                            <td>Rp. {{ substr($d->subtotal,0,2).".".substr($d->subtotal,2,5)}},-</td>
                            @elseif (strlen($d->subtotal) === 6)
                            <td>Rp. {{ substr($d->subtotal,0,3).".".substr($d->subtotal,3,6)}},-</td>
                            @elseif (strlen($d->subtotal) === 7)
                            <td>Rp. {{ substr($d->subtotal,0,1).".".substr($d->subtotal,1,3).".".substr($d->subtotal,4,7)}},-</td>
                            @endif                 
                        </tr>
                    </tbody> 
                    @endforeach
                </table>
                        <p class="text-center">Total Harga : <strong>Rp. {{ substr(collect($data)->sum('subtotal'),0,1).".".substr(collect($data)->sum('subtotal'),1,3).".".substr(collect($data)->sum('subtotal'),4,7)}}</strong> </p>
                



    
</body>
</html> --}}



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Document</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
                font-size: 15px;
                text-align: left;
			}

			.invoice-box table tr.details td {
				padding-bottom: 10px;
                font-size: 15px;
                text-align: left;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="8">
						<table>
							<tr>
								<td class="title">
									<img src="https://www.sparksuite.com/images/logo.png" style="width: 50%; max-width: 300px" /> LOGO
								</td>

								<td>
									Nomor Penjualan : <strong>#{{ $data[0]->nomor_penjualan }}</strong><br />
									Tanggal Penjualan: <strong> {{ $data[0]->tanggal }}</strong><br />
									Tanggal Cetak PDF:<strong> {{Carbon\Carbon::now()->toDateTimeString()}}</strong>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="8">
						<table>
							<tr>
								<td>
									PT.Aplikasi Penjualan Barang<br />
									Jalan Desa Sakertabarat,<br />
									Kec. Darma, Kab. Kuningan 45562
								</td>

								<td>
									Ziwana Rizwan Pramudia<br />
									0838-2494-0930<br />
									ziwanarizwan@gmail.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading" colspan="8">
                            <td>No.</td>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Satuan</td>
                            <td>Qty</td>
                            <td>Harga</td>
                            <td>Diskon</td>
                            <td>Subtotal</td>
				</tr>

                @foreach ($data as $d ) 

				<tr class="details" colspan="8">
					        <td>{{ $loop->iteration }}</td>                                
                            <td>{{$d->kode_barang}}</td>                  
                            <td>{{$d->nama_barang}}</td>                
                            <td>{{$d->satuan}}</td>                
                            <td>{{$d->qty}}</td>                
                            @if (strlen($d->harga) === 5)
                            <td>Rp. {{ substr($d->harga,0,2).".".substr($d->harga,2,5)}},-</td>
                            @elseif (strlen($d->harga) === 6)
                            <td>Rp. {{ substr($d->harga,0,3).".".substr($d->harga,3,6)}},-</td>
                            @elseif (strlen($d->harga) === 7)
                            <td>Rp. {{ substr($d->harga,0,1).".".substr($d->harga,1,3).".".substr($d->harga,4,7)}},-</td>
							@elseif (strlen($d->harga) === 4)
                                <td>Rp. {{ substr($d->harga,0,1).".".substr($d->harga,1,4)}}</td>
                            @endif                   
                            <td>{{$d->diskon}}%</td>                
                                          
                            @if (strlen($d->subtotal) === 5)
                            <td>Rp. {{ substr($d->subtotal,0,2).".".substr($d->subtotal,2,5)}},-</td>
                            @elseif (strlen($d->subtotal) === 6)
                            <td>Rp. {{ substr($d->subtotal,0,3).".".substr($d->subtotal,3,6)}},-</td>
                            @elseif (strlen($d->subtotal) === 7)
                            <td>Rp. {{ substr($d->subtotal,0,1).".".substr($d->subtotal,1,3).".".substr($d->subtotal,4,7)}},-</td>
							@elseif (strlen($d->harga) === 4)
                                <td>Rp. {{ substr($d->harga,0,1).".".substr($d->harga,1,4)}}</td>
                            @endif
				</tr>

                @endforeach
				<tr class="heading" colspan="8">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Grand Total</td>
				</tr>


				<tr class="total" colspan="8">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><strong>Rp. {{ substr(collect($data)->sum('subtotal'),0,1).".".substr(collect($data)->sum('subtotal'),1,3).".".substr(collect($data)->sum('subtotal'),4,7)}},-</strong></td>
				</tr>
			</table>
		</div>
	</body>
</html>