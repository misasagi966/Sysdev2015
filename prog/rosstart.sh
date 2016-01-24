#!/bin/bash
lxterm -e roscore &
sleep 3
lxterm -e rosrun lsd_slam_viewer viewer&
