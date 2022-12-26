    
    @include('includes.header')


    <main>
        @yield('content')
    </main>

    @include('includes.footer')

</body>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ mix('js/frontend.js') }}"></script>

@stack('after-scripts')

</html>