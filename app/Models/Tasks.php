<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $primaryKey = 'tasks_id';

    public function driver(){
        return $this->hasOne(Users::class,'uid','did');
    }

    public function spbu_1(){
        return $this->hasOne(Spbu::class, 'spbu_id','spbu_id_1');
    }
    public function spbu_2(){
        return $this->hasOne(Spbu::class, 'spbu_id','spbu_id_2');
    }
    public function spbu_3(){
        return $this->hasOne(Spbu::class, 'spbu_id','spbu_id_3');
    }
}
