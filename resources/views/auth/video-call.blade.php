<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Guidance Office Portal - Login</title>
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('agora/main.css') }}'>
</head>

<body class="bg-orange-500">

    <button class="btn-css" id="join-btn">Join Stream {{ auth()->id() }}</button>

    <div id="stream-wrapper">
        <div id="video-streams"></div>

        <div id="stream-controls">
            <button class="btn-css" id="leave-btn">Leave Stream</button>
            <button class="btn-css" id="mic-btn">Mic On</button>
            <button class="btn-css" id="camera-btn">Camera on</button>
        </div>
    </div>

    @if (auth()->user()->role == 'Admin')
        <div id="notepad" class="fixed hidden bg-white rounded-lg shadow-lg"
            style="min-width: 300px; min-height: 400px; z-index: 1000; top: 20px; right: 20px;">
            <div id="notepad-header" class="flex items-center justify-between p-2 bg-gray-100 rounded-t-lg cursor-move">
                <span class="text-sm font-medium">Meeting Notes</span>
                <button id="minimize-btn" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            <textarea id="notepad-content" class="w-full p-3 outline-none resize-none" style="height: calc(100% - 40px);"
                placeholder="Type your notes here..."></textarea>
            <div id="resize-handle"
                class="absolute bottom-0 right-0 w-4 h-4 cursor-se-resize bg-gradient-to-br from-transparent via-transparent to-gray-300">
            </div>
        </div>
    @endif

</body>
<!-- <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script> -->
<script src="{{ asset('agora/AgoraRTC_N-4.7.3.js') }}"></script>
<script>
    window.counselingId = @json($id);
    window.userId = @json(auth()->id());
</script>
<script src='{{ asset('agora/main.js') }}'></script>
<script src="https://cdn.tailwindcss.com"></script>

</html>
