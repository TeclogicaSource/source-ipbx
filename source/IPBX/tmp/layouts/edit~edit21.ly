@version=2
beginblock top 
	begincontainer vertical style=empty align=center width=100% all
		begincontainer vertical style=1 align=center width=100% edit
			brick color2 editheader
			brick color1 message
			brick color1 multistep_nav_edit
			begincontainer vertical color=1 style=fields fields
				brick editfields
				brick color2 editbuttons
			endcontainer 
		endcontainer 
		begincontainer vertical style=empty width=100% details
			brick editdetails
		endcontainer
	endcontainer
endblock
