<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ACORD 126 - Commercial Insurance Application</title>
  <style>
    @page {
      margin: 12px 15px 8px 15px;
      size: letter;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 7.5pt;
      line-height: 1.15;
      color: #000;
      padding: 30px 20px;
    }

    .page {
      page-break-after: always;
      position: relative;
      width: 100%;
      padding: 0;
    }

    .page:last-child {
      page-break-after: avoid;
    }

    /* Header styles */
    .header-row {
      width: 100%;
      border-collapse: collapse;
    }

    .acord-logo {
      font-size: 14pt;
      font-weight: bold;
      letter-spacing: 3px;
      vertical-align: middle;
      padding: 2px 5px;
    }

    .form-title {
      font-size: 11pt;
      font-weight: bold;
      text-align: center;
      vertical-align: middle;
    }

    .section-title {
      font-size: 8pt;
      font-weight: bold;
      text-align: center;
      /* background-color: #d9d9d9; */
      padding: 2px 5px;
      border: 1px solid #000;
    }

    .date-header {
      font-size: 7pt;
      text-align: center;
      border: 1px solid #000;
      padding: 2px;
    }

    .date-value {
      font-size: 8pt;
      text-align: center;
      border: 1px solid #000;
      border-top: none;
      padding: 3px;
      font-weight: bold;
    }

    /* Main table structure */
    .main-table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #000;
    }

    .main-table td,
    .main-table th {
      border: 1px solid #000;
      padding: 2px 4px;
      vertical-align: top;
      font-size: 7.5pt;
    }

    .label {
      font-size: 6.5pt;
      color: #000;
    }

    .label-bold {
      font-size: 6.5pt;
      font-weight: bold;
      color: #000;
    }

    .value {
      font-size: 8pt;
    }

    .value-bold {
      font-size: 8pt;
      font-weight: bold;
    }

    .section-header {
      /* background-color: #d9d9d9; */
      font-weight: bold;
      font-size: 7.5pt;
      padding: 2px 4px;
      border: 1px solid #000;
    }

    .section-header-dark {
      /* background-color: #808080; */
      color: #fff;
      font-weight: bold;
      font-size: 7.5pt;
      padding: 2px 4px;
    }

    /* Checkbox styles */
    .checkbox {
      display: inline-block;
      width: 15px;
      height: 15px;
      border: 1px solid #000;
      margin-right: 2px;
      vertical-align: middle;
      text-align: center;
      font-size: 7pt;
      line-height: 7px;
    }

    .checkbox-checked {
      display: inline-block;
      width: 15px;
      height: 15px;
      border: 1px solid #000;
      margin-right: 2px;
      vertical-align: middle;
      text-align: center;
      font-size: 7pt;
      line-height: 7px;
    }

    /* Checkbox styles */
    .small-checkbox {
      display: inline-block;
      width: 8px;
      height: 8px;
      border: 1px solid #000;
      margin-right: 2px;
      vertical-align: middle;
      text-align: center;
      font-size: 7pt;
      line-height: 7px;
    }

    .small-checkbox-checked {
      display: inline-block;
      width: 8px;
      height: 8px;
      border: 1px solid #000;
      margin-right: 2px;
      vertical-align: middle;
      text-align: center;
      font-size: 7pt;
      line-height: 7px;
    }

    .checkbox-checked::after, .small-checkbox-checked::after {
      content: "✓";
    }

    /* Radio button styles */
    .radio {
      display: inline-block;
      width: 9px;
      height: 9px;
      border: 1px solid #000;
      border-radius: 50%;
      margin-right: 2px;
      vertical-align: middle;
    }

    .radio-checked {
      display: inline-block;
      width: 9px;
      height: 9px;
      border: 1px solid #000;
      border-radius: 50%;
      margin-right: 2px;
      vertical-align: middle;
      background: radial-gradient(circle at center, #000 0%, #000 40%, transparent 40%);
    }

    /* Notice box */
    .notice-box {
      border: 2px solid #000;
      padding: 5px 8px;
      margin: 5px 0;
      font-size: 8pt;
      text-align: center;
      font-weight: bold;
    }

    /* Lines of business table */
    .lob-table {
      width: 100%;
      border-collapse: collapse;
    }

    .lob-table td {
      border: 1px solid #000;
      padding: 1px 3px;
      font-size: 7pt;
      height: 14px;
    }

    .lob-header {
      /* background-color: #d9d9d9; */
      font-weight: bold;
      font-size: 7pt;
    }

    /* Footer */
    .footer {
      font-size: 7pt;
      font-weight: bold;
      text-align: center;
      margin-top: 3px;
    }

    .footer-left {
      float: left;
      font-size: 7pt;
      font-weight: bold;
    }

    .footer-right {
      float: right;
      font-size: 7pt;
      font-weight: bold;
    }

    .page-info {
      text-align: center;
      font-size: 7pt;
      font-weight: bold;
    }

    .copyright {
      font-size: 6pt;
      font-weight: bold;
      text-align: center;
    }

    /* Agency ID */
    .agency-id {
      text-align: right;
      font-size: 10pt;
      padding: 2px;
    }

    /* Underline for values */
    .underline-value {
      border-bottom: 1px solid #000;
      min-width: 50px;
      display: inline-block;
    }

    /* Cell with no border */
    .no-border {
      border: none !important;
    }

    .border-top {
      border-top: 1px solid #000 !important;
    }

    .border-bottom {
      border-bottom: 1px solid #000 !important;
    }

    .border-left {
      border-left: 1px solid #000 !important;
    }

    .border-right {
      border-right: 1px solid #000 !important;
    }

    /* Text alignments */
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

    .bg-gray {
      background-color: #d9d9d9;
    }

    .bg-dark {
      background-color: #808080;
      color: #fff;
    }

    .v-top {
      vertical-align: top;
    }

    .v-middle {
      vertical-align: middle!important;
    }

    .v-bottom {
      vertical-align: bottom;
    }

    /* Small text */
    .small-text {
      font-size: 6pt;
    }

    .tiny-text {
      font-size: 5.5pt;
    }

    /* Signature line */
    .sig-line {
      border-bottom: 1px solid #000;
      height: 18px;
    }

    /* Premium field */
    .premium-field {
      /* width: 55px; */
      text-align: left;
    }

    /* Y/N column */
    .yn-col {
      width: 25px;
      text-align: center;
    }

    /* Question number */
    .q-num {
      width: 20px;
      text-align: right;
      padding-right: 3px;
      vertical-align: top;
    }

    /* Fraud warning text */
    .fraud-text {
      font-size: 9pt;
      text-align: justify;
      line-height: 1.2;
      margin-bottom: 4px;
    }

    .clearfix::after {
      content: "";
      display: table;
      clear: both;
    }
    .main-table td, .main-table th {
      padding: 1px 4px;
      margin: 0px;
    }
    .border-none {
      border: 0px !important;
    }
    .border-top-none {
      border-top: 0px !important;
    }
    .border-bottom-none {
      border-bottom: 0px !important;
    }
    .border-left-none {
      border-left: 0px !important;
    }
    .border-right-none {
      border-right: 0px !important;
    }
    .border-x-none {
      border-left: 0px !important;
      border-right: 0px !important;
    }
    .border-y-none {
      border-top: 0px !important;
      border-bottom: 0px !important;
    }
    .fs-7{
      font-size: 7px !important;
    }
    .fs-8{
      font-size: 8px !important;
    }
    .fs-9{
      font-size: 9px;
    }
    .fs-10{
      font-size: 10px;
    }
    .fs-11{
      font-size: 11px;
    }
    .fs-12{
      font-size: 12px;
    }
    .fs-13{
      font-size: 13px;
    }
    .fs-14{
      font-size: 14px;
    }
    .fs-15{
      font-size: 15px;
    }
    .fs-16{
      font-size: 16px;
    }
    .fs-17{
      font-size: 17px;
    }
    .fw-bold{
      font-weight: bold;
    }
  </style>
</head>

<body>

  {{-- ============ PAGE 1 ============ --}}
  <div class="page">
    {{-- Header --}}
    <table style="width: 100%;">
      <tr>
        <td style="text-align: right;">
          <div class="agency-id"><span class="fw-bold fs-12">AGENCY CUSTOMER ID: _________________________________</div>
        </td>
      </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 0;">
      <tr>
        <td style="width: 12%; border: none; padding: 0;">
          <div style="font-size: 16pt; letter-spacing: 4px; padding-top: 5px;">ACORD</div>
        </td>
        <td style="width: 73%; text-align: center; border: none; padding: 0;">
          <div style="font-size: 13pt; font-weight: bold;">COMMERCIAL GENERAL LIABILITY SECTION</div>
        </td>
        <td style="width: 15%; top; padding: 0; text-align:center;">
          <div class="date-header" style="font-size: 6pt; font-weight: bold; padding-bottom:2px;">DATE (MM/DD/YYYY)<br><div style="font-size: 9pt; padding-top: 6px;">{{ $data['date'] ?? '' }}</div></div>
        </td>
      </tr>
    </table>

    {{-- Producer / Carrier Section --}}
    <table class="main-table" style="margin-top: 0;">
      <tr>
        <td style="vertical-align: top; padding: 0;">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 50%; border: none; padding-left: 4px;" class="label-bold">AGENCY</td>
                    <td style="width: 40%; border: none; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">CARRIER</td>
                    <td style="width: 10%; border: none; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">NAIC CODE</td>
                  </tr>
                  <tr>
                    <td style="width: 50%; border: none; padding-left: 4px;"><div class="value" style="font-size: 13px;">SRC INSURANCE BROKERAGE INC.</div></td>
                    <td style="width: 40%; border: none; border-left: 1px solid #000; padding-left: 4px;"></td>
                    <td style="width: 10%; border: none; border-left: 1px solid #000; padding-left: 4px;"></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 37%; border: none; padding-left: 4px;" class="label-bold">POLICY NUMBER</td>
                    <td style="width: 13%; border: none; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">EFFECTIVE DATE</td>
                    <td style="width: 50%; border: none; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">APPLICANT/ FIRST NAMED INSURED</td>
                  </tr>
                  <tr>
                    <td style="width: 37%; border: none; padding-left: 4px;"></td>
                    <td style="width: 13%; border: none; border-left: 1px solid #000; padding-left: 4px;"><div class="value" style="font-size: 13px; text-align: center;">09/24/2025</div></td>
                    <td style="width: 50%; border: none; border-left: 1px solid #000; padding-left: 4px;"><div class="value" style="font-size: 13px;">ABC CORP</div></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td colspan="3" style="width: 37%; border: none; padding: 4px;" class="label-bold"><div class="fs-11">
                      IMPORTANT- If CLAIMS MADE is checked in the COVERAGE/ LIMITS section below, this is an application for a claims-made
                      policy.<br>Read all provisions of the policy carefully.
                    </div></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none" style="padding-top: 2px;">
        <td class="border-none" colspan="8">
          <span class="fw-bold fs-11">COVERAGES</span>
        </td>
        <td class="border-none" colspan="7">
          <span class="fw-bold fs-11">LIMITS</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;">&#10003;</td>
        <td style="padding-top: 2px;" colspan="7" class="border-bottom-none">
          <span class="label-bold">COMMERCIAL GENERAL LIABILITY</span>
        </td>
        <td style="padding-top: 2px;" colspan="5" class="border-x-none border-bottom-none">
          <span class="label-bold">GENERAL AGGREGATE</span>
        </td>
        <td style="padding-top: 2px; width: 13%" rowspan="3" class="border-x-none border-bottom-none">
          <span class="label fs-13"><span class="fs-10">$</span> 1,000,000</span>
        </td>
        <td style="padding-top: 2px; width: 18%;" class="v-middle text-center">
          <span class="label-bold">PREMIUMS</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px; " colspan="3" class="border-none">
          <span class="label">CLAIMS MADE</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;">&#10003;</td>
        <td style="padding-top: 2px;" colspan="2" class="border-none">
          <span class="label">OCCURRENCE</span>
        </td>
        <td style="padding-top: 2px; width: 13%;" rowspan="2" class="border-y-none border-right-none">
          <span class="label-bold">LIMIT APPLIES PER:</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;">&#10003;</td>
        <td style="padding-top: 2px; width: 7%;" class="border-none">
          <span class="label">POLICY</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px; width: 6%;" class="border-none">
          <span class="label">LOCATION</span>
        </td>
        <td style="padding-top: 2px;" rowspan="2">
          <span class="label-bold">PREMISES/OPERATIONS</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px; width: 30%;" colspan="7" class="border-none">
          <span class="label-bold">OWNER"S & CONTRACTOR'S PROTECTIVE</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px;" class="border-none">
          <span class="label">PROJECT</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px;" class="border-none">
          <span class="label">OTHER</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="font-family: DejaVu Sans, sans-serif;" colspan="7" class="border-top-none"></td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none">
          <span class="label-bold">PRODUCTS & COMPLETED OPERATIONS AGGREGATE</span>
        </td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span> 2,000,000</span>
        </td>
        <td style="padding-top: 2px;" rowspan="2">
          <span class="label-bold">PRODUCTS</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="padding-top: 2px;" colspan="8" class="border-bottom-none">
          <span class="label-bold">DEDUCTIBLES</span>
        </td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none">
          <span class="label-bold">PERSONAL & ADVERTISING INJURY</span>
        </td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span> 1,000,000</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px;" colspan="4" class="border-none">
          <span class="label">PROPERTY DAMAGE</span> <span class="label-bold" style="padding-left: 9px;">$</span>
        </td>
        <td style="padding-top: 2px;" colspan="3" class="border-none"></td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none">
          <span class="label-bold">EACH OCCURRENCE</span>
        </td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span> 1,000,000</span>
        </td>
        <td style="padding-top: 2px;" rowspan="2">
          <span class="label-bold">OTHER</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px;" colspan="4" class="border-none">
          <span class="label">BODILY INJURY</span> <span class="label-bold" style="padding-left: 31px;">$</span>
        </td>
        <td style="padding-top: 2px;" colspan="" class="border-none"></td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px; width: 8%;" class="border-none">
          <span class="label fs-7">PER CLAIM</span>
        </td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none">
          <span class="label-bold">DAMAGE TO RENTED PREMISES (each occurrence)</span>
        </td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span> 1,000,000</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px;" colspan="4" class="border-none">
          <span class="label-bold"></span> <span class="label-bold" style="padding-left: 100px;">$</span>
        </td>
        <td style="padding-top: 2px;" colspan="" class="border-none"></td>
        <td style="font-family: DejaVu Sans, sans-serif;"></td>
        <td style="padding-top: 2px;" class="border-none">
          <span class="label fs-7">PER OCCURRENCE</span>
        </td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none">
          <span class="label-bold">MEDICAL EXPENSE (Any one person)</span>
        </td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span> 5,000</span>
        </td>
        <td style="padding-top: 2px;" rowspan="2">
          <span class="label-bold">TOTAL</span>
        </td>
      </tr>
      <tr class="border-none">
        <td colspan="8" class="border-y-none"></td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none">
          <span class="label-bold">EMPLOYEE BENEFITS</span>
        </td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span></span>
        </td>
      </tr>
      <tr class="border-none">
        <td colspan="8" class="border-top-none"></td>
        <td style="padding-top: 2px;" colspan="5" class="border-right-none"></td>
        <td style="padding-top: 2px;" class="border-left-none">
          <span class="label fs-13"><span class="fs-10">$</span></span>
        </td>
        <td style="padding-top: 2px;"></td>
      </tr>
      <tr class="border-none">
        <td style="padding-top: 2px; padding-bottom: 30px;" colspan="15" class="border-bottom-none">
          <span class="label-bold">OTHER COVERAGES, RESTRICTIONS AND/OR ENDORSEMENTS (For hired/non-owned auto coverages attach the applicable state Business Auto Section, ACORD 137)</span>
        </td>
      </tr>
      <tr class="border-none">
        <td style="padding-top: 2px;" colspan="15" class="border-bottom-none">
          <span class="label-bold">APPLICABLE ONLY IN WISCONSIN: IF NON-OWNED ONLY AUTO COVERAGE IS TO BE PROVIDED UNDER THE POLICY:</span>
        </td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="padding-top: 2px; padding-bottom: 2px; width: 15%;" class="border-top-none">
          <span class="label-bold">1. UM/ UIM COVERAGE</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px; width: 4%;" class="border-top-none">
          <span class="label-bold">IS</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px; width: 17%;" class="border-top-none border-right-none">
          <span class="label-bold">IS NOT AVAILABLE.</span>
        </td>
        <td style="padding-top: 2px; width: 23%;" class="border-top-none border-left-none">
          <span class="label-bold">2. MEDICAL PAYMENTS COVERAGE</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px; width: 4%;" class="border-top-none">
          <span class="label-bold">IS</span>
        </td>
        <td style="font-family: DejaVu Sans, sans-serif; width: 2.5%;"></td>
        <td style="padding-top: 2px;" class="border-top-none">
          <span class="label-bold">IS NOT AVAILABLE.</span>
        </td>
      </tr>
    </table>

    <div class="label-bold" style="font-size: 11px;">SCHEDULE OF HAZARDS (ACORD 211 Schedule of Hazards may be attached if more space is reauired)</div>
    <table class="main-table">
      <tr>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">LOC#</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">HAZ#</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">CLASS CODE</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">PREMIUM BASIS</span></td>
        <td rowspan="2" class="text-center v-middle" style="width: 20%;"><span class="label-bold">EXPOSURE</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">TERR</span></td>
        <td colspan="2" class="text-center v-middle"><span class="label-bold">RATE</span></td>
        <td colspan="2" class="text-center v-middle"><span class="label-bold">PREMIUM</span></td>
      </tr>
      <tr>
        <td class="text-center v-middle" style="padding-top: 2px;"><span class="label-bold">PREM/OPS</span></td>
        <td class="text-center v-middle"><span class="label-bold">PRODUCTS</span></td>
        <td class="text-center v-middle" style="padding-top: 2px;"><span class="label-bold">PREM/OPS</span></td>
        <td class="text-center v-middle"><span class="label-bold">PRODUCTS</span></td>
      </tr>
      <tr>
        <td><span class="label fs-13">1</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td><span class="label fs-13">150,000</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="10" class="border-bottom-none"><span class="label-bold">CLASSIFICATION DESCRIPTION</span></td>
      </tr>
      <tr>
        <td colspan="10" class="border-top-none" style="padding-bottom: 20px;"><span class="label fs-14">SALES</span></td>
      </tr>
      <tr>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">LOC#</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">HAZ#</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">CLASS CODE</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">PREMIUM BASIS</span></td>
        <td rowspan="2" class="text-center v-middle" style="width: 20%;"><span class="label-bold">EXPOSURE</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">TERR</span></td>
        <td colspan="2" class="text-center v-middle"><span class="label-bold">RATE</span></td>
        <td colspan="2" class="text-center v-middle"><span class="label-bold">PREMIUM</span></td>
      </tr>
      <tr>
        <td class="text-center v-middle" style="padding-top: 2px;"><span class="label-bold">PREM/OPS</span></td>
        <td class="text-center v-middle"><span class="label-bold">PRODUCTS</span></td>
        <td class="text-center v-middle" style="padding-top: 2px;"><span class="label-bold">PREM/OPS</span></td>
        <td class="text-center v-middle"><span class="label-bold">PRODUCTS</span></td>
      </tr>
      <tr>
        <td style="padding-bottom: 20px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="10" class="border-bottom-none"><span class="label-bold">CLASSIFICATION DESCRIPTION</span></td>
      </tr>
      <tr>
        <td colspan="10" class="border-top-none" style="padding-bottom: 35px;"></td>
      </tr>
      <tr>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">LOC#</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">HAZ#</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">CLASS CODE</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">PREMIUM BASIS</span></td>
        <td rowspan="2" class="text-center v-middle" style="width: 20%;"><span class="label-bold">EXPOSURE</span></td>
        <td rowspan="2" class="text-center v-middle"><span class="label-bold">TERR</span></td>
        <td colspan="2" class="text-center v-middle"><span class="label-bold">RATE</span></td>
        <td colspan="2" class="text-center v-middle"><span class="label-bold">PREMIUM</span></td>
      </tr>
      <tr>
        <td class="text-center v-middle" style="padding-top: 2px;"><span class="label-bold">PREM/OPS</span></td>
        <td class="text-center v-middle"><span class="label-bold">PRODUCTS</span></td>
        <td class="text-center v-middle" style="padding-top: 2px;"><span class="label-bold">PREM/OPS</span></td>
        <td class="text-center v-middle"><span class="label-bold">PRODUCTS</span></td>
      </tr>
      <tr>
        <td style="padding-bottom: 15px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="10" class="border-bottom-none"><span class="label-bold">CLASSIFICATION DESCRIPTION</span></td>
      </tr>
      <tr>
        <td colspan="10" class="border-top-none" style="padding-bottom: 30px;"></td>
      </tr>
    </table>
    <table class="main-table border-top-none" style="margin-top: 0;">
      <tr>
        <td class="border-none"><span class="label-bold">RATING AND PREMIUM BASIS</span></td>
        <td class="border-none"><span class="label">(P) PAYROLL- PER $1 ,000/PAY</span></td>
        <td class="border-none"><span class="label">(C) TOTAL COST - PER $1 ,000/COST</span></td>
        <td class="border-none"><span class="label">(U) UNIT - PER UNIT</span></td>
      </tr>
      <tr>
        <td class="border-none" style="padding-bottom: 5px;"><span class="label">(S) GROSS SALES - PER $1 ,000/SALES</span></td>
        <td class="border-none" style="padding-bottom: 5px;"><span class="label">(A) AREA - PER 1,000/SQ FT</span></td>
        <td class="border-none" style="padding-bottom: 5px;"><span class="label">(M) ADMISSIONS - PER 1,000/ADM</span></td>
        <td class="border-none" style="padding-bottom: 5px;"><span class="label">(T) OTHER</span></td>
      </tr>
    </table>

    <div class="label-bold" style="font-size: 11px;">CLAIMS MADE (Explain all "Yes" responses)</div>

    <table class="main-table">
      <tr>
        <td><span class="label-bold">EXPLAIN ALL "YES" RESPONSES</span></td>
        <td class="label-bold" style="text-align: center;">Y/N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000;" colspan="2"><span class="">1. PROPOSED RETROACTIVE DATE:</span></td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000;" colspan="2"><span class="">2. ENTRY DATE INTO UNINTERRUPTED CLAIMS MADE COVERAGE:</span></td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="">3. HAS ANY PRODUCT, WORK, ACCIDENT, OR LOCATION BEEN EXCLUDED, UNINSURED OR SELF-INSURED FROM ANY PREVIOUS COVERAGE?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;"></td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="">4. WAS TAIL COVERAGE PURCHASED UNDER ANY PREVIOUS POLICY?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;"></td>
      </tr>
    </table>

    <div class="label-bold" style="font-size: 11px;">EMPLOYEE BENEFITS LIABILITY</div>

    <table class="main-table">
      <tr>
        <td style="width: 40%;"><span class="fs-10">1. DEDUCTIBLE PER CLAIM: $</span></td>
        <td><span class="fs-10">3. NUMBER OF EMPLOYEES COVERED BY EMPLOYEE BENEFITS PLANS:</span></td>
      </tr>
      <tr>
        <td><span class="fs-10">2. NUMBER OF EMPLOYEES:</span></td>
        <td><span class="fs-10">4. RETROACTIVE DATE:</span></td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 126 (2025/03)</div>
      <div class="page-info">Attach to ACORD 125</div>
      <div class="footer-right">© 1993-2025 ACORD CORPORATION. All rights reserved.</div>
    </div>
    <div class="copyright">The ACORD name and logo are registered marks of ACORD</div>
  </div>

  {{-- ============ PAGE 2 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td>
          <div><span class="value-bold">CONTRACTORS</span></span></div>
        </td>
        <td style="text-align: right;">
          <div class="agency-id"><span class="value-bold">AGENCY CUSTOMER ID: ___________________________________</div>
        </td>
      </tr>
    </table>

    <table class="main-table">
      <tr>
        <td colspan="4"><span class="label-bold">EXPLAIN ALL ''YES" RESPONSES (For all past or present operations)</span></td>
        <td class="label-bold" style="text-align: center;">Y/N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 35px;" colspan="4"><span class="label">1. DOES APPLICANT DRAW PLANS, DESIGNS, OR SPECIFICATIONS FOR OTHERS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 35px;" colspan="4"><span class="label">2. DO ANY OPERATIONS INCLUDE BLASTING OR UTILIZE OR STORE EXPLOSIVE MATERIAL?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 35px;" colspan="4"><span class="label">3. DO ANY OPERATIONS INCLUDE EXCAVATION, TUNNELING, UNDERGROUND WORK OR EARTH MOVING?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 35px;" colspan="4"><span class="label">4. DO YOUR SUBCONTRACTORS CARRY COVERAGES OR LIMITS LESS THAN YOURS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 35px;" colspan="4"><span class="label">5. ARE SUBCONTRACTORS ALLOWED TO WORK WITHOUT PROVIDING YOU WITH A CERTIFICATE OF INSURANCE?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 35px;" colspan="4"><span class="label">6. DOES APPLICANT LEASE EQUIPMENT TO OTHERS WITH OR WITHOUT OPERATORS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
    </table>
    <table class="main-table">
      <tr>
        <td style="" class="border-y-none"><span class="label-bold fs-8">DESCRIBE THE TYPE OF WORK SUBCONTRACTED</span></td>
        <td style="width: 20%; "><span class="label-bold fs-8">$ PAID TO SUB-<br>CONTRACTORS</span></td>
        <td style="width: 15%; "><span class="label-bold fs-8">% OF WORK<br>SUBCONTRACTED</span></td>
        <td style="width: 15%; "><span class="label-bold fs-8"># FULL-<br>TIME STAFF:</span></td>
        <td style="width: 15%; "><span class="label-bold fs-8"># PART-<br>TIME STAFF:</span></td>
      </tr>
      <tr>
        <td style="text-align: center; vertical-align: middle; padding-bottom: 30px;;" colspan="5" class="border-top-none"></td>
      </tr>
    </table>

    <div class="label-bold" style="font-size: 11px;">PRODUCTS/ COMPLETED OPERATIONS</div>

    <table class="main-table">
      <tr>
        <td style="width: 15%; text-align: center; vertical-align: middle;" class="label-bold fs-8">PRODUCTS</td>
        <td style="width: 15%; text-align: center; vertical-align: middle;" class="label-bold fs-8">ANNUAL GROSS SALES</td>
        <td style="width: 10%; text-align: center; vertical-align: middle;" class="label-bold fs-8">#OF UNITS</td>
        <td style="width: 5%; text-align: center; vertical-align: middle;" class="label-bold fs-8">TIME IN MARKET</td>
        <td style="width: 5%; text-align: center; vertical-align: middle;" class="label-bold fs-8">EXPECTED LIFE</td>
        <td style="width: 25%; text-align: center; vertical-align: middle;" class="label-bold fs-8">INTENDED USE</td>
        <td style="width: 25%; text-align: center; vertical-align: middle;" class="label-bold fs-8">PRINCIPAL COMPONENTS</td>
      </tr>
      <tr>
        <td style="padding-bottom: 30px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td style="padding-bottom: 30px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td style="padding-bottom: 30px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <table class="main-table">
      <tr>
        <td><span class="label-bold">EXPLAIN ALL ''YES" RESPONSES (For all past or present products or operations) PLEASE ATTACH LITERATURE, BROCHURES, LABELS, WARNINGS, ETC</span></td>
        <td class="label-bold" style="text-align: center;">Y/N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">1. DOES APPLICANT INSTALL, SERVICE OR DEMONSTRATE PRODUCTS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">2. FOREIGN PRODUCTS SOLD, DISTRIBUTED, USED AS COMPONENTS? (If ''YES", attach ACORD 815)</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">3. RESEARCH AND DEVELOPMENT CONDUCTED OR NEW PRODUCTS PLANNED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">4. GUARANTEES, WARRANTIES, HOLD HARMLESS AGREEMENTS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">5. PRODUCTS RELATED TO AIRCRAFT/SPACE INDUSTRY?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">6. PRODUCTS RECALLED, DISCONTINUED, CHANGED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">7. PRODUCTS OF OTHERS SOLD OR RE-PACKAGED UNDER APPLICANT LABEL?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">8. PRODUCTS UNDER LABEL OF OTHERS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">9. VENDORS COVERAGE REQUIRED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 33px;"><span class="label">10. DOES ANY NAMED INSURED SELL TO OTHER NAMED INSUREDS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 126 (2025/03)</div>
      <div class="page-info">Page 2 of 5</div>
    </div>
  </div>

  {{-- ============ PAGE 3 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td style="text-align: right;">
          <div class="agency-id"><span class="value-bold">AGENCY CUSTOMER ID: ___________________________________</div>
        </td>
      </tr>
    </table>
    <table class="main-table border-x-none border-top-none">
      <tr>
        <td style="width: 25%;" class="border-none">
          <div><span class="value-bold">ADDITIONAL INTEREST/ CERTIFICATE RECIPIENT</span></span></div>
        </td>
        <td style="width: 2%;"></td>
        <td style="width: 40%;" class="border-none">
          <span class="value-bold">ACORD 45 attached for additional names</span>
        </td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr>
        <td style="width: 10%; padding-top: 2px;" colspan="2" class="border-bottom-none"><span
            class="label-bold">INTEREST</span></td>
        <td style="border-left: 1px solid #000; width: 14%; padding-top: 2px;"
          class="border-bottom-none border-right-none"><span class="label-bold">NAME AND ADDRESS</span></td>
        <td style="border-left: 1px solid #000; width: 9%; padding-top: 2px;"
          class="border-bottom-none border-left-none"><span class="label-bold">RANK: _____</span></td>
        <td style="#000; width: 5%; padding-top: 2px;"><span class="label-bold">EVIDENCE:</span></td>
        <td style="width: 2.5%;"></td>
        <td style="#000; width: 5%; padding-top: 2px;"><span class="label-bold">CERTIFICATE</span></td>
        <td style="width: 10%;" class="border-none"></td>
        <td style="#000; width: 35%; padding-top: 2px;" colspan="2"><span class="label-bold">INTEREST IN ITEM NUMBER</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%; font-family: DejaVu Sans, sans-serif;">&#10003;</td>
        <td class="border-none"><span class="label-bold">ADDITIONAL INSURED</span></td>
        <td colspan="6" rowspan="6" class="border-y-none"><span class="label" style="font-size: 12px;">{{
            $quote['business_owner'] }} <br> {{ $quote['business_address'] }}<br> {{ $quote['city'] . ($quote['state'] ==
            'new-york' ? ' NY ' : ' NJ ') . $quote['zip_code'] }}</span></td>
        <td><span class="label-bold">LOCATION:</span></td>
        <td><span class="label-bold">BUILDING:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">EMPLOYEE AS LESSOR</span></td>
        <td><span class="label-bold">ITEM CLASS:</span></td>
        <td><span class="label-bold">ITEM:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LENDER'S LOSS PAYABLE</span></td>
        <td colspan="2" rowspan="2"><span class="label-bold">ITEM DESCRIPTION:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LIENHOLDER</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LOSS PAYEE</span></td>
        <td colspan="2" rowspan="3"><span class="label-bold"></span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold" style="font-size: 7.5px;">MORTGAGEE</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-top-none"><span class="label-bold"></span></td>
        <td colspan="3" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">REFERENCE/ LOAN #:</span></td>
        <td colspan="3" class="border-top-none"><span class="label-bold"></span></td>
      </tr>
    </table>


    {{-- General Information --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">GENERAL INFORMATION</div>
    <table class="main-table">
      <tr>
        <td colspan="2"><span class="label-bold">EXPLAIN ALL "YES" RESPONSES (For all past or present operations)</span></td>
        <td class="label-bold" style="text-align: center;">Y/N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">1.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">ANY MEDICAL FACILITIES PROVIDED OR MEDICAL PROFESSIONALS EMPLOYED OR CONTRACTED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">2.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">ANY EXPOSURE TO RADIOACTIVE/NUCLEAR MATERIALS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">3.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px; padding-bottom: 30px;"><span class="label">DO/HAVE PAST, PRESENT OR DISCONTINUED OPERATIONS INVOLVE(D) STORING, TREATING, DISCHARGING, APPL YING, DISPOSING, OR <br> TRANSPORTING OF HAZARDOUS MATERIAL? (e.g. landfills, wastes, fuel tanks, etc)</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">4.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 42px;"><span class="label">ANY OPERATIONS SOLD, ACQUIRED, OR DISCONTINUED IN LAST FIVE (5) YEARS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">5.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">DO YOU RENT OR LOAN EQUIPMENT TO OTHERS?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="padding-top: 2px; padding-bottom: 2px; width: 50%;"><span class="label-bold">EQUIPMENT</span></td>
              <td class="border-bottom-none v-middle text-center" style="padding-top: 2px; padding-bottom: 2px; " colspan="4"><span class="label-bold">TYPE OF EQUIPMENT</span></td>
              <td class="border-bottom-none v-middle text-center" style="padding-top: 2px; padding-bottom: 2px; width: 18%;"><span class="label-bold">INSTRUCTION GIVEN (Y/N)</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none v-middle text-center" style=""></td>
              <td class="border-bottom-none v-middle text-center" style="width: 2.5%;"></td>
              <td class="border-bottom-none v-middle text-center" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">SMALL TOOLS</span></td>
              <td class="border-bottom-none v-middle text-center" style="width: 2.5%;"></td>
              <td class="border-bottom-none v-middle text-center" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">LARGE EQUIPMENT</span></td>
              <td class="border-bottom-none v-middle text-center" style=""></td>
            </tr>
            <tr>
              <td class="border-bottom-none v-middle text-center" style=""></td>
              <td class="border-bottom-none v-middle text-center" style="width: 2.5%;"></td>
              <td class="border-bottom-none v-middle text-center" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">SMALL TOOLS</span></td>
              <td class="border-bottom-none v-middle text-center" style="width: 2.5%;"></td>
              <td class="border-bottom-none v-middle text-center" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">LARGE EQUIPMENT</span></td>
              <td class="border-bottom-none v-middle text-center" style=""></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">6.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">ANY WATERCRAFT, DOCKS, FLOATS OWNED, HIRED OR LEASED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">7.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">ANY PARKING FACILITIES OWNED/RENTED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">8.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">IS A FEE CHARGED FOR PARKING?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">9.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">RECREATION FACILITIES PROVIDED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">10.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-top: 2px; padding-bottom: 2px;"><span class="label">ARE THERE ANY LODGING OPERATIONS INCLUDING APARTMENTS? (If "YES", answer the following):</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none v-middle text-center" style="width: 10%; padding-top: 2px; padding-bottom: 2px;"><span class="label-bold"># APTS</span></td>
              <td class="border-bottom-none v-middle text-center" style="width: 15%; padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">TOTAL APT AREA</span></td>
              <td class="border-bottom-none" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">DESCRIBE OTHER LODGING OPERATIONS</span></td>
            </tr>
            <tr>
              <td class="border-y-none" ></td>
              <td class="border-y-none text-right label-bold fs-8" style="padding-top: 2px; padding-bottom: 2px;">Sq.Ft.</td>
              <td class="border-y-none"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">11.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 2px;"><span class="label">IS THERE A SWIMMING POOL ON PREMISES? (Check all that apply)</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none">
            <tr>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 13%;"><span class="label-bold">APPROVED FENCE</span></td>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 12%;"><span class="label-bold">LIMITED ACCESS</span></td>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 11%;"><span class="label-bold">DIVING BOARD</span></td>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 5%;"><span class="label-bold">SLIDE</span></td>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 12%;"><span class="label-bold">ABOVE GROUND</span></td>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 9%;"><span class="label-bold">IN GROUND</span></td>
              <td style="width: 2.8%; border-bottom: none;"></td>
              <td class="border-none" style="padding-top: 2px; padding-bottom: 2px; width: 11%;"><span class="label-bold">LIFE GUARD</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">12.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">ARE SOCIAL EVENTS SPONSORED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">13.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">ARE ATHLETIC TEAMS SPONSORED?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">TYPE OF SPORT</span></td>
              <td class="border-bottom-none text-center" style="width: 10%;"><span class="label-bold">CONTACT SPORT (Y/N)</span></td>
              <td class="border-bottom-none v-middle" style="width: ;" colspan="2"><span class="label-bold">AGE GROUP</span></td>
              <td class="border-bottom-none" style="width: 2.5%;"></td>
              <td class="border-bottom-none v-middle" style="width: ;"><span class="label-bold">13 - 18</span></td>
              <td class="border-none" style="width: 2%;"><span class="label-bold"></span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">TYPE OF SPORT</span></td>
              <td class="border-bottom-none text-center" style="width: 10%;"><span class="label-bold">CONTACT SPORT (Y/N)</span></td>
              <td class="border-bottom-none v-middle" style="width: ;" colspan="2"><span class="label-bold">AGE GROUP</span></td>
              <td class="border-bottom-none" style="width: 2.5%;"></td>
              <td class="border-bottom-none v-middle" style="width: ;"><span class="label-bold">13 - 18</span></td>
            </tr>
            <tr>
              <td class="border-y-none"></td>
              <td class="border-y-none"></td>
              <td class="border-bottom-none" style="width: 2.5%;"></td>
              <td class="border-y-none" style="width: 9%; padding-top: 4px; padding-bottom: 4px;"><span class="label">12 & UNDER</span></td>
              <td class="border-bottom-none" style="width: 2.5%;"></td>
              <td class="border-y-none" style="width: 9%; padding-top: 4px; padding-bottom: 4px;"><span class="label">OVER 18</span></td>
              <td class="border-none" style="width: 2%;"></td>
              <td class="border-y-none"></td>
              <td class="border-y-none"></td>
              <td class="border-bottom-none" style="width: 2.5%;"></td>
              <td class="border-y-none" style="width: 9%; padding-top: 4px; padding-bottom: 4px;"><span class="label">12 & UNDER</span></td>
              <td class="border-bottom-none" style="width: 2.5%;"></td>
              <td class="border-y-none" style="width: 9%; padding-top: 4px; padding-bottom: 4px;"><span class="label">OVER 18</span></td>
            </tr>
            <tr>
              <td colspan="6" class="border-bottom-none"><span class="label-bold">EXTENT OF SPONSORSHIP: </span></td>
              <td class="border-none" style="width: 2%;"></td>
              <td colspan="6" class="border-bottom-none"><span class="label-bold">EXTENT OF SPONSORSHIP: </span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">14.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 40px;"><span class="label">ANY STRUCTURAL ALTERATIONS CONTEMPLATED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">15.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 40px;"><span class="label">ANY DEMOLITION EXPOSURE CONTEMPLATED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
    </table>


    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 126 (2025/03)</div>
      <div class="page-info">Page 3 of 5</div>
    </div>
  </div>

  {{-- ============ PAGE 4 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td>
          <div><span class="value-bold">GENERAL INFORMATION (continued)</span></div>
        </td>
        <td style="text-align: right;">
          <div class="agency-id"><span class="label-bold">AGENCY CUSTOMER ID:</span> <span class="value-bold" style="text-decoration: underline;">{{ $data['agency_customer_id'] ?? '629318' }}</span></div>
        </td>
      </tr>
    </table>
    <table class="main-table">
      <tr>
        <td colspan="2"><span class="label-bold">EXPLAIN ALL "YES" RESPONSES (For all past or present operations)</span></td>
        <td class="label-bold" style="text-align: center;">Y/N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">16.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">HAS APPLICANT BEEN ACTIVE IN OR IS CURRENTLY ACTIVE IN JOINT VENTURES?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">17.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 2px;"><span class="label">DO YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;" rowspan="2">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none v-middle" style="width: 24%;"><span class="label-bold">LEASE TO</span></td>
              <td class="border-bottom-none v-middle text-center" style="width: 25%;"><span class="label-bold">WORKERS<br>COMPENSATION<br>COVERAGE CARRIED (Y/N)</span></td>
              <td class="border-none" style="width: 2%;"></td>
              <td class="border-bottom-none v-middle" style="width: 24%;"><span class="label-bold">LEASE FROM</span></td>
              <td class="border-bottom-none v-middle text-center" style="width: 25%;"><span class="label-bold">WORKERS<br>COMPENSATION<br>COVERAGE CARRIED (Y/N)</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 24%; padding-bottom: 13px;"></td>
              <td class="border-bottom-none" style="width: 25%;"></td>
              <td class="border-none" style="width: 2%;"></td>
              <td class="border-bottom-none" style="width: 24%; padding-bottom: 13px;"></td>
              <td class="border-bottom-none" style="width: 25%;"></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 24%; padding-bottom: 13px;"></td>
              <td class="border-bottom-none" style="width: 25%;"></td>
              <td class="border-none" style="width: 2%;"></td>
              <td class="border-bottom-none" style="width: 24%; padding-bottom: 13px;"></td>
              <td class="border-bottom-none" style="width: 25%;"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">18.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">IS THERE A LABOR INTERCHANGE WITH ANY OTHER BUSINESS OR SUBSIDIARIES?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">19.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">ARE DAY CARE FACILITIES OPERATED OR CONTROLLED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">20.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">HAVE ANY CRIMES OCCURRED OR BEEN ATTEMPTED ON YOUR PREMISES WITHIN THE LAST THREE (3) YEARS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">21.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">IS THERE A FORMAL, WRITTEN SAFETY AND SECURITY POLICY IN EFFECT?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">22.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 37px;"><span class="label">DOES THE BUSINESSES' PROMOTIONAL LITERATURE MAKE ANY REPRESENTATIONS ABOUT THE SAFETY OR SECURITY OF THE PREMISES?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
    </table>
    
    {{-- Additional Interest --}}
    <table class="main-table border-none">
      <tr>
        <td class="section-header border-none">REMARKS ACORD 101, Additional Remarks Schedule, may be attached if more space is required)</td>
      </tr>
      <tr>
        <td style="padding: 12px; border: 2px solid #000;"></td>
      </tr>
    </table>

    {{-- Signature Section --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">SIGNATURE</div>
    <table class="main-table">
      <tr>
        <td style="padding: 5px 4px; font-size: 6.5pt; text-align: justify; line-height: 1.2;" colspan="2" class="border-bottom-none">
          {{-- Fraud Warnings --}}
          <div style="margin-top: 3px;">
            <p class="fraud-text" style="margin-bottom: 7px;"><strong>Applicable in AL, AR, LA, MD, NM, RI and WV:</strong> Any person who knowingly (or
              willfully)* presents a false or fraudulent claim for payment of a loss or benefit or knowingly (or willfully)*
              presents false information in an application for insurance is guilty of a crime and may be subject to fines and
              confinement in prison. *Applies in MD Only.</p>
          
            <p class="fraud-text" style="margin-bottom: 10px;"><strong>Applicable in CA:</strong> For your protection, California law requires the
              following to appear on this form: Any person who knowingly presents false or fraudulent information to obtain or
              amend insurance coverage or to make a claim for the payment of a loss is guilty of a crime and may be subject to
              fines and confinement in state prison.</p>
          
            <p class="fraud-text" style="margin-bottom: 10px;"><strong>Applicable in CO:</strong> It is unlawful to knowingly provide false, incomplete, or
              misleading facts or information to an insurance company for the purpose of defrauding or attempting to defraud
              the company. Penalties may include imprisonment, fines, denial of insurance and civil damages. Any insurance
              company or agent of an insurance company who knowingly provides false, incomplete, or misleading facts or
              information to a policyholder or claimant for the purpose of defrauding or attempting to defraud the
              policyholder or claimant with regard to a settlement or award payable from insurance proceeds shall be reported
              to the Colorado Division of Insurance within the Department of Regulatory Agencies.</p>
          
            <p class="fraud-text" style="margin-bottom: 10px;"><strong>Applicable in DC:</strong> WARNING: It is a crime to provide false or misleading
              information to an insurer for the purpose of defrauding the insurer or any other person. Penalties include
              imprisonment and/or fines. In addition, an insurer may deny insurance benefits if false information materially
              related to a claim was provided by the applicant.</p>
          
            <p class="fraud-text" style="margin-bottom: 10px;"><strong>Applicable in FL and OK:</strong> Any person who knowingly and with intent to
              injure, defraud, or deceive any insurer files a statement of claim or an application containing any false,
              incomplete, or misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.</p>
              
            <p class="fraud-text" style="margin-bottom: 5px;"><strong>Applicable in KS:</strong> Any person who, knowingly and with intent to defraud,
              presents, causes to be presented or prepares with knowledge or belief that it will be presented to or by an
              insurer, purported insurer, broker or any agent thereof, any written, electronic, electronic impulse, facsimile,
              magnetic, oral, or telephonic communication or statement as part of, or in support of, an application for the
              issuance of, or the rating of an insurance policy for personal or commercial insurance, or a claim for payment
              or other benefit pursuant to an insurance policy for commercial or personal insurance which such person knows to
              contain materially false information concerning any fact material thereto; or conceals, for the purpose of
              misleading, information concerning any fact material thereto commits a fraudulent insurance act.</p>

            <p class="fraud-text" style="margin-bottom: 5px;"><strong>Applicable in KY, OH and PA:</strong> Any person who knowingly and with intent to
              defraud any insurance company or other person files an application for insurance or statement of claim
              containing any materially false information or conceals for the purpose of misleading, information concerning
              any fact material thereto commits a fraudulent insurance act, which is a crime and subjects such person to
              criminal and civil penalties.</p>

            <p class="fraud-text" style="margin-bottom: 5px;"><strong>Applicable in ME, TN, VA and WA:</strong> It is a crime to knowingly provide false,
              incomplete or misleading information to an insurance company for the purpose of defrauding the company.
              Penalties (may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.</p>
          </div>
        </td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 126 (2025/03)</div>
      <div class="page-info">Page 4 of 5</div>
    </div>
  </div>

  {{-- ============ PAGE 5 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td style="text-align: right;">
          <div class="agency-id"><span class="label-bold">AGENCY CUSTOMER ID:</span> <span class="value-bold" style="text-decoration: underline;">{{ $data['agency_customer_id'] ?? '629318' }}</span></div>
        </td>
      </tr>
    </table>
    {{-- Continued Fraud Warnings --}}
    <div class="acord-page" style="border: 1px solid #000; padding: 4px;">

      <p class="fraud-text" style="margin-bottom: 5px;"><strong>Applicable in NJ:</strong> Any person who includes any false or misleading
        information on an application for an insurance policy is subject to criminal and civil penalties.</p>

      <p class="fraud-text" style="margin-bottom: 5px;"><strong>Applicable in OR:</strong> Any person who knowingly and with intent to defraud or
        solicit another to defraud the insurer by submitting an application containing a false statement as to any
        material fact may be violating state law.</p>

      <p class="fraud-text" style="margin-bottom: 5px;"><strong>Applicable in PR:</strong> Any person who knowingly and with the intention of
        defrauding presents false information in an insurance application, or presents, helps, or causes the
        presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than one
        claim for the same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each
        violation by a fine of not less than five thousand dollars ($5,000) and not more than ten thousand dollars
        ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties. Should aggravating
        circumstances be present, the penalty thus established may be increased to a maximum of five (5) years, if
        extenuating circumstances are present, it may be reduced to a minimum of two (2) years.</p>

      <p class="fraud-text" style="margin-bottom: 10px;"><strong>Applicable in NY: Applicable to all claim forms for insurance and all applications
        for commercial insurance and accident and health insurance:</strong> Any person who knowingly and with intent
        to defraud any insurance company or other person files an application for insurance or statement of claim
        containing any materially false information, or conceals for the purpose of misleading, information concerning
        any fact material thereto, commits a fraudulent insurance act, which is a crime, and shall also be subject to a
        civil penalty not to exceed five thousand dollars and the stated value of the claim for each such violation.</p>

      <p class="fraud-text" style="margin-bottom: 10px;"><strong>Applicable in NY: Applicable to all applications and claim forms for automobile
          insurance:</strong> Any person who knowingly and with intent to defraud any insurance company or other person
        files an application for commercial insurance or a statement of claim for any commercial or personal insurance
        benefits containing any materially false information, or conceals for the purpose of misleading, information
        concerning any fact material thereto, and any person who, in connection with such application or claim,
        knowingly makes or knowingly assists, abets, solicits or conspires with another to make a false report of the
        theft, destruction, damage or conversion of any motor vehicle to a law enforcement agency, the department of
        motor vehicles or an insurance company commits a fraudulent insurance act, which is a crime, and shall also be
        subject to a civil penalty not to exceed five thousand dollars and the value of the subject motor vehicle or
        stated claim for each violation.</p>
    </div>

    {{-- Undersigned Statement --}}
    <div style="border: 1px solid #000; padding: 10px 6px; margin: 0px 0 8x 0; font-size: 7.5pt; text-align: justify;">
      THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN
      MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT
      AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
    </div>

    {{-- Producer Signature --}}
    <table class="main-table">
      <tr>
        <td style="width: 40%;" class="border-bottom-none"><span class="label-bold">PRODUCER'S SIGNATURE</span></td>
        <td style="width: 35%;" class="border-bottom-none"><span class="label-bold">PRODUCER'S NAME (Please Print)</span></td>
        <td style="width: 25%;" class="border-bottom-none"><span class="label-bold">STATE PRODUCER LICENSE NO<br>(Required in Florida)</span></td>
      </tr>
      <tr>
        <td style="height: 22px;" class="border-top-none"></td>
        <td class="value border-top-none" style="font-size: 13px;">{{ $data['producer_name_print'] ?? 'STEVEN CABRERA' }}</td>
        <td class="value border-top-none">{{ $data['producer_license'] ?? '' }}</td>
      </tr>
    </table>

    {{-- Applicant Signature --}}
    <table class="main-table">
      <tr>
        <td style="width: 60%; padding-bottom: 20px;"><span class="label-bold">APPLICANT'S SIGNATURE</span></td>
        <td style="width: 15%;"><span class="label-bold">DATE</span></td>
        <td style="width: 25%;"><span class="label-bold">NATIONAL PRODUCER NUMBER</span></td>
      </tr>
    </table>

    {{-- Blank Section --}}
    <div style="border: 1px solid #000; padding: 213px; text-align: center;">
      <span style="font-size: 10pt; font-weight: bold;">THIS SECTION IS INTENTIONALLY LEFT BLANK</span>
    </div>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 126 (2025/03)</div>
      <div class="page-info">Page 5 of 5</div>
    </div>
  </div>

</body>

</html>