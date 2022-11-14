@section('title')
    Register
@endsection

@extends('layouts.app')

@section('content')
</head>
    <style type="text/css">
        #form{
                max-width: 500px;
                padding: 20px;
                margin: 50px auto;
                background-color: rgb(151, 194, 246);
                border: 1px solid rgba(128, 10, 137, 0.1);
            }

         .box{}
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });
    </script>

  </head>

  <body>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <div class="container-fluid">
      <div class="row">
        <h3 class="text-center pt-5">
            Register
        </h3>
        <div class="col col-sm-8" id="form">
            <form method="POST" action="{{ route('register') }}">
            @csrf

              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label">Username</label>
                <div class="col-md-8">
                  <input type="text" name="name" class="form-control" required="true">
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-4 pt-0">Gender</legend>
                  <div class="col-sm-8">

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" required="">
                        <label class="form-check-label" for="inlineRadio1" name="gender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1" required="">
                      <label class="form-check-label" for="inlineRadio2" name="gender">Female</label>
                    </div>
                  </div>
              </fieldset>

              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" required="true">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" required="true">
                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-sm-4 col-form-label">Phone number</label>
                <div class="col-sm-8">
                  <input type="tel" class="form-control" maxlength="11" required="true" name="phone">
                </div>
              </div>

              <div class="row mb-3">
                <label for="address" class="col-sm-4 col-form-label">Address</label>
                <div class="col-sm-8">
                  <textarea class="form-control" required="true" name="address"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                    <label for="role" class="col-sm-4 col-form-label">Role</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="role" required>
                        <option value="">Please Select Choose</option>
                        <option value="member">Member</option>
                        <option value="partner">Partner</option>
                        <option value="volunteer">Volunteer</option>
                        <option value="donor">Donor</option>
                    </select>
                </div>
              </div>

              <!-- Member box -->
            <div class="member box">
                <div class="row mb-3">
                    <label for="membername" class="col-sm-4 col-form-label">Member Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="member_name" >
                      </div>
                </div>

                <div class="row mb-3">
                  <label for="cgphone" class="col-sm-4 col-form-label">Member Phone number</label>
                    <div class="col-sm-8">
                      <input type="tel" class="form-control" maxlength="11" name="member_phone" >
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="cgphone" class="col-sm-4 col-form-label">Member Address</label>
                    <div class="col-sm-8">
                      <input type="tel" class="form-control" maxlength="11" name="member_address" >
                    </div>
                </div>
              </div>

              <!-- Partner box -->
              <div class="partner box">
                <div class="row mb-3">
                   <label for="partner" class="col-sm-4 col-form-label">Partner Address</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="partner_address">
                     </div>
                </div>
                <div class="row mb-3">
                    <label for="partner" class="col-sm-4 col-form-label">Partner Organization</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="partnership_organization">
                      </div>
                </div>
                <div class="row mb-3">
                  <label for="partner" class="col-sm-4 col-form-label">Partnership timeline</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="partnership_timeline" >
                    </div>
                </div>
              </div>

              <!-- Volunteer box -->
              <div class="volunteer box">
                <div class="row mb-3">
                  <label for="volunteer" class="col-sm-4 col-form-label">Volunteer Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="volunteer_name">
                    </div>
              </div>
                <div class="row mb-3">
                  <label for="volunteer" class="col-sm-4 col-form-label">Volunteer Time</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="volunteer_time">
                    </div>
              </div>
              <div class="row mb-3">
                <label for="volunteer" class="col-sm-4 col-form-label">Volunteer Available</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="volunteer_available" >
                  </div>
              </div>
                    </div>
              
              <!-- Donor box -->
              <div class="donor box">
                <div class="row mb-3">
                  <label for="donor" class="col-sm-4 col-form-label">Donation Schedule</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="donation_schedule">
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="donor" class="col-sm-4 col-form-label">Donation Type</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="donation_type" >
                    </div>
                </div>
              </div>
            
              <button type="submit" class="btn btn-secondary" style="float: right;">Register</button>
              <button type="reset" class="btn btn-outline-danger" style="float: right;margin-right: 20px;">Clear</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection


