# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "swoole"
  config.vm.box_url = "~/boxes/swoole.box"

  config.vm.network :private_network, ip: "192.168.100.20"
  # config.vm.network :public_network, ip: "192.168.100.10",:bridge=>'en0: Wi-Fi (AirPort)'
  
  config.vm.provider :virtualbox do |vb|
    vb.name = "swoole"
  end

  # config.vm.provision :shell, :path => "srv/dev/init_vagrant.sh"
end
