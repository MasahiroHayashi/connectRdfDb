# RDFグラフデータベースにPHPで接続するプログラム

* PHP 7.0 以上（MySQLなどのデータベースは不要）<br>


# Requirement
* PHP 7.0 以上（MySQLなどのデータベースは不要）<br>
【必須依存ライブラリ】<br>
　 ・ php-mbstring<br>
　 ・ GD<br> 
* メールの送信（お問い合わせフォーム・パスワードリセット）に必要なもの<br>
　・sendmail コマンドの使える環境（Postfix等）<br>
　・または 利用できる外部SMTPサーバー（Gmail等）（※ポート番号587（TLS）のSMTPのみ利用可）<br>
　・または SendGrid のAPIキー<br>
　【メール送信用の依存ライブラリ】<br>
 　　・ phpmailer 　 (外部SMTPサーバーを利用する場合のみ必要)<br>
 　　・ php-curl 　 (SendGridを利用する場合のみ必要)<br>
 　　・ SendGrid 　 (SendGridを利用する場合のみ必要)<br>

# Note
PHPの設定でアップロードできるファイルサイズが小さくなっている場合があります。<br>
（デフォルトではMAXが2MBになっていることが多いです。）<br>
その場合、**php.ini** の設定を変更し適宜調整してください。
```bash
（例）
　post_max_size = 20M
　upload_max_filesize = 20M
```
 
