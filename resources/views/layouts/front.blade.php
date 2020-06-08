<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')


<body>

<div id="app">

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="#"><span>[</span>DeltaInstitute<span>]</span></a></div>

@include('layouts.partials.sideleft')

<!-- ########## START: HEAD PANEL ########## -->
    @include('layouts.partials.header')
    <!-- ########## END: HEAD PANEL ########## -->


    @yield('content')
</div>


<script src="/lib/jquery/jquery.js"></script>
<script src="/lib/popper.js/popper.js"></script>
<script src="/lib/bootstrap/bootstrap.js"></script>
<script src="/js/perfect-scrollbar.jquery.js"></script>
<script src="/lib/moment/moment.js"></script>
<script src="/lib/jquery-ui/jquery-ui.js"></script>
<script src="/lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="/lib/peity/jquery.peity.js"></script>
<script src="/lib/chartist/chartist.js"></script>
<script src="/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="/lib/d3/d3.js"></script>
<script src="/lib/rickshaw/rickshaw.min.js"></script>


<script src="/js/bracket.js"></script>
<script src="/js/ResizeSensor.js"></script>
<script src="/js/dashboard.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



<script>
    $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }
    });
</script>
</body>
</html>
