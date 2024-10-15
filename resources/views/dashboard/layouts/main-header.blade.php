<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/dashboard/welcome') }}"><img src="{{ auth()->user()->image_path }}" class="logo-1"
                        alt="logo"></a>
                <a href="{{ url('/dashboard/welcome') }}"><img src="{{ auth()->user()->image_path }}" class="dark-logo-1"
                        alt="logo"></a>
                <a href="{{ url('/dashboard/welcome') }}"><img
                        src="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" class="logo-2" alt="logo"></a>
                <a href="{{ url('/dashboard/welcome') }}"><img
                        src="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" class="dark-logo-2"
                        alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            @if (auth()->user()->hasRole(['super_admin', 'admin']))
                <div class="div">
                    <form action="{{ url('dashboard/general-search') }}" id="general-search">
                        {{-- <div class="form-group select">
									<select name="" id="" class="select2 form-control" aria-placeholder="test">
										<option value="all">{{ trans('phase2.all') }}</option>
									</select>
								</div> --}}
                        <input type="text" name="search" class="form-control" id="global-search"
                            placeholder="{{ trans('phase2.global_search_1') }}" autocomplete="off"
                            value="{{ isset($globalSearch) ? $globalSearch : '' }}">
                    </form>
                </div>
            @endif
        </div>
        <div class="main-header-right">

            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="dropdown nav-item main-header-message ">
                    @if (config('app.enable_b2b') and
                            (in_array('b2b', $authUser->app_type) or $authUser->hasRole('super_admin') or $authUser->hasRole('admin')))
                        <a class=" nav-link" href="{{ route('b2b.dashboard') }}"
                            onclick="window.location.replace('{{ route('b2b.dashboard') }}')"><img
                                src="{{ asset('images/b2b.png') }}" style="width:40px;height:40px;" alt="img"></a>
                    @endif
                    {{-- <a class="new nav-link" href="#"><img src="{{asset('uploads/flags/' . (app()->getLocale() === 'ar' ? 'ar' : 'en') . '_flag.jpg')}}" alt="img"></a>
								<div class="dropdown-menu" style="width: 10px;">

									<a href="{{  app()->getLocale() === 'ar' ? asset('/lang=en') : asset('/lang=ar') }}" class="dropdown-item d-flex ">
										<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{asset('uploads/flags/' . (app()->getLocale() === 'ar' ? 'en' : 'ar') . '_flag.jpg')}}" alt="img"></span>
										<div class="d-flex">
											<span class="mt-2">{{ app()->getLocale() === 'en' ? 'العربية' : 'English' }}</span>
										</div>
									</a>

								</div> --}}
                </div>

                <!-- New Added -->
                @php
                    $unreadMessages = Cache::remember('unread_messages_' . auth()->id(), 3600, function () {
                        return \App\Models\UserChatUnread::whereUserId(auth()->id())
                            ->with('chat', 'user')
                            ->whereRaw(
                                '(not exists (select * from user_chats_unread as uc where uc.user_id = ' .
                                    auth()->id() .
                                    ' and uc.updated_at > user_chats_unread.updated_at) )',
                            )
                            ->orderBy('updated_at', 'DESC')
                            ->take(15)
                            ->get();
                    });

                    $unreadCount = Cache::remember('unread_count_' . auth()->id(), 3600, function () {
                        return \App\Models\UserChatUnread::whereUserId(auth()->id())
                            ->whereRaw(
                                '(not exists (select * from user_chats_unread as uc where uc.user_id = ' .
                                    auth()->id() .
                                    ' and uc.updated_at > user_chats_unread.updated_at) )',
                            )
                            ->orderBy('updated_at', 'DESC')
                            ->count();
                    });

                    $unreadNotifications = Cache::remember('unread_notifications_' . auth()->id(), 3600, function () {
                        return auth()
                            ->user()
                            ->unreadNotifications()
                            ->latest()
                            ->simplePaginate(20)
                            ->withPath('/dashboard/notification-more');
                    });

                    $unreadNotificationsCount = $unreadNotifications->count();
                @endphp
                <!-- New Added -->




                <!-- OLD -->
                {{-- @php
							 $unreadMessages = \App\Models\UserChatUnread::whereUserId(auth()->user()->id)->with('chat' , 'user')->whereRaw('(not exists (select * from user_chats_unread as uc where uc.user_id = '.auth()->id().' and uc.updated_at > user_chats_unread.updated_at) )')->orderBy('updated_at', 'DESC')->take(15)->get();
							 $unreadCount = \App\Models\UserChatUnread::whereUserId(auth()->user()->id)->whereRaw('(not exists (select * from user_chats_unread as uc where uc.user_id = '.auth()->id().' and uc.updated_at > user_chats_unread.updated_at) )')->orderBy('updated_at', 'DESC')->count();

							 $unreadNotifications = auth()->user()->unreadNotifications()->latest()->simplePaginate(20)->withPath('/dashboard/notification-more');
							 $unreadNotificationsCount = $unreadNotifications->count();
							@endphp --}}
                <!-- OLD -->


                <div class="dropdown nav-item main-header-message" id="messages-unread">
                    @if (auth()->user()->hasRole(['super_admin', 'admin']))
                        <a class="new nav-link" href="#">

                            <div id="unrns">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg><span
                                    style="right: 10%;top: 10%;background: #CA002C;width: 45%;border-radius: 9px;"
                                    class="badge badge-success side-badge">{{ $unreadCount }}</span>
                            </div>
                        </a>

                        <div class="dropdown-menu">

                            <div class="main-message-list chat-scroll unreadNotifications">
                                <div id="unreadNotifications">
                                    @if ($unreadCount > 0)
                                        @foreach ($unreadMessages as $tempMessage)
                                            @php
                                                $userImage = isset($tempMessage->chat->id)
                                                    ? asset('uploads/user_images/' . $tempMessage->chat->to_image)
                                                    : ALAAELDEEN_LOGO;
                                                $chatName = isset($tempMessage->chat->id)
                                                    ? $tempMessage->chat->to_name
                                                    : '';

                                                $projectNum =
                                                    ($tempMessage->chat_type == 'project' and
                                                    isset($tempMessage->chat->project->id))
                                                        ? $tempMessage->chat->project->project_num
                                                        : 0;

                                                if (
                                                    auth()->user()->hasRole('admin') or
                                                    auth()->user()->hasRole('super_admin')
                                                ) {
                                                    $url =
                                                        $tempMessage->chat_type == 'project'
                                                            ? url('dashboard/project_inbox/' . $projectNum)
                                                            : ($tempMessage->chat->type == 'support'
                                                                ? url('dashboard/inbox/' . $tempMessage->chat->to_send)
                                                                : url('dashboard/inbox/' . $tempMessage->chat_id));
                                                } else {
                                                    $url =
                                                        $tempMessage->chat_type == 'project'
                                                            ? url('dashboard/project_inbox/' . $projectNum)
                                                            : url('dashboard/chat/' . $tempMessage->chat->to_id);
                                                }
                                            @endphp
                                            @if (true)
                                                <a href="{{ $url }}"
                                                    class="p-3 d-flex border-bottom {{ $tempMessage->chat_id . ' | ' . $tempMessage->message_id }}">
                                                    <div class="main-img-user">
                                                        <img alt="avatar" src="{{ $userImage }}">
                                                    </div>
                                                    <div class="wd-90p">
                                                        @if (true)
                                                            <div class="d-flex">
                                                                <h5 style="font-weight: 900;color: black;"
                                                                    class="mb-1 name">{{ $chatName }}</h5>
                                                            </div>
                                                            <p style="font-weight: 900;color: black;"
                                                                class="mb-0 desc">
                                                                @if ($tempMessage->msg_type == 'image')
                                                                    <i style="margin-right: -9px;margin-left: -8px;margin-top: -11px;margin-bottom: -17px;"
                                                                        class="la la-camera"></i>
                                                                @endif{{ $tempMessage->message }}
                                                            </p>
                                                            <p style="font-weight: 900;color: black;"
                                                                class="time mb-0 text-left float-right mr-2 mt-2">
                                                                {{ \Carbon\Carbon::createFromTimestamp(strtotime($tempMessage->updated_at))->diffForHumans() }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </a>
                                            @else
                                                <a href="{{ $tempMessage->to_send != auth()->id() ? route('dashboard.inbox.show', $tempMessage->to_send) : asset('/dashboard/inbox/' . $tempMessage->to_id) }}"
                                                    class="p-3 d-flex border-bottom">
                                                    <div class="main-img-user">
                                                        <img alt="avatar"
                                                            src="{{ $tempMessage->to_send != auth()->id() ? asset('dashboard_files/img/' . $tempMessage->to_image_another) : asset('uploads/user_images/' . $tempMessage->to_image) }}">
                                                    </div>
                                                    <div class="wd-90p">
                                                        @if (empty($tempMessage->read_at))
                                                            <div class="d-flex">
                                                                <h5 style="font-weight: 900;color: black;"
                                                                    class="mb-1 name">
                                                                    {{ $tempMessage->to_send != auth()->id() ? $tempMessage->to_name_another : $tempMessage->to_name }}
                                                                </h5>
                                                            </div>
                                                            <p style="font-weight: 900;color: black;"
                                                                class="mb-0 desc">
                                                                @if ($tempMessage->msg_type == 'image')
                                                                    <i style="margin-right: -9px;margin-left: -8px;margin-top: -11px;margin-bottom: -17px;"
                                                                        class="la la-camera"></i>
                                                                @endif{{ $tempMessage->last_msg }}
                                                            </p>
                                                            <p style="font-weight: 900;color: black;"
                                                                class="time mb-0 text-left float-right mr-2 mt-2">
                                                                {{ $tempMessage->updated_at }}</p>
                                                        @else
                                                            <div class="d-flex">
                                                                <h5 class="mb-1 name">
                                                                    {{ $tempMessage->to_send != auth()->id() ? $tempMessage->to_name_another : $tempMessage->to_name }}
                                                                </h5>
                                                            </div>
                                                            <p class="mb-0 desc">{{ $tempMessage->last_msg }}</p>
                                                            <p class="time mb-0 text-left float-right mr-2 mt-2">
                                                                @if ($tempMessage->msg_type == 'image')
                                                                    <i style="margin-right: -9px;margin-left: -8px;margin-top: -11px;margin-bottom: -17px;"
                                                                        class="la la-camera"></i>
                                                                @endif
                                                                {{ $tempMessage->updated_at }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @else
                                        <h4 class="text-center" style="padding:20px 0;">لا يوجد رسائل</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center dropdown-footer">
                                <a href="{{ asset('/dashboard/inbox') }}">عرض الكل</a>
                            </div>
                        </div>
                    @endif
                </div>

                <!--notification view--->
                <div class="dropdown nav-item main-header-message" id="notification-view-div">
                    <ul class="notification-drop" id="notification-view-ul">
                        <li class="item" id="notification-view-li">
                            <i class="icon fas fa-house-damage"></i> <span class="btn__badge pulse-button"
                                count-data="{{ $unreadNotificationsCount }}"
                                set-total-data-fetch="{{ $unreadNotifications->perPage() }}"
                                id="unreadNotificationsCount">{{ $unreadNotificationsCount > 99 ? '99+' : $unreadNotificationsCount }}</span>

                            <ul id="notification-view-ul-list"
                                hasMorePages="{{ $unreadNotifications->hasMorePages() }}"
                                perPage="{{ $unreadNotifications->perPage() }}"
                                nextPageUrl="{{ $unreadNotifications->nextPageUrl() }}">
                                @forelse ($unreadNotifications as $notification)
                                    <li>
                                        <div class="text fl">
                                            <b class="name fl">{{ @$notification->data['name'] }}</b>
                                            <p>{{ @$notification->data['ar_message'] }}</p>
                                        </div>
                                    </li>
                                @empty
                                    Notifications empty
                                @endforelse
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/notification view---->

                {{-- @if (auth()->user()->hasRole('super_admin', 'admin', 'office', 'vendor')) --}}
                <admin-notification></admin-notification>
                {{-- @endif --}}

                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="{{ auth()->user()->image_path }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="{{ auth()->user()->image_path }}" class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ auth()->user()->name }}</h6>
                                    <span>{{ implode(', ', auth()->user()->roles->pluck('display_name')->toArray()) }}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('dashboard.profile') }}"><i
                                class="bx bx-user-circle"></i>{{ trans('app.profile') }}</a>
                        <!-- <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Settings</a> -->
                        <a class="dropdown-item" href="{{ url('/' . ($page = 'page-signin')) }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-log-out"></i>{{ trans('app.logout') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
