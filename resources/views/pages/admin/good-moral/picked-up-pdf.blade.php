<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Good Moral Certificate - PSU</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 10px;
            line-height: 1.6;
        }

        .container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 40px;
            margin: 20px;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .header {
            margin-bottom: 30px;
        }

        .republic {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .university-name {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .location {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .vision-mission {
            margin-bottom: 40px;
        }

        .vision,
        .mission {
            margin-bottom: 20px;
        }

        .vision h2,
        .mission h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .vision p,
        .mission p {
            font-style: italic;
            padding: 0 40px;
        }

        .certification-title {
            font-weight: bold;
            font-size: 20px;
            margin: 30px 0;
        }

        .content {
            text-align: justify;
            margin: 0 40px;
        }

        .signature-section {
            margin-top: 60px;
            text-align: center;
        }

        .signature {
            margin: 40px 0;
        }

        .signatory {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .position {
            font-style: italic;
        }

        @page {
            size: letter;
            margin: 0;
        }


        .footer {
            margin-top: 60px;
            font-style: italic;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="logo" />

        <div class="header">
            <div class="republic">Republic of the Philippines</div>
            <div class="university-name">PALAWAN STATE UNIVERSITY</div>
            <div class="location">Puerto Princesa City</div>
            <div class="university-name">PSU-Brooke's Point</div>
        </div>

        <div class="certification-title">C E R T I F I C A T I O N</div>

        <div class="content">
            <p>
                This is to certify that <strong>{{ $good_moral_request->student->fname }}
                    {{ $good_moral_request->student->lname }}</strong> was officially
                enrolled in this University during the and
                took up Bachelor of Science in Business Administration major in
                Financial Management.
            </p>

            <p>
                This certifies that {{ $good_moral_request->student->gender == 'Male' ? 'he' : 'she' }} is known to have
                a good moral character and
                has not been involved in any misdemeanor during her stay in the
                university.
            </p>

            <p>
                This certification is issued upon request of
                <strong>{{ $good_moral_request->student->gender == 'Male' ? 'MR' : 'MS' }}. AMIROL</strong> for whatever
                legal purpose it may serve
                her best.
            </p>

            <p>Issued this {{ now()->format('j') }}<sup>th</sup> day of {{ now()->format('F') }}
                {{ now()->format('Y') }}.</p>
        </div>

        <div class="signature-section">
            <div class="signature">
                <div class="signatory">BETHANY CLAIRE BERONIO</div>
                <div class="position">Guidance Counselor</div>
            </div>

            <div class="signature">
                <div>Noted by:</div>
                <div class="signatory">JERDEN A. MACOLOR</div>
                <div class="position">Director</div>
            </div>
        </div>

        <div class="footer">
            Palawan State University Brooke's Point, Pangobilian, Brooke's Point,
            5305, Palawan, Philippines
        </div>
    </div>
</body>

</html>
