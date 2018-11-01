@extends('admin.wrapper')

@section('editpage')

<div>
    @include('admin.errors')
    <form action="{{ url('admin/'.$page->id)}}" method="POST" >
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        Edit page <input type="text" name="name" id="task-name" class="form-control" value="{{ $page->name }}"/>
        <button type="submit" >
            Confirm change Page
        </button>
    </form>
</div>
@endsection