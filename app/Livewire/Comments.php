<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam minus dicta a optio non fuga? Facilis molestiae dolores consequatur harum.',
            'created_at' => '9 minutes ago',
            'creator' => 'Biplob Jabery',
        ],
    ];

    public $newComment = '';

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
