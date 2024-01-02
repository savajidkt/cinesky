<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Plan </label>
            <input type="text" id="basic-addon-name" name="nameplan" class="form-control" placeholder="nameplan" value="{{(isset($model->nameplan))?$model->nameplan:old('nameplan')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('plan')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">validity</label>
            <input type="text" id="basic-addon-name" name="validity" class="form-control" placeholder="validity" value="{{(isset($model->validity))?$model->validity:old('validity')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('validity')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> description </label>
            <input type="text" id="basic-addon-name" name="description" class="form-control" placeholder="description" value="{{(isset($model->description))?$model->description:old('description')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('description')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> price </label>
            <input type="number" id="basic-addon-name" name="price" class="form-control" placeholder="price" value="{{(isset($model->price))?$model->price:old('price')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('price')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> discount price </label>
            <input type="number" id="basic-addon-name" name="discount_price" class="form-control" placeholder="discount_price" value="{{(isset($model->discount_price))?$model->discount_price:old('discount_price')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('discount_price')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror

        </div>
    </div>

</div>

