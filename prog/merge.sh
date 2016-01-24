#!/bin/bash
NO=$1
FILENAME=$2
MODELNAME=$3
TMP=$(cat /var/www/html/prog/$MODELNAME | head -n 2 | tail -n 1)
SIZE=${TMP%* *}x${TMP#* *}
SPLITNAME=${FILENAME%\.*}
FILEPATH=/var/www/html/data/$NO
ROTATION=`ffprobe -show_streams $FILEPATH/$FILENAME 2>/dev/null | grep rotation | cut -c 10-`
case "$ROTATION" in
  "-90") ROTATE="";;
  "270") ROTATE="";;
  "") ROTATE="-vf transpose=1";;
  "90") ROTATE="";;
  "-270") ROTATE="";;
  "180") ROTATE="-vf transpose=1";;
  "-180") ROTATE="-vf transpose=1";;
esac
mkdir $FILEPATH/tmp
rm -f $FILEPATH/tmp/*.jpg
ffmpeg -i $FILEPATH/$FILENAME $ROTATE -r 30 -s $SIZE -sws_flags bicubic -vcodec mjpeg -qscale 1 -qmin 1 -qmax 1  $FILEPATH/tmp/%06d.jpg
lxterm -e rosrun lsd_slam_core dataset_slam _files:=$FILEPATH/tmp/ hz=0 _calib:=/var/www/html/prog/$MODELNAME
sleep 2
#ビルドしたlsd_slam_viewerフォルダ直下にあるpc.pcdを指定してください
mv $HOME/ros_build/package_dir/lsd_slam/lsd_slam_viewer/pc.pcd $FILEPATH/$NO.pcd
rm -f -R $FILEPATH/tmp
/var/www/html/prog/filter $NO
