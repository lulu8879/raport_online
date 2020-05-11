# Docker Project

## How to

1. Install [Docker for Ubuntu 18.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-18-04)
```
$ sudo apt update

$ sudo apt install apt-transport-https ca-certificates curl software-properties-common

$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

$ sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu bionic stable"

$ sudo apt update

$ sudo apt install docker-ce

$ sudo usermod -aG docker ${USER}

$ su - ${USER}
```

2. Install [Docker Compose for Ubuntu 18.04](https://www.digitalocean.com/community/tutorials/how-to-install-docker-compose-on-ubuntu-18-04)
```
$ sudo curl -L https://github.com/docker/compose/releases/download/1.21.2/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose

$ sudo chmod +x /usr/local/bin/docker-compose
```

3. Clone this repo
```
$ git clone https://github.com/lulu8879/raport_online.git
```

4. Change Dir and Build Docker Compose
```
$ cd raport_online

$ docker-compose up -d
```

5. Check Status Docker
```
$ docker ps -a
```

6. Check IP
```
$ ip addr
```

7. Open web with your_ip:8080 and phpmyadmin with your_ip:5000