<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['user_id', 'title', 'teaser', 'status', 'published_at'];


    protected $casts = [
        'published_at' => 'datetime:D, d-M-o h:i A',
    ];

    // Status
    public const STATUS_PENDING = 'Pending';
    public const STATUS_PUBLISHED = 'published';

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    /**
     * Determine if the model should be searchable.
     */
    public function shouldBeSearchable(): bool
    {
        return $this->status === Article::STATUS_PUBLISHED;
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'articles_index';
    }

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray()
    {
        // Current model attributes
        $array = $this->only(['title', 'teaser', 'published_at']);

        // add relationships field
        $array['user'] = $this->user()->get(['name'])->implode('name', ', ');
        $array['tags'] = $this->tags()->get(['name'])->implode('name', ', ');

        return $array;
    }
}
