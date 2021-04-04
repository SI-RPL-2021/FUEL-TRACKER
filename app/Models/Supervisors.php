<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisors extends Model
{
    use HasFactory;
    protected $primaryKey = 'sid';
    public function spbu(){
        return $this->hasOne(Spbu::class, 'spbu_id','spbu_id');
    }
}
