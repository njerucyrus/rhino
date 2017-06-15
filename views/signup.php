<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */


?>
<style>
    .error{
        color: rgba(206,25,17,0.82);
        font-size: 16px;
        font-weight: bold;
    }
</style>

<div class="page-container">

    <div class="col-md-12 col-md-offset-2">


        <form role="form" class="form-horizontal form-groups-bordered" method="post"
              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">


            <!-- Text input-->
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="referralCode" class="control-label">Referral Code</label>


                    <input type="text" class="form-control " name="referralCode" id="referralCode">

                </div>

                <div class="col-sm-4">
                    <label for="fullName" class=" control-label">Full Name <span class="error"> * <?php echo $fullNameErr?></span></label>
                    <input type="text" class="form-control" name="fullName" id="username" required>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">

                <div class="col-sm-4">
                    <label for="username" class="control-label">Username <span class="error">* <?php echo $usernameErr?></span></label>

                    <input type="text" class="form-control" name="username" id="username" required>
                </div>

                <div class="col-sm-4">
                    <label for="idNo" class="control-label">ID Number <span class="error">* <?php echo $idNoErr?></span></label>
                    <input type="number" class="form-control" name="idNo" id="idNo"  required>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="phoneNumber" class="control-label">Phone Number <span class="error">* <?php echo $phoneNumberErr?></span></label>

                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" required>


                </div>
                <div class="col-sm-4">
                    <label for="email" class="control-label">Email <span class="error">* <?php echo $emailErr?></span></label>
                    <input type="email" class="form-control" name="email" id="email" required/>


                </div>
            </div>


            <!--text input-->
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="password" class=" control-label">Password <span class="error">* <?php echo $passwordErr?></span></label>

                    <input type="password" class="form-control" id='password' name="password" required>
                </div>
                <div class="col-sm-4">
                    <label for="confirmPassword" class="control-label">Confirm Password <span class="error">* <?php echo $confirmPasswordErr?></span></label>


                    <input type="password" class="form-control" name="confirmPassword"
                           id="confirmPassword" required/>

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <span class="error"><?php echo $matchErr;?></span>
                    <input type="submit" name="submit" value="Join" class="btn btn-primary btn-lg btn-block "/>
                </div>
            </div>
        </form>

    </div>
</div>




