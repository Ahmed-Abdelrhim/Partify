<script>
    var welcomeUrl = "{{ url('dashboard/welcome') }}";
</script>
<script src="{{ URL::asset('dashboard_files/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@stack('top-script')
<script src="{{ asset('js/app.js') }}"></script>
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->


<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('dashboard_files/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('dashboard_files/plugins/ionicons/ionicons.js') }}"></script>
<!-- Moment js -->
<script src="{{ URL::asset('dashboard_files/plugins/moment/moment.js') }}"></script>

<!-- Rating js-->
<script src="{{ URL::asset('dashboard_files/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/plugins/rating/jquery.barrating.js') }}"></script>
<script src="{{ asset('dashboard_files/theme_rtl/select2/select2.min.js') }}"></script>
<!--Internal  Perfect-scrollbar js -->
<script src="{{ URL::asset('dashboard_files/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/plugins/perfect-scrollbar/p-scroll.js') }}"></script>
<!--Internal Sparkline js -->
<script src="{{ URL::asset('dashboard_files/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{ URL::asset('dashboard_files/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- right-sidebar js -->
@if (app()->getLocale() == 'ar')
    <script src="{{ URL::asset('dashboard_files/plugins/sidebar/sidebar-rtl.js') }}"></script>
@else
    <script src="{{ URL::asset('dashboard_files/plugins/sidebar/sidebar.js') }}"></script>
@endif
<script src="{{ URL::asset('dashboard_files/plugins/sidebar/sidebar-custom.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ URL::asset('dashboard_files/js/eva-icons.min.js') }}"></script>

<!-- Sticky js -->
<script src="{{ URL::asset('dashboard_files/js/sticky.js') }}"></script>
{{-- Table Export --}}
<script src="{{ asset('dashboard_files/js/FileSaver.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/Blob.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/xls.core.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/tableexport.js') }}"></script>

<!-- custom js -->
<script src="{{URL::asset('dashboard_files/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{asset('dashboard_files/js/notification_view.js') ."?=v". mt_rand() }}"></script>

<script>
    var intervalSidebar = null;
    $(function() {

        console.log('test-');

        // intervalSidebar = setInterval(() => {
        //     if ($('#mCSB_1').length) {
        //         $('#mCSB_1').animate({
        //             scrollTop: eval($(".slide.active, .slide-item.active").offset().top - 140)
        //         }, 500);
        //         clearInterval(intervalSidebar);

        //     }
        //     console.log('interval sidevar');
        // }, 500);
    });
</script>
<script src="{{ URL::asset('dashboard_files/js/custom2.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/js/global1.js') }}"></script>
<script src="{{ URL::asset('dashboard_files/plugins/side-menu/sidemenu.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    $('.select2').select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    
</script>
