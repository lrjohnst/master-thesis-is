<?php
	class Resource
	{
		public $id;
		public $post;
		public $authors;
		public $journal;
		public $search_engine;
		public $tags;
		public $meta;
		public $title;
		
		
		public function __construct($id) {
			
			if($this->is_resource($id)) {
				$this->id = $id;
				$this->post = get_post($id);
				$this->authors = get_the_terms($this->id, 'authors'); // Authors
				$this->tags = get_the_tags(); // Tags (topics)
				$this->journal = get_the_terms($this->id, 'journals'); // Journal
				$this->search_engine = get_the_terms($this->id, 'search_engines'); // Search Engine
				$this->meta = get_post_meta($this->id, null, true);
				$this->title = get_the_title();
			}		
		}
		
		
		
		
		
		public function is_resource($id) {
			if(get_post_type($id) == 'source') {
				return true;
			} else {
				return false;
			}
		}
		
		
		public function serialize_authors() {
			$list = "";
			if(is_array($this->authors)) {
				$i = 0;
				foreach($this->authors as $author) {
					if($i == count($this->authors)-1 && count($this->authors) != 1) {
						$list .= "and ";
					}
					$list .= $author->name . ", ";
					$i++;
				}
				$list = substr($list, 0, -2);
				return $list;
			}
			return $list;
		}
		
		
		public function get_journal() {
			if($this->journal) {
				return $this->journal[0]->name;
			} else {
				return false;
			}
		}
		
		
		public function get_search_engine() {
			if($this->search_engine) {
				return $this->search_engine[0]->name;
			} else {
				return false;
			}
		}
		
		
		public function get_reference() {
			$reference .= $this->serialize_authors() . ". " . $this->meta['year_published'][0] . ". " . $this->title . ". ";
			return $reference;
		}
	}