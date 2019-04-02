#!/usr/bin/env bash
ps aux | grep selenium-server-standalone | grep -v grep |awk {'print $2'} |xargs kill -9
