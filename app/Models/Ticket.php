<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Bagitau nama table yang model ini harus hubungi
    protected $table = 'tickets';

    // Mass assignment
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'submitter_name',
        'submitter_email',
        'status',
        'category'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
