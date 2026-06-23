@php
    $menuItems = \App\Models\NavigationItem::query()
        ->active()
        ->whereNull('parent_id')
        ->with(['children' => fn ($query) => $query->active()->orderBy('sort_order')->orderBy('label')])
        ->orderBy('sort_order')
        ->orderBy('label')
        ->get();

    $defaultMenuItems = [
        [
            'label' => 'Services',
            'children' => [
                ['label' => 'Outsourced Data Protection Officer (DPO)', 'route' => 'services.dpo'],
                ['label' => 'Data Protection Training', 'route' => 'services.dpt'],
                ['label' => 'Data Protection Consultancy', 'route' => 'services.dpc'],
                ['label' => 'Data Protection Auditor Services', 'route' => 'services.dpas'],
            ],
        ],
        [
            'label' => 'Sector',
            'children' => [
                ['label' => 'Banking & Finance', 'route' => 'sectors.one'],
                ['label' => 'Pensions & Insurance', 'route' => 'sectors.two'],
                ['label' => 'Medical & Healthcare', 'route' => 'sectors.three'],
                ['label' => 'Technology', 'route' => 'sectors.four'],
                ['label' => 'Education', 'route' => 'sectors.five'],
                ['label' => 'Non-Governmental Organisations', 'route' => 'sectors.six'],
            ],
        ],
        ['label' => 'About Us', 'route' => 'about'],
        ['label' => 'Events & News', 'route' => 'events'],
        ['label' => 'Blog', 'route' => 'blog'],
        ['label' => 'Contact Us', 'route' => 'contact'],
        ['label' => "FAQ's", 'route' => 'faqs'],
    ];

    $resolveRoute = static fn (?string $route): string => $route && Route::has($route) ? route($route) : '#';
    $isRouteActive = static fn (?string $route): bool => is_string($route) && $route !== '' && (Route::is($route) || Route::is($route.'.*'));
    $isItemActive = static function ($item) use ($isRouteActive): bool {
        if ($isRouteActive($item->route_name)) {
            return true;
        }

        return $item->children->contains(fn ($child): bool => $isRouteActive($child->route_name));
    };
@endphp

<nav class="ec-nav sticky-top bg-white border-primary shadow-danger--onHover shadow-primary">
    <div class="container-fluid">
        <div class="navbar p-0 navbar-expand-lg">
            <div class="navbar-brand">
                <a class="logo-default" href="{{ route('home') }}"><img alt="Silham" src="{{ cms_media_url(cms_setting('logo_path', 'assets/img/logo3.png')) }}"></a>
            </div>
            <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible"
                  data-toggle="collapse">
                <div class="hamburger hamburger--spin js-hamburger">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </span>
            <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
                <ul class="nav navbar-nav ec-nav__navbar ml-auto font-weight-bold font-size-24">
                    @if ($menuItems->isNotEmpty())
                        @foreach ($menuItems as $item)
                            @php
                                $hasChildren = $item->children->isNotEmpty();
                                $active = $isItemActive($item);
                                $href = $hasChildren && blank($item->route_name) && blank($item->url) ? '#' : $item->publicUrl();
                            @endphp
                            <li class="nav-item {{ $hasChildren ? 'nav-item__has-dropdown' : 'hover:bg-primary' }} {{ $active ? 'active bg-primary text-white' : '' }}">
                                <a class="nav-link mb-0 {{ $hasChildren ? 'dropdown-toggle' : 'hover:text-white' }} {{ $active ? 'text-white' : '' }}"
                                   href="{{ $href }}"
                                   @if ($hasChildren) data-toggle="dropdown" @endif
                                   @if ($item->opens_new_tab) target="_blank" rel="noopener noreferrer" @endif>
                                    {{ $item->label }}
                                </a>

                                @if ($hasChildren)
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            @foreach ($item->children as $child)
                                                @php
                                                    $childActive = $isRouteActive($child->route_name);
                                                @endphp
                                                <li>
                                                    <a class="nav-link__list {{ $childActive ? 'active bg-primary text-white' : '' }}"
                                                       href="{{ $child->publicUrl() }}"
                                                       @if ($child->opens_new_tab) target="_blank" rel="noopener noreferrer" @endif>
                                                        {{ $child->label }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    @else
                        @foreach ($defaultMenuItems as $item)
                            @php
                                $children = $item['children'] ?? [];
                                $hasChildren = count($children) > 0;
                                $active = $hasChildren
                                    ? collect($children)->contains(fn ($child): bool => $isRouteActive($child['route'] ?? null))
                                    : $isRouteActive($item['route'] ?? null);
                            @endphp
                            <li class="nav-item {{ $hasChildren ? 'nav-item__has-dropdown' : 'hover:bg-primary' }} {{ $active ? 'active bg-primary text-white' : '' }}">
                                <a class="nav-link mb-0 {{ $hasChildren ? 'dropdown-toggle' : 'hover:text-white' }} {{ $active ? 'text-white' : '' }}"
                                   data-toggle="{{ $hasChildren ? 'dropdown' : '' }}"
                                   href="{{ $hasChildren ? '#' : $resolveRoute($item['route'] ?? null) }}">
                                    {{ $item['label'] }}
                                </a>

                                @if ($hasChildren)
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            @foreach ($children as $child)
                                                <li>
                                                    <a class="nav-link__list {{ $isRouteActive($child['route'] ?? null) ? 'active bg-primary text-white' : '' }}"
                                                       href="{{ $resolveRoute($child['route'] ?? null) }}">
                                                        {{ $child['label'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="nav-toolbar">
                <ul class="navbar-nav ec-nav__navbar"></ul>
            </div>
        </div>
    </div>
</nav>

<div class="site-search">
    <div class="site-search__close bg-black-0_8"></div>
    <form class="form-site-search" action="#" method="POST">
        <div class="input-group">
            <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
            </div>
        </div>
    </form>
</div>
