<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Applications</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                //search Person information
                $("#searchBnt").click(function(){
                    $.getJSON("{{url('applications/list')}}",{'name':$("#searchValue").val()},function(data){
                        var $html = "";
                        $.each(data,function(i,item){
                            $html = $html+'<tr><td>'+item.pro_id+'</td>'
                                    +'<td>'+item.pp_id+'</td>'
                                    +'<td>'+item.letter+'</td>'
                                    +'<td><button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('+item.app_id+')">Update</button> '
                                    +'<button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('+item.app_id+')">Delete</button></td></tr>';
                        });
                        $("#clientList").html($html);
                        $("#searchValue").val("");
                    });
                });

                //add Client
                $("#addBnt").click(function(){
                    window.location = "{{asset('applications/add')}}";
                });
            });

            //delete client
            function delPerson(cid){
                if (window.confirm("Do you want to delete this company?")) {
                    window.location = "{{asset('applications/delete')}}?id="+cid;
                }
            }

            //update client
            function updPerson(cid){
                window.location = "{{asset('applications/update')}}"+"?id="+cid;
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
            <h2>Applications information<button class="btn btn-primary my-2 my-sm-0" type="button" id="addBnt">Add</button></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Project Id</th>
                    <th>Personal Profile</th>
                    <th>Letter</th>
                </tr>
                </thead>
                <tbody id="clientList">
                @foreach($applications as $a)
                    <tr>
                        <td>
                            {{$a->pro_id}}
                        </td>
                        <td>
                            {{$a->pp_id}}
                        </td>
                        <td>
                            {{$a->letter}}
                        </td>
                        <td>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('{{$a->app_id}}')">Update</button>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('{{$a->app_id}}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
