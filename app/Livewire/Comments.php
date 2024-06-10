<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    use WithPagination;
    // public $comments;

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
        // $initialComments = Comment::latest()->paginate(2);
        // $this->comments = $initialComments;
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
        // $this->comments->prepend($createdComment); // adding first

        $this->newComment = '';

        // Show message when data save in database
        session()->flash('message', 'Message added successfully!');
    }

    public function remove($commentId)
    {
        // Delete Form Database
        $comment = Comment::find($commentId);
        $comment->delete();

        // remove for collection
        // $this->comments = $this->comments->where('id', '!==', $comment);
        // $this->comments = $this->comments->except($commentId);

        // Show message when data delete in database
        session()->flash('message', 'Message deleted successfully!');
    }
    
    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(4)
        ]);
    }
}
