<h1>Antiddos.php</h1>

<p><strong>Antiddos.php</strong> — это PHP-скрипт для защиты веб-сайта от DDoS-атак путем блокировки IP-адресов, которые совершают слишком частые запросы.</p>

<hr>

<h2>Описание на русском</h2>

<h3>Описание</h3>
<p>Скрипт <code>antiddos.php</code> предназначен для предотвращения атак на веб-сайт путем ограничения количества запросов с одного IP-адреса в течение заданного времени. 
Если IP-адрес превышает лимит запросов, он добавляется в блокировку через файл <code>.htaccess</code>.</p>

<h3>Функциональные возможности</h3>
<ul>
    <li>Поддержка исключений для IP-адресов (например, <code>localhost</code>, <code>127.0.0.1</code>, и других указанных адресов).</li>
    <li>Логирование всех запросов с указанием времени, типа запроса и переданных данных.</li>
    <li>Автоматическая очистка базы данных от устаревших записей.</li>
</ul>

<h3>Настройка</h3>
<ol>
    <li>Скопируйте <code>antiddos.php</code> в директорию вашего сайта.</li>
    <li>Добавьте следующую строку в ваш файл <code>.htaccess</code> для автозапуска скрипта при каждом запросе:
        <pre>php_value auto_prepend_file /path/to/antiddos.php</pre>
    </li>
    <li>Настройте базу данных и добавьте таблицу <code>antiddos</code>, как указано в скрипте.</li>
</ol>

<h3>Примечание</h3>
<p>Для корректной работы скрипта необходимо разрешение на использование директивы <code>php_value auto_prepend_file</code> в <code>.htaccess</code>. Проверьте настройки вашего сервера.</p>

<hr>

<h2>English Description</h2>

<h3>Description</h3>
<p><code>antiddos.php</code> is a PHP script designed to protect a website from DDoS attacks by limiting the number of requests from a single IP address within a specified timeframe.
If an IP address exceeds the request limit, it is blocked through the <code>.htaccess</code> file.</p>

<h3>Features</h3>
<ul>
    <li>Supports IP exceptions (e.g., <code>localhost</code>, <code>127.0.0.1</code>, and other specified addresses).</li>
    <li>Logs each request, including time, request type, and transmitted data.</li>
    <li>Automatically cleans outdated entries from the database.</li>
</ul>

<h3>Setup</h3>
<ol>
    <li>Copy <code>antiddos.php</code> to your site’s directory.</li>
    <li>Add the following line to your <code>.htaccess</code> file to run the script automatically for each request:
        <pre>php_value auto_prepend_file /path/to/antiddos.php</pre>
    </li>
    <li>Set up the database and add the <code>antiddos</code> table as indicated in the script.</li>
</ol>

<h3>Note</h3>
<p>To work properly, the script requires permission to use the <code>php_value auto_prepend_file</code> directive in <code>.htaccess</code>. Please check your server settings.</p>
