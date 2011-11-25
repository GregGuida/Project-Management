<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
  public $layout = 'main';

  public function index() {
    redirect('/');
  }

  public function create($pid) {
    $this->load->model('Comment');

    $user = current_user();
    $remark = $this->input->post('message');

    $this->Comment->create($pid,$user['uid'],$remark);
    redirect('/products/show/'.$pid);
  }

  public function destroy($id) {
    $this->load->model('Comment');
    $comment = $this->Comment->get($id);
    $this->Comment->destroy($id);
    if ($this->input->get('ajax') == 'true'){
      return '{"status":"success"}';
    } else {
      redirect('/products/admin_show/'.$comment['pid']);
    }
    
  }

}
