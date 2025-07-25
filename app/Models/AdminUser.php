<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
    	"name",
    	"email",
    	"password"
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
