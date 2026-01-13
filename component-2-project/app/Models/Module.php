<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use App\Models\User;

class Module extends Model
{
    protected $fillable = [
        'module',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];



   

public function students()
{
    return $this->belongsToMany(User::class)
        ->withPivot(['enrolled_at', 'pass_status', 'completed_at'])
        ->withTimestamps();
}


}
