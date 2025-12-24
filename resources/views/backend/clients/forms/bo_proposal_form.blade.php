<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Business Owner Insurance Proposal</title>
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
      margin: 30px;
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
      bottom: 5px;
      right: 10px;
      font-size: 10pt;
    }
  
    /* ============ PAGE 1: COVER ============ */
    .cover-title {
      font-size: 26pt;
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
      width: 400px;
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
    }
  
    .date-cover {
      font-size: 15pt;
      font-style: italic;
      margin-top: 12px;
    }
  
    .broker-name-large {
      font-size: 22pt;
      font-weight: bold;
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
      margin-bottom: 1px;
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
      margin-bottom: 15px;
    }
  
    .disclaimer-text {
      font-size: 11pt;
      font-weight: bold;
      margin-bottom: 15px;
      line-height: 1.4;
    }
  
    .info-table {
      width: 100%;
      margin-bottom: 10px;
      margin-left: 150px;
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
      font-size: 8pt;
      font-weight: bold;
      padding: 3px 0;
      /* border-bottom: 1px solid #000; */
      margin-bottom: 3px;
    }
  
    .coverage-row {
      width: 100%;
      font-size: 8pt;
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
      font-size: 10pt;
    }
  
    .payment-row td {
      padding: 2px 8px;
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
  
    /* ============ PAGE 3: SERVICE FEE ============ */
    .agreement-text {
      font-size: 10pt;
      margin-bottom: 8px;
      text-align: justify;
    }
  
    .agreement-text-inline {
      font-size: 10pt;
      margin-bottom: 3px;
    }
  
    .services-indent {
      margin-left: 80px;
      font-size: 10pt;
      line-height: 1.5;
      margin-bottom: 10px;
    }
  
    .fee-row {
      width: 100%;
      font-size: 10pt;
    }
  
    .fee-row td:last-child {
      text-align: right;
      font-weight: bold;
    }
  
    /* ============ PAGE 4: CREDIT/ACH ============ */
    .auth-box {
      border: 1px solid #000;
      padding: 12px;
      font-size: 9pt;
      text-align: justify;
      margin: 15px 0;
      line-height: 1.4;
    }
  
    .auth-line {
      font-size: 10pt;
      margin: 10px 0;
    }
  
    .card-section {
      border: 1px solid #000;
      margin: 15px 0;
      width: 100%;
    }
  
    .card-header {
      font-size: 11pt;
      font-weight: bold;
      padding: 5px;
      text-align: center;
      border-bottom: 1px solid #000;
    }
  
    .card-body {
      padding: 8px 12px;
    }
  
    .card-field {
      font-size: 10pt;
      padding: 4px 0;
      border-bottom: 1px solid #ccc;
    }
  
    .card-field:last-child {
      border-bottom: none;
    }
  
    /* ============ PAGES 5-7: ACORD ============ */
    .acord-page {
      padding: 10px 0px;
      font-size: 9pt;
      min-height: 740px;
      position: relative;
    }
  
    .agency-header {
      text-align: center;
      font-weight: bold;
      margin-bottom: 4px;
      font-size: 8pt;
    }
  
    .agency-id-line {
      border-bottom: 1px solid #000;
      display: inline-block;
      min-width: 80px;
      text-align: center;
    }
  
    .applicable-block {
      margin-bottom: 12px;
      text-align: justify;
      font-size: 9pt;
      line-height: 1.35;
    }
  
    .applicable-title {
      font-weight: bold;
    }
  
    .undersigned-box {
      border-top: 1px solid #000;
      border-bottom: 1px solid #000;
      padding: 8px 0;
      font-size: 8pt;
      margin: 0px 0;
      line-height: 1.3;
    }
  
    .acord-table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #000;
    }
  
    .acord-table th {
      border: 1px solid #000;
      padding: 0px 6px;
      font-size: 8pt;
      font-weight: bold;
      text-align: left;
    }
  
    .acord-table td {
      border: 1px solid #000;
      padding: 8px 6px;
      font-size: 9pt;
      height: 28px;
    }
  
    .blank-notice {
      text-align: center;
      font-weight: bold;
      font-size: 13pt;
      margin: 80px 0;
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
  
    .mt-5 {
      margin-top: 5px;
    }
  
    .mt-10 {
      margin-top: 10px;
    }
  
    .mt-15 {
      margin-top: 15px;
    }
  
    .mt-20 {
      margin-top: 20px;
    }

    .mt-50 {
      margin-top: 50px;
    }
  
    .mb-5 {
      margin-bottom: 5px;
    }
  
    .mb-10 {
      margin-bottom: 10px;
    }
  
    .mb-15 {
      margin-bottom: 15px;
    }
  
    .mb-80 {
      margin-bottom: 80px;
    }

    .px-10 {
      padding-left: 10px!important;
      padding-right: 10px!important;
    }
  
    .px-100 {
      padding-left: 70px;
      padding-right: 70px;
    }

    .pt-2 {
      padding-bottom: 2px!important;
    }

    .pb-20 {
      padding-bottom: 20px!important;
    }

    .pb-120 {
      padding-bottom: 120px!important;
    }

    .pb-150 {
      padding-bottom: 150px!important;
    }
  
    .fs-8 {
      font-size: 8pt!important;
    }
    .last-page-text{
      font-size: 8pt;
    }
  </style>
</head>

<body>

  {{-- ============ PAGE 1: COVER PAGE ============ --}}
  <div class="page">
    <div class="page-border">
      <div class="text-center">
        <div class="cover-title">INSURANCE PROPOSAL</div>
        <div class="cover-subtitle">PROPUESTA DE SEGURO</div>

        <div class="lion-container">
          <img src="{{ public_path('backend/images/pdf-logo.png') }}" class="lion-logo" alt="Logo">
        </div>

        <div class="prepared-label">Prepared for:</div>
        <div class="client-name-cover">{{ $data['client_name'] ?? 'LUIS TUFINO' }}</div>

        <div class="company-name-cover">{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC' }}</div>

        <div class="date-cover">{{ $data['proposal_date'] ?? 'September 1, 2025' }}</div>

        <div class="broker-name-large">SRC INSURANCE BROKERAGE INC.</div>
        <div class="broker-type">Business Owners Quote</div>

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

  {{-- ============ PAGE 2: INSURANCE QUOTE ============ --}}
  <div class="page">
    <div class="page-border">
      <div class="text-center"><div class="header-company">SRC INSURANCE BROKERAGE INC.</div></div>
      <div class="header-address">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
      <div class="header-phone">718-438-0400</div>

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
          <td>{{ $data['quote_date'] ?? '9/1/2025' }}</td>
        </tr>
        <tr>
          <td class="info-label">Named Insured:</td>
          <td>{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC' }}</td>
        </tr>
        <tr>
          <td class="info-label">Address:</td>
          <td>{{ $data['address'] ?? '3908 5TH AVENUE' }}</td>
        </tr>
        <tr>
          <td class="info-label">City:</td>
          <td>{{ $data['city'] ?? 'BROOKLYN' }}</td>
        </tr>
        <tr>
          <td class="info-label">State:</td>
          <td>{{ $data['state'] ?? 'NY' }}</td>
        </tr>
        <tr>
          <td class="info-label">Zip Code</td>
          <td>{{ $data['zip_code'] ?? '11232' }}</td>
        </tr>
        <tr>
          <td class="info-label">Telephone:</td>
          <td>{{ $data['telephone'] ?? '718-435-3826' }}</td>
        </tr>
        <tr>
          <td class="info-label">Insurance Carrier:</td>
          <td>{{ $data['carrier'] ?? 'NEXT' }}</td>
        </tr>
      </table>
<div class="px-100">
  <div class="coverage-wrapper clearfix">
    <div class="coverage-left">
      <div class="coverage-header">COMMERCIAL PROPERTY COVERAGE</div>
      <table style="width: 100%;">
        <tr class="coverage-row">
          <td>Business Personal Property:</td>
          <td>${{ number_format($data['bpp'] ?? 100000, 2) }}</td>
        </tr>
        <tr class="coverage-row">
          <td>Building:</td>
          <td>{{ $data['building'] ?? 'NONE' }}</td>
        </tr>
        <tr class="coverage-row">
          <td>Deductible:</td>
          <td>{{ number_format($data['deductible'] ?? 1000) }}</td>
        </tr>
      </table>
  
      <div class="protection-header">POLICY PROTECTION</div>
      <table style="width: 100%;">
        <tr class="protection-row">
          <td>Professional Liability:</td>
          <td>{{ $data['professional_liability'] ?? 'NO' }}</td>
        </tr>
        <tr class="protection-row">
          <td>Liquor Liability:</td>
          <td>{{ $data['liquor_liability'] ?? 'NO' }}</td>
        </tr>
        <tr class="protection-row">
          <td>Business Interruption:</td>
          <td>{{ $data['business_interruption'] ?? 'YES' }}</td>
        </tr>
        <tr class="protection-row">
          <td>Theft:</td>
          <td>{{ $data['theft'] ?? 'YES' }}</td>
        </tr>
        <tr class="protection-row">
          <td>Flood/Water Damage:</td>
          <td>{{ $data['flood_water'] ?? 'NO' }}</td>
        </tr>
        <tr class="protection-row">
          <td>Vandalism:</td>
          <td>{{ $data['vandalism'] ?? 'YES' }}</td>
        </tr>
        <tr class="protection-row">
          <td>Fire/Wind:</td>
          <td>{{ $data['fire_wind'] ?? 'YES' }}</td>
        </tr>
      </table>
    </div>
    <div class="coverage-right">
      <div class="coverage-header">COMMERCIAL GENERAL LIABILITY</div>
      <table style="width: 100%;">
        <tr class="coverage-row">
          <td>General Aggregate:</td>
          <td>${{ number_format($data['general_aggregate'] ?? 2000000, 2) }}</td>
        </tr>
        <tr class="coverage-row">
          <td>Products & Completed Op.:</td>
          <td>${{ number_format($data['products_completed'] ?? 2000000, 2) }}</td>
        </tr>
        <tr class="coverage-row">
          <td>Each Occurrence:</td>
          <td>${{ number_format($data['each_occurrence'] ?? 1000000, 2) }}</td>
        </tr>
        <tr class="coverage-row">
          <td>Damage to Rented Premises:</td>
          <td>${{ number_format($data['rented_premises'] ?? 100000, 2) }}</td>
        </tr>
        <tr class="coverage-row">
          <td>Medical Expenses:</td>
          <td>${{ number_format($data['medical_expenses'] ?? 15000, 2) }}</td>
        </tr>
      </table>
    </div>
  </div>
</div>

<div class="payment-box">
  <div class="payment-header text-center">PAYMENT INFORMATION</div>
  <table style="width: 100%;">
    <tr class="payment-row">
      <td>Down Payment:</td>
      <td>${{ number_format($data['down_payment'] ?? 1196.18, 2) }}</td>
    </tr>
    <tr class="payment-row">
      <td>Monthly Payments:</td>
      <td>${{ number_format($data['monthly_payment'] ?? 273.09, 2) }}</td>
    </tr>
    <tr class="payment-row">
      <td># of Months:</td>
      <td>{{ $data['num_months'] ?? 10 }}</td>
    </tr>
    <tr class="payment-row">
      <td>Finance Charge:</td>
      <td>{{ $data['finance_charge'] ?? '-' }}</td>
    </tr>
    <tr class="payment-row">
      <td><strong>Total Policy Cost:</strong></td>
      <td><strong>${{ number_format($data['total_cost'] ?? 3927.00, 2) }}</strong></td>
    </tr>
    <tr>
      <td colspan="2" class="payment-note">Checks payable to: <strong>"SRC Insurance Brokerage Inc."</strong></td>
    </tr>
    <tr>
      <td colspan="2" style="height: 8px;"></td>
    </tr>
    <tr class="payment-row">
      <td>Amount Paid Today:</td>
      <td></td>
    </tr>
  </table>
</div>

      <div class="request-text">
        This is a request for insurance with the above stated coverages. Acceptance of these monies does not guarantee
        coverage. Full down payment must be recieved to request bind order. If paid by Check, allow 3 business days for
        check to clear.
      </div>

      <table style="width: 100%; margin-top: 15px;">
        <tr>
          <td style="width: 45%;">
            <div class="sig-line">{{ $data['client_name'] ?? 'LUIS TUFINO' }}</div>
            <div class="sig-label">Print Name</div>
          </td>
          <td style="width: 10%;"></td>
          <td style="width: 45%;">
            <div class="sig-line text-center">X</div>
            <div class="sig-label">Sign Name</div>
          </td>
        </tr>
      </table>

      <div class="page-number">2</div>
    </div>
  </div>

  {{-- ============ PAGE 3: SERVICE FEE AGREEMENT ============ --}}
  <div class="page">
    <div class="page-border">
      <div class="text-center"><div class="header-company">SRC INSURANCE BROKERAGE INC.</div></div>
      <div class="header-address">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
      <div class="header-phone">718-438-0400</div>

      <div class="text-center mb-15">
        <div class="quote-title-box">
          <span class="quote-title">Service Fee Agreement</span>
        </div>
      </div>

      <p class="agreement-text">
        A Service Fee charge can be made only if you (The Insured) agree to this fee in writing. A commission will be
        received BY SRC Insurance Brokerage Inc. from the purchase of insurance.
      </p>

      <p class="agreement-text">
        This agreement is made between <strong>SRC INSURANCE BROKERAGE INC.</strong> and
      </p>
      <p class="agreement-text text-center"><strong>{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC'
          }}</strong></p>

      <p class="agreement-text">
        On this <span style="margin-left: 60px;"><strong>{{ $data['agreement_date'] ?? 'September 1, 2025'
            }}</strong></span>
      </p>

      <p class="agreement-text">
        It is agreed that every policy period in return for SRC Insurance Brokerage Inc. following services:
      </p>

      <div class="services-indent">
        -Placement and Securing Insurance Policy<br>
        -Assistance with recommendations from inspection reports.<br>
        -Policy Delivery.<br>
        -Special services related to cancellations and notices.<br>
        -Claims Assistance
      </div>

      <p class="agreement-text mt-10">
        The insured will pay <strong>SRC INSURANCE BROKERAGE INC.</strong>
        <span class="fee-amount">${{ number_format($data['service_fee'] ?? 650.00, 2) }}</span>
      </p>

      <p class="agreement-text mt-15">
        Se puede cobrar una tarifa de servicio solo si usted (el asegurado) acepta esta tarifa por escrito. SRC
        Insurance Brokerage Inc. recibirá una comisión por la compra del seguro.
      </p>

      <p class="agreement-text">
        Este acuerdo se realiza entre <strong>SRC INSURANCE BROKERAGE INC.</strong> Y
      </p>
      <p class="agreement-text text-center"><strong>{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC'
          }}</strong></p>

      <p class="agreement-text">
        En la Fecha <span style="margin-left: 60px;"><strong>{{ $data['agreement_date_spanish'] ?? 'Sep 1, 2025'
            }}</strong></span>
      </p>

      <p class="agreement-text">
        Se acuerda que cada periodo de la poliza a cambio de los siguientes servicios de src insurance brokerage inc
      </p>

      <div class="services-indent">
        -Colocacion y obstencion de la poliza de seguro.<br>
        -Asistencia con las recomendaciones de los informes de inspeccion.<br>
        -Entrega de Polizas<br>
        -Servicios especiales relacionados con cancelaciones y avisos.<br>
        -Asistencia en reclamos
      </div>

      <p class="agreement-text mt-10">
        El asegurado pagara a <strong>SRC INSURANCE BROKERAGE INC.</strong>
        <span class="fee-amount">${{ number_format($data['service_fee'] ?? 650.00, 2) }}</span>
      </p>

      <div class="text-center mt-50 mb-80">
        <div style="border-bottom: 1px solid #000; width: 280px; margin: 0 auto; padding-top: 30px;">X</div>
        <div style="font-size: 9pt; margin-top: 5px;">
          <strong>{{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC' }}</strong><br>
          {{ $data['client_name'] ?? 'LUIS TUFINO' }}
        </div>
      </div>

      <div class="page-number">3</div>
    </div>
  </div>

  {{-- ============ PAGE 4: CREDIT/ACH AUTHORIZATION ============ --}}
  <div class="page">
    <div class="page-border">
      <div class="text-center"><div class="header-company">SRC INSURANCE BROKERAGE INC.</div></div>
      <div class="header-address">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
      <div class="header-phone"><span style="margin-right: 40px;">718-438-0400</span><span>INFO@SRCINSURANCE.COM</span></div>

      <div class="text-center mb-10">
        <div class="quote-title-box">
          <span class="quote-title">Credit/ACH Payment<br>Authorization</span>
        </div>
      </div>

      <div class="auth-box">
        It is agreed that you hereby authorize SRC INSURANCE BROKERAGE INC. to initiate an automatic debit to the
        financial account indicated (and authorize said financial institution to honor such debit) for any and all
        installments due under the SRC INSURANCE BROKERAGE INC. quote or account number listed above. It is further
        agreed that any additional fees, including but not limited to, late fees, non-sufficient funds fees and
        cancellation fee, will also be charged and debited from the indicated account should they accrue during the term
        of the policy. The debited installment amount is subject to change in the event of the financing of an
        additional premium or the crediting of an endorsement refund to the original Premium Finance Agreement, which
        has been processed to your existing account. You further understand, agree and affirm that: (1) the information
        you have provided above is correct and accurate; (2) you are authorized to enter into this agreement and are the
        signer on the above account; (3) funds will be available to cover the amount of the existing obligation on the
        payment due date or the business day prior to the due date should the due date fall on a weekend or holiday;(4)
        this authorization will remain in full force and effect until either (a) you request termination of this
        agreement by providing SRC INSURANCE BROKERAGE ING writen notice of the desire to terminate automatic ACH/Credit
        Card debit (15) days prior to desired termination date at the address or email below closed account. SRC
        INSURANCE BROKERAGE INC. reserves the right to remove this ACH/Credit Card Authorization at its sole discretion
        should an ACH/Credit Card be returned for any reason, but SRC INSURANCE BROKERAGE INC. reserves its right to
        reestablish future ACH/Credit Card debits based on this authorization unless this authorization has been
        terminated as outlined above.
      </div>

      <table style="width: 100%; font-size: 10pt;">
        <tr>
          <td>I, <strong>{{ $data['client_name'] ?? 'LUIS TUFINO' }}</strong></td>
          <td style="padding-left: 150px;">Authorize <strong>SRC INSURANCE BROKERAGE INC,</strong></td>
        </tr>
        <tr>
          <td>to charge my</td>
          <td style="padding-left: 150px;">FOR <span style="margin-left: 150px; margin-right:150px;">on</span> <span><strong>{{ $data['auth_date'] ?? '9/1/2025' }}</strong></span></td>
        </tr>
      </table>

      <div class="card-section">
        <div class="card-header">CREDIT CARD</div>
        <div class="card-body">
          <div class="card-field">Card Number #:</div>
          <div class="card-field">Expiration:</div>
          <div class="card-field">CVV:</div>
          <div class="card-field">Zip Code:</div>
        </div>
      </div>

      <div class="card-section">
        <div class="card-header">ACH</div>
        <div class="card-body">
          <div class="card-field">Routing #:</div>
          <div class="card-field">Account#:</div>
        </div>
      </div>

      <table style="width: 100%; margin-top: 25px;">
        <tr>
          <td style="width: 65%;">
            <div style="border-bottom: 1px solid #000; padding-bottom: 5px;">X</div>
            <div class="text-center" style="font-size: 9pt;">
              SIGNATURE<br>
              {{ $data['client_name'] ?? 'LUIS TUFINO' }}<br>
              {{ $data['company_name'] ?? 'DON PEPE TORTAS Y JUGOS INC' }}
            </div>
          </td>
          <td style="width: 5%;"></td>
          <td style="width: 30%;">
            <div style="border-bottom: 1px solid #000; padding-bottom: 5px;">&nbsp;</div>
            <div class="text-center" style="font-size: 9pt;">DATE</div>
            <div style="color: white">.<br>.</div>
          </td>
        </tr>
      </table>

      <div class="page-number">4</div>
    </div>
  </div>

  {{-- ============ PAGE 5: ACORD 125 ============ --}}
  <div class="page">
    <div class="agency-header" style="text-align: right;">
      AGENCY CUSTOMER ID: <span class="agency-id-line">{{ $data['agency_customer_id'] ?? '1209557' }}</span>
    </div>
    <div class="acord-page" style="min-height: 720px; position: relative; border: 1px solid #000;">

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in KY, OH and PA:</span> Any person who knowingly and with intent to
        defraud any insurance company or other person files an application for insurance or statement of claim
        containing any materially false information or conceals for the purpose of misleading, information concerning
        any fact material thereto commits a fraudulent insurance act, which is a crime and subjects such person to
        criminal and civil penalties.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in ME, TN, VA and WA:</span> It is a crime to knowingly provide false,
        incomplete or misleading information to an insurance company for the purpose of defrauding the company.
        Penalties (may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in NJ:</span> Any person who includes any false or misleading
        information on an application for an insurance policy is subject to criminal and civil penalties.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in OR:</span> Any person who knowingly and with intent to defraud or
        solicit another to defraud the insurer by submitting an application containing a false statement as to any
        material fact may be violating state law.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in PR:</span> Any person who knowingly and with the intention of
        defrauding presents false information in an insurance application, or presents, helps, or causes the
        presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than one
        claim for the same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each
        violation by a fine of not less than five thousand dollars ($5,000) and not more than ten thousand dollars
        ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties. Should aggravating
        circumstances be present, the penalty thus established may be increased to a maximum of five (5) years, if
        extenuating circumstances are present, it may be reduced to a minimum of two (2) years.
      </div>

      <div class="undersigned-box px-10">
        THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN
        MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE,
        CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
      </div>

      <table class="acord-table">
        <tr>
          <th style="width: 30%;" class="pb-20">PRODUCER'S SIGNATURE</th>
          <th style="width: 40%;" class="pb-20">PRODUCER'S NAME (Please Print)</th>
          <th style="width: 30%;" class="pb-20">STATE PRODUCER LICENSE NO<br><span style="font-weight: normal;">(Required in Florida)</span></th>
        </tr>
        {{-- <tr>
          <td style="height: 25px;"></td>
          <td></td>
          <td></td>
        </tr> --}}
      </table>

      <div class="applicable-block mt-10 px-10">
        <span class="applicable-title">Applicable in NY:</span> Any person who knowingly and with intent to defraud any
        insurance company or other person files an application for insurance or statement of claim containing any
        materially false information, or conceals for the purpose of misleading, information concerning any fact
        material thereto, commits a fraudulent insurance act, which is a crime, and shall also be subject to a civil
        penalty not to exceed five thousand dollars and the stated value of the claim for each such violation.
      </div>

      <table class="acord-table">
        <tr>
          <th style="width: 50%;" class="pb-20 pt-2">APPLICANT'S SIGNATURE<br><span style="height: 25px; color: red;">X</span></th>
          <th style="width: 20%;" class="pb-20">DATE</th>
          <th style="width: 30%;" class="pb-20">NATIONAL PRODUCER NUMBER</th>
        </tr>
        {{-- <tr>
          <td style="height: 25px; color: red;">X</td>
          <td></td>
          <td></td>
        </tr> --}}
      </table>

      <div class="blank-notice pb-150">
        THIS SECTION IS INTENTIONALLY LEFT BLANK
      </div>

      <div class="acord-footer">
        <div class="acord-footer-left">ACORD 125 (2024/11)</div>
        <div class="acord-footer-center">Page 5 of 5</div>
      </div>
    </div>
  </div>

  {{-- ============ PAGE 6: ACORD 126 ============ --}}
  <div class="page">
    <div class="acord-page" style="min-height: 720px; position: relative; border: 1px solid #000;">
      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in NJ:</span> Any person who includes any false or misleading
        information on an application for an insurance policy is subject to criminal and civil penalties.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in OR:</span> Any person who knowingly and with intent to defraud or
        solicit another to defraud the insurer by submitting an application containing a false statement as to any
        material fact may be violating state law.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in PR:</span> Any person who knowingly and with the intention of
        defrauding presents false information in an insurance application, or presents, helps, or causes the
        presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than one
        claim for the same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each
        violation by a fine of not less than five thousand dollars ($5,000) and not more than ten thousand dollars
        ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties. Should aggravating
        circumstances be present, the penalty thus established may be increased to a maximum of five (5) years, if
        extenuating circumstances are present, it may be reduced to a minimum of two (2) years.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in NY: Applicable to all claim forms for insurance and all
          applications for commercial insurance and accident and health insurance:</span> Any person who knowingly and
        with intent to defraud any insurance company or other person files an application for insurance or statement of
        claim containing any materially false information, or conceals for the purpose of misleading, information
        concerning any fact material thereto, commits a fraudulent insurance act, which is a crime, and shall also be
        subject to a civil penalty not to exceed five thousand dollars and the stated value of the claim for each such
        violation.
      </div>

      <div class="applicable-block px-10">
        <span class="applicable-title">Applicable in NY: Applicable to all applications and claim forms for automobile
          insurance:</span> Any person who knowingly and with intent to defraud any insurance company or other person
        files an application for commercial insurance or a statement of claim for any commercial or personal insurance
        benefits containing any materially false information, or conceals for the purpose of misleading, information
        concerning any fact material thereto, and any person who, in connection with such application or claim,
        knowingly makes or knowingly assists, abets, solicits or conspires with another to make a false report of the
        theft, destruction, damage or conversion of any motor vehicle to a law enforcement agency, the department of
        motor vehicles or an insurance company commits a fraudulent insurance act, which is a crime, and shall also be
        subject to a civil penalty not to exceed five thousand dollars and the value of the subject motor vehicle or
        stated claim for each violation.
      </div>

      <div class="undersigned-box px-10">
        THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN
        MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE,
        CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
      </div>

      <table class="acord-table">
        <tr>
          <th style="width: 30%;" class="pb-20">PRODUCER'S SIGNATURE</th>
          <th style="width: 40%;" class="pb-20">PRODUCER'S NAME (Please Print)</th>
          <th style="width: 30%;" class="pb-20">STATE PRODUCER LICENSE NO<br><span style="font-weight: normal;">(Required in Florida)</span></th>
        </tr>
        {{-- <tr>
          <td style="height: 25px;"></td>
          <td></td>
          <td></td>
        </tr> --}}
      </table>

      <table class="acord-table">
        <tr>
          <th style="width: 50%;" class="pb-20 pt-2">APPLICANT'S SIGNATURE<br><span style="height: 25px; color: red;">X</span></th>
          <th style="width: 20%;" class="pb-20">DATE</th>
          <th style="width: 30%;" class="pb-20">NATIONAL PRODUCER NUMBER</th>
        </tr>
        {{-- <tr>
          <td style="height: 25px; color: red;">X</td>
          <td></td>
          <td></td>
        </tr> --}}
      </table>

      <div class="blank-notice pb-150">
        THIS SECTION IS INTENTIONALLY LEFT BLANK
      </div>

      <div class="acord-footer">
        <div class="acord-footer-left">ACORD 126 (2025/03)</div>
        <div class="acord-footer-center">Page 5 of 5</div>
      </div>
    </div>
  </div>

  {{-- ============ PAGE 7: ACORD 140 ============ --}}
  <div class="page">
    <table style="width: 100%; margin-bottom: 5px; font-size: 8pt;">
      <tr>
        <td style="width: 50%;"><strong>SIGNATURE</strong></td>
        <td style="width: 50%; text-align: right;"><strong>AGENCY CUSTOMER ID:</strong> <span
            style="border-bottom: 1px solid #000; display: inline-block; min-width: 150px;"></span></td>
      </tr>
    </table>
    <div class="acord-page" style="min-height: 720px; position: relative; border: 1px solid #000; padding-bottom: 0px;">

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in AL, AR, DC, LA, MD, NM, RI and WV</span><br>
        Any person who knowingly (or willfully)* presents a false or fraudulent claim for payment of a loss or benefit
        or knowingly (or willfully)* presents false information in an application for insurance is guilty of a crime and
        may be subject to fines and confinement in prison. *Applies in MD Only.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in CO</span><br>
        It is unlawful to knowingly provide false, incomplete, or misleading facts or information to an insurance
        company for the purpose of defrauding or attempting to defraud the company. Penalties may include imprisonment,
        fines, denial of insurance and civil damages. Any insurance company or agent of an insurance company who
        knowingly provides false, incomplete, or misleading facts or information to a policyholder or claimant for the
        purpose of defrauding or attempting to defraud the policyholder or claimant with regard to a settlement or award
        payable from insurance proceeds shall be reported to the Colorado Division of Insurance within the Department of
        Regulatory Agencies.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in FL and OK</span><br>
        Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a statement of claim
        or an application containing any false, incomplete, or misleading information is guilty of a felony (of the
        third degree)*. *Applies in FL Only.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in KS</span><br>
        Any person who, knowingly and with intent to defraud, presents, causes to be presented or prepares with
        knowledge or belief that it will be presented to or by an insurer, purported insurer, broker or any agent
        thereof, any written statement as part of, or in support of, an application for the issuance of, or the rating
        of an insurance policy for personal or commercial insurance, or a claim for payment or other benefit pursuant to
        an insurance policy for commercial or personal insurance which such person knows to contain materially false
        information concerning any fact material thereto; or conceals, for the purpose of misleading, information
        concerning any fact material thereto commits a fraudulent insurance act.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in KY, NY, OH and PA</span><br>
        Any person who knowingly and with intent to defraud any insurance company or other person files an application
        for insurance or statement of claim containing any materially false information or conceals for the purpose of
        misleading, information concerning any fact material thereto commits a fraudulent insurance act, which is a
        crime and subjects such person to criminal and civil penalties* (not to exceed five thousand dollars and the
        stated value of the claim for each such violation)*. *Applies in NY Only.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in ME, TN, VA and WA</span><br>
        It is a crime to knowingly provide false, incomplete or misleading information to an insurance company for the
        purpose of defrauding the company. Penalties (may)* include imprisonment, fines and denial of insurance
        benefits. *Applies in ME Only.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in NJ</span><br>
        Any person who includes any false or misleading information on an application for an insurance policy is subject
        to criminal and civil penalties.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in OR</span><br>
        Any person who knowingly and with intent to defraud or solicit another to defraud the insurer by submitting an
        application containing a false statement as to any material fact may be violating state law.
      </div>

      <div class="applicable-block last-page-text px-10">
        <span class="applicable-title">Applicable in PR</span><br>
        Any person who knowingly and with the intention of defrauding presents false information in an insurance
        application, or presents, helps, or causes the presentation of a fraudulent claim for the payment of a loss or
        any other benefit, or presents more than one claim for the same damage or loss, shall incur a felony and, upon
        conviction, shall be sanctioned for each violation by a fine of not less than five thousand dollars ($5,000) and
        not more than ten thousand dollars ($10,000), or a fixed term of imprisonment for three (3) years, or both
        penalties. Should aggravating circumstances [be] present, the penalty thus established may be increased to a
        maximum of five (5) years, if extenuating circumstances are present, it may be reduced to a minimum of two (2)
        years.
      </div>

      <div class="undersigned-box px-10" style="margin-top: 130px;">
        THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN
        MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE,
        CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
      </div>

      <table class="acord-table">
        <tr>
          <th style="width: 30%;" class="pb-20">PRODUCER'S SIGNATURE</th>
          <th style="width: 40%;" class="pb-20">PRODUCER'S NAME (Please Print)</th>
          <th style="width: 30%;" class="pb-20">STATE PRODUCER LICENSE NO<br><span style="font-weight: normal;">(Required in Florida)</span></th>
        </tr>
        {{-- <tr>
          <td style="height: 25px;"></td>
          <td></td>
          <td></td>
        </tr> --}}
      </table>

      <table class="acord-table">
        <tr>
          <th style="width: 50%;" class="pb-20 pt-2">APPLICANT'S SIGNATURE<br><span style="height: 25px; color: red;">X</span></th>
          <th style="width: 20%;" class="pb-20">DATE</th>
          <th style="width: 30%;" class="pb-20">NATIONAL PRODUCER NUMBER</th>
        </tr>
        {{-- <tr>
          <td style="height: 25px; color: red;">X</td>
          <td></td>
          <td></td>
        </tr> --}}
      </table>

      <div class="acord-footer">
        <div class="acord-footer-left">ACORD 140 (2016/03)</div>
        <div class="acord-footer-center">Page 3 of 3</div>
      </div>
    </div>
  </div>

</body>

</html>