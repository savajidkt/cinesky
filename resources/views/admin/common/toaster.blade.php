@if (session('success'))
<script type="text/javascript">
    $(document).ready(function() {
        //jQuery('.toast-stacked').toast('show');
        toastr.success('{{session('success')}}');
    });    
</script>
@endif

@if (session('error'))
<script type="text/javascript">
    $(document).ready(function() {
        //jQuery('.toast-stacked').toast('show');
        toastr.error('{{session('error')}}');
    });    
</script>
@endif
