<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => 'datetime:D, d-M-o h:i A', // For example: Thu, month/day/year hour:mins `AM/PM`
        'updated_at' => 'datetime:D, d-M-o h:i A'
    ];


    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'tags_index';
    }

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name
        ];
    }
}
