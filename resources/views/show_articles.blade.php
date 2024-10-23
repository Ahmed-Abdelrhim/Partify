@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Articles</div>

                    <div class="card-body">
                        @if (isset($articles))
                            @foreach ($articles as $article)
                                # {{ $article->id }}
                                <a href="{{ route('view.article', $article->id) }}">
                                    {{ $article->title }}
                                </a>

                                (#{{ $article->getViewCount() }})
                                <br />
                            @endforeach
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
