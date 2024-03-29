<?php

namespace App\Models;

use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers($request,$ispaginate=true){
        $q=request('query');
        $users=User::latest()
        ->where('name', 'like', '%' . $q . '%')
        ->Orwhere('username', 'like', '%' . $q. '%')
        ->Orwhere('email', 'like', '%' . $q. '%');
        if($ispaginate){
            $users=$users->paginate((int)env('PER_PAGE'));
        }else {
            $users=$users->get();
        }

      return $users;
    }
}
