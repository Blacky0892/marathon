{{-- Vendor Scripts Start --}}
<script src="{{ asset('/vendor/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('/vendor/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/vendor/js/vendor/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('/vendor/js/vendor/autoComplete.min.js') }}"></script>
<script src="{{ asset('/vendor/js/vendor/clamp.min.js') }}"></script>
<script src="{{ asset('/vendor/js/vendor/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/vendor/icon/acorn-icons.js') }}"></script>
<script src="{{ asset('/vendor/icon/acorn-icons-interface.js') }}"></script>
<script src="{{ asset('/vendor/icon/acorn-icons-medical.js') }}"></script>
<script src="{{ asset('/vendor/icon/acorn-icons-commerce.js') }}"></script>
<script src="{{ asset('/vendor/icon/acorn-icons-learning.js') }}"></script>
@stack('js_vendor')
{{-- Vendor Scripts End --}}
{{-- Template Base Scripts Start --}}
<script src="{{ asset('/vendor/js/base/helpers.js') }}"></script>
<script src="{{ asset('/vendor/js/base/globals.js') }}"></script>
<script src="{{ asset('/vendor/js/base/nav.js') }}"></script>
<script src="{{ asset('/vendor/js/base/settings.js') }}"></script>
<script src="{{ asset('/vendor/js/base/init.js') }}"></script>

@vite('resources/js/app.js')
{{-- Template Base Scripts End --}}
{{-- Page Specific Scripts Start --}}
@stack('js_page')
<script src="{{ asset('/vendor/js/common.js') }}"></script>
{{-- Page Specific Scripts End --}}
<script src="{{ asset('/vendor/js/scripts.js') }}"></script>

@if(session()->has('notify_success') || session()->has('notify_danger'))
    @vite('resources/js/notify.js')
@endif

@if(session()->has('notify_success'))
    <input type="hidden" id="notify_success" value="{{session('notify_success')}}">
@endif

@if(session()->has('notify_danger'))
    <input type="hidden" id="notify_danger" value="{{session('notify_danger')}}">
@endif
