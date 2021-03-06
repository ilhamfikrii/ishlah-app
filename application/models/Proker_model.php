<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker_model extends CI_Model
{
    private $primary_key = 'id';
    private $table_name = 'isi_proker';

    public function get()
    {
        $this->db->select($this->table_name . '.*');
        $this->db->select('div.nama_divisi as nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('divisi_proker as div', $this->table_name . '.id_divisi_proker=div.id', 'INNER');

        $query = $this->db->get();

        return $query->result();
    }
    // public function getProker()
    // {
    //     $this->db->select('isi_proker.*, divisi_proker.nama_divisi as nama_divisi');
    //     $this->db->from('isi_proker');
    //     $this->db->join('divisi_proker', 'divisi_proker.id = isi_proker.id_divisi_proker');
    //     $query = $this->db->get();
    //     return $query;
    // }
    public function get2()
    {
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function get_by_id($kondisi)
    {
        $this->db->from('isi_proker');
        $this->db->where($kondisi);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert($data)
    {
        $this->db->insert('isi_proker', $data);
        return TRUE;
    }
    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('isi_proker');
        return TRUE;
    }
    public function update($data, $kondisi)
    {
        $this->db->update('isi_proker', $data, $kondisi);
        return TRUE;
    }
    public function detail_data($id = NULL)
    {
        $this->db->select('isi_proker .*');
        $this->db->select('div.nama_divisi as nama_divisi');
        $this->db->from('isi_proker ip');
        $this->db->join('divisi_proker as div ip.id_divisi_proker=div.id');

        $query = $this->db->get_where($this->table_name, array('id' => $id))->row();

        return $query->result();

        // $query = $this->db->get_where($this->table_name, array('id' => $id))->row();
        // return $query;
    }

    public function get_post_by_slug($slug)
    {
        // $query = $this->db->select($this->table_name . '.*');
        // $query = $this->db->select('div.nama_divisi as nama_divisi');
        // $query = $this->db->from($this->table_name);
        // $query = $this->db->join('divisi_proker as div', $this->table_name . '.id_divisi_proker=div.id', 'INNER');
        $query = $this->db->query("SELECT * FROM isi_proker WHERE post_slug='$slug'");
        return $query;
    }
}
