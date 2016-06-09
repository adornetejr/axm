<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Baixa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produto_solicitacao_baixa_estoque_model','Baixa_estoque');
    } 

    /*
     * Listing of produto_solicitacao_baixa_estoque
     */
    function index()
    {
        $data['baixa'] = $this->Baixa_estoque->get_all_produto_solicitacao_baixa_estoque();
        $this->load->view('cabecalho');
        $this->load->view('produto_solicitacao_baixa_estoque/index',$data);
    }

    /*
     * Adding a new produto_solicitacao_baixa_estoque
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
                'quantidade' => $this->input->post('quantidade'),
                'usuario_id' => $this->input->post('usuario'),
				'produto_id' => $this->input->post('produto'),
            );
            
            $produto_solicitacao_baixa_estoque_id = $this->Baixa_estoque->add_produto_solicitacao_baixa_estoque($params);
            redirect('baixa/index');
        }
        else
        {   
            $this->load->model('Usuario_model');
            $this->load->model('Produto_model');
            $data['usuario'] = $this->Usuario_model->get_all_usuario();
            $data['produto'] = $this->Produto_model->get_produto_no_estoque();
            $this->load->view('cabecalho');
            $this->load->view('produto_solicitacao_baixa_estoque/add',$data);
        }
    }  

    /*
     * Editing a produto_solicitacao_baixa_estoque
     */
    function edit($di)
    {   
        // check if the produto_solicitacao_baixa_estoque exists before trying to edit it
        $produto_solicitacao_baixa_estoque = $this->Baixa_estoque->get_produto_solicitacao_baixa_estoque($di);
        
        if(isset($produto_solicitacao_baixa_estoque['di']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'quantidade' => $this->input->post('quantidade'),
                    'produto_id' => $this->input->post('produto_id'),
                    'usuario_id' => $this->input->post('usuario'),
                );

                    $ids = array(
                    'produto_id' => $this->input->post('produto_id'),
                    'baixa_id' => $di
                    );

                $this->Baixa_estoque->update_produto_solicitacao_baixa_estoque($ids,$params);

                redirect('baixa/index');
            }
            else
            {   
                $data['baixa'] = $this->Baixa_estoque->get_produto_solicitacao_baixa_estoque($di);
                $this->load->model('Usuario_model');
                $this->load->model('Produto_model');
                $data['usuario'] = $this->Usuario_model->get_all_usuario();
                $data['produto'] = $this->Produto_model->get_all_produto();


                $this->load->view('cabecalho');
                $this->load->view('produto_solicitacao_baixa_estoque/edit',$data);
            }
        }
        else
            show_error('The produto_solicitacao_baixa_estoque you are trying to edit does not exist.');
    } 

    /*
     * Deleting produto_solicitacao_baixa_estoque
     */
    function remove($di)
    {
        $produto_solicitacao_baixa_estoque = $this->Baixa_estoque->get_produto_solicitacao_baixa_estoque($di);

        // check if the produto_solicitacao_baixa_estoque exists before trying to delete it
        if(isset($produto_solicitacao_baixa_estoque['di']))
        {
            $this->Baixa_estoque->delete_produto_solicitacao_baixa_estoque($di);
            redirect('baixa/index');
        }
        else
            show_error('The produto_solicitacao_baixa_estoque you are trying to delete does not exist.');
    }
    
}