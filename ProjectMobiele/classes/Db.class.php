<?php
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "root";
		private $m_sPassword = "";
		private $m_sDatabase = "marnixverhulst2013";
		public $mysqli;
		
		public function __construct()
		{
			$this->mysqli = @new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
			
			// FOUTAFHANDELING: VIA EXCEPTION
		}
	}
?>