<?php

class Newsletter extends CI_Controller
{
    public function register(){
        if ($this->input->method() != "post") {
            // TODO: redirect to the right place
            // redirect('/', 'refresh');
        }
        
        $this->load->helper('url');
        $this->load->helper('forms_helper');
        
        $this->load->model('user_model', 'user_model');
        
        $post = $this->input->post(NULL, TRUE);

        $email = $post['Email'];

        if($email){
            $user = $this -> user_model -> get_user($email);
            
            if(!$user){
                $this -> user_model -> create_user($email);
                $user = $this -> user_model -> get_user($email);
            }
            $userid = $user -> id;
            $this -> user_model -> newsletter($userid);
        }//TODO: else if no email and quote type id - reported
        
        $mensagemHTML = '<html><body>';

        
        if(isset($userid)){
            $data = array();
            
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $today = strftime('%d de %B de %Y', strtotime('today'));
            $now = date("h:i:sa");
            
            $emaildestinatario = "letsfly@letsflyviagens.com.br";
            $emailsender = "william@letsflyviagens.com.br";
            $assunto = "Inserir no newsletter - " . $post['Email'];

            $mensagemHTML = '<html><body>';
            $mensagemHTML .= '</body></html>';
            
            $mensagemHTML .= '<h1>Inserir no newsletter</h1>';
            $mensagemHTML .= "<h2>Em: $today $now</h2>";
            
            $mensagemHTML .= '<table rules="all" style="border-color: #666; font-family: arial, sans-serif; border-collapse: collapse; width: 100%;" cellpadding="100">';                      

            $quebra_linha = "<br>";
            
            foreach ($post as $key => $value) {
                
                $mensagemHTML .= "<tr style='background: #eee; border: 1px solid #dddddd; text-align: left; padding: 8px;'>";
                $mensagemHTML .= "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px; width:30%;'><strong>Campo: " . $key . " :</strong></td>";
                $mensagemHTML .= "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px; width:70%;'>" . $value . "</td>";
                $mensagemHTML .= "</tr>";

            }

            $mensagemHTML .= "</table>";
            $mensagemHTML .= "</body></html>";
            
            $headers = "MIME-Version: 1.1\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            $headers .= "From: " . strip_tags($email) . "\r\n"; // remetente
            $headers .= "Return-Path: " . strip_tags($email) . "\r\n"; // return-path

            
            if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
                $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
                if(mail($emaildestinatario, $assunto, $mensagemHTML, $headers )){
                    // enviou no windows
                    $this->output->set_output("success");
                    return;
                }else{
                    // Nao enviou nenhum dos dois
                    $this->output->set_output("failure");
                    return;
                }
                // nao enviou no linux
                $this->output->set_output("failure");
                return;
            }else{
                // enviou no linux
                $this->output->set_output("success");
                return;
            }
        }
        $this->output->set_output("mensagem html: " . $mensagemHTML);
        // $this->output->set_output("success");
        
    }
}
