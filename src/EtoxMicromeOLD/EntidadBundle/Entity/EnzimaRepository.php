<?php

namespace EtoxMicrome\EntidadBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EnzimaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EnzimaRepository extends EntityRepository
{
    public function getEnzimeIdFromName($name){
        $em = $this->getEntityManager();
        $connection = $em->getConnection();
        $user = $connection->getUsername();
        $password = $connection->getPassword();
        $host = $connection->getHost();
        $database=$connection->getDatabase();
        $conn = mysql_connect ($host, $user, $password);

        mysql_select_db($database, $conn);
        mysql_query("SET NAMES 'utf8'");

        $selectSQL="SELECT e.id FROM Entidad as e where e.nombre='$name' limit 1";
        $result= mysql_query($selectSQL);
        $row = mysql_fetch_row($result);
        $idEnzima=(int)$row[0];
        return($idEnzima);
    }
}
