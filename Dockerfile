FROM ubuntu
RUN apt-get update && apt-get install -y
RUN apt-get install cowsay -y
RUN ln -s /usr/games/cowsay /usr/bin/cowsay
