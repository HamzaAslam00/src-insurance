<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ACORD 125 Commercial Insurance Application</title>
    <link rel="stylesheet" href="./index.css" />
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        body {
        font-family: Arial, Helvetica, sans-serif sans-serif;
        font-size: 11px;
        line-height: 1.3;
        }
        .page-container {
        width: 794px;
        margin: 0 auto;
        padding: 10px;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        }
        td {
        padding: 3px 5px;
        vertical-align: top;
        }
        .border-all {
        border: 1px solid #000;
        }
        .border-top {
        border-top: 1px solid #000;
        }
        .border-bottom {
        border-bottom: 1px solid #000;
        }
        .border-left {
        border-left: 1px solid #000;
        }
        .border-right {
        border-right: 1px solid #000;
        }
        .bold {
        font-weight: bold;
        }
        .text-center {
        text-align: center;
        }
        .text-right {
        text-align: right;
        }
        .small-text {
        font-size: 9px;
        }
        .tiny-text {
        font-size: 8px;
        }
        .header-bg {
        color: #000;
        font-weight: 800;
        padding: 5px;
        font-family: Arial, Helvetica, sans-serif;
        }
        .lines-of-business,
        .attachments-table,
        .policy-table tr td {
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
        }
        .label {
        font-size: 9px;
        font-weight: bold;
        }
        .input-field {
        border-bottom: 1px solid #000;
        min-height: 18px;
        }
        .checkbox {
        display: inline-block;
        width: 12px;
        height: 12px;
        border: 1px solid #000;
        margin-right: 3px;
        }
        .checkbox-filled {
        background-color: #000;
        }
        body {
        margin: 20px;
        font-family: Arial, sans-serif;
        }
        .policy-table {
        width: 100%;
        margin-top: 4px;
        }
        .policy-table td {
        border: 1px solid #000;
        padding: 6px 8px;
        font-size: 11px;
        }
        
        .bold {
        font-weight: 800;
        }
        .center {
        text-align: center;
        }
        
        .policy-table .header-bg {
        color: #000;
        font-weight: 800;
        padding: 5px;
        font-family: Arial, Helvetica, sans-serif;
        }
        
        body {
        margin: 20px;
        font-family: Arial, sans-serif;
        font-size: 10px;
        }
        .applicant-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 4px;
        }
        .applicant-table td {
        border: 1px solid #000;
        padding: 4px 6px;
        vertical-align: top;
        }
        .header-main {
        background-color: white;
        font-weight: 800;
        padding: 8px;
        }
        .bold {
        font-weight: 800;
        }
        .checkbox-cell {
        width: 12px;
        height: 12px;
        border: 1px solid #000;
        }
        .green-bg {
        background-color: #90ee90;
        }
        .footer-text {
        text-align: center;
        font-weight: 800;
        font-size: 11px;
        margin-top: 5px;
        }
        .small-text {
        font-size: 8px;
        }
        
        .org-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
        }
        .org-table td {
        border: 1px solid #000;
        padding: 6px 8px;
        vertical-align: middle;
        }
        .checkbox-cell {
        width: 15px;
        height: 20px;
        border: 1px solid #000;
        }
        .bold {
        font-weight: 800;
        }
        .small-text {
        font-size: 8px;
        }
        
        .operations-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
        }
        .operations-table td {
        border: 1px solid #000;
        padding: 8px;
        vertical-align: top;
        }
        .bold {
        font-weight: 800;
        }
        .center {
        text-align: center;
        }
        .large-cell {
        height: 150px;
        }
        
        .header {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 5px;
        }
        
        table {
        border-collapse: collapse;
        width: 100%;
        border: 2px solid black;
        }
        
        td {
        border: 1px solid black;
        padding: 4px 6px;
        font-size: 11px;
        vertical-align: top;
        }
        
        .checkbox-cell {
        width: 25px;
        text-align: center;
        vertical-align: middle;
        }
        
        .label-cell {
        font-weight: bold;
        font-size: 10px;
        line-height: 1.3;
        }
        
        .role-cell {
        font-size: 10px;
        text-align: center;
        }
        
        .address-cell {
        font-weight: bold;
        font-size: 13px;
        padding: 6px;
        }
        
        .field-label {
        font-weight: bold;
        font-size: 10px;
        }
        
        .checkmark {
        font-size: 18px;
        font-weight: bold;
        }
        
        .reason-row {
        background-color: #f0f0f0;
        }
        
        .checkbox-square {
        width: 14px;
        height: 14px;
        border: 1px solid black;
        display: inline-block;
        margin-right: 3px;
        vertical-align: middle;
        }
        
        .checked {
        background-color: black;
        position: relative;
        }
        
        .checked::after {
        content: "✓";
        color: white;
        position: absolute;
        top: -3px;
        left: 2px;
        font-size: 12px;
        font-weight: bold;
        }
        
        body {
        margin: 20px;
        font-family: Arial, sans-serif;
        font-size: 9px;
        }
        
        table {
        border-collapse: collapse;
        width: 100%;
        border: 2px solid black;
        }
        
        td {
        border: 1px solid black;
        padding: 3px 5px;
        vertical-align: top;
        }
        
        .header-row {
        background-color: #000;
        color: #fff;
        font-weight: bold;
        font-size: 10px;
        text-align: left;
        }
        
        .section-number {
        font-weight: bold;
        width: 25px;
        text-align: center;
        vertical-align: top;
        font-size: 9px;
        }
        
        .yn-column {
        width: 30px;
        text-align: center;
        font-weight: bold;
        font-size: 11px;
        background-color: #fff;
        }
        
        .label-bold {
        font-weight: bold;
        font-size: 8px;
        }
        
        .small-text {
        font-size: 7px;
        }
        
        .checkbox {
        width: 12px;
        height: 12px;
        border: 1px solid black;
        display: inline-block;
        margin-right: 3px;
        vertical-align: middle;
        }
        
        .footer-text {
        margin-top: 10px;
        font-weight: bold;
        font-size: 10px;
        }
        
        .page-number {
        text-align: right;
        font-weight: bold;
        font-size: 10px;
        }
        
        .header-row {
        background-color: #000;
        color: #fff;
        font-weight: bold;
        font-size: 9px;
        text-align: center;
        }
        
        .label-bold {
        font-weight: bold;
        font-size: 8px;
        }
        
        .small-text {
        font-size: 7px;
        line-height: 1.3;
        }
        
        .footer-text {
        margin-top: 10px;
        font-weight: bold;
        font-size: 10px;
        }
        
        .page-number {
        text-align: right;
        font-weight: bold;
        font-size: 10px;
        }
        
        .section-header {
        font-weight: bold;
        background-color: #f0f0f0;
        padding: 3px 5px;
        font-size: 8px;
        }
        
        .top-right-agency {
        text-align: right;
        font-size: 8px;
        margin-bottom: 5px;
        }
        
        .label-bold {
        font-weight: bold;
        font-size: 8px;
        }
        
        .small-text {
        font-size: 7px;
        line-height: 1.4;
        text-align: justify;
        }
        
        .top-right-agency {
        text-align: right;
        font-size: 9px;
        margin-bottom: 10px;
        font-weight: bold;
        }
        
        .section-text {
        border: 2px solid black;
        padding: 8px;
        margin-bottom: 10px;
        font-size: 8px;
        line-height: 1.4;
        text-align: justify;
        }
        
        .blank-section {
        border: 2px solid black;
        padding: 100px;
        text-align: center;
        font-weight: bold;
        font-size: 11px;
        margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- PAGE 1 -->
    <div class="page-container">
        <!-- Header -->
        <table
            style="width:100%; border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; padding-bottom: 0%;">
            <tr>
                <!-- LEFT: ACORD BOX -->
                <td style="width:20%;  font-size:34px; font-weight:100; font-family: Arial, Helvetica, sans-serif; ">
                    ACORD
                </td>

                <!-- CENTER: TITLE -->
                <td style="width:60%; text-align:center; padding:5px;">
                    <div style="font-size:16px; font-weight:bold;">COMMERCIAL INSURANCE APPLICATION</div>
                    <div style="font-size:12px; font-weight:bold; margin-top:5px;">APPLICANT INFORMATION SECTION</div>
                </td>

                <!-- RIGHT: DATE BOX -->
                <td style="width:20%; border:1px solid #000; text-align:center; padding:5px;">
                    <div style="font-size:10px; font-weight:bold;">DATE (MM/DD/YYYY)</div>
                    <div style="font-size:14px; font-weight:bold;  border:1px solid #000; margin-top:3px;">
                        08-06-2025
                    </div>
                </td>
            </tr>
        </table>

        <!-- Producer and Carrier Section -->
        <table
            style="width:100%; border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:11px; margin-top:5px;">
            <!-- 4 COLUMN MAIN ROW -->
            <tr>

                <!-- PRODUCER -->
                <td style="width:25%; border:1px solid #000;  vertical-align:top; margin: 0%; padding: 0%; ">
                    <div style="padding: 2px;">
                        <div style="font-weight:600;">PRODUCER</div>
                        <div style="font-weight:600; font-size: 16px;">SRC INSURANCE BROKERAGE INC.</div>
                        <div style="font-weight:600; font-size: 16px;">480 39th Street, Suite 2F</div>
                        <div style="padding-top: 12px; font-size: 16px; font-weight:600">Brooklyn, NY 11232</div>

                    </div>


                    <!-- CONTACT -->
                    <div
                        style=" border-top:1px solid #000; border-bottom:1px solid #000; padding: 2px; font-weight:600; font-size: 12px; ">
                        <div style="width: 20px; display: inline;">CONTACT NAME:</div> <span
                            style="font-weight:600; font-size: 16px;">Steven Cabrera</span>
                    </div>

                    <div style="border-bottom:1px solid #000; padding: 2px; font-weight:600; font-size: 12px;;">PHONE
                        <br /> (A/C,
                        No, Ext): <span style="font-weight:600; font-size: 16px;;">718-438-0400</span></div>
                    <div style="border-bottom:1px solid #000; padding: 2px; font-weight:600; font-size: 12px;;">FAX
                        <br />(A/C,
                        No): <span style="font-weight:600; font-size: 16px;">718-841-7227</span></div>
                    <div style="border-bottom:1px solid #000; padding: 2px; font-weight:600; font-size: 12px;">E-MAIL
                        <br />ADDRESS: <span style="font-weight:600; font-size: 16px;">INFO@SRCINSURANCE.COM</span>
                    </div>

                    <div style="width: 100%; display: flex; border-bottom: 1px solid #000;">
                        <!-- Code -->
                        <div
                            style="width: 50%; border-right:1px solid #000; padding: 2px; font-weight:600; font-size:12px;">
                            Code:
                        </div>
                        <!-- Subcode -->
                        <div style="width: 50%; padding: 2px; font-weight:600; font-size:12px;">
                            Subcode:
                        </div>
                    </div>

                    <!-- Next row for Agency Customer ID -->
                    <div
                        style="width: 100%; border-bottom:1px solid #000; padding:2px; font-weight:600; font-size:12px;">
                        AGENCY CUSTOMER ID: <span style="font-weight:600; font-size:16px;">629318</span>
                    </div>


                </td>
                <td style="width:25%; border:1px solid #000; vertical-align:top; margin: 0%; padding: 0%;">

                    <!-- CARRIER SECTION -->


                    <div style="display:flex; font-weight:600; font-size: 12px;">
                        <div
                            style="flex:1;border-bottom:1px solid #000; border-right:1px solid #000; padding:2px; height: 50px; width: 70%;">
                            Carrier</div>
                        <div style=" border-bottom:1px solid #000; padding:2px;">Naive Code</div>
                    </div>

                    <div style="display:flex;  margin-bottom:4px; font-weight:600; font-size: 12px;">
                        <div style="flex:1;border-bottom:1px solid #000; padding:2px; height: 50px; width: 70%;">Company
                            Policy or
                            Program name</div>
                        <div style=" border-bottom:1px solid #000; border-left:1px solid #000; padding:2px;">Program
                            Code</div>
                    </div>

                    <div
                        style="border-bottom:1px solid #000; padding: 4px; height: 50px; font-weight:600; font-size: 12px;">
                        Policy Number
                    </div>

                    <!-- UNDERWRITER SECTION -->
                    <div style="display:flex;  margin-bottom:4px; font-weight:600; font-size: 12px;">
                        <div style="flex:1;border-bottom:1px solid #000; padding:2px; height: 50px; width: 50%;">
                            Underwriter</div>
                        <div
                            style=" border-bottom:1px solid #000; border-left:1px solid #000; padding:2px; width: 50%;">
                            Underwriter
                            Office</div>
                    </div>


                    <!-- STATUS OF TRANSACTION -->
                    <div style="font-weight:bold; margin-top:8px; margin-bottom:4px; display: flex;">

                        <div style="display: flex; justify-content: center;">STATUS OF TRANSACTION</div>


                        <div style="display:flex; margin-bottom:4px;">
                            <div style="flex:1; ">☐ QUOTE <br />☐ BOUND (Give Date and/or Attach Copy): <br />☐ CHANGE
                                <br />☐ ISSUE
                                POLICY ☐ RENEW </div>
                        </div>

                        <div style="display:flex; gap:4px; margin-bottom:4px;">
                            <div style="flex:1; padding:2px; border-left: 1px solid #000;">DATE</div>
                            <div style="flex:1; padding:2px;border-left: 1px solid #000;">TIME</div>

                        </div>
                        <div>
                            ☐ AM
                            <br />
                            ☐ PM
                        </div>
                    </div>
                </td>

            </tr>

            <!-- NOTICE ROW -->
            <tr>
                <td colspan="4" style="border:1px solid #000; padding:12px; font-size:10.5px; line-height:1.3;">
                    <span style="font-weight:800;">NOTICE REGARDING CANCELLATION APPLICABLE IN SOUTH CAROLINA: THE
                        INSURER CAN
                        CANCEL THIS POLICY FOR WHICH YOU ARE
                        APPLYING WITHOUT CAUSE DURING THE FIRST 120 DAYS. THAT IS THE INSURER'S CHOICE. AFTER THE FIRST
                        120 DAYS,
                        THE INSURER CAN
                        ONLY CANCEL THIS POLICY FOR REASONS STATED IN THE POLICY.
                    </span>

                </td>
            </tr>

        </table>


        <!-- Lines of Business -->
        <table style="margin-top: 10px" class="lines-of-business">
            <tr>
                <td colspan="6" class="header-bg" style="font-weight: 800;">LINES OF BUSINESS</td>
            </tr>
            <tr class="small-text bold border-all border-top">
                <td></td>
                <td style="width: 30%; font-weight: 800;">INDICATE LINES OF BUSINESS</td>
                <td style="width: 14%; text-align: center; font-weight: 800;">PREMIUM</td>
                <td style="width: 30%"></td>
                <td style="width: 12%; text-align: center; font-weight: 800" ;>PREMIUM</td>
                <td style="width: 30%"></td>
                <td style="width: 14%; text-align: center; font-weight: 800"">PREMIUM</td>
      </tr>
      <tr class=" small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>BOILER & MACHINERY</td>
                <td class="border-left">$</td>
                <td class="border-left">CYBER AND PRIVACY</td>
                <td class="border-left">$</td>
                <td class="border-left">YACHT</td>
                <td class="border-left">$</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>BUSINESS AUTO</td>
                <td class="border-left">$</td>
                <td class="border-left">FIDUCIARY LIABILITY</td>
                <td class="border-left">$</td>
                <td class="border-left"></td>
                <td class="border-left">$</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>BUSINESS OWNERS</td>
                <td class="border-left">$</td>
                <td class="border-left">GARAGE AND DEALERS</td>
                <td class="border-left">$</td>
                <td class="border-left"></td>
                <td class="border-left">$</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>COMMERCIAL GENERAL LIABILITY</td>
                <td class="border-left">$</td>
                <td class="border-left">LIQUOR LIABILITY</td>
                <td class="border-left">$</td>
                <td class="border-left"></td>
                <td class="border-left">$</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>COMMERCIAL INLAND MARINE</td>
                <td class="border-left">$</td>
                <td class="border-left">MOTOR CARRIER</td>
                <td class="border-left">$</td>
                <td class="border-left"></td>
                <td class="border-left">$</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>COMMERCIAL PROPERTY</td>
                <td class="border-left">$</td>
                <td class="border-left">TRUCKERS</td>
                <td class="border-left">$</td>
                <td class="border-left"></td>
                <td class="border-left">$</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px; width:50px;"></td>
                <td>CRIME</td>
                <td class="border-left">$</td>
                <td class="border-left">UMBRELLA</td>
                <td class="border-left">$</td>
                <td class="border-left"></td>
                <td class="border-left">$</td>
            </tr>
        </table>

        <!-- Attachments -->
        <table class="attachments-table">
            <tr>
                <td colspan="7" class="header-bg">ATTACHMENTS</td>
            </tr>
            <tr class="small-text bold border-all border-top">
                <td style="width: 3%; border-right: #000 solid 1px;"></td>
                <td style="width: 3%;"></td>
                <td style="width: 30%; font-weight: 800;">ACCOUNTS RECEIVABLE / VALUABLE PAPERS</td>
                <td style="width: 3%;"></td>
                <td style="width: 30%; font-weight: 800;">GLASS AND SIGN SECTION</td>
                <td style="width: 3%;"></td>
                <td style="width: 28%; font-weight: 800;">STATEMENT / SCHEDULE OF VALUES</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>ADDITIONAL INTEREST SCHEDULE</td>
                <td class="" style="border:1px solid #000"></td>
                <td>HOTEL / MOTEL SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td>STATE SUPPLEMENT (If applicable)</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>ADDITIONAL PREMISES INFORMATION SCHEDULE</td>
                <td class="" style="border:1px solid #000"></td>
                <td>INSTALLATION / BUILDERS RISK SECTION</td>
                <td class="" style="border:1px solid #000"></td>
                <td>VACANT BUILDING SUPPLEMENT</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>APARTMENT BUILDING SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td>INTERNATIONAL LIABILITY EXPOSURE SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td>VEHICLE SCHEDULE</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>CONDO ASSN BYLAWS (for D&O Coverage only)</td>
                <td class="" style="border:1px solid #000"></td>
                <td>INTERNATIONAL PROPERTY EXPOSURE SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td></td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>CONTRACTORS SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td>LOSS SUMMARY</td>
                <td class="" style="border:1px solid #000"></td>
                <td></td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>COVERAGES SCHEDULE</td>
                <td class="" style="border:1px solid #000"></td>
                <td>OPEN CARGO SECTION</td>
                <td class="" style="border:1px solid #000"></td>
                <td></td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>DEALERS SECTION</td>
                <td class="" style="border:1px solid #000"></td>
                <td>PREMIUM PAYMENT SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td></td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>DRIVER INFORMATION SCHEDULE</td>
                <td class="" style="border:1px solid #000"></td>
                <td>PROFESSIONAL LIABILITY SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td></td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="border-right: #000 solid 1px;"></td>
                <td></td>
                <td>ELECTRONIC DATA PROCESSING SECTION</td>
                <td class="" style="border:1px solid #000"></td>
                <td>RESTAURANT / TAVERN SUPPLEMENT</td>
                <td class="" style="border:1px solid #000"></td>
                <td></td>
            </tr>
        </table>
        <!-- Policy Information -->
        <table class="policy-table">
            <tr>
                <td colspan="11" class="header-bg">POLICY INFORMATION</td>
            </tr>
            <tr>
                <td class="" style="width: 10%;">PROPOSED EFF DATE</td>
                <td class="" style="width: 10%;">PROPOSED EXP DATE</td>
                <td colspan="2" class="" style="width: 15%;">BILLING PLAN</td>
                <td class="" style="width: 10%;">PAYMENT PLAN</td>
                <td class="" style="width: 13%;">METHOD OF PAYMENT</td>
                <td class="" style="width: 8%;">AUDIT</td>
                <td class="" style="width: 10%;">DEPOSIT</td>
                <td class="" style="width: 10%;">MINIMUM PREMIUM</td>
                <td colspan="2" class="" style="width: 14%;">POLICY PREMIUM</td>
            </tr>
            <tr>
                <td class="center" style="font-size: 16px;"> 09/24/2030</td>
                <td class="center" style="font-size:16px;">09/24/2031</td>
                <td class="center" style="width: 7.5%;">☐ DIRECT</td>
                <td class="center" style="width: 7.5%;">☐ AGENCY</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="center">$</td>
                <td class="center">$</td>
                <td class="center" style="width: 7%;">$</td>

            </tr>
        </table>

        <!-- Applicant Information -->
        <table class="applicant-table">
            <tr>
                <td colspan="14" class="header-main">APPLICANT INFORMATION</td>
            </tr>
            <tr>
                <td rowspan="3" colspan="6" class="bold" style="width: 40%;">
                    NAME (First Named Insured) AND MAILING ADDRESS (including ZIP+4)<br><br>
                    <span class="">ABC CORP</span><br>
                    <span class="">123 MERRY STREET</span><br><br><br>
                    <span class="">Brooklyn, NY 11232</span>
                </td>
                <td colspan="2" class="bold" style="width: 10%;">GL CODE</td>
                <td colspan="2" class="bold" style="width: 10%;">SIC</td>
                <td colspan="3" class="bold" style="width: 15%;">NAICS</td>
                <td rowspan="3" class="bold" style="width: 12%;">FEIN OR SOC SEC #</td>
            </tr>
            <tr>
                <td colspan="8" class="bold">BUSINESS PHONE #:</td>
            </tr>
            <tr>
                <td colspan="8" class="bold">WEBSITE ADDRESS</td>
            </tr>
            <tr>
                <td class="checkbox-cell"></td>
                <td class="bold" style="width: 12%;">CORPORATION</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold" style="width: 15%;">JOINT VENTURE<br><span class="small-text">NO. OF
                        MEMBERS</span>
                </td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold" style="width: 15%;">NOT FOR PROFIT ORG</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold" style="width: 18%;">SUBCHAPTER "S" CORPORATION</td>
                <td class="checkbox-cell"></td>
                <td class="bold" rowspan="2">OTHER</td>
                <td class="checkbox-cell" rowspan="2"></td>
            </tr>
            <tr>
                <td class="checkbox-cell"></td>
                <td class="bold">INDIVIDUAL</td>
                <td class="checkbox-cell"></td>
                <td class="bold" style="width: 5%;">LLC</td>
                <td class="small-text" style="width: 10%;">NO. OF MEMBERS<br>AND MANAGERS:</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">PARTNERSHIP</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">TRUST</td>
                <td class="checkbox-cell"></td>
            </tr>
            <tr>
                <td rowspan="3" colspan="6" class="bold">
                    NAME (Other Named Insured) AND MAILING ADDRESS (including ZIP+4)
                </td>
                <td colspan="2" class="bold">GL CODE</td>
                <td colspan="2" class="bold">SIC</td>
                <td colspan="3" class="bold">NAICS</td>
                <td rowspan="3" class="bold">FEIN OR SOC SEC #</td>
            </tr>
            <tr>
                <td colspan="8" class="bold">BUSINESS PHONE #:</td>
            </tr>
            <tr>
                <td colspan="8" class="bold">WEBSITE ADDRESS</td>
            </tr>
            <tr>
                <td class="checkbox-cell"></td>
                <td class="bold">CORPORATION</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">JOINT VENTURE<br><span class="small-text">NO. OF MEMBERS</span></td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">NOT FOR PROFIT ORG</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">SUBCHAPTER "S" CORPORATION</td>
                <td class="checkbox-cell"></td>
                <td class="bold">OTHER</td>
                <td class="checkbox-cell"></td>
            </tr>
            <tr>
                <td class="checkbox-cell"></td>
                <td class="bold">INDIVIDUAL</td>
                <td class="checkbox-cell"></td>
                <td class="bold" style="width: 5%;">LLC</td>
                <td class="small-text" style="width: 10%;">NO. OF MEMBERS<br>AND MANAGERS:</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">PARTNERSHIP</td>
                <td class="checkbox-cell"></td>
                <td colspan="2" class="bold">TRUST</td>
                <td class="checkbox-cell"></td>
            </tr>
            <table>

                <tr style="border-left:1px solid #000; border-right:1px solid #000">
                    <td style="width: 50%">
                        NAME (Other Named Insured) AND MAILING ADDRESS (including ZIP+4)
                    </td>
                    <td style="width: 10%; border-left: 1px solid #000">GL CODE</td>
                    <td style="width: 8%; border-left: 1px solid #000">SIC</td>
                    <td style="width: 8%; border-left: 1px solid #000">NAICS</td>
                    <td style="width: 24%; border-left: 1px solid #000">
                        FEIN OR SOC SEC#
                    </td>
                </tr>
                <tr class="border-all border-top">
                    <td style="padding: 15px"></td>
                    <td class="border-left"></td>
                    <td class="border-left"></td>
                    <td class="border-left"></td>
                    <td class="border-left"></td>
                </tr>
                <tr class="small-text border-all border-top">
                    <td colspan="3">BUSINESS PHONE#: _______________________</td>
                    <td colspan="2" class="border-left">
                        WEBSITE ADDRESS: _______________________
                    </td>
                </tr>
                <table class="org-table">
                    <tr>
                        <td class="checkbox-cell"></td>
                        <td class="bold">CORPORATION</td>
                        <td class="checkbox-cell"></td>
                        <td class="bold">JOINT VENTURE</td>
                        <td class="checkbox-cell"></td>
                        <td class="bold">NOT FOR PROFIT ORG</td>
                        <td class="checkbox-cell"></td>
                        <td class="bold">SUBCHAPTER "S" CORPORATION</td>
                        <td class="checkbox-cell"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="checkbox-cell"></td>
                        <td class="bold">INDIVIDUAL</td>
                        <td class="checkbox-cell"></td>
                        <td class="bold">LLC</td>
                        <td class="small-text">NO. OF MEMBERS<br>AND MANAGERS:</td>
                        <td class="checkbox-cell"></td>
                        <td class="bold">PARTNERSHIP</td>
                        <td class="checkbox-cell"></td>
                        <td class="bold">TRUST</td>
                        <td class="bold">OTHER</td>
                    </tr>
                </table>

                <div style="margin-top: 10px; font-size: 9px; text-align: center">
                    <span class="bold">ACORD 125 (2025/03)</span> &nbsp;&nbsp;&nbsp; Page 1
                    of 5 &nbsp;&nbsp;&nbsp; © 1993-2025 ACORD CORPORATION. All rights
                    reserved.<br />
                    The ACORD name and logo are registered marks of ACORD
                </div>
            </table>
        </table>

    </div>

    <!-- PAGE BREAK -->
    <div style="page-break-after: always"></div>

    <!-- PAGE 2 -->
    <div class="page-container">

        <table style="margin-top: 10px;">
            <div class="small-text" style="margin-top: 5px; text-align: right">
                <span class="bold">AGENCY CUSTOMER ID: 629318</span>
            </div>
            <tr>
                <td style="font-size: 16px; font-weight: 600;">Application Information Continued</td>
            </tr>

            <tr style="border:1px solid #000; border-right:1px solid #000">
                <td style="width: 50%">
                    NAME (Other Named Insured) AND MAILING ADDRESS (including ZIP+4)
                </td>
                <td style="width: 10%; border-left: 1px solid #000">GL CODE</td>
                <td style="width: 8%; border-left: 1px solid #000">SIC</td>
                <td style="width: 8%; border-left: 1px solid #000">NAICS</td>
                <td style="width: 24%; border-left: 1px solid #000">
                    FEIN OR SOC SEC#
                </td>
            </tr>
            <tr class="border-all border-top">
                <td style="padding: 15px"></td>
                <td class="border-left"></td>
                <td class="border-left"></td>
                <td class="border-left"></td>
                <td class="border-left"></td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="3">BUSINESS PHONE#: _______________________</td>
                <td colspan="2" class="border-left">
                    WEBSITE ADDRESS: _______________________
                </td>
            </tr>
            <table class="org-table">
                <tr>
                    <td class="checkbox-cell"></td>
                    <td class="bold">CORPORATION</td>
                    <td class="checkbox-cell"></td>
                    <td class="bold">JOINT VENTURE</td>
                    <td class="checkbox-cell"></td>
                    <td class="bold">NOT FOR PROFIT ORG</td>
                    <td class="checkbox-cell"></td>
                    <td class="bold">SUBCHAPTER "S" CORPORATION</td>
                    <td class="checkbox-cell"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="checkbox-cell"></td>
                    <td class="bold">INDIVIDUAL</td>
                    <td class="checkbox-cell"></td>
                    <td class="bold">LLC</td>
                    <td class="small-text">NO. OF MEMBERS<br>AND MANAGERS:</td>
                    <td class="checkbox-cell"></td>
                    <td class="bold">PARTNERSHIP</td>
                    <td class="checkbox-cell"></td>
                    <td class="bold">TRUST</td>
                    <td class="bold">OTHER</td>
                </tr>
            </table>
        </table>

        <!-- Contact Information -->
        <table style="margin-top: 10px">
            <tr>
                <td colspan="4" class="header-bg">CONTACT INFORMATION</td>
            </tr>
            <tr class="border-all border-top">
                <td style="width: 50%; padding: 5px">
                    <div class="small-text">
                        <span class="bold">CONTACT TYPE:</span> OWNER
                    </div>
                    <div class="small-text">
                        <span class="bold">CONTACT NAME:</span> JOHN DOE
                    </div>
                    <div class="small-text" style="margin-top: 5px">
                        <span class="bold">PRIMARY</span> ☐ HOME ☐ BUS ☐ CELL
                    </div>
                    <div class="small-text">PHONE#: 123-456-7889</div>
                    <div class="small-text" style="margin-top: 5px">
                        <span class="bold">SECONDARY</span> ☐ HOME ☐ BUS ☐ CELL
                    </div>
                    <div class="small-text">PHONE#: _________________</div>
                    <div class="small-text" style="margin-top: 5px">
                        <span class="bold">PRIMARY E-MAIL ADDRESS:</span>
                        _______________________
                    </div>
                    <div class="small-text">
                        <span class="bold">SECONDARY E-MAIL ADDRESS:</span>
                        _______________________
                    </div>
                </td>
                <td style="width: 50%; border-left: 1px solid #000; padding: 5px">
                    <div class="small-text">
                        <span class="bold">CONTACT TYPE:</span> _____________
                    </div>
                    <div class="small-text">
                        <span class="bold">CONTACT NAME:</span> _____________
                    </div>
                    <div class="small-text" style="margin-top: 5px">
                        <span class="bold">PRIMARY</span> ☐ HOME ☐ BUS ☐ CELL
                    </div>
                    <div class="small-text">PHONE#: _________________</div>
                    <div class="small-text" style="margin-top: 5px">
                        <span class="bold">SECONDARY</span> ☐ HOME ☐ BUS ☐ CELL
                    </div>
                    <div class="small-text">PHONE#: _________________</div>
                    <div class="small-text" style="margin-top: 5px">
                        <span class="bold">PRIMARY E-MAIL ADDRESS:</span>
                        _______________________
                    </div>
                    <div class="small-text">
                        <span class="bold">SECONDARY E-MAIL ADDRESS:</span>
                        _______________________
                    </div>
                </td>
            </tr>
        </table>



        <!-- Premises Information -->
        <table style="margin-top: 10px">
            <tr>
                <td colspan="6" class="header-bg">
                    PREMISES INFORMATION (Attach ACORD 823 for Additional Premises)
                </td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="width: 5%" class="bold">LOC#</td>
                <td style="width: 30%" class="border-left bold">STREET</td>
                <td style="width: 5%" class="border-left bold">BLD#</td>
                <td style="width: 20%" class="border-left bold">CITY: BROOKLYN</td>
                <td style="width: 10%" class="border-left bold">STATE: NY</td>
                <td style="width: 10%" class="border-left bold">ZIP: 11232</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td>1</td>
                <td class="border-left">123 MERRY STREET</td>
                <td class="border-left"></td>
                <td class="border-left" colspan="3">COUNTY: _________________</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="2">
                    CITY LIMITS &nbsp;&nbsp; ☐ INSIDE &nbsp;&nbsp; ☑ OUTSIDE
                </td>
                <td colspan="2" class="border-left">
                    INTEREST &nbsp;&nbsp; ☑ OWNER &nbsp;&nbsp; ☐ TENANT
                </td>
                <td class="border-left"># FULL TIME EMPL<br />1</td>
                <td class="border-left"># PART TIME EMPL<br />___</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    ANNUAL REVENUES: $
                    <span class="bold">150,000</span> &nbsp;&nbsp;&nbsp; OCCUPIED AREA:
                    ______ SQ FT &nbsp;&nbsp;&nbsp; OPEN TO PUBLIC AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; TOTAL BUILDING AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; ANY AREA LEASED TO OTHERS? Y / N
                </td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    <span class="bold">DESCRIPTION OF OPERATIONS:</span>
                </td>
            </tr>
        </table>

        <!-- Additional Location Entries (Empty) -->
        <table style="margin-top: 5px">
            <tr class="small-text border-all">
                <td style="width: 5%" class="bold">LOC#</td>
                <td style="width: 30%" class="border-left bold">STREET</td>
                <td style="width: 5%" class="border-left bold">BLD#</td>
                <td style="width: 20%" class="border-left bold">CITY:</td>
                <td style="width: 10%" class="border-left bold">STATE:</td>
                <td style="width: 10%" class="border-left bold">ZIP:</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td></td>
                <td class="border-left"></td>
                <td class="border-left"></td>
                <td class="border-left" colspan="3">COUNTY: _________________</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="2">
                    CITY LIMITS &nbsp;&nbsp; ☐ INSIDE &nbsp;&nbsp; ☐ OUTSIDE
                </td>
                <td colspan="2" class="border-left">
                    INTEREST &nbsp;&nbsp; ☐ OWNER &nbsp;&nbsp; ☐ TENANT
                </td>
                <td class="border-left"># FULL TIME EMPL<br />___</td>
                <td class="border-left"># PART TIME EMPL<br />___</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    ANNUAL REVENUES: $ ______ &nbsp;&nbsp;&nbsp; OCCUPIED AREA: ______
                    SQ FT &nbsp;&nbsp;&nbsp; OPEN TO PUBLIC AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; TOTAL BUILDING AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; ANY AREA LEASED TO OTHERS? Y / N
                </td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    <span class="bold">DESCRIPTION OF OPERATIONS:</span>
                </td>
            </tr>
        </table>

        <table style="margin-top: 5px">
            <tr class="small-text border-all">
                <td style="width: 5%" class="bold">LOC#</td>
                <td style="width: 30%" class="border-left bold">STREET</td>
                <td style="width: 5%" class="border-left bold">BLD#</td>
                <td style="width: 20%" class="border-left bold">CITY:</td>
                <td style="width: 10%" class="border-left bold">STATE:</td>
                <td style="width: 10%" class="border-left bold">ZIP:</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td></td>
                <td class="border-left"></td>
                <td class="border-left"></td>
                <td class="border-left" colspan="3">COUNTY: _________________</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="2">
                    CITY LIMITS &nbsp;&nbsp; ☐ INSIDE &nbsp;&nbsp; ☐ OUTSIDE
                </td>
                <td colspan="2" class="border-left">
                    INTEREST &nbsp;&nbsp; ☐ OWNER &nbsp;&nbsp; ☐ TENANT
                </td>
                <td class="border-left"># FULL TIME EMPL<br />___</td>
                <td class="border-left"># PART TIME EMPL<br />___</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    ANNUAL REVENUES: $ ______ &nbsp;&nbsp;&nbsp; OCCUPIED AREA: ______
                    SQ FT &nbsp;&nbsp;&nbsp; OPEN TO PUBLIC AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; TOTAL BUILDING AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; ANY AREA LEASED TO OTHERS? Y / N
                </td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    <span class="bold">DESCRIPTION OF OPERATIONS:</span>
                </td>
            </tr>
        </table>

        <table style="margin-top: 5px">
            <tr class="small-text border-all">
                <td style="width: 5%" class="bold">LOC#</td>
                <td style="width: 30%" class="border-left bold">STREET</td>
                <td style="width: 5%" class="border-left bold">BLD#</td>
                <td style="width: 20%" class="border-left bold">CITY:</td>
                <td style="width: 10%" class="border-left bold">STATE:</td>
                <td style="width: 10%" class="border-left bold">ZIP:</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td></td>
                <td class="border-left"></td>
                <td class="border-left"></td>
                <td class="border-left" colspan="3">COUNTY: _________________</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="2">
                    CITY LIMITS &nbsp;&nbsp; ☐ INSIDE &nbsp;&nbsp; ☐ OUTSIDE
                </td>
                <td colspan="2" class="border-left">
                    INTEREST &nbsp;&nbsp; ☐ OWNER &nbsp;&nbsp; ☐ TENANT
                </td>
                <td class="border-left"># FULL TIME EMPL<br />___</td>
                <td class="border-left"># PART TIME EMPL<br />___</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    ANNUAL REVENUES: $ ______ &nbsp;&nbsp;&nbsp; OCCUPIED AREA: ______
                    SQ FT &nbsp;&nbsp;&nbsp; OPEN TO PUBLIC AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; TOTAL BUILDING AREA: ______ SQ FT
                    &nbsp;&nbsp;&nbsp; ANY AREA LEASED TO OTHERS? Y / N
                </td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="6" style="padding: 3px">
                    <span class="bold">DESCRIPTION OF OPERATIONS:</span>
                </td>
            </tr>
        </table>

        <!-- Nature of Business -->
        <table style="margin-top: 10px">
            <tr>
                <td colspan="4" class="header-bg">NATURE OF BUSINESS</td>
            </tr>
            <tr class="small-text border-all border-top">
                <td style="width: 50%">
                    ☐ APARTMENTS &nbsp;&nbsp; ☐ CONDOMINIUMS &nbsp;&nbsp; ☐ CONTRACTOR
                    &nbsp;&nbsp; ☐ INSTITUTIONAL &nbsp;&nbsp; ☐ MANUFACTURING<br />
                    ☐ OFFICE &nbsp;&nbsp; ☐ RESTAURANT &nbsp;&nbsp; ☐ RETAIL
                    &nbsp;&nbsp; ☐ SERVICE &nbsp;&nbsp; ☐ WHOLESALE &nbsp;&nbsp; ☐ OTHER
                </td>
                <td style="width: 50%; border-left: 1px solid #000">
                    <div>
                        <span class="bold">DATE BUSINESS STARTED (MM)
                            <div style="margin-top: 10px; font-size: 9px; text-align: center">
                                <span class="bold">ACORD 125 (2025/03)</span>
                                &nbsp;&nbsp;&nbsp; Page 2 of 5
                            </div>
                        </span>
                    </div>
                </td>
            </tr>
            <tr class="small-text border-all border-top">
                <td colspan="2" style="padding: 5px">

                    <div class="small-text bold">DESCRIPTION OF PRIMARY OPERATIONS</div>
                    <div>DELI</div>

                    <table class="operations-table">
                        <tr>
                            <td class="bold" style="width: 33.33%;"></td>
                            <td class="bold center" style="width: 33.33%;">INSTALLATION, SERVICE OR REPAIR WORK</td>
                            <td class="bold center" style="width: 33.34%;">OFF PREMISES INSTALLATION, SERVICE OR REPAIR
                                WORK</td>
                        </tr>
                        <tr>
                            <td class="bold">RETAIL STORES OR SERVICE OPERATIONS % OF TOTAL SALES:</td>
                            <td class="bold center">%</td>
                            <td class="bold center">%</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="bold large-cell">DESCRIPTION OF OPERATIONS OF OTHER NAMED INSUREDS
                            </td>
                        </tr>
                    </table>
                    <div style="margin-top: 10px; font-size: 9px; text-align: center">
                        <span class="bold">ACORD 125 (2025/03)</span> &nbsp;&nbsp;&nbsp;
                        Page 2 of 5
                    </div>
        </table>
        <!-- Additional Interest -->
        <table>
            <tr>
                <td class="field-label">INTEREST</td>
                <td colspan="2"></td>
                <td class="field-label">NAME AND ADDRESS</td>
                <td class="field-label">RANK:</td>
                <td class="field-label">EVIDENCE:</td>
                <td class="field-label">CERTIFICATE</td>
                <td class="field-label">POLICY</td>
                <td class="field-label">SEND BILL</td>
                <td colspan="2" class="field-label">INTEREST IN ITEM NUMBER</td>
            </tr>
            <tr>
                <td rowspan="7" style="vertical-align: top; padding-top: 8px;">
                    <div style="margin-bottom: 3px;"><span class="checkbox-square checked"></span> <span
                            style="font-size: 9px; font-weight: bold;">ADDITIONAL<br>&nbsp;&nbsp;&nbsp;&nbsp;INSURED</span>
                    </div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">BREACH
                            OF<br>&nbsp;&nbsp;&nbsp;&nbsp;WARRANTY</span></div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">CO-OWNER</span></div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">EMPLOYEE<br>&nbsp;&nbsp;&nbsp;&nbsp;AS
                            LESSOR,<br>&nbsp;&nbsp;&nbsp;&nbsp;LEASEBACK<br>&nbsp;&nbsp;&nbsp;&nbsp;OWNER</span></div>
                    <div><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">LENDER'S<br>&nbsp;&nbsp;&nbsp;&nbsp;LOSS
                            PAYABLE</span></div>
                </td>
                <td colspan="2" style="vertical-align: top; padding-top: 8px;">
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">LIENHOLDER</span></div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">LOSS PAYEE</span></div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">MORTGAGEE</span></div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">OWNER</span></div>
                    <div style="margin-bottom: 3px;"><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">REGISTRANT</span></div>
                    <div><span class="checkbox-square"></span> <span
                            style="font-size: 9px; font-weight: bold;">TRUSTEE</span>
                    </div>
                </td>
                <td rowspan="3" class="address-cell">
                    <div>LANDLORD</div>
                    <div>123 MERRY STREET</div>
                    <div>BROOKLYN NY 11232</div>
                </td>
                <td colspan="5"></td>
                <td class="field-label">LOCATION:</td>
                <td class="field-label">BUILDING:</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="5"></td>
                <td class="field-label">VEHICLE:</td>
                <td class="field-label">BOAT:</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="5"></td>
                <td class="field-label">AIRPORT:</td>
                <td class="field-label">AIRCRAFT:</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="5"></td>
                <td class="field-label">ITEM<br>CLASS:</td>
                <td class="field-label">ITEM:</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td class="field-label">REFERENCE / LOAN #:</td>
                <td colspan="3" class="field-label">INTEREST END DATE:</td>
                <td colspan="3" class="field-label">ITEM DESCRIPTION</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td class="field-label">LIEN AMOUNT:</td>
                <td colspan="3" class="field-label">PHONE (A/C, No, Ext):</td>
                <td colspan="3" class="field-label">FAX (A/C, No):</td>
            </tr>
            <tr>
                <td colspan="2" class="reason-row"><span class="field-label">REASON FOR INTEREST:</span></td>
                <td colspan="7" class="field-label">E-MAIL ADDRESS:</td>
            </tr>
        </table>


        <!-- General Information -->
        <table>
            <tr class="header-bg">
                <td colspan="4">GENERAL INFORMATION</td>
            </tr>
            <tr>
                <td colspan="3" class="label-bold">EXPLAIN ALL "YES" RESPONSES</td>
                <td class="label-bold" style="text-align: right;">Y/N</td>
            </tr>
            <tr>
                <td class="section-number">1a.</td>
                <td colspan="2">
                    IS THE APPLICANT A SUBSIDIARY OF ANOTHER ENTITY ?<br>
                    <span class="label-bold">PARENT COMPANY NAME</span>
                </td>
                <td rowspan="2" class="yn-column">N</td>
            </tr>
            <tr>
                <td></td>
                <td class="label-bold">RELATIONSHIP DESCRIPTION</td>
                <td class="label-bold">% OWNED</td>
            </tr>
            <tr>
                <td class="section-number">1b.</td>
                <td colspan="2">
                    DOES THE APPLICANT HAVE ANY SUBSIDIARIES?<br>
                    <span class="label-bold">SUBSIDIARY COMPANY NAME</span>
                </td>
                <td rowspan="2" class="yn-column">N</td>
            </tr>
            <tr>
                <td></td>
                <td class="label-bold">RELATIONSHIP DESCRIPTION</td>
                <td class="label-bold">% OWNED</td>
            </tr>
            <tr>
                <td class="section-number">2.</td>
                <td colspan="2">
                    IS A FORMAL SAFETY PROGRAM IN OPERATION?<br>
                    <span class="checkbox"></span> <span class="label-bold">SAFETY MANUAL</span>
                    <span class="checkbox"></span> <span class="label-bold">SAFETY POSITION</span>
                    <span class="checkbox"></span> <span class="label-bold">MONTHLY MEETINGS</span>
                    <span class="checkbox"></span> <span class="label-bold">OSHA</span>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">3.</td>
                <td colspan="2">ANY EXPOSURE TO FLAMMABLES, EXPLOSIVES, CHEMICALS?</td>
                <td rowspan="2" class="yn-column">N</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td class="section-number">4.</td>
                <td colspan="2">
                    ANY OTHER INSURANCE WITH THIS COMPANY? (List policy numbers)<br>
                    <table style="width: 100%; border: none; margin-top: 3px;">
                        <tr>
                            <td style="border: 1px solid black; width: 35%; padding: 2px;"><span class="label-bold">LINE
                                    OF
                                    BUSINESS</span></td>
                            <td style="border: 1px solid black; width: 35%; padding: 2px;"><span
                                    class="label-bold">POLICY
                                    NUMBER</span></td>
                            <td style="border: 1px solid black; width: 35%; padding: 2px;"><span class="label-bold">LINE
                                    OF
                                    BUSINESS</span></td>
                            <td style="border: 1px solid black; width: 35%; padding: 2px;"><span
                                    class="label-bold">POLICY
                                    NUMBER</span></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                        </tr>
                    </table>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">5.</td>
                <td colspan="2">
                    ANY POLICY OR COVERAGE DECLINED, CANCELLED OR NON-RENEWED DURING THE PRIOR THREE (3) YEARS FOR ANY
                    PREMISES
                    OR<br>
                    OPERATIONS? (Measure Applicants - Do not answer this question)<br>
                    <span class="checkbox"></span> <span class="label-bold">NON-PAYMENT</span>
                    <span class="checkbox"></span> <span class="label-bold">AGENT NO LONGER REPRESENTS CARRIER</span>
                    <span class="checkbox"></span><br>
                    <span class="checkbox"></span> <span class="label-bold">NON-RENEWAL</span>
                    <span class="checkbox"></span> <span class="label-bold">NOT RENEWED BECAUSE RISKS CONDITION
                        CORRECTED
                        (Describe)</span>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">6.</td>
                <td colspan="2">ANY PAST LOSSES OR CLAIMS RELATING TO: SEXUAL ABUSE OR MOLESTATION ALLEGATIONS,
                    DISCRIMINATION
                    OR NEGLIGENT HIRING?</td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">7.</td>
                <td colspan="2">
                    DURING THE LAST FIVE YEARS (TEN IN RI), HAS ANY APPLICANT BEEN INDICTED FOR OR CONVICTED OF ANY
                    DEGREE OF THE
                    CRIME OF FRAUD, BRIBERY,<br>
                    ARSON OR ANY OTHER ARSON-RELATED CRIME OR CRIME INVOLVING MORAL TURPITUDE?<br>
                    <span class="small-text">Has any individual Applicant been convicted of a crime, had a professional
                        or
                        vocational license suspended or revoked, or is such action pending? (This question applies to
                        a<br>
                        sentence of up to one year of imprisonment. In VA the following notice applies: Information
                        concerning an
                        arrest, charge, or conviction that has been sealed does not have<br>
                        to be disclosed in the Application.)</span>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">8.</td>
                <td colspan="2">
                    ANY UNCORRECTED FIRE AND/OR SAFETY CODE VIOLATIONS?<br>
                    <table style="width: 100%; border: none; margin-top: 3px;">
                        <tr>
                            <td style="border: 1px solid black; width: 20%; padding: 2px;"><span
                                    class="label-bold">OCCUR DATE</span>
                            </td>
                            <td style="border: 1px solid black; width: 30%; padding: 2px;"><span
                                    class="label-bold">EXPLANATION</span>
                            </td>
                            <td style="border: 1px solid black; width: 30%; padding: 2px;"><span
                                    class="label-bold">RESOLUTION</span>
                            </td>
                            <td style="border: 1px solid black; width: 20%; padding: 2px;"><span
                                    class="label-bold">RESOLVE
                                    DATE</span></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                        </tr>
                    </table>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">9.</td>
                <td colspan="2">
                    HAS THE APPLICANT HAD A FORECLOSURE FILED AGAINST THEM, HAD A FORECLOSURE, REPOSSESSION, BANKRUPTCY
                    OR FILED
                    FOR BANKRUPTCY<br>
                    DURING THE LAST FIVE (5) YEARS?<br>
                    <table style="width: 100%; border: none; margin-top: 3px;">
                        <tr>
                            <td style="border: 1px solid black; width: 20%; padding: 2px;"><span
                                    class="label-bold">OCCUR DATE</span>
                            </td>
                            <td style="border: 1px solid black; width: 30%; padding: 2px;"><span
                                    class="label-bold">EXPLANATION</span>
                            </td>
                            <td style="border: 1px solid black; width: 30%; padding: 2px;"><span
                                    class="label-bold">RESOLUTION</span>
                            </td>
                            <td style="border: 1px solid black; width: 20%; padding: 2px;"><span
                                    class="label-bold">RESOLVE
                                    DATE</span></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                        </tr>
                    </table>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">10.</td>
                <td colspan="2">
                    HAS APPLICANT HAD A JUDGEMENT OR LIEN DURING THE LAST FIVE (5) YEARS?<br>
                    <table style="width: 100%; border: none; margin-top: 3px;">
                        <tr>
                            <td style="border: 1px solid black; width: 20%; padding: 2px;"><span
                                    class="label-bold">OCCUR DATE</span>
                            </td>
                            <td style="border: 1px solid black; width: 30%; padding: 2px;"><span
                                    class="label-bold">EXPLANATION</span>
                            </td>
                            <td style="border: 1px solid black; width: 30%; padding: 2px;"><span
                                    class="label-bold">RESOLUTION</span>
                            </td>
                            <td style="border: 1px solid black; width: 20%; padding: 2px;"><span
                                    class="label-bold">RESOLVE
                                    DATE</span></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                            <td style="border: 1px solid black; padding: 8px;"></td>
                        </tr>
                    </table>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">11.</td>
                <td colspan="2">HAS BUSINESS BEEN PLACED IN A TRUST? <span class="label-bold">NAME OF TRUST:</span></td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">12.</td>
                <td colspan="2">
                    ANY FOREIGN OPERATIONS, FOREIGN PRODUCTS DISTRIBUTED IN USA, OR U.S. PRODUCTS SOLD / DISTRIBUTED IN
                    FOREIGN
                    COUNTRIES?<br>
                    <span class="small-text">(If "YES", attach ACORD 815 for Liability Exposure and/or ACORD 816 for
                        Property
                        Exposure)</span>
                </td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">13.</td>
                <td colspan="2">DOES APPLICANT HAVE OTHER BUSINESS VENTURES FOR WHICH COVERAGE IS NOT REQUESTED?</td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">14.</td>
                <td colspan="2">DOES APPLICANT OWN / LEASE / OPERATE ANY DRONES? (If "YES", describe use)</td>
                <td class="yn-column">N</td>
            </tr>
            <tr>
                <td class="section-number">15.</td>
                <td colspan="2">DOES APPLICANT HIRE OTHERS TO OPERATE DRONES? (If "YES", describe use)</td>
                <td class="yn-column">N</td>
            </tr>
        </table>



        <div class="top-right-agency">
            <span class="label-bold">AGENCY CUSTOMER ID:</span> 629318
        </div>

        <div class="section-header">
            <span class="label-bold">REMARKS / PROCESSING INSTRUCTIONS</span> (ACORD 101, Additional Remarks Schedule,
            may be
            attached if more space is required)
        </div>

        <table style="margin-bottom: 10px;">
            <tr>
                <td style="height: 60px;"></td>
            </tr>
        </table>

        <div class="section-header">
            PRIOR CARRIER INFORMATION
        </div>

        <table style="margin-bottom: 10px;">
            <tr>
                <td style="width: 10%; font-weight: bold;">YEAR</td>
                <td style="width: 15%; font-weight: bold;">CATEGORY</td>
                <td class="header-row" style="width: 25%;">GENERAL LIABILITY</td>
                <td class="header-row" style="width: 25%;">AUTOMOBILE</td>
                <td class="header-row" style="width: 15%;">PROPERTY</td>
                <td class="header-row" style="width: 10%;">OTHER:</td>
            </tr>
            <tr>
                <td rowspan="4"></td>
                <td class="label-bold">CARRIER</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="label-bold">POLICY NUMBER</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="label-bold">PREMIUM</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
            </tr>
            <tr>
                <td class="label-bold">EFFECTIVE DATE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="label-bold">EXPIRATION DATE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="4"></td>
                <td class="label-bold">CARRIER</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="label-bold">POLICY NUMBER</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="label-bold">PREMIUM</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
            </tr>
            <tr>
                <td class="label-bold">EFFECTIVE DATE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="label-bold">EXPIRATION DATE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="4"></td>
                <td class="label-bold">CARRIER</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="label-bold">POLICY NUMBER</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="label-bold">PREMIUM</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
                <td>$</td>
            </tr>
            <tr>
                <td class="label-bold">EFFECTIVE DATE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="label-bold">EXPIRATION DATE</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="section-header">
            LOSS
            HISTORY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                style="font-weight: normal;">Check if none</span>&nbsp;&nbsp;&nbsp;&nbsp;(Attach Loss Summary for
            Additional
            Loss Information)
        </div>

        <table style="margin-bottom: 10px;">
            <tr>
                <td colspan="7" class="small-text">
                    LIST ALL CLAIMS OR LOSSES, REGARDLESS OF FAULT, AND WHETHER OR NOT INSURED OR OCCURRENCES THAT MAY
                    GIVE RISE
                    TO CLAIMS<br>
                    FOR THE LAST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEARS
                </td>
                <td class="label-bold">TOTAL LOSSES: $</td>
                <td class="label-bold">SUBROG.<br>RECV'D</td>
                <td class="label-bold">CLAIM<br>OPEN</td>
            </tr>
            <tr>
                <td class="label-bold" style="width: 8%;">DATE OF<br>OCCURRENCE</td>
                <td class="label-bold" style="width: 8%;">LINE</td>
                <td class="label-bold" style="width: 35%;">TYPE / DESCRIPTION OF OCCURRENCE OR CLAIM</td>
                <td class="label-bold" style="width: 12%;">DATE OF CLAIM</td>
                <td class="label-bold" style="width: 12%;">AMOUNT PAID</td>
                <td class="label-bold" style="width: 12%;">AMOUNT RESERVED</td>
                <td class="label-bold" style="width: 5%;">DATE<br>Y / N</td>
                <td style="width: 8%;"></td>
                <td class="label-bold" style="width: 5%;">Y / N</td>
                <td class="label-bold" style="width: 5%;">Y / N</td>
            </tr>
            <tr>
                <td style="height: 25px;"></td>
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
                <td style="height: 25px;"></td>
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
                <td style="height: 25px;"></td>
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

        <div class="section-header">
            SIGNATURE
        </div>

        <div class="small-text" style="margin-top: 5px; margin-bottom: 5px;">
            <input type="checkbox" style="vertical-align: middle;"> <span class="label-bold">I Give a 15 Day Notice of
                Information Practices (Privacy) has been given to the applicant. (Not required in all states; contact
                your agent
                or broker for your state's requirements.)</span>
        </div>

        <div class="small-text" style="margin-bottom: 10px; text-align: justify; line-height: 1.4;">
            <span class="label-bold">PERSONAL INFORMATION ABOUT YOU, INCLUDING INFORMATION FROM A CREDIT OR OTHER
                INVESTIGATIVE REPORT, MAY BE COLLECTED FROM PERSONS OTHER THAN YOU IN CONNECTION WITH THIS APPLICATION
                FOR
                INSURANCE AND SUBSEQUENT AMENDMENTS AND RENEWALS. SUCH INFORMATION AS WELL AS OTHER PERSONAL AND
                PRIVILEGED
                INFORMATION COLLECTED BY US OR OUR AGENTS MAY IN CERTAIN CIRCUMSTANCES BE DISCLOSED TO THIRD PARTIES
                WITHOUT
                YOUR AUTHORIZATION. IF YOU WOULD LIKE ADDITIONAL INFORMATION ABOUT OUR INFORMATION PRACTICES PLEASE
                CONTACT YOUR
                AGENT, IF YOU WOULD LIKE TO REQUEST ACCESS TO OR CORRECTION OF YOUR INFORMATION PLEASE CONTACT YOUR
                AGENT OR
                INSURER. IF YOU WISH TO MAKE A COMPLAINT ABOUT OUR INFORMATION PRACTICES, IN SOME JURISDICTIONS YOU MAY
                DO SO BY
                CONTACTING YOUR STATE DEPARTMENT OF INSURANCE AND IN SOME INSTANCES, A THIRD PARTY MAY BE CHARGED. WE
                MAY USE A
                THIRD PARTY IN CONNECTION WITH THE DEVELOPMENT OF YOUR SCORE. YOU MAY HAVE THE RIGHT TO REVIEW YOUR
                PERSONAL
                INFORMATION IN OUR FILES AND REQUEST CORRECTION OF ANY INACCURACIES. YOU MAY ALSO HAVE THE RIGHT TO
                REQUEST A
                DESCRIPTION OF THE REPORT INCLUDING THE SOURCES RELIED UPON IN MAKING THE REPORT. CONSUMER REPORTING
                AGENCIES
                MAY HAVE THEIR CREDIT HISTORIES SHARED IN SOME STATES. PLEASE CONTACT YOUR AGENT OR BROKER TO LEARN HOW
                THESE
                RIGHTS MAY APPLY IN YOUR STATE OR FOR INSTRUCTIONS ON HOW TO EXERCISE THESE RIGHTS IN YOUR STATE. IF YOU
                ARE A
                MEDICARE/MEDICAID BENEFICIARY IN GEORGIA THE FOLLOWING APPLIES: NO PORTION OF PREMIUMS SHALL INCLUDE A
                CHARGE
                FOR THE COST OF COMPLETING THIS FORM.</span><br><br>

            <span class="label-bold">(Not applicable in AZ, CA, DE, IA, MA, MN, NJ, NY, OR, VA, & WY. Specific ACORD 38s
                are
                available for applicants in these
                states.)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(applicant's
            initials)<br><br>

            <span class="label-bold">Applicable in AL, AR, LA, MD, NM, RI and WV:</span> Any person who knowingly (or
            willfully)* presents a false or fraudulent information to obtain or prevent payment of a loss or benefit or
            knowingly (or willfully)* presents false information in an application for insurance is guilty of a crime
            and may
            be subject to fines and confinement in prison. *Applies in MD Only.<br><br>

            <span class="label-bold">Applicable in CA:</span> For your protection, California law requires the following
            to
            appear on this form: Any person who knowingly presents false or fraudulent information to obtain or prevent
            an
            insurance policy from being issued or to present a claim for the payment of a loss is guilty of a crime and
            may be
            subject to fines and confinement in state prison.<br><br>

            <span class="label-bold">Applicable in CO:</span> It is unlawful to knowingly provide false, incomplete, or
            misleading facts or information to an insurance company for the purpose of defrauding or attempting to
            defraud the
            company. Penalties may include imprisonment, fines, denial of insurance and civil damages. Any insurance
            company
            or agent of an insurance company who knowingly provides false, incomplete, or misleading facts or
            information to a
            policyholder or claimant for the purpose of defrauding or attempting to defraud the policyholder or claimant
            with
            regard to a settlement or award payable from insurance proceeds shall be reported to the Colorado Division
            of
            Insurance within the Department of Regulatory Agencies.<br><br>

            <span class="label-bold">Applicable in DC:</span> WARNING: It is a crime to provide false or misleading
            information to an insurer for the purpose of defrauding the insurer or any other person. Penalties include
            imprisonment and/or fines. In addition, an insurer may deny insurance benefits if false information
            materially
            related to a claim was provided by the applicant.<br><br>

            <span class="label-bold">Applicable in FL and OK:</span> Any person who knowingly and with intent to injure,
            defraud, or deceive any insurer files a statement of claim or an application containing any false,
            incomplete, or
            misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.
        </div>

        <div style="display: flex; justify-content: space-between; margin-top: 10px;">
            <div class="footer-text">ACORD 125 (2025/03)</div>
            <div class="page-number">Page 4 of 5</div>
        </div>

        <!-- Additional State Warnings -->
        <table style="margin-top: 5px;">
            <tr class="tiny-text border-all">
                <td style="padding: 5px;">
                    <div><span class="bold">Applicable in KS:</span> Any person who, knowingly and with intent to
                        defraud,
                        presents, causes to be presented or prepares with knowledge or belief that it will be presented
                        to or
                        by an insurer, purported insurer, broker or any agent thereof, any written, electronic,
                        electronic
                        impulse, facsimile, magnetic, oral, or telephonic communication or statement as part of, or in
                        support
                        of, an application for the issuance of, or the rating of an insurance policy for personal or
                        commercial insurance, or a claim for payment or other benefit pursuant to an insurance policy
                        for
                        commercial or personal insurance which such person knows to contain materially false information
                        concerning any fact material thereto; or conceals, for the purpose of misleading, information
                        concerning any fact material thereto commits a fraudulent insurance act.</div>

                    <div style="margin-top: 5px;"><span class="bold">Applicable in KY, OH and PA:</span> Any person who
                        knowingly and with intent to defraud any insurance company or other person files an application
                        for
                        insurance or statement of claim containing any materially false information or conceals for the
                        purpose of misleading, information concerning any fact material thereto commits a fraudulent
                        insurance
                        act, which is a crime and subjects such person to criminal and civil penalties.</div>

                    <div style="margin-top: 5px;"><span class="bold">Applicable in ME, TN, VA and WA:</span> It is a
                        crime
                        to knowingly provide false, incomplete or misleading information to an insurance company for the
                        purpose of defrauding the company. Penalties (may)* include imprisonment, fines and denial of
                        insurance benefits. *Applies in ME Only.</div>

                    <div style="margin-top: 5px;"><span class="bold">Applicable in NJ:</span> Any person who includes
                        any
                        false or misleading information on an application for an insurance policy is subject to criminal
                        and
                        civil penalties.</div>

                    <div style="margin-top: 5px;"><span class="bold">Applicable in OR:</span> Any person who knowingly
                        and
                        with intent to defraud or solicit another to defraud the insurer by submitting an application
                        containing a false statement as to any material fact may be violating state law.</div>

                    <div style="margin-top: 5px;"><span class="bold">Applicable in PR:</span> Any person who knowingly
                        and
                        with the intention of defrauding presents false information in an insurance application, or
                        presents,
                        helps, or causes the presentation of a fraudulent claim for the payment of a loss or any other
                        benefit, or presents more than one claim for the same damage or loss, shall incur a felony and,
                        upon
                        conviction, shall be sanctioned for each violation by a fine of not less than five thousand
                        dollars
                        ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term of imprisonment for
                        three
                        (3) years, or both penalties. Should aggravating circumstances be present, the penalty thus
                        established may be increased to a maximum of five (5) years, if extenuating circumstances are
                        present,
                        it may be reduced to a minimum of two (2) years.</div>
                </td>
            </tr>
        </table>

        <!-- Signature Block -->
        <div class="top-right-agency">
            AGENCY CUSTOMER ID: 629318
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in KS:</span> Any person who, knowingly and with intent to defraud,
            presents,
            causes to be presented or prepares with knowledge or belief that it will be presented to or by an insurer,
            purported insurer, broker or any agent thereof, any written, electronic, electronic impulse, facsimile,
            magnetic,
            oral, or telephonic communication or statement as part of, or in support of, an application for the issuance
            of,
            or the rating of an insurance policy for personal or commercial insurance, or a claim for payment or other
            benefit
            pursuant to an insurance policy for personal or commercial insurance which such person knows to contain
            materially
            false information concerning any fact material thereto; or conceals, for the purpose of misleading,
            information
            concerning any fact material thereto commits a fraudulent insurance act.
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in KY, OH and PA:</span> Any person who knowingly and with intent to
            defraud
            any insurance company or other person files an application for insurance or statement of claim containing
            any
            materially false information or conceals for the purpose of misleading, information concerning any fact
            material
            thereto commits a fraudulent insurance act, which is a crime and subjects such person to criminal and civil
            penalties.
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in ME, TN, VA and WA:</span> It is a crime to knowingly provide false,
            incomplete or misleading information to an insurance company for the purpose of defrauding the company.
            Penalties
            (may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in NJ:</span> Any person who includes any false or misleading
            information on
            an application for an insurance policy is subject to criminal and civil penalties.
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in OR:</span> Any person who knowingly and with intent to defraud or
            solicit
            another to defraud the insurer by submitting an application containing a false statement as to any material
            fact
            may be violating state law.
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in PR:</span> Any person who knowingly and with the intention of
            defrauding
            presents false information in an insurance application, or presents, helps, or causes the presentation of a
            fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim for the
            same
            damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each violation by a fine
            of not
            less than five thousand dollars ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term
            of
            imprisonment for three (3) years, or both penalties. Should aggravating circumstances be present, the
            penalty thus
            established may be increased to a maximum of five (5) years, if extenuating circumstances are present, it
            may be
            reduced to a minimum of two (2) years.
        </div>

        <div class="section-text">
            <span class="label-bold">APPLICABLE IN VERMONT:</span> NOTICE – THE UNDERSIGNED IS AN AUTHORIZED
            REPRESENTATIVE OF
            THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON
            THIS
            APPLICATION. INSURE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER
            KNOWLEDGE.
        </div>

        <table style="margin-bottom: 10px;">
            <tr>
                <td style="width: 40%;" class="label-bold">PRODUCER/SIGNATURE</td>
                <td style="width: 40%;" class="label-bold">PRODUCER'S NAME (Please Print)</td>
                <td style="width: 20%;" class="label-bold">STATE PRODUCER LICENSE NO.<br>EXPIRATION DATE:</td>
            </tr>
            <tr>
                <td style="height: 30px;"></td>
                <td>Steven Cabrera</td>
                <td></td>
            </tr>
        </table>

        <div class="section-text">
            <span class="label-bold">Applicable in NY: Applicable to all claim forms for insurance and all applications
                for
                commercial insurance and accident and health insurance:</span> Any person who knowingly and with intent
            to
            defraud any insurance company or other person files an application for insurance or statement of claim
            containing
            any materially false information, or conceals for the purpose of misleading, information concerning any fact
            material thereto, commits a fraudulent insurance act, which is a crime, and shall also be subject to a civil
            penalty not to exceed five thousand dollars and the stated value of the claim for each such violation.
        </div>

        <div class="section-text">
            <span class="label-bold">Applicable in NY: Applicable to all applications and claim forms for automobile
                insurance:</span> Any person who knowingly and with intent to defraud any insurance company or other
            person
            files an application for insurance or a statement of claim for any commercial or personal insurance benefits
            containing any materially false information, or conceals for the purpose of misleading, information
            concerning any
            fact material thereto, and any person who, in connection with such application or claim, knowingly makes or
            knowingly assists, abets, solicits or conspires with another to make a false report of the theft,
            destruction,
            damage or conversion of any motor vehicle to a law enforcement agency, the department of motor vehicles or
            an
            insurance company, commits a fraudulent insurance act, which is a crime, and shall also be subject to a
            civil
            penalty not to exceed five thousand dollars and the value of the subject motor vehicle or stated claim for
            each
            violation.
        </div>

        <table>
            <tr>
                <td style="width: 50%;" class="label-bold">APPLICANT'S SIGNATURE</td>
                <td style="width: 25%;" class="label-bold">DATE</td>
                <td style="width: 25%;" class="label-bold">NATIONAL PRODUCER NUMBER</td>
            </tr>
            <tr>
                <td style="height: 30px;"></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="blank-section">
            THIS SECTION IS INTENTIONALLY LEFT BLANK
        </div>


        </td>
        </table>
        </td>
        </tr>
        </table>
    </div>
</body>

</html>