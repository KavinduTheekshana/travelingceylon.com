<div class="breadcrumb-title pe-3">@yield('page_group')</div>
<div class="ps-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">@yield('page_name')</li>
        </ol>
    </nav>
</div>
