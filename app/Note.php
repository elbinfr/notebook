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

}
