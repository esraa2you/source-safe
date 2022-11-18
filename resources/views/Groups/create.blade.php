@extends('template')
@section('title', ' create group')

@section('content')
<form action="{{route('group.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Name</label>
            <input type="text" class="form-control is-valid"  name="name"  required>
            @if ($errors->has('name'))
            <span style="color: red">{{$errors->first('name')}}</span>
        @endif
        </div>
        <input type="hidden" class="form-control is-valid"  name="user_id" value="{{Auth::user()->id}}" required>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
@stop
