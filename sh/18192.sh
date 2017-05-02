# grab field types from ORACLE
sqlplus -s user/pass << EOD | sed '/^$/d' | awk 'NR>2{print}' > temp.txt
SET PAGESIZE 0;
SET FEEDBACK OFF;
DESCRIBE $1;
EOD