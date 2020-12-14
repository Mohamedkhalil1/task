<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content ps-container ps-theme-light ps-active-y" data-ps-id="2b736029-8ed0-120e-982e-361a73481db5" style="height: 555px;">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"> 

        <li class="nav-item has-sub open"><a href="#"><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Products</span></a>
          <ul class="menu-content" style="">
            <span class="badge badge badge-success badge-pill float-right mr-1 mt-1">
              {{App\Models\Product::count()}}
            </span>
            <li class="nav-item">
              <a href="{{route('admin.products')}}">
                <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">All Products</span>
              </a>
            </li>

            <li class="nav-item">
              <span class="badge badge badge-success badge-pill float-right mr-1 mt-1">
                {{App\Models\inventory::count()}}
              </span>
              <a href="{{route('admin.products.inventory')}}">
                <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">Inventory</span>
              </a>
            </li>

          </ul>
        </li>


      </ul>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -1473px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 1476px; height: 555px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 224px; height: 84px;"></div></div></div>
  </div>