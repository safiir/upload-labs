<?php
        $t = null;
        $num_pass = 19;
        $t = system('cat /var/log/apache2/other_vhosts_access.log | grep "/upload/pass19check" |grep "php"');
        if (!$t == null){
                echo "恭喜你成功利用漏洞，获得本题分数！";
                include 'send_score.php';
        }else {
                echo "抱歉，再试试吧！";
}

?>
