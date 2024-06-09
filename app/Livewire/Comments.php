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

    ## Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|string|max:100'
        ]);
    }

    public function addComment()
    {
      
        // $this->comments[] = 
        // [

        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'Biplob',
        // ];

        // if($this->newComment === '')
        // {
        //     return;
        // }

        // array_unshift($this->comments, [

        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'Biplob',
        // ]);



        ## Store data in database-------

        // if($this->newComment === '')
        // {
        //     return;
        // }

        ## realtime validatin using livewire
        $this->validate([
            'newComment' => 'required|string|max:100'
        ]);

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
        ]);

        // $this->comments->push($createdComment); // adding last
        $this->comments->prepend($createdComment); // adding first

        $this->newComment = '';
    }

    public function remove($commentId)
    {
        // Delete Form Database
        $comment = Comment::find($commentId);
        $comment->delete();

        // remove for collection
        // $this->comments = $this->comments->where('id', '!==', $comment);
        $this->comments = $this->comments->except($commentId);
    }
    
    public function render()
    {
        return view('livewire.comments');
    }
}
