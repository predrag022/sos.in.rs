<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('organizacija')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">
                        </i>
                        <span>Upravljanje korisnicima</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('organizacija')
                            <li class="{{ request()->is('admin/operateri') || request()->is('admin/operateri/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.operateri.index") }}">
                                    <i class="fa-fw fas fa-user">
                                    </i>
                                    <span>Operateri</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/volonteri') || request()->is('admin/volonteri/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.volonteri.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>Volonteri</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('contact_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-phone-square">

                        </i>
                        <span>{{ trans('cruds.contactManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('contact_company_access')
                            <li class="{{ request()->is('admin/contact-companies') || request()->is('admin/contact-companies/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.contact-companies.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.contactCompany.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('contact_contact_access')
                            <li class="{{ request()->is('admin/contact-contacts') || request()->is('admin/contact-contacts/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.contact-contacts.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.contactContact.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('faq_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-question">

                        </i>
                        <span>{{ trans('cruds.faqManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('faq_category_access')
                            <li class="{{ request()->is('admin/faq-categories') || request()->is('admin/faq-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.faq-categories.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.faqCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('faq_question_access')
                            <li class="{{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.faq-questions.index") }}">
                                    <i class="fa-fw fas fa-question">

                                    </i>
                                    <span>{{ trans('cruds.faqQuestion.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('block_access')
                <li class="{{ request()->is('admin/blocks') || request()->is('admin/blocks/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.blocks.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.block.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('dostave_access')
                <li class="{{ request()->is('admin/dostaves') || request()->is('admin/dostaves/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.dostaves.index") }}">
                        <i class="fa-fw fas fa-cart-arrow-down">

                        </i>
                        <span>{{ trans('cruds.dostave.title') }}</span>
                    </a>
                </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>
