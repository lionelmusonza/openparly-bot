@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Queue</h1>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Contact</th>
                                        <th>Chat id</th>
                                        <th>Confirm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td>{{ $todo->phone }}</td>
                                            <td>{{ $todo->chatID }}</td>
                                            <td>
                                                <form action="{{ url('/todo/'. $todo->id) }}" method="POST"> 
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Contacted</button>
                                                </form>
                                                
                                            </td>
                                            <td><a href="{{ url('/') }}">Visit Google</a></td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
