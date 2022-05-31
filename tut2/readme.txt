1. Go to hub.docker.com
2. search for php
3. go to versions -> filter -> apache which will be our webserver
4. get the php version with the apache tag, php:7-apache is fine
5. go back to description and scroll down to apache. It will give you details on how to use the image
6. create a Dockerfile the syntax for the Dockerfiles are simple keyword + cmd.
7. follow the guide on the description:
    Add your from. This will be your base image (FROM php:7-apache)
    Copy the code from your host the the container (COPY src/ /var/www/html/) as specified by the desc
    Expose a port on the container for the server to listen on (EXPOSE 80)
8. Now that we have our dockerfile create your source code:
    Create a folder called src
    In this folder add a file called index.php
    Write a little hello world (<?php echo "Hello World";)
    Save and go up to the parent folder
9. We now have everything ready to build our docker image:
    like our first example we will use the build command but this time we don't want to interact with the container
    cmd: docker build -t hello-world .
10. This will pull the base php image add your commands and create a new layer on the image called hello-world (our new image)
11. This layering is an advantage of docker as you can layer multiple images on top of each other.
12. cmd: docker image ls to view your new docker images. You should have php and hello world
13. we now want to run this hello world image: docker run -p 5001:80 hello-world (forward port 5001 on the host to 80 on the container)
14. In another terminal run docker ps to see the running container
15. open a web browser or curl localhost:5001
16. you should now see your code in the browser
17. if you update the code you will have to rebuild the image. Docker builds are cached so it will continue from the step where changes are found (your COPY because the src folder has changed)
18. changing this behaviour can be done with volumes
