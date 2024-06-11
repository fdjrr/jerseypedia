<div>
    <header class="navbar navbar-expand-md d-print-none py-2">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{ route('home') }}" class="nav-link" wire:navigate>{{ config('app.name') }}</a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                @auth
                <div class="d-flex">
                    <livewire:wishlist />
                </div>
                @endauth
                <div class="nav-item dropdown d-flex me-3">
                    @auth
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <div class="ps-2">
                            <div>{{ Auth::user()->name }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                    @else
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <div class="ps-2">
                            <i class="icon ti ti-user"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a class="dropdown-item" wire:navigate href="{{ route('auth.login') }}">Sign In</a>
                        <a class="dropdown-item" wire:navigate href="{{ route('auth.register') }}">Register</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <div class="row flex-fill align-items-center">
                        <div class="col">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                                    <a class="nav-link" wire:navigate href="{{ route('home') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="icon ti ti-home"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ Route::is('products.*') ? 'active' : '' }} dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="icon ti ti-shirt-sport"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Pilih Jersey
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                @forelse ($ligas as $liga)
                                                <a class="dropdown-item" wire:navigate href="{{ route('products.liga', $liga->id) }}">
                                                    {{ $liga->nama }}
                                                </a>
                                                @empty
                                                @endforelse
                                                <a class="dropdown-item" wire:navigate href="{{ route('products.index') }}">
                                                    Semua Jersey
                                                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @auth
                                <li class="nav-item {{ Route::is('history.*') ? 'active' : '' }}">
                                    <a class="nav-link" wire:navigate href="{{ route('history.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="icon ti ti-history"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            History
                                        </span>
                                    </a>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
