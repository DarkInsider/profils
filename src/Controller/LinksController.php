<?php
namespace App\Controller;

use App\Controller\AppController;


class LinksController extends AppController
{
	
	
	 public function index($idd = null)
    {
		
		$links = $this->Links->find()
		 ->select(['link','id'])
				->where(['profil_id' => $idd]);
        $this->set(compact('links'));	
		$profile= $idd;
		 $this->set(compact('profile'));
    }
	
	 public function delete($id = null, $profile=null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $links = $this->Links->get($id);
        if ($this->Links->delete($links)) {
            
        } else {
            $this->Flash->error(__('The links could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index/'.$profile]);
    }
	public function add($profile=null)
    {
		
	//debug( $this->_POST);
		 $link = $this->Links->newEntity();
		
        if ($this->request->is('post')) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
				if($link->link)$link->profil_id=$profile;
			  if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index/'.$profile]);
            }
           // $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $this->set(compact('link'));
    }
	
}