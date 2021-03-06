<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div>
                {{ config('app.name') }}
            </div>
        </div>
        <nav class="menu">
            <sidebar-menu></sidebar-menu>
        </nav>
    </div>
    @include('layouts._particles.sidebar-footer')
</aside>
<div class="sidebar-overlay"
     id="sidebar-overlay" @click="sidebarPanel"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>
