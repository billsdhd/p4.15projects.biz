<?php

class posts_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	Construct
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			die("Members only");
		}
		
	} 
	
	 
	/*-------------------------------------------------------------------------------------------------
	Display a new post form
	-------------------------------------------------------------------------------------------------*/
	public function add() {
		
		# Set the view
		$this->template->content = View::instance("v_posts_add");
        $this->template->title   = "Add post";

		# Render the view
		echo $this->template;
		
	}	
	
	
	/*-------------------------------------------------------------------------------------------------
	Process new posts
	-------------------------------------------------------------------------------------------------*/
	public function p_add() {
		
		# Setup the data
		$_POST['user_id']  = $this->user->user_id;
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		# Run the SQL
		DB::instance(DB_NAME)->insert('posts',$_POST);
		
		# Redirect to view the posts
		Router::redirect('/posts/');
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	View all posts
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Only logged in users are allowed...
		if(!$this->user) {
			die('Members only. <a href="/users/login">Login</a>');
		};
		
		# Set up view
		$this->template->content = View::instance('v_posts_index');
        $this->template->title   = "Recent Diaries";
		
		# Set up query
        $q = "SELECT 	*
            FROM posts
            WHERE user_id = ".$this->user->user_id.' ORDER BY posts.created DESC' ;

 		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
        # Send to the view
        $this->template->content->posts       = $posts;

        # Render template
        echo $this->template;
		
	}

	
	
	/*-------------------------------------------------------------------------------------------------
	Show list of the users and let the user to follow or un-follow
	-------------------------------------------------------------------------------------------------*/
	public function users() {
		
		# Set up view
		$this->template->content = View::instance("v_posts_users");
        $this->template->title   = "Follow Users ";
        
		# Set up query to get all users
		$q = 'SELECT *
			FROM users'.' ORDER BY first_name, last_name';
			
		# Run query
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Set up query to get all connections from users_users table
		$q = 'SELECT *
			FROM users_users
			WHERE user_id = '.$this->user->user_id;
			
		# Run query
		$connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');
		
		# Pass data to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;
		
		# Render view
		echo $this->template;
		
	}
	
	

	

	/*-------------------------------------------------------------------------------------------------
	Edits a post
	-------------------------------------------------------------------------------------------------*/
	public function edit($post_id) {

        # Setup the view
        $this->template->content = View::instance('v_posts_edit');
        $this->template->title   = "Edit Post";


        # Build the query
        $q = "SELECT *
            FROM posts
            WHERE post_id = ".$post_id;

        # Execute the query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass it to the view
        $this->template->content->posts       = $posts;


        # Render template
        echo $this->template;

    }
	/*-------------------------------------------------------------------------------------------------
	Edits a view
	-------------------------------------------------------------------------------------------------*/
	public function view($post_id) {

        # Setup the view
        $this->template->content = View::instance('v_posts_view');
        $this->template->title   = "View a Post";


        # Build the query
        $q = "SELECT *
            FROM posts
            WHERE post_id = ".$post_id;

        # Execute the query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass it to the view
        $this->template->content->posts       = $posts;


        # Render template
        echo $this->template;

    }

	/*-------------------------------------------------------------------------------------------------
	Process edit
	-------------------------------------------------------------------------------------------------*/
	public function p_edit($post_id) {

        # update the modified field
		$_POST['modified'] = Time::now();

		# Send the $_POST data into the database, at the row corresponding with post_id (test post_id is 38)
        DB::instance(DB_NAME)->update("posts", $_POST, "WHERE post_id = ".$post_id);
        
		# Send them back
        Router::redirect("/users/myposts");
       
	}

	/*-------------------------------------------------------------------------------------------------
	Process delete
	-------------------------------------------------------------------------------------------------*/
    public function p_delete($post_id) {

        # Query the DB using post_id param
        $q = "WHERE post_id = ".$post_id;

        # Run the delete query
        DB::instance(DB_NAME)->delete('posts', $q);
        
        # Send them back
        Router::redirect("/posts");
    }

} # eoc