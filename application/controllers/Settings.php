<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends MY_Controller {
    public $data;
    function __construct(){
        parent::__construct();
        $this->load->model('Mgeneral',"MGeneral");
        $this->load->model('Mbooking',"MBooking");
        $this->load->model('Mrestbranch',"MRestBranch");
        $this->load->library('pagination');
        //$this->output->enable_profiler(true);
        if($this->session->userdata('restuser') == '')
        {
                redirect('home/login');
        }
    }
    
    function index($item=0){
        
        $rest=$restid=$this->session->userdata('rest_id');
        $uuserid=$this->session->userdata('id_user');
        $permissions=$this->MBooking->restPermissions($restid);
        $permissions=explode(',',$permissions['sub_detail']);
        $data['settings']=$settings=  $this->MGeneral->getSettings();
        $data['sitename']=$this->MGeneral->getSiteName();
        $data['logo']=$logo=$this->MGeneral->getLogo();
        $data['rest']=$restdata=$this->MGeneral->getRest($restid,false,true);
        $data['pagetitle']=$data['title']="Contact Details - ".(htmlspecialchars($data['rest']['rest_Name']));
        $data['member']=  $this->MRestBranch->getAccountDetails($rest);
        
        $data['js']='member,validate';
        $data['main']='settings';
        $data['side_menu'] = array("settings", "account_settings");
        $this->layout->view('settings',$data);
    }
    
    function save(){
        if($this->input->post('rest_ID')){
            $restid=$this->session->userdata('rest_id');
            $rest=$restdata=$this->MGeneral->getRest($restid,false,true);
            $member= $this->MRestBranch->getAccountDetails($rest['rest_ID']);
            $this->MRestBranch->updateMemberContacts();
            returnMsg("success",'settings',(htmlspecialchars($rest['rest_Name'])).' Account contact details updated');
        }else{
            returnMsg("error","settings",'Some error occured, Pleas try again.');
        }
    }
  
}