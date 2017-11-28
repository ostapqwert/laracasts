@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a new Thread</div>
                    <div class="panel-body">
                        <form action="/threads" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                  <label for="channel_id">Choose channel:</label>
                                <select name="channel_id" class="form-control">
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="input thread body">{{ old('body') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
                @include('layouts.errors')
            </div>
        </div>
    </div>


@endsection
