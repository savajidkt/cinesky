<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">category</label>
            <select name="cat_id" class="form-control" id="cat_id">
                <option value="">Select Category</option>
                @if ($categorys->count())
                @foreach ($categorys as $serie)

                @php
                if(isset($model->cat_id) && $model->cat_id == $serie->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $serie->id == old('cat_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $serie->id }}" {{ $selectedCom }}> {{ $serie->category_name }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('cat_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Title</label>
            <input type="text" id="basic-addon-name" name="channel_title" class="form-control" placeholder="title" value="{{(isset($model->channel_title))?$model->channel_title:old('channel_title')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('channel_title')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Type</label>
            <select name="channel_type" class="form-control" id="channel_type">
                <option value="">Select Type </option>
                <option value="youtube" {{($model->channel_type == 'youtube')? 'selected' : ''}} > Youtube</option>
                <option value="live_url" {{($model->channel_type == 'live_url')? 'selected' : ''}} > Live Url</option>
                <option value="embedded_url" {{($model->channel_type == 'embedded_url')? 'selected' : ''}} > Embedded URL (Open Load, Very Stream, Daily motion, Vimeo)</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('channel_type')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name">Channel Url</label>
            <input type="text" id="basic-addon-name" name="channel_url" class="form-control" placeholder="title" value="{{(isset($model->channel_url))?$model->channel_url:old('channel_url')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('channel_url')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Channel Poster Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->channel_poster)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->channel_poster) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Channel Cover Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="img" name="img" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->channel_cover)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->channel_cover) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Description</label>
            <textarea name="channel_desc"  class="form-control" aria-describedby="basic-addon-name" > {{(isset($model->channel_desc))?$model->channel_desc:old('channel_desc')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('channel_desc')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


