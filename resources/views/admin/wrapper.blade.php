@extends('admin.main')

@section('wrapper')

<div class="row">
    <form action="{{ url('admin/clear') }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" >Clear </button>
    </form>
</div>


<div class="row">
    <div class="menu">
        @if (count($pages) > 0)
        <table>
            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td class="table-text"><div><a href='{{ url('admin/'.$page->id.'/edit') }}'>{{ $page->name }}</a></div></td>
                    <td>
                        <form action="{{ url('admin/'.$page->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" >Delete </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="content">
        @yield('addpage')
        
        @yield('editpage')
    </div>
</div>

@endsection



