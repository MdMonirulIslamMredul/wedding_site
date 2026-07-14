<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-cyan elevation-3">
    <a class="brand-link" href="{{ route('frontend.index') }}">
        <img src="{{ asset(get_setting('admin_logo')) }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ app_name() }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <x-utils.link-sidebar :href="route('admin.dashboard')" :text="__('Dashboard')" icon="nav-icon icon-speedometer"
                        :active="activeClass(Route::is('admin.dashboard'))" class="nav-link" />
                </li>


                 <li class="nav-item">
                                <x-utils.link :href="route('admin.appointment.search')" icon="nav-icon icon-star" class="nav-link"
                                    :text="__('Appointments')" />
                            </li>



                @if (
                    $logged_in_user->hasAllAccess() ||
                        ($logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')))

                    <li
                        class="nav-item {{ activeClass(Route::is('admin.auth.user.') || Route::is('admin.auth.role.'), 'menu-open') }}">
                        @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.setting'))
                    <li class="nav-item">
                        <x-utils.link-sidebar href="#" :text="__('Site Settings')" icon="nav-icon icon-star"
                            class="nav-link" rightIcon="fas fa-angle-left right" />
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.general')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('General Settings')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.about.settings')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('About Settings')" />
                            </li>
                               <li class="nav-item">
                                <x-utils.link :href="route('admin.about.committee')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Member Settings')" />
                            </li>

                            {{-- <li class="nav-item">
                                <x-utils.link :href="route('admin.about.committee.type')" icon="nav-icon icon-arrow-right" class="nav-link" :text="__('Member Type Settings')" />
                            </li> --}}


                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.slider')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Slider Settings')" />
                            </li>

                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.service')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Service Settings')" />
                            </li>

                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.project')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Project Settings')" />
                            </li>

                            <li class="nav-item">
                                <x-utils.link :href="route('admin.area')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Add Service Area')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.testmony')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Testmony Settings')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.blog')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Blog Settings')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.faq')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Faq Settings')" />
                            </li>


                            <li class="nav-item">
                                <x-utils.link :href="route('admin.mission')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Mission Settings')" />
                            </li>

                             <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.gallery')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Gellary Settings')" />
                            </li>

                             <li class="nav-item">
                                <x-utils.link :href="route('admin.setting.brand')" icon="nav-icon icon-arrow-right" class="nav-link"
                                    :text="__('Partnership Management')" />
                            </li>


                        </ul>
                    </li>
                @endif


                @endif

                @if ($logged_in_user->hasAllAccess())
                    <li class="nav-item ">
                        <x-utils.link-sidebar href="#" :text="__('Logs')" icon="nav-icon fas fa-list"
                            class="nav-link" rightIcon="fas fa-angle-left right" />
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <x-utils.link :href="route('log-viewer::dashboard')" icon="nav-icon far fa-circle" class="nav-link"
                                    :text="__('Dashboard')" />
                            </li>
                            <li class="nav-item">
                                <x-utils.link :href="route('log-viewer::logs.list')" icon="nav-icon far fa-circle" class="nav-link"
                                    :text="__('Logs')" />
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
