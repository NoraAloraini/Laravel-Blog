<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    
    protected $guarded = [];





	public function owner()
    
        {
    
            return $this->belongsTo(User::class); 

        }

    public function comments()
    
    	{
    
    		return $this->hasMany(Comment::class); 

    	}

    public function addComment($comment)
    
    	{
    
    		$this->comments()->create($comment); 

    	}


    public function tags()
    
    	{
    
    		return $this->belongsToMany(Tag::class); 

    	}

}
