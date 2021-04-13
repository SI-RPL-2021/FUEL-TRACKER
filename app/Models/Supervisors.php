<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spbu;
use App\Models\Users;

class Supervisors extends Model
{
    use HasFactory;
    protected $primaryKey = 'sid';
    
    public function spbu(){
        return $this->hasOne(Spbu::class, 'spbu_id','spbu_id');
    }
    public function user(){
        return $this->belongsTo(Users::class, 'uid','uid');
    }
}
