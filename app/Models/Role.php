<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        
        ];

    public function users(){
        return $this -> hasMany(User::class);
    }
}
