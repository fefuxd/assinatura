<html lang="en">

<head>
  <title>Assinatura digital Vecol</title>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/croppie.js"></script>
  <script type="text/javascript" src="js/jquery.mask.min.js"/></script>
  <script type="text/javascript">
            stop = '';
            function mascaraTel( telefone ) {
            telefone.value = telefone.value.replace( /[^\d]/g, '' )
                                           .replace( /^(\d\d)(\d)/, '($1) $2' )
                                           .replace( /(\d{4})(\d)/, '$1-$2' );
            if ( telefone.value.length > 14 ) telefone.value = stop;
            else stop = telefone.value;    
            }
  </script>
  
  <script>
            stop = '';
            function mascaraCel ( cel ) {
            cel.value = cel.value.replace( /\D/g,"" )
                                           .replace( /^(\d{2})(\d)/g,"($1) $2" )
                                           .replace( /(\d)(\d{4})$/,"$1-$2" );
            if ( cel.value.length > 15 ) cel.value = stop;
            else stop = cel.value;    
            }
   </script>
   
   <script>
            stop = '';
            function mascaraNome ( nome ) {
            
            if ( nome.value.length > 23 ) nome.value = stop;
            else stop = nome.value;    
            }
   </script>
  
  <script>
            stop = '';
            function mascaraFuncao ( funcao ) {
            
            if ( funcao.value.length > 28 ) funcao.value = stop;
            else stop = funcao.value;    
            }
   </script>
   
   <script>
            stop = '';
            function mascaraEmail ( email ) {
            
            if ( email.value.length > 43 ) email.value = stop;
            else stop = email.value;    
            }
   </script>
  
  <link rel="stylesheet" href="css/bootstrap-3.min.css">
  <link rel="stylesheet" href="css/croppie.css">
  
  <script type="text/javascript">
function submitform()
{
    document.forms["form"].submit();
}
</script>
  
</head>

<body style="margin-top:10px;">
	<div class="container">
		<div class="panel panel-default">

			<div class="panel-heading">Informações para a assinatura</div>
				<div class="panel-body">
					<div class="row">	
						<div class="col-md-2 col-md-offset-5" >
							<form action="ass.php" id="form" method="post">
								<label for="nome"> Nome </label>
								 <input onkeydown="mascaraNome( this )" onkeyup="mascaraNome( this )" name="nome" type="text" placeholder="Nome" size="30"/><br/><br/>
								<label for="funcao"> Função </label>
								 <input onkeydown="mascaraFuncao( this )" onkeyup="mascaraFuncao( this )" name="funcao" type="text" placeholder="Função" size="30"/><br/><br/>
								<label for="telefone"> Telefone </label>
								 <input onkeydown="mascaraTel( this )" onkeyup="mascaraTel( this )" name="telefone" id="telefone" type="text" placeholder="Telefone" size="30"/><br/><br/>
								<label for="email"> E-mail </label>
								 <input onkeydown="mascaraEmail( this )" onkeyup="mascaraEmail( this )" name="email" type="text" placeholder="E-mail" size="30"/><br/><br/>
								<label for="cel"> Celular </label>
								 <input onkeydown="mascaraCel( this )" onkeyup="mascaraCel( this )" name="cel" type="text" placeholder="Celular" size="30"/><br/>								
								 <input type="checkbox" name="whats"> Possui Whatsapp?<br/>
								<label for="filial"> Filial </label><br/>
									<select name="filial" required>
									<option value="" disabled selected>Seleciona a filial...</option>         
									<option value="piracicaba">Piracicaba</option>
									<option value="botucatu">Botucatu</option>
									<option value="lencois">Lençóis Paulista</option>
									<option value="jau">Jaú</option>
									</select><br>
									
						</div>
						<input type="text" name="name" id="name" hidden><br/><br/>
							</form>
					</div>		
					
					<div class="row">
						<div class="col-md-3" style="padding-top:30px;">
							<strong>Select Image:</strong><br/>
							
								
								<input type="file" name="upload" id="upload"><br/>
								<button id="testinho" class="btn btn-success upload-result" name="testinho" id="testinho">CONFIRMAR RECORTE</button><br/><br/>
								
									
						</div>
			
			
						<div class="col-md-4 text-center">
							<div id="upload-demo" style="width:350px"></div>
						</div>
						
						<div class="col-md-4" style="">
							<div id="upload-demo-i" style="background:#e1e1e1;width:150px;padding:30px;height:150px;margin-top:30px"></div>
						</div>
					</div>
		
		<button type="submit" style="float: right;" onClick="submitform()" class="btn btn-success upload-result" /> CRIAR ASSINATURA </button>
		
				</div>
				
			 	
				
		</div>
		
	</div>
<script>
			var inputNome = document.getElementById('name');
			var inputFicheiro = document.getElementById('testinho');

			inputFicheiro.addEventListener('click', function() {
				
				var timestamp = Math.floor(new Date().getTime() / 1000)
				  inputNome.value = timestamp;
			});
			
			
			
</script>

<script type="text/javascript">

$uploadCrop = $('#upload-demo').croppie({

    enableExif: true,
    viewport: {

        width: 100,
        height: 100,
        type: 'circle'
    },

    boundary: {

        width: 150,
        height: 150

    }

});

$('#upload').on('change', function () { 

	var reader = new FileReader();

    reader.onload = function (e) {

    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});

    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {

	$uploadCrop.croppie('result', {

		type: 'canvas',
		size: 'viewport'

	}).then(function (resp) {

		$.ajax({

			url: "/assinatura/ajaxpro.php",
			type: "POST",
			data: {"image":resp, "name": $("#name").val()},
			success: function (data) {

				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);

			}
		});
	});
});


</script>



</body>

</html>
