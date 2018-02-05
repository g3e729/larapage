<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="/">
          {{ env('APP_NAME') }}
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="/">Home</a></li>

          @foreach(\App\Models\Page::where('displays->header', true)->get() as $page)
            <li><a href="{{ $page->slug }}">{{ $page->title }}</a></li>
            {{-- <li class="menu-has-children"><a href="{{ $page->slug }}">{{ $page->title }}</a>
              <ul class="hide">
                <li><a href="#">Drop Down 1</a></li>
                <li class="menu-has-children"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
              </ul>
            </li> --}}
          @endforeach

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->