@extends('front.layouts.app')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-content">
                <div class="banner coming-soon-bg"
                    style="background-image: url(../../../www.portotheme.com/html/wolmart/assets/images/pages/coming/coming-soon.html); background-color: #333;">
                    <div class="coming-content-wrapper d-flex align-items-center justify-content-end pl-sm-4 pr-sm-4">
                        <div class="coming-content">
                            <a href="demo1.html" class="logo">
                                <img src="{{ asset('front/assets/images/pages/coming/logo.png') }}" alt="Logo"
                                    width="168" height="53">
                            </a>
                            <h2 class="coming-title ls-25">Coming <span>Soon...</span></h2>
                            <p>We are currently working on an awesome new site. Stay tuned for more information.
                                Subscribe to our newsletter to stay updated on our progress.</p>
                            <div class="countdown countdown-coming" data-until="+10d" data-format="DHMS"
                                data-relative="true">10:00:00</div>

                            <div class="social-icons social-icons-colored">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                            <p class="copyright mb-0">Copyright © 2021 Wolmart Store. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
@endsection
