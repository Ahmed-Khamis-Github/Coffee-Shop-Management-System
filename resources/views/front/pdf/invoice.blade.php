<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

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
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
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
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img
										src="https://i.pinimg.com/originals/f8/9c/08/f89c08df04ea1d8257438035c9df2b0b.jpg"
										style="width: 50%; max-width: 150px"
									/>
								</td>

								<td>
									Invoice #: {{ $order->id }}<br />
									Created: {{ date('Y-m-d H:i:s', strtotime($order->created_at)) }}<br /><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Name<br />
									Address<br />
									Mobile Number
								</td>

								<td>
									{{ $order->user_name }}<br />
									{{ $order->user_address }}<br />
									{{ $order->mobile_number }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

			 

				 

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

                @foreach ($order->items as $item)
                    
                
				<tr class="item">
<<<<<<< HEAD
					<td>{{ $item->product_name }}</td>
=======
					<td>{{ $item->product_name }} : ({{ $item->quantity }})</td>
>>>>>>> 69479e1 (pushing invoices edits)

					<td>${{ $item->price }}</td>
				</tr>
                @endforeach

			 

				 

				<tr class="total">
					<td></td>
                    @php
                    $totalPrice = $order->items->sum(function ($item) {
                        return $item->price * $item->quantity;
                    });
                @endphp
					<td>Total: ${{ $totalPrice }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>