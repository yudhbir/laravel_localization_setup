   <!-- footer -->
  <section class="body-font">
    <div class="container px-5 sm:py-24 py-12 mx-auto">
      <div class="text-center">
        <img src="{{asset('img/logo-with-text.jpg')}}" alt="{{ app_name() }}" class="mx-auto">
        <p class="md:w-96 mt-5 text-sm mx-auto text-blue-custom">{{__('translate.proudly_romanian')}}</p>
      </div>
      <div class="md:ml-auto flex flex-wrap items-center text-base justify-center mt-8 sm:flex-row flex-col">
        <a class="sm:mr-5 mr-0 cursor-pointer text-sm font-bold text-blue-custom sm:leading-6 leading-10 iubenda-white no-brand iubenda-noiframe iubenda-embed iubenda-noiframe" href="https://www.iubenda.com/privacy-policy/73866710">{{__('Politica de confidentialitate')}}</a>
        <a class="sm:mr-5 mr-0 cursor-pointer text-sm font-bold text-blue-custom sm:leading-6 leading-10 iubenda-white no-brand iubenda-noiframe iubenda-embed iubenda-noiframe" href="https://www.iubenda.com/terms-and-conditions/73866710">{{__('Termeni')}}</a>
        <a class="sm:mr-5 mr-0 cursor-pointer text-sm font-bold text-blue-custom sm:leading-6 leading-10 iubenda-white no-brand iubenda-noiframe iubenda-embed iubenda-noiframe" href="https://www.iubenda.com/privacy-policy/73866710/cookie-policy">{{__('Cookies')}}</a>
        <a class="sm:mr-5 mr-0 cursor-pointer text-sm font-bold text-blue-custom sm:leading-6 leading-10 ">{{__('Contact')}}</a>
      </div>
      <div class="mx-auto mt-8 text-center">
        <p class="gray-text-custom text-sm">© 2022 Casa Keys</p>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    (function(w, d) {
    var loader = function() {
        var s = d.createElement("script"),
            tag = d.getElementsByTagName("script")[0];
        s.src = "https://cdn.iubenda.com/iubenda.js";
        tag.parentNode.insertBefore(s, tag);
    };
    if (w.addEventListener) {
        w.addEventListener("load", loader, false);
    } else if (w.attachEvent) {
        w.attachEvent("onload", loader);
    } else {
        w.onload = loader;
    }
})(window, document);
</script>
<style>
.iubenda-embed:not(.iubenda-nostyle){
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  font-size: 0.875rem !important;
  font-weight: 700 !important;
  color: #232456 !important;
}
.iubenda-embed:not(.iubenda-nostyle):active{
  background-color: none !important;
}
.iubenda-embed:not(.iubenda-nostyle):hover{
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
   background-color: none !important;
}
</style>

<!-- end footer -->
