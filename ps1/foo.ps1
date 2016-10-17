# Memory.ps1,  Version 1.20
# Display total and free amounts of physical memory in Bytes, KB and MB
#
# Usage:  MEMORY.PS1  [ remote_computer ]
#
# Written by Rob van der Woude
# http://www.robvanderwoude.com

param( [string]$computer = $env:ComputerName )


$free = ( Get-WMIObject Win32_OperatingSystem -ComputerName $computer ).FreePhysicalMemory 
$phys = ( Get-WMIObject Win32_OperatingSystem -ComputerName $computer ).TotalVisibleMemorySize

""
"Computer: " + $computer
""
"Physical memory".PadRight( 16, " " ) + "Bytes".PadLeft( 14, " " )                + "KB".PadLeft( 11, " " )            + "MB".PadLeft( 8, " " )
"=" * 49
"Available".PadRight( 16, " " )       + ([string]($free * 1024)).PadLeft( 14, " " ) + ([string]$free).PadLeft( 11, " " ) + ([string]([int](($free + 512) / 1024))).PadLeft( 8, " " )
"Total".PadRight( 16, " " )           + ([string]($phys * 1024)).PadLeft( 14, " " ) + ([string]$phys).PadLeft( 11, " " ) + ([string]([int](($phys + 512) / 1024))).PadLeft( 8, " " )
""



configuration CloudAction { 
    
    
}