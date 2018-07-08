<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class CitiesController extends AppController
    {
		public function index()
			{
				 $cities = $this->paginate($this->Cities);

				$this->set(compact('cities'));
			}
			
			
		public function add()
    {
		
		$this->loadModel('Countries');
		  $countries = $this->Countries->find('all');
			$this->set(compact('countries'));
		
        $city = $this->Cities->newEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
			//$city->country_code
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $this->set(compact('city'));
    }
	
	    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	
	
    }