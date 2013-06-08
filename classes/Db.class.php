<?php
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "sebbbe_rwm";
		private $m_sPassword = "rwm123";
		private $m_sDatabase = "sebbbe_rwm";
		public $mysqli;
		
		public function __construct()
		{
			$this->mysqli = @new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
			
			// FOUTAFHANDELING: VIA EXCEPTION
		}
	}
?>