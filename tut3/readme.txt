1. in learners we want a docker image to run the python server (python 3 with onbuild) the python server uses flask so we have requirements. The onbuild image will pull our requirements automatically.
2. Read the instructions on the image page on docker hub to see where to copy the contents of your source
3. We want to run the python code in the image so we will need the CMD command in the Dockerfile. (python api.py)
4. Now since we both have an api and a front end we want to run both. We want to "compose" them to run together.
5. In the parent dir (where you can see the learner and website dir's) create a file called docker-compose.yml
6. This is a yaml file that we can use to specify details about our docker images and compose together multiple services.
7. start off by deciding on the version of formatting you want to use. We will be using version 3.
8. specify your services (services:)
9. our python server will be first up. We will call it (learner-service)
10. first up we decclare the build folder (folder containing Dockerfile) which will do the building
11. next we want to specify the port (host:container) the python server uses 80 so go for (5000:80)
12. save this and in a terminal run: "docker-compose up"
13. This will pull the images and create your new learner-service container
14. check that it's running by going to localhost on port 5000
15. Now that we have our api running we can look at our front end client
16. Look at line 12 of the index.php file. That is the request that gets fired to fetch the learners from our api. Notice that we can't use localhost:5000 to fetch the details because that would only look in the website's container. We want to access the api container. Docker when composing services will create a network (you will see this after running the api for the first time scroll up in your terminal) that all the services (containers) in your compose file connects to. So we
access it by calling the service name.
17. Close the file and open docker-compose again.
18. These compose files do not need images to build from. You can specify an image in the docker-compose directly.
19. Create a new service call "website"
20. In this service specify "image: php:7-apache". This will be our base image.
21. Volumes act as a live view of a folder on your host machine so when code changes in that folder it will be picked up on the container and your service will automatically be refreshed. So we want to specify a directory on our machine that links to a directory on the container. Like with tut2 we use a specific folder for the apache server to pick up our code. So "./website:/var/www/html/"
22. Specify the port this time 5001:80
23. Now we only want our website to be up when our api is running so we will specify that the website service depends on the learner-service' command depends_on: - learner-service (remember your yml formatting)
24. run docker-compose up
25. you will notice both services have now started up and are running. You can go to localhost port 5000 to see the python server and to localhost prot 5001 to see the php website that is pulling info from the python server. You can also make changes on your host website directory and see those changes directly on your website without rebuilding or restarting anything because we are using volumes. Just refresh the website.
