<template>
  <div class="wrapper">
    <nav id="sidebar">
      <div class="sidebar-header sidebarCollapse">
        <h3>Test</h3>
        <strong>tst</strong>
      </div>

      <ul class="list-unstyled components">
        <li class="active">
            <router-link :to="{name: 'Dashboard'}">
              <i class="fa fa-tachometer" data-toggle="tooltip" data-placement="right" title="Dashboard"></i>
              <span>Dashboard</span>
            </router-link>
            <ul class="collapse list-unstyled" id="dashboardSubmenu">
            </ul>
        </li>
        <li>
            <router-link :to="{name: 'Pages'}">
              <i class="fa fa-copy" data-toggle="tooltip" data-placement="right" title="Pages"></i>
              <span>Pages</span>
            </router-link>
            <!-- <a href="#pagesSubmenu" data-toggle="collapse">
              <i class="glyphicon glyphicon-duplicate" data-toggle="tooltip" data-placement="right" title="Pages"></i>
              <span>Pages</span>
            </a>
            <ul class="collapse list-unstyled" id="pagesSubmenu">
              <li><a href="#">Active</a></li>
              <li><a href="#">Drafts</a></li>
            </ul> -->
        </li>
      </ul>

      <a href="#" class="btn btn-primary">
        <i class="fa fa-sign-out"></i>
        Logout
      </a>
    </nav>
    
    <router-view></router-view>
  </div>
</template>
