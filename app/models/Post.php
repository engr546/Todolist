<?php 

	/**
	 * Post Model
	 */
	class Post
	{

		private $db;
		
		function __construct()
		{
			$this->db = new Database;
		} // __construct

		public function getPosts()
		{
			// Prepare Query
			$this->db->query('SELECT * FROM posts ORDER BY created_at ASC');
			// Fetch Data
			$result = $this->db->resultSet();
			return $result;
		}

		public function getPostById($id)
		{
			// Prepare Query
			$this->db->query('SELECT * FROM posts WHERE id = :id');
			// Bind Values
			$this->db->bind(':id', $id);
			// Fetch Data
			$result = $this->db->single();
			return $result;
		} // getPostById

		public function addPost($data)
		{
			// Prepare Query
			$this->db->query('INSERT INTO posts (title, body) VALUES (:title, :body) ');
			// Bind Values
			$this->db->bind(':title', $data['title']);
			$this->db->bind(':body', $data['body']);
			// Execute Prepared Statements
			if ($this->db->execute()) {
				return true;
			}else {
				return false;
			}
		} // addPost		

		public function updatePost($data){
			// Prepare Query
			$this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
			// Bind values
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':title', $data['title']);
			$this->db->bind(':body', $data['body']);
			// Execute
			if($this->db->execute()){
			return true;
			} else {
			return false;
			}
		} // updatePost

		public function deletePost($id)
		{
			// Prepare Query
			$this->db->query('DELETE FROM posts WHERE id = :id');
			// Bind Values
			$this->db->bind(':id', $id);
			// Execute Prepared Statements
			if ($this->db->execute()) {
				return true;
			}else {
				return false;
			}
		} // deletePost

	}
	

 ?>



















