@extends('layouts.app')
@section('content')
    <div class="mt-5 intro-y box">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                Notes of Record History
            </h2>
        </div>
        <div class="p-5">
            <div class="flex flex-wrap gap-x-5">
                <p>
                    {{ $counseling_notes->notes }}
                </p>
            </div>

        </div>
    </div>
@endsection
