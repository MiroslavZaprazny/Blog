<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category','user'];

    protected function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%'. $search.'%')
                ->orWhere('body', 'like', '%'. $search.'%')));
                
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereExists(fn($query)=>
                $query->from('categories')
                ->whereColumn('categories.id','posts.category_id')
                ->where('categories.name',$category)));

        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereExists(fn($query)=>
                $query->from('users')
                    ->whereColumn('users.id','posts.user_id')
                    ->where('users.username',$user)));
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
