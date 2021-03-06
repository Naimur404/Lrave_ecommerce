<!-- partial:../../partials/_navbar.html -->

<!-- partial -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('asset/images/faces/face8.jpg') }}"
                        alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Allen Moreno</p>
                    <p class="designation">Premium user</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="ui-basic"
                aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.product.create') }}">Add prodduct</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.product.index') }}">Manage Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#basic" aria-expanded="false" aria-controls="basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Brand</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.brand.create') }}">Add Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.brand.index') }}">Manage Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#basic5" aria-expanded="basic5"
                aria-controls="basic5">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Division</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="basic5">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.division.create') }}">Add Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.division.index') }}">Manage Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#basic6" aria-expanded="basic6"
                aria-controls="basic6">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">District</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="basic6">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.district.index') }}">Manage District</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.create') }}"> Add Category </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}"> Manage Category </a>
                    </li>

                    {{-- <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                </li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#slider" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Slider</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="slider">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.slider.index') }}"> Index </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.index') }}"> Manage Category </a>
                    </li>

                    {{-- <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                </li> --}}
                </ul>
            </div>
        </li>

    </ul>
</nav>
<!-- page-body-wrapper ends -->
