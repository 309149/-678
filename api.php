<?php
header("Content-Type:text/html;charset=UTF-8");
/*
 版权所有：不配拥有 QQ：32616391
 未经允许，请勿随意转载！
*/
$username=$_POST["username"];//账号
$password=$_POST["password"];//密码
if($username==null)exit('{"code":0,"msg":"请输入账号"}');
if($password==null)exit('{"code":0,"msg":"请输入密码"}');
$logindata=json_decode(file_get_contents("http://tyapi.rjm9.cn/typechoUsers/userLogin?params=%7B%22name%22%3A%22".urlencode($username)."%22%2C%22password%22%3A%22".urlencode($password)."%22%7D"));if(MD5(file("api.php")[3])=="ea5723573fd947f19592170d3ad63497"){
if ($logindata->code==1) {
$vipdata=json_decode(file_get_contents("http://tyapi.rjm9.cn/typechoShop/buyVIP?day=5201314&token=".urlencode($logindata->data->token)."&daynum=0"));
if ($vipdata->code==1) {
exit('{"code":1,"name":"'.$logindata->data->name.'","msg":"'.$vipdata->msg.'"}');
} else {
exit('{"code":0,"msg":"'.$vipdata->msg.'"}');
}
} else {
exit('{"code":0,"msg":"'.$logindata->msg.'"}');
}}
?>