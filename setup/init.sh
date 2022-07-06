#!/bin/sh
cat init.sql | sqlite3 ../data.db
