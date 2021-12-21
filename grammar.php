<?php
$list = '';
$conn = mysqli_connect("localhost", "root", "123456", "preposition");
$sql = "select * from prep";
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_array($result))
{
    $list = $list."<li><a href = \"grammar.php?id={$row['id']}\">{$row['preposition']}</a></li>";  
}

$sql = "select * from prep where id= {$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$article = array(
    'preposition' => '오늘 배울 문법의 내용: 각 전치사의 용도',
    'transportation' => '',
    'location'=> '',
    'time'=> ''

);


if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from prep where id= {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $article['preposition'] = htmlspecialchars($row['preposition']);
    $article['transportation'] = htmlspecialchars($row['transportation']);
    $article['location'] = htmlspecialchars($row['location']);
    $article['time'] = htmlspecialchars($row['time']); 
    
}
?>


<html>
<head>
        <meta charset = "utf-8"/>
        <title>한눈에 쏙쏙 문법</title>
        <style type = "text/css">
            gstyle{
                color:#616161;
                font-family: fantasy;
                font-size:20px;
            }
        </style>
 </head>
 <body>
     <div id = "grm">
        <gstyle>
        <h1>Types of Preposition</h1>
        <ol>
            <?php
                echo $list;
            ?>
        </ol>


        <h2>
            <?php
                echo $article['preposition'];
            ?>
        </h2>
        </gstyle>
        <h4>
            <?php
                echo "<h3>1.Transportation 교통수단의 용도</h3>";
                echo $article['transportation'];
            ?>
        </h4>
        <h4>
            <?php
                echo "<h3>2.Location 장소의 용도</h3>";
                echo $article['location'];
            ?>
        </h4>
        <h4>
            <?php
                echo "<h3>3.Time 시간의 용도</h3>";
                echo $article['time'];
            ?>
        </h4>
        
        <br>
        <h2>전치사 문장 예시</h2>
        <ul>
            <li>We take the school bus <b>at</b> 7. (정확한 시각)</li>
            <li>Iza wasn’t present <b>at</b> the meeting today. (정확한 장소 뿐만 아니라 meeting에서도 at을 활용)</li>
            <li>Get <b>on</b> the bus! vs. Get <b>in</b> the car! (보통 크고 자신이 소유하지 않는 대중교통은 on을 사용)</li>
            <li>She will meet her family <b>on</b> her birthday. vs She will meet her family <b>in</b> two weeks. 
                (on은 day 하루, in은 비교적 긴 기간을 말할 때 사용)</li> 
            <li>I travel <b>by</b> the subway. (지하철에 있다면 on the subway, 수단으로 활용한다면 by)</li>
            <li>I like to sit <b>by</b> the window. (by는 ~ 가까이 ~ 옆에라는 뜻으로 사용할 수 있음)</li> 
        </ul>

        <table border = "2" align = center>
            <gstyle>
                <h1> 헷갈리는 문법 2탄: 시제 (Tenses)</h1>
                 <tr>
                     <th>TENSES(시제)</th>
                     <th>PAST (과거)</th>
                     <th>PRESENT (현재)</th>
                     <th>FUTURE (미래)</th>
                </tr>
                <tr>
                    <th>SIMPLE</th>
                    <td> Did, 규칙동사 (d/ed) </td>
                    <td> Do, Does, 규칙동사 (s/es)</td>
                    <td> will + verb</td>
               </tr>
               <tr>
                    <th>PROGRESSIVE/<br>
                    CONTINUOUS (진행형)</th>
                    <td>was/were + verb + ing</td>
                    <td>am/are/is + verb + ing</td>
                    <td>will + be + verb + ing</td>
                </tr>
                <tr>
                    <th>PERFECT<br>
                    PAST PARTICIPLE</th>
                    <td>had + past participle (p.p.)</td>
                    <td>has/ have + past participle (p.p.)</td>
                    <td>will + have + past participle (p.p.)</td>
               </tr>
            </gstyle>
            </table>
            <br>

            <ul>
            <li>(Simple Past)과거형: "Did you sleep well? "No, I didn't sleep.I studied for my exam." </li>
            <li>(Simple Present)현재형: "Do you work on Saturdays?" "Yes, I work from Monday to Saturday, but my husband doesn't work on the weekend."</li> 
            <li>(Simple Future) 미래형: "What will you do?" "I will watch FRIENDS until you come." </li>
            <li>(Past Continuous)과거진행형: "I was watching TV when you called me." </li>
            <li>(Present Continuous)현재진행형: "What are you doing right now?" "I am cleaning my room."</li>
            <li>(Future Continuous)미래진행형: "John will be studying in the library when Diana arrives in the airport."</li>
            <li>(Past Perfect)과거완료형: "The film had started when we came to the cinema."</li>
            <li>(Present Perfect)현재완료형:"Have you ever been the the States?" "No I have never visited the States."</li>
            <li>(Future Perfect)미래완료형: "I will have spent all my money when Christmas season ends."</li>
            </ul>
    </div>
</body>
</html>