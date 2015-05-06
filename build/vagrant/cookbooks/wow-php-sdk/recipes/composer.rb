execute "install-composer" do
  command "curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin"
  notifies :run, "execute[rename-composer]", :immediately
  not_if { ::File.exists?("/usr/local/bin/composer") }
end

execute "rename-composer" do
  action :nothing
  command "mv /usr/local/bin/composer.phar /usr/local/bin/composer"
end

execute "self-update-composer" do
  command "/usr/local/bin/composer self-update"
end
