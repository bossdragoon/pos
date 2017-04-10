<?php

class Uprofile_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getImageName($id) {
        $sth = $this->db_user->prepare("SELECT p.person_photo FROM personal p WHERE p.person_id = '{$id}'");
        $sth->execute();
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data['person_photo'];
    }    

    public function updatePersonByID() {

        /*
         * Under construction อยู่ในระหว่างการทดสอบ ว่าจะอัพเดตข้อมูลของ skh หรือไม่
         */
        $data = array('sta' => 'edit');

        $sth = $this->db_user->prepare("SELECT p.* FROM personal p WHERE p.person_id = '{$_POST['person_id']}'");
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $sql = "UPDATE personal "
                    . " SET "
                    . " person_username = :person_username,"
                    //. " person_password = :person_password,"
                    . " person_prefix = :person_prefix,"
                    . " person_firstname = :person_fname,"
                    . " person_lastname = :person_lname,"
                    . " position_id = :person_position,"
                    . " office_id = :person_office"
                    . " WHERE person_id = :person_id ";

            $sth1 = $this->db_user->prepare($sql);
            $sth1->execute(array(
                ':person_username' => $_POST['person_username'],
                //':person_password' => $_POST['person_password'],
                ':person_prefix' => $_POST['person_prefix'],
                ':person_fname' => $_POST['person_fname'],
                ':person_lname' => $_POST['person_lname'],
                ':person_position' => $_POST['person_position'],
                ':person_office' => $_POST['person_office'],
                ':person_id' => $_POST['person_id']
            ));

            //UPDATE PASSWORD if user change
            if (!empty($_POST['person_password'])) {
                $sql = "UPDATE personal SET person_password = md5(:person_password) "
                        . " WHERE person_id = :person_id ";

                $sth1 = $this->db_user->prepare($sql);
                $sth1->execute(array(
                    ':person_password' => $_POST['person_password'],
                    ':person_id' => $_POST['person_id']
                ));

                $data += array('editpass' => 'true');
            }
        }
        $data += array('err' => $sth1->errorInfo());
        echo json_encode($data);
    }

    public function updatePersonalImage($delMode = '') {
        
        $id = $_POST['id'];

        if ($delMode <> '') {
            /*--DELETE PICTURE--*/
            $sql = "UPDATE personal SET person_photo = :person_photo  WHERE person_id = :person_id ";

            $sth1 = $this->db_user->prepare($sql);
            $sth1->execute(array(
                ':person_photo' => '',
                ':person_id' => $id
            ));

            $data = array('sta' => 'delImage');
            
        } else {
            /*--UPDATE PICTURE--*/
            $data = array('sta' => 'editImage');
            
            $filename = $_POST['filename'];
            $ext = explode(".", $filename);
            $fileExt = $ext[1];

            $newFilename = $id . '.' . $fileExt;
            
            $sth = $this->db_user->prepare("SELECT p.* FROM personal p WHERE p.person_id = '{$id}'");
            $sth->execute();

            if ($sth->rowCount() > 0) {
                $sql = "UPDATE personal SET person_photo = :person_photo  WHERE person_id = :person_id ";

                $sth1 = $this->db_user->prepare($sql);
                $sth1->execute(array(
                    ':person_photo' => $newFilename,
                    ':person_id' => $id
                ));

                $data += array('imagename' => $newFilename);
                $_SESSION['User']['person_photo'] = $newFilename;

            }
            $data += array('err' => $sth1->errorInfo());
            echo json_encode($data);
        }
    }

    public function loadImg($id) {
        $sth = $this->db->prepare("SELECT pic FROM pic WHERE technician_id = '{$id}'");
        $sth->execute();
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data['pic'];
    }

}
