<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ACORD 125 - Commercial Insurance Application</title>
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
      vertical-align: middle;
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
  </style>
</head>

<body>

  {{-- ============ PAGE 1 ============ --}}
  <div class="page">
    {{-- Header --}}
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 0;">
      <tr>
        <td style="width: 12%; vertical-align: top; border: none; padding: 0;">
          <div style="font-size: 16pt; letter-spacing: 4px; padding-top: 5px;">ACORD</div>
        </td>
        <td style="width: 68%; text-align: center; vertical-align: top; border: none; padding: 0;">
          <div style="font-size: 13pt; font-weight: bold;">COMMERCIAL INSURANCE APPLICATION<br><div style="font-size: 10pt;">APPLICANT INFORMATION SECTION</div></div>
        </td>
        <td style="width: 20%; top; padding: 0; text-align:center;">
          <div class="date-header" style="font-size: 6pt; font-weight: bold; padding-bottom:2px;">DATE (MM/DD/YYYY)<br><div style="font-size: 9pt; padding-top: 6px;">{{ $data['form_date'] ?? '08-06-2025' }}</div></div>
        </td>
      </tr>
    </table>

    {{-- Producer / Carrier Section --}}
    <table class="main-table" style="margin-top: 0;">
      <tr>
        <td style="width: 50%; vertical-align: top; padding: 0;">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td class="section-header" style="border: none; border-bottom: 0px;">PRODUCER</td>
            </tr>
            <tr>
              <td style="border: none; padding: 3px 4px; height: 55px; vertical-align: top;">
                <div class="value" style="font-size: 13px;">{{ $data['producer_name'] ?? 'SRC INSURANCE BROKERAGE INC.' }}</div>
                <div class="value" style="font-size: 13px;">{{ $data['producer_address1'] ?? '480 39th Street, Suite 2F' }}</div>
                <div class="value" style="position: relative; top: 10px; font-size: 12px;">{{ $data['producer_city_state_zip'] ?? 'Brooklyn, NY 11232' }}</div>
              </td>
            </tr>
            <tr>
              <td style="border: none; border-top: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 18%; border: none;"><span class="label-bold">CONTACT</span><br><span
                        class="label-bold">NAME:</span></td>
                    <td style="border: none; padding-top: 5px; font-size: 13px;" class="value">{{ $data['contact_name'] ?? 'Steven Cabrera' }}</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="border: none; border-top: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 18%; border: none;"><span class="label-bold">PHONE</span><br><span class="label-bold">(A/C,
                        No, Ext):</span></td>
                    <td style="border: none; padding-top: 5px; font-size: 13px;" class="value">{{ $data['phone'] ?? '718-438-0400' }}</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="border: none; border-top: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 18%; border: none;"><span class="label-bold">FAX</span><br><span class="label-bold">(A/C,
                        No):</span></td>
                    <td style="border: none; padding-top: 5px; font-size: 13px;" class="value">{{ $data['fax'] ?? '718-841-7227' }}</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="border: none; border-top: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 18%; border: none;"><span class="label-bold">E-MAIL</span><br><span
                        class="label-bold">ADDRESS:</span></td>
                    <td style="border: none;padding-top: 5px; font-size: 13px;" class="value">{{ $data['email'] ?? 'INFO@SRCINSURANCE.COM' }}</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="border: none; border-top: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 50%; border: none; margin-bottom: 1px;"><span class="label-bold">CODE:</span></td>
                    <td style="width: 50%; border: none; border-left: 1px solid #000; padding-left: 4px;"><span
                        class="label-bold">SUBCODE:</span></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="border: none; border-top: 1px solid #000; padding: 0px 4px; line-height:1;">
                <span class="label-bold">AGENCY CUSTOMER ID:</span> <span style="font-size: 13px; margin: 2px 0px;"
                        class="value">{{ $data['agency_customer_id'] ?? '629318' }}</span>
              </td>
            </tr>
            
          </table>
        </td>
        <td style="width: 50%; vertical-align: top; padding: 0;">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 80%; border: none; padding-bottom: 15px;" class="section-header">CARRIER</td>
                    <td style="width: 20%; border: none; border-left: 1px solid #000; padding-left: 4px; padding-bottom: 15px;" class="label-bold">NAIC CODE</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 75%; border: none; padding-bottom: 15px;"><span class="label-bold">COMPANY POLICY OR PROGRAM NAME</span></td>
                    <td style="width: 25%; border: none; border-left: 1px solid #000; padding-left: 4px; padding-bottom: 15px;"><span
                        class="label-bold">PROGRAM CODE</span></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px; line-height:1; padding-bottom: 15px;">
                <span class="label-bold">POLICY NUMBER</span>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; border-bottom: 1px solid #000; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 50%; border: none; padding-bottom: 15px;"><span class="label-bold">UNDERWRITER</span></td>
                    <td style="width: 50%; border: none; border-left: 1px solid #000; padding-left: 4px; padding-bottom: 15px;"><span
                        class="label-bold">UNDERWRITER OFFICE</span></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 30%; border: none; vertical-align: bottom;" rowspan="2" class="label-bold"><div>STATUS OF</div></td>
                    <td style="width: 20%; border: none;">
                      <span class="checkbox{{ ($data['status_quote'] ?? false) ? '-checked' : '' }}"></span> <span
                        class="label">QUOTE</span>
                    </td>
                    <td style="width: 50%; border: none;">
                      <span class="checkbox{{ ($data['status_issue'] ?? false) ? '-checked' : '' }}"></span> <span
                        class="label">ISSUE POLICY</span>
                      <span class="checkbox{{ ($data['status_renew'] ?? false) ? '-checked' : '' }}" style="margin-left:15px;"></span> <span
                        class="label">RENEW</span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="border: none;">
                      <span class="checkbox{{ ($data['status_bound'] ?? false) ? '-checked' : '' }}"></span> <span
                        class="label">BOUND (Give Date and/or Attach Copy):</span>
                    </td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="border: none; padding: 0px 4px; line-height:1;">
                <table style="width: 100%; border-collapse: collapse;">
                  <tr>
                    <td style="width: 30%; border: none;" class="label-bold">TRANSACTION</td>
                    <td style="width: 20%; border: none;">
                      <span class="checkbox{{ ($data['trans_change'] ?? false) ? '-checked' : '' }}"></span>
                      <span class="label">CHANGE</span>
                    </td>
                    <td style="width: 25%; border: none; padding-left: 4px;"><span
                        class="label-bold">DATE</span></td>
                    <td style="width: 25%; border: none; border-left: 1px solid #000; padding-left: 4px;"><span
                        class="label-bold">TIME</span></td>
                  </tr>
                  <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;">
                      <span class="checkbox{{ ($data['trans_cancel'] ?? false) ? '-checked' : '' }}"></span>
                      <span class="label">CANCEL</span>
                    </td>
                    <td style="border: none; "></td>
                    <td style="border: none; border-left: 1px solid #000; text-align: right;">
                      <span class="checkbox{{ ($data['time_am'] ?? false) ? '-checked' : '' }}"></span> <span
                        class="label">AM</span><br>
                      <span class="checkbox{{ ($data['time_pm'] ?? false) ? '-checked' : '' }}"></span> <span
                        class="label">PM</span>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    {{-- SC Notice --}}
    <div class="notice-box">
      NOTICE REGARDING CANCELLATION APPLICABLE IN SOUTH CAROLINA: THE INSURER CAN CANCEL THIS POLICY FOR WHICH YOU ARE
      APPLYING WITHOUT CAUSE DURING THE FIRST 120 DAYS. THAT IS THE INSURER'S CHOICE. AFTER THE FIRST 120 DAYS, THE
      INSURER CAN ONLY CANCEL THIS POLICY FOR REASONS STATED IN THE POLICY.
    </div>

    {{-- Lines of Business --}}
    <div class="label-bold" style="font-size: 11px;">LINES OF BUSINESS</div>
    <table class="main-table">
      <tr>
        <td colspan="2"><span class="label-bold">INDICATE LINES OF BUSINESS</span></td>
        <td colspan="3"><span class="label-bold">PREMIUM</span></td>
        <td colspan="3"><span class="label-bold">PREMIUM</span></td>
        <td><span class="label-bold">PREMIUM</span></td>
      </tr>
      <tr>
        <td style="width: 2%;"></td>
        <td style="width: 23%;">BOILER & MACHINERY</td>
        <td style="width: 10%">$ {{ $data['premium_boiler'] ?? '' }}</td>
        <td style="width: 2%;"></td>
        <td style="width: 21%;">CYBER AND PRIVACY</td>
        <td style="width: 10%">$ {{ $data['premium_cyber'] ?? '' }}</td>
        <td style="width: 2%;"></td>
        <td style="width: 20%;">YACHT</td>
        <td style="width: 10%">$ {{ $data['premium_yacht'] ?? '' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>BUSINESS AUTO</td>
        <td>$ {{ $data['premium_auto'] ?? '' }}</td>
        <td></td>
        <td>FIDUCIARY LIABILITY</td>
        <td>$ {{ $data['premium_fiduciary'] ?? '' }}</td>
        <td></td>
        <td></td>
        <td>$ </td>
      </tr>
      <tr>
        <td></td>
        <td>BUSINESS OWNERS</td>
        <td>$ {{ $data['premium_bop'] ?? '' }}</td>
        <td></td>
        <td>GARAGE AND DEALERS</td>
        <td>$ {{ $data['premium_garage'] ?? '' }}</td>
        <td></td>
        <td></td>
        <td>$ </td>
      </tr>
      <tr>
        <td></td>
        <td>COMMERCIAL GENERAL LIABILITY</td>
        <td>$ {{ $data['premium_gl'] ?? '' }}</td>
        <td></td>
        <td>LIQUOR LIABILITY</td>
        <td>$ {{ $data['premium_liquor'] ?? '' }}</td>
        <td></td>
        <td></td>
        <td>$ </td>
      </tr>
      <tr>
        <td></td>
        <td>COMMERCIAL INLAND MARINE</td>
        <td>$ {{ $data['premium_inland'] ?? '' }}</td>
        <td></td>
        <td>MOTOR CARRIER</td>
        <td>$ {{ $data['premium_motor'] ?? '' }}</td>
        <td></td>
        <td></td>
        <td>$ </td>
      </tr>
      <tr>
        <td></td>
        <td>COMMERCIAL PROPERTY</td>
        <td>$ {{ $data['premium_property'] ?? '' }}</td>
        <td></td>
        <td>TRUCKERS</td>
        <td>$ {{ $data['premium_truckers'] ?? '' }}</td>
        <td></td>
        <td></td>
        <td>$ </td>
      </tr>
      <tr>
        <td></td>
        <td>CRIME</td>
        <td>$ {{ $data['premium_crime'] ?? '' }}</td>
        <td></td>
        <td>UMBRELLA</td>
        <td>$ {{ $data['premium_umbrella'] ?? '' }}</td>
        <td></td>
        <td></td>
        <td>$ </td>
      </tr>
    </table>

    {{-- Attachments --}}
    <div class="label-bold" style="font-size: 11px; margin-top: 10px;">ATTACHMENTS</div>
    <table class="main-table">
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">ACCOUNTS RECEIVABLE/VALUABLE PAPERS</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">GLASS AND SIGN SECTION</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;">STATEMENT/ SCHEDULE OF VALUES </td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">ADDITIONAL INTEREST SCHEDULE</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">HOTEL/ MOTEL SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;">STATE SUPPLEMENT (If applicable)</td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">ADDITIONAL PREMISES INFORMATION SCHEDULE</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">INSTALLATION/BUILDERS RISK SECTION</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;">VACANT BUILDING SUPPLEMENT</td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">APARTMENT BUILDING SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">INTERNATIONAL LIABILITY EXPOSURE SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;">VEHICLE SCHEDULE</td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">CONDO ASSN BYLAWS (for D&O Coverage only)</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">INTERNATIONAL PROPERTY EXPOSURE SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;"></td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">CONTRACTORS SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">LOSS SUMMARY</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;"></td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">COVERAGES SCHEDULE</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">OPEN CARGO SECTION</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;"></td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">DEALERS SECTION</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">PREMIUM PAYMENT SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;"></td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">DRIVER INFORMATION SCHEDULE</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">PROFESSIONAL LIABILITY SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;"></td>
      </tr>
      <tr>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">ELECTRONIC DATA PROCESSING SECTION</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 34%;">RESTAURANT/ TAVERN SUPPLEMENT</td>
        <td style="font-size: 9px; padding: 3px 4px; width: 2%;"></td>
        <td style="font-size: 9px; padding: 3px 4px; width: 26%;"></td>
      </tr>
    </table>

    {{-- Policy Information --}}
    <div class="label-bold" style="font-size: 11px; margin-top: 10px;">POLICY INFORMATION</div>
    <table class="main-table">
      <tr>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">PROPOSED EFF DATE</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">PROPOSED EXP DATE</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">BILLING PLAN</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">PAYMENT PLAN</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">METHOD OF PAYMENT</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">AUDIT</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">DEPOSIT</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">MINIMUM<br>PREMIUM</span></td>
        <td style="text-align: center; border-bottom: 0px;"><span class="label-bold">POLICY PREMIUM</span></td>
      </tr>
      <tr>
        <td style="text-align: center; border-top: 0px; font-size: 13px;" class="value">{{ $data['eff_date'] ?? '09/24/2030' }}</td>
        <td style="text-align: center; border-top: 0px; font-size: 13px;" class="value">{{ $data['exp_date'] ?? '09/24/2031' }}</td>
        <td style="border-top: 0px;">
          <span class="checkbox{{ ($data['billing_direct'] ?? false) ? '-checked' : '' }}"></span> DIRECT
          <span class="checkbox{{ ($data['billing_agency'] ?? false) ? '-checked' : '' }}"></span> AGENCY
        </td>
        <td style="border-top: 0px;" class="value">{{ $data['payment_plan'] ?? '' }}</td>
        <td style="border-top: 0px;" class="value">{{ $data['payment_method'] ?? '' }}</td>
        <td style="border-top: 0px;" class="value">{{ $data['audit'] ?? '' }}</td>
        <td style="border-top: 0px;" class="value">$ {{ $data['deposit'] ?? '' }}</td>
        <td style="border-top: 0px;" class="value">$ {{ $data['min_premium'] ?? '' }}</td>
        <td style="border-top: 0px;" class="value">$ {{ $data['policy_premium'] ?? '' }}</td>
      </tr>
    </table>

    {{-- Applicant Information --}}
    <div class="label-bold" style="font-size: 11px; margin-top: 10px;">APPLICANT INFORMATION</div>
    <table class="main-table" style="margin-top: 0;">
      <tr>
        <td style="width: 50%; vertical-align: top; padding: 0;" colspan="5">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td class="label-bold" style="border: none; border-bottom: 0px;">NAME (First Named Insured) AND MAILING ADDRESS (including ZIP+4)</td>
            </tr>
            <tr>
              <td style="border: none; padding: 3px 4px;  vertical-align: top;">
                <div class="value" style="font-size: 12px;">{{ $data['producer_name'] ?? 'ABC CORP' }}
                </div>
                <div class="value" style="font-size: 12px;">{{ $data['producer_address1'] ?? '123 MERRY STREET' }}
                </div>
                <div class="value" style="position: relative; top: 5px; font-size: 11px;">{{ $data['producer_city_state_zip'] ?? 'Brooklyn, NY 11232' }}</div>
              </td>
            </tr>
    
          </table>
        </td>
        <td style="width: 50%; vertical-align: top; padding: 0;" colspan="5">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">GL CODE</td>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">SIC</td>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">NAICS</td>
              <td style="width: 40%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">FEIN OR SOC SEC#</td>
              
            </tr>
            <tr>
              <td colspan="4"
                style="border: none; border-bottom: 1px solid #000; padding: 4px; line-height:1;">
                <span class="label-bold">BUSINESS PHONE#:</span>
              </td>
            </tr>
            <tr>
              <td colspan="4"
                style="border: none; border-bottom: 1px solid #000; padding: 2px 4px; line-height:1; padding-bottom: 15px;">
                <span class="label-bold">WEBSITE ADDRESS</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 10%;">CORPORATION</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 20%;">JOINT VENTURE</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 17%;">NOT FOR PROFIT ORG</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 26%;">SUBCHAPTER "S" CORPORATION</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 12%;"></td>
      </tr>
      <tr>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 10%; vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>INDIVIDUAL</div></td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-top: 0px; width: 20%;">
          <table style="border: 0px;">
            <tr>
              <td style="border: 0px; vertical-align: middle; font-size: 8px; line-height: 0.5;"><div>LLC</div></td>
              <td style="font-size: 8px; border: 0px; padding-left: 4px;">NO. OF MEMBERS AND MANAGERS: ________</td>
            </tr>
          </table>
        </td>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 17%; vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>PARTNERSHIP</div></td>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 26%; vertical-align: middle; border-top: 0px; border-right: 0px; font-size: 8px; line-height: 0.5;"><div>TRUST</div></td>
        <td style="width: 15%; vertical-align: middle; border-left: 0px; border-top: 0px; font-size: 8px; line-height: 0.5;" colspan="2"><div>OTHER</div></td>
      </tr>
    </table>

    {{-- Other Named Insured --}}
    <table class="main-table" style="margin-top: 0;">
      <tr>
        <td style="width: 50%; vertical-align: top; padding: 0;" colspan="5">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td class="label-bold" style="border: none; border-bottom: 0px;">NAME (First Named Insured) AND MAILING ADDRESS (including ZIP+4)</td>
            </tr>
            <tr>
              <td style="border: none; padding: 3px 4px;  vertical-align: top;">
                <div class="value" style="font-size: 12px;">{{ $data['producer_name'] ?? 'ABC CORP' }}
                </div>
                <div class="value" style="font-size: 12px;">{{ $data['producer_address1'] ?? '123 MERRY STREET' }}
                </div>
                <div class="value" style="position: relative; top: 5px; font-size: 11px;">{{ $data['producer_city_state_zip'] ?? 'Brooklyn, NY 11232' }}</div>
              </td>
            </tr>
    
          </table>
        </td>
        <td style="width: 50%; vertical-align: top; padding: 0;" colspan="5">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">GL CODE</td>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">SIC</td>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">NAICS</td>
              <td style="width: 40%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">FEIN OR SOC SEC#</td>
              
            </tr>
            <tr>
              <td colspan="4"
                style="border: none; border-bottom: 1px solid #000; padding: 4px; line-height:1;">
                <span class="label-bold">BUSINESS PHONE#:</span>
              </td>
            </tr>
            <tr>
              <td colspan="4"
                style="border: none; border-bottom: 1px solid #000; padding: 2px 4px; line-height:1; padding-bottom: 15px;">
                <span class="label-bold">WEBSITE ADDRESS</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 10%;">CORPORATION</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 20%;">JOINT VENTURE</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 17%;">NOT FOR PROFIT ORG</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 26%;">SUBCHAPTER "S" CORPORATION</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 12%;"></td>
      </tr>
      <tr>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 10%; vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>INDIVIDUAL</div></td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-top: 0px; width: 20%;">
          <table style="border: 0px;">
            <tr>
              <td style="border: 0px; vertical-align: middle; font-size: 8px; line-height: 0.5;"><div>LLC</div></td>
              <td style="font-size: 8px; border: 0px; padding-left: 4px;">NO. OF MEMBERS AND MANAGERS: ________</td>
            </tr>
          </table>
        </td>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 17%; vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>PARTNERSHIP</div></td>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 26%; vertical-align: middle; border-top: 0px; border-right: 0px; font-size: 8px; line-height: 0.5;"><div>TRUST</div></td>
        <td style="width: 15%; vertical-align: middle; border-left: 0px; border-top: 0px; font-size: 8px; line-height: 0.5;" colspan="2"><div>OTHER</div></td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 125 (2025/03)</div>
      <div class="page-info">Page 1 of 5</div>
      <div class="footer-right">© 1993-2025 ACORD CORPORATION. All rights reserved.</div>
    </div>
    <div class="copyright">The ACORD name and logo are registered marks of ACORD</div>
  </div>

  {{-- ============ PAGE 2 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td>
          <div><span class="value-bold">APPLICANT INFORMATION (Continued)</span></span></div>
        </td>
        <td style="text-align: right;">
          <div class="agency-id"><span class="label-bold">AGENCY CUSTOMER ID:</span> <span class="value-bold" style="text-decoration: underline;">{{ $data['agency_customer_id'] ?? '629318' }}</span></div>
        </td>
      </tr>
    </table>

    {{-- Applicant Information Continued --}}
    <table class="main-table" style="margin-top: 0;">
      <tr>
        <td style="width: 50%; vertical-align: top; padding: 0;" colspan="5">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td class="label-bold" style="border: none; border-bottom: 0px;">NAME (First Named Insured) AND MAILING ADDRESS (including ZIP+4)</td>
            </tr>
            <tr>
              <td style="border: none; padding: 3px 4px;  vertical-align: top;">
                <div class="value" style="font-size: 12px;">{{ $data['producer_name'] ?? 'ABC CORP' }}
                </div>
                <div class="value" style="font-size: 12px;">{{ $data['producer_address1'] ?? '123 MERRY STREET' }}
                </div>
                <div class="value" style="position: relative; top: 5px; font-size: 11px;">{{ $data['producer_city_state_zip'] ?? 'Brooklyn, NY 11232' }}</div>
              </td>
            </tr>
    
          </table>
        </td>
        <td style="width: 50%; vertical-align: top; padding: 0;" colspan="5">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">GL CODE</td>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">SIC</td>
              <td style="width: 20%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">NAICS</td>
              <td style="width: 40%; padding-bottom: 15px; border-left: 1px solid #000; padding-left: 4px;" class="label-bold">FEIN OR SOC SEC#</td>
              
            </tr>
            <tr>
              <td colspan="4"
                style="border: none; border-bottom: 1px solid #000; padding: 4px; line-height:1;">
                <span class="label-bold">BUSINESS PHONE#:</span>
              </td>
            </tr>
            <tr>
              <td colspan="4"
                style="border: none; border-bottom: 1px solid #000; padding: 2px 4px; line-height:1; padding-bottom: 15px;">
                <span class="label-bold">WEBSITE ADDRESS</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 10%;">CORPORATION</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 20%;">JOINT VENTURE</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 17%;">NOT FOR PROFIT ORG</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 26%;">SUBCHAPTER "S" CORPORATION</td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px; width: 12%;"></td>
      </tr>
      <tr>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 10%; vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>INDIVIDUAL</div></td>
        <td style="width: 3%;"></td>
        <td class="label" style="border-top: 0px; width: 20%;">
          <table style="border: 0px;">
            <tr>
              <td style="border: 0px; vertical-align: middle; font-size: 8px; line-height: 0.5;"><div>LLC</div></td>
              <td style="font-size: 8px; border: 0px; padding-left: 4px;">NO. OF MEMBERS AND MANAGERS: ________</td>
            </tr>
          </table>
        </td>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 17%; vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>PARTNERSHIP</div></td>
        <td style="width: 3%;"></td>
        <td class="label" style="width: 26%; vertical-align: middle; border-top: 0px; border-right: 0px; font-size: 8px; line-height: 0.5;"><div>TRUST</div></td>
        <td style="width: 15%; vertical-align: middle; border-left: 0px; border-top: 0px; font-size: 8px; line-height: 0.5;" colspan="2"><div>OTHER</div></td>
      </tr>
    </table>

    {{-- Contact Information --}}
    <div class="label-bold" style="font-size: 11px;">CONTACT INFORMATION</div>
    <table class="main-table" style="table-layout:fixed;">
      <tr>
        <td><span class="label-bold">CONTACT TYPE:</span> <span style=" font-size: 12px;">OWNER</span></td>
        <td><span class="label-bold">CONTACT TYPE:</span></td>
      </tr>
      <tr>
        <td><span class="label-bold">CONTACT NAME:</span> <span style=" font-size: 12px;">JHON DOE</span></td>
        <td><span class="label-bold">CONTACT NAME:</span></td>
      </tr>
      <tr>
        <td width="50%;">
          <table style="border:none; padding:0;">
            <tr>
              <td style="border:none; padding:0;">
                <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                  <tr>
                    <td style="vertical-align:middle; border: 0px; padding: 0px; padding-right:1px;">
                      <span class="label-bold">
                        PRIMARY<br>PHONE#
                      </span>
                    </td>
                    <td style="vertical-align:middle; font-size: 9px; border: 0px; padding: 0px; font-weight: bold;">
                      <span class="small-checkbox"></span> HOME&nbsp;&nbsp;
                      <span class="small-checkbox"></span> BUS&nbsp;&nbsp;
                      <span class="small-checkbox"></span> CELL
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="border: 0px; padding: 0px; font-size: 12px;">123-456-7889</td>
                  </tr>
                </table>
              </td>
              <td style="border:none; border-left: 1px solid #000; padding:0;">
                <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                  <tr>
                    <td style="vertical-align:middle; padding: 0px 2px; border: 0px;">
                      <span class="label-bold">
                        SECONDARY<br>PHONE#
                      </span>
                    </td>
                    <td style="vertical-align:middle; font-size: 9px; border: 0px; padding: 0px; font-weight: bold;">
                      <span class="small-checkbox"></span> HOME&nbsp;&nbsp;
                      <span class="small-checkbox"></span> BUS&nbsp;&nbsp;
                      <span class="small-checkbox"></span> CELL
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
        <td width="50%;">
          <table style="border:none; padding:0;">
            <tr>
              <td style="border:none; padding:0;">
                <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                  <tr>
                    <td style="vertical-align:middle; border: 0px; padding: 0px; padding-right:1px;">
                      <span class="label-bold">
                        PRIMARY<br>PHONE#
                      </span>
                    </td>
                    <td style="vertical-align:middle; font-size: 9px; border: 0px; padding: 0px; font-weight: bold;">
                      <span class="small-checkbox"></span> HOME&nbsp;&nbsp;
                      <span class="small-checkbox"></span> BUS&nbsp;&nbsp;
                      <span class="small-checkbox"></span> CELL
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="border: 0px; padding: 0px; font-size: 12px;"></td>
                  </tr>
                </table>
              </td>
              <td style="border:none; border-left: 1px solid #000; padding:0;">
                <table cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                  <tr>
                    <td style="vertical-align:middle; padding: 0px 2px; border: 0px;">
                      <span class="label-bold">
                        SECONDARY<br>PHONE#
                      </span>
                    </td>
                    <td style="vertical-align:middle; font-size: 9px; border: 0px; padding: 0px; font-weight: bold;">
                      <span class="small-checkbox"></span> HOME&nbsp;&nbsp;
                      <span class="small-checkbox"></span> BUS&nbsp;&nbsp;
                      <span class="small-checkbox"></span> CELL
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td><span class="label-bold">PRIMARY E-MAIL ADDRESS:</span></td>
        <td><span class="label-bold">PRIMARY E-MAIL ADDRESS:</span></td>
      </tr>
      <tr>
        <td><span class="label-bold">SECONDARY E-MAIL ADDRESS:</span></td>
        <td><span class="label-bold">SECONDARY E-MAIL ADDRESS:</span></td>
      </tr>
    </table>

    {{-- Premises Information --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">PREMISES INFORMATION <span style="font-weight: normal;">(Attach ACORD 823 for Additional Premises)</span></div>
    <table class="main-table">
      <tr>
        <td style="border: 0px; width: 5%;"><span class="label-bold">LOC #</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 30%;" colspan="2"><span class="label-bold">STREET</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 10%;" colspan="2"><span class="label-bold">CITY LIMITS</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 10%;" colspan="2"><span class="label-bold">INTEREST</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 12%;"><span class="label-bold"># FULL TIME EMPL</span></td>
        <td style="width: 18%;" colspan="2"><span class="label-bold">ANNUAL REVENUES: $</span> <span class="value" style="font-size: 12px;">{{ $data['loc1_revenues'] ?? '150,000' }}</span></td>
      </tr>
      <tr>
        <td style="border: 0px; width: 5%; padding-left: 10px; font-size: 12px;" class="label">{{ $data['loc1_num'] ?? '1' }}</td>
        <td style="border: 0px; border-left: 1px solid #000; font-size: 12px;" class="value" colspan="2">{{ $data['loc1_street'] ?? '123 MERRY STREET' }}</td>
        <td style="width: 2.5%; font-family: DejaVu Sans, sans-serif;">&#10003;</td>
        <td style="border: 0px; width: 7%;"><span class="label">INSIDE</span></td>
        <td style="width: 2.5%;"></td>
        <td style="border: 0px; width: 7%;"><span class="label">OWNER</span></td>
        <td style="border: 0px; border-left: 1px solid #000; border-bottom: 1px solid #000;">1</td>
        <td style="border-right: 0px;"><span class="label-bold">OCCUPIED AREA:</span></td>
        <td style="border-left: 0px; width: 5%;"><span class="label">SQFT</span></td>
      </tr>
      <tr>
        <td style="border-bottom: 0px;"><span class="label-bold">BLD #</span></td>
        <td style="width: 15%;"><span class="label-bold">CITY:</span> <span style="font-size: 12px;">BROOKLYN</span></td>
        <td style="width: 15%;"><span class="label-bold">STATE:</span> <span style="font-size: 12px;">NY</span></td>
        <td style=""></td>
        <td style="border: 0px;" rowspan="2"><span class="label">OUTSIDE</span></td>
        <td style="font-family: DejaVu Sans, sans-serif;">&#10003;</td>
        <td style="border: 0px;" rowspan="2"><span class="label">TENANT</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 15%;" rowspan="2"><span class="label-bold"># PART TIME EMPL</span></td>
        <td style="border-right: 0px;" class="label-bold"><span class="label-bold">OPEN TO PUBLIC AREA:</span></td>
        <td style="border-left: 0px; "><span class="label">SQFT</span></td>
      </tr>
      <tr>
        <td style="border: 0px; "></td>
        <td style=""><span class="label-bold">COUNTRY:</span></td>
        <td style=""><span class="label-bold">ZIP:</span> <span style="font-size: 12px;">11232</span></td>
        <td style=""></td>
        <td style=""></td>
        <td style="border-right: 0px;"><span class="label-bold">TOTAL BUILDING AREA:</span></td>
        <td style="border-left: 0px; "><span class="label">SQFT</span></td>
      </tr>
      <tr>
        <td style=""colspan="8"><span class="label-bold">DESCRIPTION OF OPERATIONS:</span></td>
        <td style=""colspan="2"><span class="label-bold">ANY AREA LEASED TO OTHERS? Y / N</span></td>
      </tr>
    </table>

    {{-- Additional Location rows (2-4) --}}
    @for($i = 2; $i <= 4; $i++)
      <table class="main-table">
        <tr>
          <td style="border: 0px; width: 5%;"><span class="label-bold">LOC #</span></td>
          <td style="border: 0px; border-left: 1px solid #000; width: 30%;" colspan="2"><span class="label-bold">STREET</span></td>
          <td style="border: 0px; border-left: 1px solid #000; width: 10%;" colspan="2"><span class="label-bold">CITY LIMITS</span></td>
          <td style="border: 0px; border-left: 1px solid #000; width: 10%;" colspan="2"><span class="label-bold">INTEREST</span></td>
          <td style="border: 0px; border-left: 1px solid #000; width: 12%;"><span class="label-bold"># FULL TIME EMPL</span></td>
          <td style="width: 18%;" colspan="2"><span class="label-bold">ANNUAL REVENUES: $</span> <span class="value" style="font-size: 12px;"></span></td>
        </tr>
        <tr>
          <td style="border: 0px; width: 5%; padding-left: 10px; font-size: 12px;" class="label"></td>
          <td style="border: 0px; border-left: 1px solid #000; font-size: 12px;" class="value" colspan="2"></td>
          <td style="width: 2.5%;"></td>
          <td style="border: 0px; width: 7%;"><span class="label">INSIDE</span></td>
          <td style="width: 2.5%;"></td>
          <td style="border: 0px; width: 7%;"><span class="label">OWNER</span></td>
          <td style="border: 0px; border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
          <td style="border-right: 0px;"><span class="label-bold">OCCUPIED AREA:</span></td>
          <td style="border-left: 0px; width: 5%;"><span class="label">SQFT</span></td>
        </tr>
        <tr>
          <td style="border-bottom: 0px;"><span class="label-bold">BLD #</span></td>
          <td style="width: 15%;"><span class="label-bold">CITY:</span> <span style="font-size: 12px;"></span></td>
          <td style="width: 15%;"><span class="label-bold">STATE:</span> <span style="font-size: 12px;"></span></td>
          <td style=""></td>
          <td style="border: 0px;" rowspan="2"><span class="label">OUTSIDE</span></td>
          <td style=""></td>
          <td style="border: 0px;" rowspan="2"><span class="label">TENANT</span></td>
          <td style="border: 0px; border-left: 1px solid #000; width: 15%;" rowspan="2"><span class="label-bold"># PART TIME EMPL</span></td>
          <td style="border-right: 0px;" class="label-bold"><span class="label-bold">OPEN TO PUBLIC AREA:</span></td>
          <td style="border-left: 0px; "><span class="label">SQFT</span></td>
        </tr>
        <tr>
          <td style="border: 0px; "></td>
          <td style=""><span class="label-bold">COUNTRY:</span></td>
          <td style=""><span class="label-bold">ZIP:</span> <span style="font-size: 12px;"></span></td>
          <td style=""></td>
          <td style=""></td>
          <td style="border-right: 0px;"><span class="label-bold">TOTAL BUILDING AREA:</span></td>
          <td style="border-left: 0px; "><span class="label">SQFT</span></td>
        </tr>
        <tr>
          <td style=""colspan="8"><span class="label-bold">DESCRIPTION OF OPERATIONS:</span></td>
          <td style=""colspan="2"><span class="label-bold">ANY AREA LEASED TO OTHERS? Y / N</span></td>
        </tr>
      </table>
    @endfor

      {{-- Nature of Business --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">NATURE OF BUSINESS</div>
      <table class="main-table" style="margin-top: 0px;">
        <tr>
          <td style="width: 3%;"></td>
          <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px;">APARTMENTS</td>
          <td style="width: 3%;"></td>
          <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px;">CONTRACTOR</td>
          <td style="width: 3%;"></td>
          <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px;">MANUFACTURING</td>
          <td style="width: 3%;"></td>
          <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px;">RESTAURANT</td>
          <td style="width: 3%;"></td>
          <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px;">SERVICE</td>
          <td style="width: 3%;"></td>
          <td class="label" style="border-bottom: 0px; font-size: 8px; padding: 2px 4px;"></td>
          <td class="label" style="font-size: 8px; padding: 2px 4px; width: 18%" rowspan="2">
            <span class="label-bold">DATE BUSINESS<br>STARTED (MM/DD/YYYY)</span>
            <div style="font-size: 12px; text-align: center; margin-bottom: 0px; padding-bottom: 0px;">09/24/2020</div>
          </td>
        </tr>
        <tr>
          <td style="width: 3%;"></td>
          <td class="label" style="vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>CONDOMINIUMS</div></td>
          <td style="width: 3%;"></td>
          <td class="label" style="vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>INSTITUTIONAL</div></td>
          <td style="width: 3%;"></td>
          <td class="label" style="vertical-align: middle; border-top: 0px; font-size: 8px; line-height: 0.5;"><div>OFFICE</div></td>
          <td style="width: 3%;"></td>
          <td class="label" style="vertical-align: middle; border-top: 0px; border-right: 0px; font-size: 8px; line-height: 0.5;"><div>RETAIL</div></td>
          <td style="width: 3%;"></td>
          <td class="label" style="border: 0px; font-size: 8px; padding: 2px 4px;">WHOLESALE</td>
          <td style="vertical-align: middle; border-left: 0px; border-top: 0px; font-size: 8px; line-height: 0.5;" colspan="2"><div>OTHER</div></td>
        </tr>
      </table>

      {{-- Description of Primary Operations --}}
      <table class="main-table" style="">
        <tr>
          <td style="border-bottom: 0px;"><div class="label-bold">DESCRIPTION OF PRIMARY OPERATIONS</div></td>
        </tr>
        <tr>
          <td style="height: 130px; vertical-align: top; border-top: 0px; font-size: 12px;">{{ $data['primary_operations'] ?? 'DELI CONSTRUCTION' }}</td>
        </tr>
      </table>

      {{-- Installation/Service Work --}}
      <table class="main-table" style="">
        <tr>
          <td style="width: 38%; border-bottom: 0px;"></td>
          <td style="width: 27%; border-bottom: 0px; text-align: center;"><span class="label-bold">INSTALLATION, SERVICE OR REPAIR WORK</span>
          </td>
          <td style="width: 35%; border-bottom: 0px; text-align: center;"><span class="label-bold">OFF PREMISES INSTALLATION, SERVICE OR REPAIR
              WORK</span></td>
        </tr>
        <tr>
          <td style="border-top: 0px; "><span class="label-bold">RETAIL STORES OR SERVICE OPERATIONS % OF TOTAL SALES:</span></td>
          <td style="border-top: 0px; text-align: center;">%</td>
          <td style="border-top: 0px; text-align: center;">%</td>
        </tr>
      </table>

      {{-- Description of Other Named Insureds --}}
      <table class="main-table" style="">
        <tr>
          <td style="border-bottom: 0px;"><div class="label-bold">DESCRIPTION OF OPERATIONS OF OTHER NAMED INSUREDS</div></td>
        </tr>
        <tr>
          <td style="height: 130px; vertical-align: top; border-top: 0px; font-size: 12px;"></td>
        </tr>
      </table>

      {{-- Footer --}}
      <div style="margin-top: 3px;" class="clearfix">
        <div class="footer-left">ACORD 125 (2025/03)</div>
        <div class="page-info">Page 2 of 5</div>
      </div>
  </div>

  {{-- ============ PAGE 3 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td style="text-align: right;">
          <div class="agency-id"><span class="label-bold">AGENCY CUSTOMER ID:</span> <span class="value-bold" style="text-decoration: underline;">{{ $data['agency_customer_id'] ?? '629318' }}</span></div>
        </td>
      </tr>
    </table>
    {{-- Additional Interest --}}
    <table class="main-table border-none">
      <tr>
        <td colspan="4" class="section-header border-none">ADDITIONAL INTEREST (Not all fields apply to all scenarios - provide only the necessary data) Attach ACORD 45 for more Additional Interests</td>
      </tr>
    </table>
    {{-- Questions 1-15 --}}
    <table class="main-table">
      <tr>
        <td style="border: 0px; width: 10%; padding-top: 2px;" colspan="4" class="border-bottom-none"><span class="label-bold">INTEREST</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 14%; padding-top: 2px;" class="border-bottom-none border-right-none"><span class="label-bold">NAME AND ADDRESS</span></td>
        <td style="border: 0px; border-left: 1px solid #000; width: 9%; padding-top: 2px;" class="border-bottom-none border-left-none"><span class="label-bold">RANK: _____</span></td>
        <td style="#000; width: 5%; padding-top: 2px;"><span class="label-bold">EVIDENCE:</span></td>
        <td style="width: 2.5%;"></td>
        <td style="#000; width: 5%; padding-top: 2px;"><span class="label-bold">CERTIFICATE</span></td>
        <td style="width: 2.5%;"></td>
        <td style="#000; width: 5%; padding-top: 2px;"><span class="label-bold">POLICY</span></td>
        <td style="width: 2.5%;"></td>
        <td style="#000; width: 8%; padding-top: 2px;"><span class="label-bold">SEND BILL</span></td>
        <td style="#000; width: 35%; padding-top: 2px;" colspan="2"><span class="label-bold">INTEREST IN ITEM NUMBER</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%; font-family: DejaVu Sans, sans-serif;">&#10003;</td>
        <td class="border-none"><span class="label-bold">ADDITIONAL INSURED</span></td>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">LIEN HOLDER</span></td>
        <td colspan="9" rowspan="5" class="border-top-none"><span class="label" style="font-size: 12px;">LANDLORD <br> 123 MERRY STREET<br> BROOKLYN NY 11232</span></td>
        <td><span class="label-bold">LOCATION:</span></td>
        <td><span class="label-bold">BUILDING:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">BREACH OF WARRANTY</span></td>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">LOSS PAYEE</span></td>
        <td><span class="label-bold">VEHICLE:</span></td>
        <td><span class="label-bold">BOAT:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 5px; padding-bottom: 5px;"><span class="label-bold">CO-OWNER</span></td>
        <td style="width: 2.5%;"></td>
        <td class="border-none" style="padding-top: 5px; padding-bottom: 5px;"><span class="label-bold">MORTGAGEE</span></span></td>
        <td><span class="label-bold">AIRPORT:</span></td>
        <td><span class="label-bold">AIRCRAFT:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">EMPLOYEE AS LESSOR</span></td>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">OWNER</span></td>
        <td><span class="label-bold">ITEM CLASS:</span></td>
        <td><span class="label-bold">ITEM:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">LEASEBACK OWNER</span></td>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">REGISTRANT</span></td>
        <td colspan="2" rowspan="2"><span class="label-bold">ITEM DESCRIPTION</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold" style="font-size: 7.5px;">LENDER'S LOSS PAYABLE</span></td>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold">TRUSTEE</span></td>
        <td colspan="3"><span class="label-bold">REFERENCE/ LOAN #:</span></td>
        <td colspan="6"><span class="label-bold">INTEREST END DATE:</span></td>
      </tr>
      <tr>
        <td style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold"></span></td>
        <td class="border-none" style="width: 2.5%;"></td>
        <td class="border-none"><span class="label-bold"></span></td>
        <td colspan="3"><span class="label-bold">LIEN AMOUNT:</span></td>
        <td colspan="6"><span class="label-bold">PHONE (A/C, No, Ext):</span></td>
        <td colspan="2"><span class="label-bold">FAX (A/C, No):</span></td>
      </tr>
      <tr>
        <td style="" colspan="7"><span class="label-bold">REASON FOR INTEREST:</span></td>
        <td style="" colspan="8"><span class="label-bold">E-MAIL ADDRESS:</span></td>
      </tr>
    </table>

    {{-- General Information --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">GENERAL INFORMATION</div>
    <table class="main-table">
      <tr>
        <td colspan="2"><span class="label-bold">EXPLAIN ALL "YES" RESPONSES</span></td>
        <td class="label-bold" style="text-align: cenetr;">Y/N</td>
      </tr>
      <tr>
        <td class="border-none" style="width: 3%;"><span class="label">1a.</span></td>
        <td class="border-none"><span class="label">IS THE APPLICANT A SUBSIDIARY OF ANOTHER ENTITY?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="padding-bottom: 15px; width: 65%;"><span class="label-bold">PARENT COMPANY NAME</span></td>
              <td class="border-bottom-none" style="padding-bottom: 15px; width: 25%;"><span class="label-bold">RELATIONSHIP DESCRIPTION</span></td>
              <td class="border-bottom-none" style="padding-bottom: 15px; width: 10%;"><span class="label-bold">% OWNED</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">1b.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">DOES THE APPLICANT HAVE ANY SUBSIDIARIES?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="padding-bottom: 15px; width: 65%;"><span class="label-bold">SUB SIDIARY COMPANY NAME</span></td>
              <td class="border-bottom-none" style="padding-bottom: 15px; width: 25%;"><span class="label-bold">RELATIONSHIP DESCRIPTION</span></td>
              <td class="border-bottom-none" style="padding-bottom: 15px; width: 10%;"><span class="label-bold">% OWNED</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">2.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">IS A FORMAL SAFETY PROGRAM IN OPERATION?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 75%;">
            <tr>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">SAFETY MANUAL</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">SAFETY POSITION</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">MONTHLY MEETINGS</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">OSHA</span></td>
              <td style="width: 3%;"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">3.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="label">ANY EXPOSURE TO FLAMMABLES, EXPLOSIVES, CHEMICALS?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">4.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">ANY OTHER INSURANCE WITH THIS COMPANY? (List policy numbers)</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="width: 24%;"><span class="label-bold">LINE OF BUSINESS</span></td>
              <td class="border-bottom-none" style="width: 25%;"><span class="label-bold">RPOLICY NUMBER</span></td>
              <td class="border-none" style="width: 2%;"><span class="label-bold"></span></td>
              <td class="border-bottom-none" style="width: 24%;"><span class="label-bold">LINE OF BUSINESS</span></td>
              <td class="border-bottom-none" style="width: 25%;"><span class="label-bold">POLICY NUMBER</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 24%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 25%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-none" style="width: 2%;"><span class="label-bold"></span></td>
              <td class="border-bottom-none" style="width: 24%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 25%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 24%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 25%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-none" style="width: 2%;"><span class="label-bold"></span></td>
              <td class="border-bottom-none" style="width: 24%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 25%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">5.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">ANY POLICY OR COVERAGE DECLINED, CANCELLED OR NON-RENEWED DURING THE PRIOR THREE (3) YEARS FOR ANY PREMISES OR
        <br>OPERATIONS? <span class="label-bold">(Missouri Applicants • Do not answer this question)</span></span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 100%;">
            <tr>
              <td style="width: 3%;"></td>
              <td class="border-none" style="width: 15%;"><span class="label-bold">NON-PAYMENT</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none" style="width: 30%;"><span class="label-bold">AGENT NO LONGER REPRESENTS CARRIER</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none"></td>
            </tr>
            <tr>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">NON-RENEWAL</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">UNDERWRITING</span></td>
              <td style="width: 3%;"></td>
              <td class="border-none" style=""><span class="label-bold">CONDITION CORRECTED (Describe):</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">6.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="label">ANY PAST LOSSES OR CLAIMS RELATING TO SEXUAL ABUSE OR MOLESTATION ALLEGATIONS, DISCRIMINATION OR NEGLIGENT HIRING?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">7.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="label">DURING THE LAST FIVE YEARS (TEN IN RI), HAS ANY APPLICANT BEEN INDICTED FOR OR CONVICTED OF ANY DEGREE OF THE CRIME OF FRAUD, BRIBERY, 
        <br>ARSON OR ANY OTHER ARSON-RELATED CRIME IN CONNECTION WITH THIS OR ANY OTHER PROPERTY?
        <br><span style="font-size: 9px;">(In RI, this question must be answered by any applicant for property insurance. Failure to disclose the existence of an
        arson conviction is a misdemeanor punishable by a
        sentence of up to one year of imprisonment. In VA the following notice applies: information concerning an arrest,
        charge, or conviction that has been sealed does not have <br>to be disclosed in the application)</span></span></td>
        <td rowspan="" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">8.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">ANY UNCORRECTED FIRE AND/OR SAFETY CODE VIOLATIONS?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">OCCUR DATE</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold">EXPLANATION</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold">RESOLUTION</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">RESOLVE</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">9.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">HAS THE APPLICANT HAD A FORECLOSURE FILED AGAINST THEM, HAD A FORECLOSURE, REPOSSESSION, BANKRUPTCY OR FILED FOR
        BANKRUPTCY <br>DURING THE LAST FIVE (5) YEARS?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">OCCUR DATE</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold">EXPLANATION</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold">RESOLUTION</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">RESOLVE</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">10.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">HAS APPLICANT HAD A JUDGEMENT OR LIEN DURING THE LAST FIVE (5) YEARS?</span></td>
        <td rowspan="2" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td class="border-none"><span class="label"></span></td>
        <td class="border-none">
          <table class="main-table border-none" style="width: 95%;">
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">OCCUR DATE</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold">EXPLANATION</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold">RESOLUTION</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold">RESOLVE</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
            <tr>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 40%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 30%;"><span class="label-bold" style=" color: white;">A</span></td>
              <td class="border-bottom-none" style="width: 15%;"><span class="label-bold" style=" color: white;">A</span></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">11.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">HAS BUSINESS BEEN PLACED IN A TRUST? <span class="label-bold">NAME OF TRUST:</span></span></td>
        <td rowspan="" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">12.</span></td>
        <td style="border: 0px; border-top: 1px solid #000;"><span class="label">ANY FOREIGN OPERATIONS, FOREIGN PRODUCTS DISTRIBUTED IN USA, OR US PRODUCTS SOLD/ DISTRIBUTED IN FOREIGN COUNTRIES?
          <br><span class="label-bold">(If "YES", attach ACORD 815 for Liability Exposure and/or ACORD 816 for Property Exposure)</span></span></td>
        <td rowspan="" style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">13.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="label">DOES APPLICANT HAVE OTHER BUSINESS VENTURES FOR WHICH COVERAGE IS NOT REQUESTED?</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">14.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="label">DOES APPLICANT OWN/ LEASE/ OPERATE ANY DRONES? (If "YES", describe use)</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
      <tr>
        <td style="border: 0px; width: 3%; border-top: 1px solid #000;"><span class="label">15.</span></td>
        <td style="border: 0px; border-top: 1px solid #000; padding-bottom: 30px;"><span class="label">DOES APPLICANT HIRE OTHERS TO OPERATE DRONES? (If ''YES", describe use)</span></td>
        <td style="width: 4%; text-align: center; vertical-align: middle;">N</td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 125 (2025/03)</div>
      <div class="page-info">Page 3 of 5</div>
    </div>
  </div>

  {{-- ============ PAGE 4 ============ --}}
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td style="text-align: right;">
          <div class="agency-id"><span class="label-bold">AGENCY CUSTOMER ID:</span> <span class="value-bold" style="text-decoration: underline;">{{ $data['agency_customer_id'] ?? '629318' }}</span></div>
        </td>
      </tr>
    </table>
    {{-- Additional Interest --}}
    <table class="main-table border-none">
      <tr>
        <td class="section-header border-none">REMARKS/ PROCESSING INSTRUCTIONS (ACORD 101, Remarks Schedule, may be attached if more space is required)</td>
      </tr>
      <tr>
        <td style="padding: 20px; border: 2px solid #000;"></td>
      </tr>
    </table>

    {{-- Prior Carrier Information --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">PRIOR CARRIER INFORMATION</div>
    <table class="main-table">
      <tr>
        <td style="width: 5%; padding-top: 5px; padding-bottom: 5px; text-align: center;"><span class="label-bold">YEAR</span></td>
        <td style="width: 12%; padding-top: 5px; padding-bottom: 5px;"><span class="label-bold">CATEGORY</span></td>
        <td style="width: 21%; padding-top: 5px; padding-bottom: 5px; text-align: center;"><span class="label-bold">GENERAL LIABILITY</span></td>
        <td style="width: 21%; padding-top: 5px; padding-bottom: 5px; text-align: center;"><span class="label-bold">AUTOMOBILE</span></td>
        <td style="width: 21%; padding-top: 5px; padding-bottom: 5px; text-align: center;"><span class="label-bold">PROPERTY</span></td>
        <td style="width: 20%; padding-top: 5px; padding-bottom: 5px;"><span class="label-bold">OTHER:</span></td>
      </tr>
      @for($year = 1; $year <= 3; $year++) <tr>
        <td rowspan="5" class="value">{{ $data['prior_year_'.$year] ?? '' }}</td>
        <td style="padding-top: 3px; padding-bottom: 3px;"><span class="label">CARRIER</span></td>
        <td class="value"></td>
        <td class="value"></td>
        <td class="value"></td>
        <td class="value"></td>
        </tr>
        <tr>
          <td style="padding-top: 3px; padding-bottom: 3px;"><span class="label">POLICY NUMBER</span></td>
          <td class="value"></td>
          <td class="value"></td>
          <td class="value"></td>
          <td class="value"></td>
        </tr>
        <tr>
          <td style="padding-top: 3px; padding-bottom: 3px;"><span class="label">PREMIUM</span></td>
          <td>$ </td>
          <td>$ </td>
          <td>$ </td>
          <td>$ </td>
        </tr>
        <tr>
          <td style="padding-top: 3px; padding-bottom: 3px;"><span class="label">EFFECTIVE DATE</span></td>
          <td class="value"></td>
          <td class="value"></td>
          <td class="value"></td>
          <td class="value"></td>
        </tr>
        <tr>
          <td style="padding-top: 3px; padding-bottom: 3px;"><span class="label">EXPIRATION DATE</span></td>
          <td class="value"></td>
          <td class="value"></td>
          <td class="value"></td>
          <td class="value"></td>
        </tr>
        @endfor
    </table>

    {{-- Loss History --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">
      LOSS HISTORY
      <span style="margin-left: 30px;">
        <span class="checkbox{{ ($data['loss_none'] ?? false) ? '-checked' : '' }}"></span>
         Check if none (Attach Loss Summary for Additional Loss Information)</span>
    </div>
    <table class="main-table">
      <tr>
        <td colspan="5" style="font-size: 6.5pt;">ENTER ALL CLAIMS OR LOSSES (REGARDLESS OF FAULT AND WHETHER OR NOT
          INSURED) OR OCCURRENCES THAT MAY GIVE RISE TO CLAIMS FOR THE LAST _____ YEARS</td>
        <td colspan="3" style="text-align: left; vertical-align: middle;"><span class="label">TOTAL LOSSES: $</span></td>
      </tr>
      <tr>
        <td style="width: 12%; text-align: center; vertical-align: middle;" class="label-bold">DATE OF<br>OCCURRENCE</td>
        <td style="width: 8%; text-align: center; vertical-align: middle;" class="label-bold">LINE</td>
        <td style="width: 32%; text-align: center; vertical-align: middle;" class="label-bold">TYPE/ DESCRIPTION OF OCCURRENCE OR CLAIM</td>
        <td style="width: 12%; text-align: center; vertical-align: middle;" class="label-bold">DATE OF CLAIM</td>
        <td style="width: 12%; text-align: center; vertical-align: middle;" class="label-bold">AMOUNT PAID</td>
        <td style="width: 12%; text-align: center; vertical-align: middle;" class="label-bold">AMOUNT RESERVED</td>
        <td style="width: 6%; text-align: center; vertical-align: middle;" class="label-bold">SUBRO-<br>GATION<br>Y/N</td>
        <td style="width: 6%; text-align: center; vertical-align: middle;" class="label-bold">CLAIM<br>OPEN<br>Y/N</td>
      </tr>
      <tr>
        <td style="height: 22px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    {{-- Signature Section --}}
    <div class="label-bold" style="font-size: 11px; padding: 6px 0px 2px;">SIGNATURE</div>
    <table class="main-table">
      <tr>
        <td style="width: 2.5%;"></td>
        <td style="padding: 3px 4px; font-size: 9.5px;">Copy of the Notice of Information Practices (Privacy) has been given to the applicant. (Not required in all states, contact your agent or broker for your state's requirements.)</td>
      </tr>
      <tr>
        <td style="padding: 5px 4px; font-size: 6.5pt; text-align: justify; line-height: 1.2;" colspan="2" class="border-bottom-none">
          PERSONAL INFORMATION ABOUT YOU, INCLUDING INFORMATION FROM A CREDIT OR OTHER INVESTIGATIVE REPORT, MAY BE
          COLLECTED FROM PERSONS OTHER THAN YOU IN CONNECTION WITH THIS APPLICATION FOR INSURANCE AND SUBSEQUENT
          AMENDMENTS AND RENEWALS. SUCH INFORMATION AS WELL AS OTHER PERSONAL AND PRIVILEGED INFORMATION COLLECTED BY US
          OR OUR AGENTS MAY IN CERTAIN CIRCUMSTANCES BE DISCLOSED TO THIRD PARTIES WITHOUT YOUR AUTHORIZATION. CREDIT
          SCORING INFORMATION MAY BE USED TO HELP DETERMINE EITHER YOUR ELIGIBILITY FOR INSURANCE OR THE PREMIUM YOU
          WILL BE CHARGED. WE MAY USE A THIRD PARTY IN CONNECTION WITH THE DEVELOPMENT OF YOUR SCORE. YOU MAY HAVE THE
          RIGHT TO REVIEW YOUR PERSONAL INFORMATION IN OUR FILES AND REQUEST CORRECTION OF ANY INACCURACIES. YOU MAY
          ALSO HAVE THE RIGHT TO REQUEST IN WRITING THAT WE CONSIDER EXTRAORDINARY LIFE CIRCUMSTANCES IN CONNECTION WITH
          THE DEVELOPMENT OF YOUR CREDIT SCORE. THESE RIGHTS MAY BE LIMITED IN SOME STATES. PLEASE CONTACT YOUR AGENT OR
          BROKER TO LEARN HOW THESE RIGHTS MAY APPLY IN YOUR STATE OR FOR INSTRUCTIONS ON HOW TO SUBMIT A REQUEST TO US
          FOR A MORE DETAILED DESCRIPTION OF YOUR RIGHTS AND OUR PRACTICES REGARDING PERSONAL INFORMATION.
        </td>
      </tr>
      <tr>
        <td style="padding: 5px 4px; font-size: 7.5pt; border-top: 0px;" colspan="2">
          (Not applicable in AZ., CA, DE, KS, MA, MN, ND, NY, OR, VA, or WV. Specific ACORD 38s are available for
          applicants in these states.)
          <span style="float: right; font0weight: bold;">(Applicant's Initials): ________</span>
        </td>
      </tr>
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
          </div>
        </td>
      </tr>
    </table>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 125 (2025/03)</div>
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
        <td class="value border-top-none" style="font-size: 12px;">{{ $data['producer_name_print'] ?? 'Steven Cabrera' }}</td>
        <td class="value border-top-none">{{ $data['producer_license'] ?? '' }}</td>
      </tr>
    </table>

    {{-- NY Fraud Warning --}}
    <div class="acord-page" style="border: 1px solid #000; padding: 4px;">
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

    {{-- Applicant Signature --}}
    <table class="main-table">
      <tr>
        <td style="width: 60%; padding-bottom: 20px;"><span class="label-bold">APPLICANT'S SIGNATURE</span></td>
        <td style="width: 15%;"><span class="label-bold">DATE</span></td>
        <td style="width: 25%;"><span class="label-bold">NATIONAL PRODUCER NUMBER</span></td>
      </tr>
    </table>

    {{-- Blank Section --}}
    <div style="border: 1px solid #000; padding: 115px; text-align: center;">
      <span style="font-size: 10pt; font-weight: bold;">THIS SECTION IS INTENTIONALLY LEFT BLANK</span>
    </div>

    {{-- Footer --}}
    <div style="margin-top: 3px;" class="clearfix">
      <div class="footer-left">ACORD 125 (2025/03)</div>
      <div class="page-info">Page 5 of 5</div>
    </div>
  </div>

</body>

</html>