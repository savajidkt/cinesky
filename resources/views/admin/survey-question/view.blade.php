@extends('admin.layout.app')
@section('page_title','View Question')
@section('content')
<section id="card-actions">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$model->question}}</h4>
                    <div class="heading-elements">
                       
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($model->options as $key=> $option )
                                            <tr>
                                                <td>{{$option->option}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('question.index')}}"><button type="submit" id="user-save" class="btn btn-primary">Back</button></a>
        </div>
    </div>
</section>
@endsection