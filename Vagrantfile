require "rbconfig"
WINDOWS = (RbConfig::CONFIG["host_os"] =~ /mswin|mingw|cygwin/) ? true : false

Vagrant.configure("2") do |config|
    config.vm.box = "chef/debian-7.8"
    config.vm.synced_folder ".", "/vagrant", :ntfs => !WINDOWS, type: "nfs"

    config.vm.provider :virtualbox do |vb|
        vb.customize ["modifyvm", :id, "--name"  , "VM for wow php sdk"]
        vb.customize ["modifyvm", :id, "--cpus"  , "1"]
        vb.customize ["modifyvm", :id, "--memory", "1024"]
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    end

    # The domain name where the application will be reachable
    config.vm.hostname = "wow-php-sdk.local"

    # Allow guest hostname to be automatically inserted in host's /etc/hosts file
    config.hostmanager.enabled           = true
    config.hostmanager.manage_host       = true
    config.hostmanager.ignore_private_ip = false
    config.hostmanager.include_offline   = true

    # The IP address where the VM can be accessed from the host
    config.vm.network :private_network, ip: "192.168.33.10"

    config.ssh.forward_agent = true

    # Chef solo configuration
    config.omnibus.chef_version = :latest
    config.vm.provision :chef_solo do |chef|
        # chef debug level, start vagrant like this to debug:
        # $ CHEF_LOG_LEVEL=debug vagrant <provision or up>
        chef.log_level = ENV["CHEF_LOG_LEVEL"] || "info"

        chef.cookbooks_path = "./build/vagrant/cookbooks"

        chef.roles_path = "./build/vagrant/roles"
        chef.add_role("install")
    end
end
