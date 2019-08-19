@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>   
                <h2> Show Category</h2>
            </div>
            <br>  
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
            </div>
        </div>
    </div>
     <br>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $category->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $category->name }}
            </div>
        </div>
    </div>
@endsection