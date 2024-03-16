var opciones = {
  "0": [""],
  "150023373": ["NE075AC48ATEZ"],
  "150031303": ["GP100hija"],
  "150021625": ["595LTAS2_CAP"],
  "7000159880A": ["RRH_PS2_BYPASS"],
  "150034771": ["75DCmain"]
};

  
function cambioOpciones() {
  var combo = document.getElementById('opciones');
  var opcion = combo.value;


  document.getElementById('modelo').value = opciones[opcion][0];


}

  
  

