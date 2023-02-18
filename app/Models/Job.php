<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Form;
class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forms()
    {
        return $this->hasMany(Flight::class);
    }

    
}
