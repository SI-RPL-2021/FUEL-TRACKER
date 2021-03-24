<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drivers;
use App\Models\Supervisors;

class Users extends Model
{
    use HasFactory;
    protected $primaryKey = 'uid';

    public function driver_data(){
        return $this->hasOne(Drivers::class, 'did','did');
    }

    public function supervisor_data(){
        return $this->hasOne(Supervisors::class, 'sid','sid');
    }
}
