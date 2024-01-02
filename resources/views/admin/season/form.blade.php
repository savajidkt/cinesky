<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Season Name</label>
            <input type="text" id="basic-addon-name" name="season_name" class="form-control" placeholder="season name" value="{{(isset($model->season_name))?$model->season_name:old('season_name')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('season_name')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">Series Name</label>
            <select name="series_id" class="form-control" id="series_id">
                <option value="">Select series</option>
                @if ($series->count())
                @foreach ($series as $serie)
                @php
                if(isset($model->series_id) && $model->series_id == $serie->id){
                $selectedCom ='selected';
                }else{
                $selectedCom = $serie->id == old('series_id') ? 'selected' : '';
                }
                @endphp
                <option value="{{ $serie->id }}" {{ $selectedCom }}> {{ $serie->series_name }}</option>
                @endforeach
                @endif
              </select>
            <div class="valid-feedback">Looks good!</div>
            @error('series_id')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>



