<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable = [
        'notebook_id', 'title', 'content', 'slug'
    ];

    public function notebook()
    {
        return $this->belongsTo('App\Notebook');
    }

    public function scopeNotebookId($query, $notebook_id)
    {
        return $query->where('notebook_id', $notebook_id);
    }
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
