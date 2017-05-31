<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/31/17
 * Time: 10:05 PM
 */

namespace App\Controller;


use App\AppInterface\SiteInterface;
use App\DBManager\DB;
use App\Entity\Site;

class SiteController implements SiteInterface
{
    public function createSingle(Site $site)
    {
        $url = $site->getUrl();
        $category = $site->getCategory();
        $description = $site->getDescription();

        try{
            $db = new DB();
            $conn = $db->connect();

            $stmt = $conn->prepare("INSERT INTO sites(url, category, description) VALUES (:url, :category, :description)");
            $stmt->bindParam(":url", $url);
            $stmt->bindParam(":category", $category);
            $stmt->bindParam(":description", $description);
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

    public function createMultiple(array $sites)
    {
        // TODO: Implement createMultiple() method.
    }

    public function updateSingle(Site $site, $id)
    {
        // TODO: Implement updateSingle() method.
    }

    public function updateMultiple(array $sites)
    {
        // TODO: Implement updateMultiple() method.
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