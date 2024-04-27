<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class CreateNotesController extends Controller
{
    /**
     * Show the form for creating a new note.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('createnotes');
    }

    /**
     * Store a newly created note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        if (!Auth::check()) {

            return redirect('/');
        }


        $validatedData = $request->validate([
            'note_name' => 'required|string|max:255',
            'note_text' => 'required|string',
        ]);


        $encryptedNoteName = encrypt($validatedData['note_name']);


        Note::create([
            'user_id' => auth()->id(),
            'note_name' => $encryptedNoteName,
            'note_text' => $validatedData['note_text'],
        ]);

        return redirect()->back()->with('success', 'Note created successfully!');
    }
}
