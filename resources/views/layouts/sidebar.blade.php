<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    {{-- <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo.png" alt="small logo">
        </span>
    </a> --}}

    <!-- Brand Logo Dark -->
    <a href="/" class="logo logo-dark pt-3 d-flex flex-column align-items-center">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo.png" alt="small logo">
        </span>
    </a>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="/" class="side-nav-link">
                    <i class="ri-dashboard-2-fill"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Pages</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="index.html#multilevel" aria-expanded="false"
                    aria-controls="multilevel" class="side-nav-link">
                    <i class="ri-share-fill"></i>
                    <span> Multilevel </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="multilevel">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">Item 1</a>
                        </li>
                        <li>
                            <a href="#">Item 2</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
