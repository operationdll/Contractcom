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
                $("form:first").submit(function(){
                    var letter=$("#letter").val();
                    if(""==letter){
                        alert($("#letter").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var oid=$("#oid").val();
                    if(oid!=""){
                        $("form").attr("action","{{url('applications/update')}}");
                    }
                });
            });
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            </br></br></br>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-12 col-sm-12 col-lg-4">
            <h2>Applications information</h2>
            <form action="{{url('applications/add')}}" method="post">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($application)?$application->app_id:""}}'>
                <input name='pro_id' type='hidden' value='1'>
                <input name='pp_id' type='hidden' value='1'>
                <div class="form-group has-success">
                    <textarea placeholder="Short Description" class="form-control" id="letter" name="letter">{{isset($application)?$application->letter:""}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>

    </body>
</html>
