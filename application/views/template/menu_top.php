  <!-- BEGIN: Main Menu-->
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
      role="navigation" data-menu="menu-wrapper">
      <!-- Horizontal menu content-->
      <div class="navbar-container main-menu-content" data-menu="menu-container">
          <!-- include ../../../includes/mixins-->
          <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="nav-item"><a class="nav-link" href="<?=site_url('beranda')?>"><i
                          class="ft-home"></i><span>Beranda</span></a>
                  <!-- <ul class="dropdown-menu">
                      <li class="active" data-menu=""><a class="dropdown-item" id="test" href="#"
                              data-toggle="dropdown">eCommerce</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item" href="dashboard-analytics.html"
                              data-toggle="dropdown">Analytics</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item" href="dashboard-fitness.html"
                              data-toggle="dropdown">Fitness</a>
                      </li>
                  </ul> -->
              </li>
              <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                      data-toggle="dropdown"><i class="ft-user"></i><span>ID CARD</span></a>
                  <ul class="dropdown-menu">
                      <li class="active" data-menu=""><a class="dropdown-item" id="test"
                              href="<?=site_url('idcard/page/asn')?>" data-toggle="dropdown">PNS</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item" href="<?=site_url('idcard/page/pppk')?>"
                              data-toggle="dropdown">PPPK</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item" href="<?=site_url('idcard/page/ptt')?>"
                              data-toggle="dropdown">PTT</a>
                      </li>
                  </ul>
              </li>
              <li class="dropdown nav-item"><a class="nav-link" href="<?=site_url('instansi')?>"><i
                          class="ft-globe"></i><span>Instansi</span></a>
                  <!-- <ul class="dropdown-menu">
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                  class="icon-stack-2"></i>Page Layouts</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item" href="horizontal-layout-1-column.html"
                                      data-toggle="dropdown">1 column</a>
                              </li>
                              <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                      class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Content Det.
                                      Sidebar</a>
                                  <ul class="dropdown-menu">
                                      <li data-menu=""><a class="dropdown-item"
                                              href="layout-content-detached-left-sidebar.html"
                                              data-toggle="dropdown">Detached left sidebar</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item"
                                              href="layout-content-detached-left-sticky-sidebar.html"
                                              data-toggle="dropdown">Detached sticky left sidebar</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item"
                                              href="layout-content-detached-right-sidebar.html"
                                              data-toggle="dropdown">Detached right sidebar</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item"
                                              href="layout-content-detached-right-sticky-sidebar.html"
                                              data-toggle="dropdown">Detached sticky right sidebar</a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="dropdown-divider"></li>
                              <li data-menu=""><a class="dropdown-item" href="layout-fixed-navigation.html"
                                      data-toggle="dropdown">Fixed navigation</a>
                              </li>
                              <li class="dropdown-divider"></li>
                              <li data-menu=""><a class="dropdown-item" href="layout-fixed.html"
                                      data-toggle="dropdown">Fixed layout</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="layout-boxed.html"
                                      data-toggle="dropdown">Boxed layout</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="layout-static.html"
                                      data-toggle="dropdown">Static layout</a>
                              </li>
                              <li class="dropdown-divider"></li>
                              <li data-menu=""><a class="dropdown-item" href="layout-light.html"
                                      data-toggle="dropdown">Light layout</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="layout-dark.html"
                                      data-toggle="dropdown">Dark layout</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="layout-semi-dark.html"
                                      data-toggle="dropdown">Semi dark layout</a>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                  class="icon-navicon2"></i>Navbars</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item" href="navbar-light.html"
                                      data-toggle="dropdown">Navbar Light</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="navbar-dark.html"
                                      data-toggle="dropdown">Navbar Dark</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="navbar-semi-dark.html"
                                      data-toggle="dropdown">Navbar Semi Dark</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="navbar-brand-center.html"
                                      data-toggle="dropdown">Brand Center</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="navbar-fixed-top.html"
                                      data-toggle="dropdown">Fixed Top</a>
                              </li>
                              <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                      class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Hide on
                                      Scroll</a>
                                  <ul class="dropdown-menu">
                                      <li data-menu=""><a class="dropdown-item" href="navbar-hide-on-scroll-top.html"
                                              data-toggle="dropdown">Hide on Scroll Top</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item" href="navbar-hide-on-scroll-bottom.html"
                                              data-toggle="dropdown">Hide on Scroll Bottom</a>
                                      </li>
                                  </ul>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="navbar-components.html"
                                      data-toggle="dropdown">Navbar Components</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="navbar-styling.html"
                                      data-toggle="dropdown">Navbar Styling</a>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Vertical Nav</a>
                          <ul class="dropdown-menu">
                              <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                      class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Navigation
                                      Types</a>
                                  <ul class="dropdown-menu">
                                      <li data-menu=""><a class="dropdown-item" href="../vertical-menu-template"
                                              data-toggle="dropdown">Semi Light</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item"
                                              href="../vertical-menu-template-semi-dark" data-toggle="dropdown">Semi
                                              Dark</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item"
                                              href="../vertical-menu-template-nav-dark" data-toggle="dropdown">Nav
                                              Dark</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item" href="../vertical-menu-template-light"
                                              data-toggle="dropdown">Light</a>
                                      </li>
                                      <li data-menu=""><a class="dropdown-item" href="../vertical-overlay-menu-template"
                                              data-toggle="dropdown">Overlay Menu</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Horizontal Nav</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item" href="../horizontal-menu-template"
                                      data-toggle="dropdown">Left Icon Navigation</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-fixed.html"
                                      data-toggle="dropdown">Fixed Navigation</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-flipped.html"
                                      data-toggle="dropdown">Flipped Navigation</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-submenu-click.html"
                                      data-toggle="dropdown">Submenu on Click</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-submenu-hover.html"
                                      data-toggle="dropdown">Submenu on Hover</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-light.html"
                                      data-toggle="dropdown">Light Navigation</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-dark.html"
                                      data-toggle="dropdown">Dark Navigation</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-right-side-icons.html"
                                      data-toggle="dropdown">Right side icons</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-no-dropdown.html"
                                      data-toggle="dropdown">No Dropdown Arrow</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-disabled.html"
                                      data-toggle="dropdown">Disabled Navigation</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-tags-pills.html"
                                      data-toggle="dropdown">Tags &amp; Pills</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="horizontal-nav-styling.html"
                                      data-toggle="dropdown">Navigation Styling</a>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                  class="icon-header"></i>Page Headers</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item" href="headers-breadcrumbs-basic.html"
                                      data-toggle="dropdown">Breadcrumbs basic</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="headers-breadcrumbs-top.html"
                                      data-toggle="dropdown">Breadcrumbs top</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="headers-breadcrumbs-bottom.html"
                                      data-toggle="dropdown">Breadcrumbs bottom</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="headers-breadcrumbs-with-button.html"
                                      data-toggle="dropdown">Breadcrumbs with button</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="headers-breadcrumbs-with-round-button.html"
                                      data-toggle="dropdown">Breadcrumbs with round button 2</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="headers-breadcrumbs-with-stats.html"
                                      data-toggle="dropdown">Breadcrumbs with stats</a>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                  class="icon-vertical_align_bottom"></i>Footers</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item" href="footer-light.html"
                                      data-toggle="dropdown">Footer Light</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="footer-dark.html"
                                      data-toggle="dropdown">Footer Dark</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="footer-transparent.html"
                                      data-toggle="dropdown">Footer Transparent</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="footer-fixed.html"
                                      data-toggle="dropdown">Footer Fixed</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item" href="footer-components.html"
                                      data-toggle="dropdown">Footer Components</a>
                              </li>
                          </ul>
                      </li>
                  </ul> -->
              </li>

              <li class="nav-item"><a class="nav-link" href="<?=site_url('user')?>"><i
                          class="ft-users"></i><span>User</span></a>
                  <!-- <ul class="dropdown-menu">
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/horizontal-layout-1-column.html"
                              data-toggle="dropdown">1 column</a>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Content Det.
                              Sidebar</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-left-sidebar.html"
                                      data-toggle="dropdown">Detached left sidebar</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-left-sticky-sidebar.html"
                                      data-toggle="dropdown">Detached sticky left sidebar</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-right-sidebar.html"
                                      data-toggle="dropdown">Detached right sidebar</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-right-sticky-sidebar.html"
                                      data-toggle="dropdown">Detached sticky right sidebar</a>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-fixed-navigation.html"
                              data-toggle="dropdown">Fixed navigation</a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-fixed.html"
                              data-toggle="dropdown">Fixed layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-boxed.html"
                              data-toggle="dropdown">Boxed layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-static.html"
                              data-toggle="dropdown">Static layout</a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-light.html"
                              data-toggle="dropdown">Light layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-dark.html"
                              data-toggle="dropdown">Dark layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-semi-dark.html"
                              data-toggle="dropdown">Semi dark layout</a>
                      </li>
                  </ul> -->
              </li>

              <li class="nav-item"><a class="nav-link" href="<?=site_url('pengaturan')?>"><i
                          class="fa fa-sliders"></i><span>Pengaturan</span></a>
                  <!-- <ul class="dropdown-menu">
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/horizontal-layout-1-column.html"
                              data-toggle="dropdown">1 column</a>
                      </li>
                      <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                              class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Content Det.
                              Sidebar</a>
                          <ul class="dropdown-menu">
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-left-sidebar.html"
                                      data-toggle="dropdown">Detached left sidebar</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-left-sticky-sidebar.html"
                                      data-toggle="dropdown">Detached sticky left sidebar</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-right-sidebar.html"
                                      data-toggle="dropdown">Detached right sidebar</a>
                              </li>
                              <li data-menu=""><a class="dropdown-item"
                                      href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-content-detached-right-sticky-sidebar.html"
                                      data-toggle="dropdown">Detached sticky right sidebar</a>
                              </li>
                          </ul>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-fixed-navigation.html"
                              data-toggle="dropdown">Fixed navigation</a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-fixed.html"
                              data-toggle="dropdown">Fixed layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-boxed.html"
                              data-toggle="dropdown">Boxed layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-static.html"
                              data-toggle="dropdown">Static layout</a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-light.html"
                              data-toggle="dropdown">Light layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-dark.html"
                              data-toggle="dropdown">Dark layout</a>
                      </li>
                      <li data-menu=""><a class="dropdown-item"
                              href="../../../starter-kit/ltr/horizontal-menu-template-nav/layout-semi-dark.html"
                              data-toggle="dropdown">Semi dark layout</a>
                      </li>
                  </ul> -->
              </li>
          </ul>
      </div>
      <!-- /horizontal menu content-->
  </div>
  <!-- END: Main Menu-->