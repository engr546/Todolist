<?php 


	/**
	 * Pages Controller
	 */
	class Pages extends Controller
	{


		public function __construct()
		{
			$this->postModel = $this->model('Post');
		}


		public function index()
		{
			// Get Post
			$posts = $this->postModel->getPosts();
			// Init Data
			$data = [
				'posts' => $posts, 
				'title' => '',
				'body' => '',
				'title_error' => '',
				'body_error' => '',
			];
			// Load view
			$this->view('pages/index', $data);			
		} // index



		public function add()
		{
			// Check for post
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// PROCESS FORM
				// Sanitze Post Data				
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				// Get Post
				$posts = $this->postModel->getPosts();
				// Init Data
				$data = [
					'posts' => $posts,
					'title' => trim($_POST['title']),
					'body' => trim($_POST['body']),
					'title_error' => '',
					'body_error' => '',
				];
				// VALIDATE DATA
				// Validate Title
				if (empty($data['title'])) {
					$data['title_error'] = "Please Enter Title";
				}
				// Validate Body 
				if (empty($data['body'])) {
					$data['body_error'] = "Please Enter Post";
				}
				// Make sure errors are empty
				if (empty($data['title_error']) && empty($data['body_error'])) {
					// ADD TODO
					if ($this->postModel->addPost($data)) {
						// ADD TODO SUCCESSFULY
						// Session Helper
						flash('todo_message', 'Todo Added');
						// URL Helper
						redirect('pages/index'); 
					} else {
						die('Something went wrong');
					}
				} else {
					// Load view with erros
					$this->view('pages/index', $data);
				}

			} else {
				// Get Post
				$posts = $this->postModel->getPosts();
				// Init Data - Inorder for the user to not re-fill the form
				$data = [
					'posts' => $posts, 
					'title' => '',
					'body' => '',
					'title_error' => '',
					'body_error' => '',
				];
				// Load view
				$this->view('pages/index', $data);
			}

		} // add


		public function edit($id)
		{
			// Check for Post
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// PROCESS FORM				
				// Sanitize Post Data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				// Init Data
				$data = [
					'id' => $id,
					'title' => trim($_POST['title']),
					'body' => trim($_POST['body']),
					'title_error' => '',
					'body_error' => '',
				];
				// VALIDATE DATA
				// Validate Title
				if (empty($data['title'])) {
					$data['title_error'] = "Please Enter Title";
				}
				// Validate Body 
				if (empty($data['body'])) {
					$data['body_error'] = "Please Enter Post";
				}
				// Make sure errors are empty
				if (empty($data['title_error']) && empty($data['body_error'])) {
					// ADD TODO
					if ($this->postModel->updatePost($data)) {
						// UPDATED TODO SUCCESSFULLY
						// Session Helper
						flash('todo_message', 'Updated Todo');
						// // URL Helper
						redirect('pages/index'); 
					} else {
						die('Something went wrong');
					}
				} else {
					// Load view with erros
					$this->view('pages/edit', $data);
				}
			} else {
				// Get current post
				$post = $this->postModel->getPostById($id);
				// Init Data 			
				$data = [
					'id' => $id,
					'title' => $post->title,
					'body' => $post->body,
				];
				// Laod view
				$this->view('pages/edit', $data);
			}
		} // edit

		public function delete($id)
		{
			// Check for Post
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($this->postModel->deletePost($id)) {
					// DELETE TODO SUCCESSFULY
					// Session Helper
					flash('todo_message', ' Todo Deleted', 'alert-danger');
					// URL Helper
					redirect('pages/index'); 
				}else {
					die('Something went wrong');
				}
			} else {
				// URL Helper
				redirect('pages/index');
			}
		} // delete()

		public function about()
		{
			$data = [
				'title' => 'ABOUT US',
				'description' => 'App to create your own todo list',				
			];
			// Laod view
			$this->view('pages/about', $data);
		} // about

	} // Pages

 ?>