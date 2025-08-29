<div id="parentDivToPrint">
    <!-- Inline styles for printing -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt-header {

            border-top: 15px solid #5b9bd5;
            padding: 27px 22px;
            margin-bottom: 20px;
        }
        .receipt-footer {
            border-top: 15px solid #5b9bd5;
            padding: 27px 22px;
            margin-bottom: 20px;
        }
        .header-logo {
            width: 100px;
            float: right;
        }
        .receipt-body {
            margin-bottom: 20px;
        }
        .custom-table th {
            background-color: #5b9bd5;
            color: white;
        }
        .custom-table td {
            padding: 10px;
        }
        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .signature {
            margin-top: 30px;
            border-top: 1px solid #000;
            text-align: center;
            width: 150px;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }

            footer,
            .print-footer,
            .page-number {
                display: none !important;
            }
            .receipt-body p,
            .receipt-body hr {
                page-break-after: avoid;
            }

            .container {
                padding: 0 !important;
                margin: 0 !important;
            }

            @page {
                margin: 0;
            }
            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>

    <div class="container">
        <!-- Header -->
        <div class="receipt-header d-flex justify-content-between align-items-center px-0">
            <h2><strong style="font-weight: bold;">{{ __('messages.receipt') }}</strong></h2>
            <div>
                <img src="{{ asset('frontend/img/logo-insurance-preview.png') }}" alt="Logo" style="width:145px"
                    class="header-logo">
            </div>
        </div>
        <div class="receipt-body">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                <h5 style="font-weight: bold; margin: 0;">{{ __('messages.src_insurance_brokerage') }}</h5>
                <div style="text-align: right;">
                    <p style="margin: 0;">{{ __('messages.date') }}:{{ $payment->transaction_date }}</p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <p>{{ __('messages.address') }}<br>
                        {{ __('messages.city_state') }}<br>
                        {{ __('messages.phone') }}<br>
                        <a href="mailto:info@srcinsurance.com">info@srcinsurance.com</a>
                    </p>
                </div>
            </div>
            <h6 style="text-align: left; font-weight: bold; margin-top: 20px;">{{ __('messages.client') }}</h6>
            <hr style="border: 0; height: 1px; background-color: black; width: 50%; margin: 0px auto 5px 0;">
            <p><strong>{{ isset($payment) ? $payment->policy->client->client_name : $policy->client->client_name ?? 'N/A' }}</strong>
            </p>
            <p>{{ $payment->policy->description }}</p>
        </div>
        <table class="custom-table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 70%;">{{ __('messages.description') }}</th>
                    <th style="width: 30%;">{{ __('messages.total') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $payment->policy->client->client_address }}</td>
                    <td>${{ $payment->paid_amount }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="text-right">
            <h5 style="text-align: end; font-weight: bold;">{{ __('messages.total') }}: ${{ $payment->paid_amount }}</h5>

            <hr style="border: 0; height: 1px; background-color: black; width: 18%; margin: 0 0 5px auto;">

        </div>
        <div class="footer">
            <div>
                <p><strong>{{ ucfirst(formatString($payment->payment_method)) }}</strong></p>
            </div>
            <div class="signature">{{ __('messages.signature') }}</div>
        </div>
    </div>
<div class="receipt-footer d-flex justify-content-between align-items-center">
</div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" id="btn"><i class="fa fa-print"></i> {{ __('messages.print') }}</button>
</div>

<script>
    $(document).on("click", "#btn", function() {
        html2canvas(document.getElementById('parentDivToPrint'), {
            scale: 3,
            useCORS: true,
            logging: false,
            letterRendering: true
        }).then(function(canvas) {
            var imageData = canvas.toDataURL('image/jpeg', 1.0);
            printJS({
                printable: imageData,
                type: 'image',
                imageStyle: 'width: 100%; height: auto;'
            });
        });
    });
</script>
