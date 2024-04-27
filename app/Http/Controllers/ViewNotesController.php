<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class ViewNotesController extends Controller
{
    public function index()
    {
        // Retrieve notes for the signed-in user
        $userNotes = Note::where('user_id', Auth::id())->get();
        return view('viewnotes', ['userNotes' => $userNotes]);
    }

    public function getNoteText($id)
    {
        // Retrieve note text by ID
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['error' => 'Note not found'], 404);
        }

        // Decrypt note text and return
        $noteText = $note->note_text;
        return response()->json(['note_text' => $noteText]);
    }

    public function destroy($id)
    {
        
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['error' => 'Note not found'], 404);
        }

        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully!');
    }
}
