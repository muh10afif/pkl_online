<?php
class Model_Bagian extends CI_Model{
    
    
    function tampilkan_data()
    {
        return $this->db->get('bagian');
    }
    

    function tampilkan_data_paging()
    {
        return $this->db->query("select * from bagian");
    }
    

    function post()
    {
        $data=array(
           'ID'          =>  $this->input->post('ID'),
           'nama_bagian' =>  $this->input->post('bagian')
                    );
        $this->db->insert('bagian',$data);
    }

    public function exist_row_check($field,$data){
        $this->db->where($field,$data);
        $this->db->from('bagian');
        $query = $this->db->get();
        return $query->num_rows();
    }

    # Fungsi menampilkan bagian
    public function tampil_cmb_bagian(){
      $sql   = "SELECT * FROM bagian";
      $query = $this->db->query($sql);
      return $query->result();
    }
    
    
    function edit()
    {
        $data=array(
            'bagian_id' =>  $this->input->post('idbagian'),
           'ID'          =>  $this->input->post('ID'),
           'nama_bagian' =>  $this->input->post('bagian')
                    );

        $this->db->where('bagian_id',$this->input->post('idbagian'));
        $this->db->update('bagian',$data);
    }
    

    function get_one($id)
    {
        $param  =   array('bagian_id'=>$id);

        return $this->db->get_where('bagian',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('bagian_id',$id);
        $this->db->delete('bagian');
    }


    function laporan_bagian()
    {
        $query="SELECT * FROM bagian";

        return $this->db->query($query);
    }


    function tampil_laporan(){
    $query = $this->db->query("SELECT * FROM bagian
                ");
            $bagian = $query->result();
            $data = ['bagian'=>$bagian];
            $this->load->view("bagian/report_view",$data);
    }
    
}