<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Period</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                //add Client
                $("#addBnt").click(function(){
                    window.location = "{{asset('period/add')}}";
                });
            });

            //delete client
            function delPerson(cid){
                if (window.confirm("Do you want to delete this project?")) {
                    window.location = "{{asset('period/delete')}}?id="+cid;
                }
            }

            //update client
            function updPerson(cid){
                window.location = "{{asset('period/update')}}"+"?id="+cid;
            }
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
        </br></br></br>
        </div>
        <div class="container">
            <h2>Period information<button class="btn btn-primary my-2 my-sm-0" type="button" id="addBnt">Add</button></h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Period Start</th>
                    <th>Period End</th>
                    <th>Per Hours</th>
                </tr>
                </thead>
                <tbody id="clientList">
                @foreach($periods as $p)
                    <tr>
                        <td>
                            {{$p->period_start}}
                        </td>
                        <td>
                            {{$p->period_end}}
                        </td>
                        <td>
                            {{$p->per_hours}}
                        </td>
                        <td>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="updPerson('{{$p->pa_id}}')">Update</button>
                            <button class="btn btn-primary my-2 my-sm-0" type="button" onclick="delPerson('{{$p->pa_id}}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>
