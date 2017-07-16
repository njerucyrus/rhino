<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 7/15/17
 * Time: 12:58 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
use App\Controller\UserController;
use App\Services\PhoneNumber;

$errorMsg=$successMsg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['phoneNumber']) && !empty($_POST['mpesaCode'])){
        $phoneNumber = cleanInput($_POST['phoneNumber']);
        $mpesaCode = cleanInput($_POST['mpesaCode']);
        $cleanPhone = new PhoneNumber($phoneNumber);
        $phoneNumber = $cleanPhone->addPrefix();

        $updated = UserController::updateMpesaConfirmation($phoneNumber,$mpesaCode);
        if($updated === true){
            $successMsg = "Transaction Recorded Successfully You will be notified via email One We Complete verifying your payment.";
        }elseif(isset($updated['error'])){
            $errorMsg = $updated['error'];
        }
    }
}

function cleanInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form action="payment_confirmation.php" method="post" class="form-group">
    <label for="phoneNumber">PhoneNumber</label>
    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="<?php echo isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>">
    <label for="mpesaCode">Mpesa Code</label>
    <input type="text" name="mpesaCode" id="mpesaCode" class="form-control" placeholder="Please Enter Mpesa Transaction Code">
    <input type="submit" value="submit" class="btn btn-primary">
</form>
