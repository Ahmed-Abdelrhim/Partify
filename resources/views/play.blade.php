@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- <script src="{{ asset('playJs.js') }}"></script> --}}
    <script src="{{ asset('playJs_two.js') }}"></script>





    {{-- <script type="text/javascript">
        $(document).ready(function() {});
    </script> --}}
@endpush
