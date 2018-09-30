set root=c:\xampp\
%root%xampp_start.exe
%root%mysql\bin\php.exe
%root%mysql\bin\mysqld.exe --defaults-file=%root%mysql\bin\my.ini --standalone --console

pause