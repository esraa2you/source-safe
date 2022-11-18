@extends('template')
@section('title', ' edit group')

@section('content')
<form action="{{route('group.update',$group->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Name</label>
            <input type="text" class="form-control is-valid"  name="name" value="{{$group->name}}" required>
            @if ($errors->has('name'))
            <span style="color: red">{{$errors->first('name')}}</span>
        @endif
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
@stop
