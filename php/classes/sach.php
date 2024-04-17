<?php
    class Sach extends Database {
        private function __construct() {}

        public static function getAllBooksWithTypes(){
            if(self::$instance?->error) {
                throw new Exception('Error MySQL: ' . self::$instance->error);  
            }
            $query = "SELECT *, sach.Mo_Ta as Mo_Ta_Sach FROM sach JOIN loai_sach on sach.Ma_Loai = loai_sach.Ma_Loai";
            $result = self::call()->query($query);
          
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>