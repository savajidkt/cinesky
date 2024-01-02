<footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">&copy; {{ \Carbon\Carbon::now()->format('Y') }} Cinesky<span class="d-none d-sm-inline-block">, All Rights Reserved</span></span></p>
</footer>


@if(session()->has('error'))
<script type="text/javascript">
        $('.toast-stacked').toast('show');
</script>
<div class="alert alert-danger">
    {!! session()->get('error') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('message'))
<div class="toast toast-autohide" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
    <div class="toast-header">
        <img src="{{asset('app-assets/images/logo/logo.png')}}" class="mr-1" alt="Toast Image" height="18" width="25" />
        <strong class="mr-auto">Cinesky</strong>
        <small class="text-muted">just now</small>
        <button type="button" class="ml-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">{{ session()->get('message') }}</div>
</div>
@endif

