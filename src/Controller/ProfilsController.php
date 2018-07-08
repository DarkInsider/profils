<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profils Controller
 *
 * @property \App\Model\Table\ProfilsTable $Profils
 *
 * @method \App\Model\Entity\profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfilsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $profils = $this->paginate($this->Profils);

        $this->set(compact('profils'));
    }

    /**
     * View method
     *
     * @param string|null $id profile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		
		$this->loadModel('Links');
		 
		
		
        $profile = $this->Profils->get($id, [
            'contain' => []
        ]);

        $this->set('profile', $profile);
		$links = $this->Links->find()
		 ->select(['link'])
				->where(['profil_id' => $profile->id]);
		$this->set('links', $links);
    }
	public function query($id = null)
    {
		 $query = $_POST['country_id'];
		
		 		$this->loadModel('Countries');
				 $countries = $this->Countries->find()
				 ->select(['id'])
				->where(['country' => $query]);
				 
        $this->loadModel('Cities');
		  $cities = $this->Cities->find()
			->select(['city'])
			->where(['country_code' => $countries ]);
			
			 $this->set('cities', $cities);

			
    }
	
	  public function viewMod($id = null)
    {
       $this->loadModel('Links');
		 
		
		
        $profile = $this->Profils->get($id, [
            'contain' => []
        ]);

        $this->set('profile', $profile);
		$links = $this->Links->find()
		 ->select(['link'])
				->where(['profil_id' => $profile->id]);
		$this->set('links', $links);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		
		$this->loadModel('Countries');
		  $countries = $this->Countries->find('all');
			$this->set(compact('countries'));
		 
		 
		
        $profile = $this->Profils->newEntity();
        if ($this->request->is('post')) {
            $profile = $this->Profils->patchEntity($profile, $this->request->getData());
			$pth="/var/www/html/labs/cake/myPj/webroot/img/";
			$fp = $profile->photodd['name'].rand(10,1000000)."bin";
			move_uploaded_file($profile->photodd['tmp_name'], $pth.$fp);
			$profile->photo=$fp;
            if ($this->Profils->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $this->set(compact('profile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profils->get($id, [
            'contain' => []
        ]);
		
		$this->loadModel('Links');
		
		$links = $this->Links->find()
		 ->select(['link','id'])
				->where(['profil_id' => $profile->id]);
		$this->set('links', $links);
		
		
		$this->loadModel('Countries');
		  $countries = $this->Countries->find('all');	
			$selcountry=$profile->country;
			
			$this->set(compact('selcountry'));
			$this->set(compact('countries'));
			
			
			
			
			 $country_id = $this->Countries->find()
				 ->select(['id'])
				->where(['country' => $selcountry]);
				 
        $this->loadModel('Cities');
		  $cities = $this->Cities->find()
			->select(['city'])
			->where(['country_code' => $country_id ]);
			
			 $this->set('cities', $cities);
			
			
	
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			
			
			
			
            $profile = $this->Profils->patchEntity($profile, $this->request->getData());	
			
			
			
			
			$pth="/var/www/html/labs/cake/myPj/webroot/img/";
			$fp=$profile->photo;
			if(!$fp)
				$fp = $profile->photodd['name'].rand(10,1000000)."bin";
			if($profile->photodd['tmp_name'])
			
			move_uploaded_file($profile->photodd['tmp_name'], $pth.$fp);
			$profile->photo=$fp;
			
			
			
			
            if ($this->Profils->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $this->set(compact('profile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profils->get($id);
        if ($this->Profils->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
		 public function deleteL($id = null, $idd=null)
    {
        $this->request->allowMethod(['post', 'delete']);
		
		$this->loadModel('Links');
        $links = $this->Links->get($id);
        if ($this->Links->delete($links)) {
            $this->Flash->success(__('The links has been deleted.'));
        } else {
            $this->Flash->error(__('The links could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'edit/'.$idd]);
    }
}
