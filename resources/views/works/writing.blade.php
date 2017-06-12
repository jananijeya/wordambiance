@extends('layouts.app')

@section('content')

    <!-- Search area -->
    <input type="text" id="catInput" onkeyup="searchNow()" placeholder="Type in a category ...">

    <div class="row">
        <div class="col-lg-12">
            <!-- Works list -->
            @if(!empty($works))
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a style="background-color:#672904;" class="btn btn-success" href="{{ route('works.add') }}"> Add Work</a>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table id="worksTable" class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th width="25%">Title</th>
                            <th width="25%">Author</th>
                            <th width="25%">Category</th>
                            <th width="25%">Created</th>
                            <th width="25%"></th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($works as $work)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$work->title}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$work->author}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$work->category}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$work->created}}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('works.details', $work->id) }}" class="label label-success" style="background-color:#E8A66A;">Details</a>
                                        <a href="{{ route('works.edit', $work->id) }}" class="label label-warning" style="background-color:#672904;">Edit</a>
                                        <a href="{{ route('works.delete', $work->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')" style="background-color:#925826;">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
