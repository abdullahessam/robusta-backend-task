@extends('dashboard.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>edit city</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">edit city</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::model($city,['route'=>['cities.update',$city],'method'=>'PUT','id'=>'form']) !!}
                        <div class="card-body">

                            @include('dashboard.cities.form')
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\Dashboard\City\UpdateRequest::class, '#form'); !!}
@endpush
