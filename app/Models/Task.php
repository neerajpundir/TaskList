<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Summary of fillable
     * we can add the information which are not sensetive or important
     * @var array
     */
    protected $fillable = ['title', 'description', 'long_description'];

    /**
     * In $guarded, we can add the sensetive information such as password and other secert
     */
    // protected $guarded = ['password'];

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}
