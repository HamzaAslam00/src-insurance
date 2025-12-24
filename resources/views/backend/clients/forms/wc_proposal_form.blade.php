<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Workers Compensation Insurance Proposal</title>
    <style>
        @page {
        margin: 20px 25px 25px 25px;
        size: letter;
        }
        
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        
        body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        line-height: 1.3;
        color: #000;
        margin: 50px;
        padding: 0;
        }
        
        .page {
        page-break-after: always;
        position: relative;
        height: 100%;
        }
        
        .page:last-child {
        page-break-after: avoid;
        }
        
        .page-border {
        border: 2px solid #000;
        padding: 20px 30px;
        min-height: 740px;
        position: relative;
        }
        
        .page-no-border {
        padding: 15px 25px;
        min-height: 740px;
        position: relative;
        }
        
        .text-center {
        text-align: center;
        }
        
        .text-right {
        text-align: right;
        }
        
        .text-left {
        text-align: left;
        }
        
        .bold {
        font-weight: bold;
        }
        
        .italic {
        font-style: italic;
        }
        
        .underline {
        text-decoration: underline;
        }
        
        .page-number {
        position: absolute;
        bottom: 6px;
        right: 10px;
        font-size: 10pt;
        }
        
        /* ============ PAGE 1: COVER ============ */
        .cover-title {
        font-size: 22pt;
        font-weight: bold;
        text-decoration: underline;
        margin-top: 20px;
        letter-spacing: 1px;
        }
        
        .cover-subtitle {
        font-size: 9pt;
        font-style: italic;
        margin-top: 3px;
        letter-spacing: 2px;
        }
        
        .lion-container {
        margin: 30px auto 40px auto;
        text-align: center;
        }
        
        .lion-logo {
            width: 500px;
            height: auto;
        }
        
        .prepared-label {
        font-size: 18pt;
        font-style: italic;
        margin-top: 20px;
        }
        
        .client-name-cover {
        font-size: 14pt;
        margin-top: 8px;
        letter-spacing: 1px;
        }
        
        .company-name-cover {
        font-size: 12pt;
        font-weight: bold;
        margin-top: 15px;
        letter-spacing: 0.5px;
        text-decoration: underline;
        }
        
        .date-cover {
        font-size: 15pt;
        font-style: italic;
        margin-top: 12px;
        }
        
        .broker-name-large {
        font-size: 18pt;
        margin-top: 20px;
        letter-spacing: 0.5px;
        }
        
        .broker-type {
        font-size: 14pt;
        margin-top: 5px;
        }
        
        .broker-contact {
        font-size: 11pt;
        margin-top: 15px;
        line-height: 1.6;
        }
        
        .broker-link {
        color: #0000EE;
        text-decoration: underline;
        }

        table {
            border-collapse: collapse;
        }

        .page-num {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 12pt;
        }


        /* ============ PAGE 2: QUOTE ============ */
        .header-company {
        display: inline-block;
        font-size: 18pt;
        font-weight: bold;
        font-style: italic;
        text-align: center;
        border-bottom: 1px solid #000;
        padding-bottom: 3px;
        margin-bottom: 2px;
        }
    
        .header-address {
        font-size: 10pt;
        text-align: center;
        }
    
        .header-phone {
        font-size: 10pt;
        text-align: center;
        margin-top: 3px;
        /* margin-bottom: 1px; */
        }
    
        .quote-title-box {
        border: 3px solid #000;
        display: inline-block;
        padding: 0px 100px;
        }
    
        .quote-title {
        font-size: 18pt;
        font-weight: bold;
        }
    
        .quote-validity {
        font-size: 9pt;
        font-style: italic;
        margin-top: 5px;
        margin-bottom: 7px;
        }
    
        .disclaimer-text {
        font-size: 11pt;
        font-weight: bold;
        margin-bottom: 15px;
        line-height: 1;
        }
    
        .info-table {
        width: 100%;
        margin-bottom: 10px;
        margin-left: 100px;
        }
    
        .info-table td {
        padding: 0px 0;
        font-size: 9pt;
        vertical-align: top;
        }
    
        .info-label {
        width: 115px;
        text-align: right;
        padding-right: 8px;
        }

        .coverage-wrapper {
        width: 100%;
        margin-bottom: 5px;
        border: 1px solid #000;
        }

        .coverage-left {
        width: 48%;
        float: left;
        }

        .coverage-right {
        width: 48%;
        float: right;
        }

        .clearfix::after {
        content: "";
        display: table;
        clear: both;
        }

        .coverage-header {
        font-size: 10pt;
        font-weight: bold;
        padding: 3px 0 3px 100px;
        /* border-bottom: 1px solid #000; */
        margin-bottom: 3px;
        }

        .coverage-row {
        width: 100%;
        font-size: 9pt;
        margin-bottom: 1px;
        }

        .coverage-row td {
        padding: 1px 0;
        }

        .coverage-row td:last-child {
        text-align: right;
        }

        .protection-header {
        font-size: 8pt;
        font-weight: bold;
        padding: 8px 0 3px 0;
        }

        .protection-row {
        font-size: 8pt;
        }

        .protection-row td {
        padding: 1px 0;
        }

        .protection-row td:last-child {
        text-align: right;
        width: 40px;
        }

        .payment-box {
        border: 1px solid #000;
        width: 340px;
        margin: 15px auto;
        }

        .payment-header {
        font-size: 10pt;
        font-weight: bold;
        padding: 4px 8px;
        border-bottom: 1px solid #000;
        }

        .payment-row {
        font-size: 9pt;
        }

        .payment-row td {
        padding: 1px 8px;
        }

        .payment-row td:last-child {
        text-align: right;
        }

        .payment-note {
        font-size: 9pt;
        padding: 3px 8px;
        }

        .request-text {
        font-size: 9pt;
        margin: 12px 0;
        text-align: justify;
        }

        .sig-line {
        border-bottom: 1px solid #000;
        min-height: 18px;
        margin-bottom: 3px;
        }

        .sig-label {
        font-size: 9pt;
        text-align: center;
        }

        .acord-footer {
        position: absolute;
        bottom: 8px;
        left: 20px;
        right: 20px;
        font-size: 9pt;
        font-weight: bold;
        }
    
        .acord-footer-left {
        float: left;
        }
    
        .acord-footer-center {
        text-align: center;
        margin-left:auto;
        margin-right: auto;
        }
        .mt-50 {
            margin-top: 50px;
        }
        .mt-10 {
            margin-top: 10px;
        }
        .mb-5 {
            margin-bottom: 5px;
        }
        .mb-100 {
            margin-bottom: 100px;
        }
        .pl-8 {
            padding-left: 8px!important;
        }
        .mx-50 {
            margin-left: 50px;
            margin-right: 50px;
        }
        .px-50 {
            padding-left: 50px;
            padding-right: 50px;
        }
    </style>
