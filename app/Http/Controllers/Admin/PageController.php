<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
    	return response()->json(Page::with('parent')->get());
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->get('data');

        $status = $page->fill($data)->save();

		return response()->json($page);
    }

    public function delete(Page $page)
    {
        return response()->json($page->destory());
    }
}
