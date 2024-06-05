<?php

namespace App\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    // When a componets load that time mount function start work

    #passing data form view file usign {Propse}
    // public function mount($initialComments)
    // {
    //     $this->comments = $initialComments;
    // }
    
    #Get data form database on mount function
    public function mount()
    {
        $initialComments = Comment::latest()->get();
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
