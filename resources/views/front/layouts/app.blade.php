<!DOCTYPE html>
<html lang="en">

@include('front.layouts.partials.style')

<body class="">
    <div class="page-wrapper">
        <!-- Start of Header -->
        @include('front.layouts.partials.header')
        <!-- End of Header -->
        <div class = "maincontent">
            @yield('content')
        </div>


        @include('front.layouts.partials.footer')

        @include('front.layouts.partials.script')
</body>

</html>
