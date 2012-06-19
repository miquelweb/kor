
var mestempsh=0;
var mestempsm=0;
var codicanvitemps=0;
var codimestemps=0;
cost="0.30";
function pujartempsnou(){
	zero1="";
	zero2="";
	mestempsm+=5;
	cost="";
	if(mestempsm==60){
		mestempsm=0;
		mestempsh+=1;
	}
	if(mestempsh==2){
		mestempsm=0;
	}
		horafinal= parseInt(ladata.substr(0,2))+mestempsh;
		minutfinal=parseInt(ladata.substr(3,2))+mestempsm;
		while(minutfinal>=60){
			minutfinal-=60;
			horafinal+=1
		}
		if(horafinal.toString().length==1){zero1="0";}
		if(minutfinal.toString().length==1){zero2="0";}
		$("#novahora").html(zero1+horafinal+":"+zero2+minutfinal);
	zero1="";
	zero2="";
	if(mestempsh.toString().length==1){zero1="0";}
	if(mestempsm.toString().length==1){zero2="0";}
	$("#tempsafegit").html(mestempsh+":"+zero2+mestempsm);
	$("#camptempsafegit").val(mestempsh+":"+zero2+mestempsm);
	switch(mestempsh){
	case 0:
		if(mestempsm<30){
			cost="0,30";
		}
		else if(mestempsm<50){
			cost="0,45";
		}
		else{
			cost="0,60";
		}
	break;	
	case 1:
		if(mestempsm<30){
			cost="1,00";
		}
		else if(mestempsm<50){
			cost="1,25";
		}
		else{
			cost="1,50";
		}
	break;	
	default:
		cost="1,50";
	break;	
	}
	$("#despesa").html(cost+"<span style='font-size:30px;'>&euro;</span>");
	$("#campdespesa").val(cost);
	$("#saldo").html((saldo-(cost.replace(",","."))).toFixed(2).replace(".",",")+"<span style='font-size:15px;'>&euro;</span>");
}
function baixartempsnou(){
	zero1="";
	zero2="";
	if((mestempsm>5)||(mestempsh>0)){
		mestempsm-=5;
		horafinal= parseInt(ladata.substr(0,2));
		minutfinal=parseInt(ladata.substr(3,2))+mestempsm;
		while(minutfinal>=60){
			minutfinal-=60;
			horafinal+=1
		}
		if(horafinal.toString().length==1){zero1="0";}
		if(minutfinal.toString().length==1){zero2="0";}
		$("#novahora").html(zero1+horafinal+":"+zero2+minutfinal);
	}
	if(mestempsm<0){
		mestempsm=55;
		mestempsh-=1;
	}
	if(mestempsh.toString().length==1){zero1="0";}
	if(mestempsm.toString().length==1){zero2="0";}
	switch(mestempsh){
	case 0:
		if(mestempsm<30){
			cost="0,30";
		}
		else if(mestempsm<50){
			cost="0,45";
		}
		else{
			cost="0,60";
		}
	break;	
	case 1:
		if(mestempsm<30){
			cost="1,00";
		}
		else if(mestempsm<50){
			cost="1,25";
		}
		else{
			cost="1,50";
		}
	break;	
	default:
		cost="1,50";
	break;	
	}
	$("#tempsafegit").html(mestempsh+":"+zero2+mestempsm);
	$("#camptempsafegit").val(mestempsh+":"+zero2+mestempsm);
	$("#despesa").html(cost+"<span style='font-size:30px;'>&euro;</span>");
	$("#campdespesa").val(cost);
	$("#saldo").html((saldo-(cost.replace(",","."))).toFixed(2).replace(".",",")+"<span style='font-size:15px;'>&euro;</span>");

}