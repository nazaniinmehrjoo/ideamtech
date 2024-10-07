<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خطای 403 - دسترسی غیرمجاز</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles for Dark Theme -->
    <style>
        body {
            background-color: #212529;
            color: #f8f9fa;
            font-family: 'Vazirmatn', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #343a40;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #dc3545; /* Red for error */
        }
        p {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }
        a {
            color: #17a2b8;
            font-weight: bold;
        }
        a:hover {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>خطای 403 - دسترسی غیرمجاز</h1>
        <p>شما مجاز به دسترسی به این صفحه نیستید.</p>
        <a href="{{ url('/') }}" class="btn btn-outline-light">بازگشت به صفحه اصلی</a>
    </div>

    <!-- Bootstrap JS -->
</body>
</html>
