<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Proposal - DON PEPE TORTAS Y JUGOS INC</title>
    <style>
        /* Reset and base styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            width: 816px;
            /* 8.5in in pixels at 96dpi */
            margin: 0 auto;
            background-color: white;
            color: black;
            font-size: 12px;
            line-height: 1.2;
        }

        .page {
            width: 816px;
            height: 1056px;
            /* 11in in pixels at 96dpi */
            padding: 48px;
            /* 0.5in in pixels */
            page-break-after: always;
            position: relative;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        /* Text styling */
        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
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

        /* Font sizes */
        .font-18 {
            font-size: 18px;
        }

        .font-16 {
            font-size: 16px;
        }

        .font-14 {
            font-size: 14px;
        }

        .font-12 {
            font-size: 12px;
        }

        .font-11 {
            font-size: 11px;
        }

        .font-10 {
            font-size: 10px;
        }

        /* Spacing */
        .mb-5 {
            margin-bottom: 5px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-15 {
            margin-bottom: 15px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .mb-25 {
            margin-bottom: 25px;
        }

        .mb-30 {
            margin-bottom: 30px;
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

        .mt-25 {
            margin-top: 25px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .ml-5 {
            margin-left: 5px;
        }

        .ml-10 {
            margin-left: 10px;
        }

        .ml-15 {
            margin-left: 15px;
        }

        .mr-5 {
            margin-right: 5px;
        }

        .mr-10 {
            margin-right: 10px;
        }

        .mr-15 {
            margin-right: 15px;
        }

        .p-5 {
            padding: 5px;
        }

        .p-10 {
            padding: 10px;
        }

        .p-15 {
            padding: 15px;
        }

        /* Layout */
        .flex {
            display: flex;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
        }

        .flex-1 {
            flex: 1;
        }

        .w-50 {
            width: 50%;
        }

        .w-48 {
            width: 48%;
        }

        .w-33 {
            width: 33.33%;
        }

        .w-100 {
            width: 100%;
        }

        /* Borders */
        .border-top {
            border-top: 1px solid #000;
        }

        .border-bottom {
            border-bottom: 1px solid #000;
        }

        .border-all {
            border: 1px solid #000;
        }

        .border-left {
            border-left: 1px solid #000;
        }

        .border-right {
            border-right: 1px solid #000;
        }

        /* Form elements */
        .form-line {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .underline-field {
            border-bottom: 1px solid #000;
            flex-grow: 1;
            margin-left: 5px;
            margin-right: 5px;
            min-height: 18px;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 60%;
            margin-top: 30px;
        }

        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            margin-right: 5px;
        }

        .checked::after {
            content: "X";
            font-weight: bold;
            display: block;
            text-align: center;
            line-height: 10px;
        }

        /* Specific elements */
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 15px;
        }

        .coverage-box {
            border: 1px solid #000;
            margin-bottom: 15px;
        }

        .coverage-header {
            background-color: #f0f0f0;
            padding: 5px;
            border-bottom: 1px solid #000;
            font-weight: bold;
        }

        .coverage-item {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .coverage-item:last-child {
            border-bottom: none;
        }

        .coverage-label {
            padding: 5px;
            width: 70%;
            border-right: 1px solid #000;
        }

        .coverage-value {
            padding: 5px;
            width: 30%;
        }

        .policy-protection {
            margin: 15px 0;
        }

        .protection-item {
            display: inline-block;
            width: 33%;
            margin-bottom: 5px;
        }

        .legal-text {
            font-size: 10px;
            margin: 10px 0;
        }

        .payment-info {
            margin: 15px 0;
        }

        /* Logo styling */
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 190px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Print styles */
        @media print {
            body {
                width: 100%;
                margin: 0;
            }

            .page {
                margin: 0;
                padding: 48px;
                height: 1056px;
                width: 816px;
                page-break-after: always;
                border: none;
            }
        }
    </style>
</head>

<body>
    <!-- Page 1 -->
    <div class="page">


        <div class="header">
            <div class="font-18 bold mb-5">INSURANCE PROPOSAL</div>
            <div class="font-16 bold mb-10">PROPUESTA DE SEGURO</div>
            <div class="mb-5">Prepared for:</div>
            <div class="bold mb-5">LUIS TUFINO</div>
            <div class="bold mb-5">DON PEPE TORTAS Y JUGOS INC</div>
            <div class="mb-5">September 1, 2025</div>
        </div>

        <div class="logo-container">
            <div class="logo"><img src="{{ asset('backend/images/logo.png') }}" alt="img"></div>
        </div>

        <div class="text-center">
            <div class="font-16 bold mb-10">SRC INSURANCE BROKERAGE INC.</div>
            <div class="mb-10">Business Owners Quote</div>
            <div class="font-11 mb-5">480-39th Street Suite 2F, Brooklyn, New York 11232</div>
            <div class="mb-5">718-438-0400</div>
            <div class="mb-5">info@srcinsurance.com</div>
            <div class="mb-5">www.srcinsurance.com</div>
        </div>
    </div>

    <!-- Page 2 -->
    <div class="page">


        <div class="header">
            <div class="font-16 bold mb-5">SRC INSURANCE BROKERAGE INC.</div>
            <div class="font-11 mb-5">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
            <div class="mb-5">718-438-0400</div>
        </div>



        <div class="text-center mb-10">
            <div class="font-16 bold mb-5">INSURANCE QUOTE</div>
            <div class="mb-5">Quote valid for 7 days</div>
            <div class="italic mb-15">This is not a BINDER, it is a copy of coverages requested on your behalf and is
                subject to insurance companies approval</div>
        </div>

        <div class="mb-20">
            <div class="form-line">
                <span>Date: <span class="underline-field">9/1/2025</span></span>
            </div>
            <div class="form-line">
                <span>Named Insured: <span class="underline-field">DON PEPE TORTAS Y JUGOS INC</span></span>
            </div>
            <div class="form-line">
                <span>Address: <span class="underline-field">3908 5TH AVENUE</span></span>
            </div>
            <div class="form-line">
                <span>City: <span class="underline-field">BROOKLYN</span></span>
                <span class="ml-15">State: <span class="underline-field">NY</span></span>
                <span class="ml-15">Zip Code: <span class="underline-field">11232</span></span>
            </div>
            <div class="form-line">
                <span>Telephone: <span class="underline-field">718-435-3826</span></span>
            </div>
            <div class="form-line">
                <span>Insurance Carrier: <span class="underline-field">NEXT</span></span>
            </div>
        </div>

        <div class="flex-between mb-20">
            <div class="w-48">
                <div class="coverage-box">
                    <div class="coverage-header">COMMERCIAL PROPERTY COVERAGE</div>
                    <div class="coverage-item">
                        <div class="coverage-label">Business Personal Property:</div>
                        <div class="coverage-value">$100,000.00</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-label">Building:</div>
                        <div class="coverage-value">NONE</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-label">Deductible:</div>
                        <div class="coverage-value">1,000</div>
                    </div>
                </div>
            </div>
            <div class="w-48">
                <div class="coverage-box">
                    <div class="coverage-header">COMMERCIAL GENERAL LIABILITY</div>
                    <div class="coverage-item">
                        <div class="coverage-label">General Aggregate:</div>
                        <div class="coverage-value">$2,000,000.00</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-label">Products & Completed Op.:</div>
                        <div class="coverage-value">$2,000,000.00</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-label">Each Occurrence:</div>
                        <div class="coverage-value">$1,000,000.00</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-label">Damage to Rented Premises:</div>
                        <div class="coverage-value">$100,000.00</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-label">Medical Expenses:</div>
                        <div class="coverage-value">$15,000.00</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="policy-protection mb-20">
            <div class="bold mb-10">POLICY PROTECTION</div>
            <div class="protection-item">Professional Liability: <span class="checkbox"></span> NO</div>
            <div class="protection-item">Liquor Liability: <span class="checkbox"></span> NO</div>
            <div class="protection-item">Business Interruption: <span class="checkbox "></span> YES</div>
            <div class="protection-item">Theft: <span class="checkbox "></span> YES</div>
            <div class="protection-item">Flood/Water Damage: <span class="checkbox"></span> NO</div>
            <div class="protection-item">Vandalism: <span class="checkbox "></span> YES</div>
            <div class="protection-item">Fire/Wind: <span class="checkbox "></span> YES</div>
        </div>

        <div class="payment-info mb-20">
            <div class="bold mb-10">PAYMENT INFORMATION</div>
            <div class="form-line">
                <span>Down Payment: <span class="underline-field">$1,196.18</span></span>
            </div>
            <div class="form-line">
                <span>Monthly Payments: <span class="underline-field">$273.09</span></span>
            </div>
            <div class="form-line">
                <span># of Months: <span class="underline-field">10</span></span>
            </div>
            <div class="form-line">
                <span>Finance Charge: <span class="underline-field">-</span></span>
            </div>
            <div class="form-line">
                <span>Total Policy Cost: <span class="underline-field">$3,927.00</span></span>
            </div>
            <div class="form-line">
                <span>Checks payable to: <span class="underline-field">"SRC Insurance Brokerage Inc."</span></span>
            </div>
            <div class="form-line">
                <span>Amount Paid Today: <span class="underline-field"></span></span>
            </div>
        </div>

        <div class="legal-text mb-20">
            This is a request for insurance with the above stated coverages. Acceptance of these monies does not
            guarantee coverage. Full down payment must be received to request bind order. If paid by Check, allow 3
            business days for check to clear.
        </div>

        <div class="mt-30">
            <div class="form-line">
                <span>LUIS TUFINO</span>
            </div>
            <div class="form-line">
                <span>Print Name</span>
                <div class="signature-line"></div>
            </div>
            <div class="form-line">
                <span>Sign Name</span>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>

    <!-- Page 3 -->
    <div class="page">


        <div class="header">
            <div class="font-16 bold mb-5">SRC INSURANCE BROKERAGE INC.</div>
            <div class="font-11 mb-5">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
            <div class="mb-5">718-438-0400</div>
        </div>

        <div class="text-center mb-20">
            <div class="font-16 bold">Service Fee Agreement</div>
        </div>

        <div class="legal-text mb-15">
            A Service Fee charge can be made only if you (The Insured) agree to this fee in writing. A
            commission will be received BY SRC Insurance Brokerage Inc. from the purchase of insurance.
        </div>

        <div class="legal-text mb-15">
            This agreement is made between SRC INSURANCE BROKERAGE INC. and
        </div>

        <div class="text-center bold mb-15">DON PEPE TORTAS Y JUGOS INC</div>

        <div class="text-center mb-15">On this <span class="underline-field">September 1, 2025</span></div>

        <div class="legal-text mb-15">
            It is agreed that every policy period in return for SRC Insurance Brokerage Inc. following services:
        </div>

        <div class="legal-text mb-15 ml-15">
            <div>- Placement and Securing Insurance Policy</div>
            <div>- Assistance with recommendations from inspection reports.</div>
            <div>- Policy Delivery.</div>
            <div>- Special services related to cancellations and notices.</div>
            <div>- Claims Assistance</div>
        </div>

        <div class="legal-text mb-15">
            The insured will pay SRC INSURANCE BROKERAGE INC. <span class="bold">$650.00</span>
        </div>

        <div class="border-top mb-20 mt-20"></div>

        <div class="legal-text mb-15">
            Se puede cobrar una tarifa de servicio solo si usted (el asegurado) acepta esta tarifa por escrito.
            SRC Insurance Brokerage Inc. recibirá una comisión por la compra del seguro.
        </div>

        <div class="legal-text mb-15">
            Este acuerdo se realiza entre SRC INSURANCE BROKERAGE INC. Y
        </div>

        <div class="text-center bold mb-15">DON PEPE TORTAS Y JUGOS INC</div>

        <div class="text-center mb-15">En la Fecha <span class="underline-field">Sep 1, 2025</span></div>

        <div class="legal-text mb-15">
            Se acuerda que cada periodo de la poliza a cambio de los siguientes servicios de src insurance brokerage inc
        </div>

        <div class="legal-text mb-15 ml-15">
            <div>- Colocacion y obstencion de la poliza de seguro.</div>
            <div>- Asistencia con las recomendaciones de los informes de inspeccion.</div>
            <div>- Entrega de Polizas</div>
            <div>- Servicios especiales relacionados con cancelaciones y avisos.</div>
            <div>- Asistencia en reclamos</div>
        </div>

        <div class="legal-text mb-15">
            El asegurado pagara a SRC INSURANCE BROKERAGE INC. <span class="bold">$650.00</span>
        </div>

        <div class="mt-30">
            <div class="text-center bold mb-15">DON PEPE TORTAS Y JUGOS INC</div>
            <div class="form-line">
                <span>LUIS TUFINO</span>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>

    <!-- Page 4 -->
    <div class="page">


        <div class="header">
            <div class="font-16 bold mb-5">SRC INSURANCE BROKERAGE INC.</div>
            <div class="font-11 mb-5">480 39th Street Suite 2F, Brooklyn, New York 11232</div>
            <div class="mb-5">718-438-0400 INFO@SRCINSURANCE.COM</div>
        </div>

        <div class="text-center mb-20">
            <div class="font-16 bold">Credit/ACH Payment Authorization</div>
        </div>

        <div class="legal-text mb-20">
            It is agreed that you hereby authorize SRC INSURANCE BROKERAGE INC. to initiate an automatic debit to the
            financial account indicated (and authorize said financial institution to honor such debit) for any and all
            installments due under the SRC INSURANCE BROKERAGE INC. quote or account number listed above. It is further
            agreed that any additional fees, including but not limited to, late fees, non-sufficient funds fees and
            cancellation fee, will also be charged and debited from the indicated account should they accrue during the
            term of the policy. The debited installment amount is subject to change in the event of the financing of an
            additional premium or the crediting of an endorsement refund to the original Premium Finance Agreement,
            which has been processed to your existing account. You further understand, agree and affirm that: (1) the
            information you have provided above is correct and accurate; (2) you are authorized to enter into this
            agreement and are the signer on the above account; (3) funds will be available to cover the amount of the
            existing obligation on the payment due date or the business day prior to the due date should the due date
            fall on a weekend or holiday;(4) this authorization will remain in full force and effect until either (a)
            you request termination of this agreement by providing SRC INSURANCE BROKERAGE INC written notice of the
            desire to terminate automatic ACH/Credit Card debit (15) days prior to desired termination date at the
            address or email below closed account. SRC INSURANCE BROKERAGE INC. reserves the right to remove this
            ACH/Credit Card Authorization at its sole discretion should an ACH/Credit Card be returned for any reason,
            but SRC INSURANCE BROKERAGE INC. reserves its right to reestablish future ACH/Credit Card debits based on
            this authorization unless this authorization has been terminated as outlined above.
        </div>

        <div class="mb-20">
            <div class="form-line">
                <span>I, <span class="underline-field">LUIS TUFINO</span></span>
            </div>
            <div class="form-line">
                <span>to charge my</span>
            </div>
            <div class="form-line">
                <span>Authorize SRC INSURANCE BROKERAGE INC,</span>
            </div>
            <div class="form-line">
                <span>FOR <span class="underline-field"></span> on <span class="underline-field">9/1/2025</span></span>
            </div>
        </div>

        <div class="flex-between mb-20">
            <div class="w-48">
                <div class="bold mb-10">CREDIT CARD</div>
                <div class="form-line">
                    <span>Card Number #: <span class="underline-field"></span></span>
                </div>
                <div class="form-line">
                    <span>Expiration: <span class="underline-field"></span></span>
                </div>
                <div class="form-line">
                    <span>CVV: <span class="underline-field"></span></span>
                </div>
                <div class="form-line">
                    <span>Zip Code: <span class="underline-field"></span></span>
                </div>
            </div>
            <div class="w-48">
                <div class="bold mb-10">ACH</div>
                <div class="form-line">
                    <span>Routing #: <span class="underline-field"></span></span>
                </div>
                <div class="form-line">
                    <span>Account#: <span class="underline-field"></span></span>
                </div>
            </div>
        </div>

        <div class="mt-30">
            <div class="form-line">
                <span>SIGNATURE</span>
                <div class="signature-line"></div>
            </div>
            <div class="form-line">
                <span>LUIS TUFINO</span>
            </div>
            <div class="form-line">
                <span>DON PEPE TORTAS Y JUGOS INC</span>
            </div>
        </div>
    </div>

    <!-- Page 5 -->
    <div class="page">


        <div class="form-line mb-15">
            <span class="bold">AGENCY CUSTOMER ID:</span> <span class="underline-field">1209557</span>
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in KY, OH and PA:</span> Any person who knowingly and with intent to defraud
            any insurance company or other person files an application for insurance or statement of claim containing
            any materially false information or conceals for the purpose of misleading, information concerning any fact
            material thereto commits a fraudulent insurance act, which is a crime and subjects such person to criminal
            and civil penalties.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in ME, TN, VA and WA:</span> It is a crime to knowingly provide false,
            incomplete or misleading information to an insurance company for the purpose of defrauding the company.
            Penalties (may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in NJ:</span> Any person who includes any false or misleading information on
            an application for an insurance policy is subject to criminal and civil penalties.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in OR:</span> Any person who knowingly and with intent to defraud or solicit
            another to defraud the insurer by submitting an application containing a false statement as to any material
            fact may be violating state law.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in PR:</span> Any person who knowingly and with the intention of defrauding
            presents false information in an insurance application, or presents, helps, or causes the presentation of a
            fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim for the
            same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each violation by a
            fine of not less than five thousand dollars ($5,000) and not more than ten thousand dollars ($10,000), or a
            fixed term of imprisonment for three (3) years, or both penalties. Should aggravating circumstances be
            present, the penalty thus established may be increased to a maximum of five (5) years, if extenuating
            circumstances are present, it may be reduced to a minimum of two (2) years.
        </div>

        <div class="legal-text mb-15">
            THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS
            BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE
            TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
        </div>

        <div class="border-all mb-15">
            <div class="flex border-bottom">
                <div class="coverage-label bold">PRODUCER'S SIGNATURE</div>
                <div class="coverage-value bold">PRODUCER'S NAME (Please Print)</div>
                <div class="coverage-value bold">STATE PRODUCER LICENSE NO (Required in Florida)</div>
            </div>
            <div class="flex">
                <div class="coverage-label" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
            </div>
        </div>

        <div class="legal-text mb-15">
            <span class="bold">Applicable in NY:</span> Any person who knowingly and with intent to defraud any
            insurance company or other person files an application for insurance or statement of claim containing any
            materially false information, or conceals for the purpose of misleading, information concerning any fact
            material thereto, commits a fraudulent insurance act, which is a crime, and shall also be subject to a civil
            penalty not to exceed five thousand dollars and the stated value of the claim for each such violation.
        </div>

        <div class="border-all mb-15">
            <div class="flex border-bottom">
                <div class="coverage-label bold">APPLICANTS SIGNATURE</div>
                <div class="coverage-value bold">DATE</div>
                <div class="coverage-value bold">NATIONAL PRODUCER NUMBER</div>
            </div>
            <div class="flex">
                <div class="coverage-label" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
            </div>
        </div>

        <div class="text-center mb-10">THIS SECTION IS INTENTIONALLY LEFT BLANK</div>

        <div class="text-center">ACORD 125 (2024/11) Page 5 of 5</div>
    </div>

    <!-- Page 6 -->
    <div class="page">


        <div class="legal-text mb-10">
            <span class="bold">Applicable in NJ:</span> Any person who includes any false or misleading information on
            an application for an insurance policy is subject to criminal and civil penalties.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in OR:</span> Any person who knowingly and with intent to defraud or solicit
            another to defraud the insurer by submitting an application containing a false statement as to any material
            fact may be violating state law.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in PR:</span> Any person who knowingly and with the intention of defrauding
            presents false information in an insurance application, or presents, helps, or causes the presentation of a
            fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim for the
            same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each violation by a
            fine of not less than five thousand dollars ($5,000) and not more than ten thousand dollars ($10,000), or a
            fixed term of imprisonment for three (3) years, or both penalties. Should aggravating circumstances be
            present, the penalty thus established may be increased to a maximum of five (5) years, if extenuating
            circumstances are present, it may be reduced to a minimum of two (2) years.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in NY: Applicable to all claim forms for insurance and all applications for
                commercial insurance and accident and health insurance:</span> Any person who knowingly and with intent
            to defraud any insurance company or other person files an application for insurance or statement of claim
            containing any materially false information, or conceals for the purpose of misleading, information
            concerning any fact material thereto, commits a fraudulent insurance act, which is a crime, and shall also
            be subject to a civil penalty not to exceed five thousand dollars and the stated value of the claim for each
            such violation.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in NY: Applicable to all applications and claim forms for automobile
                insurance:</span> Any person who knowingly and with intent to defraud any insurance company or other
            person files an application for commercial insurance or a statement of claim for any commercial or personal
            insurance benefits containing any materially false information, or conceals for the purpose of misleading,
            information concerning any fact material thereto, and any person who, in connection with such application or
            claim, knowingly makes or knowingly assists, abets, solicits or conspires with another to make a false
            report of the theft, destruction, damage or conversion of any motor vehicle to a law enforcement agency, the
            department of motor vehicles or an insurance company commits a fraudulent insurance act, which is a crime,
            and shall also be subject to a civil penalty not to exceed five thousand dollars and the value of the
            subject motor vehicle or stated claim for each violation.
        </div>

        <div class="legal-text mb-15">
            THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS
            BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE
            TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
        </div>

        <div class="border-all mb-15">
            <div class="flex border-bottom">
                <div class="coverage-label bold">PRODUCER'S SIGNATURE</div>
                <div class="coverage-value bold">PRODUCER'S NAME (Please Print)</div>
                <div class="coverage-value bold">STATE PRODUCER LICENSE NO (Required in Florida)</div>
            </div>
            <div class="flex">
                <div class="coverage-label" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
            </div>
        </div>

        <div class="border-all mb-15">
            <div class="flex border-bottom">
                <div class="coverage-label bold">APPLICANT'S SIGNATURE</div>
                <div class="coverage-value"></div>
                <div class="coverage-value bold">DATE</div>
                <div class="coverage-value bold">NATIONAL PRODUCER NUMBER</div>
            </div>
            <div class="flex">
                <div class="coverage-label" style="height: 30px;">✗</div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
            </div>
        </div>

        <div class="text-center mb-10">THIS SECTION IS INTENTIONALLY LEFT BLANK</div>

        <div class="text-center">ACORD 126 (2025/03) Page 5 of 5</div>
    </div>

    <!-- Page 7 -->
    <div class="page">


        <div class="text-center mb-20">
            <div class="font-16 bold">SIGNATURE</div>
        </div>

        <div class="form-line mb-15">
            <span class="bold">AGENCY CUSTOMER ID:</span> <span class="underline-field"></span>
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in AL, AR, DC, LA, MD, NM, RI and WV</span>
            Any person who knowingly (or willfully)* presents a false or fraudulent claim for payment of a loss or
            benefit or knowingly (or willfully)* presents false information in an application for insurance is guilty of
            a crime and may be subject to fines and confinement in prison. *Applies in MD Only.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in CO</span>
            It is unlawful to knowingly provide false, incomplete, or misleading facts or information to an insurance
            company for the purpose of defrauding or attempting to defraud the company. Penalties may include
            imprisonment, fines, denial of insurance and civil damages. Any insurance company or agent of an insurance
            company who knowingly provides false, incomplete, or misleading facts or information to a policyholder or
            claimant for the purpose of defrauding or attempting to defraud the policyholder or claimant with regard to
            a settlement or award payable from insurance proceeds shall be reported to the Colorado Division of
            Insurance within the Department of Regulatory Agencies.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in FL and OK</span>
            Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a statement of
            claim or an application containing any false, incomplete, or misleading information is guilty of a felony
            (of the third degree)*.* Applies in FL Only.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in KS</span>
            Any person who, knowingly and with intent to defraud, presents, causes to be presented or prepares with
            knowledge or belief that it will be presented to or by an insurer, purported insurer, broker or any agent
            thereof, any written statement as part of, or in support of, an application for the issuance of, or the
            rating of an insurance policy for personal or commercial insurance, or a claim for payment or other benefit
            pursuant to an insurance policy for commercial or personal insurance which such person knows to contain
            materially false information concerning any fact material thereto; or conceals, for the purpose of
            misleading, information concerning any fact material thereto commits a fraudulent insurance act.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in KY, NY, OH and PA</span>
            Any person who knowingly and with intent to defraud any insurance company or other person files an
            application for insurance or statement of claim containing any materially false information or conceals for
            the purpose of misleading, information concerning any fact material thereto commits a fraudulent insurance
            act, which is a crime and subjects such person to criminal and civil penalties* (not to exceed five thousand
            dollars and the stated value of the claim for each such violation)*.* Applies in NY Only.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in ME, TN, VA and WA</span>
            It is a crime to knowingly provide false, incomplete or misleading information to an insurance company for
            the purpose of defrauding the company. Penalties (may)* include imprisonment, fines and denial of insurance
            benefits.* Applies in ME Only.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in NJ</span>
            Any person who includes any false or misleading information on an application for an insurance policy is
            subject to criminal and civil penalties.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in OR</span>
            Any person who knowingly and with intent to defraud or solicit another to defraud the insurer by submitting
            an application containing a false statement as to any material fact may be violating state law.
        </div>

        <div class="legal-text mb-10">
            <span class="bold">Applicable in PR</span>
            Any person who knowingly and with the intention of defrauding presents false information in an insurance
            application, or presents, helps, or causes the presentation of a fraudulent claim for the payment of a loss
            or any other benefit, or presents more than one claim for the same damage or loss, shall incur a felony and,
            upon conviction, shall be sanctioned for each violation by a fine of not less than five thousand dollars
            ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term of imprisonment for three (3)
            years, or both penalties. Should aggravating circumstances [be] present, the penalty thus established may be
            increased to a maximum of five (5) years, if extenuating circumstances are present, it may be reduced to a
            minimum of two (2) years.
        </div>

        <div class="legal-text mb-15">
            THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS
            BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE
            TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
        </div>

        <div class="border-all mb-15">
            <div class="flex border-bottom">
                <div class="coverage-label bold">PRODUCER'S SIGNATURE</div>
                <div class="coverage-value bold">PRODUCER'S NAME (Please Print)</div>
                <div class="coverage-value bold">STATE PRODUCER LICENSE NO (Required in Florida)</div>
            </div>
            <div class="flex">
                <div class="coverage-label" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
            </div>
        </div>

        <div class="border-all mb-15">
            <div class="flex border-bottom">
                <div class="coverage-label bold">APPLICANTS SIGNATURE X</div>
                <div class="coverage-value bold">DATE</div>
                <div class="coverage-value bold">NATIONAL PRODUCER NUMBER</div>
            </div>
            <div class="flex">
                <div class="coverage-label" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
                <div class="coverage-value" style="height: 30px;"></div>
            </div>
        </div>

        <div class="text-center">ACORD 140 (2016/03) Page 3 of 3</div>
    </div>
</body>

</html>