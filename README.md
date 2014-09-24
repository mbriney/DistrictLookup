DistrictLookup
==============

Takes a MySQL database table and appends the federal, state upper and state lower congressional districts


Instructions
++++++++++++

1) Import district.sql to your MySQL server
2) Populate the district table with the data you want to append - you may modify the table to accomodate additional fields but keep the column headers the same unless you want to modify the PHP script
3) Adjust the MySQL connection string in lookup.php for your server
4) Run the script using the command line "php lookup.php"