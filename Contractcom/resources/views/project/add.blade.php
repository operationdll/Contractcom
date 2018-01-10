<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link href="{{asset('/resources/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
    </head>
    <body>
    <div class="container">
        <div class="row">
            </br></br></br>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-12 col-sm-12 col-lg-4">
            <h2>Project information</h2>
            <form action="{{url('project/add')}}" method="post">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($project)?$project->pro_id:""}}'>
                <input name='cp_id' type='hidden' value='1'>
                <div class="form-group">
                    <input type="text" placeholder="Project Name" class="form-control" id="pro_name" name="pro_name" value='{{isset($project)?$project->pro_name:""}}'>
                </div>
                <div class="form-group">
                    <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="start_time">
                        <input size="16" type="text" value="{{isset($project)?$project->start_time:""}}" readonly placeholder="Start Time">
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" placeholder="Start Time" id="start_time" name="start_time" value='{{isset($project)?$project->start_time:""}}' /><br/>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Project Hours" class="form-control" id="project_hours" name="project_hours" value='{{isset($project)?$project->project_hours:""}}'>
                </div>
                <div class="form-group has-success">
                    <textarea placeholder="Project Description" class="form-control" id="project_desc" name="project_desc">{{isset($project)?$project->project_desc:""}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <script src="{{asset('/resources/js/jquery.js')}}"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('/resources/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script>
        $(function(){
            $("form:first").submit(function(){
                var pro_name=$("#pro_name").val();
                if(""==pro_name){
                    alert($("#pro_name").attr('placeholder')+' not be empty!');
                    return false;
                }
                var start_time=$("#start_time").val();
                if(""==start_time){
                    alert($("#start_time").attr('placeholder')+' not be empty!');
                    return false;
                }
                var project_hours=$("#project_hours").val();
                if(""==project_hours){
                    alert($("#project_hours").attr('placeholder')+' not be empty!');
                    return false;
                }
                var project_desc=$("#project_desc").val();
                if(""==project_desc){
                    alert($("#project_desc").attr('placeholder')+' not be empty!');
                    return false;
                }

                var oid=$("#oid").val();
                if(oid!=""){
                    $("form").attr("action","{{url('project/update')}}");
                }
            });

            $('.form_datetime').datetimepicker({
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
        });
    </script>
    </body>
</html>
