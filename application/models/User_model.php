<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Africa/Lagos'); // set the default timezone to Nigeria
  }
  
  public function show_error($e) {
    $data['error_msg'] = $e->getMessage();
    $this->load->view('error', $data);
  }

	public function create_new_staff($userData) {
	  $data['othernames'] = ucwords(strtolower($userData['othernames']));
    $data['surname'] = ucwords(strtolower($userData['surname']));
    $data['username'] = strtolower($userData['username']);
    $data['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
    $data['last_login_time'] = date('Y-m-d H:i:s');

    try {
      $new_user = $this->db->insert('user', $data);

      if ($new_user) {
        return TRUE;
      }
    } catch (Exception $e) {
      $this->show_error($e);
    }
  }

  public function delete_staff($username) {

    $username = $username;
    $where_clause = ['username' => $username];

    try {
      $delete_stf = $this->db->delete('user', $where_clause);
      return $delete_stf;
    } catch (Exception $e) {
      $this->show_error($e);
    }   
  }

  public function delete_user($patient_id) {
    try { 
      $patient_id = $patient_id;
      $where_clause = ['patient_id' => $patient_id];
      $delete_pat = $this->db->delete('patient_biodata', $where_clause);
      return $delete_pat;
    } catch (Exception $e) {
      $this->show_error();
    }
  }

  public function edit_staff($userData) {
	  try {
      $data['othernames'] = ucwords(strtolower($userData['othernames']));
      $data['surname'] = ucwords(strtolower($userData['surname']));
      $username = $this->session->userdata('username');

      $edit_user = $this->db->where(['username' => $username])->update('user', $data);

      if ($edit_user) {
        return TRUE;
      } 
    } catch (Exception $e) {
      $this->show_error();
    }
	  return FALSE;
  }

  public function verify_password($username, $old_password) {
   	$hash = $this->get_hashed_password($username);

   	if ($hash !== NULL) {
	   	if (password_verify($old_password, $hash)) {
	   		return TRUE;
	   	}
	  }
    return FALSE; 
	}

 	public function get_hashed_password($username) {
	  try {
      $where_clause = ['username' => $username];
      $password = $this->db->get_where('user', $where_clause)->result();
    
      foreach ($password as $hash) {
        return $hash->password;
      }
    } catch (Exception $e) {
      $this->show_error();
    }	
	}

  public function create_new_patient($userData) {
    try {
      $new_patient = $this->db->insert('patient_biodata', $userData);

      if ($new_patient) {
        return TRUE;
      }
    } catch (Exception $e) {
      $this->show_error();
    }
	  return FALSE;
  }

  public function get_patient($patientID) {   
    try {
      $where_clause = ['id' => $patientID];
      $patient_details = $this->db->get_where('patient_biodata', $where_clause)->result();
    
      if (count($patient_details) == 1 && $patient_details !== NULL && is_array($patient_details)) {
        return $patient_details;
      }
    } catch (Exception $e) {
      $this->show_error();
    }

   	return NULL;
  }

  public function get_all_patient() {   
    try {
      $patient_details = $this->db->from('patient_biodata')->get()->result();
    
      if (count($patient_details) > 0) {
        return $patient_details;
      }
    } catch (Exception $e) {
      $this->show_error();
    }

   	return NULL;
 	}

  public function insert_patient_report($remark = NULL)
  {
    $patient_record = [ 
      'patient_biodata_id' => $this->input->post('patient'),
      'swollen_lymph_node' => $this->input->post('lymph_nodes'),
      'breast_abnormal' => $this->input->post('abnormal_breast'),
      'rale_breath' => $this->input->post('rale_breath'),
      'cough' => $this->input->post('cough'),
      'hemoptysis' => $this->input->post('hemoptysis'),
      'chest_pain' => $this->input->post('chest_pain'),
      'fever' => $this->input->post('fever'),
      'weight_loss' => $this->input->post('weight'),
      'night_sweat' => $this->input->post('night_sweats'),
      'lost_appetite' => $this->input->post('appetite'),
      'fatigue' => $this->input->post('fatigue'),
      'hiv' => $this->input->post('hiv'),
      'chest_radiography' => $this->input->post('radiography'),
      'tuberculin_skin_test' => $this->input->post('skin_test'),
      'blood_test' => $this->input->post('blood_test'),
      'remark' => $remark,
      'date' => date('Y-m-d H:i:s')
    ];

    $this->db->insert('diagnosis_report', $patient_record);   
    
    return $this->db->limit(1)->get_where('diagnosis_report', ['id' => $this->db->insert_id()])->row()->patient_biodata_id;
  }

  public function get_patient_report($id)
  {
    return $this->db->order_by('id', 'desc')->where(['patient_biodata_id' => $id])->get('diagnosis_report')->row();
  }

  public function get_diagnosis_msg($id) 
  {
    $report_id = (int) $id;
    return $this->db->where(['report_id' => $report_id])->get('report_msg')->row()->msg;
  }

  public function get_patient_names($id)
  {
    return $this->db->where(['patient_id' => $id])->get('patient_biodata')->row()->surname . ' ' . $this->db->where(['patient_id' => $id])->get('patient_biodata')->row()->othernames;
  }

 	public function get_all_staff() {
    try {
      $staff_details = $this->db->from('user')->get()->result();
    
      if (count($staff_details) >= 1 && $staff_details !== NULL && is_array($staff_details)) {
        return $staff_details;
      }
    } catch (Exception $e) {
      $tis->show_error();
    }	

   	return NULL;
 	}

  public function get_staff($username) {  
    try {
      $staff_detail = $this->db->get_where('user', ['username' => $username])->result();
    
      if (count($staff_detail) == 1 && $staff_detail !== NULL && is_array($staff_detail)) {
        return $staff_detail;
      }
    } catch (Exception $e) {
      $this->show_error();
    } 
   	return NULL;
 	}


  public function get_password($username) {
    try {
      $where_clause = ['username' => $username];
      $password = $this->db->get_where('user', $where_clause)->result()->password;
    
      if (count($password) == 1 && $password !== NULL) {
        return $password;
      }
    } catch (Exception $e) {
      $this->show_error();
    }

   	return NULL;
  }

  public function update_password($username, $old_password, $new_password) {
    try {
      $where_clause = ['username' => $username];
      $data_to_update = ['password' => password_hash($new_password, PASSWORD_DEFAULT)];

      $verify = $this->verify_password($username, $old_password);

      if ($verify) {
        $result = $this->db->where($where_clause)->update('user', $data_to_update);

        if ($result) {
          return TRUE;
        }
      }
    } catch (Exception $e) {
      $this->show_error();
    }

    return FALSE;
	}

	public function update_profile($username, $surname, $othername) {
    try {
      $where_clause = ['username' => $email];
      $data_to_update = ['surname' => $surname, 'othername' => $othername];

      $result = $this->db->where($where_clause)->update('user', $data_to_update);
      $user_data = ['surname' => $surname, 'othername' => $othername, 'fullname' => $othername. " " .$surname];
      $this->session->set_userdata($user_data);
      return $result;
    } catch (Excetion $e) {
      $this->show_error();
    }
	}
	
	public function get_total_users() {
    try {
      $result = $this->db->from('user')->get()->result();
      return count($result);
    } catch (Exception $e) {
      $this->show_error();
    }
	}

	public function get_total_patients() {
    try {
      $result = $this->db->from('patient_biodata')->get()->result();
      return count($result);
    } catch (Exception $e) {
      $this->show_error();
    }
	}

}
