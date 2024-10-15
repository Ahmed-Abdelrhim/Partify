<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'logo',
        'phone',
        'bio',
        'about',
        'location',
        'website',
    ];


    public function socials()
    {
        return $this->hasOne(CompanySocial::class);
    }
}
