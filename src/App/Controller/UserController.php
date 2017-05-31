<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/31/17
 * Time: 5:13 PM
 */

namespace App\Controller;


use App\AppInterface\UserInterface;
use App\Entity\User;
use App\DBManager\DB;

class UserController implements UserInterface
{
    public function create(User $user)
    {
        $userReferralCode = $user->getUserReferralCode();
        $fullName = $user->getFullName();
        $idNo = $user->getIdNo();
        $phoneNumber = $user->getPhoneNumber();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $paymentStatus = $user->getPaymentStatus();
        $accountStatus = $user->getAccountStatus();
        $loginIp = $user->getLoginIp();
        $createdAt = $user->getCreatedAt();
        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn->prepare("INSERT INTO users(
                                                        userReferralCode,
                                                        fullName,
                                                        idNo,
                                                        phoneNumber, 
                                                        email, 
                                                        username,
                                                        password, 
                                                        paymentStatus,
                                                        accountStatus,   
                                                        loginIp, 
                                                        createdAt
                                                        ) 
                                                  VALUES(
                                                        :userReferralCode,
                                                        :fullName,
                                                        :idNo,
                                                        :phoneNumber, 
                                                        :email, 
                                                        :username,
                                                        :password, 
                                                        :paymentStatus,
                                                        :accountStatus,
                                                        :loginIp, 
                                                        :createdAt
                                                        ) 
                                                  ");
            $stmt->bindParam(":userReferralCode", $userReferralCode);
            $stmt->bindParam(":fullName", $fullName);
            $stmt->bindParam(":idNo", $idNo);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":paymentStatus", $paymentStatus);
            $stmt->bindParam(":accountStatus", $accountStatus);
            $stmt->bindParam(":loginIp", $loginIp);
            $stmt->bindParam(":createdAt", $createdAt);
            $query = $stmt->execute();
            if ($query){
                $db->closeConnection();
                return true;
            }else {
                $db->closeConnection();
                return false;
            }

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update(User $user)
    {
        // TODO: Implement update() method.
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