<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title class="has_page_title">Forbidden</title>
    <link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
</head>
<body class="" style="height: 100vh">

<!-- BEGIN PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div>
<!-- END PRELOADER -->

<!-- BEGIN MAIN WRAPPER -->
<div class="body-wrap" style="height: 100%">
    <section class="background-image-holder" data-holder-type="fullscreen" data-holder-offset="">
        <span class="mask sm_bg_1"></span>
        <div class="slice holder-item holder-item-light">
            <div class="container container-sm d-flex align-items-center">
                <div class="col">
                    <div class="row py-3 text-center justify-content-center">
                        <div class="col-12 col-md-10">
                            <div class="text-cover-wrapper">
                                <h3 class="text-cover-title c-white">403</h3>
                                <h4 class="text-cover-subtitle c-white strong-400 mt-4">Page not found</h4>
                                <div class="clearfix"></div>
                                <p class="text-lg line0height-1_8 c-white mt-5">
                                    This action not authorised
                                </p>
                                <div class="text-center mt-5">
                                    <a href="{{ config('app.url') }}" class="btn btn-styled btn-base-5 btn-outline btn-circle">Back to home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- END MAIN WRAPPER -->
<script src="{{ mix('js/app.min.js')}}"></script>
</body>
</html>
