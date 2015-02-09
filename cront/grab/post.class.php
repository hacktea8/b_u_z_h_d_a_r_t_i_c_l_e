<?php

class Post{
 public $postUrl = 'http://www.news8s.com/console/postcreate';
 public $header = array();
 public $headerArr = array(
//hacktea8@163.com
 'Cookie:hk8_auth=3c5ahRrSbjR3s4KJVc8L5fvtIsTzttVNp4DqMXcEW%2Fwwm7jTE2AZKELxWNhhN83ubPYZ9A; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22fc44c078175605ae88a66e6f0d055a6a%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416978410%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A18%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22843%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E5%89%B5%E6%84%8F%E7%84%A1%E9%99%90%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%220%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141126%22%3Bs%3A5%3A%22email%22%3Bs%3A16%3A%22hacktea8%40163.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7Db22b63dedeae20be02d027679f7b4936'
//hacktea8@126.com
 ,'Cookie:hk8_auth=49eaQQ0NZQRKWrHCxluXtpsel3muCGTaLxkszB0Y1X57qNKBII8v%2FUKnGbp7jup0xTvxwA; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22d2993ea38ccc4954f8a23293d06c4fb8%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416974302%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A18%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22842%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E9%B8%BF%E9%B9%84%E4%B9%8B%E5%BF%97%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%220%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141126%22%3Bs%3A5%3A%22email%22%3Bs%3A16%3A%22hacktea8%40126.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7D1974ba84c89b2066c2051768e4eed759'
//1187247901
 ,'Cookie:_ga=GA1.2.1935772039.1414980053; hk8_auth=4b6eOY9a1i1mvFH7NfLdobVyoN1t%2B7C0Fk5dPc7DGz5832Vo33myirapCKzR79Jr9jo; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%2253d34df47f807913e8a746f2f490eefc%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%22101.69.243.163%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416280650%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A18%3A%7Bs%3A3%3A%22uid%22%3Bs%3A1%3A%222%22%3Bs%3A5%3A%22uname%22%3Bs%3A8%3A%22hacktea8%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%222%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%221%22%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A2%3A%2261%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%22101.69.243.163%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141117%22%3Bs%3A5%3A%22email%22%3Bs%3A17%3A%221187247901%40qq.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A1%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7D08b84ac91650a46ccd676f599689439f'
//mozun417@163.com
 ,'Cookie:hk8_auth=dfb82WBVJmgRQN9X%2BO59Kmn0J6FxyPrn6JhqSvKdtjihoAeUdl6pbykxsoo4m9W8zSpNCA; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22d0bc646ce7c6721c0af9f4febd7b05f8%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416980374%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A22%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22844%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E6%99%82%E4%BA%8B%E5%88%86%E4%BA%AB%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%220%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%220%22%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22pre_amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A8%3A%22pre_hits%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141126%22%3Bs%3A5%3A%22email%22%3Bs%3A16%3A%22mozun417%40163.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7D424e22f1eadf1d97ce7279b476ede00c'
//wwwhk8@163.com
 ,'Cookie:hk8_auth=1879Y6a1o03%2BFYRkzYDmLz8nLS%2BBgSj60q2dFc6GXspSLPP35n2T8wnkfZLx84zppZVF%2Bg; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22e279a27df6bc19e43843b5079dd9e74d%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416981943%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A22%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22845%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E5%91%BD%E7%90%86%E5%A4%A7%E5%B8%AB%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%220%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%220%22%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22pre_amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A8%3A%22pre_hits%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141126%22%3Bs%3A5%3A%22email%22%3Bs%3A14%3A%22wwwhk8%40163.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7Da332a1e24e0e13ca8f06c19b57982e28'
//seohk8@yeah.net
 ,'Cookie:hk8_auth=9760s9S%2F2SAQaOdS3uKDBRvF%2BzL5UCodoSvaZ0DgEC%2Fq649Tw8pMubvSWWqPRBeiIk2reg; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%2273c9e9db508a51c764e38e9f26f38453%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416985894%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A22%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22846%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E7%9C%9F%E5%91%BD%E5%A4%A9%E9%BE%8D%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%220%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%220%22%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22pre_amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A8%3A%22pre_hits%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141126%22%3Bs%3A5%3A%22email%22%3Bs%3A15%3A%22seohk8%40yeah.net%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7D7ca253eadd37d2025dd289474fbc468f; _gat=1; _ga=GA1.2.1856774725.1416985922; Hm_lvt_930f9b4755b1e8403e09cb86fbe3ec00=1416985922; Hm_lpvt_930f9b4755b1e8403e09cb86fbe3ec00=1416986030'
//imhhk8@163.com
 ,'Cookie:Hm_lvt_930f9b4755b1e8403e09cb86fbe3ec00=1416985922; Hm_lpvt_930f9b4755b1e8403e09cb86fbe3ec00=1416993010; _gat=1; hk8_auth=7d03Gy%2FsDxfWxSv2E0zqgJwcM7gNaY0riNXK%2FnIb%2FhCHGyhBH7TQzuK2im5KTqRzWjo9lQ; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%2282ec0a23705a8f8a6ea7907be2a03add%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A120%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F38.0.2125.122+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1416993004%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A15%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22847%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E6%B4%AA%E8%8D%92%E5%85%83%E9%9D%88%22%3Bs%3A5%3A%22isvip%22%3Bi%3A0%3Bs%3A7%3A%22isAdmin%22%3Bi%3A0%3Bs%3A5%3A%22email%22%3Bs%3A14%3A%22imhhk8%40163.com%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141126%22%3Bs%3A6%3A%22invite%22%3Bi%3A0%3Bs%3A10%3A%22month_hits%22%3Bi%3A0%3Bs%3A6%3A%22amount%22%3Bi%3A0%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7De9f269c4c5dc9da3bc21554975047a82; _ga=GA1.2.1856774725.1416985922'
//comic8s@163.com
 ,'Cookie:hk8_auth=43195fDdPfv3IFr%2F%2BwX%2Fe3z6e0W%2FG%2FIiOqyQVWXfP6jLWv1EmnOig78jtImLApFETdu%2BPg; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22e305efd12650d720f09a7572bfb66b51%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A119%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F39.0.2171.71+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1417052280%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A22%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22849%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E7%BE%8E%E9%A3%9F%E9%81%94%E4%BA%BA%22%3Bs%3A5%3A%22isvip%22%3Bs%3A1%3A%220%22%3Bs%3A7%3A%22isAdmin%22%3Bs%3A1%3A%220%22%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A3%3A%22gid%22%3Bs%3A1%3A%221%22%3Bs%3A6%3A%22invite%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22pre_amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A8%3A%22pre_hits%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22month_hits%22%3Bs%3A1%3A%220%22%3Bs%3A6%3A%22amount%22%3Bs%3A5%3A%220.000%22%3Bs%3A4%3A%22hits%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22click_count%22%3Bs%3A1%3A%220%22%3Bs%3A10%3A%22post_count%22%3Bs%3A1%3A%220%22%3Bs%3A3%3A%22wid%22%3Bs%3A1%3A%221%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141127%22%3Bs%3A5%3A%22email%22%3Bs%3A15%3A%22comic8s%40163.com%22%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7Dddbac097a305a4950b1b4aac2498da6b; Hm_lvt_930f9b4755b1e8403e09cb86fbe3ec00=1416985922,1416993043,1417052313; Hm_lpvt_930f9b4755b1e8403e09cb86fbe3ec00=1417052383; _ga=GA1.2.1856774725.1416985922'
//mlhk88@163.com
 ,'Cookie:_gat=1; hk8_auth=aaeauWFvgLrNhZONEU0c342ALNN5W6X8ygP0EVmGVcL0OjwufVL1%2BydbCAuVOjOZN6ml3Q; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%225fa597528f90c108b1ca58d0b341eff9%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A119%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F39.0.2171.71+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1417073769%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A15%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22850%22%3Bs%3A5%3A%22uname%22%3Bs%3A12%3A%22%E6%97%85%E9%81%8A%E9%81%94%E4%BA%BA%22%3Bs%3A5%3A%22isvip%22%3Bi%3A0%3Bs%3A7%3A%22isAdmin%22%3Bi%3A0%3Bs%3A5%3A%22email%22%3Bs%3A14%3A%22mlhk88%40163.com%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141127%22%3Bs%3A6%3A%22invite%22%3Bi%3A0%3Bs%3A10%3A%22month_hits%22%3Bi%3A0%3Bs%3A6%3A%22amount%22%3Bi%3A0%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7Dff1bc2420133160c912694a60356599e; Hm_lvt_930f9b4755b1e8403e09cb86fbe3ec00=1416985922,1416993043,1417052313,1417073785; Hm_lpvt_930f9b4755b1e8403e09cb86fbe3ec00=1417073790; _ga=GA1.2.1856774725.1416985922'
//seohk8@163.com
 ,'Cookie:_gat=1; hk8_auth=fce8zTVEqty68iKcKKlbZg%2F0o%2BO1jD7b4Et%2F1QnBMCDXie0TpTg8%2B5%2BwDw8U1IL7dzJPCMTr; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%22846e4cca87c84dd3963383ac036a83cf%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A119%3A%22Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_7_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F39.0.2171.71+Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1417074114%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22user_logindata%22%3Ba%3A15%3A%7Bs%3A3%3A%22uid%22%3Bs%3A3%3A%22851%22%3Bs%3A5%3A%22uname%22%3Bs%3A15%3A%22%E6%9C%80%E6%99%82%E5%B0%9A%E9%81%94%E4%BA%BA%22%3Bs%3A5%3A%22isvip%22%3Bi%3A0%3Bs%3A7%3A%22isAdmin%22%3Bi%3A0%3Bs%3A5%3A%22email%22%3Bs%3A14%3A%22seohk8%40163.com%22%3Bs%3A7%3A%22loginip%22%3Bs%3A14%3A%2260.251.127.180%22%3Bs%3A9%3A%22logintime%22%3Bs%3A8%3A%2220141127%22%3Bs%3A6%3A%22invite%22%3Bi%3A0%3Bs%3A10%3A%22month_hits%22%3Bi%3A0%3Bs%3A6%3A%22amount%22%3Bi%3A0%3Bs%3A8%3A%22now_hits%22%3Bi%3A0%3Bs%3A10%3A%22now_amount%22%3Bi%3A0%3Bs%3A7%3A%22isadmin%22%3Bi%3A0%3Bs%3A11%3A%22level_point%22%3Bi%3A100%3Bs%3A9%3A%22level_per%22%3Bi%3A0%3B%7D%7D8abae227774fa8a54814d6ae3fe48c45; Hm_lvt_930f9b4755b1e8403e09cb86fbe3ec00=1417052313,1417073785,1417074068,1417074124; Hm_lpvt_930f9b4755b1e8403e09cb86fbe3ec00=1417074124; _ga=GA1.2.1856774725.1416985922'
 );
 public $ttk = '';
 public $gickimg = '';
 public $curl = '';

 public function init($config){
  foreach($config as $k => $v){
   $this->$k = $v;
  }
 }
 
 public function create($data){
  //$pic = $this->upload2ttk($data['cover'], $cover = 1);
  $pic = $data['cover'];
//echo $pic;exit;
/*
  $intro = $this->upload2ttk($data['intro'], $cover = 0);
*/
  $intro = $data['intro'];
  $post_data = array(
  'Post[is_original]'=>$data['is_original']
  ,'Post[original_url]'=>$data['original_url']
  ,'Post[no_infringement]'=>''
  ,'Post[title]'=>$data['title']
  ,'Post[summary]'=>''
  ,'Post[pic]'=>''
  ,'Post[thum]'=>$pic
  ,'Post[intro]'=>$intro
  // 1-10
  ,'Post[cid2]'=>$data['cid']
  ,'Post[tags]'=>$data['tags']
  ,'Post[coop]'=>''
  ,'Post[id]'=>''
  ,'Post[verify]'=>'1'
  ,'Post[is_adult]'=>$data['adult']
  );
  $html = $this->html($post_data);
  //file_put_contents('post_debug.html', $html);
  preg_match('#/article/index/(\d+)#is', $html, $match);
  $aid = @$match[1];
  if( empty($aid)){
   var_dump($match);
   echo $html,"\n";exit;
  }
  return $aid;
 echo $html,"\n";exit; 
 }
 public function upload2ttk($string,$cover = 0){
  $picArr = array();
  if($cover){
   $picArr[] = $string;
  }else{
   preg_match_all('#<\s*img [^>]*src=(.+)(^>|>)#Uis',$string,$match);
   $picArr = @$match[1];
   
  }
  $up_data = array('url' => 'http://img.hacktea8.com/ttkapi/uploadurl?seq=', 'imgurl'=>'','filename'=>''
 ,'site'=>'btv','album'=>'');
  foreach($picArr as $v){
   $v = str_replace(array('"',"'"),'',$v);
   if(false !== stripos($v, '.tietuku.com')){
    continue;
   }
   $up_data['imgurl'] = $v;
   $up_data['filename'] = basename($v);
   for($i = 0;$i<3;$i++){
    $covers = $this->get_html($up_data);
    $covers = trimBOM($covers);
    //echo '|',$covers,'|',"\n";
    $covers = json_decode($covers, 1);
    //var_dump($covers);
    if(1 == $covers['flag']){
     break;
    }
    sleep(10);
   }
   //var_dump($covers);exit;
   $src = '';
   if(1 == $covers['flag']){
    $src = $covers['url'];
   }
/*
   //$r = $this->ttk->uploadRemoteFile(0,$v);
   $vf = ROOTPATH.'cache/ttk_'.basename($v);
   $cmd = sprintf('wget %s -O %s',$v,$vf);
   exec($cmd);
   $r = $this->ttk->uploadFile(0,$vf);
   $src = @$r['linkurl'];
   @unlink($vf);
*/
   if($src){
  //  echo 'v=',$v,' src=',$src,"\n";
    $string = str_replace($v,$src,$string);
   }else{
    echo "===== upload cover $v failed ===\n";var_dump($r);exit;
   }
  }
//echo $string,"\n";exit;
  return $string;
 }
 public function html($data){
  $len = count($this->headerArr);
  $k = mt_rand(1,$len);
  $this->header = array($this->headerArr[$k-1]);
  $ch = curl_init();//初始化curl
  curl_setopt($ch,CURLOPT_URL, $this->postUrl);//抓取指定网页
  curl_setopt($ch, CURLOPT_HEADER, 1);//设置header
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);//设置HTTP头
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
  curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  $html = curl_exec($ch);//运行curl
  curl_close($ch);
  return $html;
 }
 public function get_html(&$data){
  $curl = curl_init();
  $url = $data['url'];
  unset($data['url']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl, CURLOPT_POST, count($data));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  return $tmpInfo;
 }
}
