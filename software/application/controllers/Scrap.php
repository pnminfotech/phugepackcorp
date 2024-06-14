<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scrap extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('scrap_model','scrap');
		$this->load->model('scrap_category_model','category');
	}
	/* ######################################## Scrap START ############################# */
	public function index()
	{
		$this->permission_check('scrap_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('scrap_list');
		$this->load->view('scrap-list',$data);
	}
	public function add()
	{
		$this->permission_check('scrap_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('scrap');
		$this->load->view('scrap',$data);
	}
	
	
	public function newscrap(){
		$this->form_validation->set_rules('scrap_date', 'Scrap Date', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('scrap_amt', 'Scrap Amount', 'trim|required');
		$this->form_validation->set_rules('scrap_for', 'Scrap for', 'trim|required');

		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->scrap->verify_and_save();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	public function update($id){
		$this->permission_check('scrap_edit');
		$data=$this->data;
		$result=$this->scrap->get_details($id,$data);
		$data=array_merge($data,$result);
		$this->load->view('scrap', $data);
	}
	public function update_scrap(){
		$this->form_validation->set_rules('scrap_date', 'Scrap Date', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('scrap_amt', 'Scrap Amount', 'trim|required');
		$this->form_validation->set_rules('scrap_for', 'Scrap for', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->scrap->update_scrap();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}

	public function ajax_list()
	{
		$list = $this->scrap->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $scrap) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$scrap->id.' class="checkbox column_checkbox" >';
			$row[] = show_date($scrap->scrap_date);
			$row[] = $scrap->category_name;
			$row[] = $scrap->scrap_qty;
			$row[] = $scrap->scrap_for;
			$row[] = app_number_format($scrap->scrap_amt);
			$row[] = $scrap->note;			
			$row[] = ucfirst($scrap->created_by);			
				     $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('scrap_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="scrap/update/'.$scrap->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('scrap_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_scrap('.$scrap->id.')">
													<i class="fa fa-fw fa-trash text-red"></i>Delete
												</a>
											</li>
											
										</ul>
									</div>';			
			$row[] = $str2;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->scrap->count_all(),
						"recordsFiltered" => $this->scrap->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function update_status(){
		$this->permission_check_with_msg('scrap_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		return $this->scrap->update_status($id,$status);
		
	}
	public function delete_scrap(){
		$this->permission_check_with_msg('scrap_delete');
		$id=$this->input->post('q_id');
		return $this->scrap->delete_scrap_from_table($id);
	}
	public function multi_delete_scrap(){
		$this->permission_check_with_msg('scrap_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->scrap->delete_scrap_from_table($ids);
	}
	
	/* ######################################## Scrap END ############################# */





	/* ######################################## Scrap CATEGORY START ############################# */
	public function category()
	{	
		$this->permission_check('scrap_category_view');
		$data=$this->data;
		$data['page_title']=$this->lang->line('scrap_category_list');
		$this->load->view('scrap-category-list',$data);
	}
	public function category_add()
	{
		$this->permission_check('scrap_category_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('scrap_category');
		$this->load->view('scrap-category',$data);
	}
	public function newcategory(){
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('scrap_category_model');
			$result=$this->scrap_category_model->verify_and_save();
			echo $result;
		} else {
			echo "Please Enter Category name.";
		}
	}
	public function ajax_list_scrap()
	{
		
		$list = $this->category->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $category) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]" value='.$category->id.' class="checkbox column_checkbox" >';
			$row[] = $category->category_name;
			$row[] = $category->description;

			 		if($category->status==1){ 
			 			$str= "<span onclick='update_status(".$category->id.",0)' id='span_".$category->id."'  class='label label-success' style='cursor:pointer'>Active </span>";}
					else{ 
						$str = "<span onclick='update_status(".$category->id.",1)' id='span_".$category->id."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";
					}
			$row[] = $str;			
					 $str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('scrap_category_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="scrap_update/'.$category->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

											if($this->permissions('scrap_category_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_category('.$category->id.')">
													<i class="fa fa-fw fa-trash text-red"></i>Delete
												</a>
											</li>
											
										</ul>
									</div>';			

			$row[] = $str2;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->category->count_all(),
						"recordsFiltered" => $this->category->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function scrap_update($id){
		$this->permission_check_with_msg('scrap_category_edit');
		$data=$this->data;		
		$result=$this->category->get_details($id,$data);
		$data=array_merge($data,$result);
		$data['page_title']=$this->lang->line('scrap_category');
		$this->load->view('scrap-category', $data);
	}
	public function update_category(){
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('q_id', '', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result=$this->category->update_category();
			echo $result;
		} else {
			echo "Please Enter Category name.";
		}
	}

	public function scrap_update_status(){
		$this->permission_check_with_msg('scrap_category_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		return $this->category->update_status($id,$status);
		
	}
	public function delete_category(){
		$this->permission_check_with_msg('scrap_category_delete');
		$id=$this->input->post('q_id');
		return $this->category->delete_categories_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('scrap_category_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->category->delete_categories_from_table($ids);
	}
	/* ######################################## Scrap CATEGORY END############################# */

}
