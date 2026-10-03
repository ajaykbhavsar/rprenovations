<?php

class cms_fm extends CI_Model {
   
   function get_aboutus(){
      $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',1);
     $Q = $this->db->GET();
     return $Q->row_array();
   }
   
   function get_headercontact(){ 
 	  $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',2);
     $Q = $this->db->GET();
     return $Q->row_array();
    }
	
   function get_homevideo(){
      $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',3);
     $Q = $this->db->GET();
     return $Q->row_array();
   }
	
   function get_homeabout(){ 
 	  $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',4);
     $Q = $this->db->GET();
     return $Q->row_array();
    }
	
   function get_homecounter(){ 
 	  $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',5);
     $Q = $this->db->GET();
     return $Q->row_array();
    }

   function get_footercontact(){
      $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',6);
     $Q = $this->db->GET();
     return $Q->row_array();
   }
   
   function get_footercontent(){
      $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',7);
     $Q = $this->db->GET();
     return $Q->row_array();
   }
   
   function get_contactus(){
      $this->db->SELECT('*');
     $this->db->FROM('tbl_cms');
     $this->db->WHERE('id',8);
     $Q = $this->db->GET();
     return $Q->row_array();
   }
}
