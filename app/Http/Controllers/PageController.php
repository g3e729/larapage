<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function show($page)
  {
    $page = Page::getPage($page);

    return view('pages', compact('page'));
  }
}
