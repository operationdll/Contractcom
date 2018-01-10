<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company</title>
        <!-- Bootstrap  CSS file -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="{{asset('/resources/js/jquery.js')}}"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $("form:first").submit(function(){
                    var cname=$("#cname").val();
                    if(""==cname){
                        alert($("#cname").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var reg_no=$("#reg_no").val();
                    if(""==reg_no){
                        alert($("#reg_no").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var office_address=$("#office_address").val();
                    if(""==office_address){
                        alert($("#office_address").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var telephone=$("#telephone").val();
                    if(""==telephone){
                        alert($("#telephone").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var phone=$("#phone").val();
                    if(""==phone){
                        alert($("#phone").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var contact_person=$("#contact_person").val();
                    if(""==contact_person){
                        alert($("#contact_person").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var email=$("#email").val();
                    if(""==email){
                        alert($("#email").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var shortDesc=$("#shortDesc").val();
                    if(""==shortDesc){
                        alert($("#shortDesc").attr('placeholder')+' not be empty!');
                        return false;
                    }
                    var oid=$("#oid").val();
                    if(oid!=""){
                        $("form").attr("action","{{url('company/update')}}");
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
            <h2>Company information</h2>
            <form action="{{url('company/add')}}" method="post">
                <input name='_token' type='hidden' value='{{csrf_token()}}'/>
                <input id='oid' name='id' type='hidden' value='{{isset($company)?$company->cp_id:""}}'>
                <input name='user_id' type='hidden' value='1'>
                <div class="form-group">
                    <input type="text" placeholder="Company Name" class="form-control" id="cname" name="cname" value='{{isset($company)?$company->company_name:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Region Number" class="form-control" id="reg_no" name="reg_no" value='{{isset($company)?$company->reg_no:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Office Address" class="form-control" id="office_address" name="office_address" value='{{isset($company)?$company->office_address:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Telephone" class="form-control" id="telephone" name="telephone" value='{{isset($company)?$company->telephone:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Phone" class="form-control" id="phone" name="phone" value='{{isset($company)?$company->phone:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Contact Person" class="form-control" id="contact_person" name="contact_person" value='{{isset($company)?$company->contact_person:""}}'>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control" id="email" name="email" value='{{isset($company)?$company->email:""}}'>
                </div>
                <div class="form-group has-success">
                    <textarea placeholder="Short Description" class="form-control" id="shortDesc" name="shortDesc">{{isset($company)?$company->short_desc:""}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>

    </body>
</html>
