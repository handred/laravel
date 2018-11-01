<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller {

    public function index() {
        return view('admin.addpage', ['pages' => Page::all(['id', 'name'])]);
    }

    public function clear() {
        Page::truncate();
        return redirect('/admin');
    }

    public function create() {
        return view('admin.addpage', ['pages' => Page::all(['id', 'name'])]);
    }

    public function store(Request $request) {
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

    public function show($id) {
        //
    }

    public function edit($id) {
        return view('admin.editpage', ['page' => Page::find($id), 'pages' => Page::all(['id', 'name'])]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|min:3|unique:pages'
        ]);

        $page = Page::find($id);

        if ($validator->fails() && $page->name != $request->name) {
            return redirect('/admin')
                            ->withInput()
                            ->withErrors($validator);
        }

        $page->name = $request->name;
        $page->save();

        return redirect('/admin');
    }

    public function destroy($id) {
        Page::find($id)->delete();
        return redirect('/admin');
    }

}
