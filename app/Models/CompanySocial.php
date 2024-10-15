<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySocial extends Model
{
    use HasFactory;

    protected $table = 'company_socials';

    protected $fillable = ['company_id', 'linkedin', 'facebook', 'instagram', 'twitter'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
