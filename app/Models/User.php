<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin','status'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function username()
    {
        return 'name';
    }

    public function status(){
        return $this->status == 1
            ? '<a href=""class="btn btn-success btn-sm visibility-toggle"> <span class="badge bg-success">'.__('dashboard.active').'</span></a>'
            : '<a href=""class="btn btn-danger btn-sm visibility-toggle">  <span class="badge bg-danger"> '.__('dashboard.un_active').'</span></a>';
    }

  
}
