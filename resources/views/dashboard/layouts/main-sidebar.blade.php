<style>
    .ac {
        background: gainsboro;
    }
</style>
<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('dashboard/welcome') }}"><img
                src="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" style="height: 180%;margin-top: -13px;"
                class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('dashboard/welcome') }}"><img
                src="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('dashboard/welcome') }}"><img
                src="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('dashboard/welcome') }}"><img
                src="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{ auth()->user()->image_path }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span
                        class="mb-0 text-muted">{{ implode(', ', auth()->user()->roles->pluck('display_name')->toArray()) }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">

            <li class="slide">
                <a class="side-menu__item" href="{{ asset('dashboard/welcome') }}"><i style="margin: 14px;"
                        class="icon-home"></i><span class="side-menu__label">{{ trans('app.dashboard') }}</span></a>
            </li>
            @if (auth()->user()->isAbleTo(['read_package_furniture_order']))
                <li class="slide {{ isUrlActive('package-1/orders', true) ? 'active' : '' }}">
                    <a class="side-menu__item" href="{{ route('dashboard.package_2.order.index') }}"><i
                            style="margin: 14px;" class="icon fas fa-house-damage"></i><span
                            class="side-menu__label">طلبات باقات
                            التوفير</span></a>
                </li>
            @endif
            @if (auth()->user()->isAbleTo(['read_request_project']))
                <li
                    class="slide {{ (isUrlActive('request_project', false, ['type' => 2]) or isUrlActive('project', false, ['type' => 2])) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-house-damage"></i><span
                            class="side-menu__label">{{ trans('projects.request_type.2') }}</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('request_project', false, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.request_project.index') }}?type=2">
                                {{ trans('projects.project_request') }}</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/project', true, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.project.index') }}?type=2">
                                {{ trans('projects.projects') }}</a></li>


                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('request_project_not_completed', false, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.request_project.not_completed') }}?type=2">
                                {{ trans('projects.project_not_completed') }}</a>
                        </li>



                        <!-- RenewAble Projects -->

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/show/renewable/projects/index', true, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.show.renewable.projects.index') }}?type=2">
                                المشاريع المجدده
                            </a>
                        </li>

                        <li style="margin-right: 5%; margin-top: 20px;">
                            <a class="slide-item  {{ isUrlActive('dashboard/project', true, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.renewable.index') }}">
                                أيام إرسال إشعارات المشاريع المجدده
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- end --}}
            @endif
            @if (auth()->user()->isAbleTo(['read_request_project']))
                <li
                    class="slide {{ (isUrlActive('request_project', false, ['type' => 1]) or isUrlActive('project', false, ['type' => 1])) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-paint-roller"></i><span
                            class="side-menu__label">{{ trans('projects.request_type.1') }}</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('dashboard/request_project', true, ['type' => 1]) ? 'active' : '' }}"
                                href="{{ route('dashboard.request_project.index') }}?type=1">
                                {{ trans('projects.project_request') }}</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/project', true, ['type' => 1]) ? 'active' : '' }}"
                                href="{{ route('dashboard.project.index') }}?type=1">
                                {{ trans('projects.projects') }}</a></li>


                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('request_project_not_completed', false, ['type' => 1]) ? 'active' : '' }}"
                                href="{{ route('dashboard.request_project.not_completed') }}?type=1">
                                {{ trans('projects.project_not_completed') }}
                            </a>
                        </li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item
                                {{ isUrlActive('dashboard/project_budget/create', true) ? 'active' : '' }} "
                                href="{{ route('dashboard.project_budget.index') }}">
                                الحد الادني للميزانيه
                            </a>
                        </li>


                        <!-- RenewAble Projects -->

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/show/renewable/projects/index', true, ['type' => 1]) ? 'active' : '' }}"
                                href="{{ route('dashboard.show.renewable.projects.index') }}?type=1">
                                المشاريع المجدده
                            </a>
                        </li>


                        <li style="margin-right: 5%; margin-top: 20px;">
                            <a class="slide-item  {{ isUrlActive('dashboard/project', true, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.renewable.index') }}">
                                أيام إرسال إشعارات المشاريع المجدده
                            </a>
                        </li>

                        {{-- <li style="margin-right: 5%;">
                            <a class="slide-item  {{ isUrlActive('dashboard/project_budget/create', false, ['type' => 1]) ? 'active' : '' }}"
                                href="{{ route('dashboard.project_budget.index') }}">
                                الحد الادني للميزانيه
                            </a>
                        </li> --}}



                    </ul>
                </li>
                {{-- end --}}
            @endif
            @if (auth()->user()->isAbleTo(['read_request_project']))
                <li
                    class="slide {{ (isUrlActive('request_project', false, ['type' => 3]) or isUrlActive('project', false, ['type' => 3])) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-ruler-combined"></i> <span
                            class="side-menu__label">{{ trans('projects.designs_requests') }}</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('request_project', false, ['type' => 3]) ? 'active' : '' }}"
                                href="{{ route('dashboard.request_project.index') }}?type=3">
                                {{ trans('projects.project_request') }}</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/project', true, ['type' => 3]) ? 'active' : '' }}"
                                href="{{ route('dashboard.project.index') }}?type=3">
                                {{ trans('projects.projects') }}</a></li>




                        <!-- RenewAble Projects -->
                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/show/renewable/projects/index', true, ['type' => 3]) ? 'active' : '' }}"
                                href="{{ route('dashboard.show.renewable.projects.index') }}?type=3">
                                المشاريع المجدده
                            </a>
                        </li>


                        <li style="margin-right: 5%; margin-top: 20px;">
                            <a class="slide-item  {{ isUrlActive('dashboard/project', true, ['type' => 2]) ? 'active' : '' }}"
                                href="{{ route('dashboard.renewable.index') }}">
                                أيام إرسال إشعارات المشاريع المجدده
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- end --}}
            @endif
            {{-- project not completed --}}


            @if (auth()->user()->isAbleTo(['read_products']))
                <li
                    class="slide {{ (isUrlActive('dashboard/products', true) or
                    isUrlActive('dashboard/products/create', true) or
                    isUrlActive('offers', false) or
                    isUrlActive('top-product', false) or
                    isUrlActive('coupons', false) or
                    isUrlActive('dashboard/orders', true) or
                    isUrlActive('orders/details', false))
                        ? 'active'
                        : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-shopping-basket"></i><span class="side-menu__label">متجر
                            التسوق</span><i class="angle fe fe-chevron-down"></i></a>


                    <ul class="slide-menu">
                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('dashboard/products', true) ? 'active' : '' }}"
                                href="{{ url('dashboard/products') }}"> {{ trans('phase2.products') }}</a></li>

                        @if (auth()->user()->isAbleTo(['read_orders']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isUrlActive('dashboard/orders', true) or isUrlActive('orders/details', false)) ? 'active' : '' }}"
                                    href="{{ asset('dashboard/orders') }}"> {{ trans('phase2.orders') }}</a></li>
                        @endif

                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('offers', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/offers') }}"> العروض</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('coupons', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/coupons') }}"> الكوبونات</a></li>


                        @if (auth()->user()->isAbleTo(['read_product_top_class']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ isUrlActive('dashboard/top-product', true) ? 'active' : '' }}"
                                    href="{{ asset('dashboard/top-product') }}">المنتجات المختارة</a></li>
                        @endif
                    </ul>
                </li>


                {{-- end --}}

            @endif

            <!-- request sevices -->
            <!-- Disable to reduce queries count -->
            {{-- @if (auth()->user()->isAbleTo(['read_askspecialists', 'read_eng_consultancy']))
                <li
                    class="slide {{ (isUrlActive('askspecialists', false) or isUrlActive('eng_consultancy', false)) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-toolbox"></i> <span class="side-menu__label">طلبات الخدمية</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        <li style="margin-right: 5%;"><a
                                class="slide-item {{ isUrlActive('dashboard/askspecialists', true) ? 'active' : '' }}"
                                href="{{ asset('dashboard/askspecialists') }}"> اطلب متخصص</a></li>
                        @if (auth()->user()->isAbleTo(['read_eng_consultancy']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ isUrlActive('eng_consultancy', false) ? 'active' : '' }}"
                                    href="{{ route('dashboard.eng_consultancy.index') }}"> الإستشارات الهندسية
                                    ({{ $engConsultancyCount }})
                                </a>
                                </li>
                        @endif
                    </ul>
                </li>
            @endif --}}




            {{-- users  --}}
            @if (auth()->user()->isAbleTo(['read_vendors', 'read_engineeringoffice', 'read_kitchen', 'read_contractor', 'read_Handmade']))
                <li
                    class="slide {{ (isUrlActive('dashboard/vendors', false) or isUrlActive('request/account/office', false) or isUrlActive('request/account/vendor', false) or isUrlActive('dashboard/vendors/create', false) or isUrlActive('offices', false) or isUrlActive('contractor', false) or isUrlActive('kitchen', false) or isUrlActive('handmade', false)) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-user-cog"></i> <span
                            class="side-menu__label">{{ trans('phase2.admins') }}</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ isUrlActive('vendor', false) ? 'open' : '' }}"><a class="slide-item "
                                href="javascript:;">
                                <span class="side-menu__label">التجار والعارضين</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('dashboard/vendors', true) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/vendors') }}"> التجار و العارضين </a></li>


                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('request/account/vendor', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/request/account/vendors') }}"> طلبات اعرض معنا </a>
                                </li>
                            </ul>
                        </li>

                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ (isUrlActive('offices', false) or isUrlActive('request/account/office', false)) ? 'open' : '' }}">
                            <a class="slide-item x" href="javascript:;">
                                <span class="side-menu__label">المكاتب الهندسية</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('dashboard/offices', true) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/offices') }}"> المكاتب الهندسية </a></li>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('offices/albumes', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/offices/albumes/view') }}"> ألبومات وفقا للمكتب </a>
                                </li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ (isUrlActive('request/account/office', false) or isUrlActive('offices/upgrade', false)) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/request/account/offices') }}"> طلبات تسجيل المكتب
                                    </a></li>

                            </ul>
                        </li>
                        @if (auth()->user()->isAbleTo(['read_user_service']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item  {{ isUrlActive('user-service', false) ? 'active' : '' }}"
                                    href="{{ asset('dashboard/user-service') }}"> خدمات المستخدمين</a></li>
                        @endif
                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('contractor', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/contractor') }}"> المقاولين</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('kitchen', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/kitchen') }}"> المطابخ</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('handmades', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/handmades') }}"> المشغوالت اليدويه</a></li>


                    </ul>
                </li>
            @endif
            {{-- end --}}

            {{-- users  --}}
            @if (auth()->user()->isAbleTo(['read_users', 'read_freelance_engineer', 'read_request_upgrade']))
                <li
                    class="slide {{ (isUrlActive('users-client', false) or isUrlActive('users-engineer', false) or isUrlActive('freelance_engineer', false) or isUrlActive('request_upgrade', false) or isUrlActive('request-account-website', false)) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-users"></i> <span class="side-menu__label">فئات المستخدمين</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('users-client', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/users-client') }}"> العملاء</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('users-engineer', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/users-engineer') }}"> المهندسين</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('freelance_engineer', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/freelance_engineer') }}"> المهندسين مستقلين</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('request_upgrade', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/request_upgrade') }}"> ترقية حساب</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('request-account-website', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/request-account-website') }}"> شارك عملك معنا
                                ({{ App\Models\ShareWithUs::where('status', 1)->count() }})</a></li>


                    </ul>
                </li>
            @endif

            {{-- subscription --}}
            @if (auth()->user()->isAbleTo([
                        'read_subscription',
                        'read_subscription_price',
                        'read_subscription_call',
                        'read_subscription_invoice',
                        'read_report',
                    ]))
                <li class="slide {{ isUrlActive('subscription', false) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-paint-roller"></i><span
                            class="side-menu__label">{{ trans('phase2.subscriptions') }}
                            @if (isset($newInvoiceCount) and $newInvoiceCount > 0)
                                <span class="required"> *</span>
                            @endif
                        </span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @if (auth()->user()->isAbleTo(['read_subscription']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscription') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.index') }}">
                                    {{ trans('phase2.subscriptions') }}</a></li>

                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionoffice') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.index') . '?type=office' }}">
                                    {{ trans('phase2.office_subscriptions') }}</a></li>



                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionfurniture') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.index') . '?type=furniture' }}">
                                    {{ trans('phase2.furniture_subscriptions') }}</a></li>


                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionkitchen_dressing') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.index') . '?type=kitchen_dressing' }}">
                                    {{ trans('phase2.kitchen_dressing_subscriptions') }}</a></li>
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionfurniture_kitchen_dressing') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.index') . '?type=furniture_kitchen_dressing' }}">
                                    {{ trans('phase2.furniture_kitchen_dressing_subscriptions') }}</a></li>
                        @endif
                        @if (auth()->user()->isAbleTo(['create_subscription']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionCreate') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.create') }}">
                                    {{ trans('phase2.create_subscription') }}</a></li>
                        @endif

                        @if (auth()->user()->isAbleTo(['read_subscription_price']) and false)
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionPrice') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.price.index') }}">
                                    {{ trans('phase2.subscription_prices') }}</a></li>
                        @endif


                        @if (auth()->user()->isAbleTo(['read_subscription_call']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionRequest') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.request.index') }}">
                                    {{ trans('phase2.subscription_calls') }}</a></li>
                        @endif

                        @if (auth()->user()->isAbleTo(['read_subscription_invoice']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionInvoice') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.invoice.index') }}">
                                    {{ trans('phase2.invoices') }}
                                    @if (isset($newInvoiceCount) and $newInvoiceCount > 0)
                                        <span class="required"> *</span>
                                    @endif
                                </a></li>

                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'subscriptionInvoiceExpire') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.invoice.expire') }}">
                                    {{ trans('phase2.expire_invoice') }}

                                </a></li>
                        @endif

                        @if (auth()->user()->isAbleTo(['read_report']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'reportInvoicePaid') ? 'active' : '' }}"
                                    href="{{ route('dashboard.subscription.report.paid') }}">
                                    {{ trans('phase2.paid_report') }}
                                </a></li>
                        @endif

                    </ul>
                </li>
                {{-- end --}}

            @endif

            @if (auth()->user()->isAbleTo(['read_ads_offer', 'setting_ads_offer_marketing', 'read_ads_offer_marketing']))
                <li class="slide {{ isUrlActive('ads_offer', false) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-paint-roller"></i><span
                            class="side-menu__label">{{ trans('phase2.ads_offers') }}
                            {{-- @if (isset($newInvoiceCount) and $newInvoiceCount > 0)
							<span class="required"> *</span>
						@endif --}}
                        </span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @if (auth()->user()->isAbleTo(['read_ads_offer']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'ads_offer_online') ? 'active' : '' }}"
                                    href="{{ route('dashboard.ads_offer.index', 'online') }}">
                                    {{ trans('phase2.ads_offer_online') }}</a></li>

                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'ads_offer_offline') ? 'active' : '' }}"
                                    href="{{ route('dashboard.ads_offer.index', 'offline') }}">
                                    {{ trans('phase2.ads_offer_offline') }}</a></li>
                        @endif
                        @if (auth()->user()->isAbleTo(['read_ads_offer']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'ads_offer_online_order') ? 'active' : '' }}"
                                    href="{{ route('dashboard.ads_offer_online.order') }}">
                                    {{ trans('phase2.ads_offer_online_order') }}</a></li>
                        @endif
                        @if (auth()->user()->isAbleTo(['read_ads_offer']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'ads_offer_offline_order') ? 'active' : '' }}"
                                    href="{{ route('dashboard.ads_offer_offline.order') }}">
                                    {{ trans('phase2.ads_offer_offline_order') }}</a></li>
                        @endif
                        @if (auth()->user()->isAbleTo(['setting_ads_offer_marketing']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'ads_offer_marketing_settings') ? 'active' : '' }}"
                                    href="{{ route('dashboard.marketingOfferSettings') }}">
                                    {{ trans('phase2.marketing_offer_settings') }}</a></li>
                        @endif

                        @if (auth()->user()->isAbleTo(['read_ads_offer_marketing']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ (isset($pageTitle) and $pageTitle == 'ads_offer_marketing') ? 'active' : '' }}"
                                    href="{{ route('dashboard.offer_market.index') }}">
                                    {{ trans('phase2.ads_offer_marketing') }}</a></li>
                        @endif




                    </ul>
                </li>
                {{-- end --}}

            @endif
            {{-- connect --}}
            @if (auth()->user()->isAbleTo(['read_gallery', 'read_banners', 'read_decoration', 'read_reel', 'read_tag', 'read_posts']))
                <li
                    class="slide {{ (isUrlActive('decorations', false) or
                    isUrlActive('galler', false) or
                    isUrlActive('sk/experienced/person', false) or
                    isUrlActive('sk/expert/person') or
                    isUrlActive('reel') or
                    isUrlActive('banners') or
                    isUrlActive('tag'))
                        ? 'active'
                        : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-bullhorn"></i> <span class="side-menu__label">التواصل والدعاية</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('decorations', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/decorations') }}"> اخبار عالم الديكور</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('gallery', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/gallery') }}"> الجاليري</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('sk/experienced/person', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/ask/experienced/person') }}"> منشورات اسال مجرب</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('sk/expert/person', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/ask/expert/person') }}"> منشورات اسال خبير</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('reel', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/reel') }}"> الفيديوهات</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('banners', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/banners') }}"> الاعلانات</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('tag', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/tag') }}"> التاجات</a></li>


                    </ul>
                </li>
            @endif

            @if (auth()->user()->isAbleTo(['read_chats']))
                <li
                    class="slide {{ (isUrlActive('inbox', false) or
                    isUrlActive('project_inbox', false) or
                    isUrlActive('vendor/chat', false) or
                    isUrlActive('office/chat', false) or
                    isUrlActive('contacts', false))
                        ? 'active'
                        : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-phone-volume"></i> <span class="side-menu__label">خدمة العملاء</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('inbox', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/inbox') }}">دعم العملاء
                                @if (isset($chats['support_count']) and $chats['support_count'] > 0)
                                    <span class="text-danger chat-count">*</span>
                                @endif
                            </a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('project_inbox', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/project_inbox') }}">دعم مشاريع @if (isset($chats['project_count']) and $chats['project_count'] > 0)
                                    <span class="text-danger chat-count">*</span>
                                @endif
                            </a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('vendor/chat', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/vendor/chat') }}">المعارض</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('office/chat', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/office/chat') }}">المكاتب الهندسية</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('contacts', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/contacts') }}"> تواصل معنا</a></li>
                    </ul>
                </li>
            @endif




            @if (auth()->user()->isAbleTo(['cancel_project_report']))
                <li class="slide {{ isUrlActive('report/cancel_project', false) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-chart-bar"></i> <span class="side-menu__label">التقارير</span><i
                            class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('report/cancel_project', false) ? 'active' : '' }}"
                                href="{{ route('dashboard.report.cancelProject') }}">تقارير اسباب رفض المشاريع
                            </a></li>

                    </ul>
                </li>
            @endif
            {{-- website_ads --}}
            @if (auth()->user()->isAbleTo(['read_website_ads']))
                <li class="slide {{ isUrlActive('website-ads', false) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon far fa-newspaper"></i><span class="side-menu__label">إعلانات الموقع
                            الإلكتروني</span><i class="angle fe fe-chevron-down"></i></a>


                    <ul class="slide-menu">
                        @foreach (trans('phase2._website_ads_type') as $key => $value)
                            <li style="margin-right: 5%;"><a
                                    class="slide-item {{ isUrlActive('dashboard/website-ads/' . $key, true) ? 'active' : '' }}"
                                    href="{{ route('dashboard.website-ads.index', $key) }}">
                                    {{ $value }}</a>
                            </li>
                        @endforeach



                    </ul>
                </li>


                {{-- end --}}
            @endif
            @if (auth()->user()->hasRole(['admin', 'super_admin']))
                <li class="slide {{ isUrlActive('notification', true) ? 'active' : '' }}">
                    <a class="side-menu__item" href="{{ asset('dashboard/custom/notifications') }}"><i
                            style="margin: 14px;" class="fas fa-bell"></i><span class="side-menu__label">ارسال
                            اشعارت</span></a>
                </li>
            @endif

            @if (auth()->user()->hasRole(['admin', 'super_admin']))
                <li class="slide {{ isUrlActive('notifications', true) ? 'active' : '' }}">
                    <a class="side-menu__item" href="{{ asset('dashboard/notifications/history') }}"><i
                            style="margin: 14px;" class="fas fa-bell"></i><span class="side-menu__label">
                            تواريخ الإشعارات
                        </span>
                    </a>
                </li>
            @endif


            @if (auth()->user()->hasPermission('read_popup_ads'))
                <li class="slide {{ isUrlActive('popup_ads', true) ? 'active' : '' }}">
                    <a class="side-menu__item" href="{{ asset('dashboard/popup_ads') }}"><i style="margin: 14px;"
                            class="fas fa-bell"></i><span class="side-menu__label"> الإعلانات</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('read_jobs'))
                <li
                    class="slide {{ (isUrlActive('dashboard/jobs', true) or isUrlActive('applyings', false)) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-user-graduate"></i> <span class="side-menu__label">إدارة
                            التوظيف</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/jobs', true) ? 'active' : '' }}"
                                href="{{ asset('dashboard/jobs') }}">الوظائف المطلوبة</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('applyings', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/applyings') }}">المرشحين</a></li>


                    </ul>
                </li>
            @endif
            {{-- admins --}}
            @if (auth()->user()->hasPermission('read_admins') or auth()->user()->hasPermission('read_roles'))
                <li
                    class="slide {{ (isUrlActive('admins', false) or isUrlActive('roles', false) or isUrlActive('contractor', false)) ? 'active' : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-users-cog"></i> <span class="side-menu__label">الصلاحيات و
                            المديرين</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('admins', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/admins') }}"> المديرين</a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('roles', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/roles') }}"> الصلاحيات</a></li>

                    </ul>
                </li>
            @endif
            {{-- end --}}


            @if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))

                <li
                    class="slide {{ (isUrlActive('package', false) or
                    isUrlActive('settings/project', false) or
                    isUrlActive('budget', false) or
                    isUrlActive('project_settings', false) or
                    isUrlActive('terms/conditions', false) or
                    isUrlActive('maincategories', false) or
                    isUrlActive('submaincategories', false) or
                    isUrlActive('categories', false, ['type' => 'products']) or
                    isUrlActive('governorates', false) or
                    isUrlActive('citites', false) or
                    isUrlActive('specialties', false) or
                    isUrlActive('categories', false, ['type' => 'gallery']) or
                    isUrlActive('unit_type', false) or
                    isUrlActive('unit_status', false) or
                    isUrlActive('skill', false) or
                    isUrlActive('badges', false) or
                    isUrlActive('terms/conditions', false) or
                    isUrlActive('dashboard/settings', true) or
                    isUrlActive('dashboard/settings-about-us', true) or
                    isUrlActive('about-us', false) or
                    isUrlActive('colors', false) or
                    isUrlActive('brands', false) or
                    isUrlActive('reasons', false) or
                    isUrlActive('partners', false) or
                    isUrlActive('level', false) or
                    isUrlActive('project_reason', false) or
                    isUrlActive('furniture_type', false) or
                    isUrlActive('device_type', false) or
                    isUrlActive('material', false) or
                    isUrlActive('d/state', false) or
                    isUrlActive('tut', false) or
                    isUrlActive('categories', false, ['type' => 'package']) or
                    isset($pageTitle) and $pageTitle == 'packageVendor')
                        ? 'active'
                        : '' }} ">
                    <a class="side-menu__item" data-toggle="slide" href="#"> <i style="margin: 14px;"
                            class="icon fas fa-users-cog"></i> <span class="side-menu__label">الإعدادات
                            العامة</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">

                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ (isUrlActive('package', false) or
                            isUrlActive('settings/project', false) or
                            isUrlActive('budget', false) or
                            isUrlActive('project_reason', false) or
                            isUrlActive('furniture_type', false) or
                            isUrlActive('device_type', false) or
                            isUrlActive('material', false) or
                            isUrlActive('categories', false, ['type' => 'package']) or
                            isset($pageTitle) and $pageTitle == 'packageVendor')
                                ? 'open'
                                : '' }}">
                            <a class="slide-item x" href="javascript:;">
                                <span class="side-menu__label">اعدادات المشاريع</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('dashboard/package', true) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/package') }}"> باقات المشاريع </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('package/type/furniture', false) ? 'active' : '' }}"
                                        href="{{ route('dashboard.package.furniture.index', 'furniture') }}"> باقات
                                        افرش بيك </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('categories', false, ['type' => 'package']) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/categories?type=package') }}"> اقسام الباقات
                                        الثابتة </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ (isset($pageTitle) and $pageTitle == 'packageVendor') ? 'active' : '' }}"
                                        href="{{ route('dashboard.package.vendor.index') }}"> معارض الباقات </a>
                                </li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ (isset($pageTitle) and $pageTitle == 'packageProduct') ? 'active' : '' }}"
                                        href="{{ route('dashboard.package.product.index') }}"> منتجات الباقات </a>
                                </li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('settings/project', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/settings/project') }}">عمولات المشاريع </a></li>
                                @if (auth()->user()->isAbleTo(['read_budget']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('budget', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/budget') }}">{{ trans('phase2.budgets') }}
                                        </a></li>
                                @endif

                                @if (auth()->user()->isAbleTo(['read_reason_project']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('project_reason', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/project_reasons') }}">{{ trans('phase2.project_cancel_reasons') }}
                                        </a></li>
                                @endif
                                @if (auth()->user()->isAbleTo(['read_furniture_type']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('furniture_type', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/furniture_type') }}">{{ trans('phase2.furniture_types') }}
                                        </a></li>
                                @endif
                                @if (auth()->user()->isAbleTo(['read_device_type']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('device_type', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/device_type') }}">{{ trans('phase2.device_types') }}
                                        </a></li>
                                @endif
                                @if (auth()->user()->isAbleTo(['read_material_type']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('material_type', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/material_type') }}">{{ trans('phase2.material_types') }}
                                        </a></li>
                                @endif

                            </ul>
                        </li>

                        @if (auth()->user()->hasPermission('edit_project_settings'))
                            <li style="margin-right: 5%;"
                                class="sub-menu  {{ isUrlActive('project_settings', false) ? 'open' : '' }}">
                                <a class="slide-item x" href="javascript:;">
                                    <span class="side-menu__label">اعدادات الخدمات</span><i
                                        class="angle fe fe-chevron-down"></i></a>
                                <ul>
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('project_settings', false, ['type' => 2]) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/project_settings?type=2') }}"> إعدادات افرش
                                            بيتك </a></li>

                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('project_settings', false, ['type' => 1]) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/project_settings?type=1') }}"> إعدادات شطب بيتك
                                        </a></li>

                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('project_settings', false, ['type' => 3]) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/project_settings?type=3') }}"> إعدادات اطلب
                                            تصميم </a></li>
                                </ul>
                            </li>
                        @endif

                        @if (auth()->user()->hasPermission('read_jobs'))
                            <li style="margin-right: 5%;"
                                class="sub-menu  {{ (isUrlActive('maincategories', false) or isUrlActive('submaincategories', false)) ? 'open' : '' }}">
                                <a class="slide-item x" href="javascript:;">
                                    <span class="side-menu__label">إعدادات الوظائف</span><i
                                        class="angle fe fe-chevron-down"></i></a>
                                <ul>
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('maincategories', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/maincategories') }}"> الإقسام الرئيسيه </a>
                                    </li>

                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('submaincategories', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/submaincategories') }}"> الإقسام الفرعية </a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ (isUrlActive('categories', false, ['type' => 'products']) or
                            isUrlActive('brands', false) or
                            isUrlActive('colors', false) or
                            isUrlActive('d/reasons', false))
                                ? 'open'
                                : '' }}">
                            <a class="slide-item x" href="javascript:;">
                                <span class="side-menu__label">إعدادات المتجر</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('categories', false, ['type' => 'products']) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/categories?type=products') }}"> الاقسام </a></li>


                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('brands', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/brands') }}"> الإقسام الفرعية </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('colors', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/colors') }}"> الالوان</a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item {{ isUrlActive('dashboard/reasons', true) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/reasons') }}"> اسباب الغاء الطلب</a></li>
                            </ul>
                        </li>

                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ (isUrlActive('governorates', false) or
                            isUrlActive('cities', false) or
                            isUrlActive('specialties', false) or
                            isUrlActive('categories', false, ['type' => 'gallery']) or
                            isUrlActive('unit_type', false) or
                            isUrlActive('unit_status', false) or
                            isUrlActive('skill', false) or
                            isUrlActive('badges', false) or
                            isUrlActive('d/state', false))
                                ? 'open'
                                : '' }}">
                            <a class="slide-item x" href="javascript:;">
                                <span class="side-menu__label">إعدادات التصنيفات</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('governorates', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/governorates') }}"> المحافظات </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('cities', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/cities') }}"> المدن </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('states', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/states') }}"> المناطق </a></li>



                                @if (auth()->user()->isAbleTo(['read_state']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('state', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/state') }}"> {{ trans('phase2.states') }}
                                        </a>
                                    </li>
                                @endif

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('specialties', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/specialties') }}"> التخصصات </a></li>


                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('categories', false, ['type' => 'gallery']) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/categories?type=gallery') }}"> اقسام الجاليري </a>
                                </li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('unit_type', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/unit_type') }}"> انواع المباني </a></li>


                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('unit_status', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/unit_status') }}"> حالة المبني </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('skill', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/skill') }}"> المهارات </a></li>

                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('badges', false) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/badges') }}"> البادجات </a></li>
                            </ul>
                        </li>
                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ (isUrlActive('tut-video', false) or isUrlActive('tut-category', false)) ? 'open' : '' }}">
                            <a class="slide-item x" href="javascript:;">
                                <span class="side-menu__label">فيديوهات تعريفية</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>

                                @if (auth()->user()->isAbleTo(['read_tut_category']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('tut-category', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/tut-category') }}"> الاقسام
                                        </a></li>
                                @endif
                                @if (auth()->user()->isAbleTo(['read_tut']))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('tut-video', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/tut-video') }}"> فيديوهات تعريفية
                                        </a></li>
                                @endif
                            </ul>
                        </li>
                        @if (auth()->user()->isAbleTo(['read_level']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item  {{ isUrlActive('level', false) ? 'active' : '' }}"
                                    href="{{ asset('dashboard/level') }}"> {{ trans('phase2.levels') }} </a></li>
                        @endif
                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('partners', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/partners') }}"> شركئنا </a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('terms/conditions', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/terms/conditions') }}"> الشروط والاحكام </a></li>
                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('privacy/policy', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/privacy/policy') }}"> سياسة الخصوصية </a></li>

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/settings', true) ? 'active' : '' }}"
                                href="{{ asset('dashboard/settings') }}">website إعدادات </a></li>
                        @if (auth()->user()->isAbleTo(['update_about_us_settings']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item  {{ isUrlActive('dashboard/settings-about-us', true) ? 'active' : '' }}"
                                    href="{{ asset('dashboard/settings-about-us') }}">اعدادت صفحة عنا </a></li>
                        @endif

                        @if (auth()->user()->isAbleTo(['read_invoice_settings']))
                            <li style="margin-right: 5%;"><a
                                    class="slide-item  {{ isUrlActive('dashboard/settings/invoice', true) ? 'active' : '' }}"
                                    href="{{ asset('dashboard/settings/invoice') }}">إعدادات الفواتير </a></li>
                        @endif

                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('dashboard/settings/meta/description', true) ? 'active' : '' }}"
                                href="{{ asset('dashboard/settings/meta/description') }}"> ميتا ديسكريبشن
                            </a>
                        </li>


                        <li style="margin-right: 5%;"><a
                                class="slide-item  {{ isUrlActive('about-us', false) ? 'active' : '' }}"
                                href="{{ asset('dashboard/about-us') }}">Q&A Website </a></li>

                        <li style="margin-right: 5%;"
                            class="sub-menu  {{ (isUrlActive('logs', false) or isUrlActive('activity_logs', false)) ? 'open' : '' }}">
                            <a class="slide-item x" href="javascript:;">
                                <span class="side-menu__label">سجل الحركات</span><i
                                    class="angle fe fe-chevron-down"></i></a>
                            <ul>
                                <li style="margin-right: 5%;"><a
                                        class="slide-item  {{ isUrlActive('dashboard/logs', true) ? 'active' : '' }}"
                                        href="{{ asset('dashboard/logs') }}"> سجل الموقع </a></li>
                                @if (auth()->user()->hasRole('super_admin'))
                                    <li style="margin-right: 5%;"><a
                                            class="slide-item  {{ isUrlActive('cities', false) ? 'active' : '' }}"
                                            href="{{ asset('dashboard/activity_logs') }}"> سجل بيانات الموقع </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                    </ul>
                </li>






            @endif


            {{-- end --}}

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
