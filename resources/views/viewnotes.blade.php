<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Favicon -->
    <link href="img/key.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CipherIT:View</title>
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
        <h2 style="text-align: center;">View Notes</h2>
        @if (Auth::check())
        <div class="form-group">
            <label for="note_select">Select Note:</label>
            <select id="note_select" name="note_select">
                <option value="">Choose a note</option> <!-- Initial option -->
                @foreach ($userNotes as $note)
                    <option value="{{ $note->id }}">{{ decrypt($note->note_name) }}</option>
                @endforeach
            </select>
        </div>

            <div id="note_display" style="display: none;">
            <div class="card">
                <div class="card-header" style="margin-bottom: 10px;">
                    <strong>Text:</strong> 
                </div>
                <div class="card"> 
                    <div id="note_text" class="border rounded p-3"> 
                        <!-- Note text will be displayed here -->
                    </div>
                </div>
            </div>


                <div style="margin-top: 10px;">
                    <form id="delete_form" action="{{ route('notes.destroy', ':note_id') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Note</button>
                    </form>
                </div>
                
            </div>
        @else
            <script>window.location = "{{ url('/') }}";</script>
        @endif
        @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <br>
                    {{ session('success') }}
                </div>
        @endif
        <p style="text-align: left;"><a href="/" style="color: #007bff;">Back to Home</a></p>
    </div>

    <script>
        // Function to display note text when a note is selected
        document.getElementById('note_select').addEventListener('change', function() {
            var noteId = this.value;
            var noteText = document.getElementById('note_text');
            var noteDisplay = document.getElementById('note_display');
            
            if (!noteId) { // If "Choose a note" is selected, hide the note display section
                noteDisplay.style.display = 'none';
                return;
            }

            noteDisplay.style.display = 'block'; // Show the note display section

            // AJAX request to fetch note text
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/notes/' + noteId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    noteText.innerText = response.note_text;
                    // Update delete form action with the selected note's ID
                    var deleteForm = document.getElementById('delete_form');
                    var deleteAction = deleteForm.getAttribute('action');
                    deleteAction = deleteAction.replace(':note_id', noteId);
                    deleteForm.setAttribute('action', deleteAction);
                }
            };
            xhr.send();
        });

        // Initialize note display on page load
        window.addEventListener('load', function() {
            // Trigger change event for note select
            document.getElementById('note_select').dispatchEvent(new Event('change'));
        });
    </script>



</body>
</html>

