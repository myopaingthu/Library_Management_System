<div class="app-sidebar sidebar-shadow">
  <div class="app-header__logo">
    <div class="header__pane ml-auto">
      <div>
        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
  <div class="app-header__mobile-menu">
    <div>
      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
  <div class="app-header__menu">
    <span>
      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
        <span class="btn-icon-wrapper">
          <i class="fa fa-ellipsis-v fa-w-6"></i>
        </span>
      </button>
    </span>
  </div>
  <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
      <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Dashboards</li>
        <li>
          <a href="{{route('dashboard')}}" class=" {{ (request()->is('dashboard')) ? 'mm-active' : '' }}">
            <i class="metismenu-icon fas fa-database"></i>
            Admin Dashboard
          </a>
        </li>
        <li>
          <a href="{{route('authors.index')}}" class=" {{ (request()->is('authors*')) ? 'mm-active' : '' }}">
            <i class="metismenu-icon fas fa-users"></i>
            Authors
          </a>
        </li>
        <li>
          <a href="{{route('publishers.index')}}" class=" {{ (request()->is('publishers*')) ? 'mm-active' : '' }}">
            <i class="metismenu-icon fas fa-users"></i>
            Publishers
          </a>
        </li>
        <li>
          <a href="{{route('categories.index')}}" class=" {{ (request()->is('categories*')) ? 'mm-active' : '' }}">
            <i class="metismenu-icon fas fa-stream"></i>
            Categories
          </a>
        </li>
        <li>
          <a href="{{route('users.index')}}" class=" {{ (request()->is('users*')) ? 'mm-active' : '' }}">
            <i class="metismenu-icon fas fa-users"></i>
            Users
          </a>
        </li>
        <li>
          <a href="{{route('setting.show')}}" class=" {{ (request()->is('setting*')) ? 'mm-active' : '' }}">
            <i class="metismenu-icon fas fa-stream"></i>
            Setting
          </a>
        </li>
        <li>
            <a href="{{route('books.index')}}" class=" {{ (request()->is('books*')) ? 'mm-active' : '' }}">
                <i class="metismenu-icon fas fa-book"></i>
                Books
            </a>
        </li>
        <li>
            <a href="{{route('issue-books.index')}}" class=" {{ (request()->is('book-issues*')) ? 'mm-active' : '' }}">
                <i class="metismenu-icon fas fa-book"></i>
                Book Issues
            </a>
        </li>
      </ul>
    </div>
  </div>
</div>
