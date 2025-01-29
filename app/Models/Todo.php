<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = "todo";
    protected $fillable = ['task','is_done','role','user_id','user_comment','proof_file_path','admin_feedback'];

    public function user()
    {
        return $this->belongsTo(User::class);  
    }
}
