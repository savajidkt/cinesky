@extends('admin.layout.app')
@section('page_title','Edit Setting')
@section('content')
<section class="bs-validation">
    <div class="row">
        <!-- Bootstrap Validation -->
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Setting</h4>
                </div>
                <div class="card-body">
                    <form id="jquery-val-form" class="needs-validation1" novalidate method="post" enctype="multipart/form-data" action="">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> App Name</label>
                                    <input type="text" id="basic-addon-name" name="app_name" class="form-control" placeholder="app name"  aria-describedby="basic-addon-name" />
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
                                    <img src="" width="20%">
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> App Email</label>
                                    <input type="email" id="basic-addon-name" name="app_email" class="form-control" placeholder="app email" value="" aria-describedby="basic-addon-name" />
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_email')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> App version</label>
                                    <input type="text" id="basic-addon-name" name="app_version" class="form-control" placeholder="app version" value="" aria-describedby="basic-addon-name" />
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_version')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> App Contact</label>
                                    <input type="tel" id="basic-addon-name" name="app_contact" class="form-control" placeholder="app version" value="" aria-describedby="basic-addon-name" />
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_contact')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> App Developed By</label>
                                    <input type="text" id="basic-addon-name" name="app_developed_by" class="form-control" placeholder="app version" value="" aria-describedby="basic-addon-name" />
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_developed_by')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> App Description</label>
                                   <textarea id="basic-addon-name" name="app_description" class="form-control" aria-describedby="basic-addon-name" ></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_description')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> Privacy Policiy</label>
                                   <textarea id="basic-addon-name" name="app_privacy_policy" class="form-control" aria-describedby="basic-addon-name" ></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_privacy_policy')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> Terms & Condition</label>
                                   <textarea id="basic-addon-name" name="app_terms_condition" class="form-control" aria-describedby="basic-addon-name" ></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('app_terms_condition')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="basic-addon-name"> Refund Policiy</label>
                                   <textarea id="basic-addon-name" name="app_refund_policy" class="form-control" aria-describedby="basic-addon-name" ></textarea>
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
