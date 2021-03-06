<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                //search Person information
                $("#searchBnt").click(function(){
                    $.getJSON("{{url('project/list')}}",{'name':$("#searchValue").val()},function(data){
                        var $html = "";
                        $.each(data,function(i,item){
                            $html = $html+'<tr><td>'+item.pro_name+'</td>'
                                    +'<td>'+item.start_time+'</td>'
                                    +'<td>'+item.project_desc+'</td>'
                                    +'<td>'+item.project_hours+'</td>'
                                    +'<td><button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('+item.pro_id+')">Update</button> '
                                    +'<button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('+item.pro_id+')">Delete</button></td></tr>';
                        });
                        $("#clientList").html($html);
                        $("#searchValue").val("");
                    });
                });

                //add Client
                $("#addBnt").click(function(){
                    window.location = "{{asset('project/add')}}";
                });
            });

            //delete client
            function delPerson(cid){
                if (window.confirm("Do you want to delete this project?")) {
                    window.location = "{{asset('project/delete')}}?id="+cid;
                }
            }

            //update client
            function updPerson(cid){
                window.location = "{{asset('project/update')}}"+"?id="+cid;
            }
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
        </br></br></br>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-12 col-sm-12 col-lg-5">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <font size="4px"><b>Name:</b></font><input id="searchValue" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="searchBnt">Search</button>
                    </form>
                </nav>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="container">
            <h2>Project information<button class="btn btn-primary my-2 my-sm-0" type="button" id="addBnt">Add</button></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Start Time</th>
                    <th>Project Description</th>
                    <th>Project Hours</th>
                    <th>Operating</th>
                </tr>
                </thead>
                <tbody id="clientList">
                @foreach($projects as $p)
                    <tr>
                        <td>
                            {{$p->pro_name}}
                        </td>
                        <td>
                            {{$p->start_time}}
                        </td>
                        <td>
                            {{$p->project_desc}}
                        </td>
                        <td>
                            {{$p->project_hours}}
                        </td>
                        <td>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('{{$p->pro_id}}')">Update</button>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('{{$p->pro_id}}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
