<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['name'];

    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
