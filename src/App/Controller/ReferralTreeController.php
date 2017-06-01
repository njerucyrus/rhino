<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/31/17
 * Time: 8:03 PM
 */

namespace App\Controller;


use App\AppInterface\ReferralTreeInterface;
use App\DBManager\DB;
use App\Entity\ReferralTree;

class ReferralTreeController implements ReferralTreeInterface
{
    public function create(ReferralTree $referralTree)
    {
        $userId = $referralTree->getUserId();
        $userReferralCode = $referralTree->getUserReferralCode();

        try{
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO referral_tree(userId, userReferralCode) VALUES (:userId, :userReferralCode)");
            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":userReferralCode", $userReferralCode);
            $query = $stmt->execute();
            if($query) {
                $db->closeConnection();
                return true;
            } else{
                $db->closeConnection();
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function delete($id)
    {
        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn->prepare("DELETE FROM referral_tree WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $query = $stmt->execute();
            if ($query) {
                $db->closeConnection();
                return true;
            } else{
                $db->closeConnection();
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function destroy()
    {
        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn->prepare("DELETE FROM referral_tree WHERE 1");
            $stmt->bindParam(":id", $id);
            $query = $stmt->execute();
            if ($query) {
                $db->closeConnection();
                return true;
            } else{
                $db->closeConnection();
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function getId($id)
    {
        try{
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("SELECT t.* FROM referral_tree t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            if ($stmt->execute() && $stmt->rowCount() == 1) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $row;
            } else{
                $db->closeConnection();
                return [];
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public static function getObject($id){}

    public static function all()
    {
        try{

            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("SELECT t.* FROM referral_tree t WHERE 1");

            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $rows;
            } else{
                $db->closeConnection();
                return [];
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public static function generateReferralCode($length=6){
        $str = "";
        $characters = array_merge(range('A','Z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        return strtoupper($str);
    }

    public static function createReferralTree($userId, $userReferralCode, $referralCode=null){
        try{
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO referral_tree(userId, userReferralCode, l1)
                                    VALUES(:userId, :userReferralCode, :l1)");
            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":userReferralCode", $userReferralCode);
            $stmt->bindParam(":l1", $referralCode);
            if ($stmt->execute()){
                $db->closeConnection();
                return true;
            } else{
                $db->closeConnection();
                return false;
            }

        }catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


    public static function getL1($referralCode) {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT l1 FROM referral_tree WHERE userReferralCode=:referralCode");
            $stmt->bindParam(":referralCode", $referralCode);
            if($stmt->execute() && $stmt->rowCount() ==1){
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                //check if null first....
                return $row['l1'];
            } else{
                return false;
            }
        } catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public static function getReferredByTree($referralCode){
        $db = new DB();
        $conn = $db->connect();
        $l1Code = self::getL1($referralCode);
        try{
           $stmt = $conn->prepare("SELECT * FROM referral_tree WHERE userReferralCode=:l1Code");
           $stmt->bindParam(":l1Code", $l1Code);
           if($stmt->execute() && $stmt->rowCount() == 1){
               $row = $stmt->fetch(\PDO::FETCH_ASSOC);
               return array(
                   "l1"=>isset($row['l1']) ? $row['l1'] : null,
                   "l2"=>isset($row['l2']) ? $row['l2'] : null,
                   "l3"=>isset($row['l3']) ? $row['l3'] : null,
                   "l4"=>isset($row['l4']) ? $row['l4'] : null,
                   "l5"=>isset($row['l5']) ? $row['l5'] : null
               );
           } else{
               return [];
           }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    /**
     * @param $referralCode
     * @return bool
     */
    public static function updateReferralTree($referralCode){
        $levels = self::getReferredByTree($referralCode);
        try{
            $db = new DB();
            $conn = $db->connect();
            $stmt = $conn->prepare("UPDATE referral_tree SET l2=:l2, l3=:l3, l4=:l4, l5=l5, l6=:l6
                                   WHERE userReferralCode=:referralCode");
            $stmt->bindParam(":l2", $levels['l1']);
            $stmt->bindParam(":l3", $levels['l2']);
            $stmt->bindParam(":l4", $levels['l3']);
            $stmt->bindParam(":l5", $levels['l4']);
            $stmt->bindParam(":l6", $levels['l5']);
            $stmt->bindParam(":referralCode", $referralCode);
            if ($stmt->execute()){
               return true;
            } else{
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function getCounts($referralCode){
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT * FROM referral_code_counts WHERE referralCode=:referralCode");
            $stmt->bindParam(":referralCode", $referralCode);
            if($stmt->execute() && $stmt->rowCount() > 0){
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                return array(
                    "l1Count"=>(int)$row['l1Count'],
                    "l2Count"=>(int)$row['l2Count'],
                    "l3Count"=>(int)$row['l3Count'],
                    "l4Count"=>(int)$row['l4Count'],
                    "l5Count"=>(int)$row['l5Count'],
                    "l6Count"=>(int)$row['l6Count']
                );
            } else{
                return [];
            }
        } catch (\PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }
    public static function updateCount($referralCode, $level){
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("UPDATE referral_code_counts SET '{$level}'= '{$level}'+1 
                                    WHERE referralCode=:referralCode");
            $stmt->bindParam(":referralCode", $referralCode);
            if($stmt->execute()){
                return true;
            } else{
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public static function debitAccounts($referralCode){
        $codes = self::getReferredByTree($referralCode);
        if (isset($codes['l1']) and $codes['l1'] != ''){
            $count1 = self::getReferredByTree($codes['l1']);
            $count2 = self::getReferredByTree($codes['l2']);
            $count3 = self::getReferredByTree($codes['l3']);
            $count4 = self::getReferredByTree($codes['l4']);
            $count5 = self::getReferredByTree($codes['l5']);
            $count6 = self::getReferredByTree($codes['l6']);

            if($count1['l1Count'] < 5 ){
                //update the count with +1
                //and make l1 payment of 20% of 4000
            }
            if($count2['l2Count'] < 25){

            }
        }
    }

}