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


class Home extends CI_Controller
{
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
        if (!file_exists(APPPATH.'views/home/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('news_model', 'news');
        $this->load->model('populardestinations_model', 'populardestinations');
        $this->load->model('admin/home_model', 'home');
        $data['section_1'] = $this -> home -> get_section_1();

        $this->load->helper('text');
        $this->load->helper('date');
        
        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['news'] = $this -> news -> getnews();
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        // echo  ? "Silvio" : "Santos"; 
        // empty($this->uri->segment(1));
        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        // $this->load->view('home/quotation', $data);
        $this->load->view('quotes/index', $data);
        // $this->load->view('quotes/index', $data);
        // $this->load->view('home/services');
        $this->load->view('about/caroussel');
        // $this->load->view('home/testimonials');
        $this->load->view('home/contact_home');
        $this->load->view('home/news_home', $data);
        $this->load->view('templates/footer', $data);
        $this->load->model('news_model', 'news');
        $this->news->getnews();
    }
}
