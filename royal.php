<?php
//HARDCODEBYGHAZIMUHARAM
//NORECODEANDNOTFORSALE
//KANG SNIFF MANGGALA FEBRI VALENTINO
echo "Masukkan UserID : ";
$uid 	    = trim(fgets(STDIN));
if(empty($uid)){
    $uid = '4138052855';
}
echo "Masukkan Token : ";
$track 	    = trim(fgets(STDIN));
if(empty($track)){
$track='c5e0c3c9b460029b774b25f6d4376df1d5e3522545f087ebed29f54b7dfdeefb';
}
//
function request($url,$headers,$post = 0){
        $ch =   curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        	if($post !== 0) {
        		curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
        		curl_setopt ($ch, CURLOPT_POST, 1); 
        	}
        
        	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        	curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        	curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    
    	$result = curl_exec($ch);
    	    curl_close($ch);
	return $result;
}
$url        =   "http://instalike.socialmarkets.info/user/$uid/trackAction/$track";
$urltoken   =   "http://instalike.socialmarkets.info/user/$uid/getBoard/0/$track";
$headers    =   array();
$headers[]  =   'systemVersion: royallikesandroid/  (Redmi 4X/25/7.1.2)';
$headers[]  =   'User-Agent: royallikes 7 (Redmi 4X/25/7.1.2)';
$headers[]  =   'Content-Type: application/json; charset=utf-8';
function orderid($urltoken,$headers){
    $page   =   json_decode(request($urltoken,$headers));
    return $page->data->boardList;
}
function runner($url, $urltoken,$headers){
    $counter    =   orderid($urltoken,$headers);
    print("Looping For ".count($counter)."\n");
    for ($i = 0; $i < count($counter); $i++) {
         $orderid       =   $counter[$i]->orderId;
         $postdata      =   '{"action":0,"actionToken":"127812DFA43492D9058B8D6B7F1B0307","orderId":'.$orderid.'}';
         echo request($url, $headers, $postdata).'-'.$orderid;
         echo "\n";
    }
    echo $orderid;
}
echo runner($url, $urltoken,$headers);
            echo "Masukkan Jumlah: ";
            $counter	= trim(fgets(STDIN));
            while(true){
                $orderid       =   $counter++;
                $postdata      =   '{"action":0,"actionToken":"127812DFA43492D9058B8D6B7F1B0307","orderId":'.$orderid.'}';
                echo request($url, $headers, $postdata).'-'.$orderid;
                echo "\n";
            }
            echo $orderid;
?>
