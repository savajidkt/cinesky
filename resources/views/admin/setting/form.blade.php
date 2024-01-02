<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> App Name</label>
            <input type="text" id="basic-addon-name" name="app_name" class="form-control" placeholder="app name" value="{{(isset($model->app_name))?$model->app_name:old('app_name')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('app_name')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-default-email1">App Logo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo" />
                <label class="custom-file-label" for="customFile1">Choose profile pic</label>
            </div>
            <div class="valid-feedback">Looks good!</div>

            @if((isset($model->image)))
            <div class="clear">
            <img src="{{ url('storage/app/upload/' . $model->id . '/' . $model->image) }}" width="20%">
            </div>
            @endif

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> App Email</label>
            <input type="email" id="basic-addon-name" name="app_email" class="form-control" placeholder="app email" value="{{(isset($model->app_email))?$model->app_email:old('app_email')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('app_email')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> App version</label>
            <input type="text" id="basic-addon-name" name="app_version" class="form-control" placeholder="app version" value="{{(isset($model->app_version))?$model->app_version:old('app_version')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('app_version')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> App Contact</label>
            <input type="tel" id="basic-addon-name" name="app_contact" class="form-control" placeholder="app version" value="{{(isset($model->app_contact))?$model->app_contact:old('app_contact')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('app_contact')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> App Developed By</label>
            <input type="text" id="basic-addon-name" name="app_developed_by" class="form-control" placeholder="app version" value="{{(isset($model->app_developed_by))?$model->app_developed_by:old('app_developed_by')}}" aria-describedby="basic-addon-name" />
            <div class="valid-feedback">Looks good!</div>
            @error('app_developed_by')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> App Description</label>
           <textarea id="basic-addon-name" name="app_description" class="form-control" aria-describedby="basic-addon-name" >{{(isset($model->app_description))?$model->app_description:old('app_description')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('app_description')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Privacy Policiy</label>
           <textarea id="basic-addon-name" name="app_privacy_policy" class="form-control" aria-describedby="basic-addon-name" >{{(isset($model->app_privacy_policy))?$model->app_privacy_policy:old('app_privacy_policy')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('app_privacy_policy')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Terms & Condition</label>
           <textarea id="basic-addon-name" name="app_terms_condition" class="form-control" aria-describedby="basic-addon-name" >{{(isset($model->app_terms_condition))?$model->app_terms_condition:old('app_terms_condition')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('app_terms_condition')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="basic-addon-name"> Refund Policiy</label>
           <textarea id="basic-addon-name" name="app_refund_policy" class="form-control" aria-describedby="basic-addon-name" >{{(isset($model->app_refund_policy))?$model->app_refund_policy:old('app_refund_policy')}}</textarea>
            <div class="valid-feedback">Looks good!</div>
            @error('app_refund_policy')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

