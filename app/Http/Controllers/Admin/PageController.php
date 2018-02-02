<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	return Page::all();
    }

    public function update(Request $request, Page $page)
    {
    	try {
    		$page = $page->update($request->all());

    		return $page;
    	} catch {
    		return false;
    	}
    }

    public function delete(Page $page)
    {
    	$page->destory();
    	return $page;
    }
}
