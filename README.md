midgardmvc-project-template
===========================

This is a project template for creating new websites or applications powered by the [Midgard MVC](http://midgard-project.org/midgardmvc/) framework for PHP.

## Creating new Midgard MVC projects

This project template is designed to be used together with the [Composer](http://getcomposer.org/) PHP dependency management tool. You can create new Midgard MVC projects on your current machine with:

    $ composer create-project midgard/midgardmvc-project-template myproject

This will download the Midgard MVC project template and set it up together with the dependencies. This new project will be set up in the `myproject` directory.

## Where is everything?

The Midgard MVC project template follows a file structure typical for Composer-installed Midgard MVC applications:

* `application.yml` contains the application configuration, including site's node hierarchy and list of enabled components
* `composer.json` lists the dependencies for your application
* `manifest.yml` contains routes for the site's main component (in this case `midgardmvc_project_template`)
* `controllers` contains controllers of the main component
* `templates` contains templates of the main component
* `vendor` contains all Composer-installed dependencies, including Midgard MVC in `vendor/midgard/midgardmvc-core`
* `var` contains logs and caches used by the Vagrant setup

## Creating development VMs with Vagrant

[Vagrant](http://vagrantup.com) gives an easy way to manage development virtual machines using Midgard MVC.

### Dependencies

* [Vagrant](http://vagrantup.com)
* NFS (out-of-the-box in OS X, on Debian-based Linux systems install `nfs-kernel-server`)

### Installation

To set up a Vagrant project, download this project template, and then:

    $ cd setup/vagrant
    $ vagrant up

The `up` command will download a Ubuntu 12.10 base image, start it in [VirtualBox](https://www.virtualbox.org/) and then use the [Puppet](http://puppetlabs.com/) configuration management system to set up Midgard2, PHP, AppServer-in-PHP, and your Midgard MVC project.

This setup can take a long time depending on your internet connection. Once it is done, there should be a Midgard MVC instance running based on your project setup. You can access it at <http://localhost:8181>.

### Usage

The Vagrant VM will mount your project directory over NFS, and so all of your file changes will apply to the virtual machine instantly. If you need to tweak something on the VM, you can get an SSH connection to it with:

    $ vagrant ssh

Your mounted project directory will be available in `/opt/midgardmvc`.

#### Restarting AiP

Since AiP is a persistent PHP process, you'll need to restart it when you make changes to your files. You can do that after `vagrant ssh` with:

    $ sudo service midgardmvc stop
    $ sudo service midgardmvc start

### Managing the virtual machine

You can use the `vagrant halt` command to stop your virtual machine, and `vagrant up` to restart it.

If you want to start from scratch, simply run `vagrant destroy`, and rebuild the VM image with another `vagrant up`.

If you want to distribute your VM image with your team, read the [Vagrant packaging documentation](http://vagrantup.com/v1/docs/getting-started/packaging.html).
