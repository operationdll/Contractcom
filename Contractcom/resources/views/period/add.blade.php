<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Period</title>
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
            <h2>Period information</h2>
            <form action="{{url('period/add')}}" method="post">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($period)?$period->pa_id:""}}'>
                <input name='pp_id' type='hidden' value='1'>
                <div class="form-group">
                    <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="period_start">
                        <input size="16" type="text" value="{{isset($period)?$period->period_start:""}}" readonly placeholder="Period Start">
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" placeholder="Period Start" id="period_start" name="period_start" value='{{isset($period)?$period->period_end:""}}' /><br/>
                </div>
                <div class="form-group">
                    <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="period_end">
                        <input size="16" type="text" value="{{isset($period)?$period->period_end:""}}" readonly placeholder="Period End">
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" placeholder="Period End" id="period_end" name="period_end" value='{{isset($period)?$period->period_end:""}}' /><br/>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Per Hours" class="form-control" id="per_hours" name="per_hours" value='{{isset($period)?$period->per_hours:""}}'>
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
                var period_start=$("#period_start").val();
                if(""==period_start){
                    alert($("#period_start").attr('placeholder')+' not be empty!');
                    return false;
                }
                var period_end=$("#period_end").val();
                if(""==period_end){
                    alert($("#period_end").attr('placeholder')+' not be empty!');
                    return false;
                }
                var per_hours=$("#per_hours").val();
                if(""==per_hours){
                    alert($("#per_hours").attr('placeholder')+' not be empty!');
                    return false;
                }
                var oid=$("#oid").val();
                if(oid!=""){
                    $("form").attr("action","{{url('period/update')}}");
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
