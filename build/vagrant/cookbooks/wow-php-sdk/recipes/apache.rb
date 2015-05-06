apt_package "apache2" do
  action :install
end

service "apache2" do
  supports :status => true, :restart => true, :reload => false
  action [ :restart ]
end

template "/etc/apache2/sites-enabled/000-default" do
  source "vhost.erb"
  owner "root"
  group "root"
  mode "0644"
end
