<?php

class Slider_Model extends CI_Model
{
    public function Insert_record($tablename, $data)
    {
        $this->db->insert($tablename, $data);
    }

    public function fetch($tablename)
    {
        $query = $this->db->query("SELECT * from $tablename ");
        return $query->result();
    }

    public function fetch_with_condition($tablename,$where_column_name=0,$column_value)
    {
        $query = $this->db->query("SELECT * from $tablename where $where_column_name='$column_value'");
        return $query->result();
    }
    public function edit_slider_record($sliderdate,$startdate,$enddate,$type,$title,$detail,$img_name,$id)
    {
     $query = $this->db->query("UPDATE nqash_cms.tblsliders SET `SliderDate`='$sliderdate',`StartDate`='$startdate',`EndDate`='$enddate',`Detail`='$detail',`Title`='$title',`Type`='$type',`Image`='$img_name' WHERE SliderId='$id'");
     return true;
    }
    public function Delete_record($tablename, $columnname, $conditionvalue)
	{
		$this->db->where($columnname, $conditionvalue);
		$this->db->delete($tablename);
	}

   

   

    
}