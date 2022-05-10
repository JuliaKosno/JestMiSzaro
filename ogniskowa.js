			var obiektywwal = document.querySelector("#obiektyw");
			var matrycawal = document.querySelector("#matryca");
			var aparatwal= document.querySelector("#aparat")

		function sprawdz()
		{

			var obiektyw = obiektywwal.options[obiektywwal.selectedIndex].value ;
			var matryca = matrycawal.options[matrycawal.selectedIndex].value ;
			var aparat = aparatwal.options[aparatwal.selectedIndex].value;
			var ogniskowa = document.querySelector("#ogniskowa").value;

			var obliczenia = false;
		
			var wynik = 0;
			var mnoznik = 0;


			if((obiektyw=="FF" && matryca=="FF") ||(obiektyw=="APS-C" && matryca=="APS-C"))
				wynik=ogniskowa + "mm ";
			else if(obiektyw=="APS-C" && matryca=="FF")
				wynik="zaciemnione brzegi kadru";
			else if (obiektyw=="FF" && matryca=="APS-C")
				obliczenia =true;

			if(obliczenia){
				if(aparat=="Nikon" || aparat=="Sony" ||  aparat=="Pentax")
				 	mnoznik=1.5;
				else if(aparat=="Canon")
					mnoznik=1.6;
				else if(aparat=="Olympus")
					mnoznik=2;
				wynik = Math.round(ogniskowa*mnoznik) +" mm ";
			}
			document.getElementById("uzysk-ogniskowa").innerHTML= wynik ;
		}
	
	