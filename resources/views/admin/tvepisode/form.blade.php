<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Tv Show</label>
            <select name="tvshow_id" class="form-control" id="tvshow_id">
                <option value="">Select Tv Show</option>
                @if ($tvshows->count())
                @foreach ($tvshows as $tvshow)

                @php
                if(isset($model->tvshow_id) && $model->tvshow_id == $tvshow->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $tvshow->id == old('tvshow_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $tvshow->id }}" {{ $selectedCom }}> {{ $tvshow->title }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('tvshow_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name">Episode Title</label>
            <input type="text" id="basic-addon-name" name="episode_title" class="form-control" placeholder="title" value="{{(isset($model->episode_title))?$model->episode_title:old('episode_title')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('episode_title')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Episode Type</label>
            <select name="episode_type" class="form-control" id="episode_type">
                <option value="">Select Episode Type </option>
                <option value="youtube" {{($model->episode_type == 'youtube')? 'selected' : ''}} > Youtube</option>
                <option value="live_url" {{($model->episode_type == 'live_url')? 'selected' : ''}} > Live Url</option>
                <option value="local" {{($model->episode_type == 'local')? 'selected' : ''}} > Local System</option>
                <option value="embedded_url" {{($model->episode_type == 'embedded_url')? 'selected' : ''}} > Embedded URL (Open Load, Very Stream, Daily motion, Vimeo)</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('episode_type')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12" id="episode_url" >
        <div class="form-group" id="episode_url" >
            <label class="form-label" for="basic-default-email1">Url</label>
            <input type="url" name="url" class="form-control" id="episode_url"   value="{{(isset($model->episode_url))?$model->episode_url:old('episode_url')}}"/>
        </div>
    </div>

    <div class="col-12" id="video" >
        <div class="form-group" id="video" >
            <label class="form-label" >Video Upload</label>
            <input type="file" class="form-control" id="video" name="video"  accept="video/*"  onchange="previewVideo()"/>
            @if((isset($model->episode_url)))
            <div class="clear" style="margin-top: 10px;">
                <video width="320" height="240" controls>
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/m4v" >
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/avi" >
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/mp4" >
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/ogg" >
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/mpg" >
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/mkv" >
                    <source src="{{ url('storage/app/' . $model->episode_url) }}"  type="video/mpeg" >
                    Your browser does not support the video tag.
                </video>
            </div>
            @endif
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Episode Poster Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->poster_image)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->poster_image) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Description</label>
            <textarea name="episode_description"  class="form-control" aria-describedby="basic-addon-name" > {{(isset($model->episode_description))?$model->episode_description:old('episode_description')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('episode_description')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


@section('extra-script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {


        $("select[name='episode_type']").change(function() {
            var episodeType = $(this).val();

            // Toggle visibility based on vedio type
            $("#episode_url").toggle(episodeType === 'youtube' || episodeType === 'live_url' || episodeType === 'embedded_url');
            $("#video").toggle(episodeType === 'local');
        });

        // Trigger the change events on page load to handle the initial state

        $("select[name='episode_type']").trigger('change');
    });


    function previewVideo() {
        var videoInput = document.getElementById('video');
        var videoPreview = document.getElementById('videoPreview');

        if (videoInput.files && videoInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                videoPreview.src = e.target.result;
            };

            reader.readAsDataURL(videoInput.files[0]);
        }
    }
</script>
@endsection



