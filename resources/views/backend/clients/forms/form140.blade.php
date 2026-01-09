<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ACORD 140 - Commercial Insurance Application</title>
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

    .date-header {
      font-size: 7pt;
      text-align: center;
      border: 1px solid #000;
      padding: 2px;
    }

    /* Main table structure */
    .main-table {
      width: 100%;
      border-collapse: collapse;
      /* border: 1px solid #000; */
    }

    .main-table td,
    .main-table th {
      border: 1px solid #000;
      padding: 1px 4px;
      margin: 0px;
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
      vertical-align: bottom!important;
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
      font-size: 8pt;
      text-align: justify;
      line-height: 1.2;
      margin-bottom: 4px;
    }

    .clearfix::after {
      content: "";
      display: table;
      clear: both;
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
    .fw-normal{
      font-weight: normal;
    }
    .py-2{
      padding-top: 2px;
      padding-bottom: 2px;
    }
    .px-2{
      padding-left: 2px!important;
      padding-right: 2px!important;
    }
    .py-4{
      padding-top: 4px!important;
      padding-bottom: 4px!important;
    }
    .px-4{
      padding-left: 4px;
      padding-right: 4px;
    }
    .pb-2{
      padding-bottom: 2px;
    }
    .pb-3{
      padding-bottom: 3px;
    }
    .pb-4{
      padding-bottom: 4px;
    }
    .pb-5{
      padding-bottom: 5px;
    }
    .pb-6{
      padding-bottom: 6px;
    }
    .pb-7{
      padding-bottom: 7px;
    }
    .pt-2{
      padding-top: 2px;
    }
    .pt-3{
      padding-top: 3px;
    }
    .pt-4{
      padding-top: 4px;
    }
    .pt-5{
      padding-top: 5px;
    }
    .pt-6{
      padding-top: 6px;
    }
    .pt-7{
      padding-top: 7px;
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
          <div style="font-size: 13pt; font-weight: bold;">PROPERTY SECTION</div>
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
                    <td style="width: 50%; border: none; border-left: 1px solid #000; padding-left: 4px;"><div class="value" style="font-size: 13px;">{{ $quote['business_name'] }}</div></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <div class="label-bold py-2 px-4" style="font-size: 11px;">BLANKET SUMMARY</div>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 6%;" class="v-middle text-center label-bold">BLKT #</td>
        <td style="width: 10%;" class="v-middle text-center label-bold">AMOUNT</td>
        <td style="width: 34%;" class="v-middle text-center label-bold">TYPE</td>
        <td style="width: 6%;" class="v-middle text-center label-bold">BLKT #</td>
        <td style="width: 10%;" class="v-middle text-center label-bold">AMOUNT</td>
        <td style="width: 34%;" class="v-middle text-center label-bold">TYPE</td>
      </tr>
      <tr>
        <td style="padding-bottom: 13px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td style="padding-bottom: 13px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 18%;" class="v-bottom text-center label-bold border-none" rowspan="2">PREMISES INFORMATION</td>
        <td style="width: 10%;" class="v-middle label-bold fs-8">PREMISES #: <span class="fs-12 fw-normal">1</span></td>
        <td class="v-middle label-bold fs-8">STREET ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp;<span class="fs-12 fw-normal">{{ $quote['business_address'] . ', ' . $quote['city'] . ', ' . ($quote['state'] == 'new-york' ? 'NY ' : 'NJ ') . $quote['zip_code'] }}</span></td>
      </tr>
      <tr>
        <td style="" class="v-middle label-bold fs-8">BUILDING#:</td>
        <td class="v-middle label-bold fs-8">BLDG DESCRIPTION:</td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 12%;" class="v-middle text-center label-bold fs-8">SUBJECT OF INSURANCE</td>
        <td style="width: 8%;" class="v-middle text-center label-bold fs-8">AMOUNT</td>
        <td style="width: 4.5%;" class="v-middle text-center label-bold fs-8">COINS %</td>
        <td style="width: 4%;" class="v-middle text-center label-bold fs-8">VALU-ATION</td>
        <td style="width: 10%;" class="v-middle text-center label-bold fs-8">CAUSES OF LOSS</td>
        <td style="width: 5%;" class="v-middle text-center label-bold fs-8">INFLATION GUARD %</td>
        <td style="width: 6%;" class="v-middle text-center label-bold fs-8">DED</td>
        <td style="width: 5%;" class="v-middle text-center label-bold fs-8">DED TYPE</td>
        <td style="width: 3%;" class="v-middle text-center label-bold fs-8">BLKT #</td>
        <td style="width: 17%;" class="v-middle text-center label-bold fs-8">FORMS AND CONDITIONS TO APPLY</td>
      </tr>
      <tr>
        <td><span class="fs-13">BPP<br>BUILDING</span></td>
        <td><span class="fs-13">50,000<br>60,000</span></td>
        <td></td>
        <td></td>
        <td><span class="fs-13">SPECIAL</span></td>
        <td></td>
        <td><span class="fs-13">1,000</span></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 8%;" class="v-middle label-bold fs-8 py-4">ADDITIONAL INFORMATION</td>
        <td style="width: 1.5%;"></td>
        <td style="width: 16%;" class="v-middle label-bold fs-8">BUSINESS INCOME/ EXTRA EXPENSE - Attach ACORD 810</td>
        <td style="width: 1.5%;"></td>
        <td style="width: 18%;" class="v-middle label-bold fs-8">VALUE REPORTING INFORMATION - Attach ACORD 811</td>
    </table>

    <table class="main-table border-none">
      <tr>
        <td colspan="8"><div class="label-bold pt-2" style="font-size: 11px;">ADDITIONAL COVERAGES, OPTIONS, RESTRICTIONS, ENDORSEMENTS AND RATING INFORMATION</div></td>
      </tr>
      <tr class="border-none">
        <td style="width: 8%;" class="v-middle text-center label-bold fs-8 border-bottom-none" rowspan="2">SPOILAGE COVERAGE (Y/N)</td>
        <td style="width: 40%;" class="label-bold fs-8" rowspan="4">DESCRIPTION OF PROPERTY COVERED</td>
        <td style="width: 15%;" class="v-middle label-bold fs-8 border-bottom-none">LIMIT</td>
        <td style="width: 10%;" class="v-middle text-center label-bold fs-8 border-bottom-none" rowspan="2">REFRIG MAINT AGREEMENT (Y/N)</td>
        <td style="width: 10%;" class="v-middle label-bold fs-8 border-bottom-none" colspan="4">OPTIONS</td>
      </tr>
      <tr>
        <td class="v-middle label border-top-none">$</td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 border-y-none" style="" colspan="3">BREAKDOWN OR CONTAMINATION</td>
      </tr>
      <tr>
        <td class="v-middle text-center border-top-none" style="" rowspan="2">
          <table style="width: 45%; margin-right: auto; margin-left: auto;"><tr><td style="padding-bottom: 15px;"></td></tr></table>
        </td>
        <td class="v-middle label-bold fs-8 border-bottom-none" style="">DEDUCTIBLE</td>
        <td class="v-middle text-center border-top-none" style="" rowspan="2">
          <table style="width: 35%; margin-right: auto; margin-left: auto;"><tr><td style="padding-bottom: 15px;"></td></tr></table>
        </td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 py-4 border-y-none" style="">POWER OUTAGE</td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 border-y-none" style="">SELLING PRICE</td>
      </tr>
      <tr>
        <td class="v-middle label border-top-none" style="">$</td>
        <td style="width: 2.5%;"></td>
        <td class="border-top-none" style="" colspan="3"></td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 40%;" class="v-middle label-bold fs-8 py-2 border-top-none">SINKHOLE COVERAGE (Required in Florida)</td>
        <td style="width: 2%;" class="border-top-none"></td>
        <td style="width: 15%;" class="label-bold fs-8 border-top-none">ACCEPT COVERAGE</td>
        <td style="width: 2%;" class="border-top-none"></td>
        <td style="width: 15%;" class="v-middle label-bold fs-8 border-x-none border-top-none">REJECT COVERAGE</td>
        <td style="width: 26%;" class="v-middle label-bold fs-8 border-left-none border-top-none">LIMIT: $</td>
      </tr>
      <tr class="border-none">
        <td style="width: 40%;" class="v-middle label-bold fs-8 py-2">MINE SUBSIDENCE COVERAGE (Required in IL, IN, KY and WV)</td>
        <td style="width: 2%;"></td>
        <td style="width: 15%;" class="label-bold fs-8">ACCEPT COVERAGE</td>
        <td style="width: 2%;"></td>
        <td style="width: 15%;" class="v-middle label-bold fs-8 border-x-none">REJECT COVERAGE</td>
        <td style="width: 26%;" class="v-middle label-bold fs-8 border-left-none">LIMIT: $</td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-top-none"></td>
        <td style="width: 49%;" class="label fs-8 py-4 border-y-none border-right-none">PROPERTY HAS BEEN DESIGNATED AN HISTORICAL LANDMARK</td>
        <td style="width: 45%;" class="label-bold fs-8 border-none text-right"># OF OPEN SIDES ON STRUCTURE: _____</td>
        <td style="width: 2.5%;" class="border-left-none border-y-none"></td>
      </tr>
      <tr class="border-none">
        <td style="padding-bottom: 30px;" colspan="4" class="border-y-none"></td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 20%;" class="label-bold fs-8" rowspan="3">CONSTRUCTION TYPE</td>
        <td style="width: %;" class="text-center label-bold fs-8 border-bottom-none" colspan="2">DISTANCE TO</td>
        <td style="width: 15%;" class="text-center label-bold fs-8" rowspan="3">FIRE DISTRICT</td>
        <td style="width: 9%;" class="text-center label-bold fs-8" rowspan="3">CODE NUMBER</td>
        <td style="width: 6%;" class="text-center label-bold fs-8" rowspan="3">PROT CL</td>
        <td style="width: 7%;" class="text-center label-bold fs-8" rowspan="3"># STORIES</td>
        <td style="width: 7%;" class="text-center label-bold fs-8" rowspan="3"># BASM'TS</td>
        <td style="width: 7%;" class="text-center label-bold fs-8" rowspan="3">YR BUILT</td>
        <td style="width: %;" class="label-bold fs-8" rowspan="3">TOTAL AREA</td>
      </tr>
      <tr class="border-none">
        <td style="width: 6.5%;" class="text-center label-bold fs-8 border-none">HYDRANT</td>
        <td style="width: 6.5%;" class="text-center label-bold fs-8 border-none">FIRE STAT</td>
      </tr>
      <tr class="border-none">
        <td class="border-top-none">
          <div><span class="">50</span><span class="fs-7 pt-4" style="float: right;">FT</span></div>
        </td>
        <td class="border-top-none">
          <div><span class="">1</span><span class="fs-7 pt-4" style="float: right;">Ml</span></div>
        </td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 27%;" class="label-bold fs-8 border-y-none" colspan="4">BUILDING IMPROVEMENTS</td>
        <td style="width: 8%;" class="text-center label-bold fs-8 border-y-none" rowspan="2">BLDG CODE GRADE</td>
        <td style="width: 8%;" class="text-center label-bold fs-8 border-y-none" rowspan="2">TAX CODE</td>
        <td style="width: 13%;" class="label-bold fs-8 border-y-none" rowspan="2">ROOF TYPE</td>
        <td style="width: 44%;" class="label-bold fs-8 border-y-none" rowspan="2">OTHER OCCUPANCIES</td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 py-4 border-y-none" style="width: 11%;">WIRING, YR:</td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 border-y-none" style="width: 11%;">PLUMBING, YR:</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr>
        <td style="width: 2.5%;" class="border-y-none"></td>
        <td class="v-middle label fs-8 py-4 border-y-none" style="width: 11%;">ROOFING, YR:</td>
        <td style="width: 2.5%;" class="border-top-none"></td>
        <td class="v-middle label fs-8 border-none" style="width: 11%;">HEATING, YR:</td>
        <td class="v-middle label-bold fs-8 border-bottom-none" style="width: 10%;" colspan="2">WIND CLASS</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-bottom label fs-8 border-bottom-none" style="width: 17%;">SEMI- RESISTIVE</td>
        <td style="width: 2.5%;" ></td>
        <td class="v-middle label fs-8 border-bottom-none border-right-none" style="width: 22.5%;">HEATING SOURCE INCL WOODBURNING<br>STOVE OR FIREPLACE INSERT</td>
        <td style="width: 2.5%;" class="border-x-none border-bottom-none"></td>
        <td class="v-middle label fs-8 border-bottom-none border-left-none" style="width: 16.5%;">DATE<br>INSTALLED: _______________</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-middle label fs-8 py-4 border-y-none border-right-none" style="width: 11%;">OTHER:</td>
        <td style="width: 2.5%;" class="border-none"></td>
        <td class="v-middle label fs-8 border-none text-center" style="width: 11%;">YR:</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-middle label fs-8 border-none" style="width: 7%;">RESISTIVE</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-bottom label fs-8 border-none" style="width: 17%;"></td>
        <td class="v-middle label fs-8 border-y-none " style="width: %;">MANUFACTURER:</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 50%;" class="label-bold fs-8 border-bottom-none" colspan="9">PRIMARY HEAT</td>
        <td style="width: 50%;" class="label-bold fs-8 border-bottom-none" colspan="9">SECONDARY HEAT</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">BOILER</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">SOLID FUEL</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 22.5%;" class="label fs-8 border-none" colspan="4"></td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">BOILER</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">SOLID FUEL</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 22.5%;" class="label fs-8 border-y-none border-left-none" colspan="4"></td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-y-none border-right-none"></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4" colspan="5">IF BOILER, IS INSURANCE PLACED ELSEWHERE?</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label-bold fs-8 border-none py-4" colspan="2">Y/N</td>
        <td style="width: 2.5%;" class="border-y-none border-right-none"></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4" colspan="5">IF BOILER, IS INSURANCE PLACED ELSEWHERE?</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label-bold fs-8 border-y-none border-left-none py-4" colspan="2">Y/N</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 25%; padding-bottom: 18px;" class="label-bold fs-8 border-bottom-none">RIGHT EXPOSURE & DISTANCE</td>
        <td style="width: 25%;" class="label-bold fs-8 border-bottom-none">LEFT EXPOSURE & DISTANCE</td>
        <td style="width: 25%;" class="label-bold fs-8 border-bottom-none">FRONT EXPOSURE & DISTANCE</td>
        <td style="width: 25%;" class="label-bold fs-8 border-bottom-none">REAR EXPOSURE & DISTANCE</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 30%;" class="label-bold fs-8 border-bottom-none" rowspan="2">BURGLAR ALARM TYPE</td>
        <td style="width: 30%;" class="label-bold fs-8 border-bottom-none" rowspan="2">CERTIFICATE #</td>
        <td style="width: 15%;" class="label-bold fs-8 border-bottom-none" rowspan="2">EXPIRATION DATE</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label fs-8 border-bottom-none border-x-none">CENTRAL<br>STATION</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-bottom-none border-left-none">LOCAL<br>GANG</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label fs-8 border-y-none border-left-none py-4" colspan="3">WITH KEYS</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 47%;" class="label-bold fs-8 border-bottom-none" rowspan="2">BURGLAR ALARM INSTALLED AND SERVICED BY</td>
        <td style="width: 20%;" class="label-bold fs-8 border-bottom-none" rowspan="2">EXTENT</td>
        <td style="width: 8%;" class="label-bold fs-8 border-bottom-none" rowspan="2">GRADE</td>
        <td style="width: 15%;" class="label-bold fs-8 border-bottom-none" rowspan="2">#GUARDS/ WATCHMEN</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label fs-8 border-bottom-none border-left-none py-4">CLOCK HOURLY</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%; color: white;" class="label fs-8 border-y-none border-left-none py-4">A</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 47%;" class="label-bold fs-8" rowspan="2">PREMISES FIRE PROTECTION (Sprinklers, Standpipes, CO2/ Chemical Systems)</td>
        <td style="width: 8%;" class="label-bold fs-8" rowspan="2">% SPRNK</td>
        <td style="width: 35%;" class="label-bold fs-8" rowspan="2">I FIRE ALARM MANUFACTURER</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-left-none py-4 border-bottom-none">CLOCK HOURLY</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-top-none border-left-none py-4">LOCAL GANG</td>
      </tr>
    </table>

    <table class="main-table border-x-none border-top-none">
      <tr>
        <td style="width: 10%;" class="border-none">
          <div><span class="value-bold">ADDITIONAL INTEREST</span></span></div>
        </td>
        <td style="width: 1%;"></td>
        <td style="width: 40%;" class="border-none">
          <span class="value-bold">ACORD 45 attached for additional names</span>
        </td>
      </tr>
    </table>
    <table class="main-table ">
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
        <td style="width: 10%;" class="border-x-none border-bottom-none"></td>
        <td style="#000; width: 35%; padding-top: 2px;" colspan="2"><span class="label-bold">INTEREST IN ITEM NUMBER</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%; font-family: DejaVu Sans, sans-serif;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LENDER'S LOSS PAYABLE</span></td>
        <td colspan="6" rowspan="3" class="border-y-none">
          {{-- <span class="label" style="font-size: 12px;">{{
            $quote['business_owner'] }} <br> {{ $quote['business_address'] }}<br> {{ $quote['city'] . ($quote['state'] ==
            'new-york' ? ' NY ' : ' NJ ') . $quote['zip_code'] }}</span> --}}
          </td>
        <td><span class="label-bold">LOCATION:</span></td>
        <td><span class="label-bold">BUILDING:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LOSS PAYEE</span></td>
        <td><span class="label-bold">ITEM CLASS:</span></td>
        <td><span class="label-bold">ITEM:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">MORTGAGEE</span></td>
        <td colspan="2" rowspan="2"><span class="label-bold">ITEM DESCRIPTION:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-top-none"><span class="label-bold"></span></td>
        <td colspan="3" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">REFERENCE/ LOAN #:</span></td>
        <td colspan="3" class="border-top-none"><span class="label-bold"></span></td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 140 (2016/03)</div>
      <div class="page-info" style="text-align: right">Attach to ACORD 125 <span style="margin-left: 100px;">© 1985-2015 ACORD CORPORATION. All rights reserved.</span></div>
      {{-- <div class="footer-right">© 1993-2025 ACORD CORPORATION. All rights reserved.</div> --}}
    </div>
    <div class="copyright">The ACORD name and logo are registered marks of ACORD</div>
  </div>

  {{-- ============ PAGE 2 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td style="text-align: right;">
          <div class="agency-id"><span class="value-bold">AGENCY CUSTOMER ID: ___________________________________</div>
        </td>
      </tr>
    </table>
    
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 18%;" class="v-bottom label-bold border-none" rowspan="2"> ADDITIONAL<br>PREMISES INFORMATION</td>
        <td style="width: 10%;" class="v-middle label-bold fs-8">PREMISES #: <span class="fs-12 fw-normal"></span></td>
        <td class="v-middle label-bold fs-8">STREET ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp;<span class="fs-12 fw-normal"></span></td>
      </tr>
      <tr>
        <td style="" class="v-middle label-bold fs-8">BUILDING#:</td>
        <td class="v-middle label-bold fs-8">BLDG DESCRIPTION:</td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 12%;" class="v-middle text-center label-bold fs-8">SUBJECT OF INSURANCE</td>
        <td style="width: 8%;" class="v-middle text-center label-bold fs-8">AMOUNT</td>
        <td style="width: 4.5%;" class="v-middle text-center label-bold fs-8">COINS %</td>
        <td style="width: 4%;" class="v-middle text-center label-bold fs-8">VALU-ATION</td>
        <td style="width: 10%;" class="v-middle text-center label-bold fs-8">CAUSES OF LOSS</td>
        <td style="width: 5%;" class="v-middle text-center label-bold fs-8">INFLATION GUARD %</td>
        <td style="width: 6%;" class="v-middle text-center label-bold fs-8">DED</td>
        <td style="width: 5%;" class="v-middle text-center label-bold fs-8">DED TYPE</td>
        <td style="width: 3%;" class="v-middle text-center label-bold fs-8">BLKT #</td>
        <td style="width: 17%;" class="v-middle text-center label-bold fs-8">FORMS AND CONDITIONS TO APPLY</td>
      </tr>
      <tr>
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
        <td style="padding-bottom: 27px;"></td>
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
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 8%;" class="v-middle label-bold fs-8 py-4">ADDITIONAL INFORMATION</td>
        <td style="width: 1.5%;"></td>
        <td style="width: 16%;" class="v-middle label-bold fs-8">BUSINESS INCOME/ EXTRA EXPENSE - Attach ACORD 810</td>
        <td style="width: 1.5%;"></td>
        <td style="width: 18%;" class="v-middle label-bold fs-8">VALUE REPORTING INFORMATION - Attach ACORD 811</td>
    </table>

    <table class="main-table border-none">
      <tr>
        <td colspan="8"><div class="label-bold pt-2" style="font-size: 11px;">ADDITIONAL COVERAGES, OPTIONS, RESTRICTIONS, ENDORSEMENTS AND RATING INFORMATION</div></td>
      </tr>
      <tr class="border-none">
        <td style="width: 8%;" class="v-middle text-center label-bold fs-8 border-bottom-none" rowspan="2">SPOILAGE COVERAGE (Y/N)</td>
        <td style="width: 40%;" class="label-bold fs-8" rowspan="4">DESCRIPTION OF PROPERTY COVERED</td>
        <td style="width: 15%;" class="v-middle label-bold fs-8 border-bottom-none">LIMIT</td>
        <td style="width: 10%;" class="v-middle text-center label-bold fs-8 border-bottom-none" rowspan="2">REFRIG MAINT AGREEMENT (Y/N)</td>
        <td style="width: 10%;" class="v-middle label-bold fs-8 border-bottom-none" colspan="4">OPTIONS</td>
      </tr>
      <tr>
        <td class="v-middle label border-top-none">$</td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 border-y-none" style="" colspan="3">BREAKDOWN OR CONTAMINATION</td>
      </tr>
      <tr>
        <td class="v-middle text-center border-top-none" style="" rowspan="2">
          <table style="width: 45%; margin-right: auto; margin-left: auto;"><tr><td style="padding-bottom: 15px;"></td></tr></table>
        </td>
        <td class="v-middle label-bold fs-8 border-bottom-none" style="">DEDUCTIBLE</td>
        <td class="v-middle text-center border-top-none" style="" rowspan="2">
          <table style="width: 35%; margin-right: auto; margin-left: auto;"><tr><td style="padding-bottom: 15px;"></td></tr></table>
        </td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 py-4 border-y-none" style="">POWER OUTAGE</td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 border-y-none" style="">SELLING PRICE</td>
      </tr>
      <tr>
        <td class="v-middle label border-top-none" style="">$</td>
        <td style="width: 2.5%;"></td>
        <td class="border-top-none" style="" colspan="3"></td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 40%;" class="v-middle label-bold fs-8 py-2 border-top-none">SINKHOLE COVERAGE (Required in Florida)</td>
        <td style="width: 2%;" class="border-top-none"></td>
        <td style="width: 15%;" class="label-bold fs-8 border-top-none">ACCEPT COVERAGE</td>
        <td style="width: 2%;" class="border-top-none"></td>
        <td style="width: 15%;" class="v-middle label-bold fs-8 border-x-none border-top-none">REJECT COVERAGE</td>
        <td style="width: 26%;" class="v-middle label-bold fs-8 border-left-none border-top-none">LIMIT: $</td>
      </tr>
      <tr class="border-none">
        <td style="width: 40%;" class="v-middle label-bold fs-8 py-2">MINE SUBSIDENCE COVERAGE (Required in IL, IN, KY and WV)</td>
        <td style="width: 2%;"></td>
        <td style="width: 15%;" class="label-bold fs-8">ACCEPT COVERAGE</td>
        <td style="width: 2%;"></td>
        <td style="width: 15%;" class="v-middle label-bold fs-8 border-x-none">REJECT COVERAGE</td>
        <td style="width: 26%;" class="v-middle label-bold fs-8 border-left-none">LIMIT: $</td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-top-none"></td>
        <td style="width: 49%;" class="label fs-8 py-4 border-y-none border-right-none">PROPERTY HAS BEEN DESIGNATED AN HISTORICAL LANDMARK</td>
        <td style="width: 45%;" class="label-bold fs-8 border-none text-right"># OF OPEN SIDES ON STRUCTURE: _____</td>
        <td style="width: 2.5%;" class="border-left-none border-y-none"></td>
      </tr>
      <tr class="border-none">
        <td style="padding-bottom: 30px;" colspan="4" class="border-y-none"></td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 20%;" class="label-bold fs-8" rowspan="3">CONSTRUCTION TYPE</td>
        <td style="width: %;" class="text-center label-bold fs-8 border-bottom-none" colspan="2">DISTANCE TO</td>
        <td style="width: 15%;" class="text-center label-bold fs-8" rowspan="3">FIRE DISTRICT</td>
        <td style="width: 9%;" class="text-center label-bold fs-8" rowspan="3">CODE NUMBER</td>
        <td style="width: 6%;" class="text-center label-bold fs-8" rowspan="3">PROT CL</td>
        <td style="width: 7%;" class="text-center label-bold fs-8" rowspan="3"># STORIES</td>
        <td style="width: 7%;" class="text-center label-bold fs-8" rowspan="3"># BASM'TS</td>
        <td style="width: 7%;" class="text-center label-bold fs-8" rowspan="3">YR BUILT</td>
        <td style="width: %;" class="label-bold fs-8" rowspan="3">TOTAL AREA</td>
      </tr>
      <tr class="border-none">
        <td style="width: 6.5%;" class="text-center label-bold fs-8 border-none">HYDRANT</td>
        <td style="width: 6.5%;" class="text-center label-bold fs-8 border-none">FIRE STAT</td>
      </tr>
      <tr class="border-none">
        <td class="border-top-none">
          <div><span class="">50</span><span class="fs-7 pt-4" style="float: right;">FT</span></div>
        </td>
        <td class="border-top-none">
          <div><span class="">1</span><span class="fs-7 pt-4" style="float: right;">Ml</span></div>
        </td>
      </tr>
    </table>

    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 27%;" class="label-bold fs-8 border-y-none" colspan="4">BUILDING IMPROVEMENTS</td>
        <td style="width: 8%;" class="text-center label-bold fs-8 border-y-none" rowspan="2">BLDG CODE GRADE</td>
        <td style="width: 8%;" class="text-center label-bold fs-8 border-y-none" rowspan="2">TAX CODE</td>
        <td style="width: 13%;" class="label-bold fs-8 border-y-none" rowspan="2">ROOF TYPE</td>
        <td style="width: 44%;" class="label-bold fs-8 border-y-none" rowspan="2">OTHER OCCUPANCIES</td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 py-4 border-y-none" style="width: 11%;">WIRING, YR:</td>
        <td style="width: 2.5%;"></td>
        <td class="v-middle label fs-8 border-y-none" style="width: 11%;">PLUMBING, YR:</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr>
        <td style="width: 2.5%;" class="border-y-none"></td>
        <td class="v-middle label fs-8 py-4 border-y-none" style="width: 11%;">ROOFING, YR:</td>
        <td style="width: 2.5%;" class="border-top-none"></td>
        <td class="v-middle label fs-8 border-none" style="width: 11%;">HEATING, YR:</td>
        <td class="v-middle label-bold fs-8 border-bottom-none" style="width: 10%;" colspan="2">WIND CLASS</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-bottom label fs-8 border-bottom-none" style="width: 17%;">SEMI- RESISTIVE</td>
        <td style="width: 2.5%;" ></td>
        <td class="v-middle label fs-8 border-bottom-none border-right-none" style="width: 22.5%;">HEATING SOURCE INCL WOODBURNING<br>STOVE OR FIREPLACE INSERT</td>
        <td style="width: 2.5%;" class="border-x-none border-bottom-none"></td>
        <td class="v-middle label fs-8 border-bottom-none border-left-none" style="width: 16.5%;">DATE<br>INSTALLED: _______________</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-middle label fs-8 py-4 border-y-none border-right-none" style="width: 11%;">OTHER:</td>
        <td style="width: 2.5%;" class="border-none"></td>
        <td class="v-middle label fs-8 border-none text-center" style="width: 11%;">YR:</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-middle label fs-8 border-none" style="width: 7%;">RESISTIVE</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td class="v-bottom label fs-8 border-none" style="width: 17%;"></td>
        <td class="v-middle label fs-8 border-y-none " style="width: %;">MANUFACTURER:</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 50%;" class="label-bold fs-8 border-bottom-none" colspan="9">PRIMARY HEAT</td>
        <td style="width: 50%;" class="label-bold fs-8 border-bottom-none" colspan="9">SECONDARY HEAT</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">BOILER</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">SOLID FUEL</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 22.5%;" class="label fs-8 border-none" colspan="4"></td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">BOILER</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4">SOLID FUEL</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 22.5%;" class="label fs-8 border-y-none border-left-none" colspan="4"></td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-y-none border-right-none"></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4" colspan="5">IF BOILER, IS INSURANCE PLACED ELSEWHERE?</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label-bold fs-8 border-none py-4" colspan="2">Y/N</td>
        <td style="width: 2.5%;" class="border-y-none border-right-none"></td>
        <td style="width: 10%;" class="label fs-8 border-none py-4" colspan="5">IF BOILER, IS INSURANCE PLACED ELSEWHERE?</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label-bold fs-8 border-y-none border-left-none py-4" colspan="2">Y/N</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 25%; padding-bottom: 18px;" class="label-bold fs-8 border-bottom-none">RIGHT EXPOSURE & DISTANCE</td>
        <td style="width: 25%;" class="label-bold fs-8 border-bottom-none">LEFT EXPOSURE & DISTANCE</td>
        <td style="width: 25%;" class="label-bold fs-8 border-bottom-none">FRONT EXPOSURE & DISTANCE</td>
        <td style="width: 25%;" class="label-bold fs-8 border-bottom-none">REAR EXPOSURE & DISTANCE</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 30%;" class="label-bold fs-8 border-bottom-none" rowspan="2">BURGLAR ALARM TYPE</td>
        <td style="width: 30%;" class="label-bold fs-8 border-bottom-none" rowspan="2">CERTIFICATE #</td>
        <td style="width: 15%;" class="label-bold fs-8 border-bottom-none" rowspan="2">EXPIRATION DATE</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label fs-8 border-bottom-none border-x-none">CENTRAL<br>STATION</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-bottom-none border-left-none">LOCAL<br>GANG</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label fs-8 border-y-none border-left-none py-4" colspan="3">WITH KEYS</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 47%;" class="label-bold fs-8 border-bottom-none" rowspan="2">BURGLAR ALARM INSTALLED AND SERVICED BY</td>
        <td style="width: 20%;" class="label-bold fs-8 border-bottom-none" rowspan="2">EXTENT</td>
        <td style="width: 8%;" class="label-bold fs-8 border-bottom-none" rowspan="2">GRADE</td>
        <td style="width: 15%;" class="label-bold fs-8 border-bottom-none" rowspan="2">#GUARDS/ WATCHMEN</td>
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%;" class="label fs-8 border-bottom-none border-left-none py-4">CLOCK HOURLY</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class="border-bottom-none"></td>
        <td style="width: 10%; color: white;" class="label fs-8 border-y-none border-left-none py-4">A</td>
      </tr>
    </table>
    <table class="main-table border-none">
      <tr class="border-none">
        <td style="width: 47%;" class="label-bold fs-8" rowspan="2">PREMISES FIRE PROTECTION (Sprinklers, Standpipes, CO2/ Chemical Systems)</td>
        <td style="width: 8%;" class="label-bold fs-8" rowspan="2">% SPRNK</td>
        <td style="width: 35%;" class="label-bold fs-8" rowspan="2">I FIRE ALARM MANUFACTURER</td>
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-left-none py-4 border-bottom-none">CLOCK HOURLY</td>
      </tr>
      <tr class="border-none">
        <td style="width: 2.5%;" class=""></td>
        <td style="width: 10%;" class="label fs-8 border-top-none border-left-none py-4">LOCAL GANG</td>
      </tr>
    </table>

    <table class="main-table border-x-none border-top-none">
      <tr>
        <td style="width: 10%;" class="border-none">
          <div><span class="value-bold">ADDITIONAL INTEREST</span></span></div>
        </td>
        <td style="width: 1%;"></td>
        <td style="width: 40%;" class="border-none">
          <span class="value-bold">ACORD 45 attached for additional names</span>
        </td>
      </tr>
    </table>
    <table class="main-table ">
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
        <td style="width: 10%;" class="border-x-none border-bottom-none"></td>
        <td style="#000; width: 35%; padding-top: 2px;" colspan="2"><span class="label-bold">INTEREST IN ITEM NUMBER</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%; font-family: DejaVu Sans, sans-serif;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LENDER'S LOSS PAYABLE</span></td>
        <td colspan="6" rowspan="3" class="border-y-none">
          {{-- <span class="label" style="font-size: 12px;">{{
            $quote['business_owner'] }} <br> {{ $quote['business_address'] }}<br> {{ $quote['city'] . ($quote['state'] ==
            'new-york' ? ' NY ' : ' NJ ') . $quote['zip_code'] }}</span> --}}
          </td>
        <td><span class="label-bold">LOCATION:</span></td>
        <td><span class="label-bold">BUILDING:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">LOSS PAYEE</span></td>
        <td><span class="label-bold">ITEM CLASS:</span></td>
        <td><span class="label-bold">ITEM:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 3px; padding-bottom: 3px;"><span class="label-bold">MORTGAGEE</span></td>
        <td colspan="2" rowspan="2"><span class="label-bold">ITEM DESCRIPTION:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-top-none"><span class="label-bold"></span></td>
        <td colspan="3" style="padding-top: 2px; padding-bottom: 2px;"><span class="label-bold">REFERENCE/ LOAN #:</span></td>
        <td colspan="3" class="border-top-none"><span class="label-bold"></span></td>
      </tr>
    </table>

    
    {{-- Additional Interest --}}
    <table class="main-table border-none">
      <tr>
        <td class="section-header border-none">REMARKS (ACORD 101 Additional Remarks Schedule mav be attached if more soace is reauired)</td>
      </tr>
      <tr>
        <td style="padding: 80px; border: 2px solid #000;"></td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 140 (2016/03)</div>
      <div class="page-info">Page 2 of 3</div>
    </div>
  </div>

  {{-- ============ PAGE 3 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td>
          <div><span class="value-bold">SIGNATURE</span></span></div>
        </td>
        <td style="text-align: right;">
          <div class="agency-id"><span class="value-bold">AGENCY CUSTOMER ID: ___________________________________</div>
        </td>
      </tr>
    </table>
    {{-- Continued Fraud Warnings --}}
    <div class="acord-page" style="border: 1px solid #000; padding: 4px;">

        <p class="fraud-text" style="margin-bottom: 12px; margin-top: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in AL, AR, LA, MD, NM, RI and WV</strong></span> <br>Any person who knowingly (or willfully)* presents a false or fraudulent claim for payment of a loss or benefit or knowingly (or willfully)* presents false
information in an application for insurance is guilty of a crime and may be subject to fines and confinement in prison. *Applies in MD Only. </p>
        
        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in CO</strong></span> <br>It is unlawful to knowingly provide false, incomplete, or misleading facts or information to an insurance company for the purpose of defrauding or attempting to
defraud the company. Penalties may include imprisonment, fines, denial of insurance and civil damages. Any insurance company or agent of an insurance
company who knowingly provides false, incomplete, or misleading facts or information to a policyholder or claimant for the purpose of defrauding or
attempting to defraud the policyholder or claimant with regard to a settlement or award payable from insurance proceeds shall be reported to the Colorado
Division of Insurance within the Department of Regulatory Agencies. </p>
        
        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in FL and OK</strong></span> <br>Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a statement of claim or an application containing any false,
incomplete, or misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.</p>
            
        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in KS</strong></span> <br>Any person who, knowingly and with intent to defraud, presents, causes to be presented or prepares with knowledge or belief that it will be presented to or by
an insurer, purported insurer, broker or any agent thereof, any written statement as part of, or in support of, an application for the issuance of, or the rating of
an insurance policy for personal or commercial insurance, or a claim for payment or other benefit pursuant to an insurance policy for commercial or personal
insurance which such person knows to contain materially false information concerning any fact material thereto; or conceals, for the purpose of misleading,
information concerning any fact material thereto commits a fraudulent insurance act. </p>

        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in KY, OH and PA</strong></span> <br>Any person who knowingly and with intent to defraud any insurance company or other person files an application for insurance or statement of claim
containing any materially false information or conceals for the purpose of misleading, information concerning any fact material thereto commits a fraudulent
insurance act, which is a crime and subjects such person to criminal and civil penalties* (not to exceed five thousand dollars and the stated value of the claim
for each such violation)*. *Applies in NY Only. </p>

        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in ME, TN, VA and WA</strong></span> <br>It is a crime to knowingly provide false, incomplete or misleading information to an insurance company for the purpose of defrauding the company. Penalties
(may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.</p>

        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in NJ</strong></span> <br>Any person who includes any false or misleading information on an application for an insurance policy is subject to criminal and civil penalties.</p>

        <p class="fraud-text" style="margin-bottom: 12px;"><span style="padding-bottom: 10px;"><strong>Applicable in OR</strong></span> <br>Any person who knowingly and with intent to defraud or solicit another to defraud the insurer by submitting an application containing a false statement as to
any material fact may be violating state law.</p>

        <p class="fraud-text" style="margin-bottom: 238px;"><span style="padding-bottom: 10px;"><strong>Applicable in PR</strong></span> <br>Any person who knowingly and with the intention of defrauding presents false information in an insurance application, or presents, helps, or causes the
presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim for the same damage or loss, shall incur a
felony and, upon conviction, shall be sanctioned for each violation by a fine of not less than five thousand dollars ($5,000) and not more than ten thousand
dollars ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties. Should aggravating circumstances [be] present, the penalty thus
established may be increased to a maximum of five (5) years, if extenuating circumstances are present, it may be reduced to a minimum of two (2) years.</p>
    </div>

    {{-- Undersigned Statement --}}
    <div style="border: 1px solid #000; padding: 3px 6px; margin: 0px 0 8x 0; font-size: 7.5pt; text-align: justify;" class="border-top-none">
      THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THE
ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER
KNOWLEDGE. 
    </div>

    {{-- Producer Signature --}}
    <table class="main-table border-none">
      <tr>
        <td class="border-y-none" style="width: 40%; padding-bottom: 20px;"><span class="label-bold">PRODUCER'S SIGNATURE</span></td>
        <td class="border-y-none" style="width: 35%;"><span class="label-bold">PRODUCER'S NAME (Please Print)</span></td>
        <td class="border-y-none" style="width: 25%;"><span class="label-bold">STATE PRODUCER LICENSE NO<br>(Required in Florida)</span></td>
      </tr>
    </table>

    {{-- Applicant Signature --}}
    <table class="main-table">
      <tr>
        <td style="width: 60%;" class="border-bottom-none"><span class="label-bold">APPLICANT'S SIGNATURE</span></td>
        <td style="width: 15%;" class="border-bottom-none"><span class="label-bold">DATE</span></td>
        <td style="width: 25%;" class="border-bottom-none"><span class="label-bold">NATIONAL PRODUCER NUMBER</span></td>
      </tr>
      <tr>
        <td style="height: 22px;" class="border-top-none"></td>
        <td class="value border-top-none" style="font-size: 13px;">{{ $data['date'] }}</td>
        <td class="value border-top-none"></td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 140 (2016/03)</div>
      <div class="page-info">Page 3 of 3</div>
    </div>
  </div>

</body>

</html>