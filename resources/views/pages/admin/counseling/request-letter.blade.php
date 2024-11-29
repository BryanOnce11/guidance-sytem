<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Letter for Good Moral Certificate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6 bg-gray-100">
    <div class="w-full max-w-[700px] p-6 mx-auto bg-white rounded-lg shadow" style="aspect-ratio: 8.5 / 11;">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('psu.png') }}" alt="PSU Logo" class="w-40 h-40">
        </div>
        <h1 class="mb-4 font-bold text-center">Republic of the Philippines</h1>
        <h2 class="mb-4 font-bold text-center">PALAWAN STATE UNIVERSITY -- BROOKES POINT CAMPUS</h2>
        <h2 class="mb-10 font-bold text-center ">BROOKES POINT PALAWAN</h2>
        <p class="mb-8 text-right">Date:
            {{ $virtual_counseling->created_at->setTimeZone('Asia/Manila')->format('F j, Y') }}</p>
        <p class="mb-8">Dear: <span class="font-bold">Ma'am Wynchell O. Mollenido</span></p>
        <p class="mb-4 ml-4">I am {{ $virtual_counseling->student->fname }} {{ $virtual_counseling->student->m_i }}
            {{ $virtual_counseling->student->lname }}, I hope this message finds you well. I would like to request a
            meeting to discuss:</p>
        <p class="mb-4 ml-4">{{ $virtual_counseling->reason }}.</p>
        <p class="mb-8 ml-4">Thank you for your assistance.</p>

        <p class="mb-4 ml-4 font-bold text-left">Sincerely Yours,</p>
        <p class="ml-4 font-bold text-left">{{ $virtual_counseling->student->fname }}
            {{ $virtual_counseling->student->m_i }}
            {{ $virtual_counseling->student->lname }}</p>
        <p class="ml-4 font-bold text-left">(name)</p>
    </div>
</body>

</html>
