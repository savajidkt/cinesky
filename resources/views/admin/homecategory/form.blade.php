<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Type</label>
            <select name="cat_type" class="form-control" id="cat_type">
                <option value="">Select Type </option>
                <option value="movies" {{($model->cat_type == 'movies')? 'selected' : ''}} > Movies</option>
                <option value="webseries" {{($model->cat_type == 'webseries')? 'selected' : ''}} > Web Series</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('cat_type')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Home Title</label>
            <input type="text" id="basic-addon-name" name="home_title" class="form-control" placeholder="title" value="{{(isset($model->home_title))?$model->home_title:old('home_title')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('home_title')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

