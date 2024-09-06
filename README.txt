README.txt 파일을 수시로 확인하세요.
    github 실시간 배포 주소.

    https://github.com/eurekasolution/kpc2409

    http://localhost:8000

    DB
    DB, User : kpc
    pass : 1111

    http://localhost:8000/phpmyadmin

    데이터베이스의 문자셋 변경 (한글깨짐) latin으로 된 경우

    ALTER DATABASE kpc CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

    create table users (
        idx integer auto_increment primary key,
        id  varchar(30) UNIQUE,
        name varchar(30),
        pass varchar(100)
    );

    alter table users add level integer default '1';

    insert into users (id, name, pass) values('test', '테스트', 'abcd');
    insert into users (id, name, pass) values('admin', '관리자', 'abcd');


    안녕하세요?
    <script>
        for(var i=1; i<=5; i++)
        {
            alert(i);
        }
    </script>

    insert into bbs (name, content) values('홍길동', '' )

    w3schools.com
    

    ChatGPT를 이용한 버전 강의자료 다운로드 

    http://naver.me/FUhhy7AA

    참고사이트 : https://www.security.org/how-secure-is-my-password/ 

    gcc -Wall  -DDBG_LEVEL1 a.c -o a


    int copy_array(char *str)
    {
        if(strlen(str) > 100)
        {
#ifdef DBG_LEVEL1
            printf("Parameter error");
#endif
            return -1;
        }
        char buf[100];
        strcpy(buf, str);
        printf("buf = %s\n", buf);
        printf("&buf = %p\n", buf);

        return 1;
    }

    int main(int argc, char **argv)
    {
        if(copy_array(argv[1]) < 0)
        {
            // error
        }
        return 0;
    }

    // 실행 : ./test "hello world"

for()
    main.php?cmd=login&id=test&pass=aaa

https://www.daum.net/

<input type="xxx">
xxx : text (default)
password : ******
tel :
number :
email : 
url : 

<form method="post" action="다음페이지">
    ID <input type="text" name="id">
    PW <input type="password" name="pass">
    <button type="submit">로그인</button>
</form>

헤더 : 다음페이지
몸체
id=test&pass=1234

Log : idx, who, ip, when, what

다음과 같은 데이터베이스 스키마를 만들어줘.
테이블 이름 : login
필드 : idx, id, ip, time, work
각각은 다음과 같은 특성
idx : integer, 자동증가, 프라이머리 키
id : varchar, 20글자
ip : varchar, 15자
time : YYYY-MM-DD HH:mm:SS 형태로 저장
work : varchar , 100글자


CREATE TABLE log (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(20) NOT NULL,
    ip VARCHAR(15) NOT NULL,
    time DATETIME NOT NULL,
    work VARCHAR(100) NOT NULL
);


만약에 주소창에 http://localhost:8000/index.php?cmd=test&abc=2
이런 형태로 올때, index.php?cmd=test&abc=2 값을 PHP로 확인하는 방법을 알려줘.

$_SERVER["REQUEST_URI"]

CREATE TABLE board (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(20) NOT NULL,
    name VARCHAR(20) NOT NULL,
    title varchar(255),
    html text,
    ip VARCHAR(15) NOT NULL,
    time DATETIME NOT NULL
);

alter table board add title varchar(255) after name;


INSERT INTO board (id, name, title,  html, ip, time) 
    values('testid', '테스트', '제목 테스트', '내용 테스트', '1.2.3.4', now());

다음과 같은 board.php파일 만들어줘.
이파일은 index.php?cmd=board로 접근해서 게시판 코드만 있으면 돼.
$mode에는 list, write, dbwrite, show으로 구성되어있음.
$mode가 없으면 list를 기본값으로 사용

if($mode == "list")
{
    순서, 제목, 작성자, 작성일 형태로 출력하는데 테이블 형태로 해줘.
    목록은 log테이블에서 idx, title, name, time을 출력
    time은 년-월-일만 출력하는데
    제목을 클릭하면 index.php?cmd=board&mode=show&idx=키값 형태로 링크 연결
    맨 마지막에는 글쓰기 버튼을 만든다.
    글쓰기 버튼을 누르면 index.php?cmd=board&mode=write로 이동
}

if($mode == "write")
{
    제목(title)과, 작성자(name), 내용(html, textarea)을 입력부분을 만든다.
    저장버튼을 누르면 index.php?cmd=board&mode=dbwrite로 이동
}

if($mode == "dbwrite")
{
    제목(title)과, 작성자(name), 내용(html, textarea)을 입력부분을 만든다.
    저장버튼을 누르면 index.php?cmd=board&mode=dbwrite로 이동

    다음과 같은 스키마에 저장

    CREATE TABLE board (
        idx INT AUTO_INCREMENT PRIMARY KEY,
        id VARCHAR(20) NOT NULL,
        name VARCHAR(20) NOT NULL,
        title varchar(255),
        html text,
        ip VARCHAR(15) NOT NULL,
        time DATETIME NOT NULL
    );

    입력창의 필드 이름은 DB 테이블 필드와 맞춰줘.

    XSS 공격 연습을 위해, 보안코드는 제외해 줘.

}

if($mode == "show")
{
    해당하는 idx가 같은 내용을 board테이블에서 찾아와 출력
}

안녕하세요
<script>  for(var i=1; i<=3; i++) {  alert(i); } </script>


JSON : JavaScript Object Notation
key : value 형태

객체 ==> { } , 배열 ==> [ ]

Case 1: 사람이란 객체

{
    "name" : "홍길동",
    "age" : 12,
    "company" : "KPC"
}

Case 2 : 객체 내부에 객체를 포함하는 경우
{
    "name" : "홍길동",
    "age" : 12,
    "company" : {
        "name" : "KPC",
        "tel" : "02-1111-2222",
        "home" : "http://kpc.or.kr"
    }
}

Case 3: 객체가 객체만 포함하는
{
    "person" { 
        "name" : "홍길동",
        "age" : 12,
        "company" : "KPC"
    },
    "company" {
        "name" : "KPC",
        "tel" : "02-1111-2222",
        "home" : "http://kpc.or.kr"
     }
}

Case : 배열 데이터
{
    "employee": [ 
        {
            "name": "홍길동",
            "age": 12
        },
        {
            "name": "이순신",
            "age" : 34
        }
    ],
    "employer": [ 
        { 
            "company" : "KPC" 
        },
        { "company" : "KBS"}
    ] 
}

{
    "nodes":[ ],
    "links":[ ] 
}

d3js.org

<b>대한</b>민국
html : tag save
text = striptags($html);


select * from board where html like '%대한민국%';

$LPP = 10;
$page 

1 : 0 ~ 10
2 : 10 ~ 10
3 : 20 ~ 10

n : (n-1) * 10, 10
$start = ($page -1) * 10;

select * from board limit $start, $LPP

int main()
{
    a(); // a
    fflush(stdout);
    b(); // b
    fflush(stdout);
    c(); // C
    fflush(stdout);
    d(); // d
    fflush(stdout);
    e(); // e
    fflush(stdout);
}

a
b
(Killed)


README Test

ASLR 해제(비활성)
– Address Space Layout Randomization
– 활성 : $ echo “2” > /proc/sys/kernel/randomize_va_space
– 비활성 : $ echo “0” > /proc/sys/kernel/randomize_va_space


char *str="Hello World";

printf("%s", str);
printf(str);

int i = 3;

printf("%d %d", i);