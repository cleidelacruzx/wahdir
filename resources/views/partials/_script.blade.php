    
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/select2/dist/js/select2.js"></script>
    <script src="/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/DataTables/datatables.min.js"></script>
    <script src="/DataTables/Data/js/dataTables.bootstrap4.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/boostrap3-typeahead.min.js"></script>
    <script src="/toastr/toastr.min.js"></script>
    <script src="/argon-design/assets/js/argon.min.js"></script>
    <script src="/jQuery-Mask/dist/jquery.mask.js"></script>
    <script src="/jquery/additional-methods.min.js"></script>
    <script src="/pace.js"></script>
    <script src="/dataTables.responsive.min.js"></script>
    <script src="/js/_script.js"></script>
    @yield('scripts')
    <script>
            paceOptions = {
              // Disable the 'elements' source
              elements: false,

              // Only show the progress on regular and ajax-y page navigation,
              // not every request
              restartOnRequestAfter: false,
            }

            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
            @if(Session::has('repeat'))
                toastr.warning('{{ Session::get('repeat') }}');
            @endif
    </script>