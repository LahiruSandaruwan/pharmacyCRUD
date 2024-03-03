<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Customer extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'gender',
        'allergies',
    ];

    /**
     * The attributes that should be treated as dates.
     * This array includes 'deleted_at' for soft deletes functionality.
     *
     * @var array<string>
     */
    protected $dates = ['deleted_at'];
}
