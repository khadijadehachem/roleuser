<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                                            href="../../../html/ltr/vertical-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route("manager.home") }}">
                    <!--admin.home-->
                    <i class="feather icon-home"></i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            
            @can('user_management_access')
           
                <li class=" nav-item">
                    <a href="#"><i class="feather icon-users"></i><span
                            class="menu-title">{{ trans('cruds.userManagement.title') }}</span></a>
                    <ul class="menu-content">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="feather icon-unlock"></i>
                                    <span class="menu-item">{{ trans('cruds.permission.title') }}</span></a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class=" {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="feather icon-briefcase"></i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class=" {{ request()->is('manager/users') || request()->is('manager/users/*') ? 'active' : '' }}">
                                <a href="{{ route("manager.users.index") }}">
                                    <i class="feather icon-user"></i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
           <!---------------------------categories------------------------------------------>
            @can('category_access')
           
             <li class="nav-item {{ request()->is('manager/categories') || request()->is('manager/categories/*') ? 'active' : '' }}">
               <a href="{{ route("manager.categories.index") }}"><i class="feather icon-users"></i><span
                       class="menu-title">{{ trans('cruds.category.title') }}</span></a>
             
             </li>
             @endcan
           <!-------------------------------------------------------------------------->

            @can('basic_c_r_m_access')
                <li class=" nav-item">
                    <a href="#"><i class="feather icon-briefcase"></i><span
                            class="menu-title"> {{ trans('cruds.basicCRM.title') }}</span></a>
                    <ul class="menu-content">
                        @can('crm_status_access')
                            <li class="{{ request()->is('admin/crm-statuses') || request()->is('admin/crm-statuses/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.crm-statuses.index") }}">
                                    <i class="feather icon-tag">

                                    </i>
                                    {{ trans('cruds.crmStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_customer_access')
                            <li class="{{ request()->is('admin/crm-customers') || request()->is('admin/crm-customers/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.crm-customers.index") }}">
                                    <i class="feather icon-user-plus">

                                    </i>
                                    {{ trans('cruds.crmCustomer.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_note_access')
                            <li class=" {{ request()->is('admin/crm-notes') || request()->is('admin/crm-notes/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.crm-notes.index") }}">
                                    <i class="feather icon-clipboard">

                                    </i>
                                    {{ trans('cruds.crmNote.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_document_access')
                            <li class=" {{ request()->is('admin/crm-documents') || request()->is('admin/crm-documents/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.crm-documents.index") }}">
                                    <i class="feather icon-folder">

                                    </i>
                                    {{ trans('cruds.crmDocument.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="nav-item">
                        <a class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                           href="{{ route('profile.password.edit') }}">
                            <i class="feather icon-refresh-cw">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="feather icon-log-out">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>


        </ul>
    </div>
</div>
