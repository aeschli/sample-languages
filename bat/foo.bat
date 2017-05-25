@ECHO OFF
:: Use DISABLEDELAYEDEXPANSION to enable writing exclamation marks
IF "%OS%"=="Windows_NT" SETLOCAL DISABLEDELAYEDEXPANSION

rem asdasd
call echo %%a%%

:: Version number for this batch file
SET MyVer=2.10

:: Display "about"
ECHO ADSHelp.bat,  Version %MyVer% for Windows Server 2003 !delay_expanded_variables! 
ECHO Generate an HTML help file for the Directory Service command line tools
ECHO.
ECHO Written by Rob van der Woude
ECHO http://www.robvanderwoude.com
ECHO.
ECHO Text find and replace script from TechNet Script Center Hey, Scripting Guy!'s
ECHO article "How Can I Find and Replace Text in a Text File?"
ECHO http://www.microsoft.com/technet/scriptcenter/resources/qanda/feb05/hey0208.mspx %1 %~dp0 %%f ,  %%~nxf 

ECHO.

:: For MS-DOS and Windows 9x the script ends here
IF NOT "%OS%"=="Windows_NT" EXIT

:: Create temporary script
CALL :CreateVBScript "%Temp%\replace.vbs"

ECHO Writing HTML header . . .

>  adshelp.htm ECHO ^<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"^>
>> adshelp.htm ECHO ^<html^>
>> adshelp.htm ECHO ^<head^>

:: Read Windows version using VER command
FOR /F "tokens=1 delims=[" %%A IN ('VER') DO SET Ver=%%A
FOR /F "tokens=1* delims= " %%A IN ('ECHO.%Ver%') DO SET Ver=%%B

REM asdasd
:: Read latest Service Pack from registry
CALL :GetSP

>> adshelp.htm ECHO ^<title^>Help for Directory Service command line tools^</title^>
>> adshelp.htm ECHO ^<meta name="generator" content="ADSHelp.bat, Version %MyVer%, by Rob van der Woude"^>
>> adshelp.htm ECHO ^</head^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<body^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<div align="center"^>
>> adshelp.htm ECHO ^<h2^>Help for^</h2^>
>> adshelp.htm ECHO ^<h1^>Directory Service command line tools^</h1^>
>> adshelp.htm ECHO ^<h2^>%Ver%%SP%^</h2^>
FOR /F "tokens=* delims=" %%A IN ('VER') DO SET Ver=%%A
>> adshelp.htm ECHO ^<h3^>%Ver%^</h3^>
>> adshelp.htm ECHO ^</div^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.

ECHO Creating command index table . . .
SET FirstCell=1
>> adshelp.htm ECHO ^<table class="CommandIndexTable"^>
SET Lines=1
SET DSCmd=
FOR %%A IN (DSADD DSGET DSMOD DSMOVE DSQUERY DSRM) DO (
	FOR /F "tokens=* delims=" %%B IN ('%%A /? 2^>^&1 ^| FIND /V "/?"') DO (
		CALL :ListExec "%%~A" "%%~B"
rem 2>NUL
	)
)
>> adshelp.htm ECHO ^</table^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<div align="center"^>^<a href="#"^>Back to the top of this page^</a^>^</div^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.

ECHO Creating help for individual commands . . .
FOR %%A IN (DSADD DSGET DSMOD DSMOVE DSQUERY DSRM) DO CALL :ListHelp %%A

ECHO Closing HTML file . . .

>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<div align="center"^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>More detailed descriptions on Microsoft's Windows Server 2003 Directory Service command line tools can be found
>> adshelp.htm ECHO ^<a href="http://support.microsoft.com/kb/322684" target="_blank"^>here^</a^>^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>This HTML help file was generated by:^<br^>
>> adshelp.htm ECHO ^<strong^>ADSHelp.bat^</strong^>, Version %MyVer%
>> adshelp.htm ECHO for Windows 2003 Server^<br^>
>> adshelp.htm ECHO Written by Rob van der Woude^<br^>
>> adshelp.htm ECHO ^<a href="http://www.robvanderwoude.com"^>http://www.robvanderwoude.com^</a^>^<br^>
>> adshelp.htm ECHO ^&nbsp;^<br^>
>> adshelp.htm ECHO Text find and replace script by TechNet Script Center's
>> adshelp.htm ECHO ^<a href="http://www.microsoft.com/technet/scriptcenter/resources/qanda/feb05/hey0208.mspx" target="_blank"^>Hey, Scripting Guy!^</a^>^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^</div^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^</body^>
>> adshelp.htm ECHO ^</html^>

ECHO.
ECHO Now starting display of "adshelp.htm" . . .
START "ADSHelp" adshelp.htm

:: End of main batch program
ENDLOCAL
GOTO:EOF


:: Subroutines


