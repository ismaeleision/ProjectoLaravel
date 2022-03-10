<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;
use App\Models\User;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
