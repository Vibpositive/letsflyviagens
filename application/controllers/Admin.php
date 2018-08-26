<?php

/**
 * Recipe class file
 *
 * PHP Version 5.2
 *
 * @category Recipe
 * @package  Recipe
 * @author   Lorna Jane Mitchell <lorna@ibuildings.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://example.com/recipes
 */
 
/**
 * Recipe class
 *
 * The class holding the root Recipe class definition
 *
 * @category Recipe
 * @package  Recipe
 * @author   Lorna Jane Mitchell <lorna@ibuildings.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://example.com/recipes/recipe
 */


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/home_model', 'model');
    }
    //Rota no caso eh view
    /**
     * Renders the view
     *
     * This function calls a static fetching method against the Ingredient class
     * and returns everything matching this recipe ID
     *
     * @param string $page The position of the current token in the
     *
     * @return string blank
     */
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
            // show_404();
        }
        // echo "admin";
        // $this->load->model('populardestinations_model', 'populardestinations');

        // $data['title'] = ucfirst($page);
        // $data['home'] = $this->uri->segment(1) == '';
        // $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
        // $this->load->view('home/header', $data);
        // $this->load->view('about/company_description');
        // $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('templates/footer', $data);
    }

    public function home($page = "main", $crud = 'null')
    {
        
        // echo "page " . $page . "<br>";
        // echo "crud " . $crud . "<br>";
        // echo 'this->input->method(): ' . $this->input->method();

        if($page == "crud" && $this->input->method() != "post"){
            redirect('/admin', 'refresh');
        }

        $post = $this->input->post(NULL, TRUE);

        switch ($page) {
            case 'crud':
                    switch ($crud) {
                        case 'create':
                            $this -> home_crud_c($post);
                            break;
                            case 'read':
                            # code...
                            break;
                            case 'update':
                                $this -> home_crud_u($post);
                            break;
                        case 'delete':
                            # code...
                            break;
                        
                        default:
                            # code...
                            // TODO: redirect
                            break;
                    }
                break;
            default:
            # code...
                $this -> loadview($page);
                break;
        }
    }

    private function loadview($page){
        echo "loadview";
        if (!file_exists(APPPATH.'views/admin/home/' . $page . '.php')) {
            show_404();
        }
        
        $data['section_1'] = $this -> model -> get_section_1();
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/home/' . $page, $data);
        $this->load->view('templates/admin/footer');
    }

    private function home_crud_c($data){
        if(!isset($data['name']) || !isset($data['value'])){
            redirect('/admin', 'refresh');
        }
        if($data['name'] && $data['value']){
            echo $this -> model -> insert_into_section_1($data);
        }
    }

    private function home_crud_u($data){
        // die(print_r($data));

        $update = [];
        $counter = 0;

        foreach ($data as $key => $value) {
            
            if(strpos($key, 'enabled') === false){
                array_push($update, array($key => $value));
            }
            
            foreach ($update as $upkey) {
                
                if(strpos($key, 'enabled') !== false){
                    if(!array_key_exists("enabled", $update[$counter])){
                        array_push($update[$counter], $update[$counter]["enabled"] = $counter);
                    }
                }
                foreach (array_keys($update[$counter]) as $ak) {
                    if(is_numeric($ak)){
                        array_pop($update[$counter]);
                    }
                }
                $counter++;
            }
            $counter = 0;
        }


        // foreach ($data as $key => $value) {
            
        //     if(strpos($key, 'enabled') !== false){
                
        //         foreach ($update as $upitem) {

        //             $index = substr($key, 0, strlen($key) - 8);
        //             // echo "upitem: " . substr($key, 0, strlen($key) - 8) . " || value: " . $upitem[substr($key, 0, strlen($key) - 8)] . "<br>";
        //             // echo "upitem: " . substr($key, 0, strlen($key) - 8) . " || value: " . $index . "<br>";
        //             if(isset($upitem[$index])){
        //                 $upitem['enabled'] = 1;
        //                 $update[$counter] = $upitem;
        //                 // print_r($upitem);
        //                 // echo "<br>";
        //                 // print_r($update);
        //                 // echo "<br>";
        //                 // echo ;
        //             }
        //             // echo substr($key, 0, strlen($key) - 8) ."<br>";
        //             // echo $key ."<br>";
        //             // break;
        //         }
        //         // $currentindex = array_push($update, array($key => $value, "enabled" => 0));
        //     }
        //     $counter++;
        // }
        echo "<pre>";
        print_r($update);
        echo "</    pre>";
        die();
        if(!isset($data['name']) || !isset($data['value'])){
            die("aqui");
            redirect('/admin', 'refresh');
        }
        if($data['name'] && $data['value']){
            echo "here";
            // TODO: Model insert
            echo $this -> model -> insert_into_section_1($data);
        }
    }
}