:AddLink
FOR /F "tokens=1 delims=-" %%a IN (%1) DO SET DsDetailCmd=%%a
SET DsDetailCmd=%DsDetailCmd:~0,-1%
SET LoCase=%DsDetailCmd%
CALL :UpCase
SET DsDetailCmd=%UpCase%
SET DsDetailCmd=%DsDetailCmd: =_%
SET DsDetailCmd=%DsDetailCmd:^*=Gen%
START /B /WAIT CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" "%LoCase% - " "<a href="""#%DsDetailCmd%""">%DsDetailCmd%</a> - "
GOTO:EOF


:CreateVBScript
>  "%~1" ECHO ' Text find and replace script from TechNet Script Center's
>> "%~1" ECHO ' "Hey, Scripting Guy!"'s article "How Can I Find and Replace Text in a Text File?"
>> "%~1" ECHO ' http://www.microsoft.com/technet/scriptcenter/resources/qanda/feb05/hey0208.mspx
>> "%~1" ECHO '
>> "%~1" ECHO ' Usage:  CSCRIPT REPLACE.VBS "d:\path\textfile.txt" "oldtext" "newtext"
>> "%~1" ECHO.
>> "%~1" ECHO Const ForReading = 1
>> "%~1" ECHO Const ForWriting = 2
>> "%~1" ECHO.
>> "%~1" ECHO strFileName = Wscript.Arguments^(0^)
>> "%~1" ECHO strOldText  = Wscript.Arguments^(1^)
>> "%~1" ECHO strNewText  = Wscript.Arguments^(2^)
>> "%~1" ECHO.
>> "%~1" ECHO Set objFSO  = CreateObject^( "Scripting.FileSystemObject" ^)
>> "%~1" ECHO Set objFile = objFSO.OpenTextFile^( strFileName, ForReading ^)
>> "%~1" ECHO.
>> "%~1" ECHO strText     = objFile.ReadAll
>> "%~1" ECHO objFile.Close
>> "%~1" ECHO strNewText  = Replace^( strText, strOldText, strNewText ^)
>> "%~1" ECHO.
>> "%~1" ECHO Set objFile = objFSO.OpenTextFile^( strFileName, ForWriting ^)
>> "%~1" ECHO objFile.WriteLine strNewText
>> "%~1" ECHO objFile.Close
GOTO:EOF


:ListExec
IF /I NOT "%~1"=="%DSCmd%" (
	SET Descr=
	SET DSCmd=%~1
	SET Lines=1
)
IF %Lines%==0 GOTO:EOF
IF "%~2"=="" (
	SET Lines=0
	GOTO:EOF
)
FOR /F "tokens=1 delims=." %%C IN ('ECHO.%~2') DO IF DEFINED Descr (SET Descr=%Descr% %%C) ELSE (SET Descr=%%C)
ECHO.%2 | FIND "." >NUL
IF NOT ERRORLEVEL 1 (
	FOR /F "tokens=1* delims=:" %%C IN ('ECHO.%Descr%') DO IF NOT "%%D"=="" SET Descr=%%D
	SET Lines=0
)
IF %Lines%==0 (
	>> adshelp.htm ECHO ^<tr^>
	>> adshelp.htm ECHO     ^<td^>^<a href="#%DSCmd%"^>%DSCmd%^</a^>^</td^>
	>> adshelp.htm ECHO     ^<td^>^&nbsp;^</td^>
	>> adshelp.htm ECHO     ^<td^>^%Descr%^</td^>
	>> adshelp.htm ECHO ^</tr^>
)
GOTO:EOF


:ListHelp
SET DsHelpCmd=%~1
ECHO  . . . %DsHelpCmd%
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<h2 id="%DsHelpCmd%"^>%DsHelpCmd%^</h2^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<pre^>

:: Write help screen to temporary file
IF EXIST "%Temp%\adshelp.tmp" DEL "%Temp%\adshelp.tmp"
%DsHelpCmd% /? > "%Temp%\adshelp.tmp" 2>NUL
:: "Escape" special characters in temporary file using temporary VBScript
CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" "&" "&amp;"
CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" "<" "&lt;"
CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" ">" "&gt;"
:: Insert hyperlinks:
FOR /F "tokens=* delims=" %%A IN ('TYPE "%Temp%\adshelp.tmp" ^| FINDSTR /R /B /I /C:"%DsHelpCmd% [a-z][a-z][a-z]* - [a-z]"') DO (
	CALL :AddLink "%%~A"
)
:: Append "escaped" text
>> adshelp.htm TYPE "%Temp%\adshelp.tmp"

>> adshelp.htm ECHO ^</pre^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
IF /I NOT "%~1"=="DSGET" IF /I NOT "%~1"=="DSMOVE" IF /I NOT "%~1"=="DSRM" (
	FOR /F "tokens=1* delims=-" %%B IN ('%DsHelpCmd% OU /? 2^>NUL ^| FINDSTR /R /I /B /C:"%~1 [^ -][^ -]* /\? - "') DO (
		CALL :ListDetails "%%~B" "%%~C"
	)
)
IF /I "%~1"=="DSGET" (
	FOR /F "tokens=1* delims=-" %%B IN ('%DsHelpCmd% OU /? 2^>NUL ^| FINDSTR /R /I /B /C:"%~1 [^/ -][^\? -]* - "') DO (
		CALL :ListDetails "%%B~" "%%~C"
	)
)
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<div align="center"^>^<a href="#"^>Back to the top of this page^</a^>^</div^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
GOTO:EOF


