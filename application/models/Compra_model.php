<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Compra_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get compra by id
     */
    function get_compra($id)
    {
        $this->db->select('c.id,c.quantidade, c.data_criacao, c.value_product, c.produto_id, f.id as id_fornecedor, f.nome,produto.nome as produto');
        $this->db->join('fornecedor f','f.id = c.fornecedor_id');
        $this->db->join('produto','produto.id = c.produto_id');
        return $this->db->get_where('compra c',array('c.id'=>$id))->row_array();
    }
    
    /*
     * Get all compra
     */
    function get_all_compra()
    {
        $this->db->select('c.id,c.quantidade, c.data_criacao, c.value_product, fornecedor.nome,produto.nome as produto');
        $this->db->join('fornecedor','fornecedor.id = c.fornecedor_id');
        $this->db->join('produto','produto.id = c.produto_id');

        return $this->db->get('compra c')->result_array();
    
    }
    
    /*
     * function to add new compra
     */
    function add_compra($params)
    {
        $this->db->insert('compra',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update compra
     */
    function update_compra($id,$params)
    {
        $this->db->where('produto_id',$id['produto_id']);
        $this->db->where('id',$id['compra_id']);
        $this->db->update('compra',$params);
    }
    
    /*
     * function to delete compra
     */
    function delete_compra($id)
    {
        $this->db->delete('compra',array('id'=>$id));
    }

}
