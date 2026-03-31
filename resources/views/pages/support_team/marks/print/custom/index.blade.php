<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report Sheet - {{ $sr->user->name }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap');

        :root {
            --primary-blue: #003087;
            /* Capville Navy */
            --secondary-blue: #0072ce;
            /* Capville Sky Blue */
            --light-blue-bg: #d9edf7;
            --text-black: #000000;
            --text-gray: #4a4a4a;
            --border-color: #d9edf7;
        }

        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            -webkit-print-color-adjust: exact;
        }

        .container {
            width: 210mm;
            min-height: 297mm;
            background-color: white;
            margin: 0 auto;
            padding: 5mm 8mm;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        @media print {
            body {
                background: none;
            }

            .container {
                margin: 0;
                padding: 2mm 5mm;
                width: 210mm;
                height: 297mm;
                overflow: hidden;
                border: none;
            }

            .no-print {
                display: none;
            }
        }

        /* Header Section */
        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: var(--light-blue-bg);
            padding: 8px 15px;
            margin-bottom: 2px;
            position: relative;
        }

        .student-photo-container {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 4px solid white;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        .student-photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .school-identity {
            text-align: center;
            flex: 1;
        }

        .school-identity h1 {
            font-size: 32px;
            font-weight: 900;
            margin: 0;
            color: var(--text-black);
            letter-spacing: -0.5px;
        }

        .school-identity p {
            font-size: 11px;
            font-weight: 700;
            margin: 5px auto;
            max-width: 500px;
            line-height: 1.25;
            color: var(--text-black);
        }

        .school-logo-container {
            width: 100px;
            text-align: right;
        }

        .school-logo-container img {
            max-height: 80px;
            width: auto;
        }

        /* Identity Bar */
        .identity-bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 12px;
            padding: 5px 0;
            border-bottom: 2px solid var(--light-blue-bg);
        }

        .student-info-left {
            text-align: left;
        }

        .student-info-left h2 {
            font-size: 20px;
            font-weight: 800;
            margin: 0;
            color: var(--text-black);
        }

        .student-id-code {
            font-size: 14px;
            font-weight: 700;
            color: var(--secondary-blue);
        }

        .report-info-right {
            text-align: right;
        }

        .report-info-right h3 {
            font-size: 18px;
            font-weight: 800;
            color: var(--secondary-blue);
            margin: 0;
            letter-spacing: 0.5px;
        }

        .session-info {
            font-size: 14px;
            font-weight: 800;
            color: var(--secondary-blue);
        }

        /* Summary Container */
        .summary-box {
            display: grid;
            grid-template-columns: repeat(4, 1fr) 100px;
            gap: 2px;
            background-color: var(--light-blue-bg);
            border-radius: 30px;
            padding: 10px 20px;
            margin-bottom: 10px;
            align-items: center;
        }

        .summary-col {
            padding: 0 5px;
        }

        .summary-title {
            font-size: 16px;
            font-weight: 800;
            color: var(--text-black);
            margin: 0 0 10px 0;
        }

        .summary-title::after {
            content: ' ——————';
            font-weight: 400;
            color: #777;
            letter-spacing: -2px;
        }

        .data-row {
            margin-bottom: 6px;
        }

        .data-label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            color: var(--text-gray);
            margin-bottom: 1px;
        }

        .data-value {
            display: block;
            font-size: 11px;
            font-weight: 800;
            color: var(--secondary-blue);
        }

        .qr-wrapper {
            background-color: white;
            padding: 8px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-wrapper img {
            width: 80px;
            height: 80px;
        }

        .scan-msg {
            font-size: 8px;
            font-weight: 800;
            color: var(--text-black);
            text-align: right;
            margin-top: 2px;
            display: block;
        }

        /* Section Headings with Icons */
        .section-separator {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 15px 0 10px;
            border-bottom: 2px solid var(--secondary-blue);
        }

        .section-icon-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-icon-title h3 {
            font-size: 16px;
            font-weight: 800;
            color: var(--secondary-blue);
            margin: 0;
            text-transform: uppercase;
        }

        .section-icon {
            width: 30px;
            height: auto;
        }

        /* Cognitive Domain Table */
        .cognitive-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8.5px;
            margin-bottom: 5px;
        }

        .cognitive-table th {
            color: var(--secondary-blue);
            padding: 4px 1px;
            text-align: center;
            font-weight: 800;
            border: none;
            background: white;
        }

        .cognitive-table td {
            padding: 2px 1px;
            text-align: center;
            color: var(--text-black);
            font-weight: 600;
        }

        .row-even {
            background-color: var(--light-blue-bg);
        }

        .row-odd {
            background-color: white;
        }

        .subject-name-col {
            text-align: left !important;
            padding-left: 10px !important;
            font-weight: 800 !important;
            width: 20%;
        }

        .remark-text {
            font-size: 8px;
            font-weight: 900;
            letter-spacing: 0.2px;
        }

        /* Assessment Section */
        .assessment-container {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 15px;
            margin-top: 5px;
        }

        .rating-legend {
            font-size: 8px;
            font-weight: 700;
            color: var(--text-black);
            text-align: center;
            margin-bottom: 5px;
            padding: 3px;
            background: #f9f9f9;
            border-radius: 4px;
        }

        .assessment-col h4 {
            font-size: 13px;
            font-weight: 800;
            color: var(--secondary-blue);
            margin: 0 0 5px 0;
            border-bottom: 1px solid var(--secondary-blue);
            padding-bottom: 2px;
        }

        .trait-grid-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2px 5px;
            margin-bottom: 1px;
            border-radius: 4px;
        }

        .trait-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-black);
        }

        sup {
            font-size: 8px;
            vertical-align: top;
            position: relative;
            top: -2px;
        }

        .rating-options {
            display: flex;
            gap: 12px;
        }

        .circle-rating {
            width: 14px;
            height: 14px;
            border: 2px solid var(--text-black);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .circle-rating.selected {
            background-color: #000;
        }

        .circle-rating.selected::after {
            content: '✔';
            font-size: 10px;
            font-weight: 900;
            color: #fff;
        }

        /* Bottom Footer */
        .print-footer {
            margin-top: 15px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .footer-flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .resumption-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-large-title {
            font-size: 18px;
            font-weight: 900;
            color: var(--secondary-blue);
            text-transform: uppercase;
        }

        .line-placeholder {
            border-bottom: 1.5px solid #333;
            width: 250px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <div class="container">
        {{-- Header Content --}}
        <div class="header-top">
            <div class="student-photo-container">
                <img src="{{ !empty($sr->user->photo) ? $sr->user->photo : Qs::getDefaultUserImage() }}" alt="Student">
            </div>

            <div class="school-identity">
                <h1>{{ strtoupper(Qs::getSetting('system_name')) }}</h1>
                <p>{{ ucwords($s['address']) }}</p>
            </div>

            <div class="school-logo-container">
                <img src="{{ $s['logo'] }}" alt="Logo">
            </div>
        </div>

        <div class="identity-bar">
            <div class="student-info-left">
                <h2>{{ strtoupper($sr->user->name) }}</h2>
                <span class="student-id-code">{{ $sr->adm_no }}</span>
            </div>
            <div class="report-info-right">
                <h3>{!! strtoupper(Mk::getSuffix($ex->term)) !!} TERM REPORT SHEET</h3>
                <span class="session-info">{{ $ex->year }} SESSION</span>
            </div>
        </div>

        {{-- Summary Data --}}
        <section class="summary-box">
            {{-- Columns --}}
            <div class="summary-col">
                <h4 class="summary-title">BIO DATA</h4>
                <div class="data-row">
                    <span class="data-label">GENDER</span>
                    <span class="data-value">{{ strtoupper($sr->user->gender) }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">DOB</span>
                    <span class="data-value">{{ $sr->user->dob ?: '-' }}</span>
                </div>
            </div>

            <div class="summary-col">
                <h4 class="summary-title">SCHOOL PROFILE</h4>
                <div class="data-row">
                    <span class="data-label">CLASS - ARM</span>
                    <span class="data-value">{{ strtoupper($my_class->name) }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">DEPARTMENT</span>
                    <span class="data-value">{{ strtoupper($class_type->name) }}</span>
                </div>
            </div>

            <div class="summary-col">
                <h4 class="summary-title">GRADES</h4>
                <div class="data-row">
                    <span class="data-label">SCORE - AVERAGE</span>
                    <span class="data-value">{{ $exr->total }} - {{ $exr->ave }}%</span>
                </div>
                <div class="data-row">
                    <span class="data-label">GRADE - REMARK</span>
                    <span class="data-value">{!! $exr->pos ? Mk::getSuffix($exr->pos) : '-' !!}</span>
                </div>
            </div>

            <div class="summary-col">
                <h4 class="summary-title">ATTENDANCE</h4>
                <div class="data-row">
                    <span class="data-label">SCHOOL ACTIVE DAYS</span>
                    <span class="data-value">---</span>
                </div>
                <div class="data-row">
                    <span class="data-label">PRESENT - ABSENT</span>
                    <span class="data-value">---</span>
                </div>
            </div>

            <div style="text-align: center;">
                <div class="qr-wrapper">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ route('marks.show', [Qs::hash($sr->user->id), $year]) }}"
                        alt="QR Code">
                </div>
                <span class="scan-msg">SCAN FOR AUTHENTICITY</span>
            </div>
        </section>

        {{-- Results Table --}}
        <section>
            <div class="section-separator">
                <div class="section-icon-title">
                    <svg class="section-icon" viewBox="0 0 24 24" fill="var(--secondary-blue)">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-12h2v6h-2zm0 8h2v2h-2z" />
                    </svg>
                    <span style="font-size: 11px; font-weight: 800; color: #555;">Total Students - 13</span>
                </div>
                <div class="section-icon-title">
                    <h3>COGNITIVE DOMAIN</h3>
                </div>
            </div>
            @include('pages.support_team.marks.print.custom.sheet')
        </section>

        {{-- Skills Section --}}
        <section>
            <div class="section-separator" style="margin-top: 10px;">
                <div class="section-icon-title">
                    <svg class="section-icon" viewBox="0 0 24 24" fill="var(--secondary-blue)">
                        <path d="M10 2H5v2H3v2H1v2h2v2h2v2h2v2h2v2h2v2h2v-2h2v-2h2v-2h2v-2h2v-2h-2V8h-2V6h-2V4h-2V2z" />
                    </svg>
                </div>
                <div class="section-icon-title">
                    <h3>AFFECTIVE & PSYCHOMOTOR ASSESSMENT</h3>
                </div>
            </div>
            @include('pages.support_team.marks.print.custom.skills')
        </section>

        @php

            $score = $exr->total; // e.g., 875
            $maxScore = 1000; // maximum possible score
            $percentage = ($score / $maxScore) * 100;

            // Generate principal comment based on percentage
            if ($percentage >= 90) {
                $comment = "Excellent performance! Keep up the outstanding work.";
            } elseif ($percentage >= 80) {
                $comment = "Very good performance. Aim for even higher next term.";
            } elseif ($percentage >= 70) {
                $comment = "Good performance. You can do even better.";
            } elseif ($percentage >= 60) {
                $comment = "Fair performance. Put in more effort to improve.";
            } elseif ($percentage >= 50) {
                $comment = "Needs improvement. Focus on your weak areas.";
            } else {
                $comment = "Poor performance. Serious improvement is required.";
            }


        @endphp

        {{-- Footer --}}
        <footer class="print-footer">
            <div class="footer-flex">
                <div class="resumption-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="var(--secondary-blue)">
                        <path
                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                    </svg>
                    <strong style="font-size: 14px;">RESUMPTION DATE:</strong>
                    <span class="line-placeholder"></span>
                </div>
                <div class="footer-large-title">COMMENTS</div>
            </div>
            <div style="margin-top: 10px; border-bottom: 1.5px solid #ccc; height: 30px;">
                {{ $exr->p_comment ?? $comment }}</div>
        </footer>
    </div>

</body>

</html>