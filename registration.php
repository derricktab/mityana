<?php include("header.php"); ?>
<title>Registration</title>

<style>
    body{
        background: url("assets/bg.jpeg");
        background-size: cover;
        background-position: center;
        background-repeat: none;
        background-attachment: fixed;
    }
</style>


    <div class="form-wrapper">
    <h1 class="font-weight-bold text-center student-reg">STUDENT REGISTRATION</h1>
    <form action="registration.php" method="post">
        
        <div class="form-group mt-5">
            <div class="form-row">

            <!-- FIRST NAME -->
                <div class="col">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="First Name" name="fname">
                    </div>
                </div>

                <!-- LAST NAME -->
                <div class="col">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Last Name" name="lname">
                    </div>
                </div>
            </div>

        </div>  
  
        <!-- CLASS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-chalkboard-teacher"></i>                  
                </div>
                </div>
                <input type="text" class="form-control" placeholder="Class" name="class">
        </div>
        </div>  

  
        <!-- GENDER -->
        <div class="form-group">
            <label><b>GENDER: </b> &nbsp;&nbsp;&nbsp;</label>
             <div class="form-check form-check-inline">
                <input type="radio" name="gender" class="form-check-input radio">
                 <label class="form-check-label">Male</label>                 
             </div>

             <div class="form-check form-check-inline">
                <input type="radio" name="gender" class="form-check-input radio">
                 <label class="form-check-label">Female</label>                 
             </div>
        </div>  

        <!-- DATE OF BIRTH -->
        <div class="form-group">
         <input id="datepicker" width="300" class="form-control mr-0" placeholder="Date Of Birth"/>
        </div>

        <!-- NATIONALITY -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-flag"></i>
                    </div>
                </div>
            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality">
            </div>
        </div>

        <!-- HOME DISTRICT -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-igloo"></i>
                    </div>
                </div>
            <input type="text" name="home_district" class="form-control" placeholder="Home District">
            </div>
        </div>

        <!-- HOME ADDRESS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-map-marker-alt"></i>
                    </div>
                </div>
            <input type="text" name="home_address" class="form-control" placeholder="Home Address">
            </div>
        </div>

        <!-- RELIGION -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-pray"></i>
                    </div>
                </div>
            <input type="text" name="religion" class="form-control" placeholder="Religion">
            </div>
        </div>
  

        
        <!-- PARENT NAME -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-signature"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Parent/Guardian's Name" name="pname">
        </div>
        </div>  
        
        <!-- PARENT OCCUPATION -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Parent/Guardian's Occupation" name="poccupation">
        </div>
        </div>  
  
        <!-- PARENT PHONE NUMBER -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Parent/Guardian's Phone Number" name="pphone">
        </div>
        </div>  

        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-info submit form-control" name="submit">
        </div>
    </form>
</div>


<script>
    $("#register").removeClass("btn-outline-danger");
    $("#register").addClass("btn-danger");
</script>

<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
</script>

<?php include("footer.php") ?>