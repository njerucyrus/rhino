<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */

?>

<div class="page-container">


    <div class="col-md-12 col-md-offset-2">
        <?php //include 'header_menu_views.php' ?>


        <form role="form" class="form-horizontal form-groups-bordered" method="post"
              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">


            <!-- Text input-->
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="userReferralCode" class="control-label">Referral Code</label>


                    <input type="text" class=".SmallInput form-control " name="userReferralCode"
                           placeholder="Referral Code">

                </div>

                <div class="col-sm-4">
                    <label for="fullName" class=" control-label">Full Name</label>


                    <input type="text" class="form-control" name="fullName" placeholder="Full Name" required>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">

                <div class="col-sm-4">
                    <label for="userName" class="control-label">Username</label>


                    <input type="text" class="form-control" name="username" placeholder="Username" required>

                </div>

                <div class="col-sm-4">
                    <label for="idNo" class="control-label">ID Number</label>


                    <input type="text" class="form-control" name="idNo" placeholder="ID Number" required>
                </div>


            </div>


            <!-- Text input-->
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="phoneNumber" class="control-label">Phone Number</label>

                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" required>
                </div>
                <div class="col-sm-4">
                    <label for="email" class="control-label">Email</label>


                    <input type="email" class="form-control" name="email" placeholder="Email" required/>

                </div>
            </div>


            <!--text input-->
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="password" class=" control-label">Password</label>


                    <input type="password" class="form-control" name="password" placeholder="Password"
                           required>
                </div>
                <div class="col-sm-4">
                    <label for="confirm" class="control-label">Confirm Password</label>


                    <input type="password" class="form-control" name="confirm" placeholder="Confirm Password"
                           required/>

                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-lg btn-blue ">Save Student</button>
                    <input type="submit" name="submit" value="Join" class="btn btn-primary btn-lg btn-block "/>
                </div>
            </div>

        </form>

    </div>




