<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        em {
            background-color: yellow;
            color: red;
            font-weight: bold;
            padding: 2px;
            border-radius: 4px;
        }
    </style>

</head>

<body class="bg-light">
    <div class="container mt-4">

        <!-- LaraJobs Consultants Section -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">Have you considered contracted staff augmentation?</h5>
                        <p class="card-text">LaraJobs Consultants</p>
                        <a href="#" class="btn btn-light">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter and Search Section -->
        <div class="row mb-3">
            <div class="col-md-12 d-flex" style="margin-bottom: 20px;">
                <!-- Filter Button -->
                <div class="me-3">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                        <li><a class="dropdown-item" href="#">All Jobs</a></li>
                        <li><a class="dropdown-item" href="#">Laravel</a></li>
                        <li><a class="dropdown-item" href="#">PHP</a></li>
                        <li><a class="dropdown-item" href="#">VueJS</a></li>
                        <li><a class="dropdown-item" href="#">MySQL</a></li>
                        <li><a class="dropdown-item" href="#">Fullstack</a></li>
                        <li><a class="dropdown-item" href="#">Senior</a></li>
                        <li><a class="dropdown-item" href="#">Engineer</a></li>
                        <li><a class="dropdown-item" href="#">TailwindCSS</a></li>
                        <li><a class="dropdown-item" href="#">Backend</a></li>
                        <li><a class="dropdown-item" href="#">Full Time</a></li>
                        <li><a class="dropdown-item" href="#">JavaScript</a></li>
                        <li><a class="dropdown-item" href="#">AWS</a></li>
                    </ul>
                </div>

                <!-- Search Field -->
                <form action="{{ route('search') }}" method="GET" class="space-y-2 col-11">
                    <div class="input-group w-200">
                        <input type="text" class="form-control" placeholder="Search jobs" aria-label="Search jobs"
                            aria-describedby="search-button" name="query">

                        <button type="submit" class="btn btn-secondary" type="button" id="search-button">
                            Search
                        </button>

                        <a href="{{ route('search') }}" class="btn btn-danger" type="button" id="search-button">
                            reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="row g-3">
            @if (isset($data))
                <p>Found {{ $data->total() }} results</p>
                @foreach ($data['hits'] as $item)
                    <div class="col-md-12">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="rounded-circle me-3" src="#" alt="#"
                                        style="width: 64px; height: 64px;">
                                    <div>
                                        <h5 class="card-title mb-1">
                                            {{-- {{ $item['_formatted']['title'] }} --}}
                                            {!! $item['_formatted']['title'] !!}
                                        </h5>

                                        <p class="card-text small text-muted">
                                            {{-- {{ isset($item->user) ? $item->user->name : 'N.A' }} --}}
                                            {{-- {{ isset($item['_formatted']) ? $item['_formatted']['user'] : 'N.A' }} --}}
                                            {!! isset($item['_formatted']) ? $item['_formatted']['user'] : 'N.A' !!}

                                        </p>

                                        <p class="card-text small text-muted">
                                            {{-- {{ $item->teaser }} --}}
                                            {!! $item['_formatted']['teaser'] !!}

                                            •
                                            {{-- {{ \Carbon\Carbon::parse($item->published_at)->format('D d-M-y H:i A') }} --}}
                                            {{ \Carbon\Carbon::parse($item['_formatted']['published_at'])->format('D d-M-y H:i A') }}
                                        </p>
                                    </div>

                                    <div class="mt-2">
                                        @foreach ((array) $item['_formatted']['tags'] as $tag)
                                            <span class="badge bg-danger me-1">{{ $tag }}</span>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Data To Show</p>
            @endif
        </div>

        <!-- Pagination Links -->
        @if ($data && $data->hasPages())
            <div class="row mt-4">
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        @endif

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>
