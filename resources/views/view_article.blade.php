@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (isset($article))
                            <a href="#"> {{ $article->title }} </a> (#{{ $article->getViewCount() }})
                            <br />

                            <p>{{ $article->teaser }}</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {});
    </script>
@endpush
