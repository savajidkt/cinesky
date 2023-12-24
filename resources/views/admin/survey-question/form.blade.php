<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="form-label" for="question">Question</label>
            <input type="text" id="question" name="question" class="form-control" placeholder="Question" value="{{(isset($model->question))?$model->question:''}}" aria-describedby="basic-addon-name" required />
            <div class="valid-feedback">Looks good!</div>
            @error('question')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="form-label" for="status">Status</label>
            <select id="status" name="status" class="form-control" placeholder="Status">
                <option value="">Choose Status</option>
                <option value="1" {{ isset($model->status) && $model->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ isset($model->status) && $model->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('status')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="form-label" for="type">Type</label>
            <select id="type" name="type" class="form-control" placeholder="Type">
                <option value="">Choose Type</option>
                <option value="1" {{ isset($model->type) && $model->type == 1 ? 'selected' : '' }}>Radio</option>
                <option value="2" {{ isset($model->type) && $model->type == 2 ? 'selected' : '' }}>Drag</option>
            </select>
            <div class="valid-feedback">Looks good!</div>
            @error('type')
            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Options</h4>
                    </div>
                    <div class="card-body">
                        <div id="repeater">
                            @foreach ($model->options as $key=> $option )
                            <div class="data-repeater-list">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group">
                                                <label for="option_name{{$option->id}}">Option Name</label>
                                                <input type="text" class="form-control" name="options[{{ $key }}]" id="option_name{{$option->id}}" value="{{$option->option}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 mb-50">
                                            <div class="form-group">
                                                <button class="btn btn-outline-danger text-nowrap px-1 remove" data-repeater-delete type="button">
                                                    <i data-feather="x" class="mr-25"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary data-repeater-create" type="button" data-repeater-create>
                                    <i data-feather="plus" class="mr-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice repeater -->
        </div>
    </div>

</div>



@section('extra-script')
<script src="{{asset('app-assets/js/scripts/forms/form-validation.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        jQuery('#clone-repeater').css('display', 'none');
        $('.data-repeater-create').on('click', function(e) {
            e.preventDefault();
            var $this = jQuery(this),
                cloneDiv = jQuery('#clone-repeater').clone(),
                parentElement = jQuery('#repeater'),
                counter = parentElement.children().length;

            parentElement.append(cloneDiv
                .removeAttr('id')
                .addClass('data-repeater-list')
                .css('display', 'block')
                .find('.custom-switch')
                .find('input')
                .removeAttr('id')
                .attr('id', 'correct_answer' + parseInt(counter + 1))
                .end()
                .find('label')
                .removeAttr('for')
                .attr('for', 'correct_answer' + parseInt(counter + 1))
                .end()
                .find('input:checkbox').removeAttr('name').attr('name', 'correct_answer[' + parseInt(counter) + ']').end()
                .end()
            );

        });



    $('body').on('click', '.remove', function() {
            var $this = jQuery(this),
                parentElement = $this.closest('.data-repeater-list'),
                grandParent = parentElement.closest('#repeater');

            if (confirm('Are you sure you want to delete this element?')) {
                parentElement.slideUp('normal', function() {
                    parentElement.remove();
                });
            }
        });
    });
    $('#jquery-val-form').validate({
        rules: {
            'question': {
                required: true
            },
            'status': {
                required: true
            },
            'type': {
                required: true
            }
        }
    });
</script>

@endsection