<style>
	.ac{
		background: gainsboro;
	}
</style>
<!-- main-sidebar -->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<aside class="app-sidebar sidebar-scroll">
		<div class="main-sidebar-header active">
			<a class="desktop-logo logo-light active" href="{{ url('dashboard/welcome') }}"><img src="{{asset('')}}dashboard_files/img/aladdin-logo.jpg" style="height: 180%;margin-top: -13px;" class="main-logo" alt="logo"></a>
			<a class="desktop-logo logo-dark active" href="{{ url('dashboard/welcome') }}"><img src="{{asset('')}}dashboard_files/img/aladdin-logo.jpg" class="main-logo dark-theme" alt="logo"></a>
			<a class="logo-icon mobile-logo icon-light active" href="{{ url('dashboard/welcome') }}"><img src="{{asset('')}}dashboard_files/img/aladdin-logo.jpg" class="logo-icon" alt="logo"></a>
			<a class="logo-icon mobile-logo icon-dark active" href="{{ url('dashboard/welcome') }}"><img src="{{asset('')}}dashboard_files/img/aladdin-logo.jpg" class="logo-icon dark-theme" alt="logo"></a>
		</div>
		<div class="main-sidemenu">
			<div class="app-sidebar__user clearfix">
				<div class="dropdown user-pro-body">
					<div class="">
						<img alt="user-img" class="avatar avatar-xl brround" src="{{auth()->user()->image_path}}"><span class="avatar-status profile-status bg-green"></span>
					</div>
					<div class="user-info">
						<h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
						<span class="mb-0 text-muted">{{implode(', ', auth()->user()->roles->pluck('display_name')->toArray()) }}</span>
					</div>
				</div>
			</div>
			<ul class="side-menu">
				
				<li class="slide">
					<a class="side-menu__item" href="{{asset('dashboard/welcome')}}"><i style="margin: 14px;" class="icon-home"></i><span class="side-menu__label">{{ trans('app.dashboard')}}</span></a>
				</li>
				
				
				@if( auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
					


				@if (auth()->user()->hasPermission('read_vendors'))
					<li class="slide  {{ isUrlActive('vendors/products/upload/images' , false)|| isUrlActive('request/account/vendors') || Request::is('dashboard/vendors/products/*') || Request::is('dashboard/categories?type=venor') ? 'active' : '' }}">
						<a class="side-menu__item" data-toggle="slide" href="#"> @if(Request::is('dashboard/vendors/products/*') || Request::is('dashboard/vendors/products'))  <i style="margin: 14px;color: #0162e8;" class="fas fa-couch"></i> @else <i style="margin: 14px;" class="fas fa-couch"></i> @endif<span class="side-menu__label"> المعارض</span><i class="angle fe fe-chevron-down"></i></a>
						
						<ul class="slide-menu">
						
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/vendors/products/view')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  المنتجات</a></li>
							{{-- <li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/vendors/products/upload/images')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  تحميل صور المنتجات</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/request/account/vendors')}}"><i class="fa fa-list" style="margin-left: 8%;"></i> طلبات تسجيل المتاجر</a></li> --}}
						</ul>
					</li>
				@endif 
				
				
				@if (auth()->user()->hasPermission('read_engineeringoffice'))
					<li class="slide  {{ Request::is('dashboard/offices') || Request::is('dashboard/offices/*')  ? 'active' : '' }}">
						<a class="side-menu__item" data-toggle="slide" href="#"> @if(Request::is('dashboard/offices')  || Request::is('dashboard/offices'))  <i style="margin: 14px;color: #0162e8;" class="fas fa-hard-hat"></i> @else <i style="margin: 14px;" class="fas fa-hard-hat"></i> @endif<span class="side-menu__label"> المكاتب الهندسية</span><i class="angle fe fe-chevron-down"></i></a>
						
						<ul class="slide-menu">
						
							<li style="margin-right: 5%;"><a class="slide-item {{isUrlActive('offices/albumes') ? 'active' : ''}}" href="{{asset('dashboard/offices/albumes/view')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  الالبومات</a></li>
							
							<li style="margin-right: 5%;"><a class="slide-item {{isUrlActive('request/account') ? 'active' : ''}}" href="{{asset('dashboard/request/account/offices')}}"><i class="fa fa-list" style="margin-left: 8%;"></i> طلبات تسجيل المكاتب الهندسية</a></li>
						</ul>
					</li>
				@endif 
{{-- 				
				@if (auth()->user()->hasPermission('read_Handmade'))
					<li class="slide  {{ Request::is('dashboard/handmades') || Request::is('dashboard/handmades/*') ||Request::is('dashboard/categorieshandmades') || Request::is('dashboard/categorieshandmades/*')  ? 'is-expanded' : '' }}">
						<a class="side-menu__item" data-toggle="slide" href="#"> @if(Request::is('dashboard/handmades') || Request::is('dashboard/handmades'))  <i style="margin: 14px;color: #0162e8;" class="icon-user"></i> @else <i style="margin: 14px;" class="icon-user"></i> @endif<span class="side-menu__label">إدارة  المشغولات اليدوية</span><i class="angle fe fe-chevron-down"></i></a>
						
						<ul class="slide-menu">
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/categorieshandmades')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  الأقسام</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/handmades')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  المعارض</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/handmades/albumes/view')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  الالبومات</a></li>
						</ul>
					</li>
				@endif  --}}
			
				@if (auth()->user()->hasPermission('read_jobs'))
					<li class="slide  {{ Request::is('dashboard/jobs') || Request::is('dashboard/jobs/*')  ? 'active' : '' }}">
						<a class="side-menu__item" data-toggle="slide" href="#"> @if(Request::is('dashboard/jobs') || Request::is('dashboard/jobs'))  <i style="margin: 14px;color: #0162e8;" class="icon-user"></i> @else <i style="margin: 14px;" class="mdi mdi-account-search"></i> @endif<span class="side-menu__label">  الوظائف</span><i class="angle fe fe-chevron-down"></i></a>
						
						<ul class="slide-menu">
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/maincategories')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>   الأقسام الرئيسية</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/submaincategories')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>   الأقسام الفرعية</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/jobs')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>   الوظائف</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/office/jobs')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>    الوظائف المكاتب الهندسية</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/jobs/create')}}"><i class="fa fa-plus" style="margin-left: 8%;"></i> اضافة وظيفة</a></li>
							<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/applyings')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  المرشحين</a></li>
						</ul>
					</li>
				@endif 

			@endif

			
				@if( auth()->user()->hasRole('vendor'))
					<li class="slide {{ Request::is('dashboard/profile') || Request::is('dashboard/profile') ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/profile')}}"><i style="margin: 14px;" class="fe fe-user"></i><span class="side-menu__label">تعديل الحساب</span></a>
					</li>

					<li class="slide {{ Request::is('dashboard/products/*') || Request::is('dashboard/products') ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/products')}}"><i style="margin: 14px;" class="fe fe-chrome"></i><span class="side-menu__label">المنتجات</span></a>
					</li>

					<li class="slide {{ (Request::is('dashboard/offers/*') || Request::is('dashboard/offers') ) ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/offers')}}"><i style="margin: 14px;" class="fe fe-award"></i><span class="side-menu__label">العروض</span></a>
					</li>
					@if(auth()->user()->hasPermission('read_chats'))
						<li class="slide {{ (Request::is('dashboard/chat') || Request::is('dashboard/chat/*') ) ? 'ac' : '' }}" >
							<a class="side-menu__item" href="{{asset('dashboard/chat')}}"><i  style="margin: 14px;" class="far fa-comment-dots"></i><span class="side-menu__label">الدردشات</span></a>
						</li>
						<li class="slide {{ (Request::is('dashboard/project_inbox') || Request::is('dashboard/project_inbox/*') ) ? 'ac' : '' }}" >
							<a class="side-menu__item" href="{{asset('dashboard/project_inbox')}}"><i  style="margin: 14px;" class="far fa-comment-dots"></i><span class="side-menu__label">دعم المشاريع</span></a>
						</li>
					@endif
					@if (auth()->user()->hasPermission('read_project'))
					{{-- project --}}
					<li class="slide {{(isUrlActive('dashboard/project' , true  , ['type' => 2]) 
					or isUrlActive('dashboard/project' , false )) ? 'ac' : ''}}" >
						<a class="side-menu__item" href="{{route('dashboard.project.index')}}?type=2"><i style="margin: 14px;" class="fe fe-home"></i><span class="side-menu__label">مشاريع إفرش بيتك</span></a>
					</li>
					@endif

					{{-- <li class="slide {{(isUrlActive('my-project' , false  , ['type' => 2]) 
						or isUrlActive('my-project' , false )) ? 'ac' : ''}}" >
							<a class="side-menu__item" href="{{url('dashboard/my-project')}}"><i style="margin: 14px;" class="fas fa-house-damage"></i><span class="side-menu__label">مشاريعي </span></a>
						</li> --}}
					
					<li class="slide {{ Request::is('dashboard/orders') || Request::is('dashboard/orders/*')  ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/orders')}}"><i style="margin: 14px;" class="fe fe-chrome"></i><span class="side-menu__label">طلباتي</span></a>
					</li>

					{{-- <li class="slide {{ Request::is('dashboard/inbox') ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/inbox')}}"><i style="margin: 14px;" class="icon ion-md-chatboxes"></i><span class="side-menu__label">الدعم</span></a>
					</li> --}}

				@endif

				@if( auth()->user()->hasRole('office'))
					<li class="slide {{ Request::is('dashboard/profile') || Request::is('dashboard/profile') ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/profile')}}"><i style="margin: 14px;" class="fe fe-user"></i><span class="side-menu__label">تعديل الحساب</span></a>
					</li>

					@if (auth()->user()->hasPermission('read_project'))
					{{-- project --}}
					<li class="slide {{(isUrlActive('dashboard/project' , true  , ['type' => 1]) 
					) ? 'ac' : ''}}" >
						<a class="side-menu__item" href="{{route('dashboard.project.index')}}?type=1"><i style="margin: 14px;" class="icon fas fa-paint-roller"></i><span class="side-menu__label">مشاريع شطب بيتك</span></a>
					</li>
					<li class="slide {{(isUrlActive('dashboard/project' , true  , ['type' => 3]) 
					) ? 'ac' : ''}}" >
							<a class="side-menu__item" href="{{route('dashboard.project.index')}}?type=3"><i style="margin: 14px;" class="icon fas fa-ruler-combined"></i><span class="side-menu__label">مشاريع طلب تصميم</span></a>
						</li>
					@endif
					<li class="slide {{ Request::is('dashboard/offices/albumes/view') || Request::is('dashboard/offices/albums/create') ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/offices/albumes/view')}}"><i style="margin: 14px;" class="icon ion-md-images"></i><span class="side-menu__label"> الالبومات</span></a>
					</li>
					@if(auth()->user()->hasPermission('read_chats'))
					<li class="slide {{ (Request::is('dashboard/chat') || Request::is('dashboard/chat/*') ) ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/chat')}}"><i  style="margin: 14px;" class="far fa-comment-dots"></i><span class="side-menu__label">الدردشات</span></a>
					</li>
					<li class="slide {{ (Request::is('dashboard/project_inbox') || Request::is('dashboard/project_inbox/*') ) ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/project_inbox')}}"><i  style="margin: 14px;" class="far fa-comment-dots"></i><span class="side-menu__label">دعم المشاريع</span></a>
					</li>
					@endif
					@if (auth()->user()->hasPermission('read_jobs'))
						<li class="slide  {{ Request::is('dashboard/jobs') || Request::is('dashboard/applying/job/*') || Request::is('dashboard/office/jobs') || Request::is('dashboard/jobs/*')  ? 'active' : '' }}">
							<a class="side-menu__item" data-toggle="slide" href="#"> @if(Request::is('dashboard/jobs') || Request::is('dashboard/applying/job/*') || Request::is('dashboard/office/jobs') || Request::is('dashboard/jobs'))  <i style="margin: 14px;color: #0162e8;" class="icon-user"></i> @else <i style="margin: 14px;" class="mdi mdi-account-search"></i> @endif<span class="side-menu__label">إدارة  الوظائف</span><i class="angle fe fe-chevron-down"></i></a>
							
							<ul class="slide-menu">
								<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/office/jobs')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>   الوظائف</a></li>
								
								<li style="margin-right: 5%;"><a class="slide-item" href="{{asset('dashboard/jobs/create')}}"><i class="fa fa-plus" style="margin-left: 8%;"></i> اضافة وظيفة</a></li>
								<li style="margin-right: 5%;"><a class="slide-item {{Request::is('dashboard/applying/job/*') ? 'active' : ''}}" href="{{asset('dashboard/applyings')}}"><i class="fa fa-list" style="margin-left: 8%;"></i>  المرشحين</a></li>
							</ul>
						</li>
					@endif 
					{{-- <li class="slide {{ Request::is('dashboard/inbox') ? 'ac' : '' }}" >
						<a class="side-menu__item" href="{{asset('dashboard/inbox')}}"><i style="margin: 14px;" class="icon ion-md-chatboxes"></i><span class="side-menu__label">الدعم</span></a>
					</li> --}}

				@endif
				
				
				

			</ul>
		</div>
	</aside>
<!-- main-sidebar -->
