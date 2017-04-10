<?php

class Uprofile extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('uprofile/js/default.js');
    }

    function index() {
        $this->loadModel('technician');
        $this->view->getPrefix = $this->model->prefixRs();
        $this->view->getPosition = $this->model->positionRs();
        $this->view->getOffice = $this->model->officeRs();
        $this->view->rander('uprofile/index');
    }
    
    //no insert

    function editByID() {
        $this->model->updatePersonByID();
    }
    
    function editPersonalImage(){
        $this->model->updatePersonalImage();
    }

    
    public function getPersonById() {
        $this->loadModel('technician');
        return $this->model->getPersonalByID();
    }   
    
    public function getPosition() {
        $this->loadModel('technician');
        return $this->model->positionRs();
    }
    
    public function getOffice() {
        $this->loadModel('technician');
        return $this->model->officeRs();
    }
    
    public function getPrefix() {
        $this->loadModel('technician');
        return $this->model->prefixRs();
    }
    
    public function getImage(){
        /*
         * get image from database (will be use if image is store in database)
         */
                
        $url = explode('/', rtrim((isset($_GET['url']) ? $_GET['url'] : null), '/'));
        $id = $url[2];
        
        // do some validation here to ensure id is safe
        header("Content-type: image/jpeg");
        echo $this->model->loadImg($id);

    }
    public function getImageName(){
        $url = explode('/', rtrim((isset($_GET['url']) ? $_GET['url'] : null), '/'));
        $id = $url[2];
        
        echo $this->model->getImageName;

    }
    
    public function delImage(){
        $id = $_POST["id"];
        $data = array("chk"=>"");
        
        $possibleFiles = glob("./public/images/" . $id . '.*');
        foreach ($possibleFiles as $foundfile) {
            unlink($foundfile);
            
            $this->model->updatePersonalImage('del');
            
            $data['chk'] = 'ok';
        }
        
        echo json_encode($data);
    }
            

    function run() {
        $this->model->run();
    }

}
