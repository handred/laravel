@extends('admin.wrapper')

@section('editpage')

<div>
    @include('common.errors')
    <form action="{{ url('admin/update/'.$page->id)}}" method="POST" >
        {{ csrf_field() }}
       Edit page <input type="text" name="name" id="task-name" class="form-control" value="{{ $page->name }}"/>
        <button type="submit" >
            Confirm change Page
        </button>

    </form>
</div>
@endsection