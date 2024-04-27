<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="UTF-8">
    <link href="img/key.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CipherIT:Create</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/img/samsung-galaxy-book-pro-stock-dark-background-teal-3840x2160-7564.png');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 40%; 
            padding: 40px;
            background-color: rgba(255, 255, 255, .85); 
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            height: 150px;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .alert-success {
            text-align: center;
            color: green;
            animation: fadeOut 2s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }
    
    </style>

</head>
<body>
    
    <div class="container">
        <h2 style="text-align: center;">Create New Note</h2>
        @if (Auth::check())
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="note_name">Title:</label>
                <input type="text" id="note_name" name="note_name" required>
            </div>
            <div class="form-group">
                <label for="note_text">Your Text:</label>
                <textarea id="note_text" name="note_text" required></textarea>
            </div>
            <button type="submit" class="btn">Submit</button>
            <p style="text-align: left;"><a href="/" style="color: #007bff;">Back to Home</a></p>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <br>
                    {{ session('success') }}
                </div>
            @endif
        </form>
        @else
            <script>window.location = "{{ url('/') }}";</script>
        @endif
    </div>
</body>
</html>
