<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Password extends Model
{
    use HasFactory;

    protected $table = 'passwords';
    protected $casts = [
        'group_id' => 'integer',
        'user_id' => 'integer'
    ];
    protected $fillable = [
        'group_id',
        'title',
        'origin',
        'username',
        'password',
        'comments',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
