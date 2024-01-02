<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Banner Title</label>
            <input type="text" id="basic-addon-name" name="name" class="form-control" placeholder="Name" value="{{(isset($model->name))?$model->name:old('name')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('name')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Category</label>
            <select name="category" class="form-control" id="category">
                <option value="">Select Category</option>
                <option value="movies" {{($model->category == 'movies')? 'selected' : ''}} > Movies</option>
                <option value="webseries" {{($model->category == 'webseries')? 'selected' : ''}} > Web Series</option>
                <option value="tvshows" {{($model->category == 'tvshows')? 'selected' : ''}} > Tv shows</option>
                <option value="sports" {{($model->category == 'sports')? 'selected' : ''}} > Tv shows</option>

            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('category')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Photo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo" />
                <label class="custom-file-label" for="customFile1">Choose profile pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->image)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->image) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>



@section('extra-script')
<script type="text/javascript">
    jQuery(function() {
        function generatePassword() {
            return Math.random() // Generate random number, eg: 0.123456
                .toString(36) // Convert  to base-36 : "0.4fzyo82mvyr"
                .slice(-8); // Cut off last 8 characters : "yo82mvyr"
        }
        jQuery('#generate_password').on('click', function() {
            var password = generatePassword();
            jQuery('#password').val(password);
            jQuery('#confirm-password').val(password);
        });

    })
</script>
@endsection
