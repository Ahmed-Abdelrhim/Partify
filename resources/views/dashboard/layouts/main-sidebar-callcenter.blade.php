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
						<span class="mb-0 text-muted">{{implode(', ', auth()->user()->roles->pluck('title_' . app()->getLocale())->toArray()) }}</span>
					</div>
				</div>
			</div>
			<ul class="side-menu">
				
				<li class="slide">
					<a class="side-menu__item" href="{{asset('dashboard/welcome')}}"><i style="margin: 14px;" class="icon-home"></i><span class="side-menu__label">{{ trans('app.dashboard')}}</span></a>
				</li>
	
				
				@if(auth()->user()->isAbleTo(['read_subscription']))
					
					<li class="slide {{(isset($pageTitle2) and $pageTitle2 == 'subscription') ? 'active' : ''}}">
						<a class="side-menu__item" href="{{route('dashboard.subscription.index')}}"><i style="margin: 14px;" class="icon-layers"></i><span class="side-menu__label">{{trans('phase2.subscriptions')}}</span></a>
					</li>
				@endif

			

				@if(auth()->user()->isAbleTo(['read_subscription_call']))

					<li class="slide {{(isUrlActive('subscription/request')) ? 'active' : ''}}">
						<a class="side-menu__item" href="{{route('dashboard.subscription.request.index')}}"><i style="margin: 14px;" class="icon-call-in"></i><span class="side-menu__label">{{trans('phase2.subscription_calls')}}</span></a>
					</li>
				@endif
				
				@if(auth()->user()->isAbleTo(['read_subscription_invoice']))
					
					<li class="slide {{(isUrlActive('subscription/invoice')) ? 'active' : ''}}">
						<a class="side-menu__item" href="{{route('dashboard.subscription.invoice.index')}}"><i style="margin: 14px;" class="icon-printer"></i><span class="side-menu__label">{{trans('phase2.invoices')}}
							@if(isset($newInvoiceCount) and $newInvoiceCount > 0)
								<span class="required"> *</span>
							@endif</span></a>
					</li>
				@endif


				{{-- end --}}
			
			</ul>
		</div>
	</aside>
<!-- main-sidebar -->
