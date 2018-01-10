<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $("form:first").submit(function(){
                    var username=$("#username").val();
                    if(""==username){
                        alert($("#username").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var password=$("#password").val();
                    if(""==password){
                        alert($("#password").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var oid=$("#oid").val();
                    if(oid!=""){
                        $("form").attr("action","{{url('user/update')}}");
                    }
                });
                var usertype='{{isset($user)?$user->usertype:""}}';
                if(usertype!=""){
                    $("#usertype").val(usertype);
                }
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
            <h2>User information</h2>
            <form action="{{url('user/add')}}" method="post">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($user)?$user->user_id:""}}'>
                <div class="form-group">
                    <input type="text" placeholder="User Name" class="form-control" id="username" name="username" value='{{isset($user)?$user->username:""}}'>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" id="password" name="password" value='{{isset($user)?$user->password:""}}'>
                </div>
                <div class="form-group">
                    <select id="usertype" name="usertype">
                        <option value="0">personal</option>
                        <option value="1">company</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>

    </body>
</html>
