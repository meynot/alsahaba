<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
	
	protected = ['post_id', 'comment_id', 'user_id', 'comment', 'is_published', 'is_deleted', 'is_pinned'];
	
    protected $casts = [
        'is_published' => 'boolean',
        'is_deleted' => 'boolean',
        'is_pinned' => 'boolean',
	];

}
