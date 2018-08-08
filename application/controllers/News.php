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


class News extends CI_Controller
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
        

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';

        $this->load->model('news_name');
        
    }

    public function article()
    {
        
        $this->load->model('news_model', 'news');
        $this->load->model('populardestinations_model', 'populardestinations');

        // $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['article'] = $this->news->getpost($this->uri->segment(3));
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        // echo $this->uri->segment(3);
        // die();
        
        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view(strtolower(get_class($this)) . '/article', $data);
        $this->load->view('templates/footer', $data);
        
    }
}
