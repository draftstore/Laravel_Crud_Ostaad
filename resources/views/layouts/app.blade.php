<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product Management')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <style>
        /* Container for the file upload */
.file-upload-container {
    position: relative;
    width: 200px; /* Adjust width as needed */
    margin-top: 20px;
}

/* Custom label acting as the file upload button */
.file-upload-label {
    display: inline-block;
    background-color: #1877f2; /* Facebook blue color */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    font-size: 14px;
}

/* Hide the default file input */
.file-upload-input {
    display: none;
}

/* Text shown for the file upload button */
.file-upload-text {
    display: inline-block;
}

/* Preview image container */
.file-preview {
    margin-top: 10px;
    display: none; /* Hidden by default */
}

.preview-image {
    max-width: 100%;
    max-height: 150px;
    border-radius: 5px;
    object-fit: cover;
}

/* Hover effect for the custom button */
.file-upload-label:hover {
    background-color: #0064d2;
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">Create Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; {{ date('Y') }} Product Management. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <!-- Include jQuery -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Include DataTables CSS and JS -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable(); // Initialize DataTable
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageInput = document.getElementById("image");
        const imagePreview = document.getElementById("imagePreview");

        imageInput.addEventListener("change", function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block"; // Show the preview image
                };

                reader.readAsDataURL(file); // Read the file as a Data URL
            } else {
                imagePreview.src = "";
                imagePreview.style.display = "none"; // Hide the preview if no file is selected
            }
        });
    });
</script>


</body>
</html>
