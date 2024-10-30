<!-- resources/views/access-denied.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1 class="display-1 text-danger">403</h1>
            <h2 class="text-dark">Access Denied</h2>
            <p class="lead">Anda tidak diperbolehkan mengakses halaman ini.</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go Back to Home</a>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
