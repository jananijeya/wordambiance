@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
            @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Work <a href="{{ route('works.writing') }}" class="label label-primary pull-right" style="background-color:#672904;">Back</a>
                    </div>
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="{{url('works/insert')}}">
                        {{csrf_field()}} <!--Create a security token -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Author</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author" id="author" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Category</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category" id="category" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="content" class="form-control" rows="40"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-default" value="Publish" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection