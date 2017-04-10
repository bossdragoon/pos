<?php

class Announcement_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    function getAnnouncement() {

        $sql = "SELECT a_id,a_title,a_content
            ,a_date_created
            ,a_date_updated
            ,a_date_expired
            ,a_show
            ,IF(((a_date_expired is not null) AND (a_date_expired < DATE(NOW())) ),'Y','N') as is_expire
            FROM annoucement 
            ORDER BY a_id DESC";
        //echo $sql;
        return $this->db->select($sql);
    }
    
    function getAnnouncementShow() {

        $sql = "SELECT a_id,a_title,a_content
            ,a_date_created
            ,a_date_updated
            ,a_date_expired
            ,a_show
            ,IF(((a_date_expired is not null) AND (a_date_expired < DATE(NOW())) ),'Y','N') as is_expire
            FROM annoucement 
            HAVING (a_show = 'Y' and is_expire = 'N')            
            ORDER BY a_id DESC";
        //echo $sql;
        return $this->db->select($sql);
    }

    /*
     * Management
     */

    public function insertDataByID() {
        $sql = 'INSERT INTO annoucement (a_title,a_content,a_date_created,a_date_updated,a_date_expired,a_show) '
                . 'VALUES (:a_title,:a_content,:a_date_created,NOW(),:a_date_expired,:a_show)';
        $sth = $this->db->prepare($sql);

        $sth->execute(array(
//            ':a_id' => $_POST['a_id'],
            ':a_title' => $_POST['a_title'],
            ':a_content' => $_POST['a_content'],
            ':a_date_created' => $_POST['a_date_created'],
//            ':a_date_updated' => $_POST['a_date_updated'],
            ':a_date_expired' => $_POST['a_date_expired'],
            ':a_show' => $_POST['a_show']
        ));

//        print_r($sth->errorInfo());
        $errorInfo = $sth->errorInfo();
        if ($errorInfo[0] === '00000') {
            $chk = true;
        } else {
            $chk = false;
        }

        $data = array('sta' => 'add', 'result' => $chk);
        echo json_encode($data);
    }

    public function updateDataByID() {
        $sql = 'UPDATE annoucement '
                . 'SET a_title = :a_title '
                . ',a_content = :a_content '
                . ',a_date_created = :a_date_created '
                . ',a_date_updated = NOW() '
                . ',a_date_expired = :a_date_expired '
                . ',a_show = :a_show '
                . ' WHERE a_id = :a_id ';
        //echo $sql;
        $sth = $this->db->prepare($sql);

        $sth->execute(array(
            ':a_id' => $_POST['a_id'],
            ':a_title' => $_POST['a_title'],
            ':a_content' => $_POST['a_content'],
            ':a_date_created' => $_POST['a_date_created'],
//            ':a_date_updated' => $_POST['a_date_updated'],
            ':a_date_expired' => $_POST['a_date_expired'],
            ':a_show' => $_POST['a_show']
        ));

        //print_r($sth->errorInfo());
        $errorInfo = $sth->errorInfo();
        if ($errorInfo[0] === '00000') {
            $chk = true;
        } else {
            $chk = false;
        }

        $data = array('sta' => 'update', 'result' => $chk);
        echo json_encode($data);
    }

    function deleteDataByID() {
        if ($this->checkDataUseByID() === false) {
            $data = array('sta' => 'delete', 'result' => false);
        } else {
            $sql = 'DELETE FROM annoucement WHERE a_id = "' . $_POST['id'] . '" ';
            //$sql = '';
            $sth = $this->db->prepare($sql);
            $sth->execute();
            $errorInfo = $sth->errorInfo();
            if ($errorInfo[0] === '00000') {
                $chk = true;
            } else {
                $chk = false;
            }
            $data = array('sta' => 'delete', 'result' => $chk);
        }

        echo json_encode($data);
    }

    function checkDataUseByID() {
        $sth = $this->db->prepare("SELECT * FROM annoucement WHERE a:id = '{$_POST['id']}' AND ((a_date_expired is not null) AND (DATE(NOW()) > a_date_expired) )");
        $sth->execute();

        if (($sth->rowCount() > 0)) {
            return false;
        } else {
            return true;
        }
    }

    /*
     * Get Data
     */

    function getDataByID() {
        $id = filter_input(INPUT_POST, 'id'); //false if not set,null if filter fail
        
        $sql = "SELECT a_id,a_title,a_content
            ,DATE(a_date_created) as a_date_created
            ,TIME(a_date_created) as a_time_created
            ,a_date_updated
            ,a_date_expired
            ,a_show
            FROM annoucement 
            WHERE a_id = '{$id}' 
            ORDER BY a_id DESC";
        $data = $this->db->select($sql);
        return $data;
    }

}
