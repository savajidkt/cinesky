<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Channel</label>
            <select name="channel_id" class="form-control" id="channel_id">
                <option value="">Select Channel</option>
                @if ($channels->count())
                @foreach ($channels as $channel)
                @php
                if(isset($model->channel_id) && $model->channel_id == $channel->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $channel->id == old('channel_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $channel->id }}" {{ $selectedCom }}> {{ $channel->name }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('channel_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Title</label>
            <input type="text" id="basic-addon-name" name="title" class="form-control" placeholder="title" value="{{(isset($model->title))?$model->title:old('title')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('title')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->image)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->image) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Description</label>
            <textarea name="description"  class="form-control" aria-describedby="basic-addon-name" > {{(isset($model->description))?$model->description:old('description')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('description')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


