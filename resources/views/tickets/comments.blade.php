<div class="comments">
    @foreach($ticket->comments as $comment)
        <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
            <div class="panel panel-heading">
                {{ $comment->user->name }}:

                <span class="pull-right">{{ $comment->created_at }}</span>
            </div>

            <div class="panel card-body">
                {{ $comment->comment }}
            </div>
            <hr>
        </div>
    @endforeach
</div>
