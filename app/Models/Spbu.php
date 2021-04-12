<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supervisors;

class Spbu extends Model
{
    use HasFactory;
    protected $primaryKey = 'spbu_id';

    public function supervisor(){
        return $this->belongsTo(Supervisors::class, 'spbu_id', 'spbu_id');
    }
}