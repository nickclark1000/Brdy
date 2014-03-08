<?php

    // Import the Slim library and register Slim's autoloader
    require 'Slim/Slim.php';
    Slim\Slim::registerAutoloader();

    // Instantiate a new Slim application
    $app = new Slim\Slim();
    
    /**
     * On GET /stats
     * Fetch statistical data
     */
    $app->get('/UpDowns', function() use($app) {
        $req = Slim\Slim::getInstance()->request();
        try {                
			$dbcon = getConnection();
			//Define distance ranges	
			$distRanges = array(0,10,20,30,40,50,60,70,80,90,100);
			$UpDownAttempts = array();
			$UpDownSuccesses = array();

			for($i=0; $i < count($distRanges)-1; $i++) {
				$j = $i + 1;
				$successes = "select count(*) as '".$distRanges[$i]."-".$distRanges[$j]."' from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.DistanceToHole <= ".$distRanges[$j]." and a.DistanceToHole > ".$distRanges[$i]." and a.ShotFrom != 'green' and (a.ShotNum = (SELECT MAX(ShotNum) FROM Shots e where e.RoundId = a.RoundId and e.HoleNum = a.HoleNum) OR a.ShotNum + 1 = (SELECT MAX(ShotNum) FROM Shots e where e.RoundId = a.RoundId and e.HoleNum = a.HoleNum))";
				$UpDownSuccessesStmt = $dbcon->query($successes)->fetch(PDO::FETCH_NUM);
				$UpDownSuccesses[$distRanges[$i]."-".$distRanges[$j]] = $UpDownSuccessesStmt[0];
				$attempts = "select count(*) as '".$distRanges[$i]."-".$distRanges[$j]."' from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.DistanceToHole <= ".$distRanges[$j]." and a.DistanceToHole > ".$distRanges[$i]." and a.ShotFrom != 'green'";
				$UpDownAttemptsStmt = $dbcon->query($attempts)->fetch(PDO::FETCH_NUM);
				$UpDownAttempts[$distRanges[$i]."-".$distRanges[$j]] = $UpDownAttemptsStmt[0];
			}

			$UpDown = array("Attempts"=>$UpDownAttempts,"Successes"=>$UpDownSuccesses);

            $dbcon = null;
            returnAsJSON($UpDown,$app);  
                    
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });
    
    $app->get('/statsasd', function() use($app) {
        $req = Slim\Slim::getInstance()->request();
        try {                
			$dbcon = getConnection();
			//Define distance ranges	
			$distRanges = array(0,10,20,30,40,50,60,70,80,90,100);
			$UpDownAttempts = array();
			$UpDownSuccesses = array();

			for($i=0; $i < count($distRanges)-1; $i++) {
				$j = $i + 1;
				$successes = "select count(*) as '".$distRanges[$i]."-".$distRanges[$j]."' from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.DistanceToHole <= ".$distRanges[$j]." and a.DistanceToHole > ".$distRanges[$i]." and a.ShotFrom != 'green' and (a.ShotNum = (SELECT MAX(ShotNum) FROM Shots e where e.RoundId = a.RoundId and e.HoleNum = a.HoleNum) OR a.ShotNum + 1 = (SELECT MAX(ShotNum) FROM Shots e where e.RoundId = a.RoundId and e.HoleNum = a.HoleNum))";
				$UpDownSuccessesStmt = $dbcon->query($successes)->fetch(PDO::FETCH_NUM);
				$UpDownSuccesses[$distRanges[$i]."-".$distRanges[$j]] = $UpDownSuccessesStmt[0];
				$attempts = "select count(*) as '".$distRanges[$i]."-".$distRanges[$j]."' from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.DistanceToHole <= ".$distRanges[$j]." and a.DistanceToHole > ".$distRanges[$i]." and a.ShotFrom != 'green'";
				$UpDownAttemptsStmt = $dbcon->query($attempts)->fetch(PDO::FETCH_NUM);
				$UpDownAttempts[$distRanges[$i]."-".$distRanges[$j]] = $UpDownAttemptsStmt[0];
			}

			$UpDown = array("Attempts"=>$UpDownAttempts,"Successes"=>$UpDownSuccesses);

            $dbcon = null;
            returnAsJSON($UpDown,$app);  
                    
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });

    // Run the Service
    $app->run();        
    
    // Return a connection to the database using PHP PDO
    function getConnection() {
        $dbhost = "localhost";
        $dbuser = "nickclark";
        $dbpass = "penguin1";
        $dbname = "NewCourse";
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
    
    // Return an object as JSON or return status 404 if response is empty
    function returnAsJSON($UpDown,$app) {
        if($UpDown) {
            echo json_encode($UpDown);
        } else {
            $app->response()->status(404);
        }
    }
    
    // In case of an internal server error print out an explanation and return 505
    function printError($message,$code,$app) {
        echo '{"error":{"message":'. $message .'}}';
        $app->response()->status($code);
    }
  
?>