<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User_address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'street',
        'city',
        'province',
        'country',
        'postal_code',
    ];

    /**
     * Define Table Relationship, One User_address only belongs to One User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}