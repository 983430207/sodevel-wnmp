@echo off
:str
echo. & set /p "str=��������Ҫ��ѯ�Ķ˿ںţ�" & echo.
if not defined str goto :str
call :for %str%
goto :str
:for
Setlocal Enabledelayedexpansion
for /F "usebackq skip=4 tokens=2" %%i in (`netstat -ano -p UDP`) do (
set "var=%%i" & set "var=!var:*:=!"
echo.!var! | findstr /i "%1" 1>nul && echo �˿�:%1 �ѿ����� && goto :eof)
echo �˿�:%1 δ������ & goto :str