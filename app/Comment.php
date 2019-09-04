<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NewCommentCreated;


class Comment extends Model
{

    protected $guarded = [];

    protected $dispatchesEvents = [

        'created' => NewCommentCreated::class
    ];
    



	public function article()
    
        {
    
            return $this->belongsTo(Article::class); 

        }

   	public function user()
    
        {
    
            return $this->belongsTo(User::class); 

        }
}
