@extends('template')
@section('title', 'Groups')

@section('content')
<div class="container" style="padding-top: 4%">
    @if (session('status'))
    <div class=" alert alert-success" id='box'>
            {{ session('status') }}
        </div>
    @endif
    </div>
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <h1 class="display-4">All Groups</h1>

            </div>
        </div>
        @php
            $i = 0;
        @endphp
        <table class="table table-striped table-hover"style="width:1000px">
            <thead>
                <tr>
                    <th scope="col"># </th>
                    <th scope="col">Group Name</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $item)
                    <tr>
                        <td>
                        {{$i}}
                        </td>

                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('group.edit', $item->id) }}"><i class="fas fa-edit"
                                    style="color:rgb(149, 196, 32)"></i></a>
                            <a href="{{ route('group.destroy', $item->id) }}"><i class="fas fa-trash "
                                    style="color:rgb(232, 27, 0)"></i></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p><button><a style="color:rgb(217, 16, 16)" href="{{ route('group.create') }}">Insert new group</a></button>
    </p>

@stop
