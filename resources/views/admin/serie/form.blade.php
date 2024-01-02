<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Full Name</label>
            <input type="text" id="basic-addon-name" name="series_name" class="form-control" placeholder="Name" value="{{(isset($model->series_name))?$model->series_name:old('series_name')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('series_name')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Description</label>

            <textarea name="series_desc"  class="form-control" aria-describedby="basic-addon-name" > {{(isset($model->series_desc))?$model->series_name:old('series_desc')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('series_desc')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Poster Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->series_poster)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->series_poster) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Cover Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="img" name="img" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->series_cover)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->series_cover) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>
</div>
