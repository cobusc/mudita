#!/bin/bash

cat bootstrap_database.sql ion_auth.sql | mysql -u root -p 

