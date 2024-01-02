<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Language</label>
            <select name="language_id" class="form-control" id="language_id">
                <option value="">Select Language</option>
                @if ($languages->count())
                @foreach ($languages as $language)

                @php
                if(isset($model->language_id) && $model->language_id == $language->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $language->id == old('language_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $language->id }}" {{ $selectedCom }}> {{ $language->language_name }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('language_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Genre</label>
            <select name="genre_id" class="form-control" id="genre_id">
                <option value="">Select Genre</option>
                @if ($genres->count())
                @foreach ($genres as $genre)

                @php
                if(isset($model->genre_id) && $model->genre_id == $genre->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $genre->id == old('genre_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $genre->id }}" {{ $selectedCom }}> {{ $genre->genre_name }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('genre_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Movie Owner</label>
            <select name="director_id" class="form-control" id="director_id">
                <option value="">Select Movie Owner</option>
                @if ($directors->count())
                @foreach ($directors as $director)

                @php
                if(isset($model->director_id) && $model->director_id == $director->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $director->id == old('director_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $director->id }}" {{ $selectedCom }}> {{ $director->name }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('director_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Home Category</label>
            <select name="home_cat_id" class="form-control" id="home_cat_id">
                <option value="">Select Category</option>
                @if ($homecategorys->count())
                @foreach ($homecategorys as $homecategory)

                @php
                if(isset($model->home_cat_id) && $model->home_cat_id == $homecategory->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $homecategory->id == old('home_cat_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $homecategory->id }}" {{ $selectedCom }}> {{ $homecategory->home_title }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('home_cat_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name">Movie Title</label>
            <input type="text" id="basic-addon-name" name="movie_title" class="form-control" placeholder="title" value="{{(isset($model->movie_title))?$model->movie_title:old('movie_title')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('movie_title')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name">Movie Sub Title</label>
            <input type="text" id="basic-addon-name" name="movie_subtitle" class="form-control" placeholder="sub title" value="{{(isset($model->movie_subtitle))?$model->movie_subtitle:old('movie_subtitle')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('movie_subtitle')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Movie Type</label>
            <select name="movie_type" class="form-control" id="movie_type">
                <option value="">Select Type </option>
                <option value="free" {{($model->movie_type == 'free')? 'selected' : ''}} > Free</option>
                <option value="paid" {{($model->movie_type == 'paid')? 'selected' : ''}} > Paid</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('movie_type')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12" id="movie_price" >
        <div class="form-group" id="movie_price" >
            <label class="form-label" for="basic-default-email1">Movie Price</label>
            <input type="number" name="movie_price" class="form-control" id="movie_price"  value="{{(isset($model->movie_price))?$model->movie_price:old('movie_price')}}"/>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">vedio Type</label>
            <select name="vedio_type" class="form-control" id="vedio_type">
                <option value="">Select vedio </option>
                <option value="youtube" {{($model->vedio_type == 'youtube')? 'selected' : ''}} > Youtube</option>
                <option value="live_url" {{($model->vedio_type == 'live_url')? 'selected' : ''}} > Live Url</option>
                <option value="local" {{($model->vedio_type == 'local')? 'selected' : ''}} > Local System</option>
                <option value="embedded_url" {{($model->vedio_type == 'embedded_url')? 'selected' : ''}} > Embedded URL (Open Load, Very Stream, Daily motion, Vimeo)</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('vedio_type')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12" id="movie_url" >
        <div class="form-group" id="movie_url" >
            <label class="form-label" for="basic-default-email1">Url</label>
            <input type="url" name="url" class="form-control" id="movie_url"   value="{{(isset($model->movie_url))?$model->movie_url:old('movie_url')}}"/>
        </div>
    </div>

    <div class="col-12" id="video" >
        <div class="form-group" id="video" >
            <label class="form-label" >Video Upload</label>
            <input type="file" class="form-control" id="video" name="video"  accept="video/*"  onchange="previewVideo()"/>
            @if((isset($model->movie_url)))
            <div class="clear" style="margin-top: 10px;">
                <video width="320" height="240" controls>
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/m4v" >
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/avi" >
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/mp4" >
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/ogg" >
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/mpg" >
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/mkv" >
                    <source src="{{ url('storage/app/' . $model->movie_url) }}"  type="video/mpeg" >
                    Your browser does not support the video tag.
                </video>
            </div>
            @endif


        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name">Movie Release Date</label>
            <input type="date" id="basic-addon-name" name="release_date" class="form-control" placeholder="release date" value="{{(isset($model->release_date))?$model->release_date:old('release_date')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('movie_subtitle')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Movie Poster Image</label>
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
            <label class="form-label" for="basic-default-email1">Movie Cover Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="img" name="img" />
                <label class="custom-file-label" for="customFile1">Choose  pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->cover_image)))
            <div class="clear" style="margin-top: 10px;">
            <img src="{{ url('storage/app/' . $model->cover_image) }}" width="30%" style="border:1px solid rgb(212, 206, 206);">
            </div>
            @endif

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Description</label>
            <textarea name="movie_description"  class="form-control" aria-describedby="basic-addon-name" > {{(isset($model->movie_description))?$model->movie_description:old('movie_description')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('movie_description')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


@section('extra-script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("select[name='movie_type']").change(function(e) {
            var _type = $(this).val();

            if (_type === 'paid') {
                $("#movie_price").show();
            } else {
                $("#movie_price").hide();
            }
        });

        $("select[name='vedio_type']").change(function() {
            var vedioType = $(this).val();

            // Toggle visibility based on vedio type
            $("#movie_url").toggle(vedioType === 'youtube' || vedioType === 'live_url' || vedioType === 'embedded_url');
            $("#video").toggle(vedioType === 'local');
        });

        // Trigger the change events on page load to handle the initial state
        $("select[name='movie_type']").trigger('change');
        $("select[name='vedio_type']").trigger('change');
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



