<?php

//    make by Shikaru 
class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        
        $login = $this->db_user->prepare("SELECT p.person_id,pf.prefix_name as prefix,p.person_firstname as firstname,person_lastname as lastname,o.ward_name as office,po.position_name as position
                                ,p.person_username
                                FROM personal p
                                LEFT OUTER JOIN prefix pf ON pf.prefix_id = p.person_prefix
                                LEFT OUTER JOIN office_sit o ON o.ward_id = p.office_id
                                LEFT OUTER JOIN position po ON po.position_id = p.position_id 
                                WHERE p.person_username = :username AND p.person_password = :password");
        $login->execute(array(
            ':username' => $username,
            ':password' => md5($password)
        ));

        $data = $login->fetch(PDO::FETCH_ASSOC);

        if ($login->rowCount() > 0) {

            //User Successful found
            //check if user is 'admin' in HOSxP
            $tech = $this->db->prepare("SELECT doctor.cid as technician_cid 
                                   FROM opduser,doctor 
                                   WHERE opduser.doctorcode=doctor.`code` 
                                   AND groupname = 'admin' 
                                   AND doctor.cid = '{$data["person_id"]}'");

            $tech->execute();

            if ($tech->rowCount() > 0) {
                $data['type'] = 'staff'; //add new array key/value pair
                Session::init();
                Session::set('User', $data);
                $data = array(
                    'chk' => true,
                    'url' => URL);
            } else {
                $data = array('chk' => false,'chkhos' => false);
            }
        } else {
            $data = array('chk' => false);
        }
        echo json_encode($data);
//        $technician = $tech->fetch(PDO::FETCH_ASSOC);
    }

}