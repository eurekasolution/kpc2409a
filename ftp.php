<?php
    function getDirs($path)
    {
        $handler = opendir($path);
        while( ($filename = readdir($handler))  != false )
        {
            if(is_dir("$path/$filename"))
            {
                $files[] = $filename;
            }else
            {
                
            }
        }

        return $files;
    }

    function getFiles($path)
    {
        $handler = opendir($path);
        while( ($filename = readdir($handler))  != false )
        {
            if(is_dir("$path/$filename"))
            {

            }else
            {
                $files[] = $filename;
            }
        }

        return $files;
    }

    function readFileContent($path)
    {
        if(!$hander = fopen($path, "r"))
        {
            echo "File Open Error!!!";
            return;
        }else{
            $fileContent = file_get_contents($path, true);
            return $fileContent;
        }
    }

    $sess_path = "sess_path";

    if(!isset($_SESSION[$sess_path]))
        $_SESSION[$sess_path] = "./";
    else if(isset($_GET["pdir"]))
        $_SESSION[$sess_path] = $_GET["pdir"];

    if(isset($_GET["pfile"]))
    {
        $fileContent = readFileContent($_SESSION[$sess_path] . "/" . $_GET["pfile"]); 
    }else
    {
        $fileContent = "";
    }

    if(isset($_POST["fname"]) and isset($_POST["fdata"]))
    {
        $fname = $_POST["fname"];
        $fdata = $_POST["fdata"];
        $pathFile = $_SESSION[$sess_path] . "/" . $fname;

        if(file_exists($pathFile))
        {
            unlink($pathFile);
        }
        // file 내용 써서 파일 저장
        if(!$handler = fopen($pathFile, "w"))
        {
            echo "File Open Error for Write !!";
            return;
        }
        // test
        if(fwrite($handler, $fdata) == false)
        {
            echo "File Write Error !!!";
            return;
        }
        echo "
        <script>
            alert('파일 생성 완료 : $fname ');
            location.href='index.php?cmd=ftp';
        </script>
        ";
    }


?>



<div class="container">
    <div class="row">
        <div class="col-3 colLine">디렉토리<br>
            <table class="table table-bordered">
            <?php
                $dirs = getDirs($_SESSION[$sess_path]);
                $cnt = 0;
                while(isset($dirs[$cnt]))
                {
                    $nextDir = $_SESSION[$sess_path] . "/" . $dirs[$cnt];
                    echo "<tr>
                        <td><a href='index.php?cmd=ftp&pdir=$nextDir'>$dirs[$cnt]</a></td>
                    </tr>";
                    $cnt ++;
                }
            ?>
            </table>
        </div>
        <div class="col colLine">파일목록<br>
            <table class="table table-bordered">
            <?php
                $files = getFiles($_SESSION[$sess_path]);
                $cnt = 0;
                while(isset($files[$cnt]))
                {
                    echo "<tr>
                        <td><a href='index.php?cmd=ftp&pfile=$files[$cnt]'>$files[$cnt]</a></td>
                    </tr>";
                    $cnt ++;
                }
            ?>
            </table></div>
    </div>
    <form method="post" action="index.php?cmd=ftp">
    <div class="row">
        <div class="col colLine">
            <textarea class="form-control" rows="10" name="fdata"><?php echo $fileContent?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-3 colLine">파일명</div>
        <div class="col colLine">
            <input type="text" name="fname" class="form-control" placeholder="저장할 파일명을 입력">
        </div>
        <div class="col-1 colLine">
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </div>
    </form>
</div>