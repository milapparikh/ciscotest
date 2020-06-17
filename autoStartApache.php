<?php
//Excercise 2: 3. Auto restart apache server in case if there is too much load on apache.
$mem_usage = memory_get_usage();
$my_defined_max_load = '';

if($mem_usage >= $my_defined_max_load){
    exec('/etc/init.d/httpd graceful');
}

?>