:ListDetails
>> adshelp.htm ECHO ^<table class="ListDetailsTable"^>
>> adshelp.htm ECHO ^<tr^>
FOR /F "tokens=1,2" %%D IN ('ECHO.%~1') DO SET Detail=%%D %%E
ECHO        %Detail% . . .
:: Convert Detail string to uppercase
SET LoCase=%Detail%
CALL :UpCase
SET Detail=%UpCase%
SET URL=%Detail: =_%
FOR /F "tokens=1,2" %%D IN ('ECHO.%Detail%') DO IF "%%E"=="*" (SET URL=%Detail:^*=GEN%)
>> adshelp.htm ECHO     ^<th^>^<a name="%URL%"^>%Detail%^</a^>^</th^>
>> adshelp.htm ECHO ^</tr^>
>> adshelp.htm ECHO ^<tr^>
SET Descr=%~2
ECHO.%1 | FIND /I "dsquery *" >NUL
IF ERRORLEVEL 1 (
	>> adshelp.htm ECHO     ^<td^>^%Descr%^</td^>
) ELSE (
	CALL :DsQueryGen
)
>> adshelp.htm ECHO ^</tr^>
>> adshelp.htm ECHO ^</table^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO.%Detail%
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<pre^>

:: Write help screen to temporary file
IF EXIST "%Temp%\adshelp.tmp" DEL "%Temp%\adshelp.tmp"
%Detail% /? > "%Temp%\adshelp.tmp" 2>&1
:: "Escape" special characters in temporary file using temporary VBScript
CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" "&" "&amp;"
CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" "<" "&lt;"
CSCRIPT //NoLogo "%Temp%\replace.vbs" "%Temp%\adshelp.tmp" ">" "&gt;"
:: Append "escaped" text
>> adshelp.htm TYPE "%Temp%\adshelp.tmp"
>> adshelp.htm ECHO ^</pre^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<div align="center"^>^<a href="#%DsHelpCmd%"^>Back to %DsHelpCmd%^</a^>^</div^>
>> adshelp.htm ECHO.
>> adshelp.htm ECHO ^<p^>^&nbsp;^</p^>
>> adshelp.htm ECHO.
GOTO:EOF


:DsQueryGen
:: DSQUERY * description is displayed on 2 lines, so we need to add an extra line to the description
FOR /F "tokens=1* delims=[]" %%E IN ('DSQUERY OU /? 2^>NUL ^| FIND /N /V "X@#$X" ^| FIND /I "dsquery * /?"') DO SET LineNum=%%E
SET /A NextLineNum = %LineNum% + 1
FOR /F "tokens=1* delims=[]" %%E IN ('DSQUERY OU /? 2^>NUL ^| FIND /N /V "X@#$X" ^| FIND "[%NextLineNum%]"') DO SET NextLine=%%F
SET Descr=%Descr% %NextLine%
>> adshelp.htm ECHO     ^<td^>^%Descr%^</td^>
GOTO:EOF


:GetSP
SET SP=
:: Export registry tree to temporary file
START /WAIT REGEDIT.EXE /E "%Temp%.\%~n0.dat" "HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion"
IF NOT EXIST "%Temp%.\%~n0.dat" GOTO:EOF
:: Read value of "CSDVersion" from temporary file
FOR /F "tokens=2 delims==" %%A IN ('TYPE "%Temp%.\%~n0.dat" ^| FIND /I "CSDVersion"') DO SET SP=%%~A
:: Check if value is valid
ECHO.%SP% | FIND /I "Service Pack" >NUL
IF ERRORLEVEL 1 SET SP=
DEL "%Temp%.\%~n0.dat"
:: Use a shorter notation
IF DEFINED SP SET SP=%SP:Service Pack=SP%
GOTO:EOF


:UpCase
SET UpCase=%LoCase%
SET Detail=%UpCase:a=A%
SET Detail=%UpCase:b=B%
SET Detail=%UpCase:c=C%
SET Detail=%UpCase:d=D%
SET Detail=%UpCase:e=E%
SET Detail=%UpCase:f=F%
SET Detail=%UpCase:g=G%
SET Detail=%UpCase:h=H%
SET Detail=%UpCase:i=I%
SET Detail=%UpCase:j=J%
SET Detail=%UpCase:k=K%
SET Detail=%UpCase:l=L%
SET Detail=%UpCase:m=M%
SET Detail=%UpCase:n=N%
SET Detail=%UpCase:o=O%
SET Detail=%UpCase:p=P%
SET Detail=%UpCase:q=Q%
SET Detail=%UpCase:r=R%
SET Detail=%UpCase:s=S%
SET Detail=%UpCase:t=T%
SET Detail=%UpCase:u=U%
SET Detail=%UpCase:v=V%
SET Detail=%UpCase:w=W%
SET Detail=%UpCase:x=X%
SET Detail=%UpCase:y=Y%
SET Detail=%UpCase:z=Z%
GOTO:EOF