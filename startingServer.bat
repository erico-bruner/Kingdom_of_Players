@echo off
cd backend

:Menu
cls
echo  ----------------------------------
echo  /             MENU               /
echo  ----------------------------------
echo  /  1 - Staring Server            /
echo  /  2 - Install Yarn dependences  /
echo  /  3 - Install DataBase          / 
echo  /  4 - New Table                 /
echo  /  5 - Exit                      /
echo  ----------------------------------
echo.

set/p resp=">>> "

if %resp%==1 goto 1
if %resp%==2 goto 2
if %resp%==3 goto 3
if %resp%==4 goto 4
if %resp%==5 goto 5

:1
cls
echo  ----------------------------------
echo  /            SERVER              /
echo  ----------------------------------
echo. 
call yarn dev
goto Menu

:2
cls
echo  ----------------------------------
echo  /          DEPENDENCES           /
echo  ----------------------------------
call yarn install
echo.
echo  -- Dependences Install with Success!
echo.
pause 
goto Menu

:3
cls
echo  ------------------------------------
echo  /            DATABASE              /
echo  ------------------------------------
call yarn sequelize db:create
echo.
echo  -- DataBase create with Success!
echo.
pause
goto Menu

:4
cls
echo  ------------------------------------
echo  /              TABLES              /
echo  ------------------------------------
call yarn sequelize db:migrate
echo.
echo  -- Table create with Success!
echo.
pause
goto Menu

:5
cls
echo  ------------------------------------
echo  /            BY ;-; BY             /    
echo  ------------------------------------
timeout /t 2 /nobreak > null
exit