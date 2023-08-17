<?php 
    require_once("database.php");

    class notesConfig{
        private $id;
        private $title;
        private $description;
        private $entry;
        protected $dbCnx;

        public function __construct($id=0, $title="", $description="", $entry=""){
            $this->id = $id;
            $this->title=$title;
            $this->description=$description;
            $this->entry=$entry;

            $this->dbCnx = new PDO(
                DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] 
            );
        }

        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }

        public function setTitle($title){
            $this->title = $title;
        }
        public function getTitle(){
            return $this->title;
        }

        public function setDescription($description){
            $this->description = $description;
        }
        public function getIDescription(){
            return $this->description;
        }

        public function setEntry($entry){
            $this->entry = $entry;
        }
        public function getEntry(){
            return $this->entry;
        }

        public function insertData(){
            try{
                $stm = $this->dbCnx->prepare("INSERT INTO notes(title, description, entry) VALUES (?,?,?)");
                $stm->execute([$this->title, $this->description, $this->entry]);
                echo "<script>document.location='index.php'</script>";
            }
            catch(Exception $e){
                return $e->getMessage();
            }

        }
        public function fetchAll(){
            try{
                $stm = $this->dbCnx->prepare("SELECT * FROM notes ORDER BY entry DESC");
                $stm->execute();
                return $stm->fetchAll();
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        public function fetchOne(){
            try{
              $stm = $this->dbCnx->prepare("SELECT * FROM notes WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();  
            }
            catch(Exception $e){
                return $e->getMessage();
            }   
        }    

        public function update(){
            try{
                $stm = $this->dbCnx->prepare("UPDATE notes SET title=?, description=?, entry=? WHERE id = ?");
                $stm->execute([$this->title, $this->description, $this->entry,$this->id]);
                echo "<script>document.location='index.php'</script>";
            }
            catch(Exception $e){
                return $e->getMessage();
            } 
        }

        public function delete(){
            try{
                $stm = $this->dbCnx->prepare("DELETE FROM notes WHERE id=?");
                $stm->execute([$this->id]);
                echo "<script>document.location='index.php'</script>";
                return $stm->fetchAll();   
            }
            catch(Exception $e){
                return $e->getMessage();
            } 
        }
    }
?>