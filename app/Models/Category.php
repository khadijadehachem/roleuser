<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;


class Category extends Model
{
    use HasFactory,SoftDeletes,HasApiTokens,Notifiable;
    

    public $table = 'categories';

 

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',];
        public function users(){
            return $this->hasMany(User::class);
      
        }

}
