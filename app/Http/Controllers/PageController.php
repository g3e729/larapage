<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function show($slug)
  {
    $page = Page::getPage($slug);
    $data = compact('page');

    if(view()->exists('custom.' . $slug)) {
    	return view('custom.' . $slug, $data);
    }

    return view('pages', $data);
  }
}