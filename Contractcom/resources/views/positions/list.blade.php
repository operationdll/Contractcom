<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Position</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                //search Person information
                $("#searchBnt").click(function(){
                    $.getJSON("{{url('positions/list')}}",{'name':$("#searchValue").val()},function(data){
                        var $html = "";
                        $.each(data,function(i,item){
                            var pos_type = item.pos_type==0?"personal":"company";
                            $html = $html+'<tr><td>'+item.pro_id+'</td>'
                                    +'<td>'+pos_type+'</td>'
                                    +'<td>'+item.pos_name+'</td>'
                                    +'<td>'+item.work_hours+'</td>'
                                    +'<td>'+item.hours_rate+'</td>'
                                    +'<td>'+item.position_desc+'</td>'
                                    +'<td>'+item.requirements+'</td>'
                                    +'<td><button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('+item.pos_id+')">Update</button> '
                                    +'<button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('+item.pos_id+')">Delete</button></td></tr>';
                        });
                        $("#clientList").html($html);
                        $("#searchValue").val("");
                    });
                });

                //add Client
                $("#addBnt").click(function(){
                    window.location = "{{asset('positions/add')}}";
                });
            });

            //delete client
            function delPerson(cid){
                if (window.confirm("Do you want to delete this company?")) {
                    window.location = "{{asset('positions/delete')}}?id="+cid;
                }
            }

            //update client
            function updPerson(cid){
                window.location = "{{asset('positions/update')}}"+"?id="+cid;
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
            <h2>Position information<button class="btn btn-primary my-2 my-sm-0" type="button" id="addBnt">Add</button></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Position Type</th>
                    <th>Position Name</th>
                    <th>Work Hours</th>
                    <th>Hours Rate</th>
                    <th>Position Desc</th>
                    <th>Requirements</th>
                    <th>Operating</th>
                </tr>
                </thead>
                <tbody id="clientList">
                @foreach($positions as $p)
                    <tr>
                        <td>
                            {{$p->pro_id}}
                        </td>
                        <td>
                            {{$p->pos_type==0?"personal":"company"}}
                        </td>
                        <td>
                            {{$p->pos_name}}
                        </td>
                        <td>
                            {{$p->work_hours}}
                        </td>
                        <td>
                            {{$p->hours_rate}}
                        </td>
                        <td>
                            {{$p->position_desc}}
                        </td>
                        <td>
                            {{$p->requirements}}
                        </td>
                        <td>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('{{$p->pos_id}}')">Update</button>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('{{$p->pos_id}}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
