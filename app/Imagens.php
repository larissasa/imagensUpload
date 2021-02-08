<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class imagens extends Model
{
    // Soft Deletes
    use SoftDeletes;

    protected $fillable = [
        'name', 'description'
    ];

    // User
    public function user() {
        // Many-to-One
        return $this->belongsTo('App\User');
    }

    // Soft Deletes
    protected $dates = ['deleted_at'];

    // Table name
    protected $table = 'imagens';
}
