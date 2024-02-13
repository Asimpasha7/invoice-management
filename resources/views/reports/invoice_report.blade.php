<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice Template</title>

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

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
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

        /* New CSS for alignment */
        .invoice-box table tr.information {
            text-align: right;
        }

        .invoice-box table tr.total td:nth-child(2) {
            text-align: right;
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
                                <!-- Image -->
                                <img src="assets/img/invoice.png" style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Invoice #: {{ $invoice->id }}<br />
                                Payment Due: {{ $payment_date->format('d-m-Y') }}
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
                                Company Name<br/>
                                Address<br/>
                                City, State, Zip <br/>                            
                            </td>
                            <td style="text-align: right;">
                                <!-- Company Information -->
                                Invoice Management Pvt Lmt<br /> 
                                M.G Road, Banglore<br />
                                Banglore, Karnataka, 560001
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td>Quantity</td>
                <td>Price</td>
            </tr>

            @foreach ($invoice->items as $item)
            <tr class="item">
                <td>{{ $item->description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->amount }}</td>
            </tr>

            <tr class="total">
                <td colspan="2"></td>
                <td style="text-align: right;">Total: {{ $item->quantity * $item->amount }}</td>
            </tr>
            @endforeach

            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td colspan="3" style="height: 60px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Thank you for doing business with us!</td>
            </tr>


            
        </table>
    </div>
</body>
</html>
