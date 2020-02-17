@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h3 class="panel-heading">Favorite Quotes</h3>
                    @if (session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif    
                    <a href="{{ route('quotes.create') }}" class="btn btn-primary">Add New Quote</a>
                    <br /> <br />
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Season</th>
                                    <th>Episode</th>
                                    <th>Quote</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quotes as $quo)
                                <tr>
                                    <td>{{ $quo->season }}</td>
                                    <td>{{ $quo->episode }}</td>
                                    <td><q><cite>{{ $quo->quote }}</cite></q></td>
                                    <td>
                                        
                                        <a href="{{ route('quotes.edit', $quo->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('quotes.destroy', $quo->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No entries found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $quotes->links() }}	
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection