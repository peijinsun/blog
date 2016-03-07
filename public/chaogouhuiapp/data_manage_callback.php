<?php
require("host_db_config.php");
/* use con_host */
/*
* user id, back_data为json格式，每条商品信息对应一个json子项，每个子项中有个handle字段
* handle = 1表示发布，handle = 0表示删除 json数据格式参考如下：
* [{"taskid":"0001","bb":"content","handle":"1"}, {"taskid":"0002","bb":"content","handle":"0"}]
* 它将被解析为：
* Array
* (
*     [0] => Array
*     (
*         [taskid] => 0001
*         [bb] => content
*         [handle] => 1
*     )
*
*     [1] => Array
*     (
*         [taskid] => 0002
*         [bb] => content
*         [handle] => 0
*     )
* )
*/

$user_id = $_POST['user_id'];
$back_data = $_POST['back_data'];
$data_array =  json_decode($back_data, TRUE);
$result_code = 0;
$label1 = '国内优惠';
$label2 = '海淘优惠';
$label3 = '白菜价';
//print_r($data_array);
/* 如果handle=1 先交给publish处理，如果handle=0直接change status */
foreach($data_array as $data) {
    /*校验用户处理权限*/
    //$sql = "select taskid from crawl_table where userid = '".$user_id."' and status = 1 and taskid = '".$data['taskid']."';";
    //$result = mysql_query($sql, $con_host);
    //$count = mysql_num_rows($result);
    //if($count == 0) {
    //    $result_code += 1;
    //    continue;
    //}
    if($data['handle'] == 1) {
        if(strstr($data['label'], $label1) != FALSE) {
			$type = 0;
            publish_discounts($user_id, $data, $con_host, $type);
        }else if(strstr($data['label'], $label2) != FALSE) {
			$type = 1;
            publish_discounts($user_id, $data, $con_host, $type);
        }
 
        if(strstr($data['label'], $label3) != FALSE){
			publish_cheaps($user_id, $data, $con_host);
        }        
    }else if($data['handle'] == 0) {
        //change_data_status($user_id, $data, $con_host);
    }
}
if($result_code == 0) {
    echo "ok\n";
}else {
    echo "error:".$result_code."\n";
}
/*
* 发布优惠信息
* json字段:
* taskid  handle  code  title  
* current_price  original_price
* image  description  url  
* start_time  end_time  source  
* isbanner label  index_terms
*/

function publish_discounts($user_id, $data, $con_host, $type){

    $deimage = json_decode($data['image_list'], true);
    $sql = "INSERT INTO discounts(id, thumbnail, title, content, price, url, source, author, time, type)VALUES('".$data['code']."','".$data['image']."','".$data['title']."','".$data['description']."','".$data['current_price']."','".$data['url']."','".$data['source']."','chaogou','".$data['start_time']."','".$type."');";
    $result = mysql_query($sql, $con_host);
    //print_r($sql);
    //print_r($result);
    //change_data_status($user_id, $data, $con_host);
}

/*
* 发布白菜价
* json字段:
* taskid  handle  code  title  
* current_price  original_price
* image  description  url  
* start_time  end_time  source  
* isbanner label  index_terms
*/

function publish_cheaps($user_id, $data, $con_host){

    $deimage = json_decode($data['image_list'], true);
    $sql = "INSERT INTO cheaps(id, title, price, content, url, img, time)VALUES('".$data['code']."','".$data['title']."','".$data['current_price']."','".$data['description']."','".$data['url']."','".$data['image']."','".$data['start_time']."');";
    $result = mysql_query($sql, $con_host);
    //change_data_status($user_id, $data, $con_host);
}

/*
* 数据处理完成后，对爬虫表中对应数据进行状态修改，status = 0表示数据尚未推送给审核员，status = 1表示数据审核中，status=2表示数据审核完成。
* user_id表示正在审理该数据的审核员，只有正在审理该数据的审核员才有权将该数据状态变为2。
*/
function change_data_status($user_id, $data, $con_host) {
    $sql = "update crawl_table set status = 2 where taskid = '".$data['taskid']."' and userid = '".$user_id."' and status = 1;";
    $result = mysql_query($sql, $con_host);
}

mysql_close($con_host);
?>
