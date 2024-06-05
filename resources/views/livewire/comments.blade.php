<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-5">
            <div class="card">
                <div class="card-header">
                    <form wire:submit="addComment">
                        <div class="d-flex align-items-center">
                                <input type="text" name="comments" placeholder="Enter Your Comments.." id="" class="form-control" wire:model.blur="newComment">
                                <button type="submit" class="btn btn-outline-success">Add</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                    <div class="card p-3 mb-3">
                        <div class="d-flex align-items-conter justify-content-between mb-2">
                            <h6>{{ $comment->creator->name }}</h6>
                            <span class="text-secondary"> {{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p>{{ $comment->body }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
