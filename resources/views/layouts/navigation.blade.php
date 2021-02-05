<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel 7</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('about') ? ' active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('contact') ? ' active' : '' }}" href="/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('login') ? ' active' : '' }}" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('posts') ? ' active' : '' }}" href="/posts">Post</a>
          </li>
        </ul>
      </div>
    </div>
</nav>