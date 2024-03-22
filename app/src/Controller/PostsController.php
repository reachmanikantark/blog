<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index','view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate['limit'] = 10;
        $query = $this->Posts->find()
            ->contain(['Users']);
       
        $posts = $this->paginate($query);

        $this->set(compact('posts'));
    }

    public function list()
    {
        $user_id=$this->request->getAttribute('identity')->getIdentifier();
        $this->paginate['limit'] = 10;
        $query = $this->Posts->find()->where(['Posts.user_id' => $user_id])
            ->contain(['Users']);       
        $posts = $this->paginate($query);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $post = $this->Posts->get($id, contain: ['Users']);
           
            if (!$post) {
                $this->Flash->error('Post not found.');
                if($this->request->getAttribute('identity')){
                    return $this->redirect(['action' => 'list']);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
               
            }
            $this->set(compact('post'));
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
                // If record not found, display custom error message and redirect
                $this->Flash->error('Post not found.');
                if($this->request->getAttribute('identity')){
                    return $this->redirect(['action' => 'list']);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            //debug($this->request->getData());
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if($post->user_id==null){
                $post->user_id =$this->request->getAttribute('identity')->getIdentifier();  
            }
            
           // $post->imgpath='';
            $image = $this->request->getData('imgpath');
            $post->imgpath = '';
            if ($image) {
                $targetPath = WWW_ROOT . 'img/uploads/' . $image->getClientFilename();
                $image->moveTo($targetPath);
                $post->imgpath = 'img/uploads/' . $image->getClientFilename();
            }
 
            if ($this->Posts->save($post)) {  
                //debug('post entering');
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
    //    debug('entering');
        $users = $this->Posts->Users->find('list', limit: 200)->all();
        $this->set(compact('post', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, contain: []);
        if (!$post) {
            $this->Flash->error('Post not found.');
            return $this->redirect($this->referer());
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
             $image = $this->request->getData('imgpath');
            $post->imgpath = '';
            if ($image) {
                $targetPath = WWW_ROOT . 'img/uploads/' . $image->getClientFilename();
                $image->moveTo($targetPath);
                $post->imgpath = 'img/uploads/' . $image->getClientFilename();
            }
           // debug($post);
            //exit;
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', limit: 200)->all();
        $this->set(compact('post', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if (!$post) {
            $this->Flash->error('Post not found.');
            if($this->request->getAttribute('identity')){
                return $this->redirect(['action' => 'list']);
            } else {
                return $this->redirect(['action' => 'index']);
            }
           
        }
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
