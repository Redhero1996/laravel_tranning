@extends('master')
@section('title', 'View all tickets')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Tickets </h2>
                </div>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($tickets->isEmpty())
                    <p> There is no ticket.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{!! $ticket->id !!} </td>
                                    <td>
                                        <a href="{{ route('tickets.show', $ticket->slug) }}">
                                            {!! $ticket->title !!}
                                        </a>
                                    </td>
                                    <td>{!! $ticket->status ? 
                                        '<span class="label label-default"> Pending </span>' : 
                                        '<span class="label label-info"> Answered </span>' 
                                        !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection