<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorias_model extends CI_Model {
    public $id;
    public $titulo;
    public $descricao;
    public function __construct(){
        parent::__construct();
    }
    public function listar_categorias(){
        $this->db->order_by('titulo','ASC');
        return $this->db->get('categorias')->result();
    }

    public function detalhes_categoria($id){
        $this->db->where('id',$id);
        return $this->db->get('categorias')->result();
    }

    public function listar_produtos_categoria($id){
        $dados['detalhes'] = $this->detalhes_categoria($id);
        $this->db->select('*');
        $this->db->from('produtos');
        $this->db->join('produtos_categorias','produtos_categorias.produto = produtos.id AND produtos_categorias.categoria = '.$id);
        $dados['produtos'] = $this->db->get()->result();
        return $dados;
    }
}