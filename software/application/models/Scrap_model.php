<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scrap_model extends CI_Model {

	//Datatable start
	var $table = 'db_scrap as a';
	var $column_order = array('a.id','a.scrap_date','b.category_name','a.scrap_qty','a.scrap_for','a.scrap_amt','a.note','a.created_by'); //set column field database for datatable orderable
	var $column_search = array('a.id','a.scrap_date','b.category_name','a.scrap_qty','a.scrap_for','a.scrap_amt','a.note','a.created_by'); //set column field database for datatable searchable 
	var $order = array('a.id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$this->db->from('db_scrap_category as b');
		$this->db->select($this->column_search)->where('b.id=a.category_id');
		//echo $this->db->get_compiled_select();exit();
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//Datatable end

	//Save Cutomers
	public function verify_and_save(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		
		$qs5="select scrap_init from db_company";
		$q5=$this->db->query($qs5);
		$scrap_init=$q5->row()->scrap_init;

		//Create scraps unique Number
		$qs4="select coalesce(max(id),0)+1 as maxid from db_scrap";
		$q1=$this->db->query($qs4);
		$maxid=$q1->row()->maxid;
		$scrap_code=$scrap_init.str_pad($maxid, 4, '0', STR_PAD_LEFT);
		//end

		$query1="insert into db_scrap(scrap_code,category_id,scrap_for,scrap_amt,scrap_qty,note,created_date,created_time,created_by,status,system_ip,system_name,scrap_date)
						values('$scrap_code','$category_id','$scrap_for','$scrap_amt','$scrap_qty','$note','$CUR_DATE','$CUR_TIME','$CUR_USERNAME',1,'$SYSTEM_IP','$SYSTEM_NAME','".date("Y-m-d",strtotime($scrap_date))."')";

		if ($this->db->simple_query($query1)){
			    $this->session->set_flashdata('success', 'Success!! Record Added Successfully!');
		        return "success";
		}
		else{
		        return "failed";
		}
		
	}

	//Get scraps_details
	public function get_details($id,$data){
		//Validate This scraps already exist or not
		$query=$this->db->query("select * from db_scrap where upper(id)=upper('$id')");
		if($query->num_rows()==0){
			show_404();exit;
		}
		else{
			$query=$query->row();
			$data['q_id']=$query->id;
			$data['scrap_code']=$query->scrap_code;			
			$data['scrap_date']=show_date($query->scrap_date);
			$data['category_id']=$query->category_id;
			$data['scrap_qty']=$query->scrap_qty;
			$data['scrap_for']=$query->scrap_for;
			$data['scrap_amt']=$query->scrap_amt;
			$data['note']=$query->note;
			return $data;
		}
	}
	public function update_scrap(){
		//Filtering XSS and html escape from user inputs 
		extract($this->security->xss_clean(html_escape(array_merge($this->data,$_POST))));
		
		$query1="update db_scrap set category_id='$category_id',scrap_date='".date("Y-m-d",strtotime($scrap_date))."',scrap_qty='$scrap_qty',scrap_for='$scrap_for',scrap_amt='$scrap_amt',note='$note' where id=$q_id";
		if ($this->db->simple_query($query1)){
				$this->session->set_flashdata('success', 'Success!! Record Updated Successfully!');
		        return "success";
		}
		else{
		        return "failed";
		}
		
	}
	public function update_status($id,$status){
		
        $query1="update db_scrap set status='$status' where id=$id";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
	
	public function check_table_data($table_name,$field,$value){
		return $this->db->query("select count(*) as tot_count from db_scrap where $field='$value'")->row()->tot_count;
	}
	
	public function delete_scraps_from_table($ids){
        $query1="delete from db_scrap where id in(".$ids.")";
        if ($this->db->simple_query($query1)){
            echo "success";
        }
        else{
            echo "failed";
        }
	}
}
