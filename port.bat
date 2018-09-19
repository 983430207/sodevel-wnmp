@echo off
:str
echo. & set /p "str=请输入需要查询的端口号：" & echo.
if not defined str goto :str
call :for %str%
goto :str
:for
Setlocal Enabledelayedexpansion
for /F "usebackq skip=4 tokens=2" %%i in (`netstat -ano -p UDP`) do (
set "var=%%i" & set "var=!var:*:=!"
echo.!var! | findstr /i "%1" 1>nul && echo 端口:%1 已开启。 && goto :eof)
echo 端口:%1 未开启。 & goto :str