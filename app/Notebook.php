<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $table = 'notebooks';

    protected $fillable = [
        'user_id', 'title', 'description', 'image', 'slug'
    ];

    /**
     *
     * Relationship with notebooks
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function scopeUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

}
