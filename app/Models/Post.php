<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Post extends Model
{
    use Uuids, HasFactory;
	
	protected $fillable = ['title', 'short', 'body', 'is_published', 'published_at', 'is_featured', 'is_pinned', 'is_commentable', 'has_roles', 'is_editable', 'is_deleteable', 'user_id'];
	
	
	
    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'is_pinned' => 'boolean',
        'is_commentable' => 'boolean',
        'has_roles' => 'boolean',
        'is_editable' => 'boolean',
        'is_deleteable' => 'boolean',
		
		
    ];

}
