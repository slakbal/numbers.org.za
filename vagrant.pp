$echo  = "/bin/echo"
$mysql = "/usr/bin/mysql"

exec { "create user":
  command => "${echo} \"CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';\" | ${mysql} -uroot -pvagrant",
  unless  => "${mysql} -udev -pdev"
}

exec { "create database":
  command => "${echo} \"CREATE DATABASE dev; GRANT ALL ON dev.* TO 'dev'@'localhost';\" | ${mysql} -uroot -pvagrant",
  unless  => "${mysql} -udev -pdev dev",
  require => Exec["create user"]
}

file { "/etc/apache2/sites-available/default":
  ensure => file,
  content => "
    <VirtualHost *:80>
      DocumentRoot /var/www/public
      ErrorLog ${APACHE_LOG_DIR}/error.log
      CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
  "
}

exec { "restart apache":
  command => "/etc/init.d/apache2 restart",
  require => File["/etc/apache2/sites-available/default"]
}