</head>

<body>

    {{-- ==================== PAGE 1 - COVER ==================== --}}
    <div class="page">
        <div class="page-border">
            <div class="text-center">
                <div class="cover-title mt-50 mb-100" style="font-style: italic;">INSURANCE PROPOSAL</div>
    
                <div class="lion-container">
                    <img src="{{ public_path('backend/images/wc-pdf-logo.png') }}" class="lion-logo" alt="Logo">
                </div>
    
                <div class="prepared-label">Prepared for:</div>
                <div class="client-name-cover">{{ $data['client_name'] ?? 'LUIS TUFINO' }}</div>
    
                <div class="company-name-cover">{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC' }}</div>
    
                <div class="date-cover">{{ $data['proposal_date'] ?? 'September 1, 2025' }}</div>
    
                <div class="broker-name-large">SRC INSURANCE BROKERAGE INC.</div>
                <div class="broker-type">Worker's Compensation</div>
    
                <div class="broker-contact">
                    480 39th Street Suite 2F, Brooklyn, New York 11232<br>
                    718-438-0400<br>
                    info@srcinsurance.com<br>
                    <a href="http://www.srcinsurance.com" class="broker-link">www.srcinsurance.com</a>
                </div>
            </div>
            <div class="page-number">1</div>
        </div>
    </div>

    {{-- ==================== PAGE 2 - INSURANCE QUOTE ==================== --}}
    <div class="page">
        <div class="page-border">
            <table style="width:100%; margin-bottom:15px;">
                <tr>
                    <td style="width:15%; text-align:left; vertical-align:middle;">
                        <img src="{{ public_path('backend/images/wc-pdf-logo-short.png') }}" alt="Logo">
                        @if(isset($logo_path) && file_exists($logo_path))
                        @endif
                    </td>
                    <td style="width:70%; text-align:center; vertical-align:middle;">
                        <div class="text-center"><div class="header-company">SRC INSURANCE BROKERAGE INC.</div></div>
                        <div class="header-address">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
                        <div class="header-phone">718-438-0400</div>
                    </td>
                    <td style="width:15%; text-align:right; vertical-align:middle;">
                        <img src="{{ public_path('backend/images/wc-pdf-logo-short.png') }}" alt="Logo">
                        @if(isset($logo_path) && file_exists($logo_path))
                        @endif
                    </td>
                </tr>
            </table>
            <div class="text-center">
                <div class="quote-title-box">
            <span class="quote-title">INSURANCE QUOTE</span>
                </div>
                <div class="quote-validity">Quote valid for 7 days</div>
            </div>
            
            <div class="disclaimer-text text-center">
                This is not a BINDER, it is a copy of coverages requested on your behalf and is<br>subject to insurance
                companies approval
            </div>
            
            <table class="info-table">
                <tr>
            <td class="info-label">Date:</td>
            <td class="pl-8">{{ $data['quote_date'] ?? '9/1/2025' }}</td>
                </tr>
                <tr>
            <td class="info-label">Named Insured:</td>
            <td class="pl-8">{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC' }}</td>
                </tr>
                <tr>
            <td class="info-label">Address:</td>
            <td class="pl-8">{{ $data['address'] ?? '3908 5TH AVENUE' }}</td>
                </tr>
                <tr>
            <td class="info-label">City:</td>
            <td class="pl-8">{{ $data['city'] ?? 'BROOKLYN' }}</td>
                </tr>
                <tr>
            <td class="info-label">State:</td>
            <td class="pl-8">{{ $data['state'] ?? 'NY' }}</td>
                </tr>
                <tr>
            <td class="info-label">Zip Code</td>
            <td class="pl-8">{{ $data['zip_code'] ?? '11232' }}</td>
                </tr>
                <tr>
            <td class="info-label">Telephone:</td>
            <td class="pl-8">{{ $data['telephone'] ?? '718-435-3826' }}</td>
                </tr>
                <tr>
            <td class="info-label">Insurance Carrier:</td>
            <td class="pl-8">{{ $data['carrier'] ?? 'NEXT' }}</td>
                </tr>
            </table>
            
            <div class="coverage-wrapper clearfix mr" style="margin-left: auto; margin-right: auto; width: 70%; padding: 0 5px;">
                <div class="">
                    <div class="coverage-header">Disability:</div>
                    <table style="width: 100%;">
                        <tr class="coverage-row">
                            <td>Weekly Pay</td>
                            <td>${{ $quote->disability_weekly ?? '170.00' }}</td>
                        </tr>
                    </table>
                    <div class="coverage-header">Worker's Compensation</div>
                    <table style="width: 100%;">
                        <tr class="coverage-row">
                            <td>Bodily Injury by Accident- each accident</td>
                            <td>${{ $quote->bi_accident ?? '1,000,000.00' }}</td>
                        </tr>
                        <tr class="coverage-row">
                            <td>Bodily Injury by Disease- each employee</td>
                            <td>${{ $quote->bi_disease_emp ?? '1,000,000.00' }}</td>
                        </tr>
                        <tr class="coverage-row">
                            <td>Bodily Injury by Disease- policy limit</td>
                            <td>${{ $quote->bi_disease_policy ?? '1,000,000.00' }}</td>
                        </tr>
                    </table>
                    
                </div>
            </div>
            
            <div class="payment-box">
                <div class="payment-header text-center">PAYMENT INFORMATION-WC</div>
                <table style="width: 100%;">
            <tr class="payment-row">
                <td>Down Payment:</td>
                <td>${{ number_format($data['down_payment'] ?? 1432.00, 2) }}</td>
            </tr>
            <tr class="payment-row">
                <td>Monthly Payments:</td>
                <td>${{ number_format($data['monthly_payment'] ?? 782.00, 2) }}</td>
            </tr>
            <tr class="payment-row">
                <td># of Months:</td>
                <td>{{ $data['num_months'] ?? 1 }}</td>
            </tr>
            <tr class="payment-row">
                <td>Finance Charge:</td>
                <td>{{ $data['finance_charge'] ?? '$0.00' }}</td>
            </tr>
            <tr class="payment-row">
                <td><strong>Total Policy Cost:</strong></td>
                <td><strong>${{ number_format($data['total_cost'] ?? 2214.00, 2) }}</strong></td>
            </tr>
                </table>
            </div>
            
            <div class="payment-box">
                <div class="payment-header text-center">PAYMENT INFORMATION-DBL</div>
                <table style="width: 100%;">
            <tr class="payment-row">
                <td>Full Payment :</td>
                <td>${{ number_format($data['down_payment'] ?? 395, 2) }}</td>
            </tr>
                </table>
            </div>
            
            <div class="payment-box">
                <div class="payment-header text-center">PAYMENT INFORMATION-DBL & WC</div>
                <table style="width: 100%;">
            <tr class="payment-row">
                <td>Down Payment:</td>
                <td>${{ number_format($data['down_payment'] ?? 1827.00, 2) }}</td>
            </tr>
            <tr class="payment-row">
                <td><strong>Total Payment:</strong></td>
                <td><strong>${{ number_format($data['total_cost'] ?? 2609.00, 2) }}</strong></td>
            </tr>
                </table>
            </div>
            <div style="font-size:9pt; text-align:justify; margin:8px 30px; line-height:1.4;">This is a request for
                insurance with the above stated coverages. Acceptance of these monies does not guarantee coverage. Full down
                payment must be recieved to request bind order. If paid by Check, allow 3 business days for check to clear.
            </div>
            <table style="width:100%; margin-top:40px;">
                <tr>
                    <td style="text-align:center;">
                        <div style="padding-bottom: 1px; width:240px; margin:0 auto; text-align: left;">X</div>
                        <div
                            style="border-top:1px solid #000; width:240px; margin:0 auto; padding-top:5px; font-size:9pt; font-weight:bold;">
                            {{ $client->name ?? 'LUIS TUFINO' }}</div>
                        <div style="font-size:8pt;">{{ $client->company_name ?? 'DON PEPE TORTAS Y JUGOS INC' }}</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="page-number">2</div>
    </div>

    {{-- ==================== PAGE 3 - SERVICE FEE AGREEMENT ==================== --}}
    <div class="page">
        <div class="page-border">
        
            <table style="width:100%; margin-bottom:15px;">
                <tr>
                    <td style="width:15%; text-align:left; vertical-align:middle;">
                        <img src="{{ public_path('backend/images/wc-pdf-logo-short.png') }}" alt="Logo">
                        @if(isset($logo_path) && file_exists($logo_path))
                        @endif
                    </td>
                    <td style="width:70%; text-align:center; vertical-align:middle;">
                        <div class="text-center"><div class="header-company">SRC INSURANCE BROKERAGE INC.</div></div>
                        <div class="header-address">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
                        <div class="header-phone">718-438-0400</div>
                    </td>
                    <td style="width:15%; text-align:right; vertical-align:middle;">
                        <img src="{{ public_path('backend/images/wc-pdf-logo-short.png') }}" alt="Logo">
                        @if(isset($logo_path) && file_exists($logo_path))
                        @endif
                    </td>
                </tr>
            </table>
            <div class="text-center">
                <div class="quote-title-box">
            <span class="quote-title">Service Fee Agreement</span>
                </div>
            </div>
            <div style="font-size:10pt; text-align:justify; line-height:1.5; margin-bottom:12px; margin-top:30px;">A Service Fee charge can
                be made only if you (The Insured) agree to this fee in writing. A commission will be received BY SRC
                Insurance Brokerage Inc. from the purchase of insurance.</div>
            <div style="font-size:10pt; margin-bottom:5px;">This agreement is made between <span style="font-weight: bold;">SRC INSURANCE BROKERAGE INC.</span>
            </div>
            <div style="font-size:10pt; text-align:center; font-weight:bold; margin-bottom:5px;">{{ $client->company_name ??
                'DON PEPE TORTAS Y JUGOS INC' }}</div>
            <div style="font-size:10pt; margin-bottom:10px;">On this <span style="margin-left:120px; font-weight: bold;">{{
                    $quote->proposal_date ?? 'April 9, 2025' }}</span></div>
            <div style="font-size:10pt; line-height:1.5; margin-bottom:8px;">It is agreed that every policy period in return
                for SRC Insurance Brokerage Inc. following services:</div>
            <div style="margin-left:70px; font-size:10pt; margin-bottom:10px;">
                <div>-Placement and Securing Insurance Policy</div>
                <div>-Assistance with recommendations from inspection reports.</div>
                <div>-Policy Delivery.</div>
                <div>-Special services related to cancellations and notices.</div>
                <div>-Claims Assistance</div>
            </div>
            <table style="width:100%; margin-bottom:15px;">
                <tr>
                    <td style="font-size:10pt;">The insured will pay <span style="font-weight: bold;">SRC INSURANCE BROKERAGE INC</span>.</td>
                    <td style="font-size:10pt; font-weight:bold; text-align:right; width:100px;">${{ $quote->service_fee_wc
                        ?? '650.00' }}</td>
                    <td style="font-size:10pt; text-align:right; width:50px; font-weight: bold;">WC</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:10pt; font-weight:bold; text-align:right;">${{ $quote->service_fee_dbl ?? '150.00'
                        }}</td>
                    <td style="font-size:10pt; text-align:right; font-weight: bold;">DBL</td>
                </tr>
            </table>
            <div style="font-size:10pt; text-align:justify; line-height:1.4; font-style:italic; margin-bottom:12px;">Se
                puede cobrar una tarifa de servicio solo si usted (el asegurado) acepta esta tarifa por escrito. SRC
                Insurance Brokerage Inc. recibirá una comisión por la compra del seguro.</div>
            <div style="font-size:10pt; margin-top:12px; margin-bottom:5px;">Este acuerdo se realiza entre <span style="font-weight: bold;">SRC INSURANCE BROKERAGE INC</span>. Y</div>
            <div style="font-size:10pt; text-align:center; font-weight:bold; margin-bottom:5px;">{{ $client->company_name ??
                'DON PEPE TORTAS Y JUGOS INC' }}</div>
            <div style="font-size:10pt; margin-bottom:10px;">En la Fecha <span style="margin-left:100px; font-weight: bold;">{{
                    $quote->proposal_date_spanish ?? 'Apr 9, 2025' }}</span></div>
            <div style="font-size:10pt; line-height:1.4; font-style:italic; margin-bottom:8px;">Se acuerda que cada periodo
                de la poliza a cambio de los siguientes servicios de src insurance brokerage inc</div>
            <div style="margin-left:70px; font-size:10pt; font-style:italic; margin-bottom:10px;">
                <div>-Colocacion y obstencion de la poliza de seguro.</div>
                <div>-Asistencia con las recomendaciones de los informes de inspeccion.</div>
                <div>-Entrega de Polizas</div>
                <div>-Servicios especiales relacionados con cancelaciones y avisos.</div>
                <div>-Asistencia en reclamos</div>
            </div>
            <table style="width:100%;">
                <tr>
                    <td style="font-size:10pt; font-style:italic;">El asegurado pagara a <span style="font-weight: bold;">SRC INSURANCE BROKERAGE INC</span>.</td>
                    <td style="font-size:10pt; font-weight:bold; text-align:right; width:100px;">${{ $quote->service_fee_wc
                        ?? '650.00' }}</td>
                    <td style="font-size:10pt; text-align:right; width:50px; font-weight: bold;">WC</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:10pt; font-weight:bold; text-align:right;">${{ $quote->service_fee_dbl ?? '150.00'
                        }}</td>
                    <td style="font-size:10pt; text-align:right; font-weight: bold;">DBL</td>
                </tr>
            </table>
            <table style="width:100%; margin-top:60px; margin-bottom: 35px;">
                <tr>
                    <td style="text-align:center;">
                        <div style="padding-bottom: 1px; width:240px; margin:0 auto; text-align: left;">X</div>
                        <div
                            style="border-top:1px solid #000; width:240px; margin:0 auto; padding-top:5px; font-size:10pt; font-weight:bold;">
                            {{ $client->name ?? 'LUIS TUFINO' }}</div>
                        <div style="font-size:9pt;">{{ $client->company_name ?? 'DON PEPE TORTAS Y JUGOS INC' }}</div>
                    </td>
                </tr>
            </table>
            <div class="page-number">3</div>
    </div>
    </div>

    {{-- ==================== PAGE 4 - CREDIT/ACH AUTHORIZATION ==================== --}}
    <div class="page">
        
            <div class="page-border">
                <table style="width:100%; margin-bottom:15px;">
                    <tr>
                        <td style="width:15%; text-align:left; vertical-align:middle;">
                            <img src="{{ public_path('backend/images/wc-pdf-logo-short.png') }}" alt="Logo">
                            @if(isset($logo_path) && file_exists($logo_path))
                            @endif
                        </td>
                        <td style="width:70%; text-align:center; vertical-align:middle;">
                            <div class="text-center"><div class="header-company">SRC INSURANCE BROKERAGE INC.</div></div>
                            <div class="header-address">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
                            <div class="header-phone">718-438-0400</div>
                        </td>
                        <td style="width:15%; text-align:right; vertical-align:middle;">
                            <img src="{{ public_path('backend/images/wc-pdf-logo-short.png') }}" alt="Logo">
                            @if(isset($logo_path) && file_exists($logo_path))
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="text-center">
                    <div class="quote-title-box" style="padding-left: 50px; padding-right: 50px;">
                <span class="quote-title">Credit/ACH Payment Authorization</span>
                    </div>
                </div>
                
                        <div style="font-size:9pt; text-align:justify; line-height:1.35; margin:10px 20px; border: 1px solid #000;">It is agreed that you
                hereby authorize SRC INSURANCE BROKERAGE INC. to initiate an automatic debit to the financial account
                indicated (and authorize said financial institution to honor such debit) for any and all installments due
                under the SRC INSURANCE BROKERAGE INC. quote or account number listed above. It is further agreed that any
                additional fees, including but not limited to, late fees, non-sufficient funds fees and cancellation fee,
                will also be charged and debited from the indicated account should they accrue during the term of the
                policy. The debited installment amount is subject to change in the event of the financing of an additional
                premium or the crediting of an endorsement refund to the original Premium Finance Agreement, which has been
                processed to your existing account. You further understand, agree and affirm that: (1) the information you
                have provided above is correct and accurate; (2) you are authorized to enter into this agreement and are the
                signer on the above account; (3) funds will be available to cover the amount of the existing obligation on
                the payment due date or the business day prior to the due date should the due date fall on a weekend or
                holiday;(4) this authorization will remain in full force and effect until either (a) you request termination
                of this agreement by providing SRC INSURANCE BROKERAGE ING writen notice of the desire to terminate
                automatic ACH/Credit Card debit (15) days prior to desired termination date at the address or email below
                closed account. SRC INSURANCE BROKERAGE INC. reserves the right to remove this ACH/Credi Card Authorization
                at its sole discretion should an ACH/Credit Card be returned for any reason, but SRC INSURANCE BROKERAGE
                INC. rreserves its right to reestablish future ACH/Credit Card debits based on this authorization unless
                this authorization has been terminated as outlined above.</div>
                <table style="width: 100%; font-size: 10pt; padding:5px 20px;"">
                    <tr>
                        <td>I, <strong>{{ $data['client_name'] ?? 'LUIS TUFINO' }}</strong></td>
                        <td style="padding-left: 120px;">Authorize <strong>SRC INSURANCE BROKERAGE INC,</strong></td>
                    </tr>
                    <tr>
                        <td>to charge my</td>
                        <td style="padding-left: 120px;">FOR <span style="margin-left: 120px; margin-right:120px;">on</span>
                            <span><strong>{{ $data['auth_date'] ?? '9/1/2025' }}</strong></span></td>
                    </tr>
                </table>
                        <table style="width:100%; margin:0px auto; border:1px solid #000; padding:12px 20px;">
                <tr>
                    <td colspan="2" style="text-align:center; font-size:12pt; font-weight:bold; padding-bottom:10px;">CREDIT
                        CARD</td>
                </tr>
                <tr>
                    <td style="width:120px; text-align:right; font-size:10pt; padding:4px 10px;">Card Number #:</td>
                    <td style="border-bottom:1px solid #000; font-size:10pt;">{{ $quote->card_number ?? '' }}</td>
                </tr>
                <tr>
                    <td style="text-align:right; font-size:10pt; padding:4px 10px;">Expiration:</td>
                    <td style="border-bottom:1px solid #000; font-size:10pt;">{{ $quote->card_exp ?? '' }}</td>
                </tr>
                <tr>
                    <td style="text-align:right; font-size:10pt; padding:4px 10px;">CVV:</td>
                    <td style="border-bottom:1px solid #000; font-size:10pt;">{{ $quote->card_cvv ?? '' }}</td>
                </tr>
                <tr>
                    <td style="text-align:right; font-size:10pt; padding:4px 10px;">Zip Code:</td>
                    <td style="border-bottom:1px solid #000; font-size:10pt;">{{ $quote->card_zip ?? '' }}</td>
                </tr>
                        </table>
                
                        <table style="width:100%; margin:0px auto; border:1px solid #000; padding:12px 20px;">
                <tr>
                    <td colspan="2" style="text-align:center; font-size:12pt; font-weight:bold; padding-bottom:10px;">ACH
                    </td>
                </tr>
                <tr>
                    <td style="width:120px; text-align:right; font-size:10pt; padding:4px 10px;">Routing #:</td>
                    <td style="border-bottom:1px solid #000; font-size:10pt;">{{ $quote->ach_routing ?? '' }}</td>
                </tr>
                <tr>
                    <td style="text-align:right; font-size:10pt; padding:4px 10px;">Account #:</td>
                    <td style="border-bottom:1px solid #000; font-size:10pt;">{{ $quote->ach_account ?? '' }}</td>
                </tr>
                        </table>
                
                        <table style="width:100%; margin-top:25px;">
                <tr>
                    <td style="width:50%; text-align:center; padding:0 25px;">
                        <div style="padding-bottom: 1px; width:240px; margin:0 auto; text-align: left; margin-top:33px; padding-top:5px;">X</div>
                        <div style="border-top:1px solid #000;  font-size:10pt;">
                            SIGNATURE<br><span style="font-weight:bold;">{{ $client->name ?? 'LUIS TUFINO' }}</span><br>{{
                            $client->company_name ?? 'DON PEPE TORTAS Y JUGOS INC' }}</div>
                    </td>
                    <td style="width:50%; text-align:center; padding:0 25px;">
                        
                        <div style="padding-bottom: 1px; width:240px; margin:0 auto; text-align: left; margin-top:33px; padding-top:5px; color: white;">X</div>


                        <div style="border-top:1px solid #000;font-size:10pt;">DATE</div>
            <div style="color: white">.<br>.</div>
                    </td>
                </tr>
                        </table>
                        <div class="page-number">4</div>
            </div>
    </div>

    {{-- ==================== PAGE 5 - ACORD 130 ==================== --}}
    <div class="page">
        <table style="width:100%; font-size:9pt; margin-bottom:5px; font-weight:bold;">
            <tr>
                <td><div style="text-align:left;">GENERAL INFORMATION (continued)</div></td>
                <td><td style="text-align:right;">AGENCY CUSTOMER ID: <div style="border-bottom:1px solid #000; display: inline-block; width: 200px;">{{ $client->agency_id ?? '' }}</div></td></td>
            </tr>
        </table>
        
        <table style="width:100%; border:1px solid #000; font-size:6.5pt;">
            <tr style="font-weight:bold; font-size:6pt;">
                <td style="padding:4px 5px; border-bottom:1px solid #000;">EXPLAIN ALL "YES" RESPONSES</td>
                <td style="width:35px; text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">Y/N</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">16.</span>
                    ARE PHYSICALS REQUIRED AFTER OFFERS OF EMPLOYMENT ARE MADE?</td>
                <td style="width:35px; text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{
                    $quote->q16 ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">17.</span>
                    ANY OTHER INSURANCE WITH THIS INSURER?</td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{ $quote->q17
                    ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">18.</span>
                    ANY PRIOR COVERAGE DECLINED / CANCELLED / NON-RENEWED IN THE LAST THREE (3) YEARS? (Missouri
                    Applicants - Do not answer this question)<br><span style="margin-left:18px;">{{ $quote->q18_reason
                        ?? 'NON-PAYMENT OF AUDIT' }}</span></td>
                <td
                    style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000; vertical-align:top;">
                    {{ $quote->q18 ?? 'Y' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">19.</span>
                    ARE EMPLOYEE HEALTH PLANS PROVIDED?</td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{ $quote->q19
                    ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">20.</span> DO
                    ANY EMPLOYEES PERFORM WORK FOR OTHER BUSINESSES OR SUBSIDIARIES?</td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{ $quote->q20
                    ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">21.</span> DO
                    YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?</td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{ $quote->q21
                    ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">22.</span> DO
                    ANY EMPLOYEES PREDOMINANTLY WORK AT HOME? If "YES", # of Employees:</td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{ $quote->q22
                    ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px; border-bottom:1px solid #000;"><span style="font-weight:bold;">23.</span>
                    ANY TAX LIENS OR BANKRUPTCY WITHIN THE LAST FIVE (5) YEARS? (If "YES", please specify)</td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000;">{{ $quote->q23
                    ?? 'N' }}</td>
            </tr>
            <tr>
                <td style="padding:4px 5px;"><span style="font-weight:bold;">24.</span> ANY UNDISPUTED AND UNPAID
                    WORKERS COMPENSATION PREMIUM DUE FROM YOU OR ANY COMMONLY MANAGED OR OWNED ENTERPRISES?<br><span
                        style="margin-left:18px;">IF YES, EXPLAIN INCLUDING ENTITY NAME(S) AND POLICY NUMBER(S).</span>
                </td>
                <td style="text-align:center; border-left:1px solid #000; vertical-align:top;">{{ $quote->q24 ?? 'N' }}
                </td>
            </tr>
        </table>

        <div
            style="font-size:8pt; font-weight:bold; border:1px solid #000; margin-top:5px; margin-bottom:0;">
            SIGNATURE</div>

        <div
            style="font-size:8pt; text-align:justify; line-height:1.02; padding:5px 5px 0px 5px; border:1px solid #000; border-top:none;">
            <p style="margin-bottom:4px; font-size:6pt;">Copy of the Notice of Information Practices (Privacy) has been given to the
                applicant. (Not required in all states, contact your agent or broker for your state's requirements.)</p>
            <p style="margin-bottom:4px; border-top: 1px solid #000;">PERSONAL INFORMATION ABOUT YOU, INCLUDING INFORMATION FROM A CREDIT OR OTHER
                INVESTIGATIVE REPORT, MAY BE COLLECTED FROM PERSONS OTHER THAN YOU IN CONNECTION WITH THIS APPLICATION
                FOR INSURANCE AND SUBSEQUENT AMENDMENTS AND RENEWALS. SUCH INFORMATION AS WELL AS OTHER PERSONAL AND
                PRIVILEGED INFORMATION COLLECTED BY US OR OUR AGENTS MAY IN CERTAIN CIRCUMSTANCES BE DISCLOSED TO THIRD
                PARTIES WITHOUT YOUR AUTHORIZATION. CREDIT SCORING INFORMATION MAY BE USED TO HELP DETERMINE EITHER YOUR
                ELIGIBILITY FOR INSURANCE OR THE PREMIUM YOU WILL BE CHARGED. WE MAY USE A THIRD PARTY IN CONNECTION
                WITH THE DEVELOPMENT OF YOUR SCORE. YOU MAY HAVE THE RIGHT TO REVIEW YOUR PERSONAL INFORMATION IN OUR
                FILES AND REQUEST CORRECTION OF ANY INACCURACIES. YOU MAY ALSO HAVE THE RIGHT TO REQUEST IN WRITING THAT
                WE CONSIDER EXTRAORDINARY LIFE CIRCUMSTANCES IN CONNECTION WITH THE DEVELOPMENT OF YOUR CREDIT SCORE.
                THESE RIGHTS MAY BE LIMITED IN SOME STATES. PLEASE CONTACT YOUR AGENT OR BROKER TO LEARN HOW THESE
                RIGHTS MAY APPLY IN YOUR STATE OR FOR INSTRUCTIONS ON HOW TO SUBMIT A REQUEST TO US FOR A MORE DETAILED
                DESCRIPTION OF YOUR RIGHTS AND OUR PRACTICES REGARDING PERSONAL INFORMATION.</p>
            <p style="margin-bottom:4px;">(Not applicable in AZ, CA, DE, KS, MA, MN, ND, NY, OR, VA, or WV. Specific
                ACORD 38s are available for applicants in these states.)</p>
            <p style="text-align:right; margin-bottom:4px; font-weight: bold;">(Applicant's Initials): __________</p>
            <p style="margin-bottom:4px; border-top: 1px solid #000;">Any person who knowingly and with intent to defraud any insurance company or
                other person files an application for insurance containing any materially false information or conceals,
                for the purpose of misleading, information concerning any fact material thereto commits a fraudulent
                insurance act, which is a crime and subjects that person to criminal and civil penalties (In Oregon, the
                aforementioned actions may constitute a fraudulent insurance act which may be a crime and may subject
                the person to penalties). (In New York, the civil penalty is not to exceed five thousand dollars
                ($5,000) and the stated value of the claim for each such violation). <strong>
                    (Not applicable in AL, AR, AZ, CO,
                    DC, FL, KS, LA, ME, MD, MN, NM, OK, PR, RI, TN, VA, VT, WA and WV).
                </strong></p>
            <p style="margin-bottom:4px;"><strong>Applicable in AL, AR, AZ, DC, LA, MD, NM, RI and WV:</strong>erson who knowingly
                (or willfully in MD) presents a false or fraudulent claim for payment of a loss or benefit or who
                knowingly (or willfully in MD) presents false information in an application for insurance is guilty of a
                crime and may be subject to fines or confinement in prison.</p>
            <p style="margin-bottom:4px;"><strong>Applicable in Colorado:</strong> It is unlawful to knowingly provide false, incomplete,
                or misleading facts or information to an insurance company for the purpose of defrauding or attempting
                to defraud the company. Penalties may include imprisonment, fines, denial of insurance and civil
                damages. Any insurance company or agent of an insurance company who knowingly provides false,
                incomplete, or misleading facts or information to a policyholder or claimant for the purpose of
                defrauding or attempting to defraud the policyholder or claimant with regard to a settlement or award
                payable from insurance proceeds shall be reported to the Colorado Division of Insurance within the
                department of regulatory agencies.</p>
            <p style="margin-bottom:4px;"><strong>Applicable in Florida and Oklahoma:</strong> Any person who knowingly and with intent
                to injure, defraud, or deceive any insurer files a statement of claim or an application containing any
                false, incomplete, or misleading information is guilty of a felony (In FL, a person is guilty of a
                felony of the third degree).</p>
            <p style="margin-bottom:4px;"><strong>Applicable in Kansas:</strong> Any person who, knowingly and with intent to defraud,
                presents, causes to be presented or prepares with knowledge or belief that it will be presented to or by
                an insurer, purported insurer, broker or any agent thereof, any written statement as part of, or in
                support of, an application for the issuance of, or the rating of an insurance policy for personal or
                commercial insurance, or a claim for payment or other benefit pursuant to an insurance policy for
                commercial or personal insurance which such person knows to contain materially false information
                concerning any fact material thereto; or conceals, for the purpose of misleading, information concerning
                any fact material thereto commits a fraudulent insurance act.</p>
            <p style="margin-bottom:4px;"><strong>Applicable in Maine, Tennessee, Virginia and Washington:</strong> It is a crime to
                knowingly provide false, incomplete or misleading information to an insurance company for the purpose of
                defrauding the company. Penalties may include imprisonment, fines or a denial of insurance benefits.</p>
            <p style="margin-bottom:4px;"><strong>Applicable in Puerto Rico:</strong> Any person who knowingly and with the intention of
                defrauding presents false information in an insurance application, or presents, helps, or causes the
                presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than
                one claim for the same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned
                for each violation by a fine of not less than five thousand dollars ($5,000) and not more than ten
                thousand dollars ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties.
                Should aggravating circumstances be present, the penalty thus established may be increased to a maximum
                of five (5) years, if extenuating circumstances are present, it may be reduced to a minimum of two (2)
                years.</p>
            <p style="margin-bottom:4px;"><strong>Applicable in Utah:</strong> Any person who knowingly presents false or fraudulent
                underwriting information, files or causes to be filed a false or fraudulent claim for disability
                compensation or medical benefits, or submits a false or fraudulent report or billing for health care
                fees or other professional services is guilty of a crime and may be subject to fines and confinement in
                state prison.</p>
            <p style="margin-bottom:5px; border-top: 1px solid #000;">THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND
                REPRESENTS THAT REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION.
                HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.</p>
        </div>

        <table style="width:100%; font-size:8pt; font-weight:bold;">
            <tr>
                <td style="font-size:7pt; padding:2px 0 8px 5px; border:1px solid #000; vertical-align:top;">APPLICANT'S SIGNATURE (Must be Officer, Owner or Partner)<br><div style="margin-top:4px;">X</div></td>
                <td style="font-size:7pt; padding:2px 0 8px 5px; border:1px solid #000; vertical-align:top;">DATE</td>
                <td style="font-size:7pt; padding:2px 0 8px 5px; border:1px solid #000; vertical-align:top;">PRODUCER'S SIGNATURE</td>
                <td style="font-size:7pt; padding:2px 0 8px 5px; border:1px solid #000; vertical-align:top;">NATIONAL PRODUCER NUMBER</td>
            </tr>
        </table>

      <div class="acord-footer">
        <div class="acord-footer-left">ACORD 130 (2013/01)</div>
        <div class="acord-footer-center">Page 4 of 4</div>
      </div>
    </div>

</body>

</html>