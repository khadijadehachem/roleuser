<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company;
use App\Models\Category;
use \DateTimeInterface;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'plafond',
        'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

  

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
   
    public function getIsAdminAttribute()
    {
        //return $this->roles()->where('id', 1)->exists();
        if ($this->roles()->find(1)) {
        /*    echo $this->roles()->find(1);
            dd($this->roles()->find(1));*/
            return $this->roles()->find(1);
        }
    }

    public function getIsManagerAttribute()
    {
        //return $this->roles()->where('id', 1)->exists();
        if ($this->roles()->find(2)) {
           echo $this->roles()->find(2);
          //  dd($this->roles()->find(2));
            return $this->roles()->find(2);
        }
    }

    public function getIsEmployeeAttribute()
    {
        //return $this->roles()->where('id', 1)->exists();
        if ($this->roles()->find(3)) {
            //echo $this->roles()->find(3);
            //dd($this->roles()->find(3));
            return $this->roles()->find(3);
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function company(){

        return $this->belongsTo(Company::class);

    }
    public function category(){

        return $this->belongsTo(Category::class);

    }
}
