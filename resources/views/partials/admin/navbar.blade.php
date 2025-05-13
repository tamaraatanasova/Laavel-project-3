<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">Додај</a>
  </li>
  <li class="nav-item">
      <a class="nav-link {{ request()->is('edit') ? 'active' : '' }}" href="{{ url('/edit') }}">Измени</a>
  </li>
</ul>
