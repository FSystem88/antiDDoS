1. 
creating a file dir.php and write inside:

  <code>\<?php echo \_\_FILE\_\_; ?></code>


This is necessary in order to understand the full path to the directory on your hosting/server.
when will you go to the na yousite.com/dir.php you will see a line similar to:

  /home/p/p915356w/p915356w.bget.ru/public_html/dir.php   <--- (its my beta site)

you need to copy everything except "dir.php" and paste it into a file .htaccess in 1 line to make it look like this:
Example:

	php_value auto_prepend_file /home/p/p915356w/p915356w.bget.ru/public_html/antiddos.php

2. 
Next step in the file in the file data.php you need to write the data:
data from your mysql:

	$host = ''
	$database = '' 
	$user = ''
	$password = ''
	
and

	$limit = 60
	$second = 60

$limit - Limit on the number of requests at a given time, after which the ip will be banned
$second - Time limit, (for what period of time, in seconds, the number of requests will be checked($limit) )

for example, limit=60 and second=60-this means that if one ip address sent 61 requests to your site and more in 60 seconds, then its ip address will be blocked on your site, since there is a chance that this is a ddos attack

Set up for yourself, I believe that for a simple person, 2-3 requests per second to the site is quite enough, which means that you can set the limit=3 and seconds=1.

3. 
Done. All data and settings are saved. This way, you can proceed to the stage of copying all the files to the site.

You need to transfer the files .htaccess , data.php and antiddos.php to your main folder on the site. Then create a log folder there and create a log.the log file inside this logs folder (all requests, such as backups, will be written there, so as not to clog the mysql table)
