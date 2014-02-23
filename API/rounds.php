<?php

    // Import the Slim library and register Slim's autoloader
    require 'Slim/Slim.php';
    Slim\Slim::registerAutoloader();

    // Instantiate a new Slim application
    $app = new Slim\Slim();
    
    /**
     * On GET /rounds
     * Fetch a list of all courses or search a course by name
     */
    $app->get('/rounds', function() use($app) {
        $req = Slim\Slim::getInstance()->request();
        try {                
			$dbcon = getConnection();
            $sql = "SELECT a.RoundId, a.UserId, a.CourseId, b.CourseName, a.Date, a.Tournament FROM Rounds a INNER JOIN Courses b ON a.CourseId=b.CourseId ORDER BY RoundId";
            $stmt = $dbcon->query($sql);
            $rounds = $stmt->fetchAll(PDO::FETCH_OBJ);
            $dbcon = null;
            returnAsJSON($rounds,$app);  
                    
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });

    /**
     * On GET /rounds/:query
     * Fetch the data of a single course by id
     */
    $app->get('/rounds/:query', function($query) use($app) {
        $sql = "SELECT * FROM Rounds WHERE RoundId=:query";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("query", $query);
            $stmt->execute();
            $round = $stmt->fetchObject();
            $dbcon = null;
            returnAsJSON($round,$app);
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });
    
    /**
     * On POST /rounds
     * Create a new planet
     */
    $app->post('/rounds', function() use($app) {
        $request = Slim\Slim::getInstance()->request();
        $round = json_decode($request->getBody());
        
        $sql = "INSERT INTO Rounds (UserId, CourseId, Date, Tournament) VALUES (:userId, :courseId, :roundDate, :tournament)";
        try {
            $dbcon = getConnection();
            
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("userId", $round->userId);
            $stmt->bindParam("courseId", $round->courseId);
            $stmt->bindParam("roundDate", $round->roundDate);
            $stmt->bindParam("tournament", $round->tournament);
            $stmt->execute();
            $round->roundId = $dbcon->lastInsertId();

            $dbcon = null;
            returnAsJSON($round,$app);
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }       
    });
    
    /**
     * On PUT /rounds/:id
     * Update the data of an existing planet
     */
    $app->put('/rounds/:id', function($id) use($app) {
        $request = Slim\Slim::getInstance()->request();
        $body = $request->getBody();
        $round = json_decode($body);
        $sql = "UPDATE planet SET name=:name, region=:region, physical_class=:physical_class, diameter=:diameter, capital=:capital, description=:description WHERE id=:id";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("name", $round->name);
            $stmt->bindParam("region", $round->region);
            $stmt->bindParam("physical_class", $round->physical_class);
            $stmt->bindParam("diameter", $round->diameter);
            $stmt->bindParam("capital", $round->capital);
            $stmt->bindParam("description", $round->description);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            if($stmt->rowCount() == 0) {
                printError("planet not found",404,$app);                
            } else {                
                returnAsJSON($round,$app);
            }                        
            $dbcon = null;            
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });
    
    /**
     * On DELETE /rounds/:id
     * Delete an existing planet
     */
    $app->delete('/rounds/:id', function($id) use($app) {
        $sql = "DELETE FROM planet WHERE id=:id";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();            
            if($stmt->rowCount() == 0) {
                printError("planet not found",404,$app);                
            } else {                
                $app->response()->status(200);
            }
            $dbcon = null;
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
    function returnAsJSON($rounds,$app) {
        if($rounds) {
            echo json_encode(array('rounds' => $rounds));
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