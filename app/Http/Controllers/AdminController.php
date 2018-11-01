<?php

namespace App\Page;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.addpage', ['pages' => Page::all(['id', 'name'])]);
    }


    public function create()
    {
        return view('admin.addpage', ['pages' => Page::all(['id', 'name'])]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|min:3|unique:pages'
        ]);

        if ($validator->fails()) {
            return redirect('/admin')
                            ->withInput()
                            ->withErrors($validator);
        }

        $task = new Page;
        $task->name = $request->name;
        $task->nameid = microtime();
        $task->save();

        return redirect('/admin');
    }

    public function show(Page $page)
    {
        //
    }

    public function edit(Page $page)
    {
        return view('admin.editpage', ['page' => $page, 'pages' => Page::all(['id', 'name'])]);
    }


    public function update(Request $request, Page $page)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|min:3|unique:pages'
        ]);

        if ($validator->fails() && $page->name != $request->name) {
            return redirect('/admin')
                            ->withInput()
                            ->withErrors($validator);
        }

        $page->name = $request->name;
        $page->save();

        return redirect('/admin');
    }


    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/admin');
    }
}
