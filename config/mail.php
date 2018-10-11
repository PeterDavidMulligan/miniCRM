<?php
//Laravel integration supplied by mailtrap.io
return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => [
      "address" => "from@example.com",
      "name" => "Example"
  ],
  "username" => "fca21f648b5915",
  "password" => "0a5f70c7568524",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false
];
