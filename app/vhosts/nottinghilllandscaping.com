
	#
	#Domain Definition for nottinghilllandscaping.com
	#
	
	<VirtualHost *:80>
	
		DocumentRoot /Applications/MAMP/htdocs/webninja/htdocs/
		ServerName nottinghilllandscaping.com
			
	</VirtualHost>
	
	#
	#End Domain Definition for nottinghilllandscaping.com
	#
	