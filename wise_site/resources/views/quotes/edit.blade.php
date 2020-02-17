@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Quote</div>
                    <br />
                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('quotes.update', $quote->id) }}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                            <div class="form-row"> 
                                <div class="form-group">
                                    <label for="season">Season</label>
                                    <br />
                                    <input id="season" type="text" name="season" value="{{ old('season') }}" />
                                </div>
                            </div>
                            <div class="form-row"> 
                                <div class="form-group">
                                    <label for="episode">Episode</label>
                                    <br />
                                    <input id="episode" type="text" name="episode" value="{{ old('episode') }}" />
                                </div>
                            </div>
                            <div class="form-row"> 
                                <div class="form-group">
                                    <label for="quote">Quote</label>
                                    <br />
                                    <textarea id="quote" type="text" name="quote" value="{{ old('quote') }}" rows="3"> </textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-success" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection