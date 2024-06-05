<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    // When a componets load that time mount function start work
    public function mount($initialComments)
    {
        $this->comments = $initialComments;
    }

    public function addComment()
    {
      
        // $this->comments[] = 
        // [

        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'Biplob',
        // ];

        if($this->newComment === '')
        {
            return;
        }

        array_unshift($this->comments, [

            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Biplob',
        ]);

        $this->newComment = '';
    }
    
    public function render()
    {
        return view('livewire.comments');
    }
}
