#! /bin/bash

image=$1
collection=/var/www/imgcompare
i2umap=/var/www/imgcompare/map.txt

function getSimImage(){
findimagedupes -t=80 -q $image $collection |\
grep $image |\
#the similar image found
#awk '{print $1};' does not work ...there is no order
sed "s%$image%%g"
}

simImg=$(getSimImage)
echo "sim img: " $simImg

cat $i2umap |\
grep $simImg |\
awk '{print $2};'

