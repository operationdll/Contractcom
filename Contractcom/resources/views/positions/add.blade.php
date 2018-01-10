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
                $("form:first").submit(function(){
                    var pos_name=$("#pos_name").val();
                    if(""==pos_name){
                        alert($("#pos_name").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var work_hours=$("#work_hours").val();
                    if(""==work_hours){
                        alert($("#work_hours").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var hours_rate=$("#hours_rate").val();
                    if(""==hours_rate){
                        alert($("#hours_rate").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var position_desc=$("#position_desc").val();
                    if(""==position_desc){
                        alert($("#position_desc").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var requirements=$("#requirements").val();
                    if(""==requirements){
                        alert($("#requirements").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var oid=$("#oid").val();
                    if(oid!=""){
                        $("form").attr("action","{{url('positions/update')}}");
                    }
                });
                var pos_type='{{isset($position)?$position->pos_type:""}}';
                if(pos_type!=""){
                    $("#pos_type").val(pos_type);
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
            <h2>Position information</h2>
            <form action="{{url('positions/add')}}" method="post">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($position)?$position->pos_id:""}}'>
                <input name='pro_id' type='hidden' value='1'>
                <div class="form-group">
                    <select id="pos_type" name="pos_type">
                        <option value="0">personal</option>
                        <option value="1">company</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Position Name" class="form-control" id="pos_name" name="pos_name" value='{{isset($position)?$position->pos_name:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Work Hours" class="form-control" id="work_hours" name="work_hours" value='{{isset($position)?$position->work_hours:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Hours Rate" class="form-control" id="hours_rate" name="hours_rate" value='{{isset($position)?$position->hours_rate:""}}'>
                </div>
                <div class="form-group has-success">
                    <textarea placeholder="Position Desc" class="form-control" id="position_desc" name="position_desc">{{isset($position)?$position->position_desc:""}}</textarea>
                </div>
                <div class="form-group has-success">
                    <textarea placeholder="Requirements" class="form-control" id="requirements" name="requirements">{{isset($position)?$position->requirements:""}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>

    </body>
</html>
