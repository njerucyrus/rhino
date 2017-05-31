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

}