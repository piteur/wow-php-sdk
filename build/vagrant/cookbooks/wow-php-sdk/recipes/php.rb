apt_package ['php5', 'php5-dev', 'php5-common', 'php5-intl', 'php-pear', 'php-apc', 'php5-xdebug'] do
  action :install
end

# Define configuration file
template "/etc/php5/apache2/php.ini" do
  source "php.ini.erb"
  owner "root"
  group "root"
  mode "0644"
end
