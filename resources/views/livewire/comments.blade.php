<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <input type="text" name="comments" placeholder="Enter Your Comments.." id="" class="form-control" wire:model="newComment">
                        <button class="btn btn-outline-success" wire:click="addComment">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                    <div class="card p-3 mb-3">
                        <div class="d-flex align-items-conter justify-content-between mb-2">
                            <h6>{{ $comment['creator'] }}</h6>
                            <span class="text-secondary"> {{ $comment['created_at'] }}</span>
                        </div>
                        <p>{{ $comment['body'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
