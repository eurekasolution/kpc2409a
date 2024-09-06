    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">취약점 분석</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            공통 메뉴
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="index.php?cmd=injection">SQL Injection</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=storage">Local Storage</a></li>
                            
                            <li><a class="dropdown-item" href="index.php?cmd=xss">XSS</a></li>
							<li><a class="dropdown-item" href="index.php?cmd=brute">Brute Force</a></li>
							<li><a class="dropdown-item" href="index.php?cmd=shell">Web Shell</a></li>
							<li><a class="dropdown-item" href="index.php?cmd=shell2">Web Shell2</a></li>
                            
                            <li><a class="dropdown-item" href="index.php?cmd=lookup">ns lookup</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=file">File</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=rand">Random</a></li>
                            
                            <li><a class="dropdown-item" href="index.php?cmd=board">Board</a></li>
							<li><a class="dropdown-item" href="index.php?cmd=button">Button</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=editor">Editor</a></li>

                            <li><a class="dropdown-item" href="index.php?cmd=upload">File Upload</a></li>
							<li><a class="dropdown-item" href="index.php?cmd=log">Log</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=fake">Fake</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=crawling">Crawling</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=ftp">FTP</a></li>
                        </ul>
                    </li>

                    <?php if(isset($_SESSION[$sess_level]) and $_SESSION[$sess_level] >= $adminLevel) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            관리자메뉴
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="index.php?cmd=admintest">Admin Test</a></li>
                            <li><a class="dropdown-item" href="index.php?cmd=menu2-2">menu2-2</a></li>
                        </ul>
                    </li>
                    <?php
                        }
                    ?>


                    <li class="nav-item">
                        <a class="nav-link" href="#">메뉴3</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>