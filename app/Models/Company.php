<?php

namespace App\Models;

use App\Models\traits\LogView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Searchable, LogView;

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


    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'companies_index';
    }

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'logo' => $this->logo,
            'website' => $this->website,
            'location' => $this->location
        ];
    }
}
