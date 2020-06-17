<?php
class phpcoding{

	//Please define following variables
	private $hostname = '';
	private $port = '';
	private $username = '';
	private $password = '';

	private $sourceFilePath = '';
	private $remoteDestinationFilePath = '';

	/*
	* function connectUsingTelnet
	* @todo telnet connetion to the server
	*/
	publict function connectUsingTelnet()
	{
		// Excercise 2: 1.a Telenet to the Server
		$socket = fsockopen($this->hostname, $this->port); 
		if($socket){ 
		    echo "Connected <br /><br />"; 
		} 
		else{ 
		    echo "Connection failed!<br /><br />"; 
		} 

		fputs($socket, "help \r\n"); 
		$buffer = ""; 

		while(!feof($socket)){ 
		    $buffer .=fgets($socket, 4096); 
		} 

		echo "<br /><br /><br />"; 
		fclose($socket); 
	}


	/*
	* function connectUsingSSH
	* @todo ssh connetion to the server
	*/
	publict function connectUsingSSH()
	{
		// Excercise 2: 1.b SSH to a server
		$conn = ssh2_connect($this->hostname, $this->port);
		if($conn){
			echo "fail: Unable to establish connection\n";
		}else{
			if(!ssh2_auth_password($conn,$this->username,$this->password)){
				echo "fail: Unable to execute command\n";


				// Excercise 2: 1.F copy file using scp
				ssh2_scp_send($conn, $this->sourceFilePath, $this->remoteDestinationFilePath, 0644);

				// Excercise 2: 1.F copy file using sftp
				$sftp = ssh2_sftp($conn);



			}else{
				ssh2_exec($conn, "ls -al" )
			}
		}
	}

	/*
	* function checkDiscusage
	* @todo check free space of disc
	* @param string $dirpath
	*/
	public function checkDiscusage($dirpath)
	{
		//Excercise 2: 1.c check disc usage
		$availabeSpace = disk_free_space($dirpath);
	}

	/*
	* function checkInode
	* @todo check inode
	* @param string $filepath
	*/
	public function checkInode($filepath)
	{
		//Excercise 2: 1.d check inode of file
		$availabeSpace = fileinode($dirpath);
		echo $availabeSpace;
	}



	/*
	* function getFileList
	* @todo get list of file from path
	* @param string $dir
	*/
	public function getFileList($dir)
	{
		//Excercise 2: 1.e get list of files from path
		$amFileList = scandir($dir);
		print_r($amFileList);

	}



	/*
	* function sendFileUsingSFTP
	* @todo copy file using sftp
	* @param
	*/
	public function sendFileUsingSFTP()
	{
		//Excercise 2: 1.f copy file using sftp
		$sftp = new SFTPConnection($this->hostname, $this->port);
	    $sftp->login($this->username,$this->password);
	    $sftp->uploadFile($this->sourceFilePath, $this->remoteDestinationFilePath);		
	}

}

$dirpath = '';
$filepath = '';

$oConnectUsingTelnet = new connectUsingTelnet;
$oConnectUsingTelnet->connectUsingTelnet();
$oConnectUsingTelnet->connectUsingSSH();
$oConnectUsingTelnet->checkDiscusage($dirpath);
$oConnectUsingTelnet->checkInode($filepath);
$oConnectUsingTelnet->getFileList($dirpath);




//====================================================================================
//Excercise 2: 1.c check disc usage



?>

