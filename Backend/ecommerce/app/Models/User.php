<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'default_address_id',
        'admin',
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

    /**
     * Define Table Relationship, One User can have many User_address
     */
    public function user_addresses()
    {
        return $this->hasMany(User_address::class);
    }

    /**
     * Define Table Relationship, One User can have many Order
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the User Full Address String
     *
     * @param integer $id
     * @return string Full Address String
     */
    public function full_address()
    {
        $address = User_address::find($this->default_address_id);
        // var_dump($address);
        // die;
        $full_address = $address->street . ', ' . $address->city . ', ' . $address->province . ', ' . $address->country;
        return $full_address;
    }

    /**
     * Get the User Postal Code
     *
     * @param integer $id
     * @return string Postal Code String
     */
    public function user_postal_code()
    {
        $postal_code = User_address::find($this->default_address_id)->postal_code;
        // var_dump($address);
        // die;
        return $postal_code;
    }

    /**
     * Get the User Full Address Object
     *
     * @return Object Full Address Object
     */
    public function full_address_obj()
    {
        $address = User_address::find($this->default_address_id);
        // var_dump($address);
        // die;
        return $address;
    }
}