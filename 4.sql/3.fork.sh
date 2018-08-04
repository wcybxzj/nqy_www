istart=1
istop=450000
istep=10000

for((i=$istart; i<$istop; i+=$istep)); do
   bash ./fork2.sh ${i} `expr ${i} + ${istep} - $istart` &
done
