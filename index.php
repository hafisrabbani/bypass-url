<?php
error_reporting(0);
ini_set('display_errors', 0);
function banner()
{
    print("\033[2J\033[;H");
    echo "################################################\n";
    echo "#              BYPASS SHORTLINK                #\n";
    echo "################################################\n";
    echo "#  Code By   : Hafis Rabbani                   #\n";
    echo "#  Github    : github.com/hafisrabbani         #\n";
    echo "#  Instagram : @hafisrbbni_                    #\n";
    echo "################################################\n";
}

function request($request){
    $url = base64_encode($request);
    $result = file_get_contents('https://lp.nrmn.top/api/bypass?url='.$url);
    return json_decode($result,true);
}

$loop = 0;
while($loop === 0){
    banner();
    echo "\nMasukan URL SHORTLINK : \nroot@hafisR => ";
    $url = trim(fgets(STDIN));
        if(filter_var($url,FILTER_VALIDATE_URL)){
            $result = request($url);
            if($result['success'] == true){
                echo "\n    Status          :  success";
                echo "\n    ShortUrl        :  $url";
                echo "\n    Original Url    :  ".$result['url'];
            }else{
                echo "\n    Status          :  error";
                echo "\n    Message         :  URL Not Support";
            }
        }else{
            echo "\n    Status          :  error";
            echo "\n    Message         :  Input must be url";

        }

    echo "\n Again? (Y/N)";
    $again = trim(fgets(STDIN));
    $again = strtolower($again);
    if($again !== 'y'){
        $loop = 1;
    }
}