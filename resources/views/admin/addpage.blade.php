@extends('admin.wrapper')

@section('addpage')

<div>
    @include('common.errors')
    <form action="{{ url('admin/addpage')}}" method="POST" >
        {{ csrf_field() }}
        Add page <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}"/>
        <button type="submit" >
            Add Page
        </button>

    </form>
</div>
@endsection