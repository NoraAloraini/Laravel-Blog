<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


class NewCommentCreated
{
    use Dispatchable, SerializesModels;


    public $article;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($article)
    {
       $this->article = $article;
    }

    
}
