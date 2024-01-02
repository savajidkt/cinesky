@extends('admin.layout.app')
@section('page_title', 'Edit Setting')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<section class="bs-validation">
    <div class="row">
        <!-- Bootstrap Validation -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Setting</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.setting.update', ['setting' => $setting->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Name</label>
                                        <input type="text" id="basic-addon-name" name="app_name" class="form-control" placeholder="app name" value="{{ old('app_name', $setting->app_name) }}"  aria-describedby="basic-addon-name" />
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_name')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Upi</label>
                                        <input type="texr" id="basic-addon-name" name="upi"  value="{{ old('upi', $setting->upi) }}" class="form-control" placeholder="upi" aria-describedby="basic-addon-name" />
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('upi')
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

                                        @if((isset($setting->image)))
                                        <div class="clear">
                                            <br>
                                        <img src="{{ url('storage/app/'. $setting->image) }}" width="20%">
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Email</label>
                                        <input type="email" id="basic-addon-name" name="app_email"  value="{{ old('app_email', $setting->app_email) }}" class="form-control" placeholder="app email" aria-describedby="basic-addon-name" />
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_email')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App version</label>
                                        <input type="text" id="basic-addon-name" name="app_version" value="{{ old('app_version', $setting->app_version) }}" class="form-control" placeholder="app version" value="" aria-describedby="basic-addon-name" />
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_version')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Contact</label>
                                        <input type="tel" id="basic-addon-name" name="app_contact" value="{{ old('app_contact', $setting->app_contact) }}" class="form-control" placeholder="app version"  aria-describedby="basic-addon-name" />
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_contact')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Developed By</label>
                                        <input type="text" id="basic-addon-name" name="app_developed_by"  value="{{ old('app_developed_by', $setting->app_developed_by) }}" class="form-control" placeholder="app version"  aria-describedby="basic-addon-name" />
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_developed_by')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Description</label>
                                       <textarea  name="app_description" id="content" class="form-control" rows="10"  aria-describedby="basic-addon-name" >{{ old('app_description', $setting->app_description) }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_description')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Privacy Policiy</label>
                                       <textarea id="contentone" name="app_privacy_policy" class="form-control" aria-describedby="basic-addon-name" >{{ old('app_developed_by', $setting->app_developed_by) }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_privacy_policy')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name"> App Terms & Condition</label>
                                       <textarea id="content" name="app_terms_condition" class="form-control" aria-describedby="basic-addon-name" >{{ old('app_terms_condition', $setting->app_terms_condition) }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_terms_condition')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-addon-name">App Refund Policiy</label>
                                       <textarea id="content" name="app_refund_policy" class="form-control" aria-describedby="basic-addon-name" >{{ old('app_refund_policy', $setting->app_refund_policy) }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        @error('app_refund_policy')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" id="user-save" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra-script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('textarea').forEach(function (textarea) {
            ClassicEditor.create(textarea)
                .catch(function (error) {
                    console.error(error);
                });
        });
    });
</script>


@endsection
