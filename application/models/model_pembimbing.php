<?php
class model_pembimbing extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT b.NIP,
                        b.nama_pembimbing,
                        bg.nama_bagian
                FROM pembimbing as b,
                     bagian as bg
                WHERE 
                b.bagian_id = bg.bagian_id";
        return $this->db->query($query);
    }
    
    function tampilkan_data(){
        
        return $this->db->get('pembimbing');
    }

    function tampil_data_paging()
    {
        $query= "SELECT b.NIP,b.nama_pembimbing,bg.nama_bagian
                FROM pembimbing as b,bagian as bg
                WHERE b.bagian_id=bg.bagian_id";
                
        return $this->db->query($query);
    }

    # Fungsi menampilkan pembimbing
    public function tampil_cmb_pembimbing(){
      $sql = "select * from pembimbing";
      $query = $this->db->query($sql);
      return $query->result();
    }
    

    function post($data)
    {
        $this->db->insert('pembimbing',$data);
    }


    public function exist_row_check($field,$data){
        $this->db->where($field,$data);
        $this->db->from('pembimbing');
        $query = $this->db->get();
        return $query->num_rows();
    }
    

    function get_one($id)
    {
        $param  =   array('NIP'=>$id);
        return $this->db->get_where('pembimbing',$param);
    }
    

    function edit($data,$id)
    {
        $this->db->where('NIP',$id);
        $this->db->update('pembimbing',$data);
    }
    
    function delete($id)
    {
        $this->db->where('NIP',$id);
        $this->db->delete('pembimbing');
    }

    function laporan_pembimbing()
    {
        $query="SELECT
                  p.NIP,
                  p.nama_pembimbing,
                  b.nama_bagian
                FROM 
                  bagian b,
                  pembimbing p
                WHERE
                  b.bagian_id = p.bagian_id";

        return $this->db->query($query);
    }
    
}