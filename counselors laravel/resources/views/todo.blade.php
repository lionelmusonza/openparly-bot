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
                                            <td><a href="https://wa.me/{{ $todo->phone }}?text=You%20recently%20requested%20for%20a%20counselling%20session%20during%20these%20trying%20times.%20Please%20enter%20your%20verification%20code%20to%20proceed.">Visit Google</a></td>
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
