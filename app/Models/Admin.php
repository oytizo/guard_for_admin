<?php

namespace App\Models;

use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function registrationvalidation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins',
            'password'=>'required',
        ]);
        return $validated;
    }
    public function loginvalidation(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password'=>'required',
        ]);
        return $validated;
    }
}
