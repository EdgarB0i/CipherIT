<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'note_name', 'note_text',
    ];


    public function setNoteNameAttribute($value)
    {
        $this->attributes['note_name'] = Crypt::encrypt($value);
    }


    public function getNoteNameAttribute($value)
    {

        return Crypt::decrypt($value);


    }


    public function setNoteTextAttribute($value)
    {
        $this->attributes['note_text'] = Crypt::encrypt($value);
    }


    public function getNoteTextAttribute($value)
    {
        return Crypt::decrypt($value);
    }
}
