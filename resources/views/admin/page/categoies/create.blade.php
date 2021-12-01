@extends('admin.share.master')
@section('content')
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Creat Category</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Name Category</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Slug Category</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12" style="margin-top: ">
                            <label class="form-label" for="basicInput">Parent_id</label>
                            <select class="form-control" id="select-country1" required="">
                                <option value="">Select Country</option>
                                <option value="usa">USA</option>
                                <option value="uk">UK</option>
                                <option value="france">France</option>
                                <option value="australia">Australia</option>
                                <option value="spain">Spain</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12" style="margin-top: ">
                            <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="select-country1" required="">
                                <option value="0">Choose...</option>
                                <option value="0">Visible</option>
                                <option value="1">Disable</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">With Helper Text</label>
                                <input type="text" id="helperText" class="form-control" placeholder="Name">
                                <p><small class="text-muted">Find helper text here for given textbox.</small></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
                            <label class="form-label" for="disabledInput">Readonly Input</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="You can't update me :P">
                        </div>
                        <div class="row">
                            <div class="col-4">
                            <button type="button" class="btn btn-outline-success round waves-effect">Success</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
