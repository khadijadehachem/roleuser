<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Company extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users(){
        return $this->hasMany(User::class);
  
    }
}
