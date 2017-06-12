@extends('layouts.app')

@section('content')

    <!-- Search area -->

    <input type="text" id="catInput" onkeyup="searchNow()" placeholder="  Search by category ...">

    <br>
    <br>

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

                <br>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table id="worksTable" class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th width="20%">Title</th>
                            <th width="10%">Author</th>
                            <th width="20%">Category</th>
                            <th width="20%">Created</th>
                            <th width="30%"></th>
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
                                        <div>
                                            <a href="{{ route('works.details', $work->id) }}" class="label label-success" style="background-color:#E8A66A;">Details</a>
                                            <a href="{{ route('works.edit', $work->id) }}" class="label label-warning" style="background-color:#672904;">Edit</a>
                                            <a href="{{ route('works.delete', $work->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')" style="background-color:#925826;">Delete</a>
                                        </div>
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

<script>
    /*** FILTER BY CATEGORY ***


     The following w3 tutorial was used to help with the creating of the filter:
     https://www.w3schools.com/howto/howto_js_filter_table.asp

     */

    function searchNow(){
        //Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("catInput"); //Grab what was inputted for the work category
        filter = input.value.toUpperCase(); //Re-write input to uppercase so searches aren't case sensitive
        table = document.getElementById("worksTable"); //Grab table with works list
        tr = table.getElementsByTagName("tr"); //Grab all table rows

        //Loop through all table rows, hiding those that don't match the input query

        for (i=0; i < tr.length; i++){ //Loop through the table row array in tr until the end
            td = tr[i].getElementsByTagName("td")[2]; //Grad the table data (td) for the category field (in position 2 of each row)

            if (td){ //If there is a table data field ...
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1 ) { //Turn td to uppercase, then check that this string of data contains the filter (capitalized user input); If it doesn't the result is -1
                    tr[i].style.display = ""; //If there is a match, display that row; "" resets the element's display property to the default
                } else {
                    tr[i].style.display = "none";
                }
            }
        }



    }

</script>
