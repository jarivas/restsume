# restsume
A jsonresume.org individual backend, that also can be feed from linkedin exporter data 

##Quick Info
- Deploy to a server running php 7.4
- Create the folders data and log
- Open config.ini.example, fill the blank data and save config.ini
- Config the server to make public/api.php handle all request
- Visit https://jsonresume.org/schema/ to know the schema
- Visit https://jsonresume.org/themes/ if you want themes to quickly build a site base on the json


##Usage
- If you like to export the data already existing on linkedIn use https://github.com/jarivas/linkedin-exporter
- You will get a json ready to use on /linkedIn/convert and picture to use on /resume/picture
- Insomnia v4 json file ready to be imported and understand how to use this micro api
- /linkedIn/convert will create a profile readable on /linkedIn/read and /resume/read, does endpoints do not require password
- Convert should be the first step after getting the import data
- Then /linkedIn/picture and or /resume/picture, where it will upload a profile pic, that could be the one from the export