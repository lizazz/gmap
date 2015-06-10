<?php 
	public function downloadfoto(){
		//echo $_FILES["filename"]["tmp_name"];
	//	echo $_FILES["filename"]["name"];
        if($_FILES["filename"]["size"] > 1024*3*1024)
        {
            echo ("Размер файла превышает три мегабайта");
            exit;
        }
      //  echo $_FILES["filename"]["tmp_name"];
        // Проверяем загружен ли файл
        if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
        {
            // Если файл загружен успешно, перемещаем его
            // из временной директории в конечную
            move_uploaded_file($_FILES["filename"]["tmp_name"],$albumfolder.$_FILES["filename"]["name"]);
            
              }
              else {echo "<br>dont download";};
        }

?>