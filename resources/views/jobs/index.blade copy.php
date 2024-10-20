<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <!-- Filter Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>

        <!-- Job Listings -->
        <div class="row g-3">
            @foreach ($jobs as $job)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center mb-3">
                                <img class="rounded-circle me-3" src="{{ $job->company_logo }}" alt="{{ $job->company_name }}" style="width: 64px; height: 64px;">
                                <div>
                                    <h5 class="card-title mb-1">{{ $job->title }}</h5>
                                    <p class="card-subtitle text-muted">{{ $job->company_name }}</p>
                                    <p class="card-text small text-muted">{{ $job->location }} • {{ $job->posted_at }}</p>
                                </div>
                            </div>
                            <p class="card-text mt-auto"><small class="text-muted">{{ $job->employment_type }}</small></p>
                            <div class="mt-2">
                                @foreach ($job->tags as $tag)
                                    <span class="badge bg-danger me-1">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
