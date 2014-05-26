<?php
	
	class Project extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('project_model');
			$this->load->model('company_model');
			$this->load->model('user_model');

		}
		public function new_project(){
			

			$data['companies']=$this->company_model->get_companies();
			$data['consultants']=$this->user_model->get_consultants();
			$data['project_status']=$this->project_model->get_active_project_status();

			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('projectName', 'Project Name', 'trim|required|xss_clean|is_unique[T_PRJ.name]');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('assignCompany','Assign Company','required');
			$this->form_validation->set_rules('assignConsultant','Assign Consultant','required');

			//$this->form_validation->set_rules('surname', 'Password', 'required');
			//$this->form_validation->set_rules('email', 'Email' ,'trim|required|valid_email');
			
			if ($this->form_validation->run() !== FALSE)
			{



				$project = array(
				'name'=>$this->input->post('projectName'),
				'description'=>$this->input->post('description'),
				'start_date'=>date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('datepicker')))), // mysql icin formatını ayarladık
				'status_id'=>$this->input->post('status'),
				'active'=>1 //default active:1 olarak kaydediyoruz.
				);
				$last_inserted_project_id = $this->project_model->create_project($project);

				$companies = array ($_POST['assignCompany']); // multiple select , secilen company'ler

				foreach ($companies[0] as $company) {
					$prj_cmpny=array(
						'prj_id' => $last_inserted_project_id,
						'cmpny_id' => $company
						);
					$this->project_model->insert_project_company($prj_cmpny);	 
				}

				$consultants = array ($_POST['assignConsultant']); // multiple select , secilen consultant'lar
				
				foreach ($consultants[0] as $consultant) {
					$prj_cnsltnt=array(
						'prj_id' => $last_inserted_project_id,
						'cnsltnt_id' => $consultant,
						'active' => 1
						);
					$this->project_model->insert_project_consultant($prj_cnsltnt);
				}


				redirect('okoldu', 'refresh');


			}


			$this->load->view('template/header');
			$this->load->view('project/create_project',$data);
			$this->load->view('template/footer');
		}
		public function contact_person(){
			$cmpny_id=$this->input->post('company_id'); // 1,2,3 şeklinde company id ler alındı
			$cmpny_id_arr = explode(",", $cmpny_id); // explode ile parse edildi. array icinde company id'ler tutuluyor.
			$user = array();

			
			foreach ($cmpny_id_arr as $cmpny_id) {
				$user[] = $this->user_model->get_company_users($cmpny_id); 
			}
			//foreach dongusu icinde tek tek company id'ler gonderilip ilgili user'lar bulunacak.
			//suanda sadece ilk company id ' yi alıp user ları donuyor.

			echo json_encode($user); // burada json arastirilabilir. 
		}


	}

?>