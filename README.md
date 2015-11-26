# Demo Elasticsearch

## Requirements

- Vagrant
- Virtualbox
- Ansible
- PHP

## Install

```bash
git clone git@github.com:enjoy2000/demo-es.git
cd demo-es/es
vagrant up --provision
# Wait for provisioning then you can access elasticsearch in browser: 
# http://192.168.88.88:9200

# Run unit test (you will need php)
cd ..
curl -sS https://getcomposer.org/installer | php
php composer.phar install
php vendor/bin/codecept run unit
```
