<?php

    require_once(__DIR__ ."/category.php");
    require_once(__DIR__ ."/../../../classes/form.php");

    class ArticleModel extends Model
    {
        
        public $template = "article.php";
        public $database;
        
        public $id;
        public $title;
        public $alias;
        public $category;
        public $content;
        public $published;
        public $publish_time;
        public $start_publishing;
        public $stop_publishing;
        public $author;
        public $hits;
        public $meta_description;
        public $tags;
        public $form;
        
        public function __construct($id = 0, $database)
        {
            $this->database = $database;
            if ($id > 0)
            {
                $this->load($id);
            }
            $this->form = new Form(__DIR__ ."/../forms/article.xml", $this, $this->database);
        }
        
        public function load($id)
        {
            $temp = $this->database->loadObject("SELECT * FROM #__articles WHERE id = ?", array($id));
            $this->id = $temp->id;
            $this->title = $temp->title;
            $this->alias = $temp->alias;
            $this->content = $temp->content;
            $this->published = $temp->published;
            $this->publish_time = $temp->publish_time;
            $this->start_publishing = $temp->start_publishing;
            $this->stop_publishing = $temp->stop_publishing;
            $this->hits = $temp->hits;
            $this->meta_description = $temp->meta_description;
            $this->tags = $temp->tags;
            $this->category = new CategoryModel($temp->category_id, $this->database, false);
            $this->author = new UserModel($temp->author_id, $this->database);
        }
        
        public function store($table = "", $data = array())
		{
			$data = array();
			$data[] = array("name" => "id", "value" => $this->id);
			$data[] = array("name" => "title", "value" => $this->title);
            $data[] = array("name" => "alias", "value" => $this->alias);
            $data[] = array("name" => "content", "value" => $this->content);
            $data[] = array("name" => "published", "value" => $this->published);
            $data[] = array("name" => "publish_time", "value" => $this->publish_time);
            $data[] = array("name" => "start_publishing", "value" => $this->start_publishing);
            $data[] = array("name" => "stop_publishing", "value" => $this->stop_publishing);
            $data[] = array("name" => "hits", "value" => $this->hits);
            $data[] = array("name" => "meta_description", "value" => $this->meta_description);
            $data[] = array("name" => "tags", "value" => $this->tags);
            $data[] = array("name" => "category_id", "value" => $this->category_id);
            $data[] = array("name" => "author_id", "value" => $this->author_id);
			return parent::store("#__articles", $data);
		}
        
    }

?>