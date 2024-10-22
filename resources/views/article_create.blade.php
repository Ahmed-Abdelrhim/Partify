<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input,
        .form-group textarea {
            border-radius: 0;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .form-control.summernote {
            height: 300px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">Create a New Article</h2>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <!-- Title -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title" required>
        </div>

        <!-- Min to Read -->
        <div class="form-group mb-3">
            <label for="min_to_read">Minutes to Read</label>
            <input type="number" class="form-control" id="min_to_read" name="min_to_read" placeholder="Enter estimated reading time in minutes" required>
        </div>

        <!-- Content -->
        <div class="form-group mb-4">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control summernote" required></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-submit btn-block">Save Article</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300, // Set editor height
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>

</body>
</html>
