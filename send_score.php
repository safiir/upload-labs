<?php
function notify($index) {
        $domainId = getenv('SUB_DOMAIN_ID');

        if(!$domainId){
            return;
        }

        $data = array(
          'domainId' => $domainId,
          'token' => getenv('TOKEN'),
          'index' => $index
        );

        $data = http_build_query($data);

        $options = array(
            'http' => array(
                'method'  => 'PUT',
                'content' => $data,
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                            "Accept: */*\r\n"
            )
        );

        $url = getenv('HOST') . "/api/playground/eureka!";

        $context  = stream_context_create($options);
        try {
            $result = file_get_contents($url, false, $context);
            // $response = json_decode($result);
            // echo $result;
        } catch (Exception $ex) {
            // echo "Exception: " . $ex->getMessage();
            //die();
        }
    }

notify($num_pass);
?>
