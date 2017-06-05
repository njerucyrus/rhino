<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/5/17
 * Time: 5:28 PM
 */

namespace App\Controller;


use App\AppInterface\FundInterface;
use App\DBManager\DB;

class FundController implements FundInterface
{
    public static function updateAccountEarning($userId, $amount)
    {
        $referralCode = ReferralTreeController::getId($userId)['referralCode'];
        $earning = ReferralTreeController::getTotalEarning($referralCode);
        $db  = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("UPDATE earning_account SET totalEarning=:totalEarning
                                    WHERE userId=:userId");
            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":totalEarning", $earning);
            if($stmt->execute()){
                $db->closeConnection();
                return true;
            } else{
                return false;
            }
        } catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public static function updateAccountBalance($userId, $amount)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("UPDATE earning_account SET balance=balance+{$amount}
                                    WHERE userId=:userId");
            $stmt->bindParam(":userId", $userId);
            if($stmt->execute()){
                $db->closeConnection();
                return true;
            } else{
                $db->closeConnection();
                return false;
            }
        } catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


    public static function checkBalance($userId)
    {
        // TODO: Implement checkBalance() method.
    }

    public static function withDraw($userId, $amount)
    {
        // TODO: Implement withDraw() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    public static function getObject($id)
    {
        // TODO: Implement getObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }


}