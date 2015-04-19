<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('logged_in')) {
            $this->load->view('headerfooter/header_view');
            $this->load->view('business/post_business_view');
            $this->load->view('headerfooter/footer_view');
        }
        else {
            redirect('welcome', 'refresh');
        }       
    }

    public function GetBusiness()
    {
        $this->load->model('businessmodel');
        $business = $this->businessmodel->getBusiness();

        if ($business){
            $response["success"] = 1;
            $response["message"] = "Post Available";
            $response["posts"] = array();

            foreach ($business as $row) {
                $post = array();
                $post["bname"]=$row['business_name'];
                $post["bdescription"]=$row['business_desc'];
                $post["bcat"]=$row['business_cat'];
                $post["bshareholder"]=$row['business_sholder'];
                $post["bpic"]=$row['business_pic'];

                array_push($response["posts"], $post);
            }

            echo json_encode($response);

        }

        else {
            $response["success"] = 0;
            $response["message"] = "Not avalilable yet";
            die(json_encode($response));
        }
    }

    public function PostBusiness()
    {
        if (!empty($_POST)) {
    
            if (empty($_POST['bname'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bcategory'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }


            else if (empty($_POST['bdescription'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['baddress'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bshareholder'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bslotinvestment'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bvalueinvestment'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bproductionplan'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bmarketingplan'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bfinancialplan'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

            else if (empty($_POST['bdevelopmentplan'])) {
                $response["success"] = 0;
                $response["message"] = "Please enter business name";
      
                die(json_encode($response));
            }

        $bname = $_POST['bname'];
        $bpic = $_FILES["blogo"];

        $bpic_location = $bpic["tmp_name"];
        $bpic_name = $bpic["name"];
        $bpic_type = $bpic["type"];
        $bpic_size = $bpic["size"];

        $bpic_ext = pathinfo($bpic_name, PATHINFO_EXTENSION);

        if(!is_dir("uploads/".$this->session->userdata('user_name')."/".$bname."/")){
            mkdir("uploads/".$this->session->userdata('user_name')."/".$bname."/");
            mkdir("uploads/".$this->session->userdata('user_name')."/".$bname."/business_picture/");
        }

        $direct="uploads/".$this->session->userdata('user_name')."/".$bname;
        if(!file_exists("uploads/".$this->session->userdata('user_name')."/".$bname."/")){
            $increment='';
            while(file_exists("uploads/".$this->session->userdata('user_name')."/".$bname.$increment."/")) {
                $increment++;
            }
            mkdir("uploads/".$this->session->userdata('user_name')."/".$bname.$increment."/");
            mkdir("uploads/".$this->session->userdata('user_name')."/".$bname.$increment."/business_picture/");
            $direct="uploads/".$this->session->userdata('user_name')."/".$bname.$increment;
        }

        if($bpic_name){
            $bpic_dir = $direct."/business_picture/".$bname."_photo.".$bpic_ext;
        }

        $MAX_FILE_SIZE = 200000000;
        $formatfile = array('png','jpg','gif','GIF','PNG','JPG');

        if(!in_array($bpic_ext, $formatfile)) {
            $response["success"] = 0;
            $response["message"] = "Invalid extension";
            die(json_encode($response));
        }

        if($bpic_size > $MAX_FILE_SIZE) {
            $response["success"] = 0;
            $response["message"] = "Invalid file size";
            die(json_encode($response));
        }

        if($bpic_name){ 
            move_uploaded_file($bpic_location, $bpic_dir);
            $bpic_path = base_url().$bpic_dir;
        }else{
            $bpic_path = '';
        }

        $this->session->userdata('logged_in');
        $user_id = $this->session->userdata('user_id');
        
        $query_params = array(
            'business_owner_id' => $user_id,
            'business_name' => $_POST['bname'],
            'business_logo' => $bpic_path,
            'business_category' => $_POST['bcategory'],
            'business_description' => $_POST['bdescription'],
            'business_address' => $_POST['baddress'],
            'business_types_of_investments' => $_POST['bshareholder'],
            'business_slot_investments' => $_POST['bslotinvestment'],
            'business_value_investments' => $_POST['bvalueinvestment'],
            'business_production_plan' => $_POST['bproductionplan'],
            'business_marketing_plan' => $_POST['bmarketingplan'],
            'business_financial_plan' => $_POST['bfinancialplan'],
            'business_development_plan' => $_POST['bdevelopmentplan'],
            );
            
        $this->load->model('businessmodel');
        $this->businessmodel->InsertBusiness('business', $query_params);

        $response["success"] = 1;
        $response["message"] = "Business Successfully Added!";
        echo json_encode($response);
        //redirect(site_url('business/getBusiness'));

        redirect(site_url('home'));     
        } else {
                redirect(site_url('welcome')); 
        } 
        mysql_close();       
    }

    public function MyBusiness()
    {
        $this->load->model('businessmodel');

        $data['mydatabusiness'] = $this->businessmodel->GetMyBusiness($this->session->userdata('user_id'),'business');

        $this->load->view('headerfooter/header_view');
        $this->load->view('business/my_business_view', $data);
        $this->load->view('headerfooter/footer_view'); 
    }
}
