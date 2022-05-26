<div class="panel panel-default">
    <div class="panel-heading">Добавить комментарий</div>

    <div class="panel-body">
        <div class="comment-form">

            <form action="{{ url('admin/comment') }}" method="POST" class="form">
                {!! csrf_field() !!}

                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                    @if ($errors->has('comment'))
                        <span class="help-block">
                               